<?php
include_once('include/factory.php');

if(Auth::isAuthenticated()){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOVO AUTOR</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>AUTORES</h2>
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
                foreach(AutorRepos::listAll() as $autor) {
                  ?>
                  <tr>
                    <td><?php echo $autor->getId(); ?></td>
                    <td><?php echo $autor->getNome(); ?></td>
                    <td>
                    <a href="#" class="btn btn-info">Editar</a>
                    <a href="#" class="btn btn-danger">Deletar</a>
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
</body>
</html>