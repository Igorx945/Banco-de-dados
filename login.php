<?php
include_once('include/factory.php');

if(Auth::isAuthenticated()){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background: radial-gradient(circle, rgb(18, 45, 185) 0%, rgb(182, 40, 68) 100%);
  }
  
  .container {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #7a7070;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 2em;
    width: 300px;
  }
  
  .container h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .container label {
    display: flex;
    margin-bottom: 5px;
  }
  
  .container input[type="text"], .container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  .container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .container input[type="submit"]:hover {
    background-color: #45a049;
  }
  </style>
  
  </head>
  <body>
    <div class="container">
      <h2>Login</h2>
      <form method="POST" action="logar.php">
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br>
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="senha" required><br>
        <input type="submit" value="Enviar">
      </form>
    </div>
  </body>
</html>


