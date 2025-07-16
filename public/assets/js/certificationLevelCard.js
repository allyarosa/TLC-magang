  // Add ripple effect to buttons
            document.querySelectorAll('button:not([disabled])').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();

                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    top: ${y}px;
                    left: ${x}px;
                    background: rgba(255, 255, 255, 0.7);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);

                    e.stopPropagation();
                });
            });

            // Animate cards on load
            document.addEventListener('DOMContentLoaded', () => {
                const cards = document.querySelectorAll('.slide-in');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '1';
                    }, 100 + (index * 200));
                });

                // Animate progress bars
                setTimeout(() => {
                    const progressBars = document.querySelectorAll('.progress-bar');
                    progressBars.forEach((bar, index) => {
                        const width = bar.style.width;
                        bar.style.width = '0%';
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 500 + (index * 200));
                    });
                }, 800);
            });

            // Add interactive hover effects
            document.addEventListener('mouseover', (e) => {
                if (e.target.closest('.card-hover')) {
                    e.target.closest('.card-hover').style.transform = 'translateY(-4px) rotateX(2deg)';
                }
            });

            document.addEventListener('mouseout', (e) => {
                if (e.target.closest('.card-hover')) {
                    e.target.closest('.card-hover').style.transform = 'translateY(0) rotateX(0deg)';
                }
            });