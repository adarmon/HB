<?php
$id = (int) (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : 0;

$article = new ArticleRepository($db);

try {
    $sql = "DELETE FROM `article` WHERE `id_article`=:article;";
    $result = $article->deleteArticle($id);

    header('Location:index.php?page=listArticle');
    exit;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}