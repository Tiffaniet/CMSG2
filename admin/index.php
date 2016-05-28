<?php
//ca prend le repertoire courant ca le passe dirname qui renvoie le répertoire parent
//ce repertoire parent devient le repertoire de travail du script avec chdir
//ce qui nous permet de faire des include comme si on était dans le répertoire racine et non pas dans /admin
chdir($rootDir =  dirname(__DIR__));
require_once "init.php";
$page = new \Controller\PageController($pdo);
switch($_GET['a']){
    case "ajouter":
        $page->ajoutAction();
        break;

    case "supprimer":
        $page->supprimerAction();
        break;

    case "modifier":
        $page->modifierAction();
        break;

    case "details":
        $page->detailsAction();
        break;

    case "liste":
    default:
        $page->listeAction();
        break;

}
