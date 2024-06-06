<?php

namespace App\Services;

class ClassPrefixService
{
    /**
     * Add a prefix to all class names in an HTML string.
     *
     * @param $html
     * @param $prefix
     * @return array|string|null
     */
    public static function addPrefixToClassNames($html, $prefix): array|string|null
    {
        // Use a regular expression to find class attributes
        $pattern = '/class\s*=\s*["\']([^"\']*)["\']/i';

        // Define the callback function to add the prefix
        $callback = function ($matches) use ($prefix) {
            // Split the class names into an array
            $classes = explode(' ', $matches[1]);
            // Add the prefix to each class name, handling special cases
            $prefixedClasses = array_map(function ($class) use ($prefix) {
                // Check for special cases with '!', ':' or '[]'
                if (preg_match('/^(!|\[.*?\]:|.*?:)!?/', $class, $specialMatch)) {
                    $special = $specialMatch[1];
                    // Remove the special part and prefix the rest
                    $class = substr($class, strlen($special));
                    return $special . $prefix . $class;
                } else {
                    // Prefix the class normally
                    return $prefix . $class;
                }
            }, $classes);
            // Join the class names back into a string
            $newClassString = implode(' ', $prefixedClasses);
            // Return the modified class attribute
            return 'class="' . $newClassString . '"';
        };

        // Perform the replacement
        return preg_replace_callback($pattern, $callback, $html);
    }
}
