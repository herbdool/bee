#!/usr/bin/env php
<?php
/**
 * @file
 * A command line utility for Backdrop CMS.
 */

// Set custom error handler.
set_error_handler('b_error_handler');

// Include files.
require_once __DIR__ . '/includes/miscellaneous.inc';
require_once __DIR__ . '/includes/command.inc';
require_once __DIR__ . '/includes/render.inc';
require_once __DIR__ . '/includes/filesystem.inc';
require_once __DIR__ . '/includes/input.inc';
require_once __DIR__ . '/includes/globals.inc';

// Main execution code.
b_initialize_server();
b_parse_input();
b_initialize_console();
b_process_command();
b_print_messages();
b_display_output();
exit();

/**
 * Custom error handler for `b`.
 *
 * @param int $errno
 *   The level of the error.
 * @param string $message
 *   Error message to output to the user.
 * @param string $filename
 *   The file that the error came from.
 * @param int $line
 *   The line number the error came from.
 * @param array $context
 *   An array of all variables from where the error was triggered.
 *
 * @see https://www.php.net/manual/en/function.set-error-handler.php
 */
function b_error_handler($errno, $message, $filename, $line, $context) {
  if (error_reporting() > 0) {
    echo "$message\n";
    echo " $filename:$line\n\n";
  }
}
