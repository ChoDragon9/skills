<?php

	// DB 상수
	define('DB_HOST_NAME','127.0.0.1');
	define('DB_USER_NAME','root');
	define('DB_USER_PASSWORD','apmsetup');
	define('DB_NAME','120');
	define('DB_ERROR',true);

	// DB 객체 생성
	$db = new MysqlDataBase(DB_HOST_NAME,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);

	class MysqlDataBase {

		var $db, $table;
		var $db_error = DB_ERROR;

		// DB 접속
		function MysqlDataBase($host_name,$user_id,$user_pw,$db_name) {

			$this->db = mysql_connect($host_name,$user_id,$user_pw,$db_name) or die($this->error('mysql_connect'));

			mysql_select_db($db_name) or die($this->error('mysql_select_db'));

		}

		// Query 문
		function query($sql) { 
			$query = mysql_query($sql) or die($this->error($sql));
			return $query;
		}

		// Select 문
		function select($sql = false, $table = false) {
			$table = $table === false ? $this->table : $table;
			$sql = $sql === false ? NULL : "where {$sql}";
			return $this->query("select * from {$table} {$sql}");
		}

		// Delete 문
		function delete($sql = false, $table = false) {
			$table = $table === false ? $this->table : $table;
			$sql = $sql === false ? NULL : "where {$sql}";
			return $this->query("delete from {$table} {$sql}");
		}

		// Insert 문
		function insert($sql, $table = false) {
			$table = $table === false ? $this->table : $table;
			return $this->query("insert into {$table} set {$sql}");
		}

		// Update 문
		function update($sql, $table = false) {
			$table = $table === false ? $this->table : $table;
			return $this->query("update {$table} set {$sql}");
		}

		// Fetch 문
		function fetch($sql = false, $table = false, $injection = true) {
			$result = $this->select($sql,$table);
			$data = mysql_fetch_assoc($result);
			if($data && $injection) foreach($data as $key=>$val) $data[$key] = htmlspecialchars($val);
			return $data;
		}

		// Count 문
		function cnt($sql = false, $table = false) {
			$table = $table === false ? $this->table : $table;
			$sql = $sql === false ? NULL : "where {$sql}";
			$result = $this->query("select count(0) from {$table} {$sql}");
			$cnt = mysql_fetch_row($result);
			return $cnt[0];
		}

		// Column 문
		function get_column($array, $cancel) {
			$cancel = explode('/',$cancel);
			foreach($array as $key=>$val) if(!in_array($key,$cancel)) $column .= ", {$key}='".mysql_real_escape_string($val)."'";
			$column = substr($column,2);
			return $column;
		}

		// Error 문
		function error($sql = NULL) {
			$error_msg = $this->db_error === true ? "{$sql}<br />".mysql_error() : 'DB 에러';
			return $error_msg;
		}

	}

?>