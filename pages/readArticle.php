<?php
$id = (int) (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : 0;

$article = new ArticleRepository($db);
$result = $article->displayArticle($id);


if ($result) {
    ?>

    <article dir="auto" id="<?php echo $result->id_article; ?>">
        <?php
        echo "\t<h1>" . $result->id_article . ": " . $result->title . "</h1>\n";
        echo "\t<p>" . nl2br($result->content) . "</p>\n";
        ?>
    </article>
    <p><a href=index.php?page=listArticle>back to the list</a></p>
    <?php
} else {
    echo '<p>There is no result.</p>';
}