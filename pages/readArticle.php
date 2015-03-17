<?php
$article = (int)(isset($_GET['id']) && $_GET['id']!='') ? $_GET['id'] : 0;

//$sql = "SELECT * FROM `article` WHERE `id_article`=:article;";
$sql = "SELECT * FROM `article` WHERE `id_article`=$article;";

try {
	//		$sth = $db->prepare($sql);
	//		$sth->bindParam(':article', $article, PDO::PARAM_INT);
	//		$sth->execute();


	$sth = $db->query($sql);

} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage() . "<br/>";
	die();
}

if($result = $sth->fetch()) {
?>

<article dir="auto" id="<?php echo $result->id_article;?>">
<?php

echo "\t<h1>".$result->id_article.": ".$result->title."</h1>\n";
echo "\t<p>".nl2br ( $result->content )."</p>\n";

?>
</article>
<p><a href=index.php?page=listArticle>back to the list</a></p>
<?php
} else {
	echo '<p>There is no result.</p>';
}