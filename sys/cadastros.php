<?php
require 'vendor/autoload.php';
require 'config.php';

session_start();

$type = $_GET['type'] ?? 'default';

if ($type == 'login') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($login) || empty($senha)) {
        die('Por favor, preencha todas as caixas...');
    }

    $odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $SQL = $odb->prepare("SELECT * FROM `usuarios` INNER JOIN cargos ON cargo_usr = ID_crg WHERE `matricula_usr` = :login OR `email_usr` = :login ");
        $SQL->execute([':login' => $login]);
        $usuario = $SQL->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha_usr'])) {
            $_SESSION['id'] = $usuario["ID_usr"];
            $_SESSION['nome'] = $usuario["nome_usr"];
            $_SESSION['matricula'] = $usuario["matricula_usr"];
            $_SESSION['email'] = $usuario["email_usr"];
            $_SESSION['telefone'] = $usuario["telefone_usr"];
            $_SESSION['avatar'] = $usuario["avatar_usr"];
            $_SESSION['cargo']  = $usuario["nome_crg"];

            echo 'Ola Bem-Vindo!';
        } else {
          
            echo 'Usuário/Senha Incorreta.';
        }
    } catch (PDOException $e) {
        die('Erro de conexão ou consulta SQL: ' . $e->getMessage());
    }
}



if ($type == 'registrar') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    if (empty($nome) || empty($email) || empty($senha) || empty($telefone)) {
        die('Por favor, preencha todos os campos.');
    }

    // Verifica se o email já está cadastrado
    $SQL = $odb->prepare("SELECT * FROM `usuarios` WHERE `email_usr` = :email");
    $SQL->execute([':email' => $email]);
    $usuario = $SQL->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        die('E-mail já cadastrado.');
    }

    // Função para gerar uma matrícula única
    function gerarMatriculaUnica($odb) {
        do {
            $matricula = 'UC' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
            $SQL = $odb->prepare("SELECT * FROM `usuarios` WHERE `matricula_usr` = :matricula");
            $SQL->execute([':matricula' => $matricula]);
            $usuarioExistente = $SQL->fetch(PDO::FETCH_ASSOC);
        } while ($usuarioExistente); // Repete até gerar uma matrícula única

        return $matricula;
    }

    // Gera a matrícula única
    $matricula = gerarMatriculaUnica($odb);

    // Criptografando a senha
    $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);

    try {
        // Insere o novo usuário
        $SQL = $odb->prepare("
            INSERT INTO `usuarios` 
            (`nome_usr`, `matricula_usr`, `email_usr`, `senha_usr`, `avatar_usr`, `telefone_usr`, `cargo_usr`, `data_usr`) 
            VALUES 
            (:nome, :matricula, :email, :senha, '', :telefone, 2, NOW())
        ");

        $SQL->execute([
            ':nome' => $nome,
            ':matricula' => $matricula,
            ':email' => $email,
            ':senha' => $hashedPassword,
            ':telefone' => $telefone
        ]);

        // Inicia a sessão após o registro
        $_SESSION['id'] = $odb->lastInsertId(); // Obtém o ID do usuário recém-criado
        $_SESSION['nome'] = $nome;
        $_SESSION['matricula'] = $matricula;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['cargo'] = 'Aluno'; // Definido como aluno por padrão

        echo 'Registro realizado com sucesso! Sua matrícula é ' . $matricula;
    } catch (PDOException $e) {
        die('Erro ao registrar o usuário: ' . $e->getMessage());
    }
}




?>
