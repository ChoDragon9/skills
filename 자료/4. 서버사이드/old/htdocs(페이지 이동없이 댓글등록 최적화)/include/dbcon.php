<?php
/* mysql  start
------------------------------------------------*/

$db = new dbcon("localhost","root","apmsetup","db");

class dbcon{
	function dbcon($db_host,$db_id,$db_pwd,$db_name){
		mysql_connect($db_host,$db_id,$db_pwd);
		mysql_select_db($db_name);
	}

	function sql($sql=false){
		$sql = $sql == "" ? $this->sql :$sql;
		return mysql_query($sql);
	}

	function fetch($res=false){
		$res = $res == "" ? $this->res : $res;
		return mysql_fetch_array($res);
	}

	function fetarr($sql){
		$sql = $sql == "" ? $this->sql :$sql;
		$res = $this->sql($sql);
		return $this->fetch($res);
	}

	function num($sql){
		$res = $this->sql($sql);
		return mysql_num_rows($res);
	}

	function query($state=false,$table=false,$sql=false,$where=false){
		$table = $table == "" ? $this->table : $table;
		$state = $state == "" ? $this->state : $state;
		$sql = $sql == "" ? $this->sql : $sql;
		switch($state){
			case "select":
				$sql = $sql != "" ? "where {$sql}" : "";
				return $this->sql("select * from  {$table} {$sql} {$where}");
			break;
			case "insert":
				$this->sql("insert into {$table} set {$sql}");
			break;
			case "modify":
				$this->sql("update {$table} set {$sql} where {$where}");
			break;
			case "delete":
				$this->sql("delete from {$table} where {$where}");
			break;
		}
	}

	function change($str){
		$str = mysql_real_escape_string($str);
		$str = preg_replace("/<script(.*?)<\/script>/ ","",$str);
		$str = preg_replace("/<script(.*?)>/","",$str);
		$str = preg_replace("/<iframe(.*?)<\/iframe>/","",$str);
		$str = preg_replace("/<iframe(.*?)>/","",$str);
		$str = str_replace("<\/script>","",$str);
		$str = str_replace("<\/iframe>","",$str);
		return $str;
	}

	function colume($name){
		$arr = explode(",",$name);
		foreach($arr as $key => $val){
			$cols .= ",{$val}='".$this->change($_POST["$val"])."'";
		}
		return preg_replace("/^(,)/","",$cols);
	}
}

/* mysql  end
------------------------------------------------*/
?>