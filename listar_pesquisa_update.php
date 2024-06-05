<?php
session_start();
include('verifica_login.php');
?>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
</script>

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
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
</script>

<br>
<body> 
	


			<div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">ATUALIZAÇÃO DE ATIVOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2> </center><br>
					
					<?php

//criar a conexÃ£o com o banco

include "sql_t.i.php";



if(isset($_POST['done'])){      
    $id_retorno = $_POST['id_retorno'];
    $sqltudo = mysql_query("select  * FROM crtl_patrimonio  where id= $id_retorno")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	  
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
        $observacoes = @mysql_result($sqltudo, $j, "historico");  
        $usuario_cadastro = $_SESSION['usuario'];
        $url_termo = @mysql_result($sqltudo, $j, "url_termo");
        $url_foto = @mysql_result($sqltudo, $j, "url_foto");			   
    
    }
    
    $sql2 = mysql_query("INSERT INTO `crtl_patrimonio_historico`(`data_cadastro`,`icone`,`endereco_ip`, `netbios`, `sistema_operacional`, `colaborador`,`obra`,`departamento`,`tipo_equipamento`,`fabricante`,`usuario_cadastro`,`url_foto`,`url_termo`,`id_historico`,`historico`) VALUES (now(),'$icone','$endereco_ip ', '$netbios', '$sistema_operacional','$colaborador','$obra', '$departamento','$tipo_equipamento','$fabricante','$usuario_cadastro','$url_foto','$url_termo','$id_retorno','$observacoes')") or die(mysql_error());
    
    
    //INICIO DE UPDATE DOS CAMPOS
    $id_novo = $_POST['id'];
	$endereco_ip_retorno = $_POST['endereco_ip'];
	$netbios_retorno =  $_POST['netbios'];
	$sistema_operacional_retorno =  $_POST['sistema_operacional'];
	$colaborador_retorno =  $_POST['colaborador'];
	$departamento_retorno =  $_POST['departamento'];
	$obra_retorno =  $_POST['obra'];
	$icone_retorno =  $_POST['icone'];
	$tipo_equipamento_retorno =  $_POST['tipo_equipamento'];
	$historico_retorno =  $_POST['historico'];
	$fabricante_retorno =  $_POST['fabricante'];
	$url_foto_retorno =  $_POST['url_foto'];
	$url_termo_retorno =  $_POST['url_termo'];
	$id_retorno = $_POST['id_retorno'];
	$whats_retorno = $_POST['whats'];
	if ($whats_retorno ==''){       
    $sql_update = mysql_query("update `crtl_patrimonio` set icone='$icone_retorno',netbios='$netbios_retorno',fabricante ='$fabricante_retorno',colaborador='$colaborador_retorno',endereco_ip='$endereco_ip_retorno',historico='$historico_retorno',sistema_operacional='$sistema_operacional_retorno',departamento='$departamento_retorno',tipo_equipamento='$tipo_equipamento_retorno',url_foto='$url_foto_retorno',url_termo='$url_termo_retorno',obra='$obra_retorno' where id = '$id_retorno'") or die(mysql_error()); 		   
	}else{
		$sql_update = mysql_query("update `crtl_patrimonio` set icone='$icone_retorno',netbios='$netbios_retorno',fabricante ='$fabricante_retorno',colaborador='$colaborador_retorno',endereco_ip='$endereco_ip_retorno',historico='$historico_retorno',sistema_operacional='$sistema_operacional_retorno',departamento='$departamento_retorno',tipo_equipamento='$tipo_equipamento_retorno',url_foto='$url_foto_retorno',url_termo='$url_termo_retorno',obra='$obra_retorno',whats='$whats_retorno' where id = '$id_retorno'") or die(mysql_error()); 		   
	}
    
	   
            if($sql2){
                print '<script> alert("Historico Gravado  com sucesso!")</script>';
              } else{
                print '<script> alert("Não foi possivel cadastrar Histórico!!!")</script>';
              }

              if($sql_update){
                print '<script> alert("Atualização  Gravada  com sucesso!")</script>';
              } else{
                print '<script> alert("Não foi possivel Gravar Atualização!!!")</script>';
              }

    }

    

