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
            
                    <h1 class="title has-text-grey">NFe dos  ATIVOS</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
					</center><br><br><br>
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>
				   <center>
					<font size=2>
                
					
					
					<form name="form1" action="listar_pesquisa_nfe.php" method="post">
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
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where colaborador like UPPER('$colaborador_retorno%') and D_E_L_E_T_E is NULL order by id desc ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	   print'<br>';	
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';	   
	   print'<td><b>ID</td>';	   	   
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';	   
	   print'<td><b>OBRA</td>';	   
	   print'<td><b>ICO</td>';
	   print'<td><b>NFe</td>';
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/
           $endereco_ip = @mysql_result($sqltudo, $j, "endereco_ip");
           $netbios = @mysql_result($sqltudo, $j, "netbios");
           $sistema_operacional = @mysql_result($sqltudo, $j, "sistema_operacional");
           $colaborador = @mysql_result($sqltudo, $j, "colaborador");
           $departamento = @mysql_result($sqltudo, $j, "departamento");
           $processador = @mysql_result($sqltudo, $j, "processador");
           $memoria = @mysql_result($sqltudo, $j, "memoria");
           $disco_rigido = @mysql_result($sqltudo, $j, "disco_rigido");
           $tipo_equipamento = @mysql_result($sqltudo, $j, "tipo_equipamento");            
		   $fabricante = @mysql_result($sqltudo, $j, "fabricante");            
		   $obra = @mysql_result($sqltudo, $j, "obra");  
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");                  
		   $url_nfe = @mysql_result($sqltudo, $j, "url_nfe");                  
		   
           
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	       print'<tr>';
	       print '<td>'.$id.'	</td>';	 	      
		   print '<td >'.$netbios.'</td>';	   
		   print '<td>'.$colaborador.'</td>';		   
		   print '<td>'.$obra.'</td>';
	   // ADICIONA OS ICONES  CONFORME O TIPO DE EQUIPAMENTO
	    if ($tipo_equipamento == "ESTACAO"){
			print '<td><img src="images/desktop.jpg" width=30 height=30></td>';
		}
	   if ($tipo_equipamento == "CELULAR"){
			print '<td><img src="images/celular.jpg" width=30 height=30></td>';
		}
		if ($tipo_equipamento == "CHIP"){
			print '<td><img src="images/chip.jpg" width=30 height=30></td>';
		}
		if ($tipo_equipamento == "NOTEBOOK"){
			print '<td><img src="images/notebook.jpg" width=30 height=30></td>';
		}	
		if ($tipo_equipamento == "IMPRESSORA"){
			print '<td><img src="images/impressora.jpg" width=30 height=30></td>';
		}		
		if ($tipo_equipamento == "RELOGIO"){
			print '<td><img src="images/relogio.jpg" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "SCANNER"){
			print '<td><img src="images/scanner.jpg" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "MOCHILA"){
			print '<td><img src="images/mochila.png" width=30 height=30></td>';		
		}		                                                                                         
		if ($tipo_equipamento == "ROTEADOR"){
			print '<td><img src="images/roteador.jpg" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "MONITOR"){
			print '<td><img src="images/monitor.png" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "TV"){
			print '<td><img src="images/tv.jpg" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "TEC.MOUSE.S.FIO"){
			print '<td><img src="images/teclado.jpg" width=30 height=30></td>';		
		}
		if ($tipo_equipamento == "LEITOR"){
			print '<td><img src="images/leitor.jpg" width=30 height=30></td>';		
		}		
		if ($tipo_equipamento == "TABLET"){
			print '<td><img src="images/tablet.jpg" width=30 height=30></td>';		
		}	
	   
	// VERIFICA SE A FOTO ESTA EM BRANCO E COLOCA O BOTAO DE UPLOAD	
	if ($url_nfe == ""){
			print ' <td><form method="post" action="nfe_upload.php?id='.$id.'" enctype="multipart/form-data">
	<label>Arquivo:</label>
	<input type="file" name="arquivo" />
	<input type="submit" value="Enviar" />
	</form></td>';
		}else{	
	   print '<td><a href="uploads_nfe/'.$url_nfe.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
	   	
	   print '</tr>';	
           }
	   print'</table>';
		
?>
					</div>
                </div>
            </div>
        </div>
  
    </section>
	<a href='#topo'>Voltar ao topo</a>
</body>
</html>