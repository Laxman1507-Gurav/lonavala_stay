<?php
require_once 'includes/header.php';

$featured_villas  = array_filter(getAllVillas(), fn($v) => $v['featured']);
$offers           = getAllOffers();
$testimonials     = getAllTestimonials();
$settings         = getSiteSettings();
?>

<!-- Section 1: Hero Section -->
<section class="relative h-screen flex items-center justify-center bg-primary overflow-hidden">
    <!-- Background Cinematic Image Overlay with Zoom Transition -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat scale-105 animate-[zoomOut_20s_infinite_alternate]" style="background-image: url('assets/images/lonavala .jpg');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-primary/80 via-primary/50 to-primary/90"></div>
    
    <!-- Hero Contents -->
    <div class="relative max-w-5xl mx-auto px-6 text-center text-white z-10 space-y-6 pt-16">
        <h1 class="font-heading text-4xl md:text-6xl lg:text-7xl font-bold tracking-wide leading-tight text-white">
            Luxury Villa's <br class="hidden md:block"> In Lonavala
        </h1>
        <p class="text-gray-300 max-w-2xl mx-auto text-sm md:text-lg leading-relaxed">
            Experience Private Pools, Scenic Views &amp; Premium Hospitality
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
            <a href="villas.php" class="w-full sm:w-auto bg-gold hover:bg-goldHover text-primary font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 shadow-xl">
                Explore Villa's
            </a>
            <a href="contact.php" class="w-full sm:w-auto bg-transparent hover:bg-white/10 text-white border border-white/30 font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300">
                Contact Us
            </a>
        </div>
    </div>

</section>

<!-- Section 2: Villa Highlights Strip -->
<section class="relative -mt-16 z-20 max-w-6xl mx-auto px-6">
    <div class="bg-white/95 backdrop-blur-md shadow-2xl p-6 md:p-8 border-t-4 border-gold">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            <div class="space-y-2">
                <div class="w-12 h-12 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-water-ladder text-gold text-xl"></i>
                </div>
                <h4 class="font-heading font-bold text-primary text-sm">Private Pools</h4>
                <p class="text-xs text-gray-500">All villas include exclusive private pools</p>
            </div>
            <div class="space-y-2">
                <div class="w-12 h-12 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-shield-check text-gold text-xl"></i>
                </div>
                <h4 class="font-heading font-bold text-primary text-sm">Verified Stays</h4>
                <p class="text-xs text-gray-500">Handpicked &amp; quality-tested estates</p>
            </div>
            <div class="space-y-2">
                <div class="w-12 h-12 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-bell-concierge text-gold text-xl"></i>
                </div>
                <h4 class="font-heading font-bold text-primary text-sm">24/7 Concierge</h4>
                <p class="text-xs text-gray-500">Dedicated support around the clock</p>
            </div>
            <div class="space-y-2">
                <div class="w-12 h-12 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-mountain-sun text-gold text-xl"></i>
                </div>
                <h4 class="font-heading font-bold text-primary text-sm">Scenic Views</h4>
                <p class="text-xs text-gray-500">Valley &amp; lakeside premium locations</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Featured Villas -->
<section class="py-24 max-w-7xl mx-auto px-6">
    <div class="text-center space-y-3 mb-16">
        <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Exquisite Collection</span>
        <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Featured Luxury Villas</h2>
        <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($featured_villas as $villa): ?>
            <!-- Villa Card -->
            <div class="bg-white group hover-gold-border flex flex-col justify-between h-full shadow-lg overflow-hidden transition-all duration-500">
                <div class="relative overflow-hidden img-zoom-container h-48 sm:h-56 md:h-60 lg:h-64">
                    <img src="<?= htmlspecialchars($villa['main_image']) ?>" alt="<?= htmlspecialchars($villa['name']) ?>" class="w-full h-full object-cover">
                    <!-- Pool Badge -->
                    <span class="absolute top-4 left-4 bg-primary/95 text-gold text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 border border-gold/40">
                        <i class="fa-solid fa-water-ladder mr-1"></i> Private Pool
                    </span>
                    <!-- Rating -->
                    <span class="absolute bottom-4 right-4 bg-white/95 text-primary text-xs font-semibold px-2.5 py-1 flex items-center">
                        <i class="fa-solid fa-star text-gold mr-1"></i> <?= number_format($villa['rating'], 1) ?>
                    </span>
                </div>

                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center text-xs text-gold font-semibold uppercase tracking-wider">
                            <i class="fa-solid fa-map-marker-alt mr-1"></i> <?= htmlspecialchars($villa['location']) ?>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-primary group-hover:text-gold transition-colors duration-300">
                            <?= htmlspecialchars($villa['name']) ?>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-3">
                            <?= htmlspecialchars($villa['description']) ?>
                        </p>
                    </div>

                    <!-- Highlight Badges -->
                    <div class="grid grid-cols-3 gap-2 border-t border-b border-gray-100 py-4 text-center text-xs text-gray-600">
                        <div>
                            <i class="fa-solid fa-bed text-gold text-sm mb-1 block"></i>
                            <strong><?= $villa['bedrooms'] ?></strong> Bed
                        </div>
                        <div>
                            <i class="fa-solid fa-bath text-gold text-sm mb-1 block"></i>
                            <strong><?= $villa['bathrooms'] ?></strong> Bath
                        </div>
                        <div>
                            <i class="fa-solid fa-users text-gold text-sm mb-1 block"></i>
                            <strong><?= $villa['guests'] ?></strong> Guest
                        </div>
                    </div>

                    <!-- Price & CTA -->
                    <div class="flex items-center justify-between pt-2">
                        <div>
                            <span class="text-[10px] text-gray-400 uppercase tracking-wider block">Price Per Night</span>
                            <span class="text-lg font-bold text-primary"><?= formatPrice($villa['price_per_night']) ?></span>
                        </div>
                        <a href="villa-details.php?id=<?= $villa['id'] ?>" class="bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-wider px-5 py-3.5 transition-all duration-300">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Section 4: About Lonavala Luxury Stay -->
