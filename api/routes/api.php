<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/controllers/login.php";

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($request === 'meto/api/login' && $method === 'POST') {
    AuthController::login();
} else {
    http_response_code(404);
    echo json_encode(['ok' => false, 'message' => 'Endpoint não encontrado.']);
}