<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['fullname'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $confirm_senha = $_POST['confirm_password'];

    // Verifica se as senhas batem
    if ($senha !== $confirm_senha) {
        echo "<script>alert('As senhas não coincidem!'); window.location.href='index.html';</script>";
        exit;
    }

    // Verifica se o email já existe
    $check_email = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        echo "<script>alert('Este email já está cadastrado!'); window.location.href='index.html';</script>";
        exit;
    }

    // Criptografa e Salva
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        // Sucesso: Mostra alerta e volta pro login
        echo "<script>alert('Cadastro realizado com sucesso! Faça login.'); window.location.href='index.html';</script>";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>