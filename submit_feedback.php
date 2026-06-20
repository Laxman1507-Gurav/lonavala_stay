<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(cleanInput($_POST['name']));
    $rating = intval($_POST['rating']);
    $review = trim(cleanInput($_POST['review']));

    if (!empty($name) && !empty($review) && $rating >= 1 && $rating <= 5) {
        $feedback_file = __DIR__ . '/assets/uploads/feedback.json';
        
        // Ensure parent directory exists
        $dir = dirname($feedback_file);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $feedbacks = [];
        if (file_exists($feedback_file)) {
            $json_data = file_get_contents($feedback_file);
            $feedbacks = json_decode($json_data, true);
            if (!is_array($feedbacks)) {
                $feedbacks = [];
            }
        }

        // Add new feedback to the beginning of the list
        $new_feedback = [
            'name' => $name,
            'rating' => $rating,
            'review' => $review
        ];
        array_unshift($feedbacks, $new_feedback);

        // Save back to JSON
        file_put_contents($feedback_file, json_encode($feedbacks, JSON_PRETTY_PRINT));
        
        $_SESSION['feedback_success'] = 'Thank you for sharing your experience! Your feedback has been published.';
    } else {
        $_SESSION['feedback_error'] = 'Please fill out all fields correctly.';
    }
}

header('Location: index.php#feedback-form-section');
exit;
