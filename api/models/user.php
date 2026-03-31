<?php

class User {

private $cone;

public function __construct($cone) {

$this->cone = $cone;

}

public function login($email) {

$sql = "
SELECT 
    l.id,
    l.senha,
    l.tipo,
    l.primeiro_login,

    u.nome,
    u.status,
    u.RA,
    u.telefone,
    u.idade,
    u.curso

FROM login l

JOIN user u 
ON u.id = l.id_user

WHERE l.email = ?

LIMIT 1
";

$stmt = $this->cone->prepare($sql);

if (!$stmt) {

die("Erro prepare: " . $this->cone->error);

}

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();

return $result->fetch_assoc();

}

}