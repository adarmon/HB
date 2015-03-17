<?php
// on vérifie si on est au premier passage ou pas
if(isset($_GET['level']) && $_GET['level']==2) {

	// on vérifie la session
	if(isset($_SESSION['msg']) && (!empty($_SESSION['msg']))) {
		foreach($_SESSION['msg'] as $msg){
			echo "<div class='".$msg['type']."'>".$msg['code']." ".$msg['label'] ."</div>";
		}
		unset($_SESSION['msg']);
		// sinon on purge les messages de la session
	}

	// on affiche alors le formulaire
	
} else {
	if(isset($_SESSION['msg']) && (!empty($_SESSION['msg']))) {
		unset($_SESSION['msg']);
	}

?>
<form method="post" name="form1" action="index.php?page=register" novalidate="novalidate" enctype="multipart/form-data">

	<fieldset class="globe">
		<legend>État civil</legend>
		<div>
			<label for="civil">Civilité*</label>
			<label class="inner" for="civilM">M.</label><input type="radio" name="civil" id="civilM" value="M" required/>
			<label class="inner" for="civilMme">M<sup>me</sup></label><input type="radio" name="civil" id="civilMme" value="Mme" required/>
			<label class="inner" for="civilMlle">M<sup>lle</sup></label><input type="radio" name="civil" id="civilMlle" value="Mlle" required/>
		</div>
		<div>
			<label for="nom">Nom*</label>
			<input type="text" name="nom" id="nom" required placeholder="Entrez votre nom" size="50" pattern="/^[\w\s'"\-_&@!?()\[\]-]*$/u" />
		</div>
		<div>
			<label for="prenom">Prénom*</label>
			<input type="text" name="prenom" id="prenom" required placeholder="Entrez votre prénom" size="50" pattern="/^[\w\s'"\-_&@!?()\[\]-]*$/u" />
		</div>
		<div>
			<label for="courriel">Courriel*</label>
			<input type="email" name="courriel" id="courriel" placeholder="Entrez votre courriel" required onchange="form1.courriel2.pattern=this.value" size="50" />
		</div>
		<div><label for="courriel2">Courriel (retaper)*</label>
			<input type="email" name="courriel2" id="courriel2" placeholder="Répétez votre courriel" required size="50" />
		</div>
		<div>
			<label for="pwd">Mot de passe*</label>
			<input type="password" name="pwd" id="pwd" required placeholder="Entrez un mot de passe" onchange="form1.pwd2.pattern=this.value" size="50" />
		</div>
		<div>
			<label for="pwd2">Mot de passe (retaper)*</label>
			<input type="password" name="pwd2" id="pwd2" required placeholder="Répétez votre mot de passe" size="50" />
		</div>
		<div>
			<label for="date">Date de naissance*</label>
			<input type="date" name="date" id="date" placeholder="JJ-MM-AAAA" required/>
		</div>
	</fieldset>
	<fieldset class="globe">
		<legend>Données facultatives</legend>
		<div>
			<label for="photo">Photo</label>
			<input type="file" name="photo" id="photo" />
		</div>
		<div>
			<label for="phone">Téléphone</label>
			<input type="tel" name="phone" id="phone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Entrez votre téléphone" />
		</div>
		<div>
			<label for="url">Adresse du site</label>
			<input type="url" name="url" id="url"  placeholder="Entrez votre URL" title="N'oubliez pas le http://" />
		</div>
		<div>
			<label for="present">Présentation</label>
			<textarea name="present" id="present" cols="40"></textarea>
		</div>
		<div>
			<label for="newsletter">Abonnement à la newsletter</label>
			<input type="checkbox" name="newsletter" id="newsletter" value="1" />
		</div>
		<div>
			<label for="s1">Langue</label>
			<select name="s1" id="s1">
				<option id="o1" class="en">anglais</option>
				<option id="02" class="fr" selected="selected">français</option>
			</select>
		</div>
	</fieldset>

	<div class="submit"><input type="submit" /></div>
</form>
<?php }