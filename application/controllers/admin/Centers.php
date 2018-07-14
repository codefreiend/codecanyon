<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Centers extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('ion_auth');

		$this->load->helper('text');

		$this->load->library('form_validation');

		$this->load->model('admin/centers_model','centers');

	}



	function index($id=1, $owner_id = null)

	{
		$data['ion_auth'] = $this->ion_auth;


		$cond="";

		$data['searchBy']='';

		$data['searchValue']='';

		$v_fields=$this->centers->v_fields;

		$per_page_arr = array('5', '10', '20', '50', '100');



		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {

			$data['searchBy']=$_GET['searchBy'];

			$data['searchValue']=$_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" ) {

					$cond="true";

			}

		}



		$data['sortBy']='';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);



		if(isset($_GET['sortBy']) && $_GET['sortBy']!=''){

			$data['sortBy']=$_GET['sortBy'];

			if(isset($_GET['order']) && $_GET['order']!=''){

				$_GET['order']=$_GET['order']=='asc'?'desc':'asc';

			} else{

				$_GET['order']='desc';

			}

		}



		$get_q = $_GET;

		foreach ($v_fields as $key => $value) {

			$get_q['sortBy'] = $value;

			$query_result = http_build_query($get_q);

			$data['fields_links'][$value] =current_url().'?'.$query_result;

		}

		$data['csvlink'] = base_url().'admin/centers/export/csv';

		$data['pdflink'] = base_url().'admin/centers/export/pdf';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";



		// PAGINATION

		$config = array();

		$config['suffix']='?'.$_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . "admin/centers/index";

        $total_row = $this->centers->getCount('centers', $searchBy, $searchValue);

        $config["first_url"] = base_url()."admin/centers/index".'?'.$_SERVER['QUERY_STRING'];

        $config["total_rows"] = $total_row;

        $config["per_page"] = $per_page = $data['per_page'];

        $config["uri_segment"] = $this->uri->total_segments();

        $config['use_page_numbers'] = TRUE;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a>';

        $config['full_tag_open'] = "<ul class='pagination'>";

		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

		$config['next_tag_open'] = "<li>";

		$config['next_tagl_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";

		$config['prev_tagl_close'] = "</li>";

		$config['first_link'] = 'First';

		$config['first_tag_open'] = "<li>";

		$config['first_tagl_close'] = "</li>";

		$config['last_link'] = 'Last';

		$config['last_tag_open'] = "<li>";

		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);



        if($this->uri->segment(2)){

        	$cur_page = $id;

        	$pagi = array("cur_page"=>($cur_page-1)*$per_page, "per_page"=>$per_page, 'order'=>$order, 'order_by'=>$order_by);

        }

        else{	

    		$pagi = array("cur_page"=>0, "per_page"=>$per_page);

    	}

		 if (isset($owner_id) and ! empty($owner_id)) {

        	$data["results"] = $result = $this->centers->getList("centers",$pagi, array("owner"=>$owner_id));
		 }else{
        	$data["results"] = $result = $this->centers->getList("centers",$pagi);
			 
		 } 
        $str_links = $this->pagination->create_links();



        $data["links"] = $str_links;

        // ./ PAGINATION /.



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

        }

		else {

			$data['centers']  = $this->centers->getList('centers');

		    $this->load->view('admin/centers/manage',$data);

		}

	}



	public function add()

	{   

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



	    $data = NULL;

		$data['ion_auth'] = $this->ion_auth;


		$this->form_validation->set_rules('center_name', 'Center_name Name', 'required');
		$this->form_validation->set_rules('specialization', 'Specialization Name', 'trim');
		$this->form_validation->set_rules("logo", "Logo", "trim|xss_clean");

         $this->centers->uploadData($photo_data, "logo", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

			$data["errors"]=$photo_data["photo_err"];
			$this->form_validation->set_rules("logo","Logo","trim");
		}		
		
		$this->form_validation->set_rules('center_type', 'Center_type Name', 'trim');
		$this->form_validation->set_rules('owner', 'Owner Name', 'trim');
		$this->form_validation->set_rules('center_country', 'Center_country Name', 'trim');
		$this->form_validation->set_rules('center_city', 'Center_city Name', 'trim');
		$this->form_validation->set_rules('about_center', 'About_center Name', 'trim');
		$this->form_validation->set_rules('center_address', 'Center_address Name', 'trim');
		$this->form_validation->set_rules('center_branch', 'Center_branch Name', 'trim');
		$this->form_validation->set_rules('center_email', 'Center_email Name', 'required|valid_email');
		$this->form_validation->set_rules('center_website', 'Center_website Name', 'trim');
		$this->form_validation->set_rules('center_phone', 'Center_phone Name', 'required|numeric');
		$this->form_validation->set_rules('cr', 'CR Number', 'required|numeric');
		//$this->form_validation->set_rules('center_lat', 'Center_lat Name', 'decimal');
		//$this->form_validation->set_rules('center_long', 'Center_long Name', 'decimal');
			



        $data['errors'] = array();

        if($this->form_validation->run() == FALSE) 

        {

			$data["specialization"]=$this->centers->getListTable("specialization");
			$data["center_type"]=$this->centers->getListTable("center_type");
			$data["userz"]=$this->centers->getListTable("userz");
			$data["countries"]=$this->centers->getListTable("countries");
			$data["cities"]=$this->centers->getListTable("cities");	

			$this->load->view('admin/centers/add', $data);

        }

        else

        {

			$saveData['center_name'] = set_value('center_name');
			$saveData['specialization'] = set_value('specialization');
			if(isset($photo_data["logo"]) && !empty($photo_data["logo"]))
			{
				$saveData["logo"] = $photo_data["logo"];
			}
			$saveData['center_type'] = set_value('center_type');
			$saveData['owner'] = set_value('owner');
			$saveData['center_country'] = set_value('center_country');
			$saveData['center_city'] = set_value('center_city');
			$saveData['about_center'] = set_value('about_center');
			$saveData['center_address'] = set_value('center_address');
			$saveData['center_branch'] = set_value('center_branch');
			$saveData['center_email'] = set_value('center_email');
			$saveData['center_website'] = set_value('center_website');
			$saveData['center_phone'] = set_value('center_phone');
			$saveData['cr'] = set_value('cr');
			$saveData['center_lat'] = set_value('center_lat');
			$saveData['center_long'] = set_value('center_long');


			$insert_id = $this->centers->insert('centers',$saveData);

			

			$this->session->set_flashdata('message', '  تم اضافة بيانات المركز!');

			redirect('admin/centers');

	   }

	}



	function view($id)

	{



	  if (!$this->ion_auth->logged_in()) {

	  redirect('/auth/login/');

	  }

	 

	  if(isset($id) and !empty($id))

	  {

	   $data = NULL;
		 $data['ion_auth'] = $this->ion_auth;


		$this->form_validation->set_rules('center_name', 'Center_name Name', 'required');
		$this->form_validation->set_rules('specialization', 'Specialization Name', 'trim');
$this->form_validation->set_rules("logo", "Logo", "trim|xss_clean");

         $this->centers->uploadData($photo_data, "logo", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

	     $data["errors"]=$photo_data["photo_err"];

	     $this->form_validation->set_rules("logo","Logo","trim");

	    }		$this->form_validation->set_rules('center_type', 'Center_type Name', 'trim');
		$this->form_validation->set_rules('owner', 'Owner Name', 'trim');
		$this->form_validation->set_rules('center_country', 'Center_country Name', 'trim');
		$this->form_validation->set_rules('center_city', 'Center_city Name', 'trim');
		$this->form_validation->set_rules('about_center', 'About_center Name', 'trim');
		$this->form_validation->set_rules('center_address', 'Center_address Name', 'trim');
		$this->form_validation->set_rules('center_branch', 'Center_branch Name', 'trim');
		$this->form_validation->set_rules('center_email', 'Center_email Name', 'required|valid_email');
		$this->form_validation->set_rules('center_website', 'Center_website Name', 'trim');
		$this->form_validation->set_rules('center_phone', 'Center_phone Name', 'required|numeric');
		$this->form_validation->set_rules('cr', 'CR Number', 'required|numeric');
		$this->form_validation->set_rules('center_lat', 'Center_lat Name', 'decimal');
		$this->form_validation->set_rules('center_long', 'Center_long Name', 'decimal');




       $data['errors'] = array();

       if($this->form_validation->run() == FALSE) 

       {

      	$data["specialization"]=$this->centers->getListTable("specialization");$data["center_type"]=$this->centers->getListTable("center_type");$data["userz"]=$this->centers->getListTable("userz");$data["countries"]=$this->centers->getListTable("countries");$data["cities"]=$this->centers->getListTable("cities");

      	

      	

        $data['centers']=$this->centers->getRow('centers',$id);

        $this->load->view('admin/centers/view', $data);

       }

       else

       {

		redirect('admin/centers/view');

       }

    }

    else

    {
		 $data['ion_auth'] = $this->ion_auth;

       $this->session->set_flashdata('message', ' Invalid Id !'); 

       redirect('admin/centers/view', $data);

	}

  }



	function edit($id)

    {

	 	if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}



		if(isset($id) and !empty($id))

		{

			$data = NULL;
			$data['ion_auth'] = $this->ion_auth;


			$this->form_validation->set_rules('center_name', 'Center_name Name', 'required');
			$this->form_validation->set_rules('specialization', 'Specialization Name', 'trim');
			$this->form_validation->set_rules("logo", "Logo", "trim|xss_clean");

         	$this->centers->uploadData($photo_data, "logo", "photo_path","","gif|jpg|png|jpeg");

			if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))
			{
				$data["errors"]=$photo_data["photo_err"];
				$this->form_validation->set_rules("logo","Logo","trim");

			}
		$this->form_validation->set_rules('center_type', 'Center_type Name', 'trim');
		$this->form_validation->set_rules('owner', 'Owner Name', 'trim');
		$this->form_validation->set_rules('center_country', 'Center_country Name', 'trim');
		$this->form_validation->set_rules('center_city', 'Center_city Name', 'trim');
		$this->form_validation->set_rules('about_center', 'About_center Name', 'trim');
		$this->form_validation->set_rules('center_address', 'Center_address Name', 'trim');
		$this->form_validation->set_rules('center_branch', 'Center_branch Name', 'trim');
		$this->form_validation->set_rules('center_email', 'Center_email Name', 'required|valid_email');
		$this->form_validation->set_rules('center_website', 'Center_website Name', 'trim');
		$this->form_validation->set_rules('center_phone', 'Center_phone Name', 'required|numeric');
		$this->form_validation->set_rules('cr', 'CR Number', 'required|numeric');
		//$this->form_validation->set_rules('center_lat', 'Center_lat Name', 'decimal');
		//$this->form_validation->set_rules('center_long', 'Center_long Name', 'decimal');




            $data['errors'] = array();

            if($this->form_validation->run() == FALSE) 

            {

            	

            	

              	$data['centers']=$this->centers->getRow('centers',$id);

              	$data["specialization"]=$this->centers->getListTable("specialization");$data["center_type"]=$this->centers->getListTable("center_type");$data["userz"]=$this->centers->getListTable("userz");$data["countries"]=$this->centers->getListTable("countries");$data["cities"]=$this->centers->getListTable("cities");

				$this->load->view('admin/centers/edit', $data);

            }

            else

            {

			   				$saveData['center_name'] = set_value('center_name');
			$saveData['specialization'] = set_value('specialization');
if(isset($photo_data["logo"]) && !empty($photo_data["logo"]))

		{

	      $saveData["logo"] = $photo_data["logo"];

        }			$saveData['center_type'] = set_value('center_type');
			$saveData['owner'] = set_value('owner');
			$saveData['center_country'] = set_value('center_country');
			$saveData['center_city'] = set_value('center_city');
			$saveData['about_center'] = set_value('about_center');
			$saveData['center_address'] = set_value('center_address');
			$saveData['center_branch'] = set_value('center_branch');
			$saveData['center_email'] = set_value('center_email');
			$saveData['center_website'] = set_value('center_website');
			$saveData['center_phone'] = set_value('center_phone');
			$saveData['cr'] = set_value('cr');
			$saveData['center_lat'] = set_value('center_lat');
			$saveData['center_long'] = set_value('center_long');
					

				$this->centers->updateData('centers',$saveData,$id);

				

				$this->session->set_flashdata('message', '  تم تحديث بيانات المركز!');

				//redirect('admin/centers');
				redirect('admin/centers/view/'.$id);

            }

		}

		else

		{

			$this->session->set_flashdata('message', ' Invalid Id !');	

		    redirect('admin/centers');

		}

	 }



	 function delete($id='')

     {

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



 		if(isset($id) and !empty($id))

		{

			$count=$this->centers->getCount('centers','centers.id',$id);

			if(isset($count) and !empty($count))

			{

				$this->centers->delete('centers','id',$id);

				$this->session->set_flashdata('message', ' Centers Deleted Successfully !');

	            echo "success";

           		exit;

			}

			else

			{

				$this->session->set_flashdata('message', ' Invalid Id !');	

			}

		}

		else

		{

			$this->session->set_flashdata('message', ' Invalid Id !');

		}

	}



	function deleteAll($id='')

    {



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		$all_ids = $_POST["allIds"];



 		if(isset($all_ids) and !empty($all_ids))

		{

			

			//$count=$this->centers->getCount('centers','centers.id',$id);

			for($a=0; $a<count($all_ids); $a++)

	  		{

	  			if($all_ids[$a]!="")

	  			{

					$this->centers->delete('centers','id',$all_ids[$a]);

					$this->session->set_flashdata('message', ' Centers(s) Deleted Successfully !');

				}

	  		}	



            echo "success";

       		exit;

		}

		else

		{

			$this->session->set_flashdata('message', ' Invalid Id !');

		}

	}



	function export($filetype='csv'){



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}

		

		$searchBy='';

		$searchValue='';

		$v_fields=array('center_name', 'specialization', 'logo', 'center_type', 'owner', 'center_country', 'center_city', 'about_center', 'center_address', 'center_branch', 'center_email', 'center_website', 'center_phone','cr', 'center_lat', 'center_long');



		$data['sortBy']='';



        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';



        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);

        $pagi = array('order'=>$order, 'order_by'=>$order_by);



		$result = $this->centers->getList("centers");



		if($filetype=='csv'){

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=centers.csv');

			header('Pragma: no-cache');

			$csv='Sr. No,'.implode(',', $v_fields)."\n";

			foreach ($result as $key => $value) {

				$line=($key+1).',';

				foreach ($v_fields as $field) {

					$line.='"'.addslashes($value->$field).'"'.',';

				}

				$csv.=ltrim($line,',')."\n";

			}

			echo $csv; exit;

		} elseif ($filetype=='pdf'){

			error_reporting(0);

			ob_start();

			$this->load->library('m_pdf');

			$table='

			<html>

			<head><title></title>

			<style>

			table{

				border:1px solid;

			}

			tr:nth-child(even)

			{

			    background-color: rgba(158, 158, 158, 0.82);

			}

			</style>

			</head>

			<body>

			<h1 align="center">Centers</h1>

			<table><tr>';

			$table.='<th>Sr. No</th>';

			foreach ($v_fields as $value) {

				$table.='<th>'.$value.'</th>';

			}

			$table.='</tr>';

			foreach ($result as $key => $value) {

				$table.='<tr><td>'.($key+1).'</td>';

				foreach ($v_fields as $field) {

					$table.='<td>'.$value->$field.'</td>';

				}

				$table.='</tr>';

			}

			$table.='</table></body></html>';

			ob_clean();

			$pdf = $this->m_pdf->load();

			$pdf->WriteHTML($table);

			$pdf->Output('centers.pdf', "D");

			exit;

		} else{

			echo 'Invalid option'; exit;

		}

	}





	function status($field,$id)

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		if (in_array($field, array()))

		{

			if(isset($id) && !empty($id))

			{

				if (!is_null($centers=$this->centers->getRow('centers',$id)))	

				{					

					$status = $centers->$field;				

					if($status == 1){

						$status = 0;

					}else{

						$status = 1;

					}

						$statusData[$field] = $status;

						$this->centers->updateData('centers',$statusData,$id);

						$this->session->set_flashdata('message', ucfirst($field).' Updated Successfully');

						if(isset($_GET['redirect']) && $_GET['redirect']!=''){

							redirect($_GET['redirect']);

						} else{

							redirect('admin/centers');

						}

				}else{

						$this->session->set_flashdata('error', 'Invalid Record Id!');

						redirect('admin/centers');

				}

			}

			else

			{

				$this->session->set_flashdata('error', 'Invalid Record Id!');

				redirect('admin/centers');

			}

		}

	}





}



