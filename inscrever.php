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

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$RA = (int)($_POST['RA'] ?? 0);
$telefone = trim($_POST['telefone'] ?? '');
$idade  = (int)($_POST['idade'] ?? 0);
$curso  = trim($_POST['curso'] ?? '');
$tipo = "user";
$status = "pendente";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    responder(false, 'Por favor, insira um email válido.', 400);
}

if (!preg_match('/^\(\d{2}\) \d{5}-\d{4}$/', $telefone)) {
    responder(false, 'Por favor, insira um telefone válido.', 400);
}

$sql_check = "SELECT id FROM user WHERE email = ? OR telefone = ? OR RA = ? OR (nome = ? AND curso = ?)";
$stmt_check = $cone->prepare($sql_check);
if (!$stmt_check) {
    responder(false, 'Erro interno ao validar inscrição.', 500);
}
$stmt_check->bind_param("ssiss", $email, $telefone, $RA, $nome, $curso);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    responder(false, 'Este e-mail já está cadastrado.', 409);
}
$stmt_check->close();

$sql = "INSERT INTO user (nome, email, RA, telefone, idade, curso, tipo, status) VALUES (?,?, ?, ?, ?, ?, ?, ?)";   
$stmt = $cone->prepare($sql);
if (!$stmt) {
    responder(false, 'Erro interno ao salvar inscrição.', 500);
}
$stmt->bind_param("ssississ", $nome, $email, $RA, $telefone, $idade, $curso, $tipo, $status);
if ($stmt->execute()) {
    responder(true, 'Inscrição enviada com sucesso.', 200);
} else {
    responder(false, 'Erro ao inserir dados. Tente novamente.', 500);
}

?>