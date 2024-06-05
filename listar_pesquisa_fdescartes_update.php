<script>alert("AVISO!!! \n Essa rotina vai deletar esse item do controle de patrimonio e inserir no controle de sinistros/furtos")</script>
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

<br>
<body>      
			<div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">ATUALIZAÇÃO DE ATIVOS SINISTRADOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2> </center><br>
					<br><br><br>
<b><font color=red size=4> Digite o ID e Clique Em Trazer Dados</font></b>
                    <div class="box">
                    <font size=1>
					
					
					


<font size=1>  
  <form name="form1" action="listar_pesquisa_fdescartes_update.php" method="POST">


<p align=left>
				   <img src=css/logo.png><br></p>
<font size=4 color=blue><b>
Qual ID para Atualizar?:
</font></b>

<td><input type="text" name="id_update" placeholder="Digite o ID Para Pesquisa" size=2  class="input is-large"/></td>

<td><input type="submit" value="TRAZER OS DADOS" /><input type="hidden" name="done"  value="" /></td>

</table>

</form>
					
				<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   if(isset($_POST['done'])){  
   
	$id_retorno = $_POST['id_update'];
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
		   $historico = @mysql_result($sqltudo, $j, "historico");  
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");             
           }
   }
	   print'</table>';

?>

<form name="form2" action="atualiza_fdescartes.php" method="POST">

  <div class="field">
                                <div class="control">                                    
									<font color=red size=6><b>
									<tr><td>ID:</td><td><input type="hidden" enable="false" name="id" value="<?php echo $id; ?>" size=6/><?php echo $id; ?></td></tr>
									</font></b>
									<input type="text" placeholder="NETBIOS" name="netbios"  value="<?php echo $netbios; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="IP" name="endereco_ip" value="<?php echo $endereco_ip; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="S.O" name="sistema_operacional" value="<?php echo $sistema_operacional; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="COLABORADOR" name="colaborador" value="<?php echo $colaborador; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<select name="obra"    autofocus="" class="input is-large">									
									<option>SELECIONE</option>
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
									<input type="text" placeholder="DEPARTAMENTO" name="departamento"  value="<?php echo $departamento; ?>" class="input is-large" onkeyup="maiuscula(this)"/>																		
									<input type="text" placeholder="FABRICANTE" name="fabricante" value="<?php echo $fabricante; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<select name="tipo_equipamento"    autofocus="" class="input is-large">									
									<option>SELECIONE</option>
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
									<input type="text" placeholder="URL DA FOTO" name="url_foto" value="<?php echo $url_foto; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="URL DO TERMO" name="url_termo" value="<?php echo $url_termo; ?>" class="input is-large"/>
									<input type="blob" placeholder="OBSERVAÇÕES" name="historico" value="<?php echo $historico; ?>" class="input is-large"/>
									
                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">ATUALIZAR</button><input type="hidden" name="done"  value="" />
                        </form>
						

						
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>