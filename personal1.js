		$('#us').append('USER ID: '+id);
		disp_borr();
		function disp_borr() {
			$.post("borrow_display.php", {mem_id: id}, function (data) {
																	$("#borr").empty();
																	console.log(data);
																	if(data) {
																		$("#borr").append("<table id='borrowed'><tr><th>Book Name</th><th>Author</th><th>Price (&#8377;)</th><th></th></tr></table>");
																		l=JSON.parse(data);
																		for (i in l) {
																			$("#borrowed").append("<tr><td>"+i+"</td><td>"+l[i].split("!")[0]+"</td><td>"+l[i].split("!")[2]+"</td><td><button class='w3-btn w3-orange w3-round-large w3-small w3-ripple w3-hover-opacity' style='box-shadow: 0px 0px 5px 0.1px gray' onclick=ret_fun("+l[i].split("!")[1]+")><b style='color: white'>Return</b></button></td></tr>");
																		}
																	}
																	else {
																		$("#borr").append("<i class='fas fa-ban fa-2x' style='color: color: #99004d; text-shadow: 0px 0px 4px pink; margin-left: 44%'> No books.</i>");
																	}
			});
		}
		
		function book_disp() {
			$('#bor_open').toggleClass('w3-gray');
			$('#bor_open > i').toggleClass('w3-text-light-grey');
			if($('#avail_bk').css('display')=='none') {
				$('#avail_bk').css('display', 'block');
			} else {
				$('#avail_bk').css('display', 'none');
				return;
			}
			$.post("book_display.php", {mem_id: id}, function(data) {
												$("#avail_bk").empty();
												if(data) {
													$("#avail_bk").append("<table id='bkdisp'><tr><th>Book Name</th><th>Author</th><th>Price (&#8377;)</th><th></th></tr></table>");
													l=JSON.parse(data);
													for (i in l) {
														$("#bkdisp").append("<tr><td>"+i+"</td><td>"+l[i].split("!")[0]+"</td><td>"+l[i].split("!")[2]+"</td><td><button class='w3-btn w3-green w3-round-small w3-small w3-ripple w3-hover-opacity' style='box-shadow: 0px 0px 4px 0.5px gray' onclick=borr_fun("+l[i].split("!")[1]+")>Borrow</button></td></tr>");
													}
												}
												else {
													$("#avail_bk").append("<i class='fas fa-ban fa-2x' style='color: color: #0f0f3d; text-shadow: 0px 0px 4px grey; margin-left: 42%'> No books Available.</i>");
												}								
			});
		}
		
		function borr_fun(i) {
			$.post("book_borr.php", {mem_id: id, book_id: i}, function(data) {
																		if(data==2) {
																			disp_borr();
																			book_disp();
																		} else if (data==1){
																			alert("Cannot have more than 2 books ! Please return one for borrowing another");
																		} else if (data==0){
																			alert("Book already been borrowed !");
																		}
			});
		}
		
		function ret_fun(i) {
			$.post("book_ret.php", {mem_id: id, book_id: i}, function(data) {
															disp_borr();
															book_disp();
			});
		}
		
		function w3_open() {
			$('#mySidebar').css('display','block');
		}
		function w3_close() {
			$('#mySidebar').css('display','none');
		}