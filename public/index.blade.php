<?php
session_start();

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // trim() remove espaços vazios acidentais no início e no fim
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    try {
        if (empty($email) || empty($senha)) {
            throw new Exception("Preencha todos os campos.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Digite um formato de e-mail válido.");
        }

        // Simulação de validação (No banco real, usaríamos password_verify)
        $emailCorreto = "admin@email.com";
        $senhaCorreta = "123456";

        if ($email === $emailCorreto && $senha === $senhaCorreta) {
            $_SESSION["usuario"] = $email;
            $sucesso = "Login aprovado! Redirecionando...";
        } else {
            throw new Exception("E-mail ou senha incorretos.");
        }

    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Importando o CSS separado -->
    <link rel="stylesheet" href="\css\style.css">
</head>
<body>

    <main class="login-card">
        <div class="login-header">
            <h1>Bem-vindo</h1>
            <p>Insira suas credenciais para acessar o painel</p>
        </div>

        <!-- Exibe caixa de erro ou sucesso apenas se o PHP preencher a variável -->
        <?php if (!empty($erro)): ?>
            <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <?php if (!empty($sucesso)): ?>
            <div class="alerta alerta-sucesso"><?= htmlspecialchars($sucesso) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php" id="formLogin" novalidate>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="voce@exemplo.com"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    required
                >
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <div class="senha-wrapper">
                    <input 
                        type="password" 
                        id="senha" 
                        name="senha" 
                        placeholder="••••••••" 
                        required
                    >
                    <button type="button" id="btnToggleSenha" class="btn-olho">Mostrar</button>
                </div>
            </div>

            <button type="submit" id="btnSubmit" class="btn-principal">Entrar</button>
        </form>
    </main>

    <script src="js\script.js"></script>
</body>
</html>