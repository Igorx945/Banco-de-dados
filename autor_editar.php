<?php
include_once('include/factory.php');

if (Auth::isAuthenticated()) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("location: autor_listagem.php");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: autor_listagem.php");
    exit();
}

$autor = AutorRepository::get($_GET["id"]);

if (!$autor) {
    header("location: autor_listagem.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .form-control {
            border-radius: 0;
        }

        .bnt-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .bnt-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>
    <?php include("include/menu.php") ?>
    <div class="container">
        <h2>Autor > Editar</h2>
        <a class="btn btn-primary" href="autor_listagem.php">Voltar</a>
        <a class="btn btn-primary" href="autor_novo.php">Novo</a>


        <div class="row mt-4">
            <div class="col-md-12">
                <form action="autor_novo_post.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $autor->getNome(); ?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $autor->getId(); ?>" />
                        <button type="submit" class="bnt bnt-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>