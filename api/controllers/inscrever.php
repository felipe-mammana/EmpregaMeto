<?php

require_once __DIR__ . '/../config/cone.php';
require_once __DIR__ . '/../models/inscrever.php';

class AuthRegister {

public static function registrar() {

header('Content-Type: application/json');

/* ===== DADOS ===== */

$nome     = trim($_POST['nome'] ?? '');
$email    = trim($_POST['email'] ?? '');
$RA       = (int)($_POST['RA'] ?? 0);
$telefone = trim($_POST['telefone'] ?? '');
$idade    = (int)($_POST['idade'] ?? 0);
$curso    = trim($_POST['curso'] ?? '');

$senha  = getenv('METO_INITIAL_PASSWORD') ?: '';
$tipo   = "user";
$status = "pendente";

/* ===== VALIDAÇÕES ===== */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    self::responder(
        false,
        'Email inválido',
        400
    );

}

if (!preg_match(
'/^\(\d{2}\) \d{5}-\d{4}$/',
$telefone
)) {

    self::responder(
        false,
        'Telefone inválido',
        400
    );

}

if ($senha === '') {

    self::responder(
        false,
        'Senha inicial não configurada.',
        500
    );

}

/* ===== MODEL ===== */

global $cone;

$model =
new Register($cone);

/* DUPLICADO */

if ($model->verificarDuplicado(
    $telefone,
    $RA,
    $nome,
    $curso,
    $email
)) {

    self::responder(
        false,
        'Dados já cadastrados.',
        409
    );

}

/* CRIAR USER */

$id_user =
$model->criarUsuario(
    $nome,
    $RA,
    $telefone,
    $idade,
    $curso,
    $status
);

if (!$id_user) {

    self::responder(
        false,
        'Erro ao criar usuário.',
        500
    );

}

/* CRIAR LOGIN */

if (!$model->criarLogin(
    $id_user,
    $email,
    $senha,
    $tipo
)) {

    self::responder(
        false,
        'Erro ao criar login.',
        500
    );

}

/* SUCESSO */

self::responder(
    true,
    'Inscrição enviada com sucesso.'
);

}

/* ===== RESPOSTA ===== */

private static function responder(
    $ok,
    $mensagem,
    $status = 200
) {

http_response_code($status);

echo json_encode([
    'ok' => $ok,
    'message' => $mensagem
]);

exit;

}

}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    AuthRegister::registrar();
}
