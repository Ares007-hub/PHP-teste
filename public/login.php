<?php

session_start();

$_SESSION["usuario_logado"] = "Raphael";
$_SESSION["nivel_acesso"] = "admin";

header("Location: painel.php");
exit;

?>