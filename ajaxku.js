																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																$(document).ready(function()
{
				// ajax login
				$("#formmasuk").submit(function()
				{
				var unick=$.trim($("#nick").val());
				var upass=$.trim($("#pass").val());
				if($("#cokie").is(':checked'))
				{
					var cokie=$("#cokie").val();
				}
				$.ajax({
				url : 'login.php',
				data : 'nick='+unick+'&pass='+upass+'&cokie='+cokie,
				type : 'POST',
				success : function(hasil){
								if(hasil=="ok")
								{
								document.location="index.php";
								}
								else
								{
								$("#masuk").html('Masuk');
								$("#notif").html('<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>Username or password wrong ! </div>');
								return false;
								}
							},
					});
					return false;
				});
			
			//ajax daftar
			$("#formdaftar").submit(function()
			{
			var unick=$("#dnick").val();
			var uemail=$("#email").val();
			var upass=$("#dpass").val();
			$.ajax({
			url : 'daftar.php',
			data : 'nick='+unick+'&email='+uemail+'&pass='+upass,
			type : 'POST',
			success : function(hasil){
							if(hasil=="ada")
							{
							$("#dnotif").html('<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button> You are already registered ! </div>');
							return false;	
							}
							else if(hasil=="yes")
							{
							$("#dnotif").html('<div class="alert alert-success text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>Registration was successful ! <img src="alihkan.gif"></div>');
								function alihkan()
								{
								document.location="index.php";
								}
								setTimeout(alihkan,5000);
							}
							else
							{
							$("#dnotif").html('<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button> Failed to register ! </div>');
							return false;
							}
						},
				});
				return false;
			});
			//load pesan
			function ambilpesan()
			{
				$(".boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,1000);
			//load online
			function ol()
			{
			$(".boxonline").load("online.php");	
			}
			setInterval(ol,1000);
			//kirim pesan chat
			$("#formpesan").submit(function()
			{
				var pesan=$(".input-xlarge").val();
				$.ajax({
					url : 'kirim.php',
					type : 'POST',
					data : 'pesan='+pesan,
					success : function(pesan)
					{
						// html5 DOM audio play
						var suara=document.getElementById("suara");
						suara.play();
						if(pesan=="terkirim")
						{
							$(".input-xlarge").val("");
						}
						else
						{
							return false;
						}
					},
					});
				return false;
			
			});
			//load pesan chat
			function ambilpesan()
			{
				$("#boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,1000);
			
			
});
// function add emot to chat form
function addemot(emot)
{
	document.forms[0].pesan.value+=" "+emot;
}
