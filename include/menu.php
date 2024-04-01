<header>
    <nav>
        <div id="headTitle" onclick="link('index.php')">
            <h1>Bliobliteca</h1>
        </div>
        <div id="ul">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produtos
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="livros.php">Livros</a></li>
                    <li><a class="dropdown-item" href="autores.php">Autor</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                    <li><a class="dropdown-item" href="funcionarios.php">Funcionarios</a></li>
                </ul>
            </div>
            <a href="emprestimo_listagem.php">Emprestimo</a>

        </div>
    </nav>
    <a href="logout.php" id="sair">Sair</a>
</header>