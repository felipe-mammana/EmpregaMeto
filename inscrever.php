<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/cone.php";

header('Content-Type: application/json; charset=utf-8');

function responder($ok, $mensagem = '', $status = 200) {
    http_response_code($status);
    echo json_encode([
        'ok' => $ok,
        'message' => $mensagem
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$nome     = trim($_POST['nome']     ?? '');
$email    = trim($_POST['email']    ?? '');
$RA       = (int)($_POST['RA']      ?? 0);
$telefone = trim($_POST['telefone'] ?? '');
$idade    = (int)($_POST['idade']   ?? 0);
$curso    = trim($_POST['curso']    ?? '');
$senha    = "Meto@2026";
$tipo     = "user";
$status   = "pendente";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    responder(false, 'Por favor, insira um email válido.', 400);
}

if (!preg_match('/^\(\d{2}\) \d{5}-\d{4}$/', $telefone)) {
    responder(false, 'Por favor, insira um telefone válido.', 400);
}


$sql_check = "SELECT 1 
FROM user u
LEFT JOIN login l ON l.id_user = u.id
WHERE u.telefone = ? 
    OR u.RA = ? 
    OR (u.nome = ? AND u.curso = ?)
    OR l.email = ?
LIMIT 1";
$stmt_check = $cone->prepare($sql_check);
if (!$stmt_check) {
    responder(false, 'Erro interno ao validar inscrição.', 500);
}
$stmt_check->bind_param("sisss", $telefone, $RA, $nome, $curso, $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    responder(false, 'Dados já cadastrados (e-mail, telefone, RA ou nome+curso).', 409);
}
$stmt_check->close();

$sql_user = "INSERT INTO user (nome, RA, telefone, idade, curso, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $cone->prepare($sql_user);
if (!$stmt) {
    responder(false, 'Erro interno ao salvar inscrição.', 500);
}
$stmt->bind_param("sissss", $nome, $RA, $telefone, $idade, $curso, $status);

if (!$stmt->execute()) {
    responder(false, 'Erro ao inserir dados. Tente novamente.', 500);
}

$id_user = $stmt->insert_id;
$stmt->close();

$senha_hash  = password_hash($senha, PASSWORD_DEFAULT);
$sql_login   = "INSERT INTO login (id_user, email, senha, tipo) VALUES (?, ?, ?, ?)";
$stmt_login  = $cone->prepare($sql_login);

if (!$stmt_login) {
    responder(false, 'Erro ao criar login.', 500);
}
$stmt_login->bind_param("isss", $id_user, $email, $senha_hash, $tipo);
if ($stmt_login->execute()) {
    responder(true, 'Inscrição enviada com sucesso.', 200);
} else {
    responder(false, 'Erro ao criar login. Tente novamente.', 500);
}