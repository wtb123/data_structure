<?php
/**
 快速排序
 */
function QuickSort(&$r,$first,$end)
{
    if($first>$end) return;   //判断递归是否到达栈底
    $i=$first;
    $j=$end;
    $temp=$r[$first];        //每次取第一个元素作为轴值
    while($i<$j)
    {
        while(($i<$j)&&($r[$j]>=$temp))
            $j--;
        $r[$i]=$r[$j];
        while(($i<$j)&&($r[$i]<=$temp))
            $i++;
        $r[$j]=$r[$i];
    }
    $r[$i]=$temp;
    QuickSort($r,$first,$i-1);
    QuickSort($r,$i+1,$end);
}

$r=[10,9,8,7,6,5,4,3,2,1];
QuickSort($r,0,9);
var_dump($r);
?>
