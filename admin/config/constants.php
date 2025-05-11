<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

// Load local .env if exists
if (file_exists(__DIR__ . '/../../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->safeLoad();
}

// Prioritize environment variables inside container
define('SITEURL', $_ENV['SITEURL'] ?? getenv('SITEURL'));
define('LOCALHOST', $_ENV['DB_HOST'] ?? getenv('DB_HOST'));
define('DB_USERNAME', $_ENV['DB_USERNAME'] ?? getenv('DB_USERNAME'));
define('DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD'));
define('DB_NAME', $_ENV['DB_NAME'] ?? getenv('DB_NAME'));

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
