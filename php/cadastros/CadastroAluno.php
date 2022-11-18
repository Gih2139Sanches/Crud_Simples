<?php
require_once '../init.php';

// conexão com o banco de dados
$db = connectDB();

// nao usa chave primaria para ordenação dos registros
// utiliza order by e 'mostra' na ordem desejada

$sql = "SELECT * FROM alunos ORDER BY nome ASC";
//Seleciona os registros
$stmt = $db->prepare($sql);
$stmt->execute();

//Pega dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;


//Validar para evitar dados vazios
if (!empty($_POST['acao']) && (empty($nome) || empty($email))) {
  echo "Preencha todos os campos";
  exit;
}

$PDO = connectDB();
if (isset($_POST['acao']) && $_POST['acao'] == 'adicionar') {

  //Insere no banco
  $sql = "INSERT INTO alunos (nome, email, cpf, telefone) VALUES (:nome, :cpf, :email, :telefone)";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);


  if ($stmt->execute()) {
    header('Location: ' . APP . 'index.php');
  } else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
  }
} elseif (isset($_POST['acao']) && $_POST['acao'] == 'edita') {
  $sql = "UPDATE tb_clientes SET nome = :nome, email = :email WHERE id = :id";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':id', $id);

  if ($stmt->execute()) {
    header('Location: ' . APP . 'index.php');
  } else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
  }
} elseif (isset($_GET['acao']) && $_GET['acao'] == 'deletar') {
  $id  = isset($_GET['id']) ? $_GET['id'] : null;
  // valida o ID
  if (empty($id)) {
    echo "ID não informado";
    exit;
  }

  // remove do banco
  $sql = "DELETE FROM tb_clientes WHERE id = :id";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  if ($stmt->execute()) {
    header('Location: ' . APP . 'index.php');
  } else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
  }
}
?>


<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>crud dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!----css3---->
  <link rel="stylesheet" href="css/custom.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>


  <!--google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>

  <div class="wrapper">
    <div class="body-overlay"></div>

    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><i class="fa-solid fa-user">&nbsp;&nbsp;&nbsp;&nbsp;</i><span>Teste</span></h3>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a href="#" class="dashboard"><i class="material-icons">dashboard</i>
            <span>Dashboard</span></a>
        </li>

        <li class="dropdown">
          <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">grid_on</i><span>Tabelas</span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu6">
            <li>
              <a href="#"><img src="../../imagens/address-card-solid.svg" style="width: 21px; height: 21px; margin-right: 15px">Cadastro de Aluno</a>
            </li>
            <li>
              <a href="#">Cadastro de Professor</a>
            </li>
            <li>
              <a href="#">Cadastro de Curso</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <!--------page-content---------------->

    <div id="content">

      <!--top--navbar----design--------->

      <div class="top-navbar">
        <div class="xp-topbar">

          <!-- Start XP Row -->
          <div class="row">
            <!-- Start XP Col -->
            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
              <div class="xp-menubar">
                <span class="material-icons text-white">signal_cellular_alt
                </span>
              </div>
            </div>
            <!-- End XP Col -->

            <!-- Start XP Col -->
            <div class="col-md-5 col-lg-3 order-3 order-md-2">
              <div class="xp-searchbar">
                <form>
                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Pesquisar...">
                    <div class="input-group-append">
                      <button class="btn" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- End XP Col -->

            <!-- Start XP Col -->
            <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
              <div class="xp-profilebar text-right">
                <nav class="navbar p-0">
                  <ul class="nav navbar-nav flex-row ml-auto">
                    <li class="dropdown nav-item active">
                      <a href="#" class="nav-link" data-toggle="dropdown">
                        <span class="material-icons">notifications</span>
                        <span class="notification">4</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="#">Mensagem 1</a>
                        </li>
                        <li>
                          <a href="#">Mensagem 2</a>
                        </li>
                        <li>
                          <a href="#">Mensagem 3</a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span class="material-icons">question_answer</span>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                        <img src="img/user.jpg" style="width:40px; border-radius:50%;" />
                        <span class="xp-user-live"></span>
                      </a>
                      <ul class="dropdown-menu small-menu">
                        <li>
                          <a href="../index.php"><span class="material-icons">
                              logout</span>Deslogar</a>
                        </li>
                      </ul>
                    </li>
                  </ul>


                </nav>

              </div>
            </div>
            <!-- End XP Col -->

          </div>
          <!-- End XP Row -->

        </div>
        <div class="xp-breadcrumbbar text-center">
          <h4 class="page-title">Dashboard</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Aluno</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div>

      </div>



      <!--------main-content------------->

      <div class="main-content">
        <div class="row">

          <div class="col-md-12">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Cadastro de Aluno</h2>
                  </div>
                  <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                      <i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                      <i class="material-icons">&#xE15C;</i> <span>Deletar</span></a>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>CPF</th>
                  <th>Telefone</th>
                  <th>Ação</th>
                </thead>
                <?php
                while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>
                  <tr>
                    <th><?= $aluno['id'] ?></th>
                    <th><?= $aluno['nome'] ?></th>
                    <th><?= $aluno['cpf'] ?></th>
                    <th><?= $aluno['email'] ?></th>
                    <th><?= $aluno['telefone'] ?></th>
                    <th><a href="#editEmployeeModal/?id=<?= $aluno['id'] ?>" data-toggle="modal" class="btn btn-warning btn-sm">Editar</a></th>
                    <th><a href="<?= APP  ?>cliente.php/?acao=deletar&id=<?= $aluno['id'] ?>" class="btn btn-danger btn-sm">Excluir</a></th>
                    </th>
                  </tr>
                <?php
                endwhile;
                ?>
              </table>
              <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                  <li class="page-item disabled"><a href="#">Previous</a></li>
                  <li class="page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item active"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Edit Modal HTML -->
          <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" action="<?= APP  ?>Aluno/aluno-new.php">
                  <div class="modal-header">
                    <h4 class="modal-title">Adicionar - Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>CPF</label>
                      <input type="text" name="cpf" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Telefone</label>
                      <input type="text" name="telefone" class="form-control" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input name="submit" type="submit" class="btn btn-success" value="Adicionar">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Edit Modal HTML -->
          <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h4 class="modal-title">Editar - Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>CPF</label>
                      <input type="text" name="cpf" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Telefone</label>
                      <input type="text" name="telefone" class="form-control" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <!-- Delete Modal HTML -->
          <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>Você tem certeza que deseja deletar esse Registro?</p>
                    <p class="text-warning"><small>Esta ação não poderá ser desfeita.</small></p>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </div>
                </form>
              </div>
            </div>
          </div>


        </div>


        <!---footer---->


      </div>

      <footer class="footer">
        <div class="container-fluid">
          <div class="footer-in">
            <p class="mb-0">&copy 2023 Giovana Sanches - Todos os direitos reservados.</p>
          </div>
        </div>
      </footer>
    </div>
  </div>


  <!----------html code compleate----------->









  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $(".xp-menubar").on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
      });

      $(".xp-menubar,.body-overlay").on('click', function() {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
      });

    });
  </script>





</body>

</html>