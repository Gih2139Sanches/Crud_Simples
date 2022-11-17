<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/login.css">

  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
  <title>Faculdade Website</title>
</head>

<body>
  <div class="container">
    <div class="formulario">
      <h1 id="titulo">Cadastra-se</h1>
      <form>
        <div class="input-grupo">
          <div class="input-campo" id="campoNome">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="Nome">
          </div>
          <div class="input-campo">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Email">
          </div>
          <div class="input-campo">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="Senha">
          </div>
          <p>Perdeu sua senha? <a href="#">Clique Aqui</a></p>
          <div class="btn-campo">
            <button type="submit"><a href="Dashboard.php">Entrar</a></button>
          </div>
        </div>
        <div class="btn-campo">
          <button type="button" id="signupBtn">Cadastra-se</button>
          <button type="button" class="disabilitado" id="signinBtn">Login</button>
        </div>
      </form>
    </div>
  </div>
  <script src="../js/script.js"></script>
</body>

</html>