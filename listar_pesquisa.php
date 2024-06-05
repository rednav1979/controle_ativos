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
            
                    <h1 class="title has-text-grey">LISTAR ATIVOS</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
					</center><br><br><br>
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>
				   <center>
					<font size=2>
                
					
					
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
           $sqltudo = mysql_query(" select nome  from crtl_patrimonio_obras;")  or die(mysql_error());
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
           $sqltudo = mysql_query(" select nome  from crtl_patrimonio_tipos;")  or die(mysql_error());
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
</td>
<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>
</tbody>
</table>
</form>
<a href="listar_historico.php"><img src=images/historico.jpg ></a>Mostrar Todo historico	   	   
                  
<p align=left>
<font color=red><b>Legenda:</b></font>
<br>
Excluir Registro
<img src=images/bolinha_vermelha.png width=20 height=20>
<br>
Atualizar Registro
<img src=images/relogio.jpg width=20 height=20">
<br>
Abrir chamado para  Correção
<img src=images/teste.jpg width=20 height=20">	   	   
<br>
		   
					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
// SELECT NO BANCO PARA CRIAR A TABELA COM OS DADOS E IMPRIMIR NA TELA   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where colaborador like UPPER('$colaborador_retorno%') and D_E_L_E_T_E IS NULL order by obra ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	
	
	   print'<br>';	
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';	   
	   print'<td><b>ID</td>';	   
	   print'<td><b>D</td>';
	   print'<td><b>A</td>';
	   print'<td><b>C</td>'; 
	   print'<td><b>HISTORICO</td>';  
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OLD</td>';
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
		   $icone = @mysql_result($sqltudo, $j, "icone");                            
		  
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	       print'<tr>';	       
		   print '<td>'.$id.'</td>';	       
		   print '<td><a href="delete.php?id='.$id.'"><img src=images/bolinha_vermelha.png width=25 height=25></a></td>';  
		   print '<td><a href="listar_pesquisa_update.php?id='.$id.'"><img src=images/relogio.jpg width=25 height=25"></a></td>';	   	   
		   print '<td><a href="abrirticket.php?id='.$id.'"><img src=images/teste.jpg width=25 height=25"></a></td>';	   	   
		   print '<td><a href="historico.php?id='.$id.'"><img src=images/historico.jpg width=40 height=40></a>';		   
	   // INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
		   include "sql_t.i.php";//conexão com o banco de dados   
           @mysql_select_db($db);//selecione o banco de dados
           //$sqltudo2 = mysql_query("SELECT colaborador FROM crtl_patrimonio_historico where id_historico = $id and D_E_L_E_T_E IS NULL")  or die(mysql_error());
		   $colaborador_old='';
		   $sqltudo2 = mysql_query("SELECT colaborador,id_historico FROM crtl_patrimonio_historico where id_historico = $id and D_E_L_E_T_E IS NULL order by id desc limit 1")  or die(mysql_error());
           $colunas2 = mysql_num_rows($sqltudo2);		  	   
           for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
           $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 
		   $colaborador_old = @mysql_result($sqltudo2, $x, "colaborador"); 
		   print $id_historico;	   	   		   		   
	       print'</td>';	   
           }	   
		   //FIM DA INCLUSAO 
		   print '<td >'.$netbios.'</td>';	   
		   print '<td>'.$colaborador.'</td>';
		   print '<td>'.$colaborador_old.'</td>';
		   print '<td>'.$obra.'</td>';
		   //COLOCA O ICONE   DO EQUIPAMENTO QUE CONSTA NA TABELA CONTROLE_PATRIMONIO NO CAMPO ICONE    
		   if ($icone ==""){
		   print'<td><img src=images/semicone.png width=30 height=30></td>';	 			   
		   }else{
		   print'<td><img src=images/'.$icone.' width=30 height=30></td>';	 			   
		   }
	  
	//		print '<td><img src="images/desktop.jpg" width=30 height=30></td>';
	
	  
	   // VERIFICA SE TEM TERMO E SE O EQUIPAMENTO NÃO É DA SEDE PARA COLOCAR O BOTAO DE UPLOAD
	   if ($url_termo == ""){
		   if ($obra <> "SEDE"){			   
			   if ($tipo_equipamento == "RELOGIO"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }else{
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   }
		    }
		}else{	
			print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		
		
		
		// VERIFICA SE O TERMO ESTA EM BRANCO SE EQUIPAMENTO É NOTEBOOK E SE É DA SEDE MENOS FABIO E RAFAEL E BARBARA ENTÃO ADICIONA BOTAO DE UPLOAD
		if ($url_termo == ""){
		   if ($obra == "SEDE"){
			   if ($tipo_equipamento == "NOTEBOOK"){				   
				   if ($colaborador == "FABIO" or $colaborador == "RAFAEL" or $colaborador =="BARBARA" or $colaborador =="MONITORAMENTO"){			   
				       print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		           }else{
					  
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
				   }			   
			   
			   }
			   if ($tipo_equipamento == "RELOGIO"){				   				   
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
				}
			   //VERIFICA SE O EQUIPAMENTO É CELULAR E TERMO EM BRANCO E COLOCA O BOTÃO DE UPLOAD
			   if ($tipo_equipamento == "CELULAR"){
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   }			   

			   if ($tipo_equipamento == "TABLET"){
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   }		
			   //VERIFICA SE O EQUIPAMENTO É CHIP MENOS BRUNO LUCAS FABIO E BARBARA  E TERMO EM BRANCO E COLOCA O BOTÃO DE UPLOAD
			   if ($tipo_equipamento == "CHIP"){
				   if ($colaborador == "BRUNO_FILHO_FABIO" or $colaborador == "LUCAS_FILHO_FABIO" or $colaborador == "MONITORAMENTO" or $colaborador == "FABIO" or $colaborador == "BARBARA" or $colaborador == "LIVRE"){			   
				       print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		           }else{
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
				   }
			   }
			   //VERIFICA SE O EQUIPAMENTO É MOCHILA E TERMO EM BRANCO E COLOCA O BOTÃO DE UPLOAD
			   if ($tipo_equipamento == "MOCHILA"){
				print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';
			   }
			   //MESMA VERIFICAÇÃO ABAIXO POREM PARA OS DISPOSITIVOS DEPOIS DO SINAL DE ==
			   if ($tipo_equipamento == "TEC.MOUSE.S.FIO"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
			   }
			   if ($tipo_equipamento == "IMPRESSORA"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }
			   if ($tipo_equipamento == "MONITOR"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }
			   if ($tipo_equipamento == "SCANNER"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }
			   if ($tipo_equipamento == "LEITOR"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }
			   if ($tipo_equipamento == "ESTACAO"){
				print '<td><img src="images/bolinha_vermelha.png" width=30 height=30>';	
		       }
			   
		    }
		}	
	// VERIFICA SE A FOTO ESTA EM BRANCO E COLOCA O BOTAO DE UPLOAD	
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
		
		
		print '<font color=black size=2>';
		print '<hr>';
		echo 'EQUIPAMENTOS CADASTRADOS: ';
	   print '<hr>';
	   include "sql_t.i.php";//conexão com o banco de dados   
	   @mysql_select_db($db);//selecione o banco de dados
			  $sqltudo = mysql_query("select count(*)tipo_equipamento,tipo_equipamento  as type from crtl_patrimonio  where colaborador like UPPER('$colaborador_retorno%') and D_E_L_E_T_E IS NULL group by tipo_equipamento")  or die(mysql_error());
			  $colunas = mysql_num_rows($sqltudo);	   
			  for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
			  $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/           
			  $nome = @mysql_result($sqltudo, $j, "type");
			  $type = @mysql_result($sqltudo, $j, "tipo_equipamento");
			  
			  print $nome;
			  print ':';
			  print '<font color=red>';
			  print $type;
			  print '</font>';
			  print '<br>';	
			  }
	   

?>


					</div>
                </div>
            </div>
        </div>
  
    </section>
	<a href='#topo'>Voltar ao topo</a>

</body>
</html>
