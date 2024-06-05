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

<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
					<font color=red size=4> HISTORICO DE TRANSFERENCIAS DO EQUIPAMENTO:</font>
                    <font size=2>
					
					

					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
	
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio_historico where D_E_L_E_T_E IS NULL and id_historico=('$id_fixo')")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>IP</td>';
	   print'<td><b>NETBIOS</td>';
	   print'<td><b>S.O</td>';
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OBRA</td>';
	   print'<td><b>ICONE</td>';
	   print'<td><b>DEPARTAMENTO</td>';
	   print'<td><b>FABRICANTE</td>';	   
	   print'<td><b>TIPO</td>';
	   print'<td><b>OBSERVACOES</td>';
	   print'<td><b>DATA CADASTRO</td>';
	   print'<td><b>CADASTRADO POR</td>';	   
	   print'<td><b>URL_FOTO</td>';
	   print'<td><b>URL_TERMO</td>';
	   
	   
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
		   $icone = @mysql_result($sqltudo, $j, "icone");
		   $observacoes = @mysql_result($sqltudo, $j, "solicitacao_suporte");
		   $data_cadastro = @mysql_result($sqltudo, $j, "data_cadastro");
		   $usuario_cadastro = @mysql_result($sqltudo, $j, "usuario_cadastro");
		   $url_termo = @mysql_result($sqltudo, $j, "url_termo");
		   $url_foto = @mysql_result($sqltudo, $j, "url_foto");
		   
		   print'<tr>';
		   print'<td>'.$id.'</td>';	   	   	   
		   print '<td>'.$endereco_ip.'</td>';
		   print '<td>'.$netbios.'</td>';
		   print '<td>'.$sistema_operacional.'</td>';	     
		   print '<td>'.$colaborador.'</td>';
		   print '<td>'.$obra.'</td>';
		   //COLOCA O ICONE   DO EQUIPAMENTO QUE CONSTA NA TABLEA CONTROLE_PATRIMONIO NO CAMPO ICONE  
	       if ($icone ==""){
			print'<td><img src=images/semicone.png width=30 height=30></td>';	 			   
			}else{
			print'<td><img src=images/'.$icone.' width=30 height=30></td>';	 			   
		   }
		   print '<td>'.$departamento.'</td>';	   
		   print '<td>'.$fabricante.'</td>';
		   print '<td>'.$tipo_equipamento.'</td>';
		   print '<td>'.$observacoes.'</td>';
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
		   
		   print '</tr>';	
	   
           }
	    print'</table>';
		print '<br>';
		print '<hr>';
		

?>					<a href="listar.php">[V O L T A R  ]</a>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
	
	<br>

<br>


</body>

</html>


