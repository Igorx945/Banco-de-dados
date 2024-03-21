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
  <title>AUTOR > LISTAGEM</title>
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
        <h2>AUTORES > LISTAGEM</h2> 
        <button class="novo" onclick="link('autor_novo.php')">Novo Autor</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <?php
              foreach(AutorRepository::listAll() as $autor){
              ?>
              <tr>
                <td><?php echo $autor->getId(); ?></td>
                <td><?php echo $autor->getNome(); ?></td>
                <td>
                  <a href="autor_editar.php?id=<?php echo $autor->getId(); ?>" id="editar">Editar</a>
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
</body>

</html>