<section class="py-24 bg-white bg-leaf-pattern overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Image Left with Luxury Border Shadow -->
        <div class="relative">
            <div class="border-4 border-gold absolute -top-4 -left-4 w-full h-full pointer-events-none transform -translate-x-2 -translate-y-2 z-0 hidden sm:block"></div>
            <img src="assets/images/Index.jpg" alt="Luxury Estate Living" class="w-full h-[450px] object-cover relative z-10 shadow-2xl">
        </div>

        <!-- Content Right -->
        <div class="space-y-6">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold block">About Our Legacy</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Uncompromising Resort Hospitality</h2>
            <p class="text-gray-600 leading-relaxed">
                Lonavala Luxury Stay is an exclusive portfolio of bespoke properties and vacation rentals. Crafted with a premium hotel-style approach, our properties deliver the ultimate comfort of private residential living mixed with elite resort hospitality.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Whether you seek an infinity pool over the Khandala ridges, a cozy romantic bonfire at Pawna Lake, or a majestic 7-bedroom party villa, we ensure verified properties, private staff assistance, and top-tier amenities.
            </p>
            <div class="pt-4">
                <a href="about.php" class="bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-widest px-8 py-4 transition-all duration-300 inline-block shadow-lg">
                    Know More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Why Choose Us -->
<section class="py-24 bg-cream border-t border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center space-y-3 mb-16">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Our Distinction</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Why Luxury Stays With Us</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-shield-check text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Verified Villas</h3>
                <p class="text-sm text-gray-500">Every single estate is handpicked and undergoes a rigorous quality standard test before listing.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-water-ladder text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Private Pools</h3>
                <p class="text-sm text-gray-500">All properties include clean, private infinity or temperature-controlled pools for absolute isolation.</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-bell-concierge text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Luxury Hospitality</h3>
                <p class="text-sm text-gray-500">Includes a team of trained caretakers, security staff, and professional chefs to cater to your needs.</p>
            </div>
            <!-- Card 4 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-map-pin text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Prime Locations</h3>
                <p class="text-sm text-gray-500">Properties are situated in prime locations offering maximum valley or waterside views.</p>
            </div>
            <!-- Card 5 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-tags text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Best Pricing</h3>
                <p class="text-sm text-gray-500">Direct enquiries mean no third-party platform fees, giving you the best possible luxury rate.</p>
            </div>
            <!-- Card 6 -->
            <div class="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto">
                    <i class="fa-solid fa-headset text-gold text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">24/7 Assistance</h3>
                <p class="text-sm text-gray-500">Our concierge support desk is online round-the-clock to manage inquiries, check-in arrangements, and personalised requests.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Villa Categories -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center space-y-3 mb-16">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Select Your Style</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Explore Categories</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            $categories = [
                ['name' => 'Pool Villas',         'icon' => 'fa-water-ladder',      'desc' => 'Stunning estates with sprawling private pools.'],
                ['name' => 'Family Villas',        'icon' => 'fa-people-roof',       'desc' => 'Multi-bedroom stays designed for family comfort.'],
                ['name' => 'Pet Friendly Villas',  'icon' => 'fa-paw',               'desc' => 'Fenced gardens and play areas for your pets.'],
                ['name' => 'Premium Villas',       'icon' => 'fa-gem',               'desc' => 'Signature estates with bespoke luxury design.'],
            ];
            foreach ($categories as $cat):
            ?>
            <a href="villas.php?villa_type=<?= urlencode($cat['name']) ?>" class="group bg-cream p-8 flex flex-col justify-between hover:bg-primary hover:text-white transition-all duration-500 hover:shadow-2xl border border-gray-100">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-primary transition-all duration-500">
                        <i class="fa-solid <?= $cat['icon'] ?> text-lg"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-primary group-hover:text-white transition-colors duration-300"><?= $cat['name'] ?></h3>
                    <p class="text-sm text-gray-500 group-hover:text-gray-300 transition-colors duration-300"><?= $cat['desc'] ?></p>
                </div>
                <div class="pt-6 flex items-center text-xs font-semibold text-gold uppercase tracking-wider group-hover:translate-x-2 transition-transform duration-300">
                    Browse Category <i class="fa-solid fa-arrow-right ml-2"></i>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 7: Popular Destinations -->
