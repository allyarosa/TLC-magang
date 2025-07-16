<div>
    <div id="timer" class="text-[#3A6EA5] text-xl font-bold">Loading...</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const endTime = new Date(@js($endTime)).getTime();
            const timerElement = document.getElementById("timer");
            let hasExpired = false;

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    clearInterval(interval);
                    timerElement.innerText = "00:00";
                    timerElement.classList.add('text-red-600', 'animate-pulse');
                    
                    // Only trigger once
                    if (!hasExpired) {
                        hasExpired = true;
                        
                        // Show notification
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                title: 'Waktu Habis!',
                                text: 'Waktu ujian telah berakhir, sistem akan otomatis menyelesaikan ujian Anda.',
                                icon: 'warning',
                                timer: 3000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            });
                        }
                        
                        // Trigger Livewire event (compatible with both v2 and v3)
                        if (typeof Livewire !== 'undefined') {
                            if (Livewire.emit) {
                                // Livewire v2
                                Livewire.emit('timeExpired');
                            } else if (Livewire.dispatch) {
                                // Livewire v3
                                Livewire.dispatch('timeExpired');
                            }
                        }
                        
                        // Fallback: redirect after 3 seconds
                        setTimeout(() => {
                            const finishForm = document.getElementById('finishExamForm');
                            if (finishForm) {
                                finishForm.submit();
                            } else {
                                // Force page reload to trigger finish
                                window.location.reload();
                            }
                        }, 3000);
                    }
                } else {
                    const hours = Math.floor(distance / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    // Format timer display
                    if (hours > 0) {
                        timerElement.innerText = `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
                    } else {
                        timerElement.innerText = `${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
                    }
                    
                    // Warning when 5 minutes left
                    if (distance < 5 * 60 * 1000 && distance > 4 * 60 * 1000) {
                        timerElement.classList.add('text-yellow-600');
                    }
                    
                    // Critical warning when 1 minute left
                    if (distance < 1 * 60 * 1000) {
                        timerElement.classList.remove('text-[#3A6EA5]', 'text-yellow-600');
                        timerElement.classList.add('text-red-600', 'animate-pulse');
                    }
                }
            }, 1000);
        });
    </script>    
</div>