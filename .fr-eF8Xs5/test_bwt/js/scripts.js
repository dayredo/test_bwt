var t;
function up() {
	var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
		if(top > 0) {
			window.scrollBy(0,-0.1);
			t = setTimeout('up()',1);
		}else{ 
			clearTimeout(t);
		}
	return false;
}

$(function(){
	$(document).ready(function(){
		$("#check").click(function(){	
			var cap = $("#capcha").val();

			var chk_cap = $('input[name = check_capcha]').val();
			if( cap != chk_cap ){
				console.log("capcha: " + cap + ", check_capcha: " + chk_cap );
				// $(".check_capcha").next().hide().css("color","red").fadeIn(400);
				$("#indication").addClass("cap-false");

				// $(".reset").css("display","block");
				// $(".reset").click(function(){
				// 	$(".check_capcha").trigger("reset");
				// });
			}
			else{
				console.log("capcha: " + cap + ", check_capcha: " + chk_cap );
				$("#indication").removeClass("cap-false").addClass("cap-true");
				$("#cap").append('<button type="submit" class="btn btn-primary btn-lg btn-block" id="send">Send</button>');

			}
		});

		$("#email").change(function(){
			var ele = $('#email');
			var patt = /^.+@.+[.].{2,}$/i;
			if(!patt.test(ele.val())) {
				ele.addClass('valid-false');
			} else {
				ele.removeClass('valid-false').addClass('valid-true');
				var mailvalid = 1;
			}
		});

		$("#name").change(function(){
			var ele = $('#name');
			var patt = /^.+@.+[.].{2,}$/i;
			if(ele.val().length < 6) {
				ele.addClass('valid-false');
			} else {
				ele.removeClass('valid-false').addClass('valid-true');
				var phonevalid = 1;
			}
		});

		$(".year").change(function(){
			var year = $(".year").val();
			console.log(year);
			var month = $(".month").val();
			console.log(month);
			var day = $(".day").val();
			console.log(day);
			$.ajax({
				url: "application/models/model_check_date.php",
				type: "POST",
				date: { 'check_year' : year },
				dateType: "json",
				cache: true,
				success: function(data){
					console.log("script work!");
					var rtn = JSON.parse(data);
					if( rtn.leap_year = true ){
						console.log("this leap year");
					}
					$(".month").change(function(){
						console.log(month);
					});
				}
			});
		});

		$(".read-more").click(function(){
			$(".jumbotron", this).css("height","auto");
			$(".jumbotron", this).css("overflow","inherit");
			$(".jumbotron", this).css("display", "block");
			// $(".jumbotron").css("overflow","inherit");
			
		});
	});
});