?>
					

                    <div class="box">


<font size=1>  
  <form name="form1" action="listar_pesquisa_update.php" method="POST">


<p align=left>
				   <img src=css/logo.png><br></p>

					
				<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
	$id_retorno = $_GET['id'];    
    if ($id_retorno ==''){    

    }else{  
    
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where id= $id_retorno ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);
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
		   $historico = @mysql_result($sqltudo, $j, "historico");  
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto"); 
		   $whats = @mysql_result($sqltudo, $j, "whats"); 
		   
           }
    }
   
	   

?>

                               <div class="field">
                                <div class="control">                                    									
									
                                    <input type="text" placeholder="NETBIOS" name="netbios"  value="<?php echo $netbios; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="IP" name="endereco_ip" value="<?php echo $endereco_ip; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="S.O" name="sistema_operacional" value="<?php echo $sistema_operacional; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="COLABORADOR" name="colaborador" value="<?php echo $colaborador; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="DEPARTAMENTO" name="departamento"  value="<?php echo $departamento; ?>" class="input is-large" onkeyup="maiuscula(this)"/>																		
									<input type="text" placeholder="FABRICANTE" name="fabricante" value="<?php echo $fabricante; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="URL DA FOTO" name="url_foto" value="<?php echo $url_foto; ?>" class="input is-large"/>
									<input type="text" placeholder="URL DO TERMO" name="url_termo" value="<?php echo $url_termo; ?>" class="input is-large"/>
									<input type="text" placeholder="WHATSAPP" name="whats"   class="input is-large"/>
									<input type="blob" placeholder="OBSERVAÇÕES" name="historico"  class="input is-large"/>
									
									
									<select name="obra"    autofocus="" class="input is-large">									
									<option>SELECIONE OBRA</option>
									<?php 
										include "sql_t.i.php";//conexão com o banco de dados   
										@mysql_select_db($db);//selecione o banco de dados 
										$sqltudo = mysql_query(" select nome from  crtl_patrimonio_obras;")  or die(mysql_error());
										$colunas = mysql_num_rows($sqltudo);		
										for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
										$id = @mysql_result($sqltudo, $j, "id");           
										$nome = @mysql_result($sqltudo, $j, "nome");
										print'<option>'; 						
										echo $nome;
										print '</option>';          
										}
										print '<option selected="selected">';
										echo $obra;
										print'</option>';   
									?>
									</select>
									<select name="tipo_equipamento"    autofocus="" class="input is-large">																		
									<option>SELECIONE TIPO DE EQUIPAMENTO</option>
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
										print '<option selected="selected">';
										echo $tipo_equipamento;
										print'</option>';           
									?>
									</select>

								   <select name="icone"    autofocus="" class="input is-large">									
									<option>SELECIONE ICONE</option>
									<?php 
										include "sql_t.i.php";//conexão com o banco de dados   
										@mysql_select_db($db);//selecione o banco de dados 
										$sqltudo = mysql_query(" select caminho from  crtl_patrimonio_icones;")  or die(mysql_error());
										$colunas = mysql_num_rows($sqltudo);		
										for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
										$id = @mysql_result($sqltudo, $j, "id");           
										$nome_icone = @mysql_result($sqltudo, $j, "caminho");
										print'<option>'; 						
										echo $nome_icone;
										print '</option>';          
										}
										print '<option selected="selected">';
										echo $icone;
										print'</option>';           
										
										
									?>									
									<td><input type="hidden" enable="false" name="id_retorno" value="<?php echo $id_retorno; ?>" size=6/></td></tr>

									
									
										
									
																	
									
                                </div>
                            </div>
                            <?php
                            if ($id_retorno ==''){
                                print '<font size=4>';
                                print '<center>';
                                print '<a href=listar_pesquisa.php>VOLTAR</a>';
                            }else{
                            print '<button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">ATUALIZAR</button><input type="hidden" name="done"  value="" />';
                            }
                            ?>
                        </form>

						
						

						
                    </div>
                </div>
            </div>
        </div>
    </section>
	

</body>

</html>