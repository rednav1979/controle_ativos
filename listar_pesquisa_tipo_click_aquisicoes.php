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
	<link rel="stylesheet" href="./novo_menu.css">
</head>
<?php
	$colaborador_retorno = $_GET['tipo_equipamento'];
	
?>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
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

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>
<body>
<span id='topo'></span>
        
            
    <br>
                    <h1 class="title has-text-grey">LISTAR NOVAS AQUISIÇÕES</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>
					<br><br>
					<p align=right><font size=2 color=blue><a href =cadastro_aquisicoes.php>VOLTAR?</a></font>
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
                    <font size=2>
					
				
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio_aquisicoes  where tipo_equipamento='$colaborador_retorno'  order by colaborador ")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   	   	   
	   print'<td><b>IP</td>';
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OBRA</td>';
	   print'<td><b>DEPARTAMENTO</td>';	   
	   print'<td><b>TIPO</td>';	 
	   print'<td><b>ICO</td>';	   
	   print'<td><b>TRANSFERIR</td>';	
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
		   $icone = @mysql_result($sqltudo, $j, "icone");                            
			
		   
	   print'<tr>';
	   print '<td>'.$id.'</td>';	   	   	    
	   print '<td>'.$endereco_ip.'</td>';
	   print '<td>'.$netbios.'</td>';	   
	   print '<td>'.$colaborador.'</td>';	   
	   print '<td>'.$obra.'</td>';
	   print '<td>'.$departamento.'</td>';	   	   	   
	   print '<td>'.$tipo_equipamento.'</td>';	   	   	   
	   
		//COLOCA O ICONE   DO EQUIPAMENTO QUE CONSTA NA TABLEA CONTROLE_PATRIMONIO NO CAMPO ICONE    
		if ($icone ==""){
			print'<td><img src=images/semicone.png width=30 height=30></td>';	 			   
			}else{
			print'<td><img src=images/'.$icone.' width=30 height=30></td>';	 			   
			}
		print '<td><a href="atualiza_aquisicoes.php?id='.$id.'"><img src=images/passarinho.png></a>';	   	   
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

