<?php
/*
Plugin Name: Date / Timestamp converter
Plugin URI: http://www.development-cycle.com
Description: Small, simple plugin allowing the conversion of a unix timestamp to a date and vice versa. 
Version: 0.1
Author: Anthony Mills
Author URI: http://www.development-cycle.com
License: GPL2
*/

function timeStampConverter()
{
	$date = '';
	$timestamp = '';
	$formData = file_get_contents(WP_PLUGIN_DIR . '/DateTimestamp/html/timeStampConverter.phtml');
	if (!empty($_POST)) {
		if (!empty($_POST['timestamp_string'])) {
			$date = 'The date is ' . date('l jS \of F Y h:i:s A', $_POST['timestamp_string']);
		} elseif (!empty($_POST['date_string'])) {
			$dateParts = explode(' ', $_POST['date_string']);
			$yearParts = explode('/', $dateParts[0]);
			$timeParts = explode(':', $dateParts[1]);
			$timestamp = mktime($timeParts[0], $timeParts[1], 0, $yearParts[0], $yearParts[1], $yearParts[2]);			
			$timestamp = 'The timestamp is ' . $timestamp;
		}
	}
	$formData = str_replace('{%date%}', $date , $formData);	
	$formData = str_replace('{%timestamp%}', $timestamp , $formData);

	echo $formData;

}

function timeStampConverterHead()
{
	$formHead = file_get_contents(WP_PLUGIN_DIR . '/DateTimestamp/html/formHeader.phtml');
	$formHead = str_replace('%pluginUrl%', WP_PLUGIN_URL, $formHead);
	echo $formHead;
}

add_action('wp_head', 'timeStampConverterHead');

add_shortcode('timestamp-converter', 'timeStampConverter');
