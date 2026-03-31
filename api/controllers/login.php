<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/config/cone.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/models/User.php";
class AuthController{

    public static function login(){

header('Content-Type: application/json; charset=utf-8');

function responder($ok, $mensagem = '', $status = 200, $data = []) {
    http_response_code($status);
    $payload = array_merge(
        ['ok' => $ok, 'message' => $mensagem],
        is_array($data) ? $data : []
    );
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

session_start();

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    responder(false, 'Por favor, insira um email válido.', 400);

}


global $cone;

$userModel = new User($cone);

$result = $userModel->login($email);

if (!$result) {

    responder(false, 'E-mail ou senha incorretos.', 401);

}

if (!password_verify($senha, $result['senha'])) {

    responder(false, 'E-mail ou senha incorretos.', 401);

}

if ($result['status'] !== 'ativo') {
    responder(false, 'Sua conta está inativa. Por favor, entre em contato com o suporte.', 403);
}

    $_SESSION['user'] = [
        'id' => $result['id'],
        'nome' => $result['nome'],
        'email' => $email,
        'tipo' => $result['tipo'],
        'status' => $result['status'],
    'RA' => $result['RA'],
    'telefone' => $result['telefone'],
    'idade' => $result['idade'],
    'curso' => $result['curso'],
    'primeiro_login' => $result['primeiro_login']
];

responder(true, 'Login realizado com sucesso.', 200, [
    'tipo' => $result['tipo'],
    'primeiro_login' => $result['primeiro_login']
]);
    }
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    AuthController::login();
}
?>
