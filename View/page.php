<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$page->title?></title>
    <style>
        body{
            padding-top: 70px;
        }
    </style>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<?=$nav?>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$page->title?></h1>
        <p><?=$page->body?></p>
      <span class="label label-<?=$page->span_class?>"><?=$page->span_text?></span>
    </div>
    <img class="img-thumbnail" alt="" src="<?=$page->img?>" data-holder-rendered="true">
</div>
</body>
</html>