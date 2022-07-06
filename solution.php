<?php
$hands = "👉👆👆👆👆👆👆👆👆🤜👇👈👆👆👆👆👆👆👆👆👆👉🤛👈👊👉👉👆👉👇🤜👆🤛👆👆👉👆👆👉👆👆👆🤜👉🤜👇👉👆👆👆👈👈👆👆👆👉🤛👈👈🤛👉👇👇👇👇👇👊👉👇👉👆👆👆👊👊👆👆👆👊👉👇👊👈👈👆🤜👉🤜👆👉👆🤛👉👉🤛👈👇👇👇👇👇👇👇👇👇👇👇👇👇👇👊👉👉👊👆👆👆👊👇👇👇👇👇👇👊👇👇👇👇👇👇👇👇👊👉👆👊👉👆👊";

$string = [];
$currentCell = 0;
$loop = [];
$maxNum = 255;
$increment = 1;

$hands = str_split($hands,4);
$maxNum++;

for($i=0;$i<count($hands);$i++){
    if(!isset($string[$currentCell])) $string[$currentCell] = 0;
    $hand = $hands[$i];
    switch($hand){
        case '👉':
            $currentCell++;
            if($currentCell>100) exit();
            break;
            
        case '👈':
            $currentCell--;
            break;
            
        case '👆':
            $string[$currentCell] += $increment;
            if($string[$currentCell] >= $maxNum) $string[$currentCell] = $string[$currentCell] % $maxNum;
            break;
            
        case '👇':
            $string[$currentCell] -= $increment;
            if($string[$currentCell]<0) $string[$currentCell] = $maxNum + $string[$currentCell] % $maxNum;
            break;
            
        case '🤜':
            if($string[$currentCell]!=0) $loop[] = $i;
            else{
                $loops = 1;
                do{
                    $i++;
                    if($hands[$i]=='🤜') $loops++;
                    elseif($hands[$i]=='🤛') $loops--;
                }while($loops>0);
            }
            break;
        
        case '🤛':
            if($string[$currentCell]!=0) $i = end($loop);
            else array_pop($loop);
            break;

        case '👊':
            echo chr($string[$currentCell]);
            break;
    }
}
