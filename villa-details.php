<?php
require_once 'includes/header.php';

$settings = getSiteSettings();
$villa_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$villa    = getVillaById($villa_id);

if (!$villa) {
    header('Location: villas.php');
    exit;
}
?>

<!-- Section 1: Hero Banner with Villa Name -->
<section class="relative h-[60vh] md:h-[75vh] flex items-center justify-center bg-primary overflow-hidden">
    <!-- Cinematic Cover Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-1000 scale-105" style="background-image: url('<?= htmlspecialchars($villa['main_image']) ?>');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-primary/80 via-primary/45 to-primary/95"></div>
    
    <!-- Hero Contents -->
    <div class="relative max-w-5xl mx-auto px-6 text-center text-white z-10 space-y-4 pt-20">
        <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold block">
            <i class="fa-solid fa-map-marker-alt mr-1"></i> <?= htmlspecialchars($villa['location']) ?> Stays
        </span>
        <h1 class="font-heading text-4xl md:text-6xl lg:text-7xl font-bold tracking-wide leading-tight text-white drop-shadow-lg">
            <?= htmlspecialchars($villa['name']) ?>
        </h1>
        <div class="w-24 h-0.5 bg-gold mx-auto my-6"></div>
        <div class="text-xl md:text-3xl font-semibold text-gold">
            <?= formatPrice($villa['price_per_night']) ?> <span class="text-sm font-normal text-gray-300">/ Night</span>
        </div>
    </div>
</section>

