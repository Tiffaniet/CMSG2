<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des pages</title>
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
            <a class="navbar-brand" href="../index.php">Front Office</a>
            <a class="navbar-brand" href="../admin">Back Office</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Liste des pages</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <h1>Liste des pages</h1>
    <a href="?a=ajouter">Ajouter une page</a>
    <table class="table-bordered table-responsive table">
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $page): ?>
            <tr>
                <td><?= $page->id ?></td>
                <td><?= $page->slug ?></td>
                <td><?= $page->title ?></td>
                <td>
                    <a href="/admin/index.php?a=details&id=<?= $page->id ?>">Détails</a>
                    <a href="/admin/index.php?a=modifier&id=<?= $page->id ?>">Modifier</a>
                    <a href="/admin/index.php?a=supprimer&id=<?= $page->id ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
</body>
</html>