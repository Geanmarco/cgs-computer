<?php

//var_dump($_GET);
$source =__DIR__."/../productos/".$_GET["uri"];
/*echo  $source;
die();*/
$extension = pathinfo($source, PATHINFO_EXTENSION);
//echo("The extension is $extension.");
switch($extension){
    case 'jpeg':
        $image = imagecreatefromjpeg($source);
        break;
    case 'png':
        $image = imagecreatefrompng($source);
        break;
    case 'gif':
        $image = imagecreatefromgif($source);
        break;
    default:
        $image = imagecreatefromjpeg($source);
}

header('Content-Type: image/'.$extension);

// Imprimir la imagen
imagejpeg($image);