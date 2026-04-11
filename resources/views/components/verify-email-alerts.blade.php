<div>
    @if (session('alert_verified') === 'success')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '🎉 Email Terverifikasi!',
                    html: `
                    <div style="text-align:center; padding: 8px 0;">
                        <p style="color:#374151; font-size:16px; margin-bottom:8px;">
                            Selamat datang di <strong>TLC Program</strong>!
                        </p>
                        <p style="color:#6B7280; font-size:14px;">
                            Akun Anda sudah aktif dan siap digunakan.<br>
                            Silakan mulai perjalanan sertifikasi Anda.
                        </p>
                    </div>
                `,
                    confirmButtonText: 'Mulai Sekarang',
                    confirmButtonColor: '#1D4E89',
                    background: '#fff',
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-xl px-8 py-3 text-base font-semibold',
                    },
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    timer: 8000,
                    timerProgressBar: true,
                });
            });
        </script>
    @elseif(session('alert_verified') === 'already')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'info',
                    title: 'Email Sudah Terverifikasi',
                    text: 'Akun Anda sudah aktif sebelumnya. Selamat datang kembali!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#1D4E89',
                    timer: 5000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif
</div>
