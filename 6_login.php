<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recebe os valores e armazena nas variáveis
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
    }

    // Abre o arquivo (usuarios.txt) para leitura
    $arquivo = fopen('usuarios.txt', 'r');

    // Assumímos que o úsuario ainda não deve acessar
    // porque ainda não comparamos (validamos a entrada)
    // ou seja (segurança)
    $login_sucesso = false;

    // Lê cada linha do arquivo
    while (($linha =fgets($arquivo)) !== false) {

        // Divide a linha pelo delimitador ";"
        list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

        // Verifica se o nome e senha correspondem aos valores no arquivo
        if ($nome == $usuario_arquivo && $senha == $senha_arquivo) {
            $login_sucesso = true;
            break;
        }
    }
    // Fecha o arquivo
    fclose($arquivo);

    // Mensagem (Feedback) ao usuario
    if ($login_sucesso) {

        echo "<p>Login realizado com sucesso! Bem-vindo, $nome!</p>";

    } else {
        echo "<p style='color: red;'>Usuario ou senha incorretos!!</p>";
    }
    
    ?>
</body>
</html>
