<?php
$pair = false;
$compteur = 0;

do {

    $n = rand(0, 20);

    if ($pair == false) {
        if ($n % 2 == 0) {
            echo 'pair ' . $n . '<br />';
            $pair = true;
        } else {
            continue;
        }
    } else if ($n % 2 > 0) {
        echo 'impair ' . $n . '<br />';
        $compteur++;
    } else {
        continue;
    }
} while ($compteur < 2);
