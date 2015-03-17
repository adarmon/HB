<?php
$article = (int)(isset($_GET['id']) && $_GET['id']!='') ? $_GET['id'] : 0;

	try {
		$sql = "DELETE FROM `article` WHERE `id_article`=:article;";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':article', $article, PDO::PARAM_INT);  
		if($stmt->execute()) {
			addMessage(0, 'valid', "Article deleted");
		} else {
			addMessage(1, 'error', "Article not deleted");
		}	
		
		header('Location:index.php?page=listArticle');
		exit;

	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}