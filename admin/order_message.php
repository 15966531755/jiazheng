<?php	

require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder');

		$row = $dosql->GetOne("SELECT count(*) as count FROM `#@__yuyue` where checkinfo = '' ");
		if($row['count'] > 0)
	{
		$count = $row['count'];
		echo "
		 <table cellspacing='0' cellpadding='0' width='100%' bgcolor='#cfdef4' border='0'>
  <tr>
    <td style='color: #0f2c8c' width='30' height='24'></td>
    <td style='font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px' valign='center' width='100%'> 新订单提醒</td>
    <td style='padding-top: 2px;padding-right:2px' valign='center' align='right' width='19'><span title='关闭' style='cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;' onclick='messageclose()' >×</span><!-- <img title=关闭 style='cursor: hand' onclick=closediv() hspace=3 src='msgclose.jpg'> --></td>
  </tr>
  <tr>
    <td style='padding-right: 1px; padding-bottom: 1px' colspan='3' height='70'>
    <div id='popMsgContent'>
      <p>您有<a  href='goodsorder.php' target='main'><strong style='color:#ff0000' id='spanNewOrder'>".$count."</strong></a>个未确认订单
   
      <p align='center' style='word-break:break-all'><a href='goodsorder.php' target='main'><span style='color:#ff0000'>查看订单</span></a></p>
    </div>
    </td>
  </tr>
  </table>
		";
	}
		
?>