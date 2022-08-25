function load(page) {
$(".menuTag").hide();
$("#loadTemporal").show();
$("#loadTemporal").fadeIn(400).html("<center><img src='img/loader.gif' style='width:50px;margin:30pt;border-radius:100%;'/></center>");
topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#calculate').html(data);
				$("#loadTemporal").hide();
			} catch (err) {
				alert(err);
			}
		}
	});
}

function pageLoader(page,pageid){
	$(".menuTag").hide();
$(pageid).show();
$(pageid).fadeIn(400).html("<center><img src='img/load_loader.gif' style='width:80px;margin:30pt'/></center>");
topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$(pageid).html(data);
				
			} catch (err) {
				alert(err);
			}
		}
	});
}

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