<section id="destinations" class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center space-y-3 mb-16">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Scenic Escapes</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Popular Destinations</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php 
            $destinations = [
                ['name' => 'Lonavala',   'desc' => 'Heart of the hills',    'image' => 'assets/images/gallery/lonavala night.jpg'],
                ['name' => 'Khandala',   'desc' => 'Majestic cliff views',  'image' => 'assets/images/gallery/khandala.jpg'],
                ['name' => 'Pawna Lake', 'desc' => 'Lakeside serenity',     'image' => 'assets/images/gallery/pawna lake.jpg'],
                ['name' => 'Tiger Point','desc' => 'Windy valley clouds',   'image' => 'assets/images/gallery/tiger point.jpg'],
                ['name' => 'Bhushi Dam', 'desc' => 'Waterfall cascades',    'image' => 'assets/images/gallery/bhushi dam.jpg'],
            ];
            foreach ($destinations as $dest):
            ?>
            <a href="villas.php?location=<?= urlencode($dest['name']) ?>" class="group relative h-80 overflow-hidden block shadow-lg">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('<?= $dest['image'] ?>');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/30 to-transparent group-hover:from-primary/95 transition-all duration-300"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                    <h3 class="font-heading text-xl font-bold text-white group-hover:text-gold transition-colors duration-300"><?= $dest['name'] ?></h3>
                    <p class="text-xs text-gray-300"><?= $dest['desc'] ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 8: Special Offers -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center space-y-3 mb-16">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Bespoke Promotions</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Special Packages</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        </div>

        <!-- Swiper Slider Container -->
        <div class="swiper offers-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($offers as $offer): ?>
                    <div class="swiper-slide h-auto">
                        <div class="bg-cream border border-gray-100 hover-gold-border group flex flex-col justify-between h-full shadow-md overflow-hidden transition-all duration-300 p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="bg-gold text-primary font-bold text-xs uppercase px-3 py-1"><?= htmlspecialchars($offer['discount']) ?></span>
                                    <span class="text-xs text-gray-400"><i class="fa-solid fa-clock mr-1"></i> Valid till: <?= date('d M, Y', strtotime($offer['expiry_date'])) ?></span>
                                </div>
                                <h3 class="font-heading text-xl font-bold text-primary group-hover:text-gold transition-colors duration-300"><?= htmlspecialchars($offer['title']) ?></h3>
                                <p class="text-sm text-gray-500 leading-relaxed line-clamp-3"><?= htmlspecialchars($offer['description']) ?></p>
                            </div>
                            <div class="pt-6">
                                <a href="villas.php" class="w-full text-center bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-wider py-3 block transition-all duration-300">
                                    View Villas
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Swiper Navigation -->
            <div class="swiper-button-next !right-2"></div>
            <div class="swiper-button-prev !left-2"></div>
            <div class="swiper-pagination !-bottom-2 pt-6"></div>
        </div>
    </div>
</section>

<!-- Section 9: Testimonials -->
<section class="py-24 bg-primary text-white overflow-hidden relative">
    <div class="max-w-4xl mx-auto px-6 text-center space-y-8 relative z-10">
        <div class="text-center space-y-3 mb-8">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">Guest Experiences</span>
            <h2 class="font-heading text-3xl md:text-5xl text-white font-bold">What Our Guests Say</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        </div>

        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials as $t): ?>
                    <div class="swiper-slide flex flex-col items-center space-y-6">
                        <i class="fa-solid fa-quote-left text-gold/25 text-5xl"></i>
                        <p class="text-gray-300 text-lg md:text-xl font-light italic leading-relaxed max-w-2xl mx-auto">
                            "<?= htmlspecialchars($t['review']) ?>"
                        </p>
                        <div class="flex flex-col items-center space-y-2">
                            <div class="flex text-gold text-xs">
                                <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                                    <i class="fa-solid fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="font-heading font-semibold text-lg text-gold"><?= htmlspecialchars($t['name']) ?></span>
                            <span class="text-xs text-gray-500 uppercase tracking-widest">Verified Luxury Guest</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Navigation -->
            <div class="swiper-button-next !hidden md:!flex"></div>
            <div class="swiper-button-prev !hidden md:!flex"></div>
        </div>
    </div>