<!-- Section 2 to 6: Details and Enquiry Grid -->
<section class="py-16 max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Left 2 Columns: Overview, Amenities, Gallery, Maps -->
        <div class="lg:col-span-2 space-y-12">
            
            <!-- Section 2: Villa Overview -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold">About the Estate</span>
                    <span class="text-sm font-semibold text-gray-500 flex items-center"><i class="fa-solid fa-star text-gold mr-1"></i> <?= number_format($villa['rating'], 1) ?> Rating</span>
                </div>
                <h2 class="font-heading text-2xl md:text-3xl font-bold text-primary">Overview</h2>
                <div class="w-20 h-0.5 bg-gold my-4"></div>
                <p class="text-gray-600 leading-relaxed pt-2">
                    <?= nl2br(htmlspecialchars($villa['description'])) ?>
                </p>
            </div>

            <!-- Section 3: Amenities Grid -->
            <div class="space-y-6 pt-6 border-t border-gray-200">
                <h3 class="font-heading text-2xl font-bold text-primary">Luxury Amenities</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <?php 
                    $icon_map = [
                        'Private Pool'   => 'fa-water-ladder',
                        'WiFi'           => 'fa-wifi',
                        'Parking'        => 'fa-square-parking',
                        'Chef on Request'=> 'fa-kitchen-set',
                        'Garden'         => 'fa-tree',
                        'Fenced Garden'  => 'fa-tree',
                        'Bonfire Area'   => 'fa-fire',
                        'Mountain View'  => 'fa-mountain-sun',
                        'Valley View'    => 'fa-mountain-sun',
                        'Lake View'      => 'fa-water',
                        'Open Deck'      => 'fa-expand',
                        'BBQ Setup'      => 'fa-drumstick-bite',
                        'Bar Setup'      => 'fa-champagne-glasses',
                        'Sound System'   => 'fa-music',
                        'Caretaker'      => 'fa-bell-concierge',
                        'Pet Friendly'   => 'fa-paw',
                    ];
                    foreach ($villa['amenities'] as $am):
                        $icon = $icon_map[$am] ?? 'fa-check';
                    ?>
                        <div class="bg-white p-4 flex items-center space-x-3 border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            <i class="fa-solid <?= $icon ?> text-gold text-lg"></i>
                            <span class="text-xs uppercase tracking-wider font-semibold text-primary"><?= htmlspecialchars($am) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Section 4: Highlights Summary -->
            <div class="space-y-6 pt-6 border-t border-gray-200">
                <h3 class="font-heading text-2xl font-bold text-primary">Villa Highlights</h3>
                <div class="bg-white border border-gray-200 p-6 grid grid-cols-2 md:grid-cols-5 gap-6 text-center">
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block mb-1">Bedrooms</span>
                        <span class="font-bold text-primary"><i class="fa-solid fa-bed text-gold mr-1"></i> <?= $villa['bedrooms'] ?> Rooms</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block mb-1">Bathrooms</span>
                        <span class="font-bold text-primary"><i class="fa-solid fa-bath text-gold mr-1"></i> <?= $villa['bathrooms'] ?> Baths</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block mb-1">Max Guests</span>
                        <span class="font-bold text-primary"><i class="fa-solid fa-users text-gold mr-1"></i> <?= $villa['guests'] ?> Guests</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block mb-1">Private Parking</span>
                        <span class="font-bold text-primary"><i class="fa-solid fa-car text-gold mr-1"></i> <?= $villa['parking'] ?> Cars</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block mb-1">Pool Dimensions</span>
                        <span class="font-bold text-primary"><i class="fa-solid fa-expand text-gold mr-1"></i> <?= htmlspecialchars($villa['pool_size']) ?></span>
                    </div>
                </div>
            </div>

            <!-- Section 5: Gallery Masonry Grid -->
            <div class="space-y-6 pt-6 border-t border-gray-200">
                <h3 class="font-heading text-2xl font-bold text-primary">Estate Photo Gallery</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <?php foreach ($villa['images'] as $img): ?>
                        <div class="relative group h-40 overflow-hidden cursor-pointer shadow-md" onclick="openLightbox('<?= htmlspecialchars($img) ?>')">
                            <img src="<?= htmlspecialchars($img) ?>" alt="Gallery item" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-primary/45 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <i class="fa-solid fa-magnifying-glass-plus text-gold text-lg"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Section 6: Location Google Maps -->
            <div class="space-y-6 pt-6 border-t border-gray-200">
                <h3 class="font-heading text-2xl font-bold text-primary">Location on Map</h3>
                <div class="w-full h-80 bg-gray-200 relative">
                    <iframe class="w-full h-full border-0" 
                        src="https://maps.google.com/maps?q=<?= urlencode($villa['location'] . ', Lonavala, Maharashtra') ?>&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <!-- Right Column: Enquiry Contact Panel -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow-xl border-t-4 border-gold lg:sticky lg:top-24 space-y-0 overflow-hidden">
                
                <!-- Price Badge -->
                <div class="bg-primary text-white p-6 text-center">
                    <span class="text-[10px] uppercase tracking-[0.2em] text-gold/80 font-semibold block mb-1">Starting Price</span>
                    <div class="font-heading text-3xl font-bold text-gold"><?= formatPrice($villa['price_per_night']) ?></div>
                    <span class="text-xs text-gray-400 block mt-1">Per Night &bull; All Inclusive</span>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-3 border-b border-gold/10 divide-x divide-gold/10">
                    <div class="p-4 text-center">
                        <i class="fa-solid fa-bed text-gold text-sm block mb-1"></i>
                        <span class="text-xs font-bold text-primary"><?= $villa['bedrooms'] ?></span>
                        <span class="text-[10px] text-gray-400 block">Beds</span>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa-solid fa-bath text-gold text-sm block mb-1"></i>
                        <span class="text-xs font-bold text-primary"><?= $villa['bathrooms'] ?></span>
                        <span class="text-[10px] text-gray-400 block">Baths</span>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa-solid fa-users text-gold text-sm block mb-1"></i>
                        <span class="text-xs font-bold text-primary"><?= $villa['guests'] ?></span>
                        <span class="text-[10px] text-gray-400 block">Guests</span>
                    </div>
                </div>

                <!-- Enquire Panel -->
                <div class="p-6 space-y-4">
                    <h3 class="font-heading text-lg font-bold text-primary border-b border-gray-100 pb-3 flex items-center">
                        <i class="fa-solid fa-paper-plane text-gold mr-2"></i> Enquire About This Villa
                    </h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Interested in this property? Reach out to our concierge team for availability, pricing, and personalised packages.
                    </p>

                    <!-- WhatsApp CTA -->
                    <a href="https://wa.me/<?= str_replace(['+', ' '], '', $settings['whatsapp']) ?>?text=Hello%2C%20I%20am%20interested%20in%20<?= urlencode($villa['name']) ?>.%20Please%20share%20availability%20details." 
                       target="_blank"
                       class="w-full bg-green-600 hover:bg-green-700 text-white text-xs font-semibold uppercase tracking-wider py-3.5 flex items-center justify-center gap-2 transition-all duration-300 shadow-md">
                        <i class="fa-brands fa-whatsapp text-lg"></i> Chat on WhatsApp
                    </a>

                    <!-- Call CTA -->
                    <a href="tel:<?= str_replace(' ', '', $settings['phone']) ?>"
                       class="w-full bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-wider py-3.5 flex items-center justify-center gap-2 transition-all duration-300">
                        <i class="fa-solid fa-phone"></i> Call Our Concierge
                    </a>

                    <!-- Contact Page Link -->
                    <a href="contact.php"
                       class="w-full border border-primary hover:border-gold hover:text-gold text-primary text-xs font-semibold uppercase tracking-wider py-3.5 flex items-center justify-center gap-2 transition-all duration-300">
                        <i class="fa-solid fa-envelope"></i> Send an Inquiry
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="bg-cream p-5 border-t border-gray-100 space-y-3">
                    <div class="flex items-center text-xs text-gray-500 gap-2">
                        <i class="fa-solid fa-shield-check text-gold text-sm flex-shrink-0"></i>
                        <span>Verified luxury property — quality guaranteed</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 gap-2">
                        <i class="fa-solid fa-headset text-gold text-sm flex-shrink-0"></i>
                        <span>24/7 dedicated concierge support</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 gap-2">
                        <i class="fa-solid fa-star text-gold text-sm flex-shrink-0"></i>
                        <span>Rated <?= number_format($villa['rating'], 1) ?>/5 by luxury guests</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Lightbox Modal container -->
<div id="detail-lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-img" onclick="event.stopPropagation()">
</div>

<script>

    function openLightbox(imgSrc) {
        const lightbox = document.getElementById("detail-lightbox");
        const lightboxImg = document.getElementById("lightbox-img");
        if(lightbox && lightboxImg) {
            lightboxImg.src = imgSrc;
            lightbox.style.display = "block";
            document.body.style.overflow = "hidden";
        }
    }

    function closeLightbox() {
        const lightbox = document.getElementById("detail-lightbox");
        if(lightbox) {
            lightbox.style.display = "none";
            document.body.style.overflow = "auto";
        }
    }
</script>

<?php require_once 'includes/footer.php'; ?>
