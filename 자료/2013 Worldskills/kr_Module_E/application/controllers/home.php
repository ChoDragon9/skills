<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		define('BASE',base_url());
		define('HOME',BASE.'home/');
		define('FORM',BASE.uri_string());
		define('UPLOAD',BASE.'uploaded_files/');
		define('U2',$this->uri->segment(2));
		define('U3',$this->uri->segment(3));
		define('U4',$this->uri->segment(4));

		$this->load->model('model_lvb','lvb',true);
		$this->lvb->user_id = $user_id = $this->user_id = isset($_SESSION['user_id']) ? 'logout' : 'login';
		$this->lvb->login_chk();
	}
	function _remap($url2=false,$arr=false){
		$value['title'] = U2 == '' ? 'Login' : ucwords(U3). ' '.ucwords(U2);
		$value['login'] = $this->user_id;
		$value['submenu'] = $this->lvb->submenu();
		$this->load->view('header',$value);
		if($url2 == 'index'){
			if($this->form_validation->run('test') ==  false){
				$value['input'] = array('login','password');
				$this->load->view('login',$value);
			}else{
				$this->lvb->login_ok();
			}
		}else{
			$unit = array('line','station','vehicle','driver');
			$line_unit = array('line_station','line_vehicle','vehicle_driver');
			if(in_array($url2,$unit)){
				$url2 = 'unit';
			}else if(in_array($url2,$line_unit)){
				$url2= 'line_unit';
			}

			call_user_func_array(array($this,$url2),$arr);
		}
		$this->load->view('footer',$value);
	}

	function unit($action=false,$id=false){
		$name = str_replace('line_','',U2);
		$name = str_replace('vehicle_','',$name);
		$value['list']= call_user_func_array(array($this->lvb,$name.'_list'),array($id));
		switch(U3){
			case "modify":
			case "create":
				if($this->form_validation->run('test') ==  false){
					$value['station_list'] = $this->lvb->station_list();
					$value['line_type'] = $this->lvb->line_type();
				}else{
					$this->lvb->unit_action($id);
				}
			case "manage":
				$this->load->view(U2.'_'.U3,$value);
			break;
			case "view":
				$this->load->view(U2.'_'.U3,$value);
			break;
			case "list":
				$this->load->view(U2.'_'.U3,$value);
			break;
			case "delete":
				$this->lvb->unit_action($id);
			break;
		}
	}

	function xml_create(){
		$file_name = 'xml.xml';
		$data = '<?xml version="1.0"?><lvb_system>'.$this->lvb->data().'</lvb_system>';
		force_download($file_name,$data);
	}

	function line_unit($action=false,$id=false,$unit_id=false){
		$name = str_replace('line_','',U2);
		$name = str_replace('vehicle_','',$name);
		$value['list']= call_user_func_array(array($this->lvb,$name.'_list'),array($unit_id,$id));
		switch(U3){
			case "modify":
			case "create":
			$value['list']= call_user_func_array(array($this->lvb,$name.'_list'),array($unit_id,$id,true));
				if($this->form_validation->run('test') ==  false){
					$value['station_list'] = $this->lvb->station_list();
					$value['line_type'] = $this->lvb->line_type();
				}else{
					$this->lvb->line_unit_action($id,$unit_id);
				}
			case "manage":
				$this->load->view(U2.'_'.U3,$value);
			break;
			case "delete":
				$this->lvb->line_unit_action($id,$unit_id);
			break;
		}
	}

	function logout(){
		$_SESSION["user_id"] = null;
		redirect(HOME);
	}

}