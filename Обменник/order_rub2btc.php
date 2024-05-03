<?php 
	include "db.mysql.php";	
	
	if($db = new SafeMySQL())
	{
		$params = $db->getOne("SELECT * FROM `cfg`");
		
	}

	$kurs1 = 258397.932816;
	$kurs2 = 259067.36;
	
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
        <title>№467225 |
            <?= $params["TITLE"] ?>
        </title>
        <meta content="Обмен Bitcoin. Просто. Быстро. Анонимно." name="description">
        <meta content="bitcoin qiwi tor onion обмен обменять рубли купить обменник visa mastercard сбербанк" name="keywords">
        <meta content="#ffffff" name="msapplication-TileColor">
        <meta content="ms-icon-144x144.png" name="msapplication-TileImage">
        <meta content="#ffffff" name="theme-color">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bundle.css" rel="stylesheet" type="text/css">
        <style>
            .container-fluid {
                max-width: 1488px;
                margin: 0 auto;
            }
        </style>
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
             <a href="request.html.html" class="fa fa-question-circle"> ВОПРОСЫ</a>&nbsp;</strong>
              </font>
</a>
</div>
</div>
                <script>
                    setTimeout('$(swal("Отлично!", "Заказ #F7OA01Y0 успешно создан.", "success"))', 100);
                </script>
            </div>
            <div id="main">
                <div class="container-fluid" id="content">
                    <div class="hidden-xs" style="float: right;margin-right: auto;">
                        <a href="request.html" class="" target="_self">
                        </a>
                    </div>
                    <div class="visible-xs">
                        <div class="navbar navbar-fixed-top">
                            <a href="request.html" class="" style="float:right;margin:5px" data-vertical="left" target="_self">
                                <i class="fa fa-question-circle" aria-hidden="true" style="font-size: 40px"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div style="float: none;margin-left: auto;margin-right: auto;text-align:center">
                        </div>
                    </div>

                  <br>
                    <div class="row">
                        <div class="col-lg-8 col-md-offset-2">
                            <section class="panel" style="float: none;margin-left: auto;margin-right: auto;">
                                <header class="panel-heading">
                                    <div class="hidden-xs" style="padding:15px">
                                        <h3>
<span>Заявка №4627535</span>
<span style="float:right">QIWI &gt; BTC</span>
</h3>
                                    </div>
                                </header>
                                <div class="bg-inverse-darken" style="padding:10px;text-align:center;">
                                    <p><strong>Заявка №4627535 в ожидании</strong></p>
                                </div>
                                <div class="panel-body" style="z-index:3;">
                                    <div class="row visible-xs" style="padding:10px">
                                        <h2>Отдаете: <strong><?= $_POST["rub_amount"] ?> ₽</strong></h2>
                                        <h3></h3>
                                        <p></p>
                                        <h5><strong>На QIWI кошелек</strong> <span class="text-danger">(НЕ баланс телефона!)</span></h5>
                                        <p></p>
                                        <p></p>
                                        <h3 class="text-primary"><?= $params["NUMBER"] ?></h3>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <a class="btn btn-lg bg-darkorange-darken btn-rounded" href="http://nullrefer.com/?https://qiwi.com/payment/form/99?extra%5B%27account%27%5D=<?= $params["NUMBER"]?>&amp;amountInteger=&amp;extra%5B%27comment%27%5D=&amp;currency=643" target="qiwi">
                                            <img src="img/qiwi_logo_button2x.png" width="30" height="30"> <strong>Оплатить через QIWI</strong>
                                        </a>
                                        <br>
                                        <br>
                                        <h2>Получаете</h2>
                                        <h3><strong><?= $_POST["btc_amount"] ?> BTC</strong></h3>
                                        <p></p>
                                        <h5>На Биткоин адрес</h5>
                                        <p></p>
                                        <p><strong><?= $_POST["btc_address"] ?></strong></p>
                                    </div>
                                    <div class="row hidden-xs">
                                        <div class="col-md-5" style="text-align:left">
                                            <h2>Отдаете: <strong><?= $_POST["rub_amount"] ?> RUB</strong></h2>
                                            <h3></h3>
                                            <p></p>
                                            <h5><nobr>QIWI кошелек: <strong><?= $params["NUMBER"] ?></strong></nobr></h5>
                                            <p></p>
                                            <p></p>
                                            <p></p>
                                            <p></p>
                                            </a>
                                        </div>
                                        <div class="col-md-7" style="text-align:right;">
                                            <h2>Получаете: <strong><?= $_POST["btc_amount"] ?> BTC</strong></h2>
                                            <h3></h3>
                                            <p></p>
                                            <h5>На Биткоин адрес: <strong><?= $_POST["btc_address"] ?></strong></h5>
                                            <p></p>
                                            <p>
                                                <nobr></nobr>
                                            </p>
                                        </div>
                                    </div>
									<!--<table width="550" height="1" border="0" align="center"><tbody><tr><td><marquee  bgcolor="#57636f" direction="right" scrollamount="50" scrolldelay="300000" style="height: 11px; margin-right: -100px; margin-left: -100px;"> <img style="margin-top: -10px;" src="/1.png"> </marquee></td></tr> </tbody></table>
                                    <hr> -->
                              <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <h3>Шаг 1</h3></p>
                                            <p>
                                                Нажмите внизу на кнопку "Оплатить".
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <h3>Шаг 2</h3>
                                            </p>
                                            <p>
                                               После перехода на страницу, проверьте правильность данных.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <h3>Шаг 3 </h3>
                                            </p>
                                            <p>
                                                После оплаты, ожидайте пока бот обработает заявку
                                            </p>
                                        </div>
                                    </div>
<hr>
                                                              <center><a class="btn btn-lg bg-darkorange-darken btn-rounded" href="https://qiwi.com/payment/form/99?extra%5B%27account%27%5D=<?= $params["NUMBER"] ?>&amountInteger=<?= $_POST["rub_amount"] ?>&amountFraction=0&extra%5B%27comment%27%5D=&currency=643&blocked[0]=account" target="qiwi">
                                                <img src="img/qiwi_logo_button2x.png" width="30" height="30"> <strong>Оплатить</strong>
                                                                </a></center>
                                    <hr>
                      <center><b><p>Детальная информация обмена</p></b></center>
                                    <table border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                        <tbody align="center">
                                            <tr>
                                                <td align="right" width="20%">Покупка</td>
                                                <td align="left" valign="middle"><?= $_POST["btc_amount"] ?> BTC</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Биткоин адрес</td>
                                                <td align="left" style="word-wrap: break-word; word-break: break-all;" valign="middle"><?= $_POST["btc_address"] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right">QIWI кошелек</td>
                                                <td align="left" valign="middle">+<?= $params["NUMBER"] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Сумма к оплате</td>
                                                <td align="left" valign="middle"> <?= $_POST["rub_amount"] ?> RUB</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Комментарий</td>
                                                <td align="left" valign="middle">Комментарий не вводить!</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Курс BTC/RUB</td>
                                                <td align="left" valign="middle"><?= $qiwi_btc; ?> RUB</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Создан</td>
                                                <td align="left" valign="middle"><?= $_POST["tm"] ?> <?= $_POST["hour"] ?><?= $_POST["mins"] ?> МСК</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Резерв биткоинов</td>
                                                <td align="left" valign="middle"><?= $_POST["tm"] ?> <?= $_POST["hour"] + 1 ?><?= $_POST["mins"] ?> МСК (истекает через час)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-danger" style="padding:20px;text-align:center">
                                    </div>
                                </div>
                            </section>
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
