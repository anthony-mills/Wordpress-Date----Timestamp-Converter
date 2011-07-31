var $j = jQuery.noConflict();

$j.getScript("jquery-ui-1.8.14.min.js");
$j.getScript("jquery-timepicker0.9.6.js");
$j.getScript("validate.js");

$j(function() {
	$j("#convertDate").validate({
		messages: {
			date_string: " Please enter a date to convert",
		}
	})

	$j("#convertTimestamp").validate({
		messages: {
			timestamp_string: " Please enter a timestamp to convert",
		}
	})

	$j("#datePicker").datetimepicker({ altFormat: 'dd-mm-yyyy' });
});


