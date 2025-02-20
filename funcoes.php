<?php
session_start();
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

$host = $_SERVER['HTTP_HOST'];
// $conexao = mysqli_connect("159.89.114.176", "admin_mentoria", "@Lcr1_Apr2#","admin_mentoria");
// if ($host=="web"){
//     $conexao = mysqli_connect("localhost:3307", "root", "","sql4x4adm");
// }
// mysqli_query($conexao,"SET NAMES 'utf8'");
// mysqli_query($conexao,'SET character_set_connection=utf8');
// mysqli_query($conexao,'SET character_set_client=utf8');
// mysqli_query($conexao,'SET character_set_results=utf8');

$pdo;
try {
   // Atribui a nova instância de PDO à propriedade da classe `$this->pdo`
   if ($host=="web"){
      $pdo = new PDO('mysql:host=localhost;port=3307;dbname=sql4x4adm;charset=utf8mb4', 'root', '');
   }else{
      $pdo = new PDO('mysql:host=167.99.176.212;dbname=akvcdbdjch;charset=utf8mb4', 'akvcdbdjch', '@Lcr1_Apr2#');
   }
   // set the PDO error mode to exception
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
   throw new Exception("Falha na conexão: " . $e->getMessage());
}



function anti_injection($sql){
	// remove palavras que contenham sintaxe sql
	//$sql = preg_replace(sql_regcase("/(from|select|insert|delete|update|where|drop|alter|show tables|#|\*|--|\\\\)/"),"",$sql);
    $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", '', $sql);
	$sql = trim($sql);
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
	return $sql;
}

function sequencia($tabela,$campo,$conexao){
	$valor = 1;
	$sql = "select max($campo) as valor from $tabela";
	$resultado = mysqli_query($conexao,$sql);
    while($row = mysqli_fetch_array($resultado) ){
        $valor = $row["valor"] + 1;
    }
	return $valor;
}

function estados($sel){
    $e = "<option></option>";
	$e = "<option";if($sel=='AC'){$e.=" selected=selected";}$e.=">AC</option>";
	$e .= "<option";if($sel=='AL'){$e.=" selected=selected";}$e.=">AL</option>";
	$e .= "<option";if($sel=='AM'){$e.=" selected=selected";}$e.=">AM</option>";
	$e .= "<option";if($sel=='AP'){$e.=" selected=selected";}$e.=">AP</option>";
	$e .= "<option";if($sel=='BA'){$e.=" selected=selected";}$e.=">BA</option>";
	$e .= "<option";if($sel=='CE'){$e.=" selected=selected";}$e.=">CE</option>";
	$e .= "<option";if($sel=='DF'){$e.=" selected=selected";}$e.=">DF</option>";
	$e .= "<option";if($sel=='ES'){$e.=" selected=selected";}$e.=">ES</option>";
	$e .= "<option";if($sel=='GO'){$e.=" selected=selected";}$e.=">GO</option>";
	$e .= "<option";if($sel=='MA'){$e.=" selected=selected";}$e.=">MA</option>";
	$e .= "<option";if($sel=='MG'){$e.=" selected=selected";}$e.=">MG</option>";
	$e .= "<option";if($sel=='MS'){$e.=" selected=selected";}$e.=">MS</option>";
	$e .= "<option";if($sel=='MT'){$e.=" selected=selected";}$e.=">MT</option>";
	$e .= "<option";if($sel=='PA'){$e.=" selected=selected";}$e.=">PA</option>";
	$e .= "<option";if($sel=='PB'){$e.=" selected=selected";}$e.=">PB</option>";
	$e .= "<option";if($sel=='PE'){$e.=" selected=selected";}$e.=">PE</option>";
	$e .= "<option";if($sel=='PI'){$e.=" selected=selected";}$e.=">PI</option>";
	$e .= "<option";if($sel=='PR'){$e.=" selected=selected";}$e.=">PR</option>";
	$e .= "<option";if($sel=='RJ'){$e.=" selected=selected";}$e.=">RJ</option>";
	$e .= "<option";if($sel=='RN'){$e.=" selected=selected";}$e.=">RN</option>";
	$e .= "<option";if($sel=='RO'){$e.=" selected=selected";}$e.=">RO</option>";
	$e .= "<option";if($sel=='RR'){$e.=" selected=selected";}$e.=">RR</option>";
	$e .= "<option";if($sel=='RS'){$e.=" selected=selected";}$e.=">RS</option>";
	$e .= "<option";if($sel=='SC'){$e.=" selected=selected";}$e.=">SC</option>";
	$e .= "<option";if($sel=='SE'){$e.=" selected=selected";}$e.=">SE</option>";
	$e .= "<option";if($sel=='SP'){$e.=" selected=selected";}$e.=">SP</option>";
	$e .= "<option";if($sel=='TO'){$e.=" selected=selected";}$e.=">TO</option>";
	return $e;
}