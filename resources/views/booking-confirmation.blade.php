@extends('layouts.website')

@section('meta_title', 'Booking Berhasil | Octa Beauty Care')
@section('meta_description', 'Permintaan booking treatment kamu sudah tersimpan. Simpan kode booking dan tunggu konfirmasi dari tim Octa Beauty Care.')
@section('meta_robots', 'noindex,follow')

@section('content')
    <section class="booking-confirmation-page">
        <div class="container">
            <div class="booking-confirmation-card">
                <span class="booking-confirmation-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7"/></svg>
                </span>
                <span class="eyebrow"><span class="eyebrow-dot"></span> Reservasi berhasil disimpan</span>
                <h1>Booking Berhasil!</h1>
                <p>Permintaan booking treatment kamu sudah kami terima. Tim Octa akan menghubungi melalui WhatsApp untuk mengonfirmasi ketersediaan jadwal.</p>
                <div class="booking-confirmation-reference">
                    <span>Kode Booking</span>
                    <strong>{{ $booking->reference }}</strong>
                    <div>
                        <span>Treatment<strong>{{ $treatment['title'] }}</strong></span>
                        <span>Tanggal<strong>{{ $booking->booking_date->translatedFormat('j M Y') }}</strong></span>
                        <span>Jam<strong>{{ $booking->booking_time }} WIB</strong></span>
                    </div>
                    @if ($booking->promotion_code)
                        <span class="booking-confirmation-promo">Promo <strong>{{ $booking->promotion_code }}</strong></span>
                    @endif
                </div>
                <form method="POST" action="{{ route('booking.proof', $booking->reference) }}" enctype="multipart/form-data" style="margin:24px 0">
                    @csrf
                    <label for="payment_proof">Upload bukti pembayaran (opsional)</label>
                    <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required>
                    <button type="submit" class="button button-pink" style="margin-top:8px">Unggah Bukti</button>
                    @error('payment_proof')<p style="color:#e11d48">{{ $message }}</p>@enderror
                    @if (session('status'))<p style="color:#16a34a">{{ session('status') }}</p>@endif
                </form>
                <div class="booking-confirmation-actions">
                    <a class="button button-outline" href="{{ route('treatment.show', $treatment['slug']) }}">Lihat Treatment</a>
                    <a class="button button-pink" href="https://wa.me/6281234567890?text={{ rawurlencode('Halo Octa Beauty Care, saya ingin konfirmasi booking ' . $booking->reference) }}" target="_blank" rel="noopener noreferrer">Konfirmasi via WhatsApp</a>
                </div>
                <a class="booking-confirmation-home" href="{{ route('home') }}">Kembali ke Beranda</a>
            </div>
        </div>
    </section>
@endsection
