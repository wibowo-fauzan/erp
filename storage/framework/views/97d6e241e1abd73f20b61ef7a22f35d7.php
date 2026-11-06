<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fdeff5">
    <meta name="description" content="Buat akun Octa Beauty Care dan mulai perjalanan merawat kulit kamu bersama kami.">
    <meta name="robots" content="noindex,follow">
    <title>Daftar - Octa Beauty Care</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/beautycare-auth.css')); ?>">
</head>
<body class="auth-body">
    <?php echo $__env->make('partials.auth-decor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="auth-page">
        <div class="auth-card">
            <h1 class="auth-title">Buat akun baru</h1>
            <p class="auth-lead">Daftar akun Beauty Care kamu.</p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->has('google')): ?>
                <div class="auth-alert" role="alert"><?php echo e($errors->first('google')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form class="auth-form" method="POST" action="<?php echo e(route('register.store')); ?>">
                <?php echo csrf_field(); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($google_register): ?>
                    <div class="auth-field auth-gmail-box">
                        <p class="auth-gmail-label">Daftar dengan gmail ini</p>
                        <span class="auth-gmail-value"><?php echo e($google_email); ?></span>
                    </div>

                    <div class="auth-field">
                        <label for="name">Nama lengkap</label>
                        <input
                            id="name"
                            class="auth-input"
                            type="text"
                            name="name"
                            value="<?php echo e(old('name') ?? $google_name ?? ''); ?>"
                            placeholder="Nama kamu"
                            autocomplete="name"
                            required
                            autofocus
                        >
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="auth-error"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="auth-field">
                        <label for="name">Nama lengkap</label>
                        <input
                            id="name"
                            class="auth-input"
                            type="text"
                            name="name"
                            value="<?php echo e(old('name') ?? $google_name ?? ''); ?>"
                            placeholder="Nama kamu"
                            autocomplete="name"
                            required
                            autofocus
                        >
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="auth-error"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="auth-field">
                        <label for="email">Email</label>
                        <input
                            id="email"
                            class="auth-input"
                            type="email"
                            name="email"
                            value="<?php echo e(old('email') ?? $google_email ?? ''); ?>"
                            placeholder="nama@email.com"
                            autocomplete="email"
                            required
                        >
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="auth-error"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="auth-field password-field">
                    <label for="password">Kata sandi</label>
                    <input
                        id="password"
                        class="auth-input"
                        type="password"
                        name="password"
                        placeholder="Buat kata sandi"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Tampilkan atau sembunyikan kata sandi">👁</button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="auth-error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="auth-field password-field">
                    <label for="password_confirmation">Konfirmasi kata sandi</label>
                    <input
                        id="password_confirmation"
                        class="auth-input"
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi kata sandi"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >
                    <button type="button" class="password-toggle" id="passwordToggleConfirm" aria-label="Tampilkan atau sembunyikan kata sandi">👁</button>
                </div>

                <button class="auth-submit" type="submit">Daftar</button>
            </form>

            <p class="auth-alt">Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk</a></p>
            <p class="auth-owner"><a href="<?php echo e(url('/admin/login')); ?>">Masuk sebagai owner atau admin</a></p>
        </div>
    </main>
    <style>
        .password-field{position:relative}
        .auth-input{padding-right:40px}
        .password-toggle{position:absolute;right:20px;top:68%;transform:translateY(-50%);background:white;border-radius:100px;cursor:pointer;display:flex;align-items:center;justify-content:center;width:28px;height:28px;padding:0;color:#64748b;font-size:22px;line-height:1}
        .hidden{display:none}
        .auth-gmail-box{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:16px;margin-bottom:16px}
        .auth-gmail-label{font-size:14px;color:#64748b;margin:0 0 8px 0}
        .auth-gmail-value{display:block;font-size:16px;color:#1e293b;word-break:break-all}
    </style>
    <script>
        const toggle = document.getElementById('passwordToggle');
        const input = document.getElementById('password');
        let shown = false;
        toggle.addEventListener('click', () => {
            shown = !shown;
            input.type = shown ? 'text' : 'password';
            toggle.textContent = shown ? '🙈' : '👁';
        });

        const toggleConfirm = document.getElementById('passwordToggleConfirm');
        const inputConfirm = document.getElementById('password_confirmation');
        let shownConfirm = false;
        toggleConfirm.addEventListener('click', () => {
            shownConfirm = !shownConfirm;
            inputConfirm.type = shownConfirm ? 'text' : 'password';
            toggleConfirm.textContent = shownConfirm ? '🙈' : '👁';
        });
    </script>
</body>
</html>
<?php /**PATH D:\erp\resources\views\auth\register.blade.php ENDPATH**/ ?>