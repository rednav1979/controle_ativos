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
	$colaborador_retorno = $_GET['id'];
	
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
   
	
        
            
                <br>
                    <h1 class="title has-text-grey">LISTAR ATIVOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>				   
					<p align=right><font size=2 color=blue><a href =listar_pesquisa.php>VOLTAR?</a></font>
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
                    <font size=2>			

	<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados	
	$sqltudo = mysql_query("update crtl_patrimonio  set D_E_L_E_T_E='S' Where id='$colaborador_retorno'  order by colaborador ")  or die(mysql_error());
	print 'Marcando registro como deletado:';
	print '<font color=green>';
	print 'OK';
	print '</font>';
	print '<br>';
	$sqltudo = mysql_query("update crtl_patrimonio_historico  set D_E_L_E_T_E='S' Where id_historico='$colaborador_retorno'  order by colaborador ")  or die(mysql_error());
	print 'Marcando registro do historico como deletado:';
	print '<font color=green>';
	print 'OK';
	print '</font>';
	print '<br>';
	print '<font color=red>';
	print 'Listando conteudo da Tabela  de Patrimonio se a marcação ocorreu bem nenhum registro deve ser exibido';
	print '</font>';
	print '<br><br>';
    
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio  where id='$colaborador_retorno' and D_E_L_E_T_E IS NULL order by colaborador ")  or die(mysql_error());           
        $colunas = mysql_num_rows($sqltudo);
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
           $sqltudo2 = mysql_query("SELECT count(*)id_historico FROM crtl_patrimonio_historico where id_historico = $id")  or die(mysql_error());
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
		
		
?>

<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
	print '<br>';
	print '<font color=red>';
	print 'Listando conteudo da Tabela  de Histórico do Patrimonio se a marcação ocorreu bem nenhum registro deve ser exibido';
	print '</font>';
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio_historico where D_E_L_E_T_E IS NULL and id_historico=('$id')")  or die(mysql_error());
	
           
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
		   $observacoes = @mysql_result($sqltudo, $j, "historico");
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
		?>
		<?php
		//
	//ENVIO DO EMAIL PARA REGISTRO
	//
	require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ti@lotisa.com.br';
    $mail->Password = '!@#vndrl1979!@#';
    $mail->Port = 587;
    $mail->setFrom('ti@lotisa.com.br', 'Exclusão de Registros - Controle de Patrimonio');
    $mail->addAddress('ti@lotisa.com.br');
    //$mail->SMTPDebug = 3;
    //$mail->Debugoutput = 'html';
    //$mail->setLanguage('pt');
    $mail->isHTML(true);
   $mail->Subject = "*** Exclusao de Registros - Controle de Patrimonio ***";
   $mail->Body    = "** INFORMACAO*** : Deletado Registro do Controle de Patrimonio por: ".$usuario_cadastro.", ID do Controle de Historico e  de Patrimonio: ".$colaborador_retorno." ";
   $mail->AltBody = "CORPO DO EMAIL2";


   if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
   } else {
    echo "Seu email foi enviado com sucesso!"; 
   }

		?>



   

                    </div>
                </div>
            </div>
        </div>
    </section>
	



</body>

</html>

