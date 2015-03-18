<?php
$membre1 = array('genre' => 'M', 'prénom' => "Axel");
$membre2 = array('genre' => 'M', 'prénom' => "Benjamin");
$membre3 = array('genre' => 'M', 'prénom' => "Christian");
$membre4 = array('genre' => 'F', 'prénom' => "Isabelle");
$membre5 = array('genre' => 'M', 'prénom' => "Jean Chris");
$membre6 = array('genre' => 'F', 'prénom' => "Jun");
$membre7 = array('genre' => 'M', 'prénom' => "Jérôme");
$membre8 = array('genre' => 'M', 'prénom' => "Khalid");
$membre9 = array('genre' => 'M', 'prénom' => "Lorrain");
$membre10 = array('genre' => 'M', 'prénom' => "Marc");
$membre11 = array('genre' => 'M', 'prénom' => "Patrick");
$membre12 = array('genre' => 'M', 'prénom' => "Vincent");
$membre13 = array('genre' => 'M', 'prénom' => "Xavier");

$tab = array($membre1, $membre2, $membre3, $membre4, $membre5, $membre6, $membre7, $membre8, $membre9, $membre10, $membre11, $membre12, $membre13);
?>
<p>Ze m'appelle <?php echo $tab[0]['prénom']; ?></p>
<p>Les pairs sont :
<ul>
    <?php
    foreach ($tab as $k => $v) {
        if ($k % 2 != 0)
            echo '<li>' . $v['prénom'] . '</li>';
    }
    ?>
</ul>
</p>
<p>Les filles sont :
<ul>
    <?php
    foreach ($tab as $k => $v) {
        if ($v['genre'] == 'F')
            echo '<li>' . $v['prénom'] . '</li>';
    }
    ?>
</ul>
</p>
<p>Tous les membres sont :
<ul>
    <?php
    for ($i = 0; $i < count($tab); $i++) {
        echo '<li>' . $tab[$i]['prénom'] . '</li>';
    }
    ?>
</ul>
</p>
