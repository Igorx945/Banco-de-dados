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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/listagensIndx.css">
  <link rel="stylesheet" href="style/index.css">
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
      <div id="listagem">
        <h2>LIVROS > LISTAGEM</h2>
        <button class="novo">Novo Livro</button>
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
              foreach(LivroRepository::listAll() as $livro){
              ?>
              <tr>
                <td><?php echo $livro->getId(); ?></td>
                <td><?php echo $livro->getTitulo(); ?></td>
                <td><?php echo $livro->getAno(); ?></td>
                <td><?php echo $livro->getGenero(); ?></td>
                <td><?php echo $livro->getIsbn(); ?></td>
                <td>
                  <a href="#" id="editar">Editar</a>
                  <a href="#" id="deletar">Deletar</a>
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