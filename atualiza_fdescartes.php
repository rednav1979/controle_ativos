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
	<link rel="stylesheet" href="./novo_menu.css">
</head>



<img src=css/logo.png><br>
Hoje, 
<script Language="JavaScript">
<!--
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday; 
myear = mydate.getFullYear();

if(myday == 0)
day = " Domingo, " 

else if(myday == 1)
day = " Segunda - Feira, " 

else if(myday == 2)
day = " Terça - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " Sábado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Março " 

else if(mymonth ==3)
month = "Abril " 

else if(mymonth ==4)
month = "Maio " 

else if(mymonth ==5)
month = "Junho " 

else if(mymonth ==6)
month = "Julho " 

else if(mymonth ==7)
month = "Agosto " 

else if(mymonth ==8)
month = "Setembro " 

else if(mymonth ==9)
month = "Outubro " 

else if(mymonth ==10)
month = "Novembro " 

else if(mymonth ==11)
month = "Dezembro " 

document.write("<font face=arial, size=2>"+ day);
document.write(myweekday+" de "+month+ "</font>");
document.write(myear);
// -->
</script>
<br>

<body>

    <section class="hero is-success is-fullheight">
	
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <font size=1>
<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados  
   
   if(isset($_POST['done'])){  

$id_retorno = $_POST['id'];

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
			   $observacoes = @mysql_result($sqltudo, $j, "historico");  
			   $usuario_cadastro = $_SESSION['usuario'];
			   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		       $url_foto = @mysql_result($sqltudo, $j, "url_foto");			   
		   
		   }
		   
			   $sql2 = mysql_query("INSERT INTO `crtl_patrimonio_historico`(`data_cadastro`,`endereco_ip`, `netbios`, `sistema_operacional`, `colaborador`,`obra`,`departamento`,`tipo_equipamento`,`fabricante`,`usuario_cadastro`,`url_foto`,`url_termo`,`id_historico`,`historico`) VALUES (now(),'$endereco_ip ', '$netbios', '$sistema_operacional','$colaborador','$obra', '$departamento','$tipo_equipamento','$fabricante','$usuario_cadastro','$url_foto','$url_termo','$id_retorno','$observacoes')") or die(mysql_error());	   
               $sql_sinistros = mysql_query("INSERT INTO `crtl_patrimonio_sinistros`(`data_cadastro`,`netbios`,`colaborador`,`obra`,`departamento`,`tipo_equipamento`,`usuario_cadastro`,`url_foto`,`url_termo`,`historico`) VALUES (now(),'$netbios','$colaborador','$obra', '$departamento','$tipo_equipamento','$usuario_cadastro','$url_foto','$url_termo','$id')") or die(mysql_error());           
// DELETA O REGISTRO DE SINISTRO DEPOIS DE GRAVAR NA  LISTAGEM DE SINISTROS
			   $sql_delete = mysql_query ("delete from crtl_patrimonio where id='$id';" )or die(mysql_error());           
		   print '<font color=green size=6>';
		   print '<br>';
		   print 'DADOS GRAVADOS COM SUCESSO';
		
   }
?>
   
			
<a href="listar_pesquisa_fdescartes.php"><br>
</font>
[V O L T A R] </a>
    </section>


</body>

</html>
</html>
<br><br><br><br><br><br>