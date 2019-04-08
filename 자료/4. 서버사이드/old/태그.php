<?php
//Tag Start
function nb($num=1){ //한칸씩 띄우고 싶을 때
	return str_repeat("&nbsp;",$num); //str_repeat(str,num); num만큼 str를 반복시켜줌
}

function label($name,$id){
	return '<label for="'.$id.'" title="'.$name.'">'.$name.'</label>';
}

function img($src,$alt){
	return '<img src="'.$src.'" title="'.$alt.'" alt="'.$alt.'" />';
}

$input = new input();

class input{ //여기서 Class에 대한 지식 필요
	public $value; //변수 초기설정
	//외부에서 $input->value에 배열로 넣어주면 여기에서는$this->value로 받아야 한다.
	//$this->value를 하면 이 Class속에 $value를 선택
	function input($type=false,$name=false,$value=false,$size=false){
		switch($type){
			case "text":
			case "file":
			case "hidden":
			case "password":
				$value = empty($value) ? $this->value["$name"] : $value;
				return '<input type="'.$type.'" title="'.$name.'" id="'.$name.'" name="'.$name.'" size="'.$size.'" value="'.$value.'" />';
			break;
			case "button":
			case "submit":
			case "reset":
				return '<input type="'.$type.'" value="'.$name.'" title="'.$name.'" onclick="'.$value.'" class="bt1" />';
			break;
			case "textarea":
				$value = empty($value) ? $this->value["$name"] : $value;
				return '<textarea cols="0" rows="0" name="'.$name.'" title="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
			break;
		}
	}
}
/*
위 함수 사용방법
$input->value = $arr;
$arr = array("subject"=>"제목","content"=>"내용");
$input->value = $arr;
echo "<li>".$input->input("text","subject")."</li>";
echo "<li>".$input->input("textarea","content")."</li>";
*/
//Tags End
?>