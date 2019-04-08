<?php

/* Mysql start
------------------------------------------------*/

$db = new db("localhost","root","apmsetup","chungho");

class db{

	function db($host,$id,$pwd,$name){
		mysql_connect($host,$id,$pwd);
		mysql_select_db($name);
	}

	function sql($sql){
		return mysql_query($sql);
	}

	function fetch($res){
		return mysql_fetch_array($res);
	}

	function fetarr($sql){
		$res = $this->sql($sql);
		return $this->fetch($res);
	}

	function num($sql){
		$res = $this->sql($sql);
		return mysql_num_rows($res);
	}

	function query($type=false,$table=false,$colume=false,$where=false){
		$table = $table == "" ? $this->table : $table;
		switch($type){
			case "insert":
				$sql = "insert into {$table} set {$colume}";
			break;
			
			case "select":
				$where = $where != "" ? "where {$where}" : "";
				$sql = "select * from {$table} {$where}";
			break;
			
			case "update":
				$sql = "update {$table} set {$colume} where {$where}";
			break;
			
			case "delete":
				$sql = "delete from {$table} where {$where}";
			break;
		}
		return $this->sql($sql);
	}

	function change($str){
		$str = preg_replace("/<script(.*?)<\/script>/","",$str);
		$str = preg_replace("/<script(.*?)>/","",$str);
		$str = preg_replace("/<iframe(.*?)<\/iframe>/","",$str);
		$str = preg_replace("/<iframe(.*?)>/","",$str);
		$str = str_replace("<\/script>","",$str);
		$str = str_replace("<\/iframe>","",$str);
		$str = htmlspecialchars($str);
		return mysql_real_escape_string($str);
	}

	function colume($arr,$out=false){
		$out = explode("/",$out);
		foreach($arr as $key => $val){
			if(!in_array($key,$out)){
				if($key == "pwd"){
					$cols .= ", {$key}=password('".$this->change($val)."')";
				}else{
					$cols .= ", {$key}='".$this->change($val)."'";
				}
			}
		}
		$cols = preg_replace("/^,/","",$cols);
		return $cols;
	}

}
/* Mysql end
------------------------------------------------*/

?>