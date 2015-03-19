<?php
session_start();

$page = '';
$script = '';
$title = "ouelcome tou maï oueb";
$showPage = true;
$logo = "<img src=\"img/tux.png\" alt=\"tux surfeur\" class=\"homeimg\" width=\"150\" />";

// functions
include('includes/functions.php');

$getpage = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 'home';

switch ($getpage) {
    // test
    case 'test':
        $page = 'test.php';
        $title = "Test";
        break;

    // form
    case 'form':
        $page = 'form.php';
        $script = '<script>
	$(function() {
	$( "#date" ).datepicker();
	});
	</script>';
        $title = "Formulaire d'inscription";
        break;

    // register form
    case 'register':
        $page = 'register.php';
        $title = "S'enregistrer";
        $showPage = false;
        break;

    // exercice6
    case 'exercice6':
        $page = 'exercice6.php';
        $title = "Exercice 6";
        break;

    // area of a circle
    case 'areaCircle':
        $page = 'areaCircle.php';
        $title = "Calculer l'aire d'un cercle";
        break;

    // read article
    case 'readArticle':
        $page = 'readArticle.php';
        $title = "Read an article";
        break;

    // list article
    case 'listArticle':
        $page = 'listArticle.php';
        $title = "List of Articles";
        break;

    // update article
    case 'article':
        $page = 'article.php';
        $title = "Edit an Article";
        break;

    // delete article
    case 'deleteArticle':
        $page = 'deleteArticle.php';
        $title = "Delete an Article";
        $showPage = false;
        break;

    // home page
    case 'home':
    default:
        $page = 'home.php';
        $logo = '';
        break;
}

// need header
if ($showPage == true) {
    // header top
    include('includes/headerTop.php');

    // header bottom
    include('includes/headerBottom.php');

    // on vérifie la session
    if (isset($_SESSION['msg']) && (!empty($_SESSION['msg']))) {
        foreach ($_SESSION['msg'] as $msg) {
            echo "<div class='" . $msg['type'] . "'>" . $msg['label'] . "</div>";
        }
        unset($_SESSION['msg']);
    }

    // core
    include('pages/' . $page);

    // footer
    include('includes/footer.php');

    // scripts
    echo $script;

    // no header needed
} else {
    // core
    include('pages/' . $page);

    // scripts
    echo $script;
}

