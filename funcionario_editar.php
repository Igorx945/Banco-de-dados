<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: funcionario.php?1");
    exit();
}
if ($_GET['id'] == '' || $_GET['id'] == null) {
    header("Location: funcionario.php?2");
    exit();
}

$funcionario = FuncionarioRepos::get($_GET['id']);

if (!$funcionario) {
    header("Location: funcionario.php?3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>funcionario > Editar</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="funcionario_editar_post.php" method="POST">
                        <div class="md-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $funcionario->getNome(); ?>">
                        </div>
                        <div class="md-3">
                            <label for="cpf" class="form-label">Cpf</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $funcionario->getCpf(); ?>">
                        </div>
                        <div class="md-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $funcionario->getTelefone(); ?>">
                        </div>
                        <div class="md-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $funcionario->getEmail(); ?>">
                        </div>
                        
                        
                        
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $funcionario->getId(); ?>">
                            <button type="submit" class="enviar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>