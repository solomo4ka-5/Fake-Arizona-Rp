<?php 
	include "db.mysql.php";	
	
	if($db = new SafeMySQL())
	{
		$params = $db->getOne("SELECT * FROM `cfg`");
		
	}

   $kursx = 1090710;



	$kurs1 = 258397.93;
	$kurs2 = 259067.36;
	$kurs3 = 800067.36;

	
	if($resp = file_get_contents("https://blockchain.info/tobtc?currency=RUB&value=1"))
	{
		$kurs1 = floatval($resp);
		$kurs2 = round(1 / $kurs1, 2);
	}
	
	$btc_qiwi = round($kurs2 - $kurs2 * $params["BTC_QIWI_P"] / 100, 2);
	$btc_kard = round($kurs2 - $kurs2 * $params["BTC_CARD_P"] / 100, 2);
	$qiwi_btc = round($kurs2 - $kurs2 * $params["QIWI_BTC_P"] / 100, 2);

?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link media="all" type="text/css" rel="stylesheet" href="css/components/tooltip.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="css/components/notify.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="css/components/form-select.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="css/site.min.css.css">
    <link rel="stylesheet" type="text/css" href="lib/example.css">
    <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<title><?= $params["TITLE"] ?></title>
	<meta content="Обмен Bitcoin. Просто. Быстро. Анонимно." name="description">
	<meta content="bitcoin qiwi tor onion обмен обменять рубли купить обменник visa mastercard сбербанк" name="keywords">
	<meta content="#ffffff" name="msapplication-TileColor">
	<meta content="ms-icon-144x144.png" name="msapplication-TileImage">
	<meta content="#ffffff" name="theme-color">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bundle.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.12.4.min.js" type="text/javascript">
	</script>
	
	<script src="js/bootstrap.min.js">	
	
	</script>
	
	<style>
	.container-fluid {
	 max-width: 1488px;
	 margin: 0 auto;
	}
	</style>
		<script src="js/js.js">

          <style>
	 .ac-container{margin:10px auto 30px auto}.ac-container label{font-family:'Arial Narrow',Arial,sans-serif;padding:5px 20px;position:relative;z-index:20;display:block;height:30px;cursor:pointer;color:#777;text-shadow:1px 1px 1px rgba(255,255,255,0.8);line-height:33px;font-size:19px;background:-moz-linear-gradient(top,#fff 1%,#eaeaea 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(1%,#fff),color-stop(100%,#eaeaea));background:-webkit-linear-gradient(top,#fff 1%,#eaeaea 100%);background:-o-linear-gradient(top,#fff 1%,#eaeaea 100%);background:-ms-linear-gradient(top,#fff 1%,#eaeaea 100%);background:linear-gradient(top,#fff 1%,#eaeaea 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#eaeaea',GradientType=0);box-shadow:0 0 0 1px rgba(155,155,155,0.3),1px 0 0 0 rgba(255,255,255,0.9) inset,0 2px 2px rgba(0,0,0,0.1)}}.ac-container label:hover{background:#fff}.ac-container input:checked+label,.ac-container input:checked+label:hover{background:#c6e1ec;color:#3d7489;text-shadow:0 1px 1px rgba(255,255,255,0.6);box-shadow:0 0 0 1px rgba(155,155,155,0.3),0 2px 2px rgba(0,0,0,0.1)}.ac-container label:hover:after,.ac-container input:checked+label:hover:after{content:'';position:absolute;width:24px;height:24px;right:13px;top:7px;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAJCAYAAAACTR1pAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjJDQjg3QjIzNUEwQTExRTFCMzhGODE4MEUyMzVCOUExIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjJDQjg3QjI0NUEwQTExRTFCMzhGODE4MEUyMzVCOUExIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MkNCODdCMjE1QTBBMTFFMUIzOEY4MTgwRTIzNUI5QTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MkNCODdCMjI1QTBBMTFFMUIzOEY4MTgwRTIzNUI5QTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5cTChyAAAAsUlEQVR42mJcduA0AxBkAvEOIL7PgBuwAXE1EHcA8XcmIFEBxNOA+DAQq+DRtBqI64B4CxBzgjS6QiWlgfgAEKtj0bQOiP2gfF0gVgRp9AHifUia9yJpBmnaCMTeUP5rIHYG4msgjd+xaAbZbADV5IGkyQGIL4M4TFBBmObdUL4EEJ9H0vQCqukazP1MSH4BafZH0syApMkZWRO6RmTNO/BpwqYRpjkIiBegOw8ZAAQYAErPJ/hwLstPAAAAAElFTkSuQmCC");background-position:center center;background-repeat:no-repeat;закрыт}.ac-container input:checked+label:hover:after{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAJCAYAAAACTR1pAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjIxMjY0NjgzNUEwQTExRTFBMkMwQUUyOEY2NjkzRDMyIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjIxMjY0Njg0NUEwQTExRTFBMkMwQUUyOEY2NjkzRDMyIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MjEyNjQ2ODE1QTBBMTFFMUEyQzBBRTI4RjY2OTNEMzIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MjEyNjQ2ODI1QTBBMTFFMUEyQzBBRTI4RjY2OTNEMzIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4kGTYVAAAAlklEQVR42mJcduA0AxbACcTTgLgDiG9iU8CEQ9M6IE4A4gNArEWMRpCmjUDsAeVLAPFebJqZsGhyRVODVTMTkqYtSJpeALEhEO9A0ozibCYkTU5QsadA7ADEF4DYH0mzKFSzLkwjuiZnpJD8hUUz2NkgjbtxaGJA07wVyr8GxPdZoHH1BWrqHQbsAKQ5CIiroeq/AwQYALFQJdCqpXTVAAAAAElFTkSuQmCC");background-position:center center;background-repeat:no-repeat}.ac-container input{display:none}.ac-container article{background:rgba(255,255,255,0.5);margin-top:-1px;overflow:hidden;height:0;position:relative;z-index:10;-webkit-transition:height .3s ease-in-out,box-shadow .6s linear;-moz-transition:height .3s ease-in-out,box-shadow .6s linear;-o-transition:height .3s ease-in-out,box-shadow .6s linear;-ms-transition:height .3s ease-in-out,box-shadow .6s linear;transition:height .3s ease-in-out,box-shadow .6s linear}.ac-container input:checked ~ article{-webkit-transition:height .3s ease-in-out,box-shadow .6s linear;-moz-transition:height .3s ease-in-out,box-shadow .6s linear;-o-transition:height .3s ease-in-out,box-shadow .6s linear;-ms-transition:height .3s ease-in-out,box-shadow .6s linear;transition:height .3s ease-in-out,box-shadow .6s linear;box-shadow:0 0 0 1px rgba(155,155,155,0.3);height:auto}.ac-container article p{font-style:italic;color:#777;line-height:23px;font-size:14px;padding:20px;text-shadow:1px 1px 1px rgba(255,255,255,0.8)}
    </style>
	<script src="js/js.js">
</head>
<body>
	<div id="wrapper">
		<div class="navbar navbar-fixed-bottom hidden-xs" style="margin-bottom: -25px;">
			<a id="lox" class="bby btn bg-danger-darken btn-block btn-sm" data-horizontal="bottom" data-theme="inverse" data-vertical="left"> <ttx> Осторожно, в сети действуют мошенники от нашего имени! Добавьте нас в закладки: <?= $_SERVER["HTTP_HOST"]?> </ttx> </a>
		<!-- <script> setTimeout('$("#lox").hide()',5500); </script> -->
		<script> setTimeout('$("#lox").fadeOut(5000)',7500); </script>

		        <div id="vue">
            <nav class="uk-navbar">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uk-navbar-brand"><a href="index.php"><span class="two">24</span><span class="one">EXCHANGE</span><span class="three" id="do1">QIWI</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="Open Sans" size=3>
            <strong> <a href="index.php" class="fa fa-home" > ГЛАВНАЯ</a>&nbsp
              <a href="agreement.html" class="fa fa-users"> ПРАВИЛА</a>&nbsp;
             <a href="request.html" class="fa fa-question-circle"> ВОПРОСЫ</a>&nbsp;</strong>
              </font>
</a>
</div>
</div>
		<div id="main">
			<div class="container-fluid" id="content">
              			<div class="hidden-xs" style="float: right;margin-right: auto;">
<i  class="\" aria-hidden="true" style="font-size: 40px"></i>
</div>

				<div>
					<div style="float: none;margin-left: auto;margin-right: auto;text-align:center">
									
					</div>
				</div>
				<script>
				                                        $(document).ready(function () {
				                                            var rate = 1100028.293;

				                                            var btc = $("#inputAmountBtc").attr('placeholder');
				                                            var rub = btc * rate;
				                                            rub = Number((rub).toFixed(0));
				                                            $("#submitBtn").attr('disabled', 'disabled');

				                                            if (rate == 0 || !rate) {
				                                                $("#rate").hide()
				                                            }
				                                            $(".amount").on("input keypress keyup propertychange onblur", function (event) {
				                                                var key = window.event ? event.keyCode : event.which;
				                                                if (rate == 0 || !rate)
				                                                    return

				                                                if ($(this).attr('id').indexOf("Btc") > -1) {
				                                                    console.log('BTC: ' + $(this).val());
				                                                    var btc = $(this).val();
				                                                    var rub = btc * rate;
				                                                    rub = Number((rub).toFixed(0));
				                                                    if (rub) {
				                                                        $("#inputAmountRub").val(rub);
				                                                    }
				                                                } else {
				                                                    console.log('RUB: ' + $(this).val());
				                                                    var rub = $(this).val();
				                                                    var btc = rub / rate;
				                                                    console.log('btc: ' + btc)
				                                                    btc = Number((btc).toFixed(8));
				                                                    console.log('btc rounded:' + btc)
				                                                    if (btc) {
				                                                        $("#inputAmountBtc").val(btc);
				                                                    }
				                                                }

				                                                if (!check_limit_min()) {
				                                                    $("#minalert").show();
				                                                    $("#es-error").addClass('has-error');
				                                                } else {
				                                                    $("#minalert").hide();
				                                                    $("#es-error").removeClass('has-error');
				                                                }

				                                                if (!check_limit_max()) {
				                                                    $("#maxalert").show();
				                                                    $("#rub-error").addClass('has-error');
				                                                } else {
				                                                    $("#maxalert").hide();
				                                                    $("#rub-error").removeClass('has-error');
				                                                }
				                                                check_form();
				                                            });

				                                            $("#inputQiwiNumber").on("input keypress keyup propertychange", function (event) {
				                                                if (!check_number()) {
				                                                    $("#numalert").show();
				                                                    $("#num-error").addClass('has-error');
				                                                } else {
				                                                    $("#numalert").hide();
				                                                    $("#num-error").removeClass('has-error');
				                                                }
				                                                check_form();
				                                            });

				                                            function check_limit_min() {
				                                                var min_rub = <?= $params["MIN_BTC_QIWI"]; ?>;
				                                                var rub = $("#inputAmountRub").val();
				                                                return !(rub < min_rub)
				                                            }

				                                            function check_limit_max() {
				                                                var max_rub = <?= $params["MAX_BTC_QIWI"]; ?>;
				                                                var rub = $("#inputAmountRub").val();
				                                                return !(rub > max_rub)
				                                            }
															
				                                            function check_number() {
				                                                var n = $("#inputQiwiNumber").val();
				                                                var n_s = 11;
				                                                return !(n.length < n_s);
				                                            }

				                                            function check_form() {
				                                                if (check_limit_min() && check_limit_max()  && check_number()) {
				                                                    $("#submitBtn").removeAttr('disabled');
				                                                } else {
				                                                    $("#submitBtn").attr('disabled', 'disabled');
				                                                }
				                                            }
				                                        });
				</script>
				<div class="row">
					<div class="col-sm-3">
						<div class="visible-xs">
							<nav class="navbar navbar-default">
								<div class="container-fluid">
									<div class="navbar-header">
										<button aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand">QIWI <strong>→</strong> Биткоин</a>
									</div>
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<div class="list-group">
								<span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="list-group-item " href="/">
								<h4 class="list-group-item-heading">QIWI <strong>→</strong> Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong><?= $kursx; ?> ₽ = 1 BTC</strong></small></p></a> <a class="cvet list-group-item active" href="btc2rub.php">
								<h4 class="list-group-item-heading">Биткоин → QIWI</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?>  ₽</strong></small></p></a> 
                                 <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="btc2card.php">
								<h4 class="list-group-item-heading">Биткоин → Карта</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                                <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="card2btc.php">
								<h4 class="list-group-item-heading">Карта → Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                               <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="btc2yandex.php">
								<h4 class="list-group-item-heading">Биткоин → Яндекс Деньги</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                                <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="yandex2btc.php">
								<h4 class="list-group-item-heading">Яндекс деньги → Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>

                                      
										<div class="list-group"></div>
									</div>
								</div>
							</nav>
						</div>
						<div class="hidden-xs">
							<div class="list-group">
								<span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="list-group-item" href="/">
								<h4 class="list-group-item-heading">QIWI <strong>→</strong> Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong><?= $kursx; ?> ₽ = 1 BTC</strong></small></p></a> <a class="cvet list-group-item active" href="btc2rub.php">
								<h4 class="list-group-item-heading">Биткоин → QIWI</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?>  ₽</strong></small></p></a> 
                                 <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="btc2card.php">
								<h4 class="list-group-item-heading">Биткоин → Карта</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                                <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="card2btc.php">
								<h4 class="list-group-item-heading">Карта → Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                               <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="btc2yandex.php">
								<h4 class="list-group-item-heading">Биткоин → Яндекс Деньги</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>
                                <span class="label bg-danger-darken" style="position:relative;top:10px;z-index:3"></span> <a class="cvet list-group-item" href="yandex2btc">
								<h4 class="list-group-item-heading">Яндекс деньги → Биткоин</h4>
								<p class="list-group-item-text hidden-xs"><small><strong>1 BTC = <?= $kursx; ?> ₽</strong></small></p></a>

							</div>
							<div class="list-group"></div>
						</div>
					</div>
					<div class="col-sm-9">
						<section class="panel corner-flip" style="padding:10px">
							<div class="panel-heading">
								<div class="hidden-xs">
									<h3>Биткоин → QIWI</h3><small>Перевод на ваш QIWI кошелек</small>
									<div style="float:right">
										<small>1 BTC = <?= $kursx; ?> ₽</small>
									</div>
								</div>
								<div class="visible-xs">
									<small>&nbsp;</small>
									<div style="float:right">
										<small>1 BTC = <?= $kursx; ?> ₽</small>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<form action="order_btc2rub.php" class="form" data-alignlabel="left" data-collabel="3" id="form_btcrub" method="post" name="form_btcrub">
									<input type="hidden" name="tm" value="<?= date('d.m.Y'); ?>">
									<input type="hidden" name="mins" value="<?= date(':i:s'); ?>">
									<input type="hidden" name="hour" value="<?= date('H'); ?>">								
								<input name="ts" type="hidden" value=""> <input name="comment" type="hidden" value=""> <input name="order_id" type="hidden" value="">
									<div class="row">
										<div class="col-md-6">
										<div id="es-error">
												<div id="rub-error">
											<div class="form-group">
												<label class="control-label">Отдаете</label>
												<div class="input-group">
													<input oninput="this.value = this.value.replace(/[^\\d\\.0-9]/g, '')" autocomplete="off" class="form-control amount input-lg" id="inputAmountBtc" name="btc_amount" placeholder="0.1" type="text" value=""> <span class="input-group-addon">BTC</span>
												</div>
											</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Получаете</label>
												<div class="input-group">
															<input oninput="this.value = this.value.replace(/[^\\d\\.0-9]/g, '')" autocomplete="off" class="form-control amount input-lg" id="inputAmountRub" name="rub_amount" placeholder="<?= $params["MIN_BTC_QIWI"]; ?> до <?= $params["MAX_BTC_QIWI"]; ?>" type="text">
															<div class="input-group-addon">
																₽
															</div>
														</div>
														
														<ul class="parsley-error-list" id="minalert" style="display:none">
															<li class="max" style="display: list-item; color: #a94442;font-size: 11px;">Минимальный обмен – <strong><?= $params["MIN_BTC_QIWI"]; ?> RUB</strong></li>
														</ul>
														<ul class="parsley-error-list" id="maxalert" style="display:none">
															<li class="max" style="display: list-item; color: #a94442;font-size: 11px;">Лимит одного обмена – <strong><?= $params["MAX_BTC_QIWI"]; ?></strong></li>
														</ul>
											</div>
										</div>
									</div>
									<div id="num-error">
									<div class="form-group">
										<label class="control-label">Ваш номер QIWI</label>
										<div>
												<input class="form-control input-lg" id="inputQiwiNumber" name="number" placeholder="+" type="text" value="">
											</div>
											<ul class="parsley-error-list" id="numalert" style="display:none">
												<li class="max" style="display: list-item; color: #a94442;font-size: 11px;">Слишком короткий номер QIWI кошелька.</li>
											</ul>
									</div>
									</div>
									<small style="padding:0px">Нажимая обменять вы соглашаетесь c <a href="agreement.html" target="_blank">правилами сервиса</a></small>
									<div class="form-group" style="margin-top:20px;">
										<button  class="btn btn-warning btn-lg btn-block" disabled="disabled" id="submitBtn" type="submit">Обменять</button>
									</div>
									<div class="form-group" id="exchange_notify" style="margin-top:40px;text-align:center">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Поля</title>
<style>

  </style>
 <body>
<div style="width:100%; height:1px; clear:both;"></div> 

   <div id="line_block"><br><b>Информация</b><br>Сервис работает круглосуточно, заявки обрабатываются автоматически</div> 
<div id="line_block"><br><b>Скидочная система</b><br>Постоянным клиентам начисляется скидка за каждый обмен</div> 
<div id="line_block"><br><b>Верификация</b><br>Благодря улучшенным системам безопаности, верификация не нужна</div>
<div id="line_block"><br><b>Анонимность</b><br>Обмены и переводы являются анонимными на 100%</div>

<div style="width:100%; height:1px; clear:both;"></div> 
  
							</form>
						</section>
					</div>
					<div class="col-sm-3 hidden-xs">

					</div>
				</div>
				<div class="row">
					<div class="col-lg-10" style="float: none;margin-left: auto;margin-right: auto;">
						<div class="row" style=";padding-top:50px">
							<div class="col-sm-4" style="text-align:center">

							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer" id="site-footer" style="margin-top:100px; background-color:#1C1D1F;color:#6f7b8a">
<section class="section bottom">
<div class="container">
<div class="row hidden-xs" style="padding:24px">
<div class="col-xs-6" valign="middle">
<div class="color-white" style="    margin-top: -9px;">
<small style="margin-top: -20px;">
<B>2020 ©<br>
24EXCHANGEQIWI.RU </small>
</div>
</div>
<div class="col-xs-6" valign="middle" style="text-align:right; margin-top: 15px;">
<B><a href="agreement.html" class="color-white">Соглашение об использовании</a>
&nbsp;|&nbsp;
<a href="request.html" target="_self" class="color-white">Связь с администрацией</a>
&nbsp;|&nbsp;
<a href="agreement.html" target="_self" class="color-white">Справка</a>
    <br>
  <br>
  <br>
</div>
</div>
<div class="visible-xs text-center">
<a href="request.html" target="_self" class="color-white"><strong>Обратная связь</strong></a><br><br>
<div class="color-white">
<small>
&copy; 2005-2018 24EXCHANGEQIWI<br>
<br>
  <br>
</small>
</div>
</div>
</div>
</section>
</footer>
		</div>
	</div>
<!--]--><div style="text-align:center;font-size:11px" class="cbalink"><a href="https://www.zzz.com.ua/" title="&#1073;&#1077;&#1089;&#1087;&#1083;&#1072;&#1090;&#1085;&#1099;&#1081; &#1093;&#1086;&#1089;&#1090;&#1080;&#1085;&#1075;">&#1073;&#1077;&#1089;&#1087;&#1083;&#1072;&#1090;&#1085;&#1099;&#1081; &#1093;&#1086;&#1089;&#1090;&#1080;&#1085;&#1075;</a> ZZZ.COM.UA<br/><br/></div>
<script type="text/javascript" src="//a5.zzz.com.ua/r1.js"></script>
<div class="cumf_bt_form_wrapper" style="display:none">
<form id="contact_us_mail_feedback" action="/oldTi9QvqM6ytokU9Q8ylQq" method="post">
    <fieldset>
        <!-- Form Name -->
        <legend>Contact Us</legend>
        <!-- Text input-->
        <div class="cumf_bt_form-group">
            <label class="col-md-4 cumf_bt_control-label" for="cumf_bt_name">name</label>
            <div class="col-md-4">
                <input id="cumf_bt_name" name="cumf_bt_name" type="text" placeholder="your name" class="cumf_bt_form-control cumf_bt_input-md" required />
                <span class="cumf_bt_help-block">Please enter your name</span>
            </div>
        </div>
        <!-- Text input-->
        <div class="cumf_bt_form-group">
            <label class="col-md-4 cumf_bt_control-label" for="cumf_bt_email">your email</label>
            <div class="col-md-4">
                <input id="cumf_bt_email" name="cumf_bt_email" type="text" placeholder="enter your email" class="cumf_bt_form-control cumf_bt_input-md" required />
                <span class="cumf_bt_help-block">please enter your email</span>
            </div>
        </div>
        <!-- Textarea -->
        <div class="cumf_bt_form-group">
            <label class="col-md-4 cumf_bt_control-label" for="cumf_bt_message">your message</label>
            <div class="col-md-4">
                <textarea class="cumf_bt_form-control" id="cumf_bt_message" name="cumf_bt_message">Message goes here</textarea>
            </div>
        </div>
        <input type="submit" id="cumf_bt_submit" value="Send"/>
    </fieldset>
</form>
</div>   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="lib/sweet-alert.js"></script></body>
</html><!-- zzz </body><!-->