<?php
require_once __DIR__ . '/db.php';
$settings = getSiteSettings();
?>
    <!-- Premium Dark Footer -->
    <footer class="bg-primary text-white pt-16 pb-8 border-t border-gold/20 relative overflow-hidden">
        <!-- Leaf Ornament Background Decoration -->
        <div class="absolute right-0 bottom-0 opacity-5 pointer-events-none transform translate-y-12 translate-x-12">
            <svg width="300" height="300" viewBox="0 0 100 100" fill="none" stroke="#D4AF37" stroke-width="1.5">
                <path d="M10,90 Q50,50 90,10 M90,10 C80,30 60,40 50,50 C40,60 30,80 10,90 C30,80 40,60 50,50 C60,40 80,30 90,10 Z" />
                <path d="M30,70 Q45,60 50,50" />
                <path d="M50,50 Q60,45 70,30" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 relative z-10">
            <!-- Col 1: About Brand -->
            <div class="space-y-4">
                <a href="index.php" class="flex flex-col">
                    <span class="font-heading text-2xl font-bold tracking-widest text-gold">LONAVALA</span>
                    <span class="text-xs uppercase tracking-[0.25em] text-white">Luxury Stay</span>
                </a>
                <p class="text-sm text-gray-400 leading-relaxed pt-2">
                    Indulge in our curated portfolio of private pool villas offering premium hospitality, breathtaking mountain views, and absolute luxury escapes in Lonavala &amp; Khandala.
                </p>
                <div class="flex space-x-4 pt-4">
                    <?php if (!empty($settings['facebook'])): ?>
                        <a href="<?= htmlspecialchars($settings['facebook']) ?>" target="_blank" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:border-gold hover:text-gold transition-all duration-300">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($settings['instagram'])): ?>
                        <a href="<?= htmlspecialchars($settings['instagram']) ?>" target="_blank" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:border-gold hover:text-gold transition-all duration-300">
                            <i class="fa-brands fa-instagram text-sm"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($settings['youtube'])): ?>
                        <a href="<?= htmlspecialchars($settings['youtube']) ?>" target="_blank" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:border-gold hover:text-gold transition-all duration-300">
                            <i class="fa-brands fa-youtube text-sm"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Col 2: Navigation Links -->
            <div>
                <h4 class="font-heading text-lg font-bold tracking-wide text-gold mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-gold">Quick Links</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="index.php" class="hover:text-gold hover:translate-x-1 inline-block transition-all duration-300"><i class="fa-solid fa-chevron-right text-xs text-gold/60 mr-2"></i> Home</a></li>
                    <li><a href="about.php" class="hover:text-gold hover:translate-x-1 inline-block transition-all duration-300"><i class="fa-solid fa-chevron-right text-xs text-gold/60 mr-2"></i> About Us</a></li>
                    <li><a href="villas.php" class="hover:text-gold hover:translate-x-1 inline-block transition-all duration-300"><i class="fa-solid fa-chevron-right text-xs text-gold/60 mr-2"></i> Browse Villas</a></li>
                    <li><a href="offers.php" class="hover:text-gold hover:translate-x-1 inline-block transition-all duration-300"><i class="fa-solid fa-chevron-right text-xs text-gold/60 mr-2"></i> Special Offers</a></li>
                    <li><a href="contact.php" class="hover:text-gold hover:translate-x-1 inline-block transition-all duration-300"><i class="fa-solid fa-chevron-right text-xs text-gold/60 mr-2"></i> Contact &amp; Support</a></li>
                </ul>
            </div>

            <!-- Col 3: Popular Destinations -->
            <div>
                <h4 class="font-heading text-lg font-bold tracking-wide text-gold mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-gold">Destinations</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="villas.php?location=Lonavala" class="hover:text-gold transition-colors duration-300"><i class="fa-solid fa-location-dot text-gold/60 mr-2"></i> Lonavala Stay</a></li>
                    <li><a href="villas.php?location=Khandala" class="hover:text-gold transition-colors duration-300"><i class="fa-solid fa-location-dot text-gold/60 mr-2"></i> Khandala Hills</a></li>
                    <li><a href="villas.php?location=Pawna+Lake" class="hover:text-gold transition-colors duration-300"><i class="fa-solid fa-location-dot text-gold/60 mr-2"></i> Pawna Lakeside</a></li>
                    <li><a href="villas.php?location=Tiger+Point" class="hover:text-gold transition-colors duration-300"><i class="fa-solid fa-location-dot text-gold/60 mr-2"></i> Tiger Point Heights</a></li>
                    <li><a href="villas.php?location=Bhushi+Dam" class="hover:text-gold transition-colors duration-300"><i class="fa-solid fa-location-dot text-gold/60 mr-2"></i> Bhushi Dam Scenic</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact -->
            <div class="space-y-4">
                <h4 class="font-heading text-lg font-bold tracking-wide text-gold mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-gold">Resort Contact</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start">
                        <i class="fa-solid fa-map-marker-alt text-gold mt-1 mr-3"></i>
                        <span><?= htmlspecialchars($settings['address']) ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone text-gold mr-3"></i>
                        <a href="tel:<?= str_replace(' ', '', $settings['phone']) ?>" class="hover:text-gold transition-colors duration-300"><?= htmlspecialchars($settings['phone']) ?></a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope text-gold mr-3"></i>
                        <a href="mailto:<?= htmlspecialchars($settings['email']) ?>" class="hover:text-gold transition-colors duration-300"><?= htmlspecialchars($settings['email']) ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Border Bottom Info -->
        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-white/10 text-center text-xs text-gray-500">
            <p>&copy; <?= date('Y') ?> Lonavala Luxury Stay. All Rights Reserved. Crafted for Scenic Escapes.</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Global Javascript Logics -->
    <script>
        // Header Scroll Animation
        const header = document.getElementById('main-header');
        const navLinks = header.querySelectorAll('nav a');

        function applyScrollStyles() {
            if (window.scrollY > 50) {
                header.classList.remove('bg-transparent', 'py-4', 'md:py-6');
                header.classList.add('bg-primary', 'shadow-2xl', 'py-3', 'md:py-4');
                navLinks.forEach(link => {
                    if (!link.classList.contains('text-gold') && !link.classList.contains('border-gold')) {
                        link.classList.add('text-white');
                    }
                });
            } else {
                header.classList.remove('bg-primary', 'shadow-2xl', 'py-3', 'md:py-4');
                header.classList.add('bg-transparent', 'py-4', 'md:py-6');
                navLinks.forEach(link => {
                    link.classList.remove('text-white');
                });
            }
        }

        window.addEventListener('scroll', applyScrollStyles);
        applyScrollStyles();

        // Mobile Menu Drawer Control
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu && mobileMenuClose) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-x-full');
            });

            mobileMenuClose.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
            });
        }
    </script>
</body>
</html>
