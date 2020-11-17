<?php

require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

// Load Env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create connection
$connection = new TwitterOAuth(
    $_ENV['CONSUMER_KEY'],
    $_ENV['CONSUMER_SECRET'],
    $_ENV['ACCESS_TOKEN'],
    $_ENV['ACCESS_SECRET'],
);

// Increase timeouts (connection/response in seconds)
$connection->setTimeouts(60, 60);

// Get random image
switch ($_ENV['IMAGE_SOURCE']) {
    case 'unsplash':
        $url = 'https://source.unsplash.com/random/1920x1080?' . $_ENV['UNSPLASH_TERMS'];
        break;

    case 'file':
    default:
        $files = glob(__DIR__ . '/image/*.*');
        $url = $files[array_rand($files)];
        break;
}

//
echo "Fetching image: $url\n";

// Fetch image
$image = base64_encode(file_get_contents($url));

// Create tweet
$connection->post('account/update_profile_banner', [
    'banner' => $image,
]);
