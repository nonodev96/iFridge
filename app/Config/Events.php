<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(function ($buffer) {
            return $buffer;
        });
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
    }
});
if (ENVIRONMENT !== 'development') {
    Events::on('post_controller_constructor', function () {
        /*
         while (ob_get_level() > 0) {
             ob_end_flush();
         }

         ob_start(function ($buffer) {
             $search =
                 '%              # Collapse ws everywhere but in blacklisted elements.
                 (?>             # Match all whitespans other than single space.
                   [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
                 | \s{2,}        # or two or more consecutive-any-whitespace.
                 ) # Note: The remaining regex consumes no text at all...
                 (?=             # Ensure we are not in a blacklist tag.
                   (?:           # Begin (unnecessary) group.
                     (?:         # Zero or more of...
                       [^<]++    # Either one or more non-"<"
                     | <         # or a < starting a non-blacklist tag.
                                 # Skip Script and Style Tags
                       (?!/?(?:textarea|pre|script|style)\b)
                     )*+         # (This could be "unroll-the-loop"ified.)
                   )             # End (unnecessary) group.
                   (?:           # Begin alternation group.
                     <           # Either a blacklist start tag.
                                 # Dont foget the closing tags
                     (?>textarea|pre|script|style)\b
                   | \z          # or end of file.
                   )             # End alternation group.
                 )  # If we made it here, we are not in a blacklist tag.
                 %ix';


             $buffer = preg_replace($search, " ", $buffer);
             return $buffer;
        */

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(function ($buffer) {
            $search = array(
                '/\n/',
                // replace end of line by a <del>space</del> nothing , if you want space make it down ' ' instead of ''
                '/\>[^\S ]+/s',
                // strip whitespaces after tags, except space
                '/[^\S ]+\</s',
                // strip whitespaces before tags, except space
                '/(\s)+/s',
                // shorten multiple whitespace sequences
                '/<!--(.|\s)*?-->/'
                //remove HTML comments
            );

            $replace = array(
                '',
                '>',
                '<',
                '\\1',
                ''
            );

            $buffer = preg_replace($search, $replace, $buffer);
            return $buffer;
        });
    });
}