<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/config/cone.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/api/models/mudar_senha.php";

class AuthSenha {

public static function mudar_senha() {

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {

    http_response_code(401);

    echo json_encode([
        "ok" => false,
        "message" => "Usuário não autenticado"
    ]);

    exit;

}

global $cone;


$novaSenha =
$_POST['nova_senha'] ?? '';

$confirmarSenha =
$_POST['confirmar_senha'] ?? '';

$userId =
$_SESSION['user']['id'];


if ($novaSenha !== $confirmarSenha) {

    http_response_code(400);

    echo json_encode([
        "ok" => false,
        "message" => "Senhas não coincidem"
    ]);

    exit;

}

/* ===== VALIDAR FORÇA ===== */

if (!self::senhaValida($novaSenha)) {

    http_response_code(400);

    echo json_encode([
        "ok" => false,
        "message" => "Senha fora do padrão"
    ]);

    exit;

}

/* ===== MODEL ===== */

$senhaModel =
new MudarSenha($cone);

$resultado =
$senhaModel->mudarSenha(
    $novaSenha,
    $userId
);

/* ===== RESPOSTA ===== */

if ($resultado) {

    echo json_encode([
        "ok" => true,
        "message" => "Senha alterada"
    ]);

} else {

    http_response_code(500);

    echo json_encode([
        "ok" => false,
        "message" => "Erro ao atualizar senha"
    ]);

}

}

/* ===== VALIDAÇÃO ===== */

private static function senhaValida($senha) {

return preg_match(

"/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/",

$senha

);

}

}

AuthSenha::mudar_senha();
