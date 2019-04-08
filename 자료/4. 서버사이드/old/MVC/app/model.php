<?php
class Model{
	private $url,$option;
	function __construct(){
		$this->url = 'http://vhost32.skill17.local/Module_F/WSC_Statistics.php?wsdl';
		$this->option = array('cache_wsdl'=>WSDL_CACHE_NONE);
	}

	function data_get($data){
		$soap = new SoapClient($this->url,$this->option);
		$result = $data == 'results' ? $soap->getResults() : $soap->getList($data);
		return $result;
	}

	function con_opt($name=false,$de=false){
		$xml = $this->data_get('countrys');
		$data = array();
		$_SESSION["$name"] = false;
		foreach($xml->countrys->country  as $country ){
			$iso = trim($country->iso);
			$country = trim($country->_);
			$arr = array('iso'=>$iso,'country'=>$country,'chk'=>'');
			if($de == $iso){
				$_SESSION["$name"] = true;
				$arr['chk'] = " selected='selected' "  ;
			}
			$data[$iso] = $arr;
		}
		ksort($data,SORT_LOCALE_STRING);
		return $data;
	}

	function country($iso){
		$isok = false;
		$xml = $this->data_get('countrys');
		foreach($xml->countrys->country  as $country ){
			$con_iso = trim($country->iso);
			$country = trim($country->_);
			if($iso == $con_iso){
				$isok = true;
				return $iso.' - '.$country;
			}
		}
		if($isok == false){
			return $iso .' - [Do not have data]';
		}
	}

	function table_err(){
		$msg = '';
		if(!$_SESSION['con1'] and $this->con1 != '_space_' and $this->con1 != '_none_' and $this->con1){
			$msg = '<p>Wrong data. Please select again.</p>';
		}else if($this->con1 == '_space_'){
			$msg = '<p>Please select country.</p>';
		}
		return $msg;
	}

	function trade_opt(){
		$xml = $this->data_get('skills');
		$data = array();
		$_SESSION['trade'] =false;
		foreach($xml->skills->skill as $skill){
			$number = trim($skill->number);
			$name_en = trim($skill->name_en);
			$arr = array('number'=>$number,'name_en'=>$name_en,'chk'=>'');
			if($this->trade == $number){
				$_SESSION['trade'] =true;
				$arr['chk'] = " selected='selected' "  ;
			}
			$data[$number] = $arr;
		}
		ksort($data,SORT_LOCALE_STRING);
		return $data;
	}

	function skill($num){
		$xml = $this->data_get('skills');
		foreach($xml->skills->skill as $skill){
			$number = trim($skill->number);
			$name_en = trim($skill->name_en);
			if($number == $num){
				return $number.' - '.$name_en;
			}
		}
	}

	function year_order(){
		$arr = array('2007','2009','2011');
		return $arr;
	}

	function result(){
		$xml = $this->data_get('results');
		$data = array();
		foreach($xml->results->result as $result){
			$year = trim($result->year);
			$skill_number  = trim($result->skill_number );
			$country_iso  = trim($result->country_iso );
			$medal  = isset($result->score->award) ? trim($result->score->award) : false;
			$points  = trim($result->score->points);

			if($country_iso == $this->con1){
				$skill = $this->skill($skill_number);
				$data["$skill"]["$year"] = $medal;
			}
		}

		ksort($data,SORT_LOCALE_STRING);

		return $data;
	}

	function diagram(){
		$xml = $this->data_get('results');
		$data = array();
		$chk = false;
		foreach($xml->results->result as $result){
			$year = trim($result->year);
			$skill_number  = trim($result->skill_number );
			$country_iso  = trim($result->country_iso );
			$medal  = isset($result->score->award) ? trim($result->score->award) : false;
			$points  = trim($result->score->points);

			if( ($this->trade == $skill_number and $this->con2 == $country_iso) or ($this->trade == $skill_number and $this->con2 == 'all')){
				$chk = true;
				$data["$country_iso"]['iso'] = $this->country($country_iso);
				$data["$country_iso"]['year']["$year"] = $points;
			}
		}
		
		if(isset($data)){
			$tmp = array();
			foreach($data as $trade=>$arr){
				ksort($arr['year']);
				$tmp["$trade"] = array('iso'=>$arr['iso'],'year'=>$arr['year']);
			}
			ksort($tmp,SORT_LOCALE_STRING);
		}

		$_SESSION['all_chk'] = $this->con2;

		$_SESSION['result_data'] = null;
		$_SESSION['result_data'] = $tmp;
		
		$re = false;
		if($chk){
			$re = '<img src="'.HOME.'/app/diagram_img.php" />';
		}else if($_SESSION['con2']and $_SESSION['trade']){
			$re = '<p>Do not have data</p>';
		}else if($this->con2 == '_space_' and $this->trade == '_space_'){
			$re = '<p>Please select trade or country.</p>';
		}else{
			if($_SESSION['con2'] and !$_SESSION['trade']){
				$re = '<p>Please select trade.</p>';
			}
			if($_SESSION['trade'] and !$_SESSION['con2']){
				$re .= '<p>Please select country.</p>';
			}
		}
		return $re;
	}

	function img_l($x,$y,$x2,$y2,$color='0x868686'){
		imageline($this->img,$x,$y,$x2,$y2,$color);
	}

	function img_str($x,$y,$txt){
		imagestring($this->img,2,$x,$y,$txt,'0x000000');
	}

	function diagram_img(){
		//header('content-type:image/jpeg');
		$img = imagecreatetruecolor(650,1000);
		$this->img = $img;
		imagefill($img,0,0,'0xffffff');

		$y = 24;
		for($i = 0; $i < 25; $i++){
			$txt = 600 - $i * 10;
			$this->img_l(34,$y,306,$y);
			$this->img_str(5,$y-8,$txt);
			$y += 21;
		}

		$this->img_l(38,24,38,534);
		$x = 126;
		$year_order = $this->year_order();
		for($i = 0 ; $i < 3; $i++){
			$txt = $year_order["$i"];
			$this->img_str($x-58,535,$txt);
			$this->img_l($x,529,$x,534);
			$x += 90;
		}

		$result_data = $_SESSION['result_data'];
		$y = 32;

		$all_chk = $_SESSION['all_chk'];

		if($all_chk == 'all'){
			$avg_2007_score = $avg_2007_cnt = 0;
			$avg_2009_score = $avg_2009_cnt = 0;
			$avg_2011_score = $avg_2011_cnt = 0;
		}

		foreach($result_data as $trade=>$result){
			//color select
			$color = imagecolorallocate($this->img,rand(100,200),rand(100,200),rand(100,200));

			//diagram
			$this->line($result['year'],$color);

			//side trade display

			imagesetthickness($this->img,3);
			$this->img_l(317,$y,344,$y,$color);
			$this->dot(332,$y,$color);
			$this->img_str(348,$y - 5,$result['iso']);
			$y += 21;

			if($all_chk == 'all'){
				if(array_key_exists('2007',$result['year'])){
					if($result['year']['2007'] > 360){
						$avg_2007_score += $result['year']['2007'];
						$avg_2007_cnt++;
					}
				}

				
				if(array_key_exists('2009',$result['year'])){
					if($result['year']['2009'] > 360){
						$avg_2009_score += $result['year']['2009'];
						$avg_2009_cnt++;
					}
				}

				
				if(array_key_exists('2011',$result['year'])){
					if($result['year']['2011'] > 360){
						$avg_2011_score += $result['year']['2011'];
						$avg_2011_cnt++;
					}
				}
			}
		}
		if($all_chk == 'all'){
			$avg_2007 = $avg_2007_score / $avg_2007_cnt;
			$avg_2009 = $avg_2009_score / $avg_2009_cnt;
			$avg_2011 = $avg_2011_score / $avg_2011_cnt;
			if($avg_2007 > 0){
				$avg['2007'] = $avg_2007;
			}
			if($avg_2009 > 0){
				$avg['2009'] = $avg_2009;
			}
			if($avg_2011 > 0){
				$avg['2011'] = $avg_2011;
			}

			$color = '0x000000';
			imagesetthickness($this->img,3);
			$this->img_l(317,$y,344,$y,$color);
			$this->line($avg,$color);
			$this->dot(332,$y,$color);
			$this->img_str(348,$y - 5,'Average');
		}

		imagejpeg($img);
		imagedestroy($img);
	}

	function all_country_chk(){
		$data = '';
		if($this->con2 == 'all'){
			$data= ' selected="selected" ';
		}
		return $data;
	}

	function line($arr,$color){
		$year_order = $this->year_order();
		$x = 84;
		for($i = 0 ; $i < 3; $i++){
			$cur_year = $year_order["$i"];
			if(array_key_exists($cur_year,$arr)){
				$y = (510 - ($arr["$cur_year"] - 360) * 2);
				$this->dot($x,$y,$color);

				if($i < 2){
					$next_year = $year_order[$i + 1];
					if(array_key_exists($next_year,$arr)){
						$y2 = (510 - ($arr["$next_year"] - 360) * 2);
						$this->dot($x+90,$y2,$color);
						imagesetthickness($this->img,3);
						$this->img_l($x,$y,$x+90,$y2,$color);
					}
				}
			}
			$x += 90;
		}
	}

	function dot($x,$y,$color){
		$value = array(
			$x,$y-4,
			$x+4,$y,
			$x,$y+4,
			$x-4,$y
		);
		imagesetthickness($this->img,1);
		imagefilledpolygon($this->img,$value,4,$color);
	}
}
?>