<?php

if (! function_exists('rupiah')) {
    /**
     * Format nominal ke format Rupiah, konsisten di seluruh aplikasi.
     * Contoh: 250000 -> "Rp 250.000"
     */
    function rupiah($value): string
    {
        $numeric = is_numeric($value) ? (float) $value : 0;

        return 'Rp '.number_format($numeric, 0, ',', '.');
    }
}

if (! function_exists('rupiahLabel')) {
    /**
     * Kembalikan label harga yang aman ditampilkan, dengan fallback ke format Rupiah.
     */
    function rupiahLabel($value, ?string $label = null): string
    {
        if ($label !== null && trim($label) !== '') {
            return trim($label);
        }

        if (is_numeric($value) && (float) $value === 0) {
            return 'Gratis';
        }

        return rupiah($value);
    }
}
