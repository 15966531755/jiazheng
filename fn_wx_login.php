<?php

	$appid = "wx5843ed17c2413f6f";
	$url = 'https://open.weixin.qq.com/connect/qrconnect?appid=wx5843ed17c2413f6f&redirect_uri=http://www.ygayi.com/fn_callback.php&response_type=code&scope=snsapi_login&state=4aea2c5bfece7b51273420ba2c712ea4#wechat_redirect';
	header("Location:".$url);

?>