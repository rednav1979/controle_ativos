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
      <li title="Menu Principal"><a href="../control_pass/menu.php" class="menu">Menu Principal</a></li>
      <li title="Pesquisar"><a href="listar_pesquisa.php" class="search">Pesquisar</a></li>
      <li title="Cadastro de Ativo"><a href="init.php" class="pencil">Cadastro de Ativo</a></li>      
      <li title="Historico Completo"><a href="listar_historico.php" class="olho">Historico</a></li>            
      <li title="Graficos"><a href="graficos.php" class="graficos">Graficos</a></li>  
      <li title="Sinistros"><a href="listar_pesquisa_fdescartes.php" class="sinistro">Sinistros</a></li>  
      <li title="Furtos e Descartes"><a href="listar_pesquisa_fdescartes_update.php" class="bomba">Furtos e Descartes</a></li>  
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
 
 <br> 
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1><center>
					<h2 class="title has-text-grey"><font size=4><center>[Controle de Patrimonio - LOTISA]</font></h2>  <br>
				
                    <div class="box">
                   <p align=left>
				   <img src=css/logo.png><br></p>
					<img src=images/patrimonio.jpg>
					
					
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

			
					
<?php 
 	print '<font color=black size=2>';
	 print '<hr>';
 	echo 'EQUIPAMENTOS CADASTRADOS: ';
	print '<hr>';
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
           $sqltudo = mysql_query("select count(*)tipo_equipamento,tipo_equipamento  as type from crtl_patrimonio where D_E_L_E_T_E is NULL group by tipo_equipamento")   or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);	   
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/           
		   $nome = @mysql_result($sqltudo, $j, "type");
		   $type = @mysql_result($sqltudo, $j, "tipo_equipamento");
		   print '<td>'.$nome.':</td>';	
		   print '<a href=listar_pesquisa_tipo_click.php?tipo_equipamento='.$nome.'>'.$type.'</a>';
		   print '<br>';	
           }
		   ?>
                    </div>
					
                </div>
				
				
            </div>

			
        </div>
		
    </section>	
	
</body>

</html>



