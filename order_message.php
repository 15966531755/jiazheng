<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder');


		$dosql->Execute("SELECT * FROM `#@__yuyue` where checkinfo = '' ");
		if($dosql->GetTotalRow() > 0)
	{
		echo "
		 <table cellspacing='0' cellpadding='0' width='100%' bgcolor='#cfdef4' border='0'>
  <tr>
    <td style='color: #0f2c8c' width='30' height='24'></td>
    <td style='font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px' valign='center' width='100%'> ggggggg</td>
    <td style='padding-top: 2px;padding-right:2px' valign='center' align='right' width='19'><span title='关闭' style='cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;' onclick='messageclose()' >×</span><!-- <img title=关闭 style='cursor: hand' onclick=closediv() hspace=3 src='msgclose.jpg'> --></td>
  </tr>
  <tr>
    <td style='padding-right: 1px; padding-bottom: 1px' colspan='3' height='70'>
    <div id='popMsgContent'>
      <p>sssss<strong style='color:#ff0000' id='spanNewOrder'>1</strong>dddddd
      <strong style='color:#ff0000' id='spanNewPaid'>0</strong>ffffff</p>
      <p align='center' style='word-break:break-all'><a href='order.php?act=list'><span style='color:#ff0000'>ssssss</span></a></p>
    </div>
    </td>
  </tr>
  </table>
		";
	}
		
?>