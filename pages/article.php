<?php
$i = 0;

$level = (isset($_POST['level']) && $_POST['level'] != '') ? $_POST['level'] : 0;
$article = (int) (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : 0;

$title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : "";
$content = (isset($_POST['content']) && $_POST['content'] != '') ? $_POST['content'] : "";

// verify for update
if (isset($level) && $level > 0) {
    if ($level == 2) {

        $sql = "UPDATE `article` SET `title`=:title, `content`=:content WHERE `id_article`=" . $article . ";";
        $msg = 'Article modified';
        $errormsg = "Error ! The article n'a pas été modifié.<br/>";

        // check for insert
    } elseif ($level == 1) {

        $sql = "INSERT INTO `article`(`title`, `content`) VALUES (:title, :content);";
        $msg = 'Article added';
        $errormsg = "Error ! The article has not been added.<br/>";
    }

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

    // edit first
} else {

    try {
        $sql = "SELECT * FROM `article` WHERE `id_article`=$article;";
        $sth = $db->query($sql);
    } catch (PDOException $e) {
        addMessage($i++, 'error', "Erreur !: " . $e->getMessage() . "<br/>");
    }

    // we have results
    if ($result = $sth->fetch()) {
        $id_article = $result->id_article;
        $title = $result->title;
        $content = nl2br($result->content);
        $level = 2;

        // it's an insert
    } else {
        $id_article = $article;
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