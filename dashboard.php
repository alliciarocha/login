<?php
session_start();

// Verifica se o usuário NÃO está logado. Se não estiver, joga de volta pro login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="src/styles.css">
    <style>
        /* Um estilo simples só para centralizar o texto nessa tela */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }
        h1 { font-size: 3rem; }
        .btn-sair {
            margin-top: 20px;
            padding: 10px 20px;
            background: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <h1>Bem-vinda, <?php echo $_SESSION['usuario_nome']; ?>!</h1>
    <p>Você acessou o sistema com sucesso.</p>

    <a href="logout.php" class="btn-sair">Sair (Logout)</a>

</body>
</html>