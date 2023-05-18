<?php

session_start();
// Verificar se a sessão NÃO existe:
if(!isset($_SESSION['dados'])){
  header('Location: login.php');
  exit();
}



require_once('classes/Contato.class.php');
$c = new Contato();
// Guardar o array de resultado na variavel:
$resultado = $c->Listar();

?>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Cadastro de Contatos</title>
</head>
<body>
  <div class="container">

    <div class="row justify-content-end">
      <div class="col-1">
      <a href="sair.php" class="btn btn-danger">Sair</a>
      </div>
    </div>

    <h3>Bem vindo(a) <?=$_SESSION['dados']['nome']; ?>!</h3>
    <h1>Cadastro de contatos</h1>
    <form class="form-group" action="actions/cadastrar_contato.php" method="POST">
      <label for="nome">Nome completo:</label>
      <input type="text" id="nome" name="nome" class="form-control" required>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" class="form-control" required>
      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefone" name="telefone" class="form-control">
      <br>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

        <!-- Insira aqui as linhas da tabela com os dados dos contatos -->

        <!-- Exemplo de linha da tabela com um contato fictício -->
        <?php foreach($resultado as $contato){ ?>
        <tr>
          <td><?=$contato['nome'];?></td>
          <td><?=$contato['email'];?></td>
          <td><?=$contato['telefone'];?></td>
          <td><a href="editar.php?id=<?=$contato['id'];?>">Editar</a> | <a href="actions/deletar.php?id=<?=$contato['id'];?>">Excluir</a></td>
        </tr>
        <?php } ?>

        <!-- Repita esse formato para cada contato cadastrado -->

      </tbody>

    </table>

  </div>


  <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php require_once('alertas.inc.php');  ?>
</body>
</html>