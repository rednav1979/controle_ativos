<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="./novo_menu.css">
</head>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
</script>

<?php
session_start();
include('verifica_login.php');
?>
<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
<html>
<?php

//criar a conexÃ£o com o banco

include "sql_t.i.php";



if(isset($_POST['done'])){      
    $nome = $_POST['nome'];    	
	$caminho = $_POST['caminho'];	
	// AUDITORIA 
    $ip = $_SERVER['REMOTE_ADDR'];
    $usuario_cadastro = $_SESSION['usuario'];	
	//FIM DA AUDITORIA	
    if(empty($nome) || empty($caminho)){
        $erro = "Atenção, você deve preencher todos os campos";
	
    }else{        

       $sql = mysql_query("INSERT INTO `crtl_patrimonio_icones`(`data_criacao`,`ip`,`usuario_cadastro`,`nome`,`caminho` ) VALUES (now(),'$ip ','$usuario_cadastro','$nome','$caminho')") or die(mysql_error());
	   
            if($sql){

                $erro = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>

<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toLowerCase();
        z.value = v;
    }	
</script>
<ul class="menu">
      <li title="home"><a href="#" class="menu-button home">menu</a></li>      
      <li title="Voltar"><a href="listar.php" class="volta">Voltar</a></li>  
	  <li title="Enviar e-mail"><a href="mailto:ti@lotisa.com.br" class="contact">Enviar e-mail</a></li>
    </ul>    
    <ul class="menu-bar">
        <li><a href="#" class="menu-button">Menu</a></li>
        <li><a href="listar.php">Home</a></li>		
        <li><a href="listar_pesquisa_fdescartes.php">Sinistros</a></li>
        <li><a href="listar_pesquisa_nfe.php">NFEs</a></li>
        <li><a href="#">CADASTROS</a></li>
		<li><a href="init.php">Ativos</a></li>
		<li><a href="cadastro_obras.php">Obras</a></li>
		<li><a href="cadastro_icones.php">Icones</a></li>
		<li><a href="cadastro_tipos.php">Tipos</a></li>
		<li><a href="cadastro_aquisicoes.php">Aquisições</a></li>
		<li><a href="listar_pesquisa_fdescartes_update.php">Furtos de Descartes</a></li>
    </ul>		
<!-- partial -->
<body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./novo_menu.js"></script>

    <section class="hero is-success is-fullheight">
        
            			
                <div class="column is-4 is-offset-4">
				
                    <h1 class="title has-text-grey">CADASTRO DE ICONESS </h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
					
                    <div class="box">
                        <form name="form1" action="cadastro_icones.php" method="POST">
						<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
                            <div class="field">
                                <div class="control">                                    									
								<img src=css/logo.png><br></p>
								<br>
									<input name="caminho"  class="input is-large" placeholder="Nome do Icone" autofocus="" onkeyup="maiuscula(this)">									
									<font color=red>
									Obs. Os icones devem estar na pasta "images"<p>
									Ex: notebook.jpg
								    </font>
									<select name="nome" class="input is-large"   autofocus="" >									
								    <option>SELECIONE O TIPO DE EQUIPAMENTO</option>
								  <?php 
								   include "sql_t.i.php";//conexão com o banco de dados   
								   @mysql_select_db($db);//selecione o banco de dados 
										   $sqltudo = mysql_query(" select nome from  crtl_patrimonio_tipos;")  or die(mysql_error());
										   $colunas = mysql_num_rows($sqltudo);		
										   for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
										   $id = @mysql_result($sqltudo, $j, "id");           
										   $nome = @mysql_result($sqltudo, $j, "nome");           
											print'<option>'; 						
											echo $nome;
											print '</option>';          
										   }
										   ?>
										   </select>	
                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />
                        </form>

						<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
           $sqltudo = mysql_query("SELECT * FROM crtl_patrimonio_icones ORDER BY id ")  or die(mysql_error());
          $colunas = mysql_num_rows($sqltudo);
   $total = 0;
	   print'<br>';		
	   print'<br>';	
	   print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>NOME</td>';	   	   	   
	   print'<td><b>ICONE</td>';	
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/           
		   $nome = @mysql_result($sqltudo, $j, "nome");		   
		   $caminho = @mysql_result($sqltudo, $j, "caminho");
		   print'<tr>';
		   print '<td>'.$id.'</td>';	 	   
		   print '<td>'.$nome.'</td>';	 	   
		   print '<td>'.$caminho.'</td>';	 	   
		   print'<td><img src=images/'.$caminho.' width=30 height=20></td>';	 			   
			   }
		    print'</table>';
		    
?>			

						
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	

<br>

</body>

</html>


