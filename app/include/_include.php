<?php

/**
 * Get from an array a HTML list string
 * @param array $array your array you want in HTML list
 * @return string the HTML list
 */
function getArrayAsHTMLList(array $array): string
{
    // $values = '';
    // foreach($array as $value){
    //     $values .= "<li>{$value}</li>";
    // }

    return '<ul>' . implode(array_map(fn ($v) => "<li>{$v}</li>", $array)) . '</ul>';
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
        fn($v) => $v / $divider,
        array_filter($array, fn($v) => is_int($v))
    );
}
