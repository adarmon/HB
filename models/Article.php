<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author Ariel
 */
class Article {

    // attributes
    public $id;
    public $title;
    public $content;
    private $db;

    // methods
    function getDb() {
        return $this->db;
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function __construct() {
        require_once ('includes/connexion.php');
        if (!isset($db))
            $db = getConnexion();
        $this->setDb($db);
    }

    /** display one article
     * 
     * @param type $id
     */
    public function displayArticle($id) {
        $sql = "SELECT * FROM `article` WHERE `id_article`=:article;";
        $db = $this->getDb();

        try {
            $sth = $db->prepare($sql);
            $sth->bindParam(':article', $id, PDO::PARAM_INT);
            $sth->execute();


            // $sth = $db->query($sql);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        $result = $result = $sth->fetch();
        return $result;
    }

    /** display all articles
     * 
     */
    public function displayAll() {

        $sql = "SELECT * FROM `article` WHERE 1";
        $db = $this->getDb();

        try {

            $sth = $db->query($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, "Article");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        $result = $sth->fetchAll();
        return $result;
    }

    /** add an Article
     * 
     */
    public function addArticle($title, $content, $msg, $errormsg) {
        $db = $this->getDb();
        $sql = "INSERT INTO `article`(`title`, `content`) VALUES (:title, :content);";

        try {
            $sth = $db->prepare($sql);
            $sth->bindParam(':title', $title, PDO::PARAM_STR);
            $sth->bindParam(':content', $content, PDO::PARAM_STR);
            if ($sth->execute()) {
                addMessage($i++, 'valid', $msg);
            } else {
                addMessage($i++, 'error', $errormsg);
            }

            header('Location:index.php?page=listArticle');
            exit;
        } catch (PDOException $e) {
            addMessage($i++, 'error', "Erreur !: " . $e->getMessage() . "<br/>");

            header('Location:index.php?page=listArticle');
            exit;
        }
    }

    /** delete Article
     * 
     * @param type $id
     */
    public function deleteArticle($id) {
        $db = $this->getDb();
        $sql = "DELETE FROM `article` WHERE `id_article`=:article;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':article', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            addMessage(0, 'valid', "Article deleted");
        } else {
            addMessage(1, 'error', "Article not deleted");
        }
    }

    /** update Article
     * 
     * @param type $id
     */
    public function updateArticle($id, $title, $content, $msg, $errormsg) {
        $db = $this->getDb();
        $sql = "UPDATE `article` SET `title`=:title, `content`=:content WHERE `id_article`=" . $id . ";";

        try {
            $sth = $db->prepare($sql);
            $sth->bindParam(':title', $title, PDO::PARAM_STR);
            $sth->bindParam(':content', $content, PDO::PARAM_STR);
            if ($sth->execute()) {
                addMessage($i++, 'valid', $msg);
            } else {
                addMessage($i++, 'error', $errormsg);
            }

            header('Location:index.php?page=listArticle');
            exit;
        } catch (PDOException $e) {
            addMessage($i++, 'error', "Erreur !: " . $e->getMessage() . "<br/>");

            header('Location:index.php?page=listArticle');
            exit;
        }
    }

}
