

<?php $__env->startSection('meta_title', 'Booking Treatment | Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', 'Pilih treatment, jadwal, dan waktu kunjungan di Octa Beauty Care. Reservasi perawatan kulit dengan mudah melalui formulir booking kami.'); ?>
<?php $__env->startSection('meta_robots', 'noindex,follow'); ?>

<?php $__env->startSection('content'); ?>
    <div class="booking-page">
        <section class="booking-hero">
            <div class="container booking-hero-inner">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Perawatan untuk dirimu</span>
                <h1>Booking Treatment</h1>
                <p>Pilih perawatan, tanggal, dan waktu yang sesuai dengan kebutuhanmu.</p>
            </div>
        </section>

        <div class="container booking-progress" aria-label="Tahapan booking">
            <span class="booking-progress-step is-active"><span>01</span><strong>Pilih Treatment</strong></span>
            <span class="booking-progress-line" aria-hidden="true"></span>
            <span class="booking-progress-step"><span>02</span><strong>Pilih Jadwal</strong></span>
            <span class="booking-progress-line" aria-hidden="true"></span>
            <span class="booking-progress-step"><span>03</span><strong>Data Diri</strong></span>
            <span class="booking-progress-line" aria-hidden="true"></span>
            <span class="booking-progress-step"><span>04</span><strong>Konfirmasi</strong></span>
        </div>

        <div class="container booking-layout">
            <form class="booking-form" method="POST" action="<?php echo e(route('booking.store')); ?>" id="booking-form">
                <?php echo csrf_field(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="booking-errors" role="alert">
                        <strong>Periksa kembali data booking kamu.</strong>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <section class="booking-panel" aria-labelledby="booking-treatment-title">
                    <div class="booking-panel-heading">
                        <div><span>01</span><h2 id="booking-treatment-title">Pilih Treatment</h2></div>
                        <span class="booking-panel-aside"><?php echo e(count($treatments)); ?> layanan tersedia</span>
                    </div>
                    <div class="booking-treatment-grid">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="booking-treatment-option">
                                <input type="radio" name="treatment_slug" value="<?php echo e($treatment['slug']); ?>" data-title="<?php echo e($treatment['title']); ?>" data-price="<?php echo e($treatment['price']); ?>" <?php if(old('treatment_slug', $selectedTreatment['slug']) === $treatment['slug']): echo 'checked'; endif; ?>>
                                <span class="booking-treatment-card">
                                    <span class="booking-treatment-image"><img src="<?php echo e($treatment['image']); ?>" alt="" loading="lazy"></span>
                                    <span class="booking-treatment-info">
                                        <strong><?php echo e($treatment['title']); ?></strong>
                                        <small><?php echo e($treatment['duration']); ?></small>
                                        <span><?php echo e($treatment['price']); ?></span>
                                    </span>
                                </span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['treatment_slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </section>

                <section class="booking-panel" aria-labelledby="booking-date-title">
                    <div class="booking-panel-heading">
                        <div><span>02</span><h2 id="booking-date-title">Pilih Jadwal</h2></div>
                    </div>
                    <div class="booking-date-time">
                        <div class="booking-calendar">
                            <div class="booking-calendar-heading">
                                <button type="button" id="booking-prev-month" aria-label="Bulan sebelumnya">←</button>
                                <strong id="booking-calendar-month"></strong>
                                <button type="button" id="booking-next-month" aria-label="Bulan berikutnya">→</button>
                            </div>
                            <div class="booking-calendar-grid booking-calendar-weekdays" aria-hidden="true">
                                <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                            </div>
                            <div class="booking-calendar-grid" id="booking-calendar-days" role="group" aria-label="Pilih tanggal booking"></div>
                            <div class="booking-calendar-legend">
                                <span class="booking-calendar-legend-dot"></span> Tidak tersedia
                            </div>
                            <input type="hidden" id="booking-date-input" name="booking_date" value="<?php echo e($selectedDate); ?>" required>
                            <p class="booking-calendar-selected" id="booking-calendar-selected" aria-live="polite"></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['booking_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="booking-time-panel">
                            <h3>Jam Tersedia</h3>
                            <p>Pilih waktu kunjungan</p>
                            <div class="booking-time-grid">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label>
                                        <input type="radio" name="booking_time" value="<?php echo e($time); ?>" <?php if(old('booking_time', $availableTimes[0] ?? '-') === $time): echo 'checked'; endif; ?>>
                                        <span><?php echo e($time); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['booking_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </section>

                <section class="booking-panel" aria-labelledby="booking-customer-title">
                    <div class="booking-panel-heading">
                        <div><span>03</span><h2 id="booking-customer-title">Data Diri</h2></div>
                    </div>
                    <div class="booking-customer-grid">
                        <div class="booking-field">
                            <label for="booking-name">Nama Lengkap</label>
                            <input id="booking-name" name="name" type="text" value="<?php echo e(old('name', $userName ?? '')); ?>" autocomplete="name" maxlength="120" placeholder="Nama sesuai identitas" required>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="booking-field">
                            <label for="booking-phone">Nomor WhatsApp</label>
                            <input id="booking-phone" name="phone" type="tel" value="<?php echo e(old('phone', $userPhone ?? '')); ?>" autocomplete="tel" maxlength="30" placeholder="08xxxxxxxxxx" required>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="booking-field booking-field-full">
                            <label for="booking-email">Email</label>
                            <input id="booking-email" name="email" type="email" value="<?php echo e(old('email', $userEmail ?? '')); ?>" autocomplete="email" maxlength="255" placeholder="nama@email.com" required>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="booking-field booking-field-full">
                            <label for="booking-notes">Catatan Tambahan <span>(Opsional)</span></label>
                            <textarea id="booking-notes" name="notes" rows="3" maxlength="1000" placeholder="Ceritakan kebutuhan atau kondisi kulit yang perlu kami ketahui"><?php echo e(old('notes')); ?></textarea>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedPromotion): ?>
                        <div class="booking-applied-promo">
                            <span aria-hidden="true">✦</span>
                            Promo <strong><?php echo e($selectedPromotion['title']); ?></strong>
                            <span class="booking-applied-code"><?php echo e($selectedPromotion['code']); ?></span>
                            <input type="hidden" name="promotion_slug" value="<?php echo e($selectedPromotion['slug']); ?>">
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <label class="booking-terms">
                        <input type="checkbox" name="terms" value="1" <?php if(old('terms')): echo 'checked'; endif; ?> required>
                        <span>Saya menyetujui data booking digunakan untuk keperluan reservasi dan konfirmasi jadwal.</span>
                    </label>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="booking-field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </section>
            </form>

            <aside class="booking-summary-column">
                <section class="booking-summary-card" aria-labelledby="booking-summary-title">
                    <span class="booking-summary-kicker">Ringkasan Booking</span>
                    <h2 id="booking-summary-title">Detail Reservasi</h2>
                    <dl>
                        <div><dt>Treatment</dt><dd id="booking-summary-treatment"><?php echo e($selectedTreatment['title']); ?></dd></div>
                        <div><dt>Tanggal &amp; Jam</dt><dd id="booking-summary-date"><?php echo e(\Illuminate\Support\Carbon::parse($selectedDate)->translatedFormat('D, j M Y')); ?> · <?php echo e(old('booking_time', $availableTimes[0] ?? '-')); ?></dd></div>
                        <div><dt>Nama</dt><dd id="booking-summary-name"><?php echo e(old('name', $userName ?? 'Lengkapi data diri')); ?></dd></div>
                    </dl>
                    <div class="booking-summary-total"><span>Estimasi biaya</span><strong id="booking-summary-price"><?php echo e($selectedTreatment['price']); ?></strong></div>
                    <button class="button button-pink booking-submit" type="submit" form="booking-form">Konfirmasi Booking <span aria-hidden="true">→</span></button>
                    <p class="booking-summary-note">Tim kami akan menghubungi kamu untuk konfirmasi ketersediaan jadwal.</p>
                </section>
                <div class="booking-help-card">
                    <span aria-hidden="true">♡</span>
                    <p>Perlu bantuan? Tim kami siap membantu memilih treatment dan jadwal yang sesuai.</p>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Hubungi via WhatsApp</a>
                </div>
            </aside>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (() => {
            const dateInput = document.getElementById('booking-date-input');
            const calendarDays = document.getElementById('booking-calendar-days');
            const monthLabel = document.getElementById('booking-calendar-month');
            const dateSummary = document.getElementById('booking-summary-date');
            const selectedDateLabel = document.getElementById('booking-calendar-selected');
            const treatmentInputs = Array.from(document.querySelectorAll('input[name="treatment_slug"]'));
            const timeInputs = Array.from(document.querySelectorAll('input[name="booking_time"]'));
            const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
            const minimumDate = new Date(`${<?php echo json_encode($minimumDate, 15, 512) ?>}T12:00:00`);
            const maximumDate = new Date(`${<?php echo json_encode($maximumDate, 15, 512) ?>}T12:00:00`);
            const availableDates = new Set(<?php echo json_encode($availableDates, 15, 512) ?>);
            const blockedDates = <?php echo json_encode($blockedDates, 15, 512) ?>;
            let visibleMonth = new Date(minimumDate.getFullYear(), minimumDate.getMonth(), 1);

            const formatDate = (value) => {
                const [year, month, day] = value.split('-').map(Number);
                const date = new Date(year, month - 1, day, 12);

                return `${dayNames[date.getDay()]}, ${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear()}`;
            };

            const showBlockedInfo = (info) => {
                const startDate = info?.start_date ? formatDate(info.start_date) : '-';
                const endDate = info?.end_date ? formatDate(info.end_date) : '-';
                const timeRange = info?.start_time && info?.end_time
                    ? `${info.start_time} – ${info.end_time}`
                    : '-';
                const typeLabel = info?.type === 'full_day' ? 'Hari Penuh'
                    : info?.type === 'partial_day' ? 'Parcial (Jam Tertentu)'
                    : info?.type === 'recurring' ? 'Berulang (Setiap Minggu)'
                    : '-';

                Swal.fire({
                    title: `<strong>${info?.title || 'Tidak tersedia'}</strong>`,
                    html: `
                        <div style="text-align:left; font-size:14px; line-height:1.6">
                            <p style="margin:4px 0"><strong>Tanggal:</strong> ${startDate}${endDate && endDate !== startDate ? ' s/d ' + endDate : ''}</p>
                            <p style="margin:4px 0"><strong>Waktu:</strong> ${timeRange}</p>
                            <p style="margin:4px 0"><strong>Tipe:</strong> ${typeLabel}</p>
                            <p style="margin:4px 0"><strong>Keterangan:</strong> ${info?.description || 'Tidak ada keterangan.'}</p>
                        </div>
                    `,
                    icon: 'warning',
                    confirmButtonText: 'Mengerti',
                });
            };

            const renderCalendar = () => {
                const year = visibleMonth.getFullYear();
                const month = visibleMonth.getMonth();
                const firstWeekday = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const minValue = minimumDate.toISOString().slice(0, 10);
                const maxValue = maximumDate.toISOString().slice(0, 10);

                monthLabel.textContent = `${monthNames[month]} ${year}`;
                calendarDays.replaceChildren();

                for (let blank = 0; blank < firstWeekday; blank += 1) {
                    const spacer = document.createElement('span');
                    spacer.className = 'booking-calendar-spacer';
                    spacer.setAttribute('aria-hidden', 'true');
                    calendarDays.append(spacer);
                }

                for (let day = 1; day <= daysInMonth; day += 1) {
                    const value = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const button = document.createElement('button');
                    const isInRange = value >= minValue && value <= maxValue;
                    const isAvailable = isInRange && availableDates.has(value);
                    const isBlocked = isInRange && (!isAvailable || blockedDates[value]);
                    const blockedInfo = isBlocked ? blockedDates[value] : null;
                    let disabledReason = '';
                    let statusClass = '';
                    if (!isInRange) {
                        disabledReason = value < minValue ? 'Tanggal sudah lewat' : 'Di luar jangkauan tanggal tersedia';
                        statusClass = 'booking-calendar-day-disabled';
                    } else if (isBlocked) {
                        disabledReason = blockedInfo?.title || 'Tidak tersedia';
                        statusClass = 'booking-calendar-day-blocked';
                    }
                    button.type = 'button';
                    button.textContent = day;
                    button.dataset.date = value;
                    button.dataset.blocked = isBlocked ? '1' : '';
                    if (blockedInfo) {
                        button.dataset.blockedTitle = blockedInfo.title ?? '';
                        button.dataset.blockedDescription = blockedInfo.description ?? '';
                    }
                    if (statusClass) {
                        button.classList.add(statusClass);
                    } else {
                        button.disabled = false;
                    }
                    button.setAttribute('aria-label', formatDate(value));
                    if (disabledReason) {
                        button.setAttribute('title', disabledReason);
                    }

                    if (dateInput.value === value) {
                        button.classList.add('is-selected');
                    }

                    button.addEventListener('click', () => {
                        if (isBlocked) {
                            showBlockedInfo(blockedInfo);
                            return;
                        }
                        if (!isInRange) {
                            return;
                        }
                        dateInput.value = value;
                        selectedDateLabel.textContent = `Tanggal dipilih: ${formatDate(value)}`;
                        dateSummary.textContent = `${formatDate(value)} · ${document.querySelector('input[name="booking_time"]:checked')?.value || ''}`;
                        renderCalendar();
                    });

                    calendarDays.append(button);
                }
                    document.getElementById('booking-prev-month').disabled =
                        year === minimumDate.getFullYear() && month <= minimumDate.getMonth();
                    document.getElementById('booking-next-month').disabled =
                        year === maximumDate.getFullYear() && month >= maximumDate.getMonth();
            };

            const syncSummary = () => {
                const treatment = treatmentInputs.find((input) => input.checked);
                const time = timeInputs.find((input) => input.checked);
                const name = document.getElementById('booking-name').value.trim();

                if (treatment) {
                    document.getElementById('booking-summary-treatment').textContent = treatment.dataset.title;
                    document.getElementById('booking-summary-price').textContent = treatment.dataset.price;
                }

                if (dateInput.value) {
                    dateSummary.textContent = `${formatDate(dateInput.value)} · ${time?.value || ''}`;
                    selectedDateLabel.textContent = `Tanggal dipilih: ${formatDate(dateInput.value)}`;
                }

                document.getElementById('booking-summary-name').textContent = name || 'Lengkapi data diri';
            };

            document.getElementById('booking-prev-month').addEventListener('click', () => {
                visibleMonth = new Date(visibleMonth.getFullYear(), visibleMonth.getMonth() - 1, 1);
                renderCalendar();
            });

            document.getElementById('booking-next-month').addEventListener('click', () => {
                visibleMonth = new Date(visibleMonth.getFullYear(), visibleMonth.getMonth() + 1, 1);
                renderCalendar();
            });

            [...treatmentInputs, ...timeInputs].forEach((input) => input.addEventListener('change', syncSummary));
            document.getElementById('booking-name').addEventListener('input', syncSummary);
            renderCalendar();
            syncSummary();
        })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views/booking.blade.php ENDPATH**/ ?>