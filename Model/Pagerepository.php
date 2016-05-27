<?php
namespace Model;

class PageRepository
{

    /**
     * @var \PDO
     */
    private $PDO;

    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    /**
     * @param int $id
     */
    public function getSlug($slug)
    {
        $sql = "
        SELECT 
          `body`, 
          `title`
        FROM 
          `page` 
        WHERE 
          `slug` = :slug
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        return $stmt->fetchObject();
    }
//    recuperer une page par rapport au slug
    public function getPages()
    {
        $sql = "
        SELECT
          `slug`,
          `title`
        FROM
          `page`
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
//        fetch obj correspond au type du retour que l'on souhaite ici title et slug
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}

//PageRepository va récupérer des données envoyer au controller

//fetch permet de prendre le dernier résultat qui n'a pas été traiter
// fetch all va prendre toutes les données du tableau