<?php

?>
<head>
   
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#tabela').DataTable({
                "lengthChange": false,
                "ordering": false,
                "language": {
                    lengthMenu: 'Mostrando _MENU_ records per page',
                    zeroRecords: 'Nada Encontrado',
                    info: 'Mostrando Página _PAGE_ de _PAGES_',
                    infoEmpty: 'Nenhum Registro Dispinível',
                    infoFiltered: '(filtrado de _MAX_ Registros no Total)',
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</head>

<nav class="navbar navbar-expand-lg bg-light">
   <div class="container-fluid">
      <a class="navbar-brand" href="/Aulasphp/TCC/HOME_CADASTROS/homeCadastros.php">Cadastros</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/AGENDAMENTOS/homeAgendamentos.php">Agendamentos</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/MURAL/muralRecados.php">Mural</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/PRESTACAO_CONTAS/cadastroDespesa.php">Prestação de Contas</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/CONSULTAS/homeConsultas.php">Consultas</a>
      <a class="navbar-brand" href="/Aulasphp/TCC/LOGIN/sair.php">Sair</a>
  
     
    
      

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>

   </div>
</nav>