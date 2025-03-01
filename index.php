<?php
$get = $_GET['get'];
$m3u8Url = 'https://app24.jagobd.com.bd/c3VydmVyX8RpbEU9Mi8xNy8yMDE0GIDU6RgzQ6NTAgdEoaeFzbF92YWxIZTO0U0ezN1IzMyfvcGVMZEJCTEFWeVN3PTOmdFsaWRtaW51aiPhnPTI2/atnws-sg.stream/playlist.m3u8';

$opts = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\r\n",
        "follow_location" => 1,
        "timeout" => 5
    ]
];

$context = stream_context_create($opts);
$res = @file_get_contents($m3u8Url, false, $context);

// Debugging output
if ($res === FALSE) {
    header("HTTP/1.1 404 Not Found");
    echo "M3U8 file not found! URL: " . $m3u8Url;
} else {
    header("Content-Type: application/vnd.apple.mpegurl");
    echo $res;
}
?>
