<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une page</title>
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
            <a class="navbar-brand" href ="/index.php">Front Office</a>
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
    <h1>Ajouter une page</h1>

    <form action="/admin/index.php?a=ajouter" method="post" style="width: 400px;">
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Slug</label>
            <input type="text" class="form-control" name="page_slug" placeholder="slug">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput">h1</label>
            <input type="text" class="form-control" name="page_h1" placeholder="h1" >
        </fieldset>
        <fieldset class="form-group">
            <label for="exampleTextarea">Body</label>
            <textarea class="form-control" name="page_body" rows="3" placeholder="Du texte ici"></textarea>
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" name="page_title" placeholder="Title">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Img</label>
            <input type="text" class="form-control" name="page_img" placeholder="img/img.png">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Span class</label>
            <input type="text" class="form-control" name="page_span-class" placeholder="nom-class">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Span text</label>
            <input type="text" class="form-control" name="page_span-text" placeholder="Contenu du span">
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>
</div>
</body>
</html>