<?php
ini_set('display_errors', 'Off');
function getIp(){
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if (!isset($ip_address)){
            if (isset($_SERVER['REMOTE_ADDR']))
            $ip_address=$_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}

function occurrenceCity($to = 'utf-8'){
    $ip = getIp();
    $xml =  simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.$ip);
    if($xml->ip->message){
        if( $to == 'utf-8' ){
            return $xml->ip->message;}else
            {
                if( function_exists('iconv')) return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->message);
                else return "The library iconv is not supported by your server";
            }

    }else{
        if($to == 'utf-8'){
           return $xml->ip->city;
        }else{
            if(function_exists( 'iconv' ))return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->city);
            else return "The library iconv is not supported by your server";
        }
    }
}

function occurrenceRegion($to = 'utf-8'){
    $ip = getIp();
    $xml =  simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.$ip);
    if($xml->ip->message){
        if( $to == 'utf-8' ){
            return $xml->ip->message;}else
            {
                if( function_exists('iconv')) return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->message);
                else return "The library iconv is not supported by your server";
            }

    }else{
        if($to == 'utf-8'){
           return $xml->ip->region;
        }else{
            if(function_exists( 'iconv' ))return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->region);
            else return "The library iconv is not supported by your server";
        }
     }
}

if((isset($_POST['name']) && isset($_POST['phone'])) && ($_POST['name'] != "" && $_POST['phone'] != "")) {	
	$city = occurrenceCity();
	$region = occurrenceRegion();
	$ip = $_SERVER['REMOTE_ADDR'];
	$time = date('Y-m-d H:i:s');
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$subphone = str_replace(array(" ", "(", ")", "-"), "", $phone);
	$phone = "<a href=\"tel:".$subphone."\">".$phone."</a>";
	$utm_medium = $_POST['utm_medium'];
	$utm_source = $_POST['utm_source'];
	$utm_campaign = $_POST['utm_campaign'];
	$utm_term = $_POST['utm_term'];
	$utm_content = $_POST['utm_content'];
	//$cm_title = $_POST['cm_title'];

	$message = '<table border="1"><tr><td style="width: 50%;">Имя посетителя:</td><td style="width: 50%;">'.$name.'</td></tr><tr><td>Телефон посетителя:</td><td>'.$phone.'</td></tr><tr><td>Время заявки</td><td>'.$time.'</td></tr><tr><td>IP посетителя:</td><td>'.$ip.'</td></tr><tr><td>Область посетителя</td><td>'.$region.'</td></tr><tr><td>Город посетителя</td><td>'.$city.'</td></tr><tr><td>Канал кампании (utm_medium)</td><td>'.$utm_medium.'</td></tr><tr><td>Источник кампании (utm_source)</td><td>'.$utm_source.'</td></tr><tr><td>Название кампании (utm_campaign)</td><td>'.$utm_campaign.'</td></tr><tr><td>Ключевое слово кампании (utm_term)</td><td>'.$utm_term.'</td></tr><tr><td>Содержание кампании (utm_content)</td><td>'.$utm_content.'</td></tr>';

	$message = iconv("UTF-8", "WINDOWS-1251", $message);

	include "class.phpmailer.php";

	$mail = new PHPMailer();
	$mail->From = 'no-reply@plastika.ru';
	$mail->FromName = 'plastika.ru';
	//$mail->AddAddress('remont@mebelman-group.ru');
	$mail->AddAddress('tatarnikova5@yandex.ru');
	$mail->IsHTML(true);
	$mail->Subject = iconv("UTF-8", "WINDOWS-1251", "Лид с сайта plastika.ru");

	// if(isset($_FILES['file1'])) {
	// 	if($_FILES['file1']['error'] == 0) {
	// 		$mail->AddAttachment($_FILES['file1']['tmp_name'],$_FILES['file1']['name']);
	// 	}
	// 	if(isset($_FILES['file2'])) {
	// 		if($_FILES['file2']['error'] == 0) {
	// 			$mail->AddAttachment($_FILES['file2']['tmp_name'],$_FILES['file2']['name']);
	// 		}
	// 		if(isset($_FILES['file3'])) {
	// 			if($_FILES['file3']['error'] == 0) {
	// 				$mail->AddAttachment($_FILES['file3']['tmp_name'],$_FILES['file3']['name']);
	// 			}
	// 			if(isset($_FILES['file4'])) {
	// 				if($_FILES['file4']['error'] == 0) {
	// 					$mail->AddAttachment($_FILES['file4']['tmp_name'],$_FILES['file4']['name']);
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	$mail->Body = $message;

	if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);
	if (!empty($_POST['submit'])) send_mail();
	
