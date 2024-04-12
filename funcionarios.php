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
          <a href="funcionario_novo.php" class="btn btn-success">NOVO FUNCIONARIO</a>
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
          foreach (FuncionarioRepos::listAll() as $funcionario) {
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
                      <a href="funcionario_editar.php?id=<?php echo $funcionario->getId(); ?>" type="button" class="btn btn-primary">EDITAR</a>
                    </div>
                    <?php if (
                      EmprestimoRepos::countByInclusaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepos::countByAlteracaoFuncionario($funcionario->getId()) == 0 &&
                      EmprestimoRepos::countByDevolucaoFuncionario($funcionario->getId()) == 0 &&
                      EmprestimoRepos::countByRenovacaoFuncionario($funcionario->getId()) == 0 &&
                      ClienteRepos::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      ClienteRepos::countByAlteracaoFuncionario($funcionario->getId()) == 0 &&
                      AutorRepos::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      AutorRepos::countByAlteracaoFuncionario($funcionario->getId()) ==
                      0 &&
                      LivroRepos::countByInclusaoFuncionario($funcionario->getId()) ==
                      0 &&
                      LivroRepos::countByAlteracaoFuncionario($funcionario->getId()) == 0
                    ) { ?>

                      <div class="mb-3">
                        <a href="funcionario_excluir.php?id=<?php echo $funcionario->getId(); ?>" type="button" class="btn btn-danger">DELETAR</a>

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