<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détails</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
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
    <h1>Détails</h1>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Titre</th>
            <th>h1</th>
            <th>body</th>
            <th>span_text</th>
            <th>span_class</th>
            <th>img</th>

        </tr>

        <tr>
            <td><?= $data->id ?></td>
            <td><?= $data->slug ?></td>
            <td><?= $data->title ?></td>
            <td><?= $data->h1 ?></td>
            <td><?= $data->body ?></td>
            <td><?= $data->span_text ?></td>
            <td><?= $data->span_class ?></td>
            <td><?= $data->img ?></td>

        </tr>
    </table>
</div>
</body>
</html>