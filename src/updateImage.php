<?php
	$imageName = "example.png"; // Filename of image (only png extension)
	$outputImage = "output.png"; // Filename of output image (only png extension)
	$image = @imagecreatefrompng($imageName);
	if (!$image) exit("Unable to open image.\n");
	
	$timeFormat = "H:i"; // For more visit: http://php.net/manual/en/function.date.php
	$timeColor = imagecolorallocatealpha($image, 255, 255, 255, 0); // red (0-255), green (0-255), blue (0-255), alpha(0-127, 127 -> transparent)
	$strokeColor = imagecolorallocate($image, 0, 0, 0); // red (0-255), green (0-255), blue (0-255)
	$font = "consolas.ttf"; // Filename of font (only ttf extension)
	$fontSize = 32; // in pixels
	$strokeSize = 2; // in pixels
	$pos = array("x" => 425, "y" => 288); // Center of the textbox
	
	
	// Code (only touch if you know what you're doing!)
	function imagettfstroketext($image, $size, $angle, $x, $y, $textcolor, $strokecolor, $fontfile, $text, $px) {
		for ($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
			for ($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
				$bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
		return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
	}
	
	echo("TS3 Dynamic TimeBanner Changer -> Written by Makro\n");
	$currTime = date($timeFormat);
	$textbox = imagettfbbox($fontSize, 0, $font, $currTime);
	$width = $textbox[2] - $textbox[0];
	$height = $textbox[7] - $textbox[1];
	$x = $pos["x"] - $width/2;
	$y = $pos["y"] + $height/2;
	$imagebox = imagettfstroketext($image, $fontSize, 0, $x, $y, $timeColor, $strokeColor, $font, $currTime, $strokeSize);
	$success = imagepng($image, $outputImage);
	echo($success ? "TimeBanner image has been updated successfully.\n" : "Unknown error occured.\n");
?>
