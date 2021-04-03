<?php

define("FILENAME", "image");

function getExtencion($url)
{
   return (array_pop(explode(".", $url)));
}

function createImage($url)
{
   $extencion = getExtencion($url);
   $imageOriginal = null;
   if ($extencion == "png") {
      $imageOriginal = imagecreatefrompng($url);
   } else if ($extencion == "jpeg" || $extencion == "jpg") {
      $imageOriginal = imagecreatefromjpeg($url);
   }


   if (imagesx($imageOriginal) > imagesy($imageOriginal)) {
      $imageOriginal = imagecrop(
         $imageOriginal,
         array(
            "x" => (imagesx($imageOriginal) - imagesy($imageOriginal)) / 2,
            "y" => 0,
            "width" => imagesy($imageOriginal),
            "height" => imagesy($imageOriginal)
         )
      );
   } else {
      $imageOriginal = imagecrop(
         $imageOriginal,
         array(
            "x" => 0,
            "y" => (imagesy($imageOriginal) - imagesx($imageOriginal)) / 2,
            "width" => imagesx($imageOriginal),
            "height" => imagesx($imageOriginal)
         )
      );
   }
   return $imageOriginal;
}

function saveImage($url, $resource, $color = "-original")
{
   $extencion = getExtencion($url);
   $descriptor = 0;

   if ($extencion == "png") {
      $descriptor = fopen(FILENAME . $color . ".png", "w");
      imagepng($resource, FILENAME . $color . ".png");
   } else if ($extencion == "jpeg") {
      $descriptor = fopen(FILENAME . $color . ".jpeg", "w");
      imagejpeg($resource, FILENAME . $color . ".jpeg");
   } else if ($extencion == "jpg") {
      $descriptor = fopen(FILENAME . $color . ".jpg", "w");
      imagejpeg($resource, FILENAME . $color . ".jpg");
   }

   fclose($descriptor);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="t10/style.css">
   <title>t10</title>
</head>

<body>

   <h1>Make square image</h1>
   <form action="" method="POST">
      <input name="image" type="url" placeholder="Image url..." value="https://i.ibb.co/4ppXp2S/photo-1530011940847-04cba36df39f.jpg" required>
      <p>
         <button type="submit">GO</button>
      </p><br><br><br>
   </form>

   <?php if (isset($_POST['image'])) :
      $imageOriginal = createImage($_POST["image"]);

      saveImage($_POST["image"], $imageOriginal);

      $imageRed = createImage($_POST["image"]);
      imagefilter($imageRed, IMG_FILTER_COLORIZE, 256, 0, 0);
      saveImage($_POST["image"], $imageRed, "-red");

      $imageGreen = createImage($_POST["image"]);
      imagefilter($imageGreen, IMG_FILTER_COLORIZE, 0, 256, 0);
      saveImage($_POST["image"], $imageGreen, "-green");

      $imageBlue = createImage($_POST["image"]);
      imagefilter($imageBlue, IMG_FILTER_COLORIZE, 0, 0, 256);
      saveImage($_POST["image"], $imageBlue, "-blue");

      imagedestroy($imageOriginal);
      imagedestroy($imageRed);
      imagedestroy($imageGreen);
      imagedestroy($imageBlue);

      $extencion = getExtencion($_POST["image"]); ?>
      <div class="row">
         <div class="column">
            <img src="t10/image-original.<?= $extencion ?>" alt="Incorrect URL!">
         </div>
         <div class="column">
            <img src="t10/image-red.<?= $extencion ?>" alt="Incorrect URL!">
         </div>
      </div>
      <div class="row">
         <div class="column">
            <img src="t10/image-green.<?= $extencion ?>" alt="Incorrect URL!">
         </div>
         <div class="column">
            <img src="t10/image-blue.<?= $extencion ?>" alt="Incorrect URL!">
         </div>
      </div>
   <?php endif ?>

</body>

</html>