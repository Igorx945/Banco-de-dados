<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: livro_lista.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: livro_lista.php");
    exit();
}

$livro = LivroRepos::get($_GET['id']);

if (!$livro){
    header("Location: livro_lista.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">
</head>
<body>
<?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>LIVRO > Editar</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="livroEditarPost.php" method="POST">
                        <div class="md-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $livro->getTitulo();?>">
                        </div>
                        <div class="md-3">
                            <label for="ano" class="form-label">Ano</label>
                            <input type="text" name="ano" id="ano" class="form-control" value="<?php echo $livro->getAno();?>">
                        </div> 
                        <div class="md-3">
                            <label for="genero" class="form-label">Genero</label>
                            <input type="text" name="genero" id="genero" class="form-control" value="<?php echo $livro->getGenero();?>">
                        </div> 
                        <div class="md-3">
                            <label for="isbn" class="form-label">Isbn</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo $livro->getIsbn();?>">
                        </div>
                        <div class="md-3">
                            <label for="autor" class="form-label">Autor</label>
                            <select name="autor" id="autor">
                                <?php
                                    $autor = AutorRepos::listAll();
                                ?>
                                <?php
                                    foreach(AutorRepos::listAll() as $autor){
                                ?>
                                <option value="<?php echo $autor->getId();?>"  <?php if($livro->getAutorId() == $autor->getId()){ echo "selected";} ?>>
                                        <?php echo $autor->getNome() ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $livro->getId();?>">
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