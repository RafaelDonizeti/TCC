<?php session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
   header('location: /Aulasphp/TCC/LOGIN/pageLogin.html');
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>Página Inicial</title>

   <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>



</head>

<body>


   <div class="container">
      <div class="row">

         <div class="col d-flex justify-content-center">
            <div class="card mt-5" style="width: 18rem;">
               <img class="w-25 p-3" src=images/add_icon.png class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text"></p>
                  <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_USUARIOS/cadastroUsuario.php" class="btn btn-primary">Cadastrar Usuário</a>
               </div>
            </div>
         </div>

         <div class="col col d-flex justify-content-center">
            <div class="card mt-5" style="width: 18rem;">
               <img class="w-25 p-3" src=images/add_imovel.png class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text"></p>
                  <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_IMOVEIS/cadastroImovel.php" class="btn btn-primary">Cadastrar Imóveis</a>
               </div>
            </div>
         </div>

      </div>

      <div class="row">
         <div class="col d-flex justify-content-center">
            <div class="card mt-5" style="width: 18rem;">
               <img class="w-25 p-3" src=images/add_bloco.png class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text"></p>
                  <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_BLOCOS/cadastroBlocos.php" class="btn btn-primary">Cadastrar Blocos</a>
               </div>
            </div>
         </div>

         <div class="col d-flex justify-content-center">
            <div class="card mt-5" style="width: 18rem;">
               <img class="w-25 p-3" src=images/add_local.png class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text"></p>
                  <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_LOCAIS/cadastroLocais.php" class="btn btn-primary">Cadastrar Locais</a>
               </div>
            </div>
         </div>

      </div>
   </div>

   <h5><?php echo $_SESSION['tipo_usuario_fk']  ?></h5>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>