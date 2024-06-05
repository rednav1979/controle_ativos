<?php
session_start();
include('verifica_login.php');
?>	
<!DOCTYPE html>
<html>
<span id='topo'></span>


 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="./novo_menu.css">
</head>


<ul class="menu">
      <li title="home"><a href="#" class="menu-button home">menu</a></li>      
      <li title="Voltar"><a href="listar.php" class="volta">Voltar</a></li>  
	  <li title="Topo"><a href="#topo" class="topo">Topo</a></li>  
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

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
					<font color=red size=4> HISTORICO DE TRANSFERENCIAS DO EQUIPAMENTO (INCLUSIVE OS DELETADOS):</font>
                    
					
					

					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
	
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio_historico  order by data_cadastro desc")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print '<font color=red size=1>';
	   print'<tr>';
	   print'<td><b>ID</td>';	   	   
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OBRA</td>';
	   print'<td><b>DEPARTAMENTO</td>';	   
	   print'<td><b>TIPO</td>';	   
	   print'<td><b>DATA CADASTRO</td>';
	   print'<td><b>CADASTRADO POR</td>';	   
	   print'<td><b>URL_FOTO</td>';
	   print'<td><b>URL_TERMO</td>';
	   print'<td><b>STATUS</td>';
	   
	   

	   
	   
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
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
		   $observacoes = @mysql_result($sqltudo, $j, "historico");
		   $data_cadastro = @mysql_result($sqltudo, $j, "data_cadastro");
		   $usuario_cadastro = @mysql_result($sqltudo, $j, "usuario_cadastro");
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");
		   $D_E_L_E_T_E = @mysql_result($sqltudo, $j, "D_E_L_E_T_E");
		   
		   if ($D_E_L_E_T_E == "S"){
		   print '<tr>';
		   print '<td>'.$id.'</td>';	   	   	   		   
		   print '<td>'.$netbios.'</td>';		   
		   print '<td>'.$colaborador.'</td>';
		   print '<td>'.$obra.'</td>';
		   print '<td>'.$departamento.'</td>';	   		   
		   print '<td>'.$tipo_equipamento.'</td>';		   
		   print '<td>'.$data_cadastro.'</td>';
		   print '<td>'.$usuario_cadastro.'</td>';		   
		if ($url_foto ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_foto/'.$url_foto.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		if ($url_termo ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
				}
				print '<td bgcolor=red>Deleted</td>';
		
	}else{
		   print '<tr>';
		   print '<td>'.$id.'</td>';	   	   	   
		   
		   print '<td>'.$netbios.'</td>';		   
		   print '<td>'.$colaborador.'</td>';
		   print '<td>'.$obra.'</td>';
		   print '<td>'.$departamento.'</td>';	   		   
		   print '<td>'.$tipo_equipamento.'</td>';		   
		   print '<td>'.$data_cadastro.'</td>';
		   print '<td>'.$usuario_cadastro.'</td>';
		if ($url_foto ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_foto/'.$url_foto.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
		if ($url_termo ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
				}
				print '<td><center>---</center></td>';
		
	}		   
			   
		   print '</tr>';	
	} 
		   
	    

?>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
	
	
	
	<br>

<br>
<?php

print '<a href=#topo>Voltar ao topo</a>';
?>
</body>

</html>


