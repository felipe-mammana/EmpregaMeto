<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/controllers/login.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/controllers/inscrever.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/controllers/mudar_senha.php";

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = trim($request, '/');
$method = $_SERVER['REQUEST_METHOD'];

if ($request === 'meto/api/login' && $method === 'POST') {
    AuthController::login();
} elseif ($request === 'meto/api/inscrever' && $method === 'POST') {
    AuthRegister::registrar();
} elseif ($request === 'meto/api/mudar_senha' && $method === 'POST') {
    AuthSenha::mudar_senha();
} else {
    http_response_code(404);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['ok' => false, 'message' => 'Endpoint não encontrado.']);
}
