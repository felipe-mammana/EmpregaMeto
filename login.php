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
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    responder(false, 'Por favor, insira um email válido.', 400);
}

$sql = "
SELECT l.id, l.senha, l.tipo, u.nome, u.status, u.RA, u.telefone, u.idade, u.curso
FROM login l
JOIN user u ON u.id = l.id_user
WHERE l.email = ?
LIMIT 1
";
$stmt = $cone->prepare($sql);
$stmt -> bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if (!password_verify($senha, $result['senha'])) {
    responder(false, 'E-mail ou senha incorretos.', 401);
}

if($result['status'] === 'ativo') {
    $_SESSION['user'] = [
        'id' => $result['id'],
        'nome' => $result['nome'],
        'email' => $email,
        'tipo' => $result['tipo'],
        'status' => $result['status'],
    'RA' => $result['RA'],
    'telefone' => $result['telefone'],
    'idade' => $result['idade'],
    'curso' => $result['curso']
];


responder(true, 'Login realizado com sucesso.', 200, [
  'tipo' => $result['tipo']
]);
} else {
    responder(false, 'Sua conta está inativa. Por favor, entre em contato com o suporte.', 403);    
}
?>