/* send calltouch */
// $subj = "Заявка";
// $call_value =$_COOKIE['call_s'];
// $FirstStr =strpos($call_value,","); 
// $LastStr =strrpos($call_value,","); 
// $call_value = substr( $call_value,$FirstStr +1,$LastStr - $FirstStr -1 ); 
// if (isset($_POST['call_value'])) { $call_value = $_POST['call_value']; }
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
// curl_setopt($ch, CURLOPT_URL,"https://api-node7.calltouch.ru/calls-service/RestAPI/22263/requests/orders/register/");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,
// "fio=".urlencode($_POST['name'])."&phoneNumber=".$_POST['phone']."&subject=".urlencode($subj)."".($call_value != 'undefined' ? "&sessionId=".$call_value : ""));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $calltouch = curl_exec ($ch);
// curl_close ($ch);
/* send calltouch */
	
	unset($_POST['name']);
	unset($_POST['phone']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Спасибо за заявку!</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/commons.css?ver=0.1">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117434527-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-117434527-1');
	</script> -->
	<!-- Yandex.Metrika counter -->
	<!-- <script type="text/javascript" >
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter48428561 = new Ya.Metrika({
						id:48428561,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true,
						webvisor:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/48428561" style="position:absolute; left:-9999px;" alt="" /></div></noscript> -->
	<!-- /Yandex.Metrika counter -->
</head>
<body>
	<header class="header">
      <div class="container">
        <div class="header__logo"><a href="./"> <img src="./images/icon/logo.svg" alt="plastika"></a>
          <div class="header__slogan">
            <p>Корпусная мебель по&nbsp;готовым и&nbsp;индивидуальным проектам в&nbsp;Москве и&nbsp;по&nbsp;всей России</p>
          </div>
        </div>
        <div class="header__contacts"> 
          <div class="header__social"><a href="https://vk.com/nezhinskij" target="_blank"> <img src="./images/icon/vk.png" alt="vk"></a><a href="https://api.whatsapp.com/send?phone=79175666555" target="_blank"> <img src="./images/icon/whatsapp.png" alt="whatsapp"></a><a href="https://t.me/Tu0Oe1EnK5xkvC77" target="_blank"> <img src="./images/icon/telegram.png" alt="telegram"></a></div><a class="header__tel" href="tel:+78003019141"><img src="./images/icon/tel.png" alt="phone"><span>8 (800) 301-91-41</span></a>
        </div>
      </div>
    </header>
	<div id="ty-main">
		<div class="container">
			<div class="header">Спасибо за&nbsp;заявку!</div>
			<div class="text">Мы свяжемся с вами в ближайшее время</div>
			<a href="./" class="button">Вернуться на сайт</a>
		</div>
	</div>
	<script src="js/libs/jquery-3.3.1.min.js" defer></script>
    <script src="js/libs/slick.min.js" defer></script>
    <script src="js/common.js" defer></script>
	
<!-- calltouch code -->
<!-- <script type="text/javascript">
(function (w, d, nv, ls, yac){
    var lwait = function (w, on, trf, dly, ma, orf, osf) { var pfx = "ct_await_", sfx = "_completed";  if(!w[pfx + on + sfx]) { var ci = clearInterval, si = setInterval, st = setTimeout , cmld = function () { if (!w[pfx + on + sfx]) {  w[pfx + on + sfx] = true; if ((w[pfx + on] && (w[pfx + on].timer))) { ci(w[pfx + on].timer);  w[pfx + on] = null;   }  orf(w[on]);  } };if (!w[on] || !osf) { if (trf(w[on])) { cmld();  } else { if (!w[pfx + on]) { w[pfx + on] = {  timer: si(function () { if (trf(w[on]) || ma < ++w[pfx + on].attempt) { cmld(); } }, dly), attempt: 0 }; } } }   else { if (trf(w[on])) { cmld();  } else { osf(cmld); st(function () { lwait(w, on, trf, dly, ma, orf); }, 0); } }} else {orf(w[on]);}};
    var ct = function (w, d, e, c, n) { var a = 'all', b = 'tou', src = b + 'c' + 'h';  src = 'm' + 'o' + 'd.c' + a + src; var jsHost = "https://" + src, s = d.createElement(e); var jsf = function (w, d, s, h, c, n, yc) { if (yc !== null) { lwait(w, 'yaCounter'+yc, function(obj) { return (obj && obj.getClientID ? true : false); }, 50, 100, function(yaCounter) { s.async = 1; s.src = jsHost + "." + "r" + "u/d_client.js?param;" + (yaCounter  && yaCounter.getClientID ? "ya_client_id" + yaCounter.getClientID() + ";" : "") + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":171110}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(s, p); }, function (f) { if(w.jQuery) {  w.jQuery(d).on('yacounter' + yc + 'inited', f ); }}); } else { s.async = 1; s.src = jsHost + "." + "r" + "u/d_client.js?param;" + (c ? "client_id" + c + ";" : "") + "ref" + escape(d.referrer) + ";url" + escape(d.URL) + ";cook" + escape(d.cookie) + ";attrs" + escape("{\"attrh\":" + n + ",\"ver\":171110}") + ";"; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(s, p); } }; if (!w.jQuery) { var jq = d.createElement(e); jq.src = jsHost + "." + "r" + 'u/js/jquery-1.7.min.js'; jq.onload = function () { lwait(w, 'jQuery', function(obj) { return (obj ? true : false); }, 30, 100, function () { jsf(w, d, s, jsHost, c, n, yac); }); }; p = d.getElementsByTagName(e)[0]; p.parentNode.insertBefore(jq, p); } else { jsf(w, d, s, jsHost, c, n, yac); } };
    var gaid = function (w, d, o, ct, n) { if (!!o) { lwait(w, o, function (obj) {  return (obj && obj.getAll ? true : false); }, 200, (nv.userAgent.match(/Opera|OPR\//) ? 10 : 20), function (gaCounter) { var clId = null; try {  var cnt = gaCounter && gaCounter.getAll ? gaCounter.getAll() : null; clId = cnt && cnt.length > 0 && !!cnt[0] && cnt[0].get ? cnt[0].get('clientId') : null; } catch (e) { console.warn("Unable to get clientId, Error: " + e.message); } ct(w, d, 'script', clId, n); }, function (f) { w[o](function () {  f(w[o]); })});} else{ ct(w, d, 'script', null, n); }};
    var cid  = function () { try { var m1 = d.cookie.match('(?:^|;)\\s*_ga=([^;]*)');if (!(m1 && m1.length > 1)) return null; var m2 = decodeURIComponent(m1[1]).match(/(\d+\.\d+)$/); if (!(m2 && m2.length > 1)) return null; return m2[1]} catch (err) {}}();
    if (cid === null && !!w.GoogleAnalyticsObject){
        if (w.GoogleAnalyticsObject=='ga_ckpr') w.ct_ga='ga'; else w.ct_ga = w.GoogleAnalyticsObject;
        if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1){new Promise(function (resolve) {var db, on = function () {  resolve(true)  }, off = function () {  resolve(false)}, tryls = function tryls() { try { ls && ls.length ? off() : (ls.x = 1, ls.removeItem("x"), off());} catch (e) { nv.cookieEnabled ? on() : off(); }};w.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on) : "MozAppearance" in d.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db.onsuccess = off) : /constructor/i.test(w.HTMLElement) ? tryls() : !w.indexedDB && (w.PointerEvent || w.MSPointerEvent) ? on() : off();}).then(function (pm){
            if (pm){gaid(w, d, w.ct_ga, ct, 2);}else{gaid(w, d, w.ct_ga, ct, 3);}})}else{gaid(w, d, w.ct_ga, ct, 4);}
    }else{ct(w, d, 'script', cid, 1);}})
(window, document, navigator, localStorage, "48428561");
</script> -->
<!-- /calltouch code -->
	
</body>
</html>