<?php
// $_SESSION["user"] = "123";
if(isset($_SESSION["user"]))
	header("Location: ProfileView.php");
?>

<div class="navbar-form navbar-right inline-form">
    <input size="22" type="text" placeholder="Email" name="email" id="email" class="form-control">
    <input size="22" type="password" placeholder="Senha" name="senha" id="senha" class="form-control">
    <button name="entrar" id="entrar" class="btn">Entrar</button>
    <button class="btn" data-target="#cadModal" data-toggle="modal">Cadastrar</button>
</div>
