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
  <title>Funcionario Listagem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="listagensIndx.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
<?php include("include/menu.php") ?>
  <main>
    <div class="container">
      <div id="listagem">
        <h2>FUNCIONARIO > LISTAGEM</h2>
        <a href= "funcionario_novo.php" class="novo">Novo Funcionario</a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach (FuncionarioRepos::listAll() as $funcionario) {
            ?>
              <tr>
                <td><?php echo $funcionario->getId(); ?></td>
                <td><?php echo $funcionario->getNome(); ?></td>
                <td><?php echo $funcionario->getCpf(); ?></td>
                <td><?php echo $funcionario->getTelefone(); ?></td>
                <td><?php echo $funcionario->getEmail(); ?></td>

                <td>
                <a href="funcionario_editar.php?id=<?php echo $funcionario->getId(); ?>" id="editar">Editar</a>
                  <?php if(LivroRepos::countByAutor($funcionario->getId()) == 0){ ?>
                  <a href="funcionario_excluir.php?id=<?php echo $funcionario->getId(); ?>"  id="deletar">Deletar</a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>