</section>

<!-- Section 9.5: Guest Feedback Submission Form -->
<section id="feedback-form-section" class="py-20 bg-cream border-b border-gold/10">
    <div class="max-w-2xl mx-auto px-6">
        <div class="text-center space-y-3 mb-10">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold block">Share Your Stay</span>
            <h2 class="font-heading text-2xl md:text-4xl text-primary font-bold">Leave Your Feedback</h2>
            <div class="w-20 h-0.5 bg-gold mx-auto mt-4"></div>
            <p class="text-gray-500 text-xs leading-relaxed max-w-md mx-auto">
                We hope you had a luxury stay. Please share your experience with us and future guests!
            </p>
        </div>

        <?php if (isset($_SESSION['feedback_success'])): ?>
            <div class="bg-green-50 text-green-700 text-sm p-4 border border-green-200 mb-6 font-semibold flex items-center justify-center gap-2 shadow-sm">
                <i class="fa-solid fa-circle-check text-lg"></i> <?= htmlspecialchars($_SESSION['feedback_success']); unset($_SESSION['feedback_success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['feedback_error'])): ?>
            <div class="bg-red-50 text-red-600 text-sm p-4 border border-red-200 mb-6 font-semibold flex items-center justify-center gap-2 shadow-sm">
                <i class="fa-solid fa-circle-xmark text-lg"></i> <?= htmlspecialchars($_SESSION['feedback_error']); unset($_SESSION['feedback_error']); ?>
            </div>
        <?php endif; ?>

        <form action="submit_feedback.php" method="POST" class="space-y-6 bg-white p-6 md:p-10 shadow-xl border-t-4 border-gold">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Your Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required placeholder="John Doe" class="w-full bg-cream border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                </div>
                <div class="space-y-1">
                    <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Rating <span class="text-red-500">*</span></label>
                    <select name="rating" required class="w-full bg-cream border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                        <option value="5">5 Stars (Excellent)</option>
                        <option value="4">4 Stars (Good)</option>
                        <option value="3">3 Stars (Average)</option>
                        <option value="2">2 Stars (Poor)</option>
                        <option value="1">1 Star (Very Poor)</option>
                    </select>
                </div>
            </div>
            <div class="space-y-1">
                <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Your Experience <span class="text-red-500">*</span></label>
                <textarea name="review" required rows="4" placeholder="Tell us about the pool, the views, local staff, and anything else you loved..." class="w-full bg-cream border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-gold transition-colors duration-300"></textarea>
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="w-full sm:w-auto bg-primary hover:bg-gold text-white hover:text-primary text-xs font-bold uppercase tracking-widest px-10 py-4 transition-all duration-300 shadow-md">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</section>


<!-- Section 11: Enquiry CTA Banner -->
<section class="py-24 bg-primary relative overflow-hidden text-center text-white border-t border-gold/30">
    <div class="absolute inset-0 bg-cover bg-center opacity-20 bg-no-repeat" style="background-image: url('assets/images/hero_bg.png');"></div>
    <div class="relative max-w-4xl mx-auto px-6 space-y-6 z-10">
        <span class="text-gold tracking-[0.25em] uppercase text-xs font-semibold block">Unforgettable Retreats</span>
        <h2 class="font-heading text-3xl md:text-5xl font-bold leading-tight">Ready For Your Luxury Escape? <br> Enquire About Your Dream Villa Today</h2>
        <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-6">
            <a href="contact.php" class="w-full sm:w-auto bg-gold hover:bg-goldHover text-primary font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 shadow-xl">
                <i class="fa-solid fa-envelope mr-2"></i> Contact Us
            </a>
            <a href="https://wa.me/<?= str_replace(['+', ' '], '', $settings['whatsapp']) ?>?text=Hello%2C%20I%20am%20interested%20in%20a%20luxury%20villa%20stay." target="_blank" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-lg"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>


<!-- Initialize Swiper Carousels -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Offers Swiper Setup
        new Swiper('.offers-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 1.5 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });

        // Testimonials Swiper Setup
        new Swiper('.testimonials-swiper', {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });

</script>

<?php require_once 'includes/footer.php'; ?>
