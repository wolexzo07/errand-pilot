$(document).ready(function(){
				$("#serveme").change(function(){
					if($("#serveme").val() != ""){
						var switcher = $("#serveme").val();
							if(switcher == "52ae104d91f749e0ab6f3bebf553d296"){
								var option = confirm("READY TO ORDER FOR FOOD NOW?");
							}
							else if(switcher == "031c1ee3f73385c5ef2bb42b962f7ae8"){
								var option = confirm("READY TO ORDER FOR DRINK NOW?");
							}
							else if(switcher == "96519cf49d24207bb86e9106f3c09109"){
								var option = confirm("READY TO ORDER FOR GAS RE-FILLING?");
							}
							else if(switcher == "b75710f72252e8e5b45a0da1140825ff"){
								var option = confirm("READY SHOP FROM BOUTIQUE STORES?");
							}
						
							if(option == true){
								$("#listedServices").submit();
							}
							return true;
					}else{
						alert("You must select an option!");
					}
				});
			});