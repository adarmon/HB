<?php

$article = new Article();
$result = $article->displayAll();

//ff($result);
echo "<table class='results'>\n"
 . "<thead>\n"
 . "<tr>\n"
 . "\t<th>&nbsp;</th>\n"
 . "\t<th>Title</th>\n"
 . "\t<th>&nbsp;</th>\n"
 . "</thead>\n<tbody>\n";

foreach ($result as $row) {
    echo "<tr>\n"
    . "\t<td><a class='delete' onclick=\"delRow('" . $row->id_article . "');\"><img src='img/Delete.png' alt='Delete' title='Delete' /></a></td>"
    . "\t<td dir='auto'><a href='index.php?page=readArticle&amp;id=" . $row->id_article . "'>" . html_entity_decode($row->title, ENT_NOQUOTES) . "</a></td>"
    . "\t<td><a href=\"index.php?page=article&amp;id=" . $row->id_article . "\"><img src='img/Modify.png' alt='Modify' title='Modify' /></a></td>"
    . "</tr>\n";
}
echo "</tbody>\n</table>\n";

echo "<div class='submit'><a href='index.php?page=article'>Ajouter un article</a></div>";
?>
<script language="javascript">
    function delRow(g) {
        var r = confirm("Are you sure?");
        if (r === true) {
            window.location.href = 'index.php?page=deleteArticle&id=' + g;
            return true;
        } else {
            return false;
        }
    }
</script>