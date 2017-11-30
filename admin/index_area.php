<?php

require_once(dirname(__FILE__).'/inc/config.inc.php');


		

	$dosql->Execute("select * from area where fatherid=".$_GET['cityid']);

	while($row = $dosql->GetArray()){
		$city[]=$row;
	}
?>
<select id="area" name="area">
	<option value="0">请选择区</option>
 
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['areaid']?>' ><?php echo $v['area']?></option>
	<?php 
		}
	?>
</select>