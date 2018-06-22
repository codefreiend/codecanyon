<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front extends CI_Controller {




	public function index()
	{

		$data['center_blocks'] = $this->show_center_blocks();
		$this->_view('home',$data);
	}


    	public function _view($page,$data = null,$isHTML = false){
		$this->load->view('front/header');
		$this->load->view('front/'.$page,$data, $isHTML);
		$this->load->view('front/footer');
		
	}


	
	public function show_center_block($name,$about,$logo){
		$this->load->helper('url');
		$data['name'] = $name;
		$data['about'] = $about;
		$data['logo'] = $logo;
		return $this->load->view('front/centers/_center_block',$data, true);
	}
	public function show_center_blocks(){
		$this->load->helper('text');
		$center_blocks = "";
		$query = $this->db->get_where("centers");
		if($query->num_rows()>0){
			$centers = $query->result();
			foreach ($centers as $center) {
				$about = $string = word_limiter($center->about_center,17);
				$center_blocks = $center_blocks . $this->show_center_block($center->center_name,$about,$center->logo);
				//$center_blocks = $center_blocks . $this->show_center_block("center 1","about 1","ipa.jpg");
			}
		}else{
			echo "No Data Found";
		}

		//$data['center_blocks'] =  $center_blocks;
        //$this->_view('home',$data);
        
        return  $center_blocks;
    }
}