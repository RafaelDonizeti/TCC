<?php

?>

<nav class="navbar navbar-expand-lg bg-light">
   <div class="container-fluid">
      <a class="navbar-brand" href="/Aulasphp/TCC/HOME_CADASTROS/homeCadastros.php">Cadastros</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/AGENDAMENTOS/homeAgendamentos.php">Agendamentos</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/MURAL/muralRecados.php">Mural</a>

      <div class="dropdown">
         <a class=" navbar-brand nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consultas </a>
         <div class="dropdown-menu">
            <li><a class="dropdown-item" href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_USUARIOS/consultaUsuarios.php">Consultar Usuários</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
         </div>
      </div>

      <a class="navbar-brand" href="/Aulasphp/TCC">Index PHP</a>
     
      <a class="navbar-brand position-absolute top-5 end-0" href="#">Sair</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>

   </div>
</nav>