<?php

declare(strict_types=1);

namespace App\Utils;

use Cake\View\View;

/**
 * Common utility functions for the application.
 *
 * Mainly used for static functions that are used in multiple places
 * throughout the application CakePHP 4
 */
class Utils
{
    /**
     * Return cakephp element as HTML string
     *
     * @param string $element Name of the element to render
     * @param array $params Array of params to pass to the element
     * @throws \Cake\View\Exception\MissingElementException If the element does not exist
     *
     * @return string HTML of a cakephp element
     */
    public static function getElement(string $element, array $params = array())
    {
        $view = new View();

        // Check if the element exists before trying to render it
        if (!$view->elementExists($element)) {
            throw new \Cake\View\Exception\MissingElementException('Element ' . $element . ' does not exist');
        }

        // Set the element params
        foreach ($params as $key => $value) {
            $view->set($key, $value);
        }

        return $view->element($element);
    }
}
