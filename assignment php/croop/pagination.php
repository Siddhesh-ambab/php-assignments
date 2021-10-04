<?php

$count = $obj -> pagination($limit);
echo "<ul class='pagination'>";
    if($page > 1)
    {
        $pre = $page-1;
        echo "<li class='page-item'><button class='page-link' onclick='gotopage($pre)'>pre</button></li>";
    }

    for($i = 1; $i <= $count ; $i++) {

        if($i == $page){
            $class = "active";
            }else{
            $class = "";
            }

        echo "
        <li class='page-item $class'><button class='page-link' onclick='gotopage($i)'>$i</button></li>
        ";
    }

    if($page < $count)
    {
        $pre = $page+1;
        echo "<li class='page-item'><button class='page-link' onclick='gotopage($pre)'>next</button></li>";
    }

echo "</ul>";
?>




