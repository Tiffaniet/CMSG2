<?php
namespace Controller;

use Model\PageRepository;


class PageController
{
    /**
     * @var PageRepository
     */
    private $repository;

    /**
     * PageController constructor.
     * @param \PDO $PDO
     */
    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
    }

    /**
     *
     */

    public function ajoutAction()
    {
        if(count($_POST) === 0) {
            // formulaire
            // affichage de vue
            require "View/admin/ajouterPage.php";
        } else {
            // traitement de formulaire
            $data = $this->repository->ajout($_POST);
            // sauvegarde de la nouvelle page
            // redirection

        }

    }

    /**
     *
     */
//    public function supprimerAction()
//    {
//        if(!isset($_GET['id'])) {
//            throw new\Exception('Merci de mettre une id dans l url');
//        }
//        $id = $_GET['id'];
//        $data = $this->repository->supprimer($id);
//
//        include "View/admin/supprimerPage.php";
//    }

    /**
     *
     */
    public function modifierAction()
    {
    }

    /**

     */
    public function detailsAction()
    {
        if(!isset($_GET['id'])) {
                throw new\Exception('Merci de mettre une id dans l url');
        }
        $id = $_GET['id'];
        $data = $this->repository->details($id);

        if($data === false) {
            include "View/admin/detailsPageError.php";
            return;
        }
        include "View/admin/detailsPage.php";
    }
    /**
     *
     */

    public function listeAction()
    {
        //id slug et title dans data
        //$data va stocker les pages qui sont renvoyées par le repository
        $data = $this->repository->getPages();

        require "View/admin/listePage.php";
    }

    /**
     *
     */

    //permet de générer les pages
    public function displayAction()
    {
//      $slug = $_GET['p'] ?? $_POST['p'] ?? 'teletubbies';
        // recuperation du slug de la page demandee
        if (isset($_GET['p'])) {
            $slug = $_GET['p'];
        } else {
            $slug = 'teletubbies';
        }
        // recuperation de la navigation
        $nav = $this->getNav($slug);
        // recuperation des donnees de la page demandee
        $page = $this->repository->getSlug($slug);
        // si les donnees sont false, pas de page correspondant
        if (!$page) {
            // page 404
            include "View/404.php";

            // sortie du controller
            return;
        }
        // inclusion de la vue avec injection des variables
        include "View/page.php";
    }

    /**
     * recuperation de la nav a partir d'une vue
     * @return string
     */
    private function getNav($slug)
    {
        $nav = $this->repository->getPages();

        // capture de l'output et placement dans l'output buffer (ob)
        ob_start();
        // inclusion de la vue de nav
        include "View/nav.php";

        //retour du output buffer et nettoyage du buffer
        return ob_get_clean();
    }

}

// donner recuperer et ré-envoyer au view