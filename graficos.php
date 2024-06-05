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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
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
                $query = "select tipo_equipamento,count(tipo_equipamento) as qtd from crtl_patrimonio where D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['tipo_equipamento']."',".$row['qtd']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Grafico dos Tipos de Equipamento',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
            chart.draw(data,options);
        }
    </script>   
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select obra,count(tipo_equipamento) as qtd2 from crtl_patrimonio where D_E_L_E_T_E IS NULL  group by obra;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['obra']."',".$row['qtd2']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Por Obra',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart13"));
            chart.draw(data,options);
        }
    </script>   
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = "select tipo_equipamento,count(tipo_equipamento) as qtd from crtl_patrimonio where obra='TORRES_DA_BRAVA' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['tipo_equipamento']."',".$row['qtd']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Torres da Brava',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart14"));
            chart.draw(data,options);
        }
    </script>  
	
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select departamento,count(tipo_equipamento)as xxx from crtl_patrimonio where D_E_L_E_T_E IS NULL group by departamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['departamento']."',".$row['xxx']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Por departamento',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart15"));
            chart.draw(data,options);
        }
    </script>  
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as bbb,count(tipo_equipamento) as ccc from crtl_patrimonio where obra='SKYLINE' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['bbb']."',".$row['ccc']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Skyline',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart16"));
            chart.draw(data,options);
        }
    </script>  
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as ddd,count(tipo_equipamento) as eee from crtl_patrimonio where obra='GARDEN' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['ddd']."',".$row['eee']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Garden',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart17"));
            chart.draw(data,options);
        }
    </script>  
	
	
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as hhh,count(tipo_equipamento) as iii from crtl_patrimonio where obra='SKYLINE_VISTAMARE' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['hhh']."',".$row['iii']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Skyline&Vistamare',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart19"));
            chart.draw(data,options);
        }
    </script>  
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as jjj,count(tipo_equipamento) as lll from crtl_patrimonio where obra='SEDE' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['jjj']."',".$row['lll']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Sede',
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
	
	<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as mmm,count(tipo_equipamento) as nnn from crtl_patrimonio where obra='VISTAMARE' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['mmm']."',".$row['nnn']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos Vistamare',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart21"));
            chart.draw(data,options);
        }
    </script>  

<script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as mmm,count(tipo_equipamento) as nnn from crtl_patrimonio where obra='SUNPARK' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['mmm']."',".$row['nnn']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos SUNPARK',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart22"));
            chart.draw(data,options);
        }
    </script>  
	

    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['class Name','Students'],
                <?php
                $query = " select tipo_equipamento  as mmm,count(tipo_equipamento) as nnn from crtl_patrimonio where obra='ARTTOWER' and D_E_L_E_T_E IS NULL group by tipo_equipamento;";
                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                    echo "['".$row['mmm']."',".$row['nnn']."],";
                }
                ?>

            ]);

            var options = {
                title: 'Equipamentos ARTTOWER',
                is3D: true,
				pieHole: 0.5,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart23"));
            chart.draw(data,options);
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
    
 <br>
            
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1><center>
					<h2 class="title has-text-grey"><font size=4><center>[Controle de Patrimonio - LOTISA]</font></h2>  <br>
				
                    <div class="box">
                   <p align=left>
				   <img src=css/logo.png><br></p>
					
<div id="columnchart15" style="width: 100%; height: 500px;"></div>
<div id="columnchart12" style="width: 100%; height: 500px;"></div>
<div id="columnchart13" style="width: 100%; height: 500px;"></div>
<div id="columnchart20" style="width: 100%; height: 500px;"></div>
<div id="columnchart14" style="width: 100%; height: 500px;"></div>
<div id="columnchart16" style="width: 100%; height: 500px;"></div>
<div id="columnchart17" style="width: 100%; height: 500px;"></div>
<div id="columnchart19" style="width: 100%; height: 500px;"></div>
<div id="columnchart21" style="width: 100%; height: 500px;"></div>
<div id="columnchart22" style="width: 100%; height: 500px;"></div>
<div id="columnchart23" style="width: 100%; height: 500px;"></div>
</div>				
</div>		
</div>
</div>
</section>	
<font color=red>	
</font>
</body>
</html>



