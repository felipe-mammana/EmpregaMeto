<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primeiro Login - METO</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/primeiro_login.css">
</head>
<body>

<div class="primeiro-login-page">

<div class="primeiro-login-card">

<h2 class="primeiro-login-title">
Criar nova senha
</h2>

<p class="primeiro-login-desc">
Por segurança, você precisa criar uma nova senha no primeiro acesso.
</p>

<form id="trocarSenha">

<div class="form-group">

<label>Nova senha</label>

<input
type="password"
name="nova_senha"
id="nova_senha"
required>

</div>

<div class="form-group">

<label>Confirmar senha</label>

<input
type="password"
name="confirmar_senha"
id="confirmar_senha"
required>

</div>

<ul class="password-rules">

<li id="regra-tamanho">
Mínimo 8 caracteres
</li>

<li id="regra-maiuscula">
Letra maiúscula
</li>

<li id="regra-minuscula">
Letra minúscula
</li>

<li id="regra-numero">
Número
</li>

<li id="regra-especial">
Caractere especial
</li>

<li id="regra-confirmacao">
Senhas iguais
</li>

</ul>

<input type="checkbox" id="mostrarSenha">
<label for="mostrarSenha">
Mostrar senha
</label>
<button
type="submit"
class="btn-salvar">

Salvar nova senha

</button>

</form>

</div>

</div>

  <div id="popup" class="popup" aria-hidden="true">
    <div class="popup-card" role="alertdialog" aria-modal="true" aria-labelledby="popup-title">
      <div class="popup-header">
        <span id="popup-title">Atenção</span>
        <button id="popup-close" class="popup-close" type="button" aria-label="Fechar">X</button>
      </div>
      <p id="popup-message" class="popup-message"></p>
      <div class="popup-actions">
        <button id="popup-ok" class="btn-primary" type="button">Ok</button>
      </div>
    </div>
  </div>

<script src="../js/primeiro_login.js"></script>
</body>
</html>
