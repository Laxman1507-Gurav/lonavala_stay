<?php require_once 'includes/header.php'; ?>

<!-- Header Hero Spacer -->
<div class="h-28 bg-primary"></div>

<!-- About Title Banner -->
<section class="bg-primary text-white py-16 px-6 border-b border-gold/15 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-10 bg-no-repeat" style="background-image: url('assets/images/lonavala .jpg');"></div>
    <div class="relative max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4 z-10">
        <div>
            <span class="text-gold tracking-[0.25em] uppercase text-xs font-semibold">The Spirit of Hospitality</span>
            <h1 class="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">Our Story & Legacy</h1>
        </div>
        <div class="text-sm text-gray-400">
            <a href="index.php" class="hover:text-gold transition-colors duration-300">Home</a> &bull; <span class="text-gold">About Us</span>
        </div>
    </div>
</section>

<!-- Our Story (Storytelling Layout) -->
<section class="py-24 max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
    <div class="space-y-6">
        <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold block">Crafting Scenic Escapes</span>
        <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Resort Stays redone with Villa Privacy</h2>
        <p class="text-gray-600 leading-relaxed">
            Founded in 2018, Lonavala Luxury Stay set out with a simple mission: to bridge the gap between high-end 5-star hotel services and the absolute, unintruded privacy of private luxury estates.
        </p>
        <p class="text-gray-600 leading-relaxed">
            We recognized that today's discerning traveler seeks more than just a room; they search for spaces where families can gather, friends can reconnect, and couples can find romance under open skies—all without compromising on housekeeping, culinary standard, and reliable concierge support.
        </p>
        <p class="text-gray-600 leading-relaxed">
            Today, our handpicked portfolio comprises only the finest premium structures across Lonavala, Khandala, and surrounding lake regions, verified and maintained with continuous audits.
        </p>
    </div>

    <!-- Right: Collage image framing -->
    <div class="relative">
        <div class="border-4 border-gold absolute -bottom-4 -right-4 w-full h-full pointer-events-none transform translate-x-2 translate-y-2 z-0 hidden sm:block"></div>
        <img src="assets/images/lonavala stay.png" alt="Villa story background" class="w-full h-[450px] object-cover relative z-10 shadow-2xl">
    </div>
</section>

<!-- Animated Counters Section -->
<section class="py-16 bg-primary text-white border-t border-b border-gold/20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <!-- Counter 1 -->
        <div class="space-y-2">
            <span class="font-heading text-4xl md:text-5xl font-bold text-gold block count-number" data-target="10">0</span>
            <span class="text-xs uppercase tracking-widest text-gray-400">Luxury Villas</span>
        </div>
        <!-- Counter 2 -->
        <div class="space-y-2">
            <span class="font-heading text-4xl md:text-5xl font-bold text-gold block count-number" data-target="1000">0</span>
            <span class="text-xs uppercase tracking-widest text-gray-400">Happy Guests Stays</span>
        </div>
        <!-- Counter 3 -->
        <div class="space-y-2">
            <span class="font-heading text-4xl md:text-5xl font-bold text-gold block"><span class="count-number" data-target="4">0</span>.<span class="count-number" data-target="9">0</span></span>
            <span class="text-xs uppercase tracking-widest text-gray-400">Average Rating</span>
        </div>
        <!-- Counter 4 -->
        <div class="space-y-2">
            <span class="font-heading text-4xl md:text-5xl font-bold text-gold block count-number" data-target="10">0</span>
            <span class="text-xs uppercase tracking-widest text-gray-400">Years of Service</span>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-24 bg-white bg-leaf-pattern">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Mission Card -->
        <div class="bg-cream p-10 border border-gray-100 hover:shadow-lg transition-shadow duration-500 space-y-4">
            <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold">
                <i class="fa-solid fa-compass text-xl"></i>
            </div>
            <h3 class="font-heading text-2xl font-bold text-primary">Our Mission</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                To offer curated, ultra-premium villa stays that inspire travelers, offering absolute private pool access, bespoke customized dining experiences, and flawless local assistance. We seek to make booking luxury stays direct, secure, and personal.
            </p>
        </div>

        <!-- Vision Card -->
        <div class="bg-cream p-10 border border-gray-100 hover:shadow-lg transition-shadow duration-500 space-y-4">
            <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold">
                <i class="fa-solid fa-eye text-xl"></i>
            </div>
            <h3 class="font-heading text-2xl font-bold text-primary">Our Vision</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                To build Maharashtra's most trusted direct-booking luxury accommodation brand, setting new benchmarks in private home hospitality and scenic tourist experiences.
            </p>
        </div>
    </div>
</section>

<!-- Hospitality Standards -->
<section class="py-24 max-w-7xl mx-auto px-6 border-t border-gray-100">
    <div class="text-center space-y-3 mb-16">
        <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Quality First</span>
        <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Premium Hospitality Standards</h2>
        <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-6 text-center space-y-3">
            <i class="fa-solid fa-jug-detergent text-gold text-3xl"></i>
            <h4 class="font-heading text-lg font-bold text-primary">100% Sanitized Linen</h4>
            <p class="text-xs text-gray-500">Every room is detailed and fitted with dry-cleaned, premium thread-count white linens before check-in.</p>
        </div>
        <div class="p-6 text-center space-y-3">
            <i class="fa-solid fa-kitchen-set text-gold text-3xl"></i>
            <h4 class="font-heading text-lg font-bold text-primary">Gourmet Dining Options</h4>
            <p class="text-xs text-gray-500">Hire private professional chefs specialized in authentic local cuisines or modern global delicacies.</p>
        </div>
        <div class="p-6 text-center space-y-3">
            <i class="fa-solid fa-clock-rotate-left text-gold text-3xl"></i>
            <h4 class="font-heading text-lg font-bold text-primary">Swift Check-In Process</h4>
            <p class="text-xs text-gray-500">Our on-site caretakers facilitate zero-wait digital key deliveries and property orientations.</p>
        </div>
    </div>
</section>

<!-- Animated Counters Script logic -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll('.count-number');
        const speed = 100; // Counter speed

        const startCounting = (counter) => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = Math.ceil(target / speed);

                if (count < target) {
                    counter.innerText = count + inc;
                    setTimeout(updateCount, 25);
                } else {
                    counter.innerText = target;
                    // Append plus sign if needed
                    if (target === 50 || target === 5000 || target === 10) {
                        counter.innerText += "+";
                    }
                }
            };
            updateCount();
        };

        // Trigger on visibility
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounting(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>

<?php require_once 'includes/footer.php'; ?>
