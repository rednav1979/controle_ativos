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

<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey"></h1>
					<h2 class="title has-text-grey"><font size=4></font></h2>                   
                    <div class="box">
					<font color=red size=4> CONFIRMAÇÃO DE SUPORTE DO EQUIPAMENTO:</font>
                    <font size=2>

                    <?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	

<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
	
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio where D_E_L_E_T_E IS NULL and id=('$id_fixo')")  or die(mysql_error());
           
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
	
		
?>

<?php
#INICIO DAS CONFS PARA GRAVAR OS DADOS QUE PRECISAM ANTES DE APROVAR
if(isset($_POST['done'])){   
    $observacoes = $_POST['observacoes'];		
	 
    if(empty($observacoes)){   
    $erro = "Atenção, você deve preencher todos os campos";
    //print '<meta http-equiv="refresh" content="0;url=retornou.php">';
        }else{        
            $sql = mysql_query("update  `crtl_patrimonio` set  obs_ticket='$observacoes' where id='$id_fixo' ") or die(mysql_error());
    $sql2 = mysql_query("insert into `crtl_patrimonio_historico` (`data_cadastro`,`obs_ticket`,`id_historico`,`solicitacao_suporte`)values(now(),'$observacoes','$id_fixo','Solicitacao de suporte ao GLPI') ") or die(mysql_error());
       
	if($sql){
            $erro2 = "Dados cadastrados com sucesso!";

            include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];	
	$sqltudo = mysql_query("select  * FROM crtl_patrimonio where D_E_L_E_T_E IS NULL and id=('$id_fixo')")  or die(mysql_error());           
           $colunas = mysql_num_rows($sqltudo);	   
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
           $observacoes = @mysql_result($sqltudo, $j, "obs_ticket");                      
           }



//NOTIFICACAO POR EMAIL DA APROVAÇÃO
    
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
    $mail->addAddress('helpdesk@lotisa.com.br');
    //$mail->SMTPDebug = 3;
    //$mail->Debugoutput = 'html';
    //$mail->setLanguage('pt');
    $mail->isHTML(true);
   $mail->Subject = "*** Chamado Automatico via E-mail Ajuste de Controle de Patrimonio ***";
   $mail->Body    = "** INFORMACAO*** : Aberto chamado pelo controle de patrimonio user: ".$usuario_cadastro.", ID do Controle de Patrimonio: ".$id_fixo.", Observacoes: ".$observacoes." ";
   $mail->AltBody = "CORPO DO EMAIL2";


if(!$mail->send()) {
   echo 'Não foi possível enviar a mensagem.<br>';
   echo 'Erro: ' . $mail->ErrorInfo;
} else {
    print '<font color=red>';
    echo "Seu chamando  foi enviado com sucesso para o GLPI!"; 
    print '</font>';
    //$sql = mysql_query("update  `crtl_patrimonio` set  controleobs_ticket=0 where id='$id_fixo' ") or die(mysql_error());
}
          } else{
              $erro = "Não foi possivel cadastrar os dados";
          }

}

}

?>


<form name="form1" action="abrirticket.php?id=<?php echo $id;?>" method="POST">
                            <div class="field">
                                <div class="control">  
								<br>                                  
									<input name="observacoes"   class="input is-large" placeholder="Observacoes" autofocus="" onkeyup="maiuscula(this)">									
									
                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">CONFIRMAR</button><input type="hidden" name="done"  value="" />
                        </form><br><br><br>


<br>

						<a href="listar.php">[V O L T A R  ]</a>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
	
	<br>

<br>


</body>

</html>


