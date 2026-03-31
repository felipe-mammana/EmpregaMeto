<?php

class MudarSenha {

private $cone;

public function __construct($cone) {

    $this->cone = $cone;

}

public function mudarSenha($novaSenha, $userId) {

/* HASH */

$senhaHash =
password_hash(
    $novaSenha,
    PASSWORD_DEFAULT
);

/* SQL */

$sql = "
UPDATE login
SET senha = ?,
    primeiro_login = 0
WHERE id = ?
";

$stmt =
$this->cone->prepare($sql);

$stmt->bind_param(
    "si",
    $senhaHash,
    $userId
);

/* EXECUTAR */

if ($stmt->execute()) {

    return true;

} else {

    return false;

}

}

}