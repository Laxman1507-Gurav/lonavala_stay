<?php
require_once 'includes/header.php';
require_once 'includes/mail_config.php';

$message_sent = false;
$error_message = '';

// Handle Contact Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(cleanInput($_POST['name']));
    $email = trim(cleanInput($_POST['email']));
    $phone = trim(cleanInput($_POST['phone']));
    $subject = trim(cleanInput($_POST['subject']));
    $message = trim(cleanInput($_POST['message']));

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $error_message = 'Please fill out all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Send Email notification to admin
        $admin_email = 'admin@lonavalaluxurystay.com';
        $mailSubject = "New Contact Form Submission - {$subject}";
        $mailBody = "
            <h2>Contact Form Inquiry</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        
        sendLuxuryMail($admin_email, $mailSubject, $mailBody);
        $message_sent = true;
    }
}
?>

<!-- Header Hero Spacer -->
<div class="h-28 bg-primary"></div>

<!-- LARGE HERO BANNER -->
<section class="relative h-[40vh] flex items-center justify-center bg-primary overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/images/lonavala .jpg');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-primary/80 to-primary/95"></div>
    
    <div class="relative text-center text-white z-10 space-y-4">
        <h1 class="font-heading text-4xl md:text-6xl font-bold tracking-wider">Contact Us</h1>
        <!-- BREADCRUMB NAVIGATION -->
        <div class="text-xs uppercase tracking-widest text-gold font-semibold">
            <a href="index.php" class="hover:underline hover:text-white transition-colors duration-300">Home</a>
            <span class="mx-2 text-white/40">&bull;</span>
            <span>Contact</span>
        </div>
    </div>
</section>

