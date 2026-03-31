<?php

class Register {

private $cone;

public function __construct($cone) {

    $this->cone = $cone;

}

/* ===== VERIFICAR DUPLICIDADE ===== */

public function verificarDuplicado(
    $telefone,
    $RA,
    $nome,
    $curso,
    $email
) {

$sql = "
SELECT 1 
FROM user u
LEFT JOIN login l
    ON l.id_user = u.id
WHERE u.telefone = ? 
    OR u.RA = ? 
    OR (u.nome = ? AND u.curso = ?)
    OR l.email = ?
LIMIT 1
";

$stmt = $this->cone->prepare($sql);

$stmt->bind_param(
    "sisss",
    $telefone,
    $RA,
    $nome,
    $curso,
    $email
);

$stmt->execute();

$result = $stmt->get_result();

return $result->num_rows > 0;

}

/* ===== CRIAR USUÁRIO ===== */

public function criarUsuario(
    $nome,
    $RA,
    $telefone,
    $idade,
    $curso,
    $status
) {

$sql = "
INSERT INTO user
(nome, RA, telefone, idade, curso, status)
VALUES (?, ?, ?, ?, ?, ?)
";

$stmt = $this->cone->prepare($sql);

$stmt->bind_param(
    "sissss",
    $nome,
    $RA,
    $telefone,
    $idade,
    $curso,
    $status
);

if (!$stmt->execute()) {

    return false;

}

return $stmt->insert_id;

}

/* ===== CRIAR LOGIN ===== */

public function criarLogin(
    $id_user,
    $email,
    $senha,
    $tipo
) {

$senha_hash =
password_hash(
    $senha,
    PASSWORD_DEFAULT
);

$sql = "
INSERT INTO login
(id_user, email, senha, tipo)
VALUES (?, ?, ?, ?)
";

$stmt = $this->cone->prepare($sql);

$stmt->bind_param(
    "isss",
    $id_user,
    $email,
    $senha_hash,
    $tipo
);

return $stmt->execute();

}

}