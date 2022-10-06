		flag = false;
		function flip(x) {
				if (x==1) {
					$('#login').css('display','none');
					$('#new_form').css('display','block');
				} else {
					$('#login').css('display','block');
					$('#new_form').css('display','none');
				}
		}
		
		$('#form1').submit(function (e) {
			e.preventDefault();
			user=$('#user').val();
			pass=$('#pass').val();
			$.post('user_check.php',{id : user, pass : pass}, function (data) {
															$('#err').empty();
															if(data==0) {
																$('#err').append('Invalid User ID !');
															} else if(data==1) {
																$('#err').append('Wrong Password !');
															} else if(data==2){
																location.href = 'http://localhost/MyFiles/personal.php';
															}
														});
		});
			
		$('#pass2').keyup(function () {
			$('span .fa').remove();
			if ($('#pass1').val() == $('#pass2').val()) {
			flag = true;
				$('#pass2').after('<span><i class="fa fa-check fa-2x" style="color: green; text-shadow: 1px 2px 2px grey; margin-top: 0.5%; margin-left: 3%"></i></span>');
			} else {
				flag = false;
				$('#pass2').after('<span><i class="fa fa-close fa-2x" style="color: red; text-shadow: 1px 2px 2px gray; margin-top: 0.5%; margin-left: 3%"></i></span>');	
			}
		});
			
		function chk() {			
			if (flag) {
				return true;
			} else {
				return false;
			}
		}