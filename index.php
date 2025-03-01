<?php
$get = $_GET['get'];
$hlsUrl = 'https://v18tataplaysyndication.akamaized.net/bpk-tv/Sports18_1_HD_voot_MOB/' . $get;

$opts = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
        "follow_location" => 1,
        "timeout" => 5
    ]
];

$context = stream_context_create($opts);
$res = @file_get_contents($hlsUrl, false, $context);

// Debugging output
if ($res === FALSE) {
    header("HTTP/1.1 404 Not Found");
    echo "M3U8 file not found! URL: " . $hlsUrl;
} else {
    header("Content-Type: application/vnd.apple.mpegurl");
    echo $res;
}
?>
