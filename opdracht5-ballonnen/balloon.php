<?php
require_once "balloon.class.php";

// willekeurige data om de class te testen
$colors = ["red", "blue", "green", "purple", "orange", "pink"];
$names = ["Happy", "Joy", "Smile", "Fun", "Bubbles", "Floaty"];
$emojis = ["🎈", "😊", "😁", "🎉", "✨", "😄"];

// random values
$color = $colors[array_rand($colors)];
$size = rand(50, 150); // px
$name = $names[array_rand($names)];
$emoji = $emojis[array_rand($emojis)];

$balloon = new Balloon($color, $size, $name, $emoji);

header("Content-Type: application/json");
echo json_encode($balloon->toArray());
