<?php
require_once __DIR__ . '/db.php';
$settings = getSiteSettings();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lonavala Luxury Stay | Luxury Villas, Private Pools &amp; Scenic Escapes</title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="Indulge in premium private pool villas in Lonavala &amp; Khandala. Experience scenic views, luxury hospitality, and direct booking inquiries.">
    <meta name="keywords" content="Lonavala Luxury Stay, Private Pool Villas, Lonavala Villas, Khandala Luxury Stays, Scenic Villas, Weekend Getaway">
    
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F172A',
                        gold: '#D4AF37',
                        goldHover: '#B8962E',
                        cream: '#F8F5F0',
                        textDark: '#334155',
                    },
                    fontFamily: {
                        heading: ['"Playfair Display"', 'serif'],
                        body: ['"Poppins"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- FontAwesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-cream font-body text-textDark antialiased">


    <!-- Sticky Header -->
    <header id="main-header" class="fixed top-0 w-full z-50 transition-all duration-500 py-4 px-6 md:py-6 bg-transparent text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center relative">
            
            <!-- Logo -->
            <a href="index.php" class="flex flex-col z-10">
                <span class="font-heading text-xl md:text-2xl font-bold tracking-widest text-gold">LONAVALA</span>
                <span class="text-[9px] md:text-[10px] uppercase tracking-[0.25em] text-white">Luxury Stay</span>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden lg:flex space-x-8 text-sm font-semibold tracking-wider uppercase absolute left-1/2 transform -translate-x-1/2">
                <a href="index.php" class="hover:text-gold transition-all duration-300 py-2 <?= $current_page == 'index.php' ? 'text-gold border-b-2 border-gold' : '' ?>">Home</a>
                <a href="about.php" class="hover:text-gold transition-all duration-300 py-2 <?= $current_page == 'about.php' ? 'text-gold border-b-2 border-gold' : '' ?>">About</a>
                <a href="villas.php" class="hover:text-gold transition-all duration-300 py-2 <?= $current_page == 'villas.php' || $current_page == 'villa-details.php' ? 'text-gold border-b-2 border-gold' : '' ?>">Villa's</a>
                <a href="index.php#destinations" class="hover:text-gold transition-all duration-300 py-2">Destinations</a>
                <a href="offers.php" class="hover:text-gold transition-all duration-300 py-2 <?= $current_page == 'offers.php' ? 'text-gold border-b-2 border-gold' : '' ?>">Offers</a>
                <a href="contact.php" class="hover:text-gold transition-all duration-300 py-2 <?= $current_page == 'contact.php' ? 'text-gold border-b-2 border-gold' : '' ?>">Contact</a>
            </nav>



            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-white hover:text-gold focus:outline-none transition-colors duration-300 z-10">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>

        </div>
    </header>

    <!-- Mobile Slide-out Drawer Menu -->
    <div id="mobile-menu" class="fixed inset-0 z-50 bg-primary/95 text-white flex flex-col justify-between py-12 px-8 transform translate-x-full transition-transform duration-500 ease-in-out lg:hidden">
        <div>
            <!-- Close Button -->
            <div class="flex justify-between items-center mb-12">
                <a href="index.php" class="flex flex-col">
                    <span class="font-heading text-xl font-bold tracking-widest text-gold">LONAVALA</span>
                    <span class="text-[9px] uppercase tracking-[0.25em] text-white">Luxury Stay</span>
                </a>
                <button id="mobile-menu-close" class="text-white hover:text-gold focus:outline-none transition-colors duration-300">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>
            <!-- Navigation List -->
            <nav class="flex flex-col space-y-6 text-lg font-heading tracking-wider">
                <a href="index.php" class="hover:text-gold transition-colors duration-300 <?= $current_page == 'index.php' ? 'text-gold' : '' ?>">Home</a>
                <a href="about.php" class="hover:text-gold transition-colors duration-300 <?= $current_page == 'about.php' ? 'text-gold' : '' ?>">About</a>
                <a href="villas.php" class="hover:text-gold transition-colors duration-300 <?= $current_page == 'villas.php' ? 'text-gold' : '' ?>">Villas</a>
                <a href="index.php#destinations" class="hover:text-gold transition-colors duration-300">Destinations</a>
                <a href="offers.php" class="hover:text-gold transition-colors duration-300 <?= $current_page == 'offers.php' ? 'text-gold' : '' ?>">Offers</a>
                <a href="contact.php" class="hover:text-gold transition-colors duration-300 <?= $current_page == 'contact.php' ? 'text-gold' : '' ?>">Contact</a>
            </nav>
        </div>


    </div>

