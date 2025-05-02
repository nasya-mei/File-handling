<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once'tagReplacer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameFile = $_POST["nameFile"] ?? '';
    $tagBefore = $_POST["tagBefore"] ?? '';
    $tagNew = $_POST["tagNew"] ?? '';
    $output = $_POST["output"] ?? '';

    if(empty($nameFile) || empty($tagBefore) || empty($tagNew) || empty($output)) {
        die("Semua wajib diisi!");
    }

    $replacer = new tagReplacer();
    $message = $replacer->replace($nameFile, $tagBefore, $tagNew, $output);

    header("Location: result.php?message=" . urlencode($message));
    exit;
}
else {
    echo "Akses tdk valid";
}