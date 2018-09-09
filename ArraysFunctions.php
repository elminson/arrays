<?php

class ArraysFunctions
{
// How to find largest and smallest number in unsorted array? (solution)
// You have given an unsorted integer array and you need to find the largest and smallest element in the array.
// Of course, you can sort the array and then pick the top and bottom
// element but that would cost you O(NLogN) because of sorting, getting element in array with index is O(1) operation.

    public function foundmaxmin($array = [])
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

    //How to find all pairs on integer array whose sum is equal to given number?
    public function findAllPairsIntegerSum($array, $x)
    {
        $size = count($array);
        $array_flip = array_flip($array);
        $result = [];
        for ($i = 0; $i <= $size - 1; $i++) {
            $diff = $x - $array[$i];
            if (isset($array_flip[$diff])) {
                unset($array_flip[$diff]);
                $result[] = "$diff, $array[$i]";
            }
        }
        return $result;
    }

    //without array flip
    public function findAllPairsIntegerSumv2($array, $x)
    {

        $size = count($array);
        if ($size < 2) {
            return [];
        }
        $left = 0;
        $right = $size - 1;
        $result = [];
        while ($left <= $right) {
            $sum = $array[$left] + $array[$right];
            if ($sum == $x) {
                $result[] = "$array[$left], $array[$right]";
                $left++;
                $right--;
            }
            if ($sum < $x) {
                $left++;
            }
            if ($sum > $x) {
                $right--;
            }
        }

        return $result;
    }

    //Write a program to remove duplicates from array
    public function removeRepeatedNumbers($array)
    {
        $size = count($array);
        $result = [];//array_flip($array);

        for ($i = 0; $i < $size; $i++) {
            $result [$array[$i]] = 1;
        }

        return array_keys($result);
    }

    //How to sort an array in place using QuickSort algorithm
    public function quickSort($array)
    {
        $size = count($array);

        if ($size <= 1) {
            return $array;
        }
        $pivot = $array[0];
        $right_array = [];
        $left_array = [];
        for ($i = 0; $i < $size; $i++) {

            if ($array[$i] < $pivot) {
                $left_array[] = $array[$i];
            }
            if ($array[$i] > $pivot) {
                $right_array[] = $array[$i];
            }
        }
        return array_merge($this->quickSort($left_array), [$pivot], $this->quickSort($right_array));
    }

    //Write a program to find intersection of two sorted arrays in Java? (solution)
    public function intersection($array_one, $array_two)
    {
        $n = count($array_one);
        $m = count($array_two);
        $i = 0;
        $j = 0;
        $intersect = [];
        while ($i < $n && $j < $m) {

            if ($array_one[$i] < $array_two[$j]) {
                $i++;
            } else {
                if ($array_two[$j] < $array_one[$i]) {
                    $j++;
                } else {
                    $intersect[] = $array_one[$i];
                    $i++;
                    $j++;
                }
            }
        }

        return $intersect;
    }

    // There is an array with every element repeated twice except one. Find that element?
    public function finduniqueelement($array)
    {
        $size = count($array);
        $index = 0;
        $result = [];
        while ($index < $size) {
            if ($index % 2 == 0) {
                if ($array[$index] != $array[$index + 1]) {
                    $temp = array_slice($array, 0, $index);
                    $temp[] = $array[$index];
                    $array = array_merge($temp, array_slice($array, $index, $size));
                    $result[] = $array[$index + 1];
                }
            }
            $index++;
        }
        $size = count($array);
        if ($size % 2 !== 0) {
            $result[] = $array[$size-1];
        }
        return $result;
    }
}

$array_one = [1, 2, 4, 5, 6];
$array_two = [2, 3, 5, 7];
$array = [1, 1, 2, 2, 3, 4, 4, 5, 5, 6, 7, 7,8];
$instance = new ArraysFunctions();
print_r($instance->finduniqueelement($array));
