<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
	
	$dosql->Execute("select * from city where fatherid=".$_GET['provinceid']);

	while($rows = $dosql->GetArray()){
		$city[]=$rows;
	}
?>
<select id="citys" class="province" name="citys" onchange="selectAreas()">
	<option value="0">请选择市</option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['cityid']?>'><?php echo $v['city']?></option>
	<?php 
		}
	?>
</select>