<?php
/**
 * Friendly time
 * Translates an epoch time into a human-readable time.
 * 
 * @uses string $vars['time'] Unix-style epoch timestamp
 */

$friendly_time = elgg_get_friendly_time($vars['time']);
$timestamp = htmlentities(date(elgg_echo('friendlytime:date_format'), $vars['time']));

echo "<time title=\"$timestamp\" class=\"timestamp\">$friendly_time</time>";
