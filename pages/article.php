<?php
$i = 0;

$level = (isset($_POST['level']) && $_POST['level'] != '') ? $_POST['level'] : 0;
$id = (int) (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : 0;

$title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : "";
$content = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : "";

$article = new Article();

// verify for update
if (isset($level) && $level > 0) {
    if ($level == 2) {

        $msg = 'Article modified';
        $errormsg = "Error ! The article n'a pas été modifié.<br/>";
        $result = $article->updateArticle($id, $title, $content, $msg, $errormsg);

        // check for insert
    } elseif ($level == 1) {

        $msg = 'Article added';
        $errormsg = "Error ! The article has not been added.<br/>";
        $result = $article->addArticle($title, $content, $msg, $errormsg);
    }

    // edit first
} else {

    //$result ;
    // we have results
    if (isset($id) && $id > 0) {
        $result = $article->displayArticle($id);
        $id_article = $result->id_article;
        $title = $result->title;
        $content = nl2br($result->content);
        $level = 2;

        // it's an insert
    } else {
        $id_article = $id;
        $title = "";
        $content = "";
        $level = 1;
    }
    ?>
    <form method="post" name="form1" action="index.php?page=article&id=<?php echo $id_article; ?>" novalidate="novalidate">
        <?php if ($id_article > 0) { ?>
            <div>
                <label for="id_article">ID</label>
                <input type="text" name="id_article" id="id_article" readonly="readonly" value="<?php echo $id_article; ?>" />
            </div>
        <?php } ?>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Entrez le titre" value="<?php echo $title; ?>" size="100" />
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="70" rows="10"><?php echo $content; ?></textarea>
        </div>
        <input type="hidden" name="level" value="<?php echo $level; ?>" />

        <div class="submit"><input type="submit" /></div>
    </form>

    <?php
}