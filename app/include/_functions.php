<?php

/**
 * Get from an array a HTML list string
 * @param array $array your array you want in HTML list
 * @param string $ulClass an optional CSS class to add to UL element
 * @param string $liClass an optional CSS class to add to LI elements
 * @return string the HTML list
 */
function getArrayAsHTMLList(array $array, string $ulClass = '', string $liClass = ''): string
{
    // $values = '';
    // foreach($array as $value){
    //     $values .= "<li>{$value}</li>";
    // }

    return '<ul class="' . $ulClass . '">' . implode(array_map(fn ($v) => '<li class="' . $liClass . '">' . $v . '</li>', $array)) . '</ul>';
}

/**
 * Get even values from an array.
 *
 * @param array $intArray The array you want the even values from.
 * @return array A new array only containing even values.
 */
function getEvenValues(array $intArray): array
{
    // foreach ($intArray as $value) {
    //     if (is_int($value) && $value % 2 === 0) {
    //         $intList[] = $value;
    //     }
    // }
    // return $intList;

    return array_filter($intArray, fn ($v) => is_int($v) && $v % 2 === 0);
}

/**
 * Get values with even index from array
 *
 * @param array $array The array you want the values from.
 * @return array A new array only containing even index.
 */
function getValueEvenIndex(array $array): array
{
    // $valuesInt = [];
    // foreach ($array as $key => $value) {
    //     if(is_int($key) && $key % 2 === 0 && is_int($value)) {
    //         $valuesInt[$key] = $value;
    //     }
    // }
    // return $valuesInt;
    return array_filter(
        $array,
        fn ($v, $k) => is_int($k) && $k % 2 === 0 && is_int($v),
        ARRAY_FILTER_USE_BOTH
    );
}

/**
 * Get array values and multiply by 2
 *
 * @param array $array the array you want to double values from
 * @return array new array with doubled values
 */
function doubleArrayValues(array $array): array
{
    $arrayResult = [];
    foreach ($array as $value) {
        if (is_int($value)) {
            $arrayResult[] = $value * 2;
        }
    }
    return $arrayResult;
}

/**
 * Get array values and divide by divider
 *
 * @param array $array the array you want to divide values from
 * @param int $divider the divider
 * @return array new array with divided values
 */
function divideArrayValues(array $array, int $divider = 2): array
{
    // $arrayResult = [];
    // foreach ($array as $value) {
    //     if (is_int($value)) {
    //         $arrayResult[] = $value / $divider;
    //     }
    // }
    // return $arrayResult;

    return array_map(
        fn ($v) => $v / $divider,
        array_filter($array, fn ($v) => is_int($v))
    );
}

/**
 * Excludes duplicates of an array
 *
 * @param array $array - array of integers or strings
 * @return array - array without duplicates
 */
function excludeDuplicates(array $array): array
{
    // return array_unique($array, SORT_REGULAR);
    $result = [];
    foreach ($array as $key => $value) {
        if (!in_array($value, $result)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

/**
 * get intersection between two arrays.
 * @param array $array an array.
 * @param array $arrayA an array.
 * @return array the intersection array.
 */
function getIntersection(array $array, array $arrayA): array
{
    // return array_intersect($array, $arrayA);
    $result = [];
    foreach ($array as $key => $value) {
        if (in_array($value, $arrayA)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

/**
 * Get values from the first array different from second array
 *
 * @param array $array1 the array you want the values from
 * @param array $array2 the array to compare
 * @param boolean $unique - if true, removes duplicates
 * @return array Array containing first array values that are different from the second one.
 */
function getArrayDiff(array $array1, array $array2, bool $unique = false): array
{
    // return array_diff($array1, $array2);

    $newArray = array_filter($array1, fn ($v) => !in_array($v, $array2));

    if ($unique) return excludeDuplicates($newArray);

    return $newArray;
}


/**
 * Get the first $nb values from the given array.
 *
 * @param array $array the array
 * @param integer $nb the number of values to extract
 * @return array an array with $nb values. Or the given array if $nb is bigger than the array length. 
 */
function getFirstElements(array $array, int $nb): array
{
    // return array_slice($array, 0, $nb, true);

    $newArray = [];
    // foreach ($array as $key => $value) {
    //     if (count($newArray) >= $nb) break;

    //     $newArray[$key] = $value;
    // }

    while (count($newArray) < $nb && count($array) > 0) {
        $newArray[] = array_shift($array);
    }

    return $newArray;
}