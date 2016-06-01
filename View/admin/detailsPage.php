
<?php
if($data !== false){
    $title = $data->title;
} else {
    $title = "Oops I did it again";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details de la page : <?=$title?></title>
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../bootstrap/css/" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.php">Front Office</a>
            <a class="navbar-brand" href="../admin">Back Office</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Pages</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <h1>Détails de la page : <?=$data->h1?></h1>
    <?php if($data !== false):?>
        <p>
            <span class="label label-default">id</span><br/>
            <?=$data->id?>
        </p>
        <p>
            <span class="label label-default">Slug</span><br/>
            <?=$data->slug?>
        </p>
        <p>
            <span class="label label-default">Title</span><br/>
            <?=$data->title?>
        </p>
        <p>
            <span class="label label-default">h1</span><br/>
            <?=$data->h1?>
        </p>
        <p>
            <span class="label label-default">Body</span><br/>
        <pre><?=htmlentities($data->body)?></pre>
        </p>
        <p>
            <span class="label label-default">Description</span><br/>
            <?=$data->span_text?>
        </p>
        <p>
            <span class="label label-default">&Eacute;tat</span><br/>
            <?=$data->span_class?>
        </p>
        <p>
            <span class="label label-default">img</span><br/>
            <img src="../<?=$data->img?>">
        </p>
    <?php else: ?>
        <p>
            ID fournie non trouv&eacute;e
        </p>
    <?php endif; ?>

</div>
</body>
</html>