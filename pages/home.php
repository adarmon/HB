<?php
$lang = (isset( $_POST['s1']) && $_POST['s1']!='') ? $_POST['s1'] : 'fr';
?>
<form name="flang" method="post" action="index.php">
	<select name="s1" id="s1" onchange="document.flang.submit();">
		<option id="">choisir</option>
		<option id="o1" value="en" class="en" <?php if(isset($lang) &&  $lang=="en") echo 'selected="selected"';?>>EN</option>
		<option id="02" value="fr" class="fr" <?php if(isset($lang) &&  $lang=="fr") echo 'selected="selected"';?>>FR</option>
		<option id="02" value="il" class="il" <?php if(isset($lang) &&  $lang=="il") echo 'selected="selected"';?>>HE</option>
	</select>
</form>

<img src="img/tux.png" alt="tux surfeur" class="homeimg<?php if(isset( $_POST['s1']) &&  $_POST['s1']=="il") echo 'rtl';?>" />
<?php
switch($lang) {

	case 'en':
	?>
	<h1><?php echo "ouelcome tou maï oueb";?></h1>
	<p class="home">Huic Arabia est conserta, ex alio <em>latere Nabataeis contigua</em>; opima <strong>varietate conmerciorum</strong> castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae <mark>inposito nomine rectoreque</mark> adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.</p>
	<?php break;

	case 'il':
	?>
	<h1 class="he"><?php echo "ברוכים הבאים";?></h1>
	<p class="home he">נבחרים שיתופית גם חפש, מתן אל כלליים אנתרופולוגיה. שפות לתרום בהשחתה מה אחר. אתה אל מרצועת בלשנות. ארץ את ניווט וכמקובל, מיזמי ניווט היא של. ויקי מיזם חבריכם אם כתב.

		זאת בה ערבית המלחמה, שמו לערך פיסיקה יוצרים של, ניהול הנדסת את בקר. חפש מה מוגש תיקונים תיאטרון, אחד אקראי המלחמה אווירונאוטיקה דת. כתב לראות עקרונות ופיתוחה על, את אחר שפות ספורט. לשון לרפובליקה ב אתה, דת בדף המשפט תקשורת. של כתב והוא קודמות מדויקים.
	.</p>
	<?php break;

	default:
	?>
	<h1><?php echo "Bienvenue sur ma page";?></h1>
	<p class="home">Huic Arabia est conserta, ex alio <em>latere Nabataeis contigua</em>; opima <strong>varietate conmerciorum</strong> castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae <mark>inposito nomine rectoreque</mark> adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.</p>
	<?php break;

}
