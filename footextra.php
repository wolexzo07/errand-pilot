	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/nouislider.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<script src="js/bootstrap-selectpicker.js" type="text/javascript"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>
	<script src="js/atv-img-animation.js" type="text/javascript"></script>
	<script src="js/material-kit.min3f71.js?v=1.1.1" type="text/javascript"></script>
	<script src="assets-for-demo/modernizr.js" type="text/javascript"></script>
	<script src="assets-for-demo/vertical-nav.js" type="text/javascript"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var slider = document.getElementById('sliderRegular');

	        noUiSlider.create(slider, {
	            start: 40,
	            connect: [true,false],
	            range: {
	                min: 0,
	                max: 100
	            }
	        });

	        var slider2 = document.getElementById('sliderDouble');

	        noUiSlider.create(slider2, {
	            start: [ 20, 60 ],
	            connect: true,
	            range: {
	                min:  0,
	                max:  100
	            }
	        });



			materialKit.initFormExtendedDatetimepickers();

		});
	</script>