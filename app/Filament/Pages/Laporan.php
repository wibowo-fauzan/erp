<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\User;
use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class Laporan extends Page
{
    protected static ?string $navigationGroup = 'Laporan & Profil';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Laporan';

    protected static ?string $title = 'Laporan';

    protected static string $view = 'filament.pages.laporan';

    public ?string $jenis_laporan = 'booking';

    public ?string $tanggal_awal = null;

    public ?string $tanggal_akhir = null;

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'owner';
    }

    public function mount(): void
    {
        $this->tanggal_awal = now()->startOfMonth()->toDateString();
        $this->tanggal_akhir = now()->endOfMonth()->toDateString();

        $this->form->fill([
            'jenis_laporan' => $this->jenis_laporan,
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Laporan')
                    ->description('Pilih jenis laporan dan rentang tanggal yang ingin ditampilkan.')
                    ->schema([
                        Forms\Components\Select::make('jenis_laporan')
                            ->label('Jenis Laporan')
                            ->helperText('Pilih jenis laporan yang ingin ditampilkan')
                            ->options([
                                'booking' => 'Laporan Booking',
                                'pembayaran' => 'Laporan Transaksi / Pembayaran',
                                'pelayanan' => 'Laporan Pelayanan',
                                'operasional' => 'Ringkasan Operasional',
                            ])
                            ->required()
                            ->default('booking'),

                        Forms\Components\DatePicker::make('tanggal_awal')
                            ->label('Tanggal Awal')
                            ->helperText('Pilih tanggal awal periode laporan')
                            ->required()
                            ->rules(['date']),

                        Forms\Components\DatePicker::make('tanggal_akhir')
                            ->label('Tanggal Akhir')
                            ->helperText('Pilih tanggal akhir periode laporan')
                            ->required()
                            ->rules(['date', 'after_or_equal:tanggal_awal']),
                    ])->columns(1),
            ]);
    }

    protected function getBookings(string $awal, string $akhir): Builder
    {
        return Booking::query()
            ->whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)
            ->with('user')
            ->orderBy('created_at', 'desc');
    }

    public function getViewData(): array
    {
        $awal = $this->tanggal_awal ?? now()->startOfMonth()->toDateString();
        $akhir = $this->tanggal_akhir ?? now()->endOfMonth()->toDateString();
        $jenis = $this->jenis_laporan ?? 'booking';

        $bookings = $this->getBookings($awal, $akhir)->get();

        $stats = [
            'total' => $bookings->count(),
            'menunggu_konfirmasi' => $bookings->where('status', 'menunggu_konfirmasi')->count(),
            'dikonfirmasi' => $bookings->where('status', 'dikonfirmasi')->count(),
            'selesai' => $bookings->where('status', 'selesai')->count(),
            'dibatalkan' => $bookings->where('status', 'dibatalkan')->count(),
        ];

        $paymentStats = [
            'total_nilai' => $bookings->sum('total_amount'),
            'dikonfirmasi_nilai' => $bookings->where('payment_status', 'dikonfirmasi')->sum('total_amount'),
            'menunggu_nilai' => $bookings->where('payment_status', 'menunggu_verifikasi')->sum('total_amount'),
        ];

        $treatmentStats = $bookings->groupBy('treatment_slug')->map(function ($group, $slug) {
            $treatment = Treatment::query()->where('slug', $slug)->first();
            return [
                'name' => $treatment?->name ?? $slug,
                'count' => $group->count(),
            ];
        })->sortByDesc('count');

        $newCustomers = User::query()
            ->where('role', 'user')
            ->whereDate('created_at', '>=', $awal)
            ->whereDate('created_at', '<=', $akhir)
            ->count();

        $pelayananStats = [
            'total_pelayanan' => $bookings->whereIn('status', ['dikonfirmasi', 'selesai'])->count(),
            'selesai_pelayanan' => $bookings->where('status', 'selesai')->count(),
            'batal_pelayanan' => $bookings->where('status', 'dibatalkan')->count(),
            'treatment_terbanyak' => $treatmentStats->first()['name'] ?? '-',
            'jumlah_treatment_terpakai' => $treatmentStats->count(),
        ];

        $operasionalStats = [
            'total_booking' => $stats['total'],
            'pelanggan_baru' => $newCustomers,
            'treatment_tersedia' => Treatment::query()->where('is_active', true)->count(),
            'booking_selesai' => $stats['selesai'],
            'booking_batal' => $stats['dibatalkan'],
        ];

        return [
            'jenis_laporan' => $jenis,
            'tanggal_awal' => $awal,
            'tanggal_akhir' => $akhir,
            'bookings' => $bookings,
            'stats' => $stats,
            'paymentStats' => $paymentStats,
            'treatmentStats' => $treatmentStats,
            'newCustomers' => $newCustomers,
            'pelayananStats' => $pelayananStats,
            'operasionalStats' => $operasionalStats,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('cetak')
                ->label('Cetak')
                ->icon('heroicon-o-printer')
                ->color('gray')
                ->url(function () {
                    return route('filament.admin.pages.laporan', [
                        'jenis_laporan' => $this->jenis_laporan,
                        'tanggal_awal' => $this->tanggal_awal,
                        'tanggal_akhir' => $this->tanggal_akhir,
                    ]) . '?print=1';
                })
                ->openUrlInNewTab(),
        ];
    }
}
