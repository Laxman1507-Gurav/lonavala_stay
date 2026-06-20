<?php
require_once 'includes/header.php';

$all_villas = getAllVillas();
$init_location   = isset($_GET['location'])   ? $_GET['location']   : '';
$init_villa_type = isset($_GET['villa_type']) ? $_GET['villa_type'] : '';
$init_guests     = isset($_GET['guests'])     ? intval($_GET['guests']) : 0;
?>

<!-- Header Hero Spacer -->
<div class="h-28 bg-primary"></div>

<!-- Portfolio Title Banner -->
<section class="bg-primary text-white py-12 px-6 border-b border-gold/15 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-10 bg-no-repeat" style="background-image: url('assets/images/lonavala .jpg');"></div>
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <span class="text-gold tracking-[0.25em] uppercase text-xs font-semibold">Our Exclusive Retreats</span>
            <h1 class="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">The Villa Portfolio</h1>
        </div>
        <div class="text-sm text-gray-400">
            <a href="index.php" class="hover:text-gold transition-colors duration-300">Home</a> &bull; <span class="text-gold">Villa's</span>
        </div>
    </div>
</section>

<!-- Portfolio Main Area -->
<section class="py-16 max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        
        <!-- Sidebar Filters Column -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 shadow-md border-t-2 border-gold lg:sticky lg:top-24">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-heading text-lg font-bold text-primary"><i class="fa-solid fa-sliders text-gold mr-2"></i> Filter Stays</h3>
                    <button id="reset-filters" class="text-xs text-gold font-semibold uppercase hover:underline">Clear All</button>
                </div>
                
                <div id="filters-form" class="space-y-6">
                    <!-- Location Filter -->
                    <div class="space-y-2">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Location</label>
                        <select id="filter-location" class="w-full bg-cream border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                            <option value="">Lonavala</option>
                        </select>
                    </div>

                    <!-- Price Slider Filter -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs uppercase font-semibold text-textDark/60 tracking-wider">
                            <span>Max Price / Night</span>
                            <span id="price-display" class="text-gold font-bold">₹20,000</span>
                        </div>
                        <input type="range" id="filter-price" min="10000" max="55000" step="2500" value="55000" class="w-full accent-gold bg-cream h-1.5 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <!-- Bedrooms Filter -->
                    <div class="space-y-2">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Bedrooms Required</label>
                        <select id="filter-bedrooms" class="w-full bg-cream border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                            <option value="0">Any Bedrooms</option>
                            <option value="3">3+ Bedrooms</option>
                            <option value="4">4+ Bedrooms</option>
                            <option value="5">5+ Bedrooms</option>
                            <option value="6">6+ Bedrooms</option>
                        </select>
                    </div>

                    <!-- Guests Capacity -->
                    <div class="space-y-2">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Guests Capacity</label>
                        <select id="filter-guests" class="w-full bg-cream border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                            <option value="0" <?= $init_guests === 0  ? 'selected' : '' ?>>Any Count</option>
                            <option value="2" <?= $init_guests === 2  ? 'selected' : '' ?>>2+ Guests</option>
                            <option value="6" <?= $init_guests === 6  ? 'selected' : '' ?>>6+ Guests</option>
                            <option value="10"<?= $init_guests === 10 ? 'selected' : '' ?>>10+ Guests</option>
                            <option value="15"<?= $init_guests === 15 ? 'selected' : '' ?>>15+ Guests</option>
                            <option value="20"<?= $init_guests === 20 ? 'selected' : '' ?>>20+ Guests</option>
                        </select>
                    </div>

                    <!-- Villa Category Type -->
                    <div class="space-y-2">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Villa Category</label>
                        <select id="filter-villa-type" class="w-full bg-cream border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-gold transition-colors duration-300">
                            <option value="">All Categories</option>
                            <option value="Pool Villas"        <?= $init_villa_type === 'Pool Villas'        ? 'selected' : '' ?>>Pool Villas</option>
                            <option value="Family Villas"      <?= $init_villa_type === 'Family Villas'      ? 'selected' : '' ?>>Family Villas</option>
                            <option value="Pet Friendly Villas"<?= $init_villa_type === 'Pet Friendly Villas'? 'selected' : '' ?>>Pet Friendly Villas</option>
                            <option value="Premium Villas"     <?= $init_villa_type === 'Premium Villas'     ? 'selected' : '' ?>>Premium Villas</option>
                        </select>
                    </div>

                    <!-- Private Pool Filter (Checkbox) -->
                    <div class="flex items-center space-x-2 pt-2">
                        <input type="checkbox" id="filter-pool" value="1" class="w-4 h-4 text-gold border-gray-300 accent-gold rounded focus:ring-gold focus:ring-opacity-50">
                        <label for="filter-pool" class="text-xs uppercase font-semibold text-textDark/80 tracking-wider cursor-pointer">Must Include Pool</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Villas Portfolio Display Grid -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Stats Info Bar -->
            <div class="flex justify-between items-center text-sm text-gray-500 pb-4 border-b border-gray-200">
                <div>Showing <span id="villas-count" class="font-bold text-primary">0</span> Luxury Villas</div>
            </div>

            <!-- Grid Items Container -->
            <div id="villas-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8 transition-opacity duration-300">
                <!-- Dynamically rendered by JS -->
            </div>
            
            <!-- Empty Results -->
            <div id="empty-results" class="hidden py-24 text-center text-gray-500">
                <i class="fa-solid fa-circle-question text-5xl text-gold/30 mb-4 block"></i>
                <h3 class="font-heading text-2xl font-bold text-primary mb-1">No Matching Estates</h3>
                <p class="text-sm">Try broadening your criteria or resetting filters to explore further.</p>
            </div>
        </div>

    </div>
