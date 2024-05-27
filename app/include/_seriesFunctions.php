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
        return '<div class="show">'
            . '<h3 class="show__ttl">' . $show['name'] . '</h3>'
            . '<img class="show__img" src="' . $show['image'] . '" alt="' . $show['name'] . '">'
            . '<div class="show__details">'
            . '<p>' . $show['country'] . ', ' . $show['launchYear'] . '</p>'
            . '<p>Disponible sur ' . $show['availableOn'] . '</p>'
            . '<p>Composée de ' . $show['numberOfEpisods'] . ' épisodes de ' . $show['episodeDurationInMinutes'] . ' minutes en ' . $show['numberOfSeasons'] . ' saisons.</p>'
            . '<p>' . ($show['ongoing'] ? 'Toujours en cours.' : 'Série terminée') . '</p>'
            . '<h4 class="show__sub-ttl">Styles</h4>'
            . getArrayAsHTMLList($show['styles'])
            . '<h4 class="show__sub-ttl">Acteurs</h4>'
            . getArrayAsHTMLList($show['actors'])
            . '<h4 class="show__sub-ttl">Equipe de création</h4>'
            . getArrayAsHTMLList($show['createdBy'])
            . '</div>'
            . '</div>';
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

/**
 * Get HTML code to display the show matching the id in the URL for the parameter 'serie'.
 *
 * @param array $series The array with all series data
 * @return string
 */
function generateSelectedShow(array $series): string
{
    // Is there a selected show?
    if (!isset($_GET['serie'])) {
        return '<p class="warning">Aucune série sélectionnée.</p>';
    }

    // Get show informations from the selected id in the URL
    $seriesData = getShowInformationsFromId($series, $_GET['serie']);

    // There is no match
    if (is_null($seriesData)) {
        return '<p class="error">La série sélectionnée n\'existe pas.</p>';
    }

    // Return HTML code to display the selected show.
    return  generateShow($seriesData, true);
}

/**
 * Get the list of all styles and count them in the given array
 * [
 *    "style" => 6,
 *    "style" => 2,
 *    "style" => 3
 * ]
 * @param array $series The array with all series data
 * @return array All the styles in alphabetic order
 */
function countStyles(array $series): array
{
    // $styles = [];
    // foreach ($series as $show) {
    //     //array_push($styles, ...$show['styles'] );
    //     $styles = array_merge($styles, $show['styles']);
    // }
    $styles = array_merge(...array_column($series, 'styles'));
    // $styles = excludeDuplicates($styles);
    $styles = array_count_values($styles);
    ksort($styles);
    return $styles;
}


/**
 * Get style label to display
 *
 * @param string $style Style name
 * @param integer $nb Number of series
 * @return string label to display the style
 */
function generateStyleLabel(string $style, int $nb): string {
    return "{$style} ({$nb})";
}


/**
 * Generate HTML code to display styles list from given series. 
 *
 * @param array $series The array with all series data.
 * @return string HTML code to display styles list.
 */
function generateStylesList(array $series): string {
    
    $styles = countStyles($series);

    // $newArray = [];
    // foreach ($styles as $style => $nb) {
    //     $newArray[] = "{$style} ({$nb})";
    // }

    $newArray = array_map("generateStyleLabel", array_keys($styles), array_values($styles));

    return getArrayAsHTMLList($newArray);
}