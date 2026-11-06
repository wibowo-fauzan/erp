<?php
    $seoTitle = trim($__env->yieldContent('meta_title')) ?: 'Octa Beauty Care | Kulit Sehat, Cantik Setiap Hari';
    $seoDescription = trim($__env->yieldContent('meta_description')) ?: 'Temukan inspirasi perawatan wajah, kulit, dan tubuh di Octa Beauty Care. Nikmati pengalaman kecantikan yang nyaman dan personal.';
    $canonicalUrl = url()->current();
    $siteName = 'Octa Beauty Care';
    $ogLocale = 'id_ID';
    $socialImage = trim($__env->yieldContent('meta_image')) ?: 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85';
    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'WebSite',
                '@id' => url('/#website'),
                'name' => $siteName,
                'url' => url('/'),
                'description' => $seoDescription,
                'inLanguage' => 'id',
            ],
            [
                '@type' => 'BeautySalon',
                '@id' => url('/#business'),
                'name' => $siteName,
                'url' => url('/'),
                'image' => $socialImage,
                'description' => $seoDescription,
            ],
        ],
    ];
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fbf8f5">
<meta name="description" content="<?php echo e($seoDescription); ?>">
<meta name="robots" content="<?php echo $__env->yieldContent('meta_robots', 'index,follow'); ?>">
<link rel="canonical" href="<?php echo e($canonicalUrl); ?>">
<title><?php echo e($seoTitle); ?></title>

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo e($siteName); ?>">
<meta property="og:title" content="<?php echo e($seoTitle); ?>">
<meta property="og:description" content="<?php echo e($seoDescription); ?>">
<meta property="og:url" content="<?php echo e($canonicalUrl); ?>">
<meta property="og:locale" content="<?php echo e($ogLocale); ?>">
<meta property="og:image" content="<?php echo e($socialImage); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Octa Beauty Care - layanan perawatan kulit dan kecantikan">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seoTitle); ?>">
<meta name="twitter:description" content="<?php echo e($seoDescription); ?>">
<meta name="twitter:image" content="<?php echo e($socialImage); ?>">

<script type="application/ld+json"><?php echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>
<?php /**PATH D:\erp\resources\views/partials/seo.blade.php ENDPATH**/ ?>