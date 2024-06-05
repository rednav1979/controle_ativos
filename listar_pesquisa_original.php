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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="./style.css">
	
</head>
<nav class="nav">
<ul>
<li><a href="../control_pass/menu.php">||Menu||</a></li>
<li class="drop"><a href="#">||Cadastros||</a>
			<ul class="dropdown">
				<li><a href="init.php">Ativos</a></li>
				<li><a href="cadastro_obras.php">Obras</a></li>
			<li><a href="cadastro_tipos.php">Equipamentos</a></li>
			<li><a href="listar_pesquisa_nfe.php">NFe</a></li>
			<li><a href="listar_pesquisa_fdescartes_update.php">Furtos e Descartes</a></li>
			<li><a href="cadastro_aquisicoes.php">Aquisicoes</a></li>
			</ul>
			<li><a href="listar.php">Home</a></li>
<li><a href="listar_pesquisa_update.php">Atualizar</a></li>
<li><a href="listar_pesquisa.php">Listar</a></li>
<li><a href="listar_pesquisa_fdescartes.php">Sinistros</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<!-- partial -->
<br>

<body>
<span id='topo'></span>
    <section class="hero is-success is-fullheight">
	
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">LISTAR ATIVOS</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
					
                
					
					
					<form name="form1" action="listar_pesquisa.php" method="post">
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

<form name="form1" action="listar_pesquisa_obra.php" method="post">
<td>Pesquisar Por Obra?:
<br>
<select name="colaborador_procura"   autofocus="" >									
<option>SELECIONE</option>
  <?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados 
           $sqltudo = mysql_query(" select obra  from crtl_patrimonio  group by obra;")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);		
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
		   $id = @mysql_result($sqltudo, $j, "id");           
		   $obra = @mysql_result($sqltudo, $j, "obra");           
            print'<option>'; 						
            echo $obra;
            print '</option>';          
           }
		   ?>
		   </select>				
<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>
</tbody>
</table>
</form>
<form name="form1" action="listar_pesquisa_tipo.php" method="post">
<td>Pesquisar Por Tipo?:
<br>
<select name="colaborador_procura"   autofocus="" >									
									<option>SELECIONE</option>
  <?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados 
           $sqltudo = mysql_query(" select tipo_equipamento  from crtl_patrimonio  group by tipo_equipamento;")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);		
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
		   $id = @mysql_result($sqltudo, $j, "id");           
		   $tipo_equipamento = @mysql_result($sqltudo, $j, "tipo_equipamento");           
            print'<option>'; 						
            echo $tipo_equipamento;
            print '</option>';          
           }
		   ?>
		   </select>			
</td>
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
   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where colaborador like UPPER('$colaborador_retorno%') order by endereco_ip ")  or die(mysql_error());
           
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
	   print'<td><b>ICO</td>';
	   print'<td><b>TERMO</td>';
	   print'<td><b>FOTO</td>';

           
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
	       
           

		   if ($tipo_equipamento == "ESTACAO") {
			$contador_estacao++;
			   }
			   if ($tipo_equipamento == "CELULAR") {
			$contador_celular++;			
			   }

		   if ($tipo_equipamento == "NOTEBOOK") {
			$contador_notebook++;
			   }
		   if ($tipo_equipamento == "IMPRESSORA") {
			$contador_impressora++;
			   }   
          	  
		   if ($tipo_equipamento == "RELOGIO") {
			$contador_relogio++;
			   }			
			   
			if ($tipo_equipamento == "CHIP") {
			$contador_chip++;			
			   }
		   if ($tipo_equipamento == "SCANNER") {
			$contador_scanner++;
			   }
		    if ($tipo_equipamento == "MOCHILA") {
			$contador_mochila++;
			   }
		   if ($tipo_equipamento == "NOBREAK") {
			$contador_nobreak++;
			   }
		   if ($tipo_equipamento == "ROTEADOR") {
			$contador_roteador++;
			   }
			   
			   if ($tipo_equipamento == "TEC.MOUSE.S.FIO") {
			$contador_conjunto++;
			   }
			   if ($tipo_equipamento == "LEITOR") {
			$contador_leitor++;
			   }
			   
			   
		

	 
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	  print'<tr>';
	   print '<td>'.$id.'	</td>';	 
	   print '<td><a href="historico.php?id='.$id.'"><img src=images/historico.jpg></a>';	   	   
	   
	   // INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
		   include "sql_t.i.php";//conexão com o banco de dados   
           @mysql_select_db($db);//selecione o banco de dados
           $sqltudo2 = mysql_query("SELECT count(*)id_historico FROM crtl_patrimonio_historico where id_historico = $id")  or die(mysql_error());
           $colunas2 = mysql_num_rows($sqltudo2);		  	   
           for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
           $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 
		   print $id_historico;	   	   
	       print'</td>';	   
           }	   
		   //FIM DA INCLUSAO 
	   
	   print '<td>'.$netbios.'</td>';	   
	   print '<td>'.$colaborador.'</td>';
	   print '<td>'.$obra.'</td>';
	   
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
		
		
		
	   if ($url_termo == ""){
		print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
<label>Arquivo:</label>
<input type="file" name="arquivo" />
<input type="submit" value="Enviar" />
</form></td>';
	}else{	
   print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
	}

if ($url_foto == ""){
		print ' <td><form method="post" action="foto_upload.php?id='.$id.'" enctype="multipart/form-data">
<label>Arquivo:</label>
<input type="file" name="arquivo" />
<input type="submit" value="Enviar" />
</form></td>';
	}else{	
   print '<td><a href="uploads_foto/'.$url_foto.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
	}
	   
	  
	  
	   	
	   print '</tr>';	
           }
	   print'</table>';
		print '<br>';
		print '<hr>';
		echo 'EQUIPAMENTOS CADASTRADOS: ';
		print '<ul>';

		print '<li>';
		echo 'Impressoras: ';
		print '<font color=red>';
		echo $contador_impressora;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Notebooks: ';
		print '<font color=red>';
		echo $contador_notebook;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Estações: ';
		print '<font color=red>';
		echo $contador_estacao;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Relogios Ponto: ';
		print '<font color=red>';
		echo $contador_relogio;
		print '</font>';
		print '</li>';
		print '<br>';


		print '<li>';
		echo 'Chips de Celular: ';
		print '<font color=red>';
		echo $contador_chip;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Celulares Com Chip: ';
		print '<font color=red>';
		echo $contador_celular;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Mochilas Notebook: ';
		print '<font color=red>';
		echo $contador_mochila;
		print '</font>';
		print '</li>';
		print '<br>';

		print '<li>';
		echo 'Roteador:';
		print '<font color=red>';
		echo $contador_roteador;
		print '</font>';
		print '</li>';
		print '<br>';
		
		print '<li>';
		echo 'Conjuntos Teclado e Mouse:';
		print '<font color=red>';
		echo $contador_conjunto;
		print '</font>';
		print '</li>';
		print '<br>';
		
		print '<li>';
		echo 'Leitor:';
		print '<font color=red>';
		echo $contador_leitor;
		print '</font>';
		print '</li>';
		print '<br>';
?>
					</div>
                </div>
            </div>
        </div>
  
    </section>
	<a href='#topo'>Voltar ao topo</a>
</body>
</html>