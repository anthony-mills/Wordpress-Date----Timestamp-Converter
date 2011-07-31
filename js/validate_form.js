$().ready(function() {
	$("#convertDate").validate({
		messages: {
			date_string: " Please enter a date to convert",
		}
	})

	$("#convertTimestamp").validate({
		messages: {
			timestamp_string: " Please enter a timestamp to convert",
		}
	})

	$("#datePicker").datetimepicker({ altFormat: 'dd-mm-yyyy' });
});


