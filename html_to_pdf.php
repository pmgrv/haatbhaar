<?php
require 'vendor/autoload.php'; // Load Composer autoload

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a Dompdf instance with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

// Check if HTML content is provided
if (isset($_POST['html_content'])) {
    $htmlContent = $_POST['html_content'];

    // Load HTML content
    $dompdf->loadHtml($htmlContent);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (optional: save to file or stream to browser)
    $dompdf->render();

    // Output the generated PDF
    $dompdf->stream('output.pdf', ['Attachment' => false]);
} else {
    // Return an error response if no HTML content is provided
    http_response_code(400);
    echo 'Error: HTML content not provided.';
}
