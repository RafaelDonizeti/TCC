

<!DOCTYPE html>
<html lang = "pt">
	<head>
		<meta charset ="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Cadastro de Usuário  </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
        <?php include ('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php')?>
		
	</head>

	<body>
        
		<div class ="container mt-5" >
		<form  name = "" method = "GET" action ="cadastrarUsuario.php">
            <div class="container">
                <h3>INFORME OS DADOS  DO USUÁRIO</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label> Nome: </label> <br/>
                        <input type = "text" class="form-control" name ="nome" required> <br/>
                        
                        <label> Telefone: </label> <br/>
                        <input type = "text" class="form-control" name ="telefone" maxlength="14" required> <br/>
                        
                        <label> E-mail: </label> <br/>
                        <input type = "email" class="form-control" name ="email" required> <br/>

                        <label> Tipo: </label> <br/>
                        <input type = "text" class="form-control" name ="tipo" required> <br/>
                    </div>

                    <div class="col-md-6">
                        <label> Imóvel: </label> <br/>
                        <input type = "text" class="form-control" name ="imovel" required> <br/>
                                
                        <label> Bloco: </label> <br/>
                        <input type = "text" class="form-control" name ="bloco" required> <br/>

                        <label> Senha: </label> <br/>
                        <input type = "text" class="form-control" name ="senha" required> <br/>
                    </div>
                    
			</div>
            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-secondary">
            
		</form>	
		</div>		
        
        <img src=retanguloverde.png alt="">
	</body>

</html>		