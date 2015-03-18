<?php
/* calculer l'aire d'un cercle
  pi x r²
 */
for ($i = 1; $i < 6; $i++) {
    echo "rayon " . $i . " : l'aire vaut " . circleArea($i) . '<br />';
}