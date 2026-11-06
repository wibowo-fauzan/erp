<?php
    $authBackground = 'images/auth-background.JPEG';
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(public_path($authBackground))): ?>
    <img class="auth-bg" src="<?php echo e(asset($authBackground)); ?>" alt="" aria-hidden="true">
<?php else: ?>
    <?php echo $__env->make('partials.auth-decor-svg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\erp\resources\views/partials/auth-decor.blade.php ENDPATH**/ ?>