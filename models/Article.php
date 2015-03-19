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
    
    private $bd;

    // methods
    
    public function __construct() {
//        include ('includes/connexion.php');
//        
//        $this->db= $db;
    }
    
    /** display one article
     * 
     * @param type $id
     */
    public function displayArticle($id) {
        
    }
    
    /** display all articles
     * 
     */
    public function displayAll() {

        require ('includes/connexion.php');
        
        $sql = "SELECT * FROM `article` WHERE 1";

        try {

            $sth = $db->query($sql);
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
    public function addArticle() {
        
    }

    /** delete Article
     * 
     * @param type $id
     */
    public function deleteArticle($id) {
        
    }

    /** update Article
     * 
     * @param type $id
     */
    public function updateArticle($id) {
        
    }

}
