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
          `title`,
          `id`
        FROM
          `page`
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
//        fetch obj correspond au type du retour que l'on souhaite ici title et slug
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


//PageRepository va récupérer des données envoyer au controller

//fetch permet de prendre le dernier résultat qui n'a pas été traiter
// fetch all va prendre toutes les données du tableau

    public function ajout()
{
    $sql="
        INSERT
        INTO
        `page`
        (`slug`,
        `h1`,
        `body`,
        `title`,
        `img`,
        `span_text`,
        `span_class`)
        VALUES (:slug, :h1, :body, :title, :img, :span_text,:span_class)";


    $stmt = $this->PDO->prepare($sql);
    $stmt->bindParam(':slug', $slug, \PDO::PARAM_STR);
    $stmt->bindParam(':h1', $h1, \PDO::PARAM_STR);
    $stmt->bindParam(':body', $body, \PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
    $stmt->bindParam(':img', $img, \PDO::PARAM_STR);
    $stmt->bindParam(':span_text', $span_text, \PDO::PARAM_STR);
    $stmt->bindParam(':span_class', $span_class, \PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_OBJ);

}

    public function details($id)
    {
        $sql = "
       SELECT
          `slug`,
          `title`,
          `id`
        FROM
          `page`

        WHERE
          `id`= :id
        ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
        }


//    public function supprimer()
//    {
//        $sql="
//        DELETE
//        FROM
//        `page`
//        WHERE
//        1";
//        }
//
//    public function modifier()
//    {
//        $sql="
//        UPDATE
//        `page`
//        SET
//        `id`=[:id],
//        `slug`=[:slug],
//        `h1`=[:h1],
//        `body`=[:body,
//        `title`=[:title],
//        `img`=[:img],
//        `span_text`=[:span_text],
//        `span_class`=[:span_class]
//        WHERE
//        1";
//    }
}