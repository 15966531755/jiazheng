
<?
switch ($_GET['c'])
{
case 'login';
$_SESSION['state']=time();
$url="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101216639&redirect_uri=http://www.ygayi.com/qqlogin.php?a=callback&state=".$_SESSION['state']."&scope=get_user_info";
redirect($url, $delay =0,$js = false,$jsWrapped = true, $return = false);
break;
case 'callback';

$code=addslashes($_GET['code']);
$state=addslashes($_GET['state']);

//防止xss跨站攻击
if(($code=='') or ($state<>$_SESSION['state']))
{
exit('err,please back');
}

$url='https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101216639&client_secret=8a3fee399a8e38ab2d596112caff50d3&code='.$code.'&redirect_uri=http://www.ygayi.com/qqlogin.php?a=callback';
//redirect($url, $delay =0,$js = false,$jsWrapped = true, $return = false);
$access_token=vita_get_url_content($url);

if ($access_token)
{
  $url='https://graph.qq.com/oauth2.0/me?'.$access_token;
  $callback=vita_get_url_content($url);

  if ($callback)
  {
   $content=str_replace('callback(',"",$callback);
   $content=str_replace(');',"",$content);
   $content=json_decode($content);
   $client_id=$content->client_id;
   
       //判断是否合法
       if ($client_id=='101216639')
       {
       $openid=$content->openid;
            //此处省略db操作，你可以使用$openid去你自己数据库查有没这个用户唯一标识，没有就去插入，如果需要用户昵称等资料可以调用接口https://graph.qq.com/user/get_user_info实现代码如下
       $url="https://graph.qq.com/user/get_user_info?".$access_token."&oauth_consumer_key=8a3fee399a8e38ab2d596112caff50d3&openid=".$openid."";
       $userinfo=vita_get_url_content($url);
       $userinfo=json_decode($userinfo);
       $nickname=$userinfo->nickname;
       // 然后赋值session执行登入    
       redirect('http://www.ygayi.com', $delay =0,$js = false,$jsWrapped = true, $return = false);exit;
       }
   }
}
exit('time out');
break;
default:
}

//自定义跳转函数
function redirect($url, $delay = 0, $js = false, $jsWrapped = true, $return = false)        
    {        
    $delay = (int)$delay;        
    if (!$js) {        
      if (headers_sent() || $delay > 0) {
            echo'      
   <html>        
       <head>        
       <meta http-equiv="refresh" content="'.$delay.';URL='.$url.'" />        
       </head>        
       </html>';        
            exit;        
        } else {        
            header("Location:".$url."");        
            exit;        
        }        
    }        
    $out = '';        
    if ($jsWrapped) {        
        $out .= '<script language="JavaScript" type="text/javascript">';        
    }        
    $url = rawurlencode($url);        
    if ($delay > 0) {        
        $out .= "window.setTimeOut(function () { document.location='{$url}'; }, {$delay});";        
    } else {        
        $out .= "document.location='{$url}';";        
    }        
    if ($jsWrapped) {        
        $out .= '</script>';       
   }        
    if ($return) {        
        return $out;        
    }        
    echo $out;        
        exit;        
    } 
?>