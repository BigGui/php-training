<?php

/**
 * Create an HTML markup with given text content.
 *
 * @param string $content - Text to add
 * @param string $markup - Tagname, p default
 * @return string - HTML code
 */
function createMarkup(string $content, string $markup = 'p') :string
{
    return "<{$markup}>{$content}</{$markup}>";
}


function createLi(string $content) {
    return createMarkup($content, 'li');
}

