$(document).ready(function(){

	$('#customer-name').keyup(function(){

		//If there is nothing in the search bar
		if($(this).val() == ''){
			return;
		}

		//Prepare AJAX
		$.ajax({
			type: 'get',
			url: 'api/live-search.php?query='+$(this).val(),
			success:function(dataFromServer){
				console.log(dataFromServer);
			},
			error:function(){
				console.log("Cannot Connect to Server.");
			}
		});
	});

});