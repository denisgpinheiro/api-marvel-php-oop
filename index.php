<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <title>Heróis Marvel</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>


<?php
    require('Marvel.class.php');
    $herois = new Marvel;
    $herois->conectaApi();
    $herois->getData();
?>

<body>

    <div class="main">
    
        <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Hérois Marvel</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <?php

            foreach($herois->getData()->data->results as $heroi){

           
                $imgThumb = $heroi->thumbnail->path;
                $imgExtension = $heroi->thumbnail->extension;
                $heroiName = $heroi->name;
                $heroiUrl = $heroi->resourceURI;
                $imgUrl = $imgThumb.".".$imgExtension;
  
                if(!empty($heroi->description)){
                    $heroiDescription = $heroi->description;
                }else{
                    $heroiDescription = 'Este Super-Herói não possui descrição cadastrada!';
                }
            
             echo   "<div class='herois feature col'>
                    <div class='feature-icon'>
                    <img src='".$imgUrl."'id='thumb-heroi'/>
                    </div>
                    <h2>".$heroiName."</h2>
                    <p>".$heroiDescription."</p>
                    <a href='".$heroiUrl."' class='icon-link'>
                    Ver Herói
                    <svg class='bi' width='1em' height='1em'><use xlink:href='#chevron-right'></use></svg>
                    </a>
                    </div>";
            };
            ?>    
                
            </div>
        </div>
    </div>

    <!--SCRIPTS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>