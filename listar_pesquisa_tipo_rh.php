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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
<span id='topo'></span>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <font size=2>
					
					<form name="form1" action="listar_pesquisa_rh.php" method="post">


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
					
					<form name="form1" action="listar_pesquisa_tipo_rh.php" method="post">


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
		   $colaborador_retorno = $_POST['colaborador_procura'];
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
Valor do Filtro:
<?php
print $colaborador_retorno;
?>
<center>

					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where D_E_L_E_T_E IS NULL and tipo_equipamento like UPPER('$colaborador_retorno%')   order by endereco_ip ")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';		   
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OBRA</td>';
	   print'<td><b>DEPARTAMENTO</td>';
	   print'<td><b>FABRICANTE</td>';	   
	   print'<td><b>TIPO</td>';	   
	   print'<td><b>ICONE</td>';	
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

		
		   
	   print'<tr>';
	   print '<td>'.$id.'	</td>';	   	   
	   print '<td>'.$colaborador.'</td>';
	   print '<td>'.$obra.'</td>';
	   print '<td>'.$departamento.'</td>';	   
	   print '<td>'.$fabricante.'</td>';
	   print '<td>'.$tipo_equipamento.'</td>';
	   //COLOCA O ICONE   DO EQUIPAMENTO QUE CONSTA NA TABLEA CONTROLE_PATRIMONIO NO CAMPO ICONE    
	   if ($icone ==""){
		print'<td><img src=images/semicone.png width=30 height=30></td>';	 			   
		}else{
		print'<td><img src=images/'.$icone.' width=30 height=30></td>';	 			   
		}
		
		
	  
		
		if ($url_termo ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_termo/'.$url_termo.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}			
		if ($url_foto ==""){			
			print '<td><img src="images/bolinha_vermelha.png" width=30 height=30></td>';
		}else{				
			print '<td><a href="uploads_foto/'.$url_foto.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
		}
	   print '</tr>';	
           }
	    print'</table>';
		print '<br>';
		print '<hr>';
		echo 'EQUIPAMENTOS CADASTRADOS: ';
		print '<hr>';
	   include "sql_t.i.php";//conexão com o banco de dados   
	   @mysql_select_db($db);//selecione o banco de dados
			  $sqltudo = mysql_query("select count(*)tipo_equipamento,tipo_equipamento  as type from crtl_patrimonio  where tipo_equipamento like UPPER('$colaborador_retorno%') and D_E_L_E_T_E IS NULL group by tipo_equipamento")  or die(mysql_error());
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

	<?php
$con = mysqli_connect('localhost','root','L0t1s4!@#','tecnologia');
?>
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select obra ,tipo_equipamento  as jjj,count(tipo_equipamento) as lll from crtl_patrimonio where tipo_equipamento=('$colaborador_retorno') and D_E_L_E_T_E IS NULL group by obra;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['obra']."',".$row['lll']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos por Tipo',				
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart20"));
            chart.draw(data,options);
        }
    </script>  
<div id="columnchart20" style="width: 100%; height: 500px;"></div>	
	

	<a href='#topo'>Voltar ao topo</a>
</body>

</html>