</section>

<!-- Embedded Villas JSON Data for Client-side Filtering -->
<script>
    // All villas as static JSON (no DB needed)
    const VILLAS_DATA = <?= json_encode(array_values($all_villas)) ?>;

    function formatIndianPrice(amount) {
        return '₹' + Number(amount).toLocaleString('en-IN');
    }

    function renderVillas(villas) {
        const grid = document.getElementById('villas-grid');
        const count = document.getElementById('villas-count');
        const empty = document.getElementById('empty-results');

        count.textContent = villas.length;

        if (villas.length === 0) {
            grid.innerHTML = '';
            empty.classList.remove('hidden');
            return;
        }

        empty.classList.add('hidden');
        let html = '';
        villas.forEach(villa => {
            html += `
            <div class="bg-white group hover-gold-border flex flex-col justify-between h-full shadow-lg overflow-hidden transition-all duration-500 animate-[fadeIn_0.5s_ease-out]">
                <div class="relative overflow-hidden img-zoom-container h-60">
                    <img src="${villa.main_image}" alt="${villa.name}" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-primary/95 text-gold text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 border border-gold/40">
                        <i class="fa-solid fa-water-ladder mr-1"></i> Private Pool
                    </span>
                    <span class="absolute bottom-4 right-4 bg-white/95 text-primary text-xs font-semibold px-2.5 py-1 flex items-center">
                        <i class="fa-solid fa-star text-gold mr-1"></i> ${Number(villa.rating).toFixed(1)}
                    </span>
                </div>
                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center text-xs text-gold font-semibold uppercase tracking-wider">
                            <i class="fa-solid fa-map-marker-alt mr-1"></i> ${villa.location}
                        </div>
                        <h3 class="font-heading text-xl font-bold text-primary group-hover:text-gold transition-colors duration-300">${villa.name}</h3>
                        <p class="text-sm text-gray-500 line-clamp-3">${villa.description}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-b border-gray-100 py-4 text-center text-xs text-gray-600">
                        <div><i class="fa-solid fa-bed text-gold text-sm mb-1 block"></i><strong>${villa.bedrooms}</strong> Bed</div>
                        <div><i class="fa-solid fa-bath text-gold text-sm mb-1 block"></i><strong>${villa.bathrooms}</strong> Bath</div>
                        <div><i class="fa-solid fa-users text-gold text-sm mb-1 block"></i><strong>${villa.guests}</strong> Guest</div>
                    </div>
                    <div class="flex items-center justify-between pt-2">
                        <div>
                            <span class="text-[10px] text-gray-400 uppercase tracking-wider block">Price Per Night</span>
                            <span class="text-lg font-bold text-primary">${formatIndianPrice(villa.price_per_night)}</span>
                        </div>
                        <a href="villa-details.php?id=${villa.id}" class="bg-primary hover:bg-gold hover:text-primary text-white text-xs font-semibold uppercase tracking-wider px-5 py-3.5 transition-all duration-300">
                            View Details
                        </a>
                    </div>
                </div>
            </div>`;
        });
        grid.innerHTML = html;
    }

    function applyFilters() {
        const location  = document.getElementById('filter-location').value;
        const price     = parseInt(document.getElementById('filter-price').value);
        const bedrooms  = parseInt(document.getElementById('filter-bedrooms').value);
        const guests    = parseInt(document.getElementById('filter-guests').value);
        const type      = document.getElementById('filter-villa-type').value;
        const poolOnly  = document.getElementById('filter-pool').checked;

        const filtered = VILLAS_DATA.filter(v => {
            if (location  && v.location   !== location)  return false;
            if (v.price_per_night > price)                return false;
            if (bedrooms  && v.bedrooms   < bedrooms)     return false;
            if (guests    && v.guests     < guests)       return false;
            if (type      && v.villa_type !== type)       return false;
            if (poolOnly  && !v.has_pool)                 return false;
            return true;
        });

        renderVillas(filtered);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const priceSlider  = document.getElementById('filter-price');
        const priceDisplay = document.getElementById('price-display');
        const resetBtn     = document.getElementById('reset-filters');

        priceSlider.addEventListener('input', function() {
            priceDisplay.textContent = '₹' + Number(this.value).toLocaleString('en-IN');
            applyFilters();
        });

        ['filter-location','filter-bedrooms','filter-guests','filter-villa-type'].forEach(id => {
            document.getElementById(id).addEventListener('change', applyFilters);
        });
        document.getElementById('filter-pool').addEventListener('change', applyFilters);

        resetBtn.addEventListener('click', function() {
            document.getElementById('filter-location').value   = '';
            document.getElementById('filter-price').value      = 55000;
            document.getElementById('filter-bedrooms').value   = '0';
            document.getElementById('filter-guests').value     = '0';
            document.getElementById('filter-villa-type').value = '';
            document.getElementById('filter-pool').checked     = false;
            priceDisplay.textContent = '₹55,000';
            applyFilters();
        });

        // Apply initial filters (respects URL params pre-selected)
        applyFilters();
    });
</script>

<?php require_once 'includes/footer.php'; ?>
