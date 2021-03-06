<?php
class Controller{
	function __construct(){
		//HOME Define

		$root = 'http://'.$_SERVER['HTTP_HOST'];
		$arr_url = explode('/',$_SERVER['REQUEST_URI']);
		define('HOME',$root.'/'.$arr_url['1']);
	
		//Load Model
		$this->model = new Model();

		//Method Post Data
		$post_con1 = $this->data_post('post_con1');
		$post_trade = $this->data_post('post_trade');
		$post_con2 = $this->data_post('post_con2');

		//Method Get  Data
		$this->model->con1 = $con1 = $this->data_get('con1');
		$this->model->trade = $trade = $this->data_get('trade');
		$this->model->con2 = $con2 = $this->data_get('con2');


		//Url 
		if($post_con1 !== false or $post_trade !== false or $post_con2 !== false){
			$url = HOME;
			$url .= '/';
			if($post_con1 !== false){
				$url .= $post_con1 ? $post_con1 : '_space_';
			}else{
				$url .= $con1 ? $con1 : '_none_';
			}

			$url .= '/';
			if($post_trade !== false){
				$url .= $post_trade ? $post_trade : '_space_';
			}else{
				$url .= $trade ? $trade : '_none_';
			}

			$url .= '/';
			if($post_con2 !== false){
				$url .= $post_con2 ? $post_con2 : '_space_';
			}else{
				$url .= $con2 ? $con2 : '_none_';
			}

			header('refresh:0; url="'.$url.'"');
		}

		$value['con1_opt'] = $this->model->con_opt('con1',$con1);
		$value['con2_opt'] = $this->model->con_opt('con2',$con2);
		$value['trade_opt'] = $this->model->trade_opt();

		$value['result'] = $this->model->result();
		$value['year_order'] = $this->model->year_order();

		$value['diagram'] = $this->model->diagram();
		$value['all_country_chk'] = $this->model->all_country_chk();

		
		$value['table_err'] = $this->model->table_err();

		$this->view('view',$value);
	}

	//View
	function view($file,$data=false){
		if($data){
			extract($data);
		}
		include('app/'.$file.'.php');
	}

	function data_get($name){
		return isset($_GET["$name"]) ? $_GET["$name"] : false;
	}

	function data_post($name){
		return isset($_POST["$name"]) ? $_POST["$name"] : false;
	}
}
?>
