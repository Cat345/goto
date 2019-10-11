



function geturl(){
		$('#result').empty()
	var url_val = $("#url").val();
	$.ajax({

		url: '/get_url.php',
		method: 'post',
		//dataType: 'html',
		data: {url: url_val},

		success: function(data){


			UIkit.util.ready(function () {
			$('#js-progressbar').show();
					var bar = document.getElementById('js-progressbar');

					var animate = setInterval(function () {

							bar.value += 10;

							if (bar.value >= bar.max) {
									clearInterval(animate);
							}
								if (bar.value == bar.max){
								$('#js-progressbar').hide();
									$('#result').append(data);
								bar.value = 0;
								}

					}, 100);

			});

		}

	});

}

function delete_url(id){
		$('#result').empty()
	$.ajax({

		url: '/del_url.php',
		method: 'post',

		data: {del_id: id},

		success: function(data){
	$('#result').append(data);
	$('#tr'+id).remove()


}
		});

	}
