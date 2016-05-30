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

    public function ajout($data)
{
    $sql="
        INSERT
        INTO
        `page`
        (`slug`,
        `h1`,
        `body`,
        `title`,
        `img`)
        VALUES (:slug, :h1, :body, :title, :img)";


    $stmt = $this->PDO->prepare($sql);
    $stmt->bindParam(':slug', $data['page_slug'], \PDO::PARAM_STR);
    $stmt->bindParam(':h1', $data['page_h1'], \PDO::PARAM_STR);
    $stmt->bindParam(':body', $data['page_body'], \PDO::PARAM_STR);
    $stmt->bindParam(':title', $data['page_title'], \PDO::PARAM_STR);
        $stmt->bindParam(':img', $data['page_img'], \PDO::PARAM_STR);
    $stmt->execute();
    return $this->PDO->lastInsertId(); // insert le dernier id

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


//    public function supprimer($id)
//    {
//        $sql="
//        DELETE
//        FROM
//        `page`
//        WHERE
//        `id`= :id
//        ";
//
//        $stmt = $this->PDO->prepare($sql);
//        $stmt->bindParam(':id', $id);
//        $stmt->execute();
//        return $stmt->fetchObject();
//        }


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