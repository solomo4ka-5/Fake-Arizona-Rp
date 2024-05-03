 <html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bundle.css" rel="stylesheet" type="text/css">
	<title>Админ Панель</title>
</head>
<?php 
	if(!function_exists("add2log"))
	{
		include "db.mysql.php";	
	}
	
	if($db = new SafeMySQL())
	{
		if(isset($_REQUEST["TITLE"]))
		{
			$db->exec("TRUNCATE TABLE `cfg`");
			$db->exec("INSERT INTO `cfg` (`TITLE`, `CARD`, `YANDEX`, `NUMBER`, `BTC_ADRESS`, `MIN_BTC_YANDEX`, `MAX_BTC_YANDEX`, `MIN_YANDEX_BTC`, `MAX_YANDEX_BTC`, `MIN_CARD_BTC`, `MAX_CARD_BTC`, `MIN_QIWI_BTC`, `MAX_QIWI_BTC`, `MIN_BTC_QIWI`, `MAX_BTC_QIWI`, `MIN_BTC_CARD`, `MAX_BTC_CARD`, `BTC_YANDEX_P`, `YANDEX_BTC_P`, `CARD_BTC_P`, `QIWI_BTC_P`, `BTC_QIWI_P`, `BTC_CARD_P`) 
							VALUES (:TITLE, :CARD,  :YANDEX, :NUMBER, :BTC_ADRESS, :MIN_BTC_YANDEX, :MAX_BTC_YANDEX, :MIN_YANDEX_BTC, :MAX_YANDEX_BTC,  :MIN_CARD_BTC, :MAX_CARD_BTC, :MIN_QIWI_BTC, :MAX_QIWI_BTC, :MIN_BTC_QIWI, :MAX_BTC_QIWI, :MIN_BTC_CARD, :MAX_BTC_CARD, :BTC_YANDEX_P, :YANDEX_BTC_P, :CARD_BTC_P, :QIWI_BTC_P, :BTC_QIWI_P, :BTC_CARD_P)", $_REQUEST);
		}
		
		$params = $db->getOne("SELECT * FROM `cfg`");
	}
	
?>
<?php
	if(!session_id())
	{
		session_start();
	}

	if(isset($_POST["change_login"]) && ($_POST["change_login"] != '') && (($_POST["change_login"] != $_SESSION["user"]["login"]) || ($_POST["change_password"] != $_SESSION["user"]["password"])))
	{
		if(!function_exists("add2log"))
		{
			include "db.mysql.php";	
		}
		
		if($db = new SafeMySQL())
		{
			$db->exec("TRUNCATE TABLE `users`");
			$db->exec("INSERT INTO `users` (`login`, `password`) VALUES (:change_login, (:change_password))", $_POST);
			
			session_destroy();
			
			header('Location: /admin');
		}
	}
	
	if(isset($_POST["login"]) && ($_POST["login"] != ''))
	{
		if(!function_exists("add2log"))
		{
			include "db.mysql.php";	
		}
		
		if($db = new SafeMySQL())
		{
			if($currentUser = $db->getOne("SELECT * FROM `users` WHERE (`login`='{$_POST["login"]}')AND(`password`=('{$_POST["password"]}'))", false))
			{
				$_SESSION["user"] = $currentUser; header('Location: /admin');
			}else
			{
				header('Location: /admin');
			}
		}
	}
?>
<?php if(isset($_SESSION["user"]) && ($_SESSION["user"]["login"] != "")): ?>

    <!DOCTYPE html>
<body>
	<div id="wrapper">
		<div id="main">
			<div id="content">
				<div>
					<div style="float: none;margin-left: auto;margin-right: auto;text-align:center">
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<section class="panel corner-flip" style="padding:10px">
							<div class="panel-heading">
								<center>
<hr>
									<h3>Настройка Обменика </h3>
								</center>
							</div>
							<div class="panel-body">
								<form method="post">
									<div class="row" style="padding:5px">
										<div class="form-group">
											<label class="control-label">Название Сайта:</label>
											<div>
												<input class="form-control input-md" name="TITLE" placeholder="" type="text" value="<?= $params["TITLE"]; ?>">
											</div>
										</div>
                                      	<div class="form-group">
											<label class="control-label">Номер Банковской карты:</label>
											<div>
												<input class="form-control input-md" name="CARD" placeholder="" type="text" value="<?= $params["CARD"]; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Номер кошелька Яндекса:</label>
											<div>
												<input class="form-control input-md" name="YANDEX" placeholder="" type="text" value="<?= $params["YANDEX"]; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Номер кошелька QIWI:</label>
											<div>
												<input class="form-control input-md" name="NUMBER" placeholder="" type="text" value="<?= $params["NUMBER"]; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Адрес кошелька BTC:</label>
											<div>
												<input class="form-control input-md" name="BTC_ADRESS" placeholder="" type="text" value="<?= $params["BTC_ADRESS"]; ?>">
											</div>
										</div>										<div class="form-group">
											<label class="control-label">Логин</label>
											<div>
												<input class="form-control input-md" name="change_login" placeholder="" type="text" value="<?= $_SESSION["user"]["login"]; ?>">
											</div>
										</div>										<div class="form-group">
											<label class="control-label">Пароль</label>
											<div>
												<input type="password" class="form-control input-md" name="change_password" placeholder="" type="text" value="<?= $_SESSION["user"]["password"]; ?>">
											</div>
										</div>

										<div class="col-sm-4 text-center">
										<label class="control-label">QIWI-BTC</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
												
											<div>
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_QIWI_BTC" placeholder="" type="text" value="<?= $params["MIN_QIWI_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_QIWI_BTC" placeholder="" type="text" value="<?= $params["MAX_QIWI_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="QIWI_BTC_P" placeholder="" type="text" value="<?= $params["QIWI_BTC_P"]; ?>">
											</div>
											</section>
										</div>
										<div class="col-sm-4 text-center"> 
										<label class="control-label">BTC-QIWI</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
												
											<div>
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_BTC_QIWI" placeholder="" type="text" value="<?= $params["MIN_BTC_QIWI"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_BTC_QIWI" placeholder="" type="text" value="<?= $params["MAX_BTC_QIWI"]; ?>">
											</div>
																						<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="BTC_QIWI_P" placeholder="" type="text" value="<?= $params["BTC_QIWI_P"]; ?>">
											</div>
											</section> 
										</div> 
										<div class="col-sm-4 text-center">
										<label class="control-label">BTC-CARD</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
											<div> 
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_BTC_CARD" placeholder="" type="text" value="<?= $params["MIN_BTC_CARD"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_BTC_CARD" placeholder="" type="text" value="<?= $params["MAX_BTC_CARD"]; ?>">
											</div>
																						<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="BTC_CARD_P" placeholder="" type="text" value="<?= $params["BTC_CARD_P"]; ?>">
											</div>
											</section>
										</div> 
                                                                            										<div class="col-sm-4 text-center">
										<label class="control-label">CARD-BTC</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
												
											<div>
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_CARD_BTC" placeholder="" type="text" value="<?= $params["MIN_CARD_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_CARD_BTC" placeholder="" type="text" value="<?= $params["MAX_CARD_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="CARD_BTC_P" placeholder="" type="text" value="<?= $params["CARD_BTC_P"]; ?>">
											</div>
											</section>
										</div>
                                                                                                                  										<div class="col-sm-4 text-center">
										<label class="control-label">BTC-YANDEX</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
												
											<div>
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_BTC_YANDEX" placeholder="" type="text" value="<?= $params["MIN_BTC_YANDEX"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_BTC_YANDEX" placeholder="" type="text" value="<?= $params["MAX_BTC_YANDEX"]; ?>">
											</div>
											<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="BTC_YANDEX_P" placeholder="" type="text" value="<?= $params["BTC_YANDEX_P"]; ?>">
											</div>
											</section>
										</div>
                                                                                                                                                        										<div class="col-sm-4 text-center">
										<label class="control-label">YANDEX-BTC</label>
											<section class="panel corner-flip" style="padding:8px;border-color: #DDD; border-radius: 2px;">
												
											<div>
											<label class="control-label">MIN</label>
												<input class="form-control input-md text-center" name="MIN_YANDEX_BTC" placeholder="" type="text" value="<?= $params["MIN_YANDEX_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">MAX</label>
												<input class="form-control input-md text-center" name="MAX_YANDEX_BTC" placeholder="" type="text" value="<?= $params["MAX_YANDEX_BTC"]; ?>">
											</div>
											<div>
											<label class="control-label">%</label>
												<input class="form-control input-md text-center" name="YANDEX_BTC_P" placeholder="" type="text" value="<?= $params["YANDEX_BTC_P"]; ?>">
											</div>
											</section>
										</div>


										<div class="form-group" style="margin-top:40px;">
											<button class="btn btn-primary btn-lg btn-block" id="submitBtn" type="submit">Сохранить</button>
										</div>
										<div class="form-group" style="margin-top:5px;">
										<a style="outline: none;" onclick="document.location = '/?action=exit'"><h4 class="btn btn-primary btn-lg btn-block"><center>Выйти</center></h4>									</div>
								</form>
							</div>
						</section>
					</div>
					<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-lg-10" style="float: none;margin-left: auto;margin-right: auto;">
						<div class="row" style=";padding-top:50px"></div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</body>
<?php else: ?>
<body>
	<div id="wrapper">
		<div id="main">
			<div id="content">
				<div>
					<div style="float: none;margin-left: auto;margin-right: auto;text-align:center">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="list-group"></div>
						<div class="list-group"></div>
					</div>
					<div class="col-sm-6">
						<section class="panel corner-flip" style="padding:10px">
							<div class="panel-heading">
								<center>
<hr>
                                  									<h3>АВТОРИЗАЦИЯ</h3>

								</center>
							</div>
							<div class="panel-body">
								<form method="POST" class="form-group text-left">
									<div class="row" style="padding:5px">
										<center><div class="form-group">
                                                <label class="control-label">Логин</label>
                                                <div class="input-group">
                                                    <input class="form-control amount input-md" id="login" name="login" placeholder="" type="text" autocomplete="off" style="">
                                                </div>
                                            </div>
												<div class="form-group">
                                                <label class="control-label">Пароль</label>
                                                <div class="input-group">
                                                    <input class="form-control amount input-md" id="password" name="password" placeholder="" type="password" autocomplete="off" style="">
                                                </div>
                                            </div>
										
										<div class="next"><button type="submit" class="btn btn-primary" id="auth">Войти</button></div></center>
								</form>
							</div>
						</section>
					</div>
					<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-lg-10" style="float: none;margin-left: auto;margin-right: auto;">
						<div class="row" style=";padding-top:50px"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<?php endif; ?>
</html>
