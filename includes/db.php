<?php
// Static Site Configuration — No Database Required
// Lonavala Luxury Stay | Portfolio Website

// Secure Session Configuration
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// XSS Sanitization helper
function cleanInput($data) {
    if (is_array($data)) {
        return array_map('cleanInput', $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Format Price Helper
function formatPrice($amount) {
    return '₹' . number_format($amount, 0, '.', ',');
}

// Static Site Settings (replaces DB settings table)
function getSiteSettings() {
    return [
        'phone'     => '+91 98765 43210',
        'whatsapp'  => '+919876543210',
        'email'     => 'stay@lonavalaluxurystay.com',
        'address'   => 'Lonavala, Maharashtra 410401',
        'facebook'  => 'https://facebook.com/lonavalaluxurystay',
        'instagram' => 'https://instagram.com/lonavalaluxurystay',
        'youtube'   => 'https://youtube.com/@lonavalaluxurystay',
    ];
}

// Hardcoded Villas Portfolio
function getAllVillas() {
    return [
        [
            'id'             => 1,
            'name'           => 'The Nest Villa',
            'capacity'       => '2BHK',
            'location'       => 'Lonavala (Malavali Boraj Road)',
            'villa_type'     => 'Premium Villas', 'Budget Friendly Villas','Family Villas','Pool Villas',
            'description'    => 'Perched atop the Lonavala valley with breathtaking views, this 2-bedroom estate features a stunning  pool that merges with the horizon. Perfect for families and groups seeking unparalleled luxury.',
            'bedrooms'       => 2,
            'bathrooms'      => 2,
            'guests'         => 10,
            'parking'        => 4,
            'pool_size'      => '10x25 ft',
            'price_per_night'=> 9000,
            'rating'         => 4.9,
            'featured'       => true,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Nest_Villa/nest villa.jpeg',
            'images'         => [
                'assets/images/Nest_Villa/nest villa1.jpeg',
                'assets/images/Nest_Villa/nest villa2.jpeg',
                'assets/images/Nest_Villa/nest villa3.jpeg',
                'assets/images/Nest_Villa/nest villa4.jpeg',
                'assets/images/Nest_Villa/nest villa5.jpeg',
            ],
            'amenities'      => ['Private Pool with baby pool', 'WiFi', 'AC in all Bedrooms', 'Bonfire Area', 'Private Parking', 'Mountain View', 'BBQ Setup', 'Games','TV in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Caretaker','Music System','Living Area'],
        ],
        [
            'id'             => 2,
            'name'           => 'Krishna Villa',
            'capacity'       => '2BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas', 'Budget Friendly Villas','Family Villas','Pool Villas',
            'description'    => 'A private Family sanctuary with private pool access, panoramic water views, and cosy bonfire evenings. Designed for everyone seeking privacy, this villa offers an unmatched romantic escape.',
            'bedrooms'       => 2,
            'bathrooms'      => 2,
            'guests'         => 6,
            'parking'        => 5,
            'pool_size'      => '14x24 ft',
            'price_per_night'=> 7000,
            'rating'         => 4.8,
            'featured'       => true,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Krishna_Villa/Krishna Villa3.jpeg',
            'images'         => [
                'assets/images/Krishna_Villa/Krishna Villa1.jpeg',
                'assets/images/Krishna_Villa/Krishna Villa2.jpeg',
                'assets/images/Krishna_Villa/Krishna Villa4.jpeg',
                'assets/images/Krishna_Villa/Krishna Villa5.jpeg',
            ],
            'amenities'      => ['Big Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator'],
        ],
        [
            'id'             => 3,
            'name'           => 'Jannat Villa',
            'capacity'       => '3BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas', 'Budget Friendly Villas','Family Villas','Pool Villas',
            'description'    => 'A sprawling 3-bedroom luxury estate in the heart of Lonavala, complete with a private pool, indoor game zone, and landscaped gardens. Ideal for large families and corporate retreats.',
            'bedrooms'       => 3,
            'bathrooms'      => 3,
            'guests'         => 15,
            'parking'        => 3,
            'pool_size'      => '12x25 ft',
            'price_per_night'=> 8000,
            'rating'         => 4.9,
            'featured'       => true,
            'has_pool'       => true,
            'main_image'     => 'assets/images/jannat_villa/jannat villa1.jpeg',
            'images'         => [
                'assets/images/jannat_villa/jannat villa2.jpeg',
                'assets/images/jannat_villa/jannat villa3.jpeg',
                'assets/images/jannat_villa/jannat villa4.jpeg',
            ],
            'amenities'      => ['Big Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Maid/Driver Beds'],
        ],
        [
            'id'             => 4,
            'name'           => 'Taj Villa',
            'capacity'       => '3BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas', 'Budget Friendly Villas','Family Villas','Pool Villas',
            'description'    => 'Dramatically situated at Tiger Point with cloud-level valley views, this modern villa features a private plunge pool, open-air deck, and curated luxury interiors for an unforgettable stay.',
            'bedrooms'       => 3,
            'bathrooms'      => 3,
            'guests'         => 10,
            'parking'        => 4,
            'pool_size'      => '10x18 ft',
            'price_per_night'=> 7500,
            'rating'         => 4.7,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Taj_villa/taj villa2.jpeg',
            'images'         => [
                'assets/images/Taj_villa/taj villa1.jpeg',
                'assets/images/Taj_villa/taj villa3.jpeg',
                'assets/images/Taj_villa/taj villa4.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game Zone'],
        ],
        [
            'id'             => 5,
            'name'           => 'Sky Line villa',
            'capacity'       => '3BHK',
            'location'       => 'Lonavala (Khatri park Valavan)',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas',
            'description'    => 'The ultimate party villa with expansive entertainment decks, music system, and a stunning private pool for epic celebrations and group events.',
            'bedrooms'       => 3,
            'bathrooms'      => 3,
            'guests'         => 10,
            'parking'        => 2,
            'pool_size'      => '15x20 ft',
            'price_per_night'=> 8000,
            'rating'         => 4.8,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/SkyLine_villa/skyline villa1.jpeg',
            'images'         => [
                'assets/images/SkyLine_villa/skyline villa2.jpeg',
                'assets/images/SkyLine_villa/skyline villa3.jpeg',
                'assets/images/SkyLine_villa/skyline villa4.jpeg',
                'assets/images/SkyLine_villa/skyline villa5.jpeg',
                'assets/images/SkyLine_villa/skyline villa6.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 6,
            'name'           => 'Sagar Villa',
            'capacity'       => '4BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'A serene villa with fenced gardens, pet play areas, and a private pool surrounded by nature. Thoughtfully designed for guests who want to bring their furry companions along.',
            'bedrooms'       => 4,
            'bathrooms'      => 4,
            'guests'         => 8,
            'parking'        => 3,
            'pool_size'      => '25x10 ft',
            'price_per_night'=> 9000,
            'rating'         => 4.6,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Sagar_villa/Sagar villa7.jpeg',
            'images'         => [
                'assets/images/Sagar_villa/Sagar villa1.jpeg',
                'assets/images/Sagar_villa/Sagar villa2.jpeg',
                'assets/images/Sagar_villa/Sagar villa3.jpeg',
                'assets/images/Sagar_villa/Sagar villa4.jpeg',
                'assets/images/Sagar_villa/Sagar villa5.jpeg',
                'assets/images/Sagar_villa/Sagar villa6.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 7,
            'name'           => 'Mountain Mist Villa',
            'capacity'       => '4BHK',
            'location'       => 'Dudhiware,Pawna',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'Nestled in the serene hills of Dudhiware, Pawna, this villa offers breathtaking mountain views and a tranquil escape from city life. Perfect for nature lovers seeking peace and quiet.',
            'bedrooms'       => 4,
            'bathrooms'      => 4,
            'guests'         => 10,
            'parking'        => 3,
            'pool_size'      => '25x10 ft',
            'price_per_night'=> 9000,
            'rating'         => 4.6,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Mountain_villa/mountain2.jpeg',
            'images'         => [
                'assets/images/Mountain_villa/mountain1.jpeg',
                'assets/images/Mountain_villa/mountain3.jpeg',
                'assets/images/Mountain_villa/mountain4.jpeg',
                'assets/images/Mountain_villa/mountain5.jpeg',
                'assets/images/Mountain_villa/mountain6.jpeg',
                'assets/images/Mountain_villa/mountain7.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 8,
            'name'           => 'Silver Sky Villa',
            'capacity'       => '4BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'Experience luxury redefined at Silver Sky Villa, where modern architecture meets natural beauty. This stunning 4BHK villa offers panoramic views of the Sahyadri mountains and features a private infinity pool that seems to merge with the sky.',
            'bedrooms'       => 4,
            'bathrooms'      => 4,
            'guests'         => 12,
            'parking'        => 4,
            'pool_size'      => '25x10 ft',
            'price_per_night'=> 8000,
            'rating'         => 4.9,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Sliver_villa/silver1.jpeg',
            'images'         => [
                'assets/images/Si`lver_villa/silver2.jpeg',
                'assets/images/Silver_villa/silver3.jpeg',
                'assets/images/Silver_villa/silver4.jpeg',
                'assets/images/Silver_villa/silver5.jpeg',
                'assets/images/Silver_villa/silver6.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 9,
            'name'           => 'Ever Green Villa',
            'capacity'       => '4BHK',
            'location'       => 'Lonavala (Near Wet & Joy water park)',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'Nestled in the verdant landscape of Lonavala, just a stone\'s throw away from the famous Wet n\' Joy Water Park, Ever Green Villa offers a perfect blend of nature and luxury. This charming 4BHK villa is an oasis of tranquility, surrounded by lush greenery and manicured gardens, making it an ideal retreat for families and friends seeking a peaceful escape.',
            'bedrooms'       => 4,
            'bathrooms'      => 4,
            'guests'         => 12,
            'parking'        => 3,
            'pool_size'      => '12x20 ft',
            'price_per_night'=> 9000,
            'rating'         => 4.6,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/EverGreen_villa/green2.jpeg',
            'images'         => [
                'assets/images/EverGreen_villa/green1.jpeg',
                'assets/images/EverGreen_villa/green3.jpeg',
                'assets/images/EverGreen_villa/green4.jpeg',
                'assets/images/EverGreen_villa/green5.jpeg',
                'assets/images/EverGreen_villa/green6.jpeg',
                'assets/images/EverGreen_villa/green7.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 10,
            'name'           => 'The Oracle Villa',
            'capacity'       => '5BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'Discover the enchanting "Oracle Villa," a stunning 5BHK property nestled in the heart of Lonavala, offering a serene escape from the hustle and bustle of city life. This exquisite villa combines modern luxury with natural beauty, providing a perfect retreat for families, friends, or corporate groups seeking comfort and relaxation.',
            'bedrooms'       => 5,
            'bathrooms'      => 5,
            'guests'         => 15,
            'parking'        => 3,
            'pool_size'      => '12x25 ft',
            'price_per_night'=> 7000,
            'rating'         => 4.6,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/Oracle_villa/oracle5.jpeg',
            'images'         => [
                'assets/images/Oracle_villa/oracle1.jpeg',
                'assets/images/Oracle_villa/oracle2.jpeg',
                'assets/images/Oracle_villa/oracle3.jpeg',
                'assets/images/Oracle_villa/oracle4.jpeg',
                'assets/images/Oracle_villa/oracle6.jpeg',
                'assets/images/Oracle_villa/oracle7.jpeg',
            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
        [
            'id'             => 11,
            'name'           => 'Tito\'s Villa',
            'capacity'       => '6BHK',
            'location'       => 'Lonavala',
            'villa_type'     => 'Premium Villas','Family Villas','Pool Villas','budget friendly villas','Pet Friendly Villas',
            'description'    => 'Discover the epitome of luxury and entertainment at Tito\'s Villa, a sprawling 6BHK villa located in the heart of Lonavala, renowned for its vibrant ambiance and high-end amenities. Perfect for large groups of friends or family looking for a memorable getaway, this villa offers spacious living areas, modern facilities, and a dedicated entertainment zone that ensures fun-filled days and nights.',
            'bedrooms'       => 6,
            'bathrooms'      => 6,
            'guests'         => 20,
            'parking'        => 3,
            'pool_size'      => '15x25 ft',
            'price_per_night'=> 12000,
            'rating'         => 4.6,
            'featured'       => false,
            'has_pool'       => true,
            'main_image'     => 'assets/images/titos_villa/tito1.jpeg',
            'images'         => [
                'assets/images/titos_villa/tito2.jpeg',
                'assets/images/titos_villa/tito3.jpeg',
                'assets/images/titos_villa/tito4.jpeg',
                'assets/images/titos_villa/tito5.jpeg',

            ],
            'amenities'      => ['Private Pool', 'WiFi', 'Bonfire Area', 'Private Parking', 'Gazebo Pool Side', 'Caretaker','Outside Sitting Area','AC in all Bedrooms','Fully Equipped Kitchen','Hot water','Water Purifier','Power backup','Music System','Living Area','Refrigerator','Game zone'],
        ],
    ];
}

// Get single villa by ID
function getVillaById($id) {
    foreach (getAllVillas() as $villa) {
        if ($villa['id'] === (int)$id) return $villa;
    }
    return null;
}

// Hardcoded Special Offers
function getAllOffers() {
    return [
        [
            'id'          => 1,
            'title'       => 'Early Bird Escape',
            'discount'    => '15% OFF',
            'description' => 'Plan your luxury getaway in advance and save big. Book at least 30 days ahead and enjoy a 15% discount on any villa of your choice across Lonavala and Khandala.',
            'expiry_date' => '2025-12-31',
            'image_path'  => 'assets/images/offers/early_bird.jpg',
        ],
        [
            'id'          => 2,
            'title'       => 'Romantic Weekend Package',
            'discount'    => 'COUPLE SPECIAL',
            'description' => 'Celebrate your love story in the hills. Our curated couple package includes a decorated room with flowers, private candle-lit dinner by the pool, and a complimentary bottle of champagne.',
            'expiry_date' => '2025-12-31',
            'image_path'  => 'assets/images/offers/couple_pkg.jpg',
        ],
        [
            'id'          => 3,
            'title'       => 'Weekend Getaway Deal',
            'discount'    => '10% OFF',
            'description' => 'Escape the city every weekend. Special pricing for Friday to Sunday stays on selected premium villas, including complimentary breakfast and caretaker service.',
            'expiry_date' => '2025-12-31',
            'image_path'  => 'assets/images/offers/weekend_getaway.jpg',
        ],
    ];
}

// Hardcoded Testimonials
function getAllTestimonials() {
    $testimonials = [
        [
            'name'   => 'Priya & Raj Mehta',
            'rating' => 5,
            'review' => 'Absolutely breathtaking experience at the Khandala Ridge Estate. The infinity pool at sunrise was something we will never forget. The caretaker team was incredibly attentive. Highly recommend!',
        ],
        [
            'name'   => 'Arjun Sharma',
            'rating' => 5,
            'review' => 'We hosted our company retreat at The Lonavala Grand Villa. Everything was seamless — 20 colleagues, a private chef, bonfire nights. A truly premium and professional villa experience.',
        ],
        [
            'name'   => 'Kavya & Nikhil',
            'rating' => 5,
            'review' => 'Celebrated our anniversary at the Pawna Lakeside Retreat. The lake view from the pool deck was mesmerizing. The team went above and beyond to make it special. Will definitely return!',
        ],
        [
            'name'   => 'Rohan Desai',
            'rating' => 4,
            'review' => 'Great villa at Tiger Point Heights! Stunning valley views and a very well maintained property. The concierge team responded instantly to every request. Perfect for a weekend escape.',
        ],
    ];

    // Merge custom user feedback if exists
    $feedback_file = __DIR__ . '/../assets/uploads/feedback.json';
    if (file_exists($feedback_file)) {
        $json_data = file_get_contents($feedback_file);
        $user_feedbacks = json_decode($json_data, true);
        if (is_array($user_feedbacks)) {
            $testimonials = array_merge($user_feedbacks, $testimonials);
        }
    }
    return $testimonials;
}

// Hardcoded Gallery Items
function getAllGalleryItems() {
    return [
        ['image_path' => 'assets/images/gallery/ext_1.jpg',    'title' => 'Khandala Ridge Exterior',   'category' => 'Exterior'],
        ['image_path' => 'assets/images/gallery/ext_2.jpg',    'title' => 'Lonavala Villa Facade',     'category' => 'Exterior'],
        ['image_path' => 'assets/images/gallery/pool_1.jpg',   'title' => 'Infinity Pool at Sunset',   'category' => 'Pool'],
        ['image_path' => 'assets/images/gallery/pool_2.jpg',   'title' => 'Lakeside Private Pool',     'category' => 'Pool'],
        ['image_path' => 'assets/images/gallery/int_1.jpg',    'title' => 'Luxury Master Suite',       'category' => 'Interior'],
        ['image_path' => 'assets/images/gallery/bed_1.jpg',    'title' => 'Premium Bedroom Suite',     'category' => 'Bedrooms'],
        ['image_path' => 'assets/images/gallery/amenity_1.jpg','title' => 'Outdoor Bonfire Lounge',    'category' => 'Amenities'],
        ['image_path' => 'assets/images/gallery/dest_1.jpg',   'title' => 'Khandala Valley Vista',     'category' => 'Destinations'],
    ];
}
?>
