<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: funcionario.php");
    exit();
}
if ($_GET['id'] == '' || $_GET['id'] == null) {
    header("Location: funcionario.php");
    exit();
}

$funcionario = FuncionarioRepos::get($_GET['id']);

if (!$funcionario) {
    header("Location: funcionario.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">
    
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>funcionario > Editar</h2>
            <h2><strong onclick="link('funcionarios.php')">Funcionario</strong> > Novo</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="funcionario_senha_post.php" method="POST"> 
                        <div class="md-3">
                            <label for="senha" class="form-label">Nova Senha</label>
                            <input type="text" name="senha" id="senha" class="form-control">
                        </div><div class="md-3">
                            <label for="repSenha" class="form-label">Repita a Senha</label>
                            <input type="text" name="repSenha" id="repSenha" class="form-control">
                        </div>
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $funcionario->getId(); ?>">
                            <button type="submit" class="enviar">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>