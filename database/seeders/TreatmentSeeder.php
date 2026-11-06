<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Treatment::insert([
            [
                'slug' => 'octa-signature-glow',
                'name' => 'Octa Signature Glow',
                'filter' => 'facial',
                'category' => 'Facial',
                'price' => 500000.00,
                'duration_minutes' => 60,
                'description' => 'Perawatan wajah signature Octa untuk kulit segar dan bercahaya.',
                'image' => null,
                'action' => 'Book Now',
                'is_primary' => true,
                'alt' => 'Octa Signature Glow treatment',
                'is_active' => true,
            ],
            [
                'slug' => 'royal-pearl-whitening',
                'name' => 'Royal Pearl Whitening',
                'filter' => 'brightening',
                'category' => 'Facial',
                'price' => 650000.00,
                'duration_minutes' => 75,
                'description' => 'Perawatan brightening dengan rumus pearl untuk kulit lebih cerah.',
                'image' => null,
                'action' => 'Book Now',
                'is_primary' => false,
                'alt' => 'Royal Pearl Whitening treatment',
                'is_active' => true,
            ],
        ]);

        Promotion::insert([
            [
                'slug' => 'first-visit-special',
                'code' => 'FIRST20',
                'name' => 'First Visit Special',
                'eyebrow' => 'PROMO MEMBER BARU',
                'description' => 'Nikmati pengalaman perawatan pertamamu dengan harga spesial.',
                'treatment_slug' => 'octa-signature-glow',
                'discount_amount' => 0.00,
                'discount' => '20%',
                'start_date' => '2026-10-01',
                'end_date' => '2026-10-31',
                'date' => '01 Okt - 31 Okt 2026',
                'validity' => 'Berlaku untuk kunjungan pertama',
                'minimum' => 'Untuk semua treatment',
                'style' => 'light',
                'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=900&q=85',
                'alt' => 'Pelanggan tersenyum setelah perawatan wajah',
                'detail_title' => 'Diskon 20% Facial Treatment',
                'detail_description' => 'Manjakan diri dengan perawatan facial pilihan dan nikmati diskon spesial untuk kunjungan pertamamu.',
                'benefits' => json_encode([
                    ['title' => 'Hemat Spesial', 'description' => 'Nikmati potongan 20% untuk pengalaman facial pertamamu di Octa Beauty Care.'],
                    ['title' => 'Free Konsultasi', 'description' => 'Kenali kebutuhan kulit bersama tim kami sebelum memulai perawatan.'],
                ]),
                'terms' => json_encode([
                    'Promo berlaku untuk pelanggan baru pada kunjungan pertama.',
                    'Diskon 20% berlaku untuk Octa Signature Glow selama periode promo.',
                ]),
                'is_active' => true,
            ],
            [
                'slug' => 'brightening-glow',
                'code' => 'GLOW30',
                'name' => 'Paket Brightening Glow',
                'eyebrow' => 'BEST SELLER',
                'description' => 'Rangkaian facial brightening dan serum infusion untuk kulit tampak lebih cerah dan bercahaya.',
                'treatment_slug' => 'royal-pearl-whitening',
                'discount_amount' => 0.00,
                'discount' => '30%',
                'start_date' => '2026-10-01',
                'end_date' => '2026-10-31',
                'date' => '01 Okt - 31 Okt 2026',
                'validity' => 'Perawatan wajah pilihan',
                'minimum' => 'Termasuk serum infusion',
                'style' => 'dark',
                'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=900&q=85',
                'alt' => 'Rangkaian produk perawatan kulit untuk brightening',
                'detail_title' => 'Diskon 30% Paket Brightening Glow',
                'detail_description' => 'Rawat kulit kusam dengan rangkaian brightening yang dipadukan dengan serum infusion.',
                'benefits' => json_encode([
                    ['title' => 'Diskon 30%', 'description' => 'Harga spesial untuk rangkaian brightening pilihan selama periode promo.'],
                    ['title' => 'Free Konsultasi', 'description' => 'Diskusikan kondisi dan kebutuhan kulit dengan tim kami.'],
                ]),
                'terms' => json_encode([
                    'Promo berlaku untuk Paket Brightening Glow yang tercantum pada halaman ini.',
                    'Paket mencakup facial brightening dan serum infusion.',
                ]),
                'is_active' => true,
            ],
            [
                'slug' => 'happy-skin-package',
                'code' => 'HAPPYSKIN',
                'name' => 'Happy Skin Package',
                'eyebrow' => 'PAKET FAVORIT',
                'description' => 'Paket perawatan lengkap untuk kulit yang lebih sehat, lembap, dan terawat setiap hari.',
                'treatment_slug' => 'octa-signature-glow',
                'discount_amount' => 100000.00,
                'discount' => 'Rp100rb',
                'start_date' => '2026-10-01',
                'end_date' => '2026-10-31',
                'date' => '01 Okt - 31 Okt 2026',
                'validity' => 'Berlaku sampai 31 Oktober 2026',
                'minimum' => 'Kuota terbatas setiap hari',
                'style' => 'compact',
                'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=900&q=85',
                'alt' => 'Perawatan facial profesional di klinik kecantikan',
                'detail_title' => 'Hemat Rp100rb Happy Skin Package',
                'detail_description' => 'Luangkan waktu untuk merawat kulit dengan paket pilihan Octa.',
                'benefits' => json_encode([
                    ['title' => 'Hemat Rp100rb', 'description' => 'Dapatkan harga paket yang lebih hemat untuk perawatan pilihan.'],
                ]),
                'terms' => json_encode([
                    'Promo berlaku untuk Happy Skin Package.',
                    'Potongan harga sebesar Rp100.000 selama periode promo.',
                ]),
                'is_active' => true,
            ],
        ]);
    }
}
