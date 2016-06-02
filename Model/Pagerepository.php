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
          `title`,
          `img`,
          `span_text`,
          `span_class`,
          `h1`
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
        $sql = "
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
        VALUES (:slug, :h1, :body, :title, :img, :span_text, :span_class)";


        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug', $data['page_slug'], \PDO::PARAM_STR);
        $stmt->bindParam(':h1', $data['page_h1'], \PDO::PARAM_STR);
        $stmt->bindParam(':body', $data['page_body'], \PDO::PARAM_STR);
        $stmt->bindParam(':title', $data['page_title'], \PDO::PARAM_STR);
        $stmt->bindParam(':img', $data['page_img'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_text', $data['span_text'], \PDO::PARAM_STR);
        $stmt->bindParam(':span_class', $data['span_class'], \PDO::PARAM_STR);
        $stmt->execute();

        return $this->PDO->lastInsertId();
    }

    public function details($id)
    {
        $sql = "
       SELECT
          `slug`,
          `title`,
          `id`,
          `body`,
          `span_text`,
          `span_class`,
          `img`,
          `h1`
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


    public function modifier($data)
    {
        $sql = "
        UPDATE
        `page`
        SET
        `slug`=:slug,
        `h1`=:h1,
        `body`=:body,
        `title`=:title,
        `img`=:img,
        `span_text`=:span_text,
        `span_class`=:span_class
        WHERE
          `id`= :id
          ";
        $stmt = $this->PDO->prepare($sql);
        //bindvalue va prendre en compte tout les valeurs comme en dur ou pas
        $stmt->bindValue(':slug', $data['page_slug'], \PDO::PARAM_STR);
        $stmt->bindValue(':h1', $data['page_h1'], \PDO::PARAM_STR);
        $stmt->bindValue(':body', $data['page_body'], \PDO::PARAM_STR);
        $stmt->bindValue(':title', $data['page_title'], \PDO::PARAM_STR);
        $stmt->bindValue(':img', $data['page_img'], \PDO::PARAM_STR);
        $stmt->bindValue(':span_text', $data['span_text'], \PDO::PARAM_STR);
        $stmt->bindValue(':span_class', $data['span_class'], \PDO::PARAM_STR);
        $stmt->bindValue(':id', $data['page_id'], \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function supprimer($id)
    {
        $sql = "
        DELETE
        FROM
          `page`
        WHERE
          `id`= :id
        ";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}