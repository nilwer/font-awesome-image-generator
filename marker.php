<?php
/**
 * @author Nils Werner
 * Create an image of font-awesome icon with transparent background and individual fontcolor
 */
header('Content-Type: image/png');
$img = imagecreatetruecolor(35, 50);
//enable transparent color
imagesavealpha($img, true);
//generate transparent background
$background = imagecolorallocatealpha($img, 0, 0, 0, 127);
//set backgroundcolor
imagefill($img, 0, 0, $background);

$hex = "#ff9900";
//convert hex to rgb color
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
//generate rgb fontcolor
$fontcolor = imagecolorallocatealpha($img, $r, $g, $b, 0);

//set fonticon as unicode
$text = json_decode('"&#xF041;"');
//set path to font
$font = '../fonts/fontawesome/fontawesome-webfont.ttf';
//insert icon into image
imagettftext($img, 42, 0, 1, 45, $fontcolor, $font, $text);

//generate image
imagepng($img);
imagedestroy($img);
?>
