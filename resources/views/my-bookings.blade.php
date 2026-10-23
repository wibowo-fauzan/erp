@extends('layouts.website')

@section('content')
<section class="container" style="padding:48px 0">
    <h1 style="font-family:'Playfair Display',serif;margin-bottom:24px">Booking Saya</h1>
    @if ($bookings->isEmpty())
        <p>Belum ada booking. <a href="{{ route('booking.create') }}">Buat booking sekarang</a>.</p>
    @else
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Referensi</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Treatment</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Tanggal</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Waktu</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Status</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $booking->reference }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $treatments[$booking->treatment_slug]['name'] ?? $booking->treatment_slug }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $booking->booking_date->format('d M Y') }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $booking->booking_time }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $booking->status }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5">{{ $booking->payment_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</section>
@endsection