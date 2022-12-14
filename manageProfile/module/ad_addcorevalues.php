<form id="core-form">
	<div class="result-core"></div>
	<p class="core-txt">Title:</p>
		<input type="text" placeholder="Title Here" class="form-control" id="title-core"/>
	<p class="core-txt">Content:</p>
	<textarea class="form-control" placeholder="Title content" id="content-core"></textarea>
	<br/>
	<br/>
	<input type="submit" class="btn btn-success" value="Add"/>
</form>
<script src="../../js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#core-form").submit(function(){
			var title = $("#title-core").val();
			var content = $("#content-core").val();
			$.ajax({
				url:"ad_processcorevalues",
				method:"POST",
				data:{title:title,content:content},
				success:function(response){
					$(".result-core").html(response);
				},
				error:function(){
					
				}
			});
			return false;
		});
	});
</script>