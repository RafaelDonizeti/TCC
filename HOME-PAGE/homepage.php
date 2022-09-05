
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Página Inicial</title> 

      <?php include ('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php')?>
    

    
</head>
<body >
    <div class=" cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <div class="container">
        <div class="row align-items-start">
           <div class="col">
              <div class="card mt-5" style="width: 18rem;">
                 <img class ="w-25 p-3" src=images/add_icon.png class="card-img-top" alt="...">
                 <div class="card-body">
                    <p class="card-text"></p>
                    <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_USUARIOS/cadastroUsuario.php" class="btn btn-primary">Cadastrar Usuário</a>
                 </div>
              </div>
           </div>

           <div class="col">
              <div class="card mt-5" style="width: 18rem;">
                 <img class ="w-25 p-3" src=images/add_imovel.png class="card-img-top" alt="...">
                 <div class="card-body">
                    <p class="card-text"></p>
                    <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_IMOVEIS/cadastroImovel.php" class="btn btn-primary">Cadastrar Imóveis</a>
                 </div>
              </div>
           </div>

           <div class="col">
              <div class="card mt-5" style="width: 18rem;">
                 <img class ="w-25 p-3" src=images/add_bloco.png class="card-img-top" alt="...">
                 <div class="card-body">
                    <p class="card-text"></p>
                    <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_BLOCOS/cadastroBlocos.php" class="btn btn-primary">Cadastrar Blocos</a>
                 </div>
              </div>
           </div>

           <div class="col">
            <div class="card mt-5" style="width: 18rem;">
               <img class ="w-25 p-3" src=images/add_local.png class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text"></p>
                  <a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_LOCAIS/cadastroLocais.php" class="btn btn-primary">Cadastrar Locais</a>
               </div>
            </div>
         </div>
         
        </div>
    </div>   
    
     
</body>
</html>