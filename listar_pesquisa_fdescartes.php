<?php
session_start();
include('verifica_login.php');
?>
<!DOCTYPE html>
<html>
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

<body>
<span id='topo'></span>

<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
            
                    <h1 class="title has-text-grey">LISTAR SINISTROS E BAIXADOS</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
										<br><br><br>
					<p align="right"><a href=listar.php>[VOLTAR]</a>
					</center><br><br>
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>
				   <center>
					<font size=2>
                
					
					
					<form name="form1" action="listar_pesquisa_fdescartes.php" method="post">
<td>Pesquisar Por Nome?:
<br>
<input type="text"  name="colaborador_procura" class="campo"/></td></tr>
<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>
</tbody>
</table>
</form>
					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
// SELECT NO BANCO PARA CRIAR A TABELA COM OS DADOS E IMPRIMIR NA TELA   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio_sinistros  where colaborador like UPPER('$colaborador_retorno%') ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	   print'<br>';	
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';	   
	   print'<td><b>ID</td>';	   	   
	   print'<td><b>HISTORICO</td>';
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';	   
	   print'<td><b>OBRA</td>';	   
	   print'<td><b>DEPARTAMENTO</td>';	   
	   print'<td><b>B.O</td>';	   	   
	   print'<td><b>LAUDO</td>';
	   print'<td><b>FOTO</td>';          
	   print'<td><b>TERMO</td>';
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");
		   $historico = @mysql_result($sqltudo, $j, "historico");
           $netbios = @mysql_result($sqltudo, $j, "netbios");           
           $colaborador = @mysql_result($sqltudo, $j, "colaborador");
           $departamento = @mysql_result($sqltudo, $j, "departamento");
		   $obra = @mysql_result($sqltudo, $j, "obra");  
		   $url_b_o = @mysql_result($sqltudo, $j, "url_b_o");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");                  
		   $url_laudo = @mysql_result($sqltudo, $j, "url_laudo");                  
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");                  
          
	       print'<tr>';
	       print '<td>'.$id.'	</td>';	 
		   print '<td><a href="historico.php?id='.$historico.'"><img src=images/historico.jpg></a>';	   	   
// INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
		   include "sql_t.i.php";//conexão com o banco de dados   
           @mysql_select_db($db);//selecione o banco de dados
           $sqltudo2 = mysql_query("SELECT colaborador,count(*)id_historico FROM crtl_patrimonio_historico where id_historico = $historico")  or die(mysql_error());
           $colunas2 = mysql_num_rows($sqltudo2);		  	   
           for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
           $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 		   
		   print $id_historico;	   	   		   
	       print'</td>';	   
           }	   
		   //FIM DA INCLUSAO 	       
		   print '<td >'.$netbios.'</td>';	   
		   print '<td>'.$colaborador.'</td>';	   
		   print '<td>'.$obra.'</td>';	   
		   print '<td>'.$departamento.'</td>';	   
	   
	   // VERIFICA SE TEM TERMO E SE O EQUIPAMENTO NÃO É DA SEDE PARA COLOCAR O BOTAO DE UPLOAD
	   if ($url_b_o == ""){
				print ' <td><form method="post" action="file_upload_b_o.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   
		}else{	
			print '<td><a href="uploads_b_o/'.$url_b_o.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}		
		
		if ($url_laudo == ""){
				print ' <td><form method="post" action="file_upload_laudo.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   
		}else{	
			print '<td><a href="uploads_laudo/'.$url_laudo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		
		if ($url_foto == ""){
				print ' <td><form method="post" action="" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			 
		}else{	
			print '<td><a href="uploads_foto/'.$url_foto.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		
		if ($url_termo == ""){	
		
			 			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		}else{	
			print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		
		
		
	   print '</tr>';	
           }
	   print'</table>';
		
?>

					</div>
					<p align="right"><a href=listar.php>[VOLTAR]</a>
                </div>
		
            </div>
		
        </div>
		
  
    </section>
	
</body>
</html>