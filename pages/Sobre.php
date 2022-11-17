<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
  <title>Faculdade Website</title>
</head>

<body>
  <section class="sub-header">
    <nav>
      <a href="index.html" class=""><img src="imagens/logo.png" alt=""></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="escondeMenu()"></i>
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="#">SOBRE</a></li>
          <li><a href="#">CURSOS</a></li>
          <li><a href="#">BLOG</a></li>
          <li><a href="#">CONTATO</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="mostraMenu()"></i>
    </nav>
      <h1>Sobre Nós</h1>
  </section>

  <!-- Sobre Nós Conteúdo -->
  <section class="sobre-nos">
    <div class="linha">
      <div class="coluna-sobre">
        <h1>Nós Somos a Melhor Faculdade</h1>
        <p>Lorem ipsum dolor sit amet . Os operadores gráficos e tipográficos sabem disso bem, na realidade, todas as profissões que lidam com o universo da comunicação têm um relacionamento estável com essas palavras, mas o que é? Lorem ipsum é um texto fofo sem qualquer sentido.</p>
        <a href="#" class="btn btn-vermelho">EXPLORE AGORA</a>
      </div>
      <div class="coluna-sobre">
        <img src="./imagens/about.jpg" alt="">
      </div>
    </div>
  </section>

  <footer>
    <h4>Sobre Nós</h4>
    <p>Lorem ipsum dolor sit amet . Os operadores gráficos e tipográficos sabem disso bem, na realidade, todas as profissões que lidam com o universo da comunicação têm um relacionamento estável com essas palavras, mas o que é? Lorem ipsum é um texto fofo sem qualquer sentido.</p>
    <div class="icons">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-linkedin"></i>
      <p>Criado por <i class="fa fa-heart-o"></i> Giovana Sanches - 2022</p>
    </div>
  </footer>
  <script src="./js/script.js"></script>
</body>

</html>