<?php
$array = array(
    array(
        array(4,9),
        array(2,4),
        array(
          array(6, 9),
          array(1, 9),
           array(
          array(2, 6)
        ),
        ),
    ),
    array(
        array(4, 7),
        array(5, 4),
    ),
);

// print_r($array);

function array_depth(array $array) {
$max_depth = 1;

foreach ($array as $value) {
if (is_array($value)) {
$depth = array_depth($value) + 1;

if ($depth > $max_depth) {
$max_depth = $depth;
}
}
}
return $max_depth;
}

print_r(array_depth($array));
?>