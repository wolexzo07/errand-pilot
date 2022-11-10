function fetchrequestnow(page) {
	$('#contentgo').html("<center><img src='../image/load_3.gif' class='img-responsive'/></center>");
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#contentgo').html(data);
			} catch (err) {
				alert(err);
			}
		}
	});
}