<?php
function InserIntoDB($text, $ori_img, $time, $zhuye, $yonghuming, $touxiangsrc, $lat, $lng)
{
	$mysql = new SaeMysql();

	$sql = "SELECT * FROM `user_timeline` WHERE  `yonghuming` = '". $yonghuming ."' AND `time` = '". $time ."'";
	$data = $mysql->getData($sql);

	if(is_array($data) != 1)
	{		
		$sql = "INSERT INTO `app_luckytrace`.`user_timeline` (`text`, `ori_img`, `time`, `zhuye`, `yonghuming`, `touxiangsrc`, `lat`, `lng`)
		VALUES ('".$text."', '".$ori_img."', '".$time."', '".$zhuye."', '".$yonghuming."', '".$touxiangsrc."', '".$lat."', '".$lng."');";
		
		$mysql->runSql( $sql );

		if( $mysql->errno() != 0 )
		{
			die( "Error:" . $mysql->errmsg() );
		}
	
	$mysql->closeDb();
	}
}

?>