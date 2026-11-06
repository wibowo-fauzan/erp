<div class="beauty-auth">
    <style>
        .beauty-auth {
            --beauty-blue: #4338ca;
            --beauty-deep: #211c80;
            display: grid;
            min-height: 100vh;
            grid-template-columns: minmax(0, 1.08fr) minmax(420px, .92fr);
            background: #fff;
            color: #171717;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .beauty-auth__intro {
            position: relative;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
            padding: clamp(40px, 8vw, 120px);
            background:
                radial-gradient(ellipse at 15% 10%, rgb(138 126 255 / 38%), transparent 38%),
                linear-gradient(145deg, var(--beauty-blue), var(--beauty-deep));
            color: #fff;
        }

        .beauty-auth__intro::before,
        .beauty-auth__intro::after {
            position: absolute;
            width: 760px;
            height: 760px;
            border: 1px solid rgb(255 255 255 / 12%);
            border-radius: 50%;
            content: "";
            pointer-events: none;
        }

        .beauty-auth__intro::before {
            top: 10%;
            left: -420px;
        }

        .beauty-auth__intro::after {
            top: 18%;
            left: -350px;
            width: 620px;
            height: 620px;
        }

        .beauty-auth__brand {
            position: absolute;
            top: 40px;
            left: clamp(40px, 8vw, 120px);
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: .02em;
        }

        .beauty-auth__brand-mark {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border: 1px solid rgb(255 255 255 / 58%);
            border-radius: 15px;
            font-size: 24px;
            line-height: 1;
        }

        .beauty-auth__intro-copy {
            position: relative;
            z-index: 1;
            max-width: 580px;
        }

        .beauty-auth__eyebrow {
            margin: 0 0 20px;
            color: rgb(255 255 255 / 78%);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .beauty-auth__intro h1 {
            margin: 0;
            font-size: clamp(42px, 5.2vw, 72px);
            font-weight: 750;
            letter-spacing: -.055em;
            line-height: 1.08;
        }

        .beauty-auth__intro-copy > p:last-child {
            max-width: 455px;
            margin: 24px 0 0;
            color: rgb(255 255 255 / 82%);
            font-size: 17px;
            line-height: 1.7;
        }

        .beauty-auth__footer {
            position: absolute;
            bottom: 32px;
            left: clamp(40px, 8vw, 120px);
            color: rgb(255 255 255 / 62%);
            font-size: 13px;
        }

        .beauty-auth__panel {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 64px clamp(28px, 7vw, 96px);
        }

        .beauty-auth__content {
            width: min(100%, 420px);
        }

        .beauty-auth__mobile-brand {
            display: none;
            margin-bottom: 44px;
            color: var(--beauty-deep);
            font-size: 19px;
            font-weight: 750;
        }

        .beauty-auth__content h2 {
            margin: 0;
            color: #171717;
            font-size: 32px;
            font-weight: 730;
            letter-spacing: -.035em;
        }

        .beauty-auth__lead {
            margin: 10px 0 30px;
            color: #737373;
            font-size: 14px;
            line-height: 1.6;
        }

        .beauty-auth .fi-simple-page,
        .beauty-auth .fi-simple-page section {
            display: contents;
        }

        .beauty-auth .fi-fo-field-wrp-label {
            color: #404040;
            font-weight: 600;
        }

        .beauty-auth .fi-input-wrp {
            min-height: 50px;
            border-color: #e5e5e5;
            border-radius: 9px;
            box-shadow: none;
        }

        .beauty-auth .fi-input-wrp:focus-within {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgb(99 102 241 / 12%);
        }

        .beauty-auth .fi-fo-checkbox {
            color: #525252;
            font-size: 13px;
        }

        .beauty-auth .fi-ac {
            margin-top: 8px;
        }

        .beauty-auth .beauty-login-submit,
        .beauty-auth .beauty-login-submit button {
            width: 100%;
        }

        .beauty-auth .beauty-login-submit button {
            min-height: 50px;
            justify-content: center;
            border-radius: 9px;
            background: #171717;
            font-size: 14px;
            font-weight: 650;
        }

        .beauty-auth__divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 22px 0;
            color: #a3a3a3;
            font-size: 12px;
        }

        .beauty-auth__divider::before,
        .beauty-auth__divider::after {
            height: 1px;
            flex: 1;
            background: #e5e5e5;
            content: "";
        }

        .beauty-auth__google {
            display: flex;
            min-height: 50px;
            align-items: center;
            justify-content: center;
            gap: 11px;
            border: 1px solid #dedede;
            border-radius: 9px;
            color: #262626;
            font-size: 14px;
            font-weight: 650;
            text-decoration: none;
            transition: background .15s ease, border-color .15s ease;
        }

        .beauty-auth__google:hover {
            border-color: #bdbdbd;
            background: #fafafa;
        }

        .beauty-auth__signup {
            margin: 26px 0 0;
            color: #737373;
            font-size: 13px;
            text-align: center;
        }

        .beauty-auth__signup a {
            color: var(--beauty-blue);
            font-weight: 700;
            text-decoration: none;
        }

        .beauty-auth__signup a:hover {
            text-decoration: underline;
        }

        @media (max-width: 800px) {
            .beauty-auth {
                grid-template-columns: 1fr;
            }

            .beauty-auth__intro {
                display: none;
            }

            .beauty-auth__panel {
                min-height: 100vh;
                padding: 44px 24px;
            }

            .beauty-auth__mobile-brand {
                display: block;
            }
        }
    </style>

    <section class="beauty-auth__intro" aria-label="Beauty Care">
        <div class="beauty-auth__brand">
            <span class="beauty-auth__brand-mark" aria-hidden="true">✦</span>
            <span>Beauty Care</span>
        </div>

        <div class="beauty-auth__intro-copy">
            <p class="beauty-auth__eyebrow">Ruang cantikmu dimulai di sini</p>
            <h1>Rawat diri.<br>Berbagi percaya diri.</h1>
            <p>Masuk ke Beauty Care untuk mengelola akun dan menikmati pengalaman perawatan yang lebih personal.</p>
        </div>

        <div class="beauty-auth__footer">© <?php echo e(now()->year); ?> Beauty Care</div>
    </section>

    <section class="beauty-auth__panel">
        <div class="beauty-auth__content">
            <div class="beauty-auth__mobile-brand">✦ &nbsp; Beauty Care</div>
            <h2>Login owner &amp; admin</h2>
            <p class="beauty-auth__lead">Masuk ke panel administrasi Beauty Care menggunakan email dan kata sandi.</p>

            <?php if (isset($component)) { $__componentOriginald09a0ea6d62fc9155b01d885c3fdffb3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald09a0ea6d62fc9155b01d885c3fdffb3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.form.index','data' => ['id' => 'form','wire:submit' => 'authenticate']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'form','wire:submit' => 'authenticate']); ?>
                <?php echo e($this->form); ?>


                <?php if (isset($component)) { $__componentOriginal742ef35d02cb00943edd9ad8ebf61966 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal742ef35d02cb00943edd9ad8ebf61966 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.form.actions','data' => ['actions' => $this->getCachedFormActions(),'fullWidth' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::form.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getCachedFormActions()),'full-width' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal742ef35d02cb00943edd9ad8ebf61966)): ?>
<?php $attributes = $__attributesOriginal742ef35d02cb00943edd9ad8ebf61966; ?>
<?php unset($__attributesOriginal742ef35d02cb00943edd9ad8ebf61966); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal742ef35d02cb00943edd9ad8ebf61966)): ?>
<?php $component = $__componentOriginal742ef35d02cb00943edd9ad8ebf61966; ?>
<?php unset($__componentOriginal742ef35d02cb00943edd9ad8ebf61966); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald09a0ea6d62fc9155b01d885c3fdffb3)): ?>
<?php $attributes = $__attributesOriginald09a0ea6d62fc9155b01d885c3fdffb3; ?>
<?php unset($__attributesOriginald09a0ea6d62fc9155b01d885c3fdffb3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald09a0ea6d62fc9155b01d885c3fdffb3)): ?>
<?php $component = $__componentOriginald09a0ea6d62fc9155b01d885c3fdffb3; ?>
<?php unset($__componentOriginald09a0ea6d62fc9155b01d885c3fdffb3); ?>
<?php endif; ?>

            <p class="beauty-auth__signup">
                Login user? <a href="<?php echo e(route('login')); ?>">Ke halaman login user</a>
            </p>
        </div>
    </section>
</div>
<?php /**PATH D:\erp\resources\views\filament\auth\login.blade.php ENDPATH**/ ?>