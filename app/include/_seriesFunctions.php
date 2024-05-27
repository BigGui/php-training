<?php

// --------------
// SERIES
// --------------

/**
 * get the platform from the series data.
 *
 * @param array $seriesData the array entry
 * @return array the list of platform
 */
function getPlatformsFromSeries(array $seriesData): array
{
    $platforms = [];

    foreach ($seriesData as $show) {
        $platforms[] = $show["availableOn"];
    }

    $platforms = excludeDuplicates($platforms);
    sort($platforms);

    return $platforms;
}


/**
 * Generate and return HTML code to display the show with the details in parameter.
 *
 * @param array $show An array containing show details
 * @param bool $full Display all show details if true, default false
 * @return string HTML code to display the show
 */
function generateShow(array $show, bool $full = false): string
{
    if ($full) {
        return '<h3 class="series__ttl">' . $show['name'] . '</h3>'
            . '<img class="series__img" src="' . $show['image'] . '" alt="' . $show['name'] . '">'
            . '<h4>Acteurs</h4>'
            . getArrayAsHTMLList($show['actors']);
    }
    return '<a href="exo5.php?serie=' . $show['id'] . '#question4">'
        . '<h3 class="series__ttl">' . $show['name'] . '</h3>'
        . '<img class="series__img" src="' . $show['image'] . '" alt="' . $show['name'] . '">'
        . '</a>';
}


/**
 * Generate and return HTML code to display a series list.
 *
 * @param array $series An array that provides a list of series with all their details
 * @return string HTML code to display the list of series
 */
function generateSeries(array $series): string
{
    return getArrayAsHTMLList(
        array_map("generateShow", $series),
        'series',
        'series__itm'
    );
}

/**
 * Get show informations from its ID.
 *
 * @param array $dataSeries The array containing series data.
 * @param integer $id Show's ID you want the information of.
 * @return array|null Show informations or null if no ID found.
 */
function getShowInformationsFromId(array $dataSeries, int $id): ?array
{
    // foreach ($dataSeries as $show) {
    //     if ($show['id'] === $id) {
    //         return $show;
    //     }
    // }
    // return null;

    $result = array_filter($dataSeries, fn ($s) => $s['id'] === $id);

    if (count($result) !== 1) return null;

    return current($result);
}
