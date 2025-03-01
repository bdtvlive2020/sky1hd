<?php
$get = $_GET['get'];
$mpdUrl = 'https://linear-s.media.skyone.co.nz/' . $get;

$opts = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
        "follow_location" => 1,
        "timeout" => 5
    ]
];

$context = stream_context_create($opts);
$res = @file_get_contents($mpdUrl, false, $context);

if ($res === FALSE) {
    header("HTTP/1.1 404 Not Found");
    echo "MPD file not found!";
} else {
    header("Content-Type: application/dash+xml");
    echo $res;
}
?>
