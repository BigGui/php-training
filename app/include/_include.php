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
