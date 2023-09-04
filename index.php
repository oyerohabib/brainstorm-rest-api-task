<?php

require_once __DIR__ . '/app/Controllers/CapsuleController.php';
require_once  __DIR__ . '/app/Helpers/function.php';



$capsuleController = new CapsuleController();

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: http://localhost:3000, http://localhost:5000, http://brainstorm-spacex-task.netlify.app/, *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('Access-Control-Allow-Credentials: true');
    http_response_code(204);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == ActionEnum::GET->name && $_SERVER['REQUEST_URI'] == '/api/get_capsules') {
    $capsuleController->getCapsules();
}
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pattern = '/^\/api\/get_capsules\/([A-Za-z0-9]+)$/';

if ($_SERVER["REQUEST_METHOD"] == ActionEnum::GET->name && preg_match($pattern, $requestPath, $matches)) {
    $serial = $matches[1];
    $capsuleController->getOneCapsule($serial);
}
