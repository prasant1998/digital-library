		flag=false;
		$('#us').append('USER ID: '+det[0]);
		for (i=0; i<3; i++) {
			$('div:eq(2) input:eq('+i+')').val(det[i+1]);
			$('div:eq(4) input:eq('+i+')').val(det[i+1]);
		}
		$('#pass2').keyup(function () {
			$('span .fa').remove();
			if ($('#pass1').val() == $('#pass2').val()) {
			flag = true;
				$('#pass2').after('<span><i class="fa fa-check fa-2x" style="color: green; text-shadow: 1px 2px 2px gray; margin-top: 1.8%; margin-left: 2%"></i></span>');
			} else {
				flag = false;
				$('#pass2').after('<span><i class="fa fa-close fa-2x" style="color: red; text-shadow: 1px 2px 2px gray; margin-top: 1.8%; margin-left: 2%"></i></span>');	
			}
		});
		
		function edit_acc(k) {
			for (i=2; i<5; i++) {
				$('div:eq('+i+')').css('display','none');
			}
			$('div:eq('+(k+2)+')').css('display','block');
		}
		
		$('#subm').submit(function(e) {
			e.preventDefault();
			nm=$('#name').val();
			addr=$('#addr').val();
			phnol=$('#phno').val();
			idl=det[0];
			pass=det[4];
			typ='members';
			$.post("admin_edit.php", {type: typ, id: idl, name: nm, address: addr, phno: phnol, passwd: pass}, function(data) {
																															if (data) {
																																alert('Edit Successful !');
																																location.href = 'http://localhost/MyFiles/acc.php';
																															} else {
																																alert('Account alrady exists !');
																															}
			});
		});
		
		$('#subm1').submit(function(e) {
			e.preventDefault();
			if (flag && det[4]==$('#pass0').val()) {
				nm=det[1];
				addr=det[2];
				phno=det[3];
				id=det[0];
				pass=$('#pass2').val();
				$.post("admin_edit.php", {type: 'members', id: id, name: nm, address: addr, phno: phno, passwd: pass}, function(data) {
																															alert('Password Changed !');
				});	
				location.href = 'http://localhost/MyFiles/main_Page.php';
			}
			else {
				$('#err').empty();
				$('#err').append('Wrong Password !');
			}
		});
		
		function delet() {
			ck= confirm('Are you sure ?');
			if(!ck) {
				return;
			}
			id=det[0];
			$.post("admin_del.php", {type: 'members', id: id}, function(data) {
																		alert('Account Deleted !');
																		location.href = 'http://localhost/MyFiles/main_Page.php';
			});
		}
		
		function w3_open() {
			$('#mySidebar').css('display','block');
		}
		function w3_close() {
			$('#mySidebar').css('display','none');
		}
