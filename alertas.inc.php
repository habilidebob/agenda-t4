<?php
$msg = [
    "Cadastro realizado com sucesso!",
    "Contato cadastrado com sucesso!",
    "Contato excluído com sucesso!",
    "Contato atualizado com sucesso!"
];

$erro = [
    "Usuario e/ou senha inválidos!",
    "Falha ao realizar o seu cadastro, verfique as informações digitadas.",
    "Falha ao cadastrar contato.",
    "Falha ao excluir contato.",
    "Falha ao modificar contato."
];


// login.php?msg=0
// agenda.php?msg=1

// login.php?erro=0
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script>
    <?php  if(isset($_GET['erro'])){  ?>
        swal("Erro!", "<?= $erro[$_GET['erro']]; ?>", "error");
        // Remover o parametro da url:
        window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>

    <?php  if(isset($_GET['msg'])){  ?>
        swal("Sucesso!", "<?= $msg[$_GET['msg']]; ?>", "success");
        // Remover o parametro da url:
        window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>
</script>