<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goods');

/*
**************************
(C)2010-2014 phpMyWind.com
update: 2014-5-30 14:07:16
person: Feng
**************************
*/


//初始化参数
$tbname = '#@__goods';
$gourl  = 'goods.php';
$action = isset($action) ? $action : '';


//添加服务信息
if($action == 'add')
{
	//栏目权限验证
	IsCategoryPriv($classid,'add');


	//初始化参数
	if(!isset($username))        $username = '';
	if(!isset($typeid))        $typeid = '-1';
	if(!isset($brandid))       $brandid = '-1';
	if(!isset($attrid))        $attrid = '';
	if(!isset($attrvalue))     $attrvalue = '';
	if(!isset($type))          $type   = '';
	if(!isset($flag))          $flag   = '';
	if(!isset($picarrs))       $picarrs = '';
	if(!isset($picarr))        $picarr = '';
	if(!isset($rempic))        $rempic = '';
	if(!isset($remote))        $remote = '';
	if(!isset($autothumb))     $autothumb = '';
	if(!isset($autodesc))      $autodesc = '';
	if(!isset($autodescsize))  $autodescsize = '';
	if(!isset($autopage))      $autopage = '';
	if(!isset($autopagesize))  $autopagesize = '';
	$attrstr = '';


	//获取parentstr
	$row = $dosql->GetOne("SELECT `parentid` FROM `#@__infoclass` WHERE `id`=$classid");
	$parentid = $row['parentid'];

	if($parentid == 0)
	{
		$parentstr = '0,';
	}
	else
	{
		$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__infoclass` WHERE `id`=$parentid");
		$parentstr = $r['parentstr'].$parentid.',';
	}


	//获取typepstr
	if($typeid != '-1')
	{
		$row = $dosql->GetOne("SELECT `parentid` FROM `#@__goodstype` WHERE `id`=$typeid");
		$typepid = $row['parentid'];
	
		if($typepid == 0)
		{
			$typepstr = '0,';
		}
		else
		{
			$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__goodstype` WHERE `id`=$typepid");
			$typepstr = $r['parentstr'].$typepid.',';
		}
	}
	else
	{
		$typepid  = '-1';
		$typepstr = '';
	}
	
	
	//获取品牌brandpstr
	if($brandid != '-1')
	{
		$row = $dosql->GetOne("SELECT `parentid` FROM `#@__goodsbrand` WHERE `id`=$brandid");
		$brandpid = $row['parentid'];
		if($brandpid == 0)
		{
			$brandpstr = '0,';
		}
		else
		{
			$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__goodsbrand` WHERE `id`=$brandpid");
			$brandpstr = $r['parentstr'].$brandpid.',';
		}
	}
	else
	{
		$brandpid  = '-1';
		$brandpstr = '';
	}


	//服务属性
	if(is_array($attrid) && is_array($attrvalue))
	{
		//组成服务属性与值
		$attrstr .= 'array(';
		$attrids = count($attrid);
		for($i=0; $i<$attrids; $i++)
		{
			$attrstr .= '"'.$attrid[$i].'"=>'.'"'.$attrvalue[$i].'"'; 
			if($i < $attrids-1)
			{
				$attrstr .= ',';
			}
		}
		$attrstr .= ');';
	}
	

	//文章属性
	if(is_array($flag))
	{
		$flag = implode(',',$flag);
	}

	
	if(is_array($type))
	{
		
		$type = implode(',',$type);
	}

     
			$flagarr = explode(',',$type);

			$dosql->Execute("SELECT * FROM `#@__goodstype` ORDER BY orderid ASC");
			while($rr = $dosql->GetArray())
			{
				
				

				if(in_array($rr['id'],$flagarr))
				{
					$type_name = $type_name.$rr['classname']." ";
				}

				
			}
	
	
		if(is_array($jineng1))
	{
		$jineng1 = implode(',',$jineng1);
	}
	
	if(is_array($jineng2))
	{
		$jineng2 = implode(',',$jineng2);
	}
	
	if(is_array($jineng3))
	{
		$jineng3 = implode(',',$jineng3);
	}
	
	
	if(is_array($jineng4))
	{
		$jineng4 = implode(',',$jineng4);
	}




   //技能证书组图
	if(is_array($picarrs) &&
	   is_array($picarrs_txt))
	{
		$picarrsNum = count($picarrs);
		$picarrsTmp = '';

		for($i=0;$i<$picarrsNum;$i++)
		{
			$picarrsTmp[] = $picarrs[$i].','.$picarrs_txt[$i];
		}

		$picarrs = serialize($picarrsTmp);
	}
	
	

	//文章组图
	if(is_array($picarr) &&
	   is_array($picarr_txt))
	{
		$picarrNum = count($picarr);
		$picarrTmp = '';

		for($i=0;$i<$picarrNum;$i++)
		{
			$picarrTmp[] = $picarr[$i].','.$picarr_txt[$i];
		}

		$picarr = serialize($picarrTmp);
	}


	//保存远程缩略图
	if($rempic=='true' and
	   preg_match("#^http:\/\/#i", $picurl))
	{
		$picurl = GetRemPic($picurl);
	}


	//保存远程资源
	if($remote == 'true')
	{
		$content = GetContFile($content);
	}


	//第一个图片作为缩略图
	if($autothumb == 'true')
	{
		$cont_str = stripslashes($content);
		preg_match_all('/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/', $cont_str, $imgurl);

		//如果存在图片
		if(isset($imgurl[1][0]))
		{
			$picurl = $imgurl[1][0];
			$picurl = substr($picurl, strpos($picurl, 'uploads/'));
		}
	}


	//自动提取内容到摘要
	if($autodesc == 'true')
	{
		if(empty($autodescsize) or !intval($autodescsize))
		{
			$autodescsize = 200;
		}

		$descstr     = ClearHtml($content);
		$description = ReStrLen($descstr, $autodescsize);

	}


	//自动分页
    if($autopage == 'true')
    {
        $content = ContAutoPage($content, $autopagesize*1024);
    }


	$posttime = GetMkTime($posttime);


	//自定义字段处理
	$fieldname  = '';
	$fieldvalue = '';
	$fieldstr   = '';

	$dosql->Execute("SELECT * FROM `#@__diyfield` WHERE infotype=4 AND $classid IN (`catepriv`) AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		$k = $row['fieldname'];
		$v = isset($_POST[$row['fieldname']]) ? addslashes($_POST[$row['fieldname']]) : '';

		if(!empty($row['fieldcheck']))
		{
			if(!preg_match($row['fieldcheck'], $v))
			{
				ShowMsg($row['fieldcback']);
				exit();
			}
		}

		if($row['fieldtype'] == 'datetime')
		{
			$v = GetMkTime($v);
		}
		
		if($row['fieldtype'] == 'fileall')
		{
			$vTxt = isset($_POST[$row['fieldname'].'_txt']) ? $_POST[$row['fieldname'].'_txt'] : '';

			if(is_array($v) &&
			   is_array($vTxt))
			{
				$vNum = count($v);
				$vTmp = '';
		
				for($i=0;$i<$vNum;$i++)
				{
					$vTmp[] = $v[$i].','.$vTxt[$i];
				}
				
				$v = serialize($vTmp);
			}
		}
		
		if($row['fieldtype'] == 'checkbox')
		{
			@$v = implode(',',$v);
		}

		$fieldname  .= ", $k";
		$fieldvalue .= ", '$v'";
		$fieldstr   .= ", $k='$v'";
	}


	//自动缩略图处理
	$r = $dosql->GetOne("SELECT `picwidth`,`picheight` FROM `#@__infoclass` WHERE `id`=$classid");
	if(!empty($r['picwidth']) &&
	   !empty($r['picheight']))
	{
		ImageResize(PHPMYWIND_ROOT.'/'.$picurl, $r['picwidth'], $r['picheight']);
	}


	$sql = "INSERT INTO `$tbname` (gz,typename,classid, parentid, parentstr, typeid, typepid, typepstr, brandid, brandpid, brandpstr, title, 
	colorval, boldval, flag, jineng1, jineng2, jineng3, jineng4, attrstr, birthday, nianling, bianhao, minzu, jkzk, height, qzyx, xinchou, xueli, cyjy, gzsj, gzzt, jg, jiguan, jzdz, sfz, jkz,   
	 zwpj, gzll, description, picurl, picarrs, picarr, hits, orderid, posttime, checkinfo {$fieldname})
	
	 VALUES ('$type','$type_name', '$classid', '$parentid', '$parentstr', '$typeid', '$typepid', '$typepstr', '$brandid', '$brandpid', '$username',
	  '$title', '$colorval', '$boldval', '$flag', '$jineng1', '$jineng2', '$jineng3', '$jineng4', '$attrstr', '$birthday', '$nianling', '$bianhao', '$minzu', '$jkzk', '$height', '$qzyx', '$xinchou', '$xueli', '$cyjy', '$gzsj', '$gzzt', '$jg', '$jiguan', '$jzdz', '$sfz', '$jkz',
	  
	   '$zwpj', '$gzll', '$description', '$picurl', '$picarrs', '$picarr', '$hits', '$orderid', '$posttime', '$checkinfo' {$fieldvalue})";
	  
	
	if($dosql->ExecNoneQuery($sql))
	{
		header("location:$gourl");
		exit();
	}
}


//修改服务信息
else if($action == 'update')
{
	//栏目权限验证
	IsCategoryPriv($cid,'update');


	//初始化参数
	if(!isset($username))        $username = '';
	if(!isset($typeid))        $typeid = '-1';
	if(!isset($brandid))       $brandid = '-1';
	if(!isset($attrid))        $attrid = '';
	if(!isset($attrvalue))     $attrvalue = '';
	if(!isset($flag))          $flag   = '';
	if(!isset($type))          $type   = '';
	if(!isset($picarrs))        $picarrs = '';
	if(!isset($picarr))        $picarr = '';
	if(!isset($rempic))        $rempic = '';
	if(!isset($remote))        $remote = '';
	if(!isset($autothumb))     $autothumb = '';
	if(!isset($autodesc))      $autodesc = '';
	if(!isset($autodescsize))  $autodescsize = '';
	if(!isset($autopage))      $autopage = '';
	if(!isset($autopagesize))  $autopagesize = '';
	$attrstr = '';


	//获取parentstr
	$row = $dosql->GetOne("SELECT `parentid` FROM `#@__infoclass` WHERE `id`=$classid");
	$parentid = $row['parentid'];

	if($parentid == 0)
	{
		$parentstr = '0,';
	}
	else
	{
		$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__infoclass` WHERE `id`=$parentid");
		$parentstr = $r['parentstr'].$parentid.',';
	}


	//获取typepstr
	if($typeid != '-1')
	{
		$row = $dosql->GetOne("SELECT `parentid` FROM `#@__goodstype` WHERE `id`=$typeid");
		$typepid = $row['parentid'];
	
		if($typepid == 0)
		{
			$typepstr = '0,';
		}
		else
		{
			$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__goodstype` WHERE `id`=$typepid");
			$typepstr = $r['parentstr'].$typepid.',';
		}
	}
	else
	{
		$typepid  = '-1';
		$typepstr = '';
	}
	
	
	//获取品牌brandpstr
	if($brandid != '-1')
	{
		$row = $dosql->GetOne("SELECT `parentid` FROM `#@__goodsbrand` WHERE `id`=$brandid");
		$brandpid = $row['parentid'];
		if($brandpid == 0)
		{
			$brandpstr = '0,';
		}
		else
		{
			$r = $dosql->GetOne("SELECT `parentstr` FROM `#@__goodsbrand` WHERE `id`=$brandpid");
			$brandpstr = $r['parentstr'].$brandpid.',';
		}
	}
	else
	{
		$brandpid  = '-1';
		$brandpstr = '';
	}


	//服务属性
	if(is_array($attrid) && is_array($attrvalue))
	{
		//组成服务属性与值
		$attrstr .= 'array(';
		$attrids = count($attrid);
		for($i=0; $i<$attrids; $i++)
		{
			$attrstr .= '"'.$attrid[$i].'"=>'.'"'.$attrvalue[$i].'"'; 
			if($i < $attrids-1)
			{
				$attrstr .= ',';
			}
		}
		$attrstr .= ');';
	}
	

	//文章属性
	if(is_array($flag))
	{
		$flag = implode(',',$flag);
	}
	
	
	if(is_array($type))
	
	{
		
		$type = implode(',',$type);
	}


if(is_array($jineng1))
	{
		$jineng1 = implode(',',$jineng1);
	}
	
	if(is_array($jineng2))
	{
		$jineng2 = implode(',',$jineng2);
	}
	
	if(is_array($jineng3))
	{
		$jineng3 = implode(',',$jineng3);
	}
	
	
	if(is_array($jineng4))
	{
		$jineng4 = implode(',',$jineng4);
	}
	
	

$flagarr = explode(',',$type);


			$dosql->Execute("SELECT * FROM `#@__goodstype` ORDER BY orderid ASC");
			while($rr = $dosql->GetArray())
			{
				
				

				if(in_array($rr['id'],$flagarr))
				{
					$type_name = $type_name.$rr['classname']." ";
				}

				
			}

   
  //技能证书组图
	if(is_array($picarrs) &&
	   is_array($picarrs_txt))
	{
		$picarrsNum = count($picarrs);
		$picarrsTmp = '';

		for($i=0;$i<$picarrsNum;$i++)
		{
			$picarrsTmp[] = $picarrs[$i].','.$picarrs_txt[$i];
		}

		$picarrs = serialize($picarrsTmp);
	}


	//文章组图
	if(is_array($picarr) &&
	   is_array($picarr_txt))
	{
		$picarrNum = count($picarr);
		$picarrTmp = '';

		for($i=0;$i<$picarrNum;$i++)
		{
			$picarrTmp[] = $picarr[$i].','.$picarr_txt[$i];
		}

		$picarr = serialize($picarrTmp);
	}


	//保存远程缩略图
	if($rempic=='true' and
	   preg_match("#^http:\/\/#i", $picurl))
	{
		$picurl = GetRemPic($picurl);
	}


	//保存远程资源
	if($remote == 'true')
	{
		$content = GetContFile($content);
	}


	//第一个图片作为缩略图
	if($autothumb == 'true')
	{
		$cont_str = stripslashes($content);
		preg_match_all('/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/', $cont_str, $imgurl);

		//如果存在图片
		if(isset($imgurl[1][0]))
		{
			$picurl = $imgurl[1][0];
			$picurl = substr($picurl, strpos($picurl, 'uploads/'));
		}
	}


	//自动提取内容到摘要
	if($autodesc == 'true')
	{
		if(empty($autodescsize) or !intval($autodescsize))
		{
			$autodescsize = 200;
		}

		$descstr     = ClearHtml($content);
		$description = ReStrLen($descstr, $autodescsize);

	}


	//自动分页
    if($autopage == 'true')
    {
        $content = ContAutoPage($content, $autopagesize*1024);
    }


	$posttime = GetMkTime($posttime);


	//自定义字段处理
	$fieldname  = '';
	$fieldvalue = '';
	$fieldstr   = '';

	$dosql->Execute("SELECT * FROM `#@__diyfield` WHERE infotype=4 AND $classid IN (`catepriv`) AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		$k = $row['fieldname'];
		$v = isset($_POST[$row['fieldname']]) ? addslashes($_POST[$row['fieldname']]) : '';

		if(!empty($row['fieldcheck']))
		{
			if(!preg_match($row['fieldcheck'], $v))
			{
				ShowMsg($row['fieldcback']);
				exit();
			}
		}

		if($row['fieldtype'] == 'datetime')
		{
			$v = GetMkTime($v);
		}
		
		if($row['fieldtype'] == 'fileall')
		{
			$vTxt = isset($_POST[$row['fieldname'].'_txt']) ? $_POST[$row['fieldname'].'_txt'] : '';

			if(is_array($v) &&
			   is_array($vTxt))
			{
				$vNum = count($v);
				$vTmp = '';
		
				for($i=0;$i<$vNum;$i++)
				{
					$vTmp[] = $v[$i].','.$vTxt[$i];
				}
				
				$v = serialize($vTmp);
			}
		}
		
		if($row['fieldtype'] == 'checkbox')
		{
			@$v = implode(',',$v);
		}

		$fieldname  .= ", $k";
		$fieldvalue .= ", '$v'";
		$fieldstr   .= ", $k='$v'";
	}

	//自动缩略图处理
	$r = $dosql->GetOne("SELECT `picwidth`,`picheight` FROM `#@__infoclass` WHERE `id`=$classid");
	if(!empty($r['picwidth']) &&
	   !empty($r['picheight']))
	{
		ImageResize(PHPMYWIND_ROOT.'/'.$picurl, $r['picwidth'], $r['picheight']);
	}


	$sql = "UPDATE `$tbname` SET  gz='$type', typename='$type_name', classid='$classid', parentid='$parentid', parentstr='$parentstr', typeid='$typeid', typepid='$typepid', 
	typepstr='$typepstr', brandid='$brandid', brandpid='$brandpid',  province='$province', city='$city', area='$area', title='$title', colorval='$colorval', 
	boldval='$boldval', flag='$flag', attrstr='$attrstr', birthday='$birthday', nianling='$nianling', bianhao='$bianhao', minzu='$minzu', jkzk='$jkzk',
	 height='$height', qzyx='$qzyx', xinchou='$xinchou', xueli='$xueli', cyjy='$cyjy', gzsj='$gzsj', gzzt='$gzzt', jg='$jg', jiguan='$jiguan', jzdz='$jzdz',
	  sfz='$sfz', jkz='$jkz', zwjn='$zwjn', zwpj='$zwpj', gzll='$gzll', description='$description', picurl='$picurl', picarrs='$picarrs', 
	  picarr='$picarr', hits='$hits', orderid='$orderid', posttime='$posttime', checkinfo='$checkinfo', jineng1='$jineng1', jineng2='$jineng2', jineng3='$jineng3', jineng4='$jineng4' {$fieldstr} WHERE id=$id";
	if($dosql->ExecNoneQuery($sql))
	{
		header("location:$gourl");
		exit();
	}
}


//修改审核状态
else if($action == 'check')
{
	//审核权限
	$r = $dosql->GetOne("SELECT `classid` FROM `#@__goods` WHERE `id`=$id");
	IsCategoryPriv($r['classid'],'update');


	if($checkinfo == '已审')
	{
		$dosql->ExecNoneQuery("UPDATE `$tbname` SET `checkinfo`='false' WHERE `id`=$id");
		echo '<a href="javascript:;" onclick="CheckInfo('.$id.',\'未审\')" title="点击进行审核与未审操作">未审</a>';
		exit();
	}

	if($checkinfo == '未审')
	{
		$dosql->ExecNoneQuery("UPDATE `$tbname` SET `checkinfo`='true' WHERE `id`=$id");
		echo '<a href="javascript:;" onclick="CheckInfo('.$id.',\'已审\')" title="点击进行审核与未审操作">已审</a>';
		exit();
	}
}


//无状态返回
else
{
	header("location:$gourl");
	exit();
}
?>