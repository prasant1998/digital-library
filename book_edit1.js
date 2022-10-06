		$('#us').append('USER ID: '+idk);
		$('#adm_pa').keyup(function(e) {
									e.preventDefault();
									if(e.which == 13) {
										if ($('#adm_pa').val()=='1116') {
											start();
										} else {
											$('#warn').css('display','block'); 
										}										
									}
		});			
		
		function start() {	
			$('#bk_edit').empty();
			$('#bk_edit').append("<button id='bk_add' class='w3-btn w3-round-large w3-text-white w3-ripple' style='margin-left: 45%; background-color: #0086b3; text-shadow: 0px 0px 4px #00111a; border: 0.4px solid #ccc' onclick=book_entry()>Add Book</button><br><br><br>");
			$.get("admin_book.php",function(data) {
													if(data){
																$("#bk_edit").append("<table id='b_li'><tr><th>Book Name</th><th>Author</th><th>Quantity</th><th>Price (&#8377;)</th><th style='display:none'></th><th></th><th></th></tr></table>");
																l=JSON.parse(data);
																for (i in l) {
																	if(l[i].split("!")[5] == 0) {
																		$("#b_li").append("<tr id="+l[i].split("!")[1]+"><td>"+i+"</td><td>"+l[i].split("!")[0]+"</td><td>"+l[i].split("!")[2]+"</td><td>"+l[i].split("!")[3]+"</td><td style='display:none'>"+l[i].split("!")[4]+"</td><td><button class='w3-btn fas fa-edit fa-lg w3-text-white w3-round-large w3-ripple w3-small' style='background-color: #009900' onclick=edit_fun("+l[i].split("!")[1]+")></button></td><td><button class='w3-btn fa fa-trash-o fa-lg w3-text-white w3-round-large w3-ripple w3-small w3-red' onclick=del_fun("+l[i].split("!")[1]+")></button></td></tr>");
																	}
																	else {
																		$("#b_li").append("<tr id="+l[i].split("!")[1]+"><td>"+i+"</td><td>"+l[i].split("!")[0]+"</td><td>"+l[i].split("!")[2]+"</td><td>"+l[i].split("!")[3]+"</td><td style='display:none'>"+l[i].split("!")[4]+"</td><td><button class='w3-btn fas fa-edit fa-lg w3-text-white w3-round-large w3-ripple w3-small' style='background-color: #009900' onclick=edit_fun("+l[i].split("!")[1]+")></button></td><td><button class='w3-btn fa fa-trash-o fa-lg w3-text-white w3-round-large w3-ripple w3-small w3-red' disabled></button></td></tr>");
																	}
																}
															}
			});
		}
	
		function edit_fun(i) {
			nm= $('#'+i+' td:eq(0)').text();
			au= $('#'+i+' td:eq(1)').text();
			qu= $('#'+i+' td:eq(2)').text();
			minq= $('#'+i+' td:eq(4)').text();
			pr= $('#'+i+' td:eq(3)').text();
			$('#'+i).append("<form id= 'fo"+i+"' onsubmit='return upd_fun("+i+")' style='display:none'></form>");
			$('#'+i+' td:eq(0)').replaceWith("<td><input form='fo"+i+"' id= nm"+i+" value='"+nm+"'  type='text' required></td>");
			$('#'+i+' td:eq(1)').replaceWith("<td><input form='fo"+i+"' id= au"+i+" value='"+au+"' type='text' pattern='[a-zA-Z ]+' required></td>");
			$('#'+i+' td:eq(2)').replaceWith("<td><input form='fo"+i+"' id= qu"+i+" value='"+qu+"' type='number' min='"+minq+"' max='100' onKeyDown='return false' required></td>");
			$('#'+i+' td:eq(3)').replaceWith("<td><input form='fo"+i+"' id= pr"+i+" value='"+pr+"' type='text' pattern='^[1-9][0-9]*$' required></td>");
			$('#'+i+' td:eq(5)').replaceWith("<td><button type='submit' form='fo"+i+"' class='w3-btn w3-text-white w3-round-large w3-ripple w3-small w3-green'>Update</button></td>");
			$('#'+i+' td:eq(6)').replaceWith("<td><button class='w3-btn w3-text-white w3-round-large w3-ripple w3-small w3-pink' onclick=start()>Cancel</button></td>");
			$('#'+i+' td:eq(0)').css('background-color','#99ffff');
			$('#'+i+' td:eq(1)').css('background-color','#99ffff');
			$('#'+i+' td:eq(2)').css('background-color','#99ffff');
			$('#'+i+' td:eq(3)').css('background-color','#99ffff');
		}
		
		function upd_fun(i) {
			nm=$('#nm'+i).val();
			au=$('#au'+i).val();
			qu=$('#qu'+i).val();
			pr=$('#pr'+i).val();
			$.post("admin_edit.php", {type: 'books', id: i, bk_name: nm, author: au, quant: qu, price: pr}, function(data) {
																													if(!data) {
																														alert('Book already Exists !');
																													}
																													start();																													
			});
			return false;
		}
		
		function del_fun(i) {
			ck= confirm('Are you sure ?');
			if(!ck) {
				return;
			}
			$.post("admin_del.php", {type: 'books', id: i}, function(data) {
																		if (!data) {
																			alert("Book can't be deleted. Already borrowed");
																		}
																		start();
			});
		}
			
		
		function subm() {
			name=$('#nam').val();
			autho=$('#auth').val();
			quan=$('#quan').val();
			pri=$('#pri').val();
			$.post("admin_insert.php", {type: 'books', bk_name: name, author: autho, quant: quan, price: pri}, function(data) {
																		if (data) {
																			alert("Submitted successfully !");
																		} else {
																			alert('Book already Exists !');
																		}
																		start();
			});
			return false;
		}
	
		function book_entry() {
			$("#bk_add").prop('disabled', true);
			$('#b_li').before("<div class='w3-container ne'><form onsubmit='return subm()'><label for='nam'>Name :</label><input id='nam' type='text' required><br><label for='auth'>Author :</label><input id='auth' type='text' pattern='[a-zA-Z ]+' required><br><label for='quan'>Quantity :</label><input id='quan' type='text' pattern='^[1-9][0-9]*$' required><br><label for='pri'>Price :</label><input id='pri' type='text' pattern='^[1-9][0-9]*$' required><br><i class='fa fa-arrow-left fa-2x' style='text-shadow: 0px 0px 2px grey; margin-top: 4%; margin-left: 5%' onclick=alte()></i><button type='submit' style='margin-top: 3%; margin-right: 4%; margin-bottom: 2%; border: none; float: right' class='w3-btn yo w3-green w3-medium w3-round-large w3-ripple w3-text-white'>Submit</button></form></div>");
		}
		
		function alte() {
			$("#bk_add").prop('disabled', false);
			$('.ne').remove();
		}
		
		function w3_open() {
			$('#mySidebar').css('display','block');
		}
		function w3_close() {
			$('#mySidebar').css('display','none');
		}