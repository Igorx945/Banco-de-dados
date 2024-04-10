<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livro listagem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="listagensIndx.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
    <a class="novo" href="index.php">Voltar</a>
      <div id="listagem">
        <h2>LIVROS > LISTAGEM</h2>
        <a class="novo" href="livro_novo.php">Novo Livro</a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Ano</th>
              <th>Genero</th>
              <th>ISBN</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <?php
              foreach(LivroRepos::listAll() as $livro){
              ?>
              <tr>
                <td><?php echo $livro->getId(); ?></td>
                <td><?php echo $livro->getTitulo(); ?></td>
                <td><?php echo $livro->getAno(); ?></td>
                <td><?php echo $livro->getGenero(); ?></td>
                <td><?php echo $livro->getIsbn(); ?></td>
                <td>
                <a href="livro_editar.php?id=<?php echo $livro->getId(); ?>" id="editar">Editar</a>
                  <?php if(EmprestimoRepos::countByLivros($livro->getId()) == 0){ ?>
                  <a href="livro_excluir.php?id=<?php echo $livro->getId(); ?>"  id="deletar">Deletar</a>
                <?php } ?>
                </td>
              </tr>
              <?php
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>