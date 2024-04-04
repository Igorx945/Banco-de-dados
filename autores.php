<?php
include_once('include/factory.php');

if (Auth::isAuthenticated()) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOVO AUTOR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include("include/menu.php") ?>
  <div class="container">
    <h2>AUTORES</h2>
    <div class="table-responsive">
      <h2>Autores Listagem</h2>
      <button type="submit" class="btn btn-success"><a id="titAndButton" href="autor_novo.php">Novo Autor</a></button>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Pedro</td>

            <td>
              <button class="btn btn-primary">Editar</button>
              <button class="btn btn-danger">Excluir</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Marcia</td>

            <td>
              <button class="btn btn-primary">Editar</button>
              <button class="btn btn-danger">Excluir</button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Carlos</td>

            <td>
              <button class="btn btn-primary">Editar</button>
              <button class="btn btn-danger">Excluir</button>
            </td>
        <tbody>
          <?php
          foreach (AutorRepos::listAll() as $autor) {
          ?>
            <tr>
              <td><?php echo $autor->getId(); ?></td>
              <td><?php echo $autor->getNome(); ?></td>
              <td>
                <a href="autor_editar.php?id=<?php echo $autor->getId(); ?>" id="editar">Editar</a>
                <?php if (LivroRepos::countByAutor($autor->getId()) == 0) { ?>
                  <a href="autor_excluir.php?id=<?php echo $autor->getId(); ?>" id="deletar">Deletar</a>
                <?php } ?>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>