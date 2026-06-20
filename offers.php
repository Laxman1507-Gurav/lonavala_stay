<?php
require_once 'includes/header.php';

// Fetch Active Special Offers
$offers = getAllOffers();
?>

<!-- Header Hero Spacer -->
<div class="h-28 bg-primary"></div>

<!-- Offers Title Banner -->
<section class="bg-primary text-white py-16 px-6 border-b border-gold/15 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-10 bg-no-repeat" style="background-image: url('assets/images/lonavala .jpg');"></div>
    <div class="relative max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4 z-10">
        <div>
            <span class="text-gold tracking-[0.25em] uppercase text-xs font-semibold">Limited Time Deals</span>
            <h1 class="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">Special Promotions</h1>
        </div>
        <div class="text-sm text-gray-400">
            <a href="index.php" class="hover:text-gold transition-colors duration-300">Home</a> &bull; <span class="text-gold">Offers</span>
        </div>
    </div>
</section>

<!-- Offers Listing Grid -->
<section class="py-24 max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (!empty($offers)): foreach ($offers as $offer): ?>
            <!-- Offer Card -->
            <div class="bg-white group hover-gold-border flex flex-col justify-between h-full shadow-lg overflow-hidden transition-all duration-500">
                <div class="relative overflow-hidden img-zoom-container h-52">
                    <img src="<?= htmlspecialchars($offer['image_path']) ?>" alt="<?= htmlspecialchars($offer['title']) ?>" class="w-full h-full object-cover">
                    <!-- Discount Badge -->
                    <span class="absolute top-4 left-4 bg-gold text-primary font-bold text-xs uppercase px-3 py-1.5 shadow-md">
                        <?= htmlspecialchars($offer['discount']) ?>
                    </span>
                </div>

                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <h3 class="font-heading text-xl font-bold text-primary group-hover:text-gold transition-colors duration-300">
                            <?= htmlspecialchars($offer['title']) ?>
                        </h3>
                        <p class="text-xs text-gold/80 font-semibold uppercase tracking-wider">
                            <i class="fa-solid fa-clock-rotate-left mr-1"></i> Valid till: <?= date('d M, Y', strtotime($offer['expiry_date'])) ?>
                        </p>
                        <p class="text-sm text-gray-500 leading-relaxed pt-2">
                            <?= htmlspecialchars($offer['description']) ?>
                        </p>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block">Direct Concierge Discount</span>
                        <a href="villas.php" class="bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-widest px-5 py-3 transition-all duration-300 inline-block shadow-md">
                            View Villas
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; else: ?>
            <p class="text-center col-span-3 text-gray-500 py-12">There are currently no active promotional offers running. Please check back later or contact our support desk.</p>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
