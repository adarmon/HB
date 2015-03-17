<?php
$n=0;
$msg = array();

// on affiche le post du formulaire
addMessage($n++,'info', "<h1>Bonjour ". $_POST['civil'] ." ". ucfirst($_POST['prenom']) ." ". strtoupper($_POST['nom']) ."</h1>");

$postData = "<ul>";
foreach ($_POST as $sticker => $data) {
	switch($sticker) {
		case "civil":
		case "nom":
		case "prenom":
		break;

		default:
		$postData .= "<li>". $sticker ." : ". $data ."</li>";
		break;
	}
}
$postData .= "</ul>";
addMessage($n++,'warning', $postData);

// upload de la photo
$photodir = ROOTDIR."/photos/";
if(!is_dir($photodir)) {
	mkdir($photodir,0777);
}

// on vérifie que la photo existe
if(isset($_FILES["photo"]) && !empty($_FILES)) {

	// l'upload est correct
	if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {

		// extensions autorisées
		$allowed = array('gif', 'jpg', 'png');
		$tmp_name = $_FILES["photo"]["tmp_name"];
		$name = $_FILES["photo"]["name"];
		$filedir = $photodir.$name;
		$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

		// si extension correcte
		if(!in_array($ext, $allowed)) {
			addMessage($n++,'error', 'Erreur ! Extension non autorisée.');
		} else {
			$upload = move_uploaded_file($tmp_name, $filedir);
			if ($upload) addMessage($n++,'info',"Transfert réussi !");

			addMessage($n++,'info',"<p><img src='photos/".$name."' alt='image' /></p>");

		}

		// si code erreur pour upload
	} else {

		switch($_FILES["photo"]["error"]) {
			case 0:
			$type = 'info';
			$warning = "Valeur : 0. Aucune erreur, le téléchargement est correct.";
			break;
			
			case 1:
			$type = 'error';
			$warning = "Valeur : 1. La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.";
			break;
			
			case 2:
			$type = 'error';
			$warning = "Valeur : 2. La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.";
			break;
			
			case 3:
			$type = 'error';
			$warning = "Valeur : 3. Le fichier n'a été que partiellement téléchargé.";
			break;
			
			case 4:
			$type = 'warning';
			$warning = "Valeur : 4. Aucun fichier n'a été téléchargé.";
			break;
			
			case 6:
			$type = 'error';
			$warning = "Valeur : 6. Un dossier temporaire est manquant.";
			break;
			
			case 7:
			$type = 'error';
			$warning = "Valeur : 7. Échec de l'écriture du fichier sur le disque.";
			break;
			
			case 8:
			$type = 'error';
			$warning = "Valeur : 8. Une extension PHP a arrêté l'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L'examen du phpinfo() peut aider.";
			break;

		}
		addMessage($n++,$type,$warning);
	}

	//pas d'image
} else {
	addMessage($n++,'warning',"no image");
}


// redirection de niveau 2
header('Location:index.php?page=form&level=2');
exit;