<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FUNCIONARIO LISTAGEM</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">
    <link rel="stylesheet" href="listagensIndx.css">
</head>

<body>
  <?php include("include/menu.php"); ?>

  <div class="container ">
  <a class="novo" href="index.php">Voltar</a>
    
    <div id="titAndButton">
      <h2>FUNCIONARIO < LISTAGEM</h2>
          <a href="funcioNovo.php" class="btn btn-success">NOVO FUNCIONARIO</a>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Telefone</th>

            <th>Email</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach (FuncionarioRepository::listAll() as $funcionario) {
            $user = Auth::getUser();
          ?>
            <tr>
              <td><?php echo $funcionario->getID(); ?></td>
              <td><?php echo $funcionario->getNome(); ?></td>
              <td><?php echo $funcionario->getTelefone(); ?></td>
              <td><?php echo $funcionario->getCpf(); ?></td>
              <td><?php echo $funcionario->getEmail(); ?></td>

              <div class="row mt-2">
                <div id="titAndButton">
                  <td>
                    <div class="mb-3">
                      <a href="funcioEditar.php?id=<?php echo $funcionario->getId(); ?>" type="button" class="btn btn-primary">EDITAR</a>
                    </div>
                    <?php if (
                      EmprestimoRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 &&
                      EmprestimoRepository::countByDevolucaoFuncionario($funcionario->getId()) == 0 &&
                      EmprestimoRepository::countByRenovacaoFuncionario($funcionario->getId()) == 0 &&
                      ClienteRepository::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      ClienteRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 &&
                      AutorRepository::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      AutorRepository::countByAlteracaoFuncionario($funcionario->getId()) ==
                      0 &&
                      LivroRepository::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      LivroRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0
                    ) { ?>

                      <div class="mb-3">
                        <a href="funcioExcluir.php?id=<?php echo $funcionario->getId(); ?>" type="button" class="btn btn-danger">DELETAR</a>

                      </div>
                  </td>
                </div>
            </tr>
          <?php
                    }
          ?>
        <?php
          }
        ?>





        </tbody>
      </table>

    </div>
  </div>
</body>

</html>