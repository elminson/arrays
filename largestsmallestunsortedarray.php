<?php
// How to find largest and smallest number in unsorted array? (solution)
// You have given an unsorted integer array and you need to find the largest and smallest element in the array. 
// Of course, you can sort the array and then pick the top and bottom 
// element but that would cost you O(NLogN) because of sorting, getting element in array with index is O(1) operation.

class ArraysFunctions
{
    function foundmaxmin($array = [])
    {
        if (count($array) == 0) {
            return [];
        }
        $min = $array[0];
        $max = $array[0];
        $size = count($array);
        for ($i = 1; $i <= $size - 1; $i++) {
            if ($min > $array[$i]) {
                $min = $array[$i];
            }
            if ($max < $array[$i]) {
                $max = $array[$i];
            }
        }
        return [$min, $max];
    }
}

$instance = new ArraysFunctions();
print_r($instance->foundmaxmin($array));
