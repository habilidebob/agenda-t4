<?php
session_start();
$erro = "";

if(isset($_SESSION['dados'])){
  if(isset($_GET['id'])){
    require_once('classes/Contato.class.php');
  
    $c = new Contato();
    $c->id = $_GET['id'];
    
    $resultado = $c->BuscarPorID();
  
    // Verificar se existem linhas no $resultado:
      if(count($resultado) == 0){
        $erro = "Contato não encontrado!";
      }
  }else{
    $erro = "ID não setado!";
  }
}else{
  $erro = "Realize o login primeiro!";
}


// print_r($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
  <?php if($erro == "") { ?>
    <h1>Formulário de Edição</h1>
    <form action="actions/editar_contato.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input value="<?=$resultado[0]["nome"] ?>" type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input value="<?=$resultado[0]["email"] ?>" type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input value="<?=$resultado[0]["telefone"] ?>" type="tel" class="form-control" id="telefone" name="telefone">
      </div>
      <input value="<?=$resultado[0]["id"] ?>" type="hidden" name="id" id="id">
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

      <?php }else{ ?>

        <h1><?=$erro;?></h1>

      <?php } ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>