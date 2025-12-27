<?php
/**
 * Generate PNG logos for isubyo
 * Run this script once: php generate_logos.php
 */

$logoDir = __DIR__ . '/public/images';

// Create logo image
function createLogo() {
    $width = 200;
    $height = 200;
    $image = imagecreatetruecolor($width, $height);
    
    // Colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $darkGreen = imagecolorallocate($image, 15, 76, 47);
    $mediumGreen = imagecolorallocate($image, 30, 90, 63);
    $lightGreen = imagecolorallocate($image, 42, 124, 78);
    $gold = imagecolorallocate($image, 212, 175, 55);
    
    // White background with rounded corners
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    
    // Draw three circles (community)
    $circleRadius = 16;
    imagefilledellipse($image, 70, 85, $circleRadius * 2, $circleRadius * 2, $mediumGreen);
    imagefilledellipse($image, 130, 85, $circleRadius * 2, $circleRadius * 2, $darkGreen);
    imagefilledellipse($image, 100, 50, $circleRadius * 2, $circleRadius * 2, $lightGreen);
    
    // Connection lines
    imageline($image, 85, 75, 85, 95, $gold);
    imageline($image, 115, 75, 115, 95, $gold);
    imageline($image, 75, 85, 125, 85, $gold);
    
    // Arrow (growth)
    imagefilledrectangle($image, 97, 70, 103, 88, $gold);
    $arrow = array(100, 65, 95, 73, 105, 73);
    imagefilledpolygon($image, $arrow, 3, $gold);
    
    // Accent dots
    imagefilledellipse($image, 60, 108, 3, 3, $gold);
    imagefilledellipse($image, 100, 115, 3, 3, $gold);
    imagefilledellipse($image, 140, 108, 3, 3, $gold);
    
    // Text (using default font since we don't have TTF)
    imagestring($image, 5, 75, 140, 'isubyo', $darkGreen);
    
    return $image;
}

// Create favicon (smaller, simpler)
function createFavicon() {
    $width = 200;
    $height = 200;
    $image = imagecreatetruecolor($width, $height);
    
    // Colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $darkGreen = imagecolorallocate($image, 15, 76, 47);
    $mediumGreen = imagecolorallocate($image, 30, 90, 63);
    $lightGreen = imagecolorallocate($image, 42, 124, 78);
    $gold = imagecolorallocate($image, 212, 175, 55);
    
    // White background
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    
    // Three circles
    $circleRadius = 16;
    imagefilledellipse($image, 70, 85, $circleRadius * 2, $circleRadius * 2, $mediumGreen);
    imagefilledellipse($image, 130, 85, $circleRadius * 2, $circleRadius * 2, $darkGreen);
    imagefilledellipse($image, 100, 50, $circleRadius * 2, $circleRadius * 2, $lightGreen);
    
    // Connection lines
    imageline($image, 85, 75, 85, 95, $gold);
    imageline($image, 115, 75, 115, 95, $gold);
    imageline($image, 75, 85, 125, 85, $gold);
    
    // Arrow
    imagefilledrectangle($image, 97, 70, 103, 88, $gold);
    $arrow = array(100, 65, 95, 73, 105, 73);
    imagefilledpolygon($image, $arrow, 3, $gold);
    
    return $image;
}

// Generate logos
$logo = createLogo();
$favicon = createFavicon();

// Save files
$logoPath = $logoDir . '/isubyo-logo-modern.png';
$faviconPath = __DIR__ . '/public/favicon.png';

imagepng($logo, $logoPath, 9);
imagepng($favicon, $faviconPath, 9);

// Clean up
imagedestroy($logo);
imagedestroy($favicon);

echo "Logos generated successfully!\n";
echo "- $logoPath\n";
echo "- $faviconPath\n";
?>
