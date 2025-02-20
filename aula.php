<?php
include("funcoes.php");

$idAula = 1;
if(isset($_GET["idAula"])){
   $idAula = $_GET["idAula"];
}
$sql = "Select * from aulas where idAula=$idAula";
$statement = $pdo->query($sql);
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $usuario) {

   $titulo = $usuario["titulo"];
   $descricao = $usuario["descricao"];
   $video = $usuario["video"];

}

$anterior = "";
$anterior_html = "";
$prox = $idAula;
$ant = $idAula;
if($idAula>50){
   $ant-=1;
   $anterior = "<a href='?idAula=$ant' class=\"btn btn-outline-success\">Anterior - $ant</a>";
   $anterior_html = "<a href='aula_$ant.html' class=\"btn btn-outline-success\">Anterior - $ant</a>";
}
$prox+=1;
$proxima = "<a href='?idAula=$prox' class=\"btn btn-outline-success\">Próxima - $prox</a>";
$proxima_html = "<a href='aula_$prox.html' class=\"btn btn-outline-success\">Próxima - $prox</a>";


# Gera os arquivos HTML
$html = file_get_contents('template_aula.html');

$html = str_replace("[[titulo]]",$idAula." - ".$titulo,$html);
$html = str_replace("[[descricao]]",$descricao,$html);
$html = str_replace("[[video]]",$video,$html);
$html = str_replace("[[anterior]]",$anterior_html,$html);
$html = str_replace("[[proxima]]",$proxima_html,$html);


$nomeArquivo = "aulas/aula_".$idAula.".html";
$arquivo = fopen($nomeArquivo, 'w');
fwrite($arquivo, $html);
fclose($arquivo);






?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="canonical" href="https://sql4x4.com.br" />
   <title>Banco de Atividades - SQL</title>
   <meta name="description" content="Curso SQL 4x4">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <header>
      <nav class="navbar-dark shadow-sm py-4">
         <div class="container text-center">
            <h1 class="fs-2 mb-3">BANCO DE <span>ATIVIDADES</span></h1>
            <p class="text-center text-light pt-0">Lista de exercícios e atividades para criação de algoritmos e prática de programação em diferentes linguagens, frameworks e banco de dados</p>
         </div>
      </nav>
   </header>

   <section class="container pt-5">
      <div class="row d-flex justify-content-center">
         <div class="col-md-10">
            <ul class="list-group mb-4">
               <li class="list-group-item"><i class="bi bi-check2-circle"></i> <strong><?= $idAula ?></strong> - <?= $titulo ?></li>
            </ul>   
            <div class="ratio ratio-16x9">
               <?= $video ?>
            </div>
            <p class="mt-5"><?= $descricao ?></p>
         </div>
      </div>
   </section>

   <section class="container mt-5 mb-5 pb-5">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
               <?= $anterior ?>
               <a href="index.html" class="btn btn-outline-primary">Índice de aulas</a>
               <?= $proxima ?>
            </div>
         </div>
      </div>
   </section>

   <footer class="container-fluid mt-5">
      <div class="container">
         <div class="row d-flex justify-content-center">
            <div class="col-sm-6 my-3">
               <small>&copy; 2025 | Banco de Atividades</a></small>
            </div>
            <div class="col-sm-6 my-3 text-end">
               <small>Criado por <a target="_blank" href="https://www.instagram.com/luisribeiro.lr">Luis Ribeiro</a>, com <a target="_blank" href="https://getbootstrap.com/">Bootstrap</a></small>
            </div>
         </div>
      </div>
   </footer>

</body>

</html>