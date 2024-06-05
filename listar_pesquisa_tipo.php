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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

<body>
<span id='topo'></span>
    <section class="hero is-success is-fullheight">
	
        
            
                <br><br><br><br>
                    <h1 class="title has-text-grey">LISTAR ATIVOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>
					<br><br>					
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
                    <font size=2>
					
<?php
$colaborador_retorno = $_POST['colaborador_procura'];
?>

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

<form name="form1" action="listar_pesquisa_tipo_obra.php" method="post">
<td>Pesquisar Por Obra?:
<br>
<select name="colaborador_procura3"   autofocus="" >									
<option>SELECIONE</option>
  <?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados 
           $sqltudo = mysql_query(" select obra  from crtl_patrimonio where tipo_equipamento =('$colaborador_retorno')  and D_E_L_E_T_E IS NULL group by obra;")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);		
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */                   
		   $id = @mysql_result($sqltudo, $j, "id");           
		   $nome = @mysql_result($sqltudo, $j, "obra");           
            print'<option>'; 						
            echo $nome;
            print '</option>';          
           }
		   ?>
		   </select>	
<input name=salva type=hidden value="<?php echo $colaborador_retorno;?>"		   		   
<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>
</tbody>
</table>
</form>
<p align=lef> TIPO_EQUIPAMENTO: <font color=red><?php echo $colaborador_retorno;?></p></font>	


					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where tipo_equipamento like UPPER('$colaborador_retorno%') and D_E_L_E_T_E IS NULL order by colaborador ")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   	   
	   print'<td><b>HISTORICO</td>';
	   print'<td><b>IP</td>';
	   print'<td><b>NETBIOS</td>';	   
	   print'<td><b>COLABORADOR</td>';
	   print'<td><b>OBRA</td>';
	   print'<td><b>DEPARTAMENTO</td>';	   
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
			
		
		   
	   print'<tr>';
	   print '<td>'.$id.'</td>';	   	   
	    print '<td><a href="historico.php?id='.$id.'"><img src=images/historico.jpg></a>';	   	   
	   
	   // INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
		   include "sql_t.i.php";//conexão com o banco de dados   
           @mysql_select_db($db);//selecione o banco de dados
           $sqltudo2 = mysql_query("SELECT count(*)id_historico FROM crtl_patrimonio_historico where id_historico = $id and D_E_L_E_T_E IS NULL")  or die(mysql_error());
           $colunas2 = mysql_num_rows($sqltudo2);		  	   
           for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
           $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 
		   print $id_historico;	   	   
	       print'</td>';	   
           }	   
		   //FIM DA INCLUSAO 
	   print '<td>'.$endereco_ip.'</td>';
	   print '<td>'.$netbios.'</td>';	   
	   print '<td>'.$colaborador.'</td>';	   
	   print '<td>'.$obra.'</td>';
	   print '<td>'.$departamento.'</td>';	   	   	   
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
		
		print '<br>';

		print '<font color=black size=2>';
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
	
<a href='#topo'>Voltar ao topo</a>
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
<a href=graficos.php>Mais Graficos?</a>
</body>

</html>