<!-- WHITE BACKGROUND CONTENT SECTION WITH DECORATIVE LEAF PATTERNS -->
<section class="py-24 bg-white bg-leaf-pattern relative">
    
    <!-- Spacing & Typography Intro -->
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="text-center space-y-3 max-w-2xl mx-auto">
            <span class="text-gold uppercase tracking-[0.25em] text-xs font-semibold block">Get in Touch</span>
            <h2 class="font-heading text-3xl md:text-5xl text-primary font-bold">Connect With Our Concierge</h2>
            <div class="w-24 h-0.5 bg-gold mx-auto mt-4"></div>
            <p class="text-gray-500 text-sm leading-relaxed pt-2">
                Have questions about our villas, amenities, or corporate packages? Drop us a line below or contact us through our official support lines. Our team is available 24/7.
            </p>
        </div>

        <!-- FOUR CONTACT CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pt-8">
            <!-- Card 1: Call Us -->
            <div class="bg-cream p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                    <i class="fa-solid fa-phone text-gold text-xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Call Us</h3>
                <p class="text-sm text-gray-500">Call our concierge desk for immediate assistance and villa inquiries.</p>
                <a href="tel:<?= str_replace(' ', '', $settings['phone']) ?>" class="text-gold hover:text-primary font-bold text-sm block transition-colors duration-300"><?= htmlspecialchars($settings['phone']) ?></a>
            </div>

            <!-- Card 2: WhatsApp Us -->
            <div class="bg-cream p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                    <i class="fa-brands fa-whatsapp text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">WhatsApp Us</h3>
                <p class="text-sm text-gray-500">Chat with our reservation specialist directly on WhatsApp.</p>
                <a href="https://wa.me/<?= str_replace(['+', ' '], '', $settings['whatsapp']) ?>?text=Hello%2C%20I%20am%20interested%20in%20a%20luxury%20villa%20stay." target="_blank" class="text-gold hover:text-primary font-bold text-sm block transition-colors duration-300">Chat Now</a>
            </div>

            <!-- Card 3: Email Us -->
            <div class="bg-cream p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                    <i class="fa-solid fa-envelope text-gold text-xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Email Us</h3>
                <p class="text-sm text-gray-500">Send us inquiries and our team will respond within 2 hours.</p>
                <a href="mailto:<?= htmlspecialchars($settings['email']) ?>" class="text-gold hover:text-primary font-bold text-sm block transition-colors duration-300"><?= htmlspecialchars($settings['email']) ?></a>
            </div>

            <!-- Card 4: Visit Us -->
            <div class="bg-cream p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                    <i class="fa-solid fa-map-location-dot text-gold text-xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-primary">Visit Us</h3>
                <p class="text-sm text-gray-500">Our administrative and corporate booking desk details.</p>
                <span class="text-gold font-bold text-sm block"><?= htmlspecialchars(explode(',', $settings['address'])[0]) ?></span>
            </div>
        </div>

        <!-- LARGE CENTERED CONTACT FORM -->
        <div class="max-w-3xl mx-auto pt-16 bg-cream border border-gray-100 p-8 md:p-12 shadow-2xl relative z-10">
            <h3 class="font-heading text-2xl md:text-3xl text-primary font-bold text-center mb-8">Send A Message</h3>
            
            <?php if($message_sent): ?>
                <div class="bg-green-50 text-green-700 text-sm p-4 border border-green-200 mb-6 font-semibold flex items-center justify-center gap-2">
                    <i class="fa-solid fa-circle-check text-lg"></i> Thank you! Your message has been received. Our concierge team will contact you shortly.
                </div>
            <?php endif; ?>

            <?php if(!empty($error_message)): ?>
                <div class="bg-red-50 text-red-600 text-sm p-4 border border-red-200 mb-6 font-semibold flex items-center justify-center gap-2">
                    <i class="fa-solid fa-circle-xmark text-lg"></i> <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Your Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required placeholder="John Doe" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-gold transition-colors duration-300">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="john@example.com" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-gold transition-colors duration-300">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Phone Number <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" required placeholder="9876543210" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-gold transition-colors duration-300">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Subject</label>
                        <input type="text" name="subject" placeholder="General Inquiry / Wedding Setup / Corporate" class="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-gold transition-colors duration-300">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-xs uppercase font-semibold text-textDark/60 tracking-wider">Your Message <span class="text-red-500">*</span></label>
                    <textarea name="message" required rows="5" placeholder="Tell us how we can help make your luxury stay memorable..." class="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-gold transition-colors duration-300"></textarea>
                </div>

                <!-- LUXURY BLACK BUTTON -->
                <div class="text-center pt-2">
                    <button type="submit" class="w-full md:w-auto bg-primary hover:bg-gold text-white hover:text-primary text-xs font-bold uppercase tracking-widest px-10 py-4 transition-all duration-500 shadow-md">
                        Submit Inquiry
                    </button>
                </div>
            </form>
        </div>

        <!-- QUICK CONTACT INFORMATION TABLE -->
        <div class="max-w-3xl mx-auto pt-20 space-y-6">
            <h3 class="font-heading text-2xl font-bold text-primary text-center">Quick Office Directory</h3>
            <div class="overflow-x-auto bg-white border border-gray-200">
                <table class="w-full border-collapse text-left text-sm text-gray-500">
                    <thead class="bg-primary text-gold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 border-b border-gray-200">Department</th>
                            <th class="px-6 py-4 border-b border-gray-200">Contact Number</th>
                            <th class="px-6 py-4 border-b border-gray-200">Email Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-semibold text-primary">General Front Desk</td>
                            <td class="px-6 py-4"><?= htmlspecialchars($settings['phone']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($settings['email']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-primary">Events & Weddings Team</td>
                            <td class="px-6 py-4">+91 98765 43211</td>
                            <td class="px-6 py-4">events@lonavalaluxurystay.com</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-primary">Admin / Finance Desk</td>
                            <td class="px-6 py-4">+91 98765 43212</td>
                            <td class="px-6 py-4">finance@lonavalaluxurystay.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- GOOGLE MAP SECTION -->
<section class="h-96 w-full bg-gray-200">
    <iframe class="w-full h-full border-0" 
        src="https://maps.google.com/maps?q=<?= urlencode($settings['address']) ?>&t=&z=15&ie=UTF8&iwloc=&output=embed" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<?php require_once 'includes/footer.php'; ?>
