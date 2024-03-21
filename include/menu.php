
<style>
    header {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    


    #ul {
        display: flex;
    }


    #sair {
        padding: 5px 10px;
        border-radius: 0;
    }
</style>


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
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Emprestimo
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <a href="login.php" id="sair">Sair</a>
</header>