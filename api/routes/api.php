<?php

require_once __DIR__ . '/../controllers/login.php';
require_once __DIR__ . '/../controllers/inscrever.php';
require_once __DIR__ . '/../controllers/mudar_senha.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = trim($request, '/');
$method = $_SERVER['REQUEST_METHOD'];

if ($request === 'empregameto/api/login' && $method === 'POST') {
    AuthController::login();
} elseif ($request === 'empregameto/api/inscrever' && $method === 'POST') {
    AuthRegister::registrar();
} elseif ($request === 'empregameto/api/mudar_senha' && $method === 'POST') {
    AuthSenha::mudar_senha();
} else {
    http_response_code(404);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['ok' => false, 'message' => 'Endpoint não encontrado.']);
}
