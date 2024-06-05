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
			   $icone = @mysql_result($sqltudo, $j, "icone");  
			   $observacoes = @mysql_result($sqltudo, $j, "historico");  
			   $usuario_cadastro = $_SESSION['usuario'];
			   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		       $url_foto = @mysql_result($sqltudo, $j, "url_foto");			   
		   
		   }
		   
		   $sql2 = mysql_query("INSERT INTO `crtl_patrimonio_historico`(`data_cadastro`,`icone`,`endereco_ip`, `netbios`, `sistema_operacional`, `colaborador`,`obra`,`departamento`,`tipo_equipamento`,`fabricante`,`usuario_cadastro`,`url_foto`,`url_termo`,`id_historico`,`historico`) VALUES (now(),'$icone','$endereco_ip ', '$netbios', '$sistema_operacional','$colaborador','$obra', '$departamento','$tipo_equipamento','$fabricante','$usuario_cadastro','$url_foto','$url_termo','$id_retorno','$observacoes')") or die(mysql_error());
		   

			$id_retorno = $_POST['id'];
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
			
	

           $sql_update = mysql_query("update `crtl_patrimonio` set icone='$icone_retorno',netbios='$netbios_retorno',fabricante ='$fabricante_retorno',colaborador='$colaborador_retorno',endereco_ip='$endereco_ip_retorno',historico='$historico_retorno',sistema_operacional='$sistema_operacional_retorno',departamento='$departamento_retorno',tipo_equipamento='$tipo_equipamento_retorno',url_foto='$url_foto_retorno',url_termo='$url_termo_retorno',obra='$obra_retorno' where id = '$id_retorno'") or die(mysql_error()); 		   
		   
		
  @mysql_select_db($db);//selecione o banco de dados
   
	$id = $_GET['id'];
           $sqltudo = mysql_query("SELECT * FROM crtl_patrimonio where id='$id_retorno'")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);


	   

         
	   print'<br>';	
	
	   print'<br>';	
	  
           print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b><font size=1>ID</td>';
	   print'<td><b><font size=1>HISTORICO</td>';	   
	   print'<td><b><font size=1>NETBIOS</td>';	   
	   print'<td><b><font size=1>COLABORADOR</td>';
	   print'<td><b><font size=1>OBRA</td>';	   
	   print'<td><b><font size=1>DEPARTAMENTO</td>';
	   print'<td><b><font size=1>FABRICANTE</td>';	   	   	   
	   print'<td><b><font size=1>ICONE</td>';
       print'<td><b><font size=1>TERMO</td>';
	   print'<td><b><font size=1>FOTO</td>';
	   
	   
	   
	   
	   

           
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
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");	   
           }

	 
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	   print'<tr>';
	   print '<td><font size=1>'.$id.'	</td>';	   
	   print '<td><a href="historico.php?id='.$id.'"><img src=images/historico.jpg></a></td>';	   
	   print '<td><font size=1>'.$netbios.'</td>';	   
	   print '<td><font size=1>'.$colaborador.'</td>';
	   print '<td><font size=1>'.$obra.'</td>';	  
	   print '<td><font size=1>'.$departamento.'</td>';	   
	   print '<td><font size=1>'.$fabricante.'</td>';	   
	   //COLOCA O ICONE   DO EQUIPAMENTO QUE CONSTA NA TABLEA CONTROLE_PATRIMONIO NO CAMPO ICONE  
	   if ($icone ==""){
		print'<td><img src=images/semicone.png width=30 height=30></td>';	 			   
		}else{
		print'<td><img src=images/'.$icone.' width=30 height=30></td>';	 			   
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

	






?>
   
			
<a href="listar_pesquisa_update_.php">[V O L T A R] </a>
    </section>


</body>

</html>
</html>
<br><br><br><br><br><br>
