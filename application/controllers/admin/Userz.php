<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//require_once('../libraries/phpass-0.1/PasswordHash.php');


class Userz extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('ion_auth');

		$this->load->library('form_validation');
		$this->load->library('mailsender');

		$this->load->model('admin/userz_model','userz');
		$this->load->library('gethashedpass');	
		$this->load->helper('string');
	}



	function index($id=1, $envoled = null, $course_id = null)

	{

		$data['ion_auth'] = $this->ion_auth;

		$cond="";

		$data['searchBy']='';

		$data['searchValue']='';

		$v_fields=$this->userz->v_fields;

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

		$data['csvlink'] = base_url().'admin/userz/export/csv';

		$data['pdflink'] = base_url().'admin/userz/export/pdf';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";



		// PAGINATION

		$config = array();

		$config['suffix']='?'.$_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/userz/index";
		if(isset($envoled) && isset($course_id)){
        	$total_row = $this->userz->getCountOfStudentsEnvolved('userz', $searchBy, $searchValue);
			
		}
		else{
        	$total_row = $this->userz->getCount('userz', $searchBy, $searchValue);
			
		}


        $config["first_url"] = base_url()."admin/userz/index".'?'.$_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->userz->getList("userz",$pagi);
		if(isset($envoled) && isset($course_id)){
			$data["results"] = $result = $this->userz->getStudentsEnvolved("userz",$pagi,$course_id);						
		}

        $str_links = $this->pagination->create_links();



        $data["links"] = $str_links;

        // ./ PAGINATION /.



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

        }

		else {

			if(isset($envoled) && isset($course_id)){
				$data["results"] = $result = $this->userz->getStudentsEnvolved("userz",$pagi,$course_id);						
		    	$this->load->view('admin/userz/manage_students_in_course',$data);				
			}else{
				$data["userz"] = $result = $this->userz->getStudentsEnvolved("userz",$pagi,$id);			
		    	$this->load->view('admin/userz/manage',$data);				
			}			

		}

	}



	public function add()

	{
		
		

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}



	    $data = NULL;
		$data['ion_auth'] = $this->ion_auth;


	//	$this->form_validation->set_rules('username', 'Username Name', 'greater_than[8]');
	//	$this->form_validation->set_rules('password', 'Password Name', 'greater_than[8]');
	//	$this->form_validation->set_rules('full_name', 'Full_name Name', 'greater_than[8]');
		$this->form_validation->set_rules('birth_date', 'Birth_date Name', 'trim');
		$this->form_validation->set_rules('gender', 'Gender Name', 'trim');
		$this->form_validation->set_rules('company', 'Company Name', 'trim');
		$this->form_validation->set_rules('mobile', 'Mobile Name', 'numeric');
		$this->form_validation->set_rules('phone', 'Phone Name', 'numeric');
		$this->form_validation->set_rules("photo", "Photo", "trim|xss_clean");

         $this->userz->uploadData($photo_data, "photo", "photo_path","","gif|jpg|png|jpeg");

	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {
			$data["errors"]=$photo_data["photo_err"];
			$this->form_validation->set_rules("photo","Photo","trim");
		}		
		
		
		$this->form_validation->set_rules('country', 'Country Name', 'trim');
		$this->form_validation->set_rules('city', 'City Name', 'trim');
		$this->form_validation->set_rules('address', 'Address Name', 'trim');
			



        $data['errors'] = array();

        if($this->form_validation->run() == FALSE) 

        {
			$data["gender"]=$this->userz->getListTable("gender");
			$data["countries"]=$this->userz->getListTable("countries");
			$data["cities"]=$this->userz->getListTable("cities");
			//$data["user_roles"]= $this->db->get_where("user_role", array("user_role.id !=", 1));
			//$data["user_roles"]= $this->userz->getListTableWhere("user_role",  array("user_role.id !="=> 1));
			$data["groups"]= $this->userz->getListTableWhere("groups",  array("groups.id !="=> 1));
			$this->load->view('admin/userz/add', $data);
        }

        else

        {
			$saveData['username'] = set_value('username');
			$this->load->library('gethashedpass');	
            $hashed_password = $this->gethashedpass->getv(set_value('password')); // $hasher->HashPassword(set_value('password'));
			$saveData['password'] = $hashed_password;
			$saveData['full_name'] = set_value('full_name');
			$saveData['birth_date'] = set_value('birth_date');
			$saveData['gender'] = set_value('gender');
			$saveData['company'] = set_value('company');
			$saveData['mobile'] = set_value('mobile');
			$saveData['phone'] = set_value('phone');

			if(isset($photo_data["photo"]) && !empty($photo_data["photo"]))

		{
	      $saveData["photo"] = $photo_data["photo"];

		}			
		
			$saveData['country'] = set_value('country');
			$saveData['city'] = set_value('city');
			$saveData['address'] = set_value('address');
			$saveData['role'] = 6;


			$insert_id = $this->userz->insert('userz',$saveData);

			

			$this->session->set_flashdata('message', ' تم التسجيل، لتفعيل حسابك راجع بريدك الالكتروني!');

			redirect('admin/userz');

	   }

	}



	function view($id,$user_type = null)

	{

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if(isset($id) and !empty($id))
		{
			$data = NULL;
			$data['ion_auth'] = $this->ion_auth;

			$this->form_validation->set_rules('username', 'Username Name', 'greater_than[8]');
			$this->form_validation->set_rules('password', 'Password Name', 'greater_than[8]');
			$this->form_validation->set_rules('full_name', 'Full_name Name', 'greater_than[8]');
			$this->form_validation->set_rules('birth_date', 'Birth_date Name', 'trim');
			$this->form_validation->set_rules('gender', 'Gender Name', 'trim');
			$this->form_validation->set_rules('company', 'Company Name', 'trim');
			$this->form_validation->set_rules('mobile', 'Mobile Name', 'numeric');
			$this->form_validation->set_rules('phone', 'Phone Name', 'numeric');
			$this->form_validation->set_rules("photo", "Photo", "trim|xss_clean");

         	$this->userz->uploadData($photo_data, "photo", "photo_path","","gif|jpg|png|jpeg");

			if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))
			{
				$data["errors"]=$photo_data["photo_err"];
				$this->form_validation->set_rules("photo","Photo","trim");
			}
			$this->form_validation->set_rules('country', 'Country Name', 'trim');
			$this->form_validation->set_rules('city', 'City Name', 'trim');
			$this->form_validation->set_rules('address', 'Address Name', 'trim');


			$data['errors'] = array();

			if($this->form_validation->run() == FALSE) 
			{
					$data["gender"]=$this->userz->getListTable("gender");
					$data["countries"]=$this->userz->getListTable("countries");
					$data["cities"]=$this->userz->getListTable("cities");
					$data['userz']=$this->userz->getRow('userz',$id);
					$this->load->view('admin/userz/view', $data);

			}
			else
			{
					redirect('admin/userz/view');
			}

		}

		else

		{
			$data['ion_auth'] = $this->ion_auth;
			$this->session->set_flashdata('message', ' Invalid Id !'); 
			redirect('admin/userz/view', data);
		}

  }


  function view_student($id)

	{

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
		}

		if(isset($id) and !empty($id))
		{
			$data = NULL;
			$data['ion_auth'] = $this->ion_auth;

			$this->form_validation->set_rules('username', 'Username Name', 'greater_than[8]');
			$this->form_validation->set_rules('password', 'Password Name', 'greater_than[8]');
			$this->form_validation->set_rules('full_name', 'Full_name Name', 'greater_than[8]');
			$this->form_validation->set_rules('birth_date', 'Birth_date Name', 'trim');
			$this->form_validation->set_rules('gender', 'Gender Name', 'trim');
			$this->form_validation->set_rules('company', 'Company Name', 'trim');
			$this->form_validation->set_rules('mobile', 'Mobile Name', 'numeric');
			$this->form_validation->set_rules('phone', 'Phone Name', 'numeric');
			$this->form_validation->set_rules("photo", "Photo", "trim|xss_clean");

         	$this->userz->uploadData($photo_data, "photo", "photo_path","","gif|jpg|png|jpeg");

			if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))
			{
				$data["errors"]=$photo_data["photo_err"];
				$this->form_validation->set_rules("photo","Photo","trim");
			}
			$this->form_validation->set_rules('country', 'Country Name', 'trim');
			$this->form_validation->set_rules('city', 'City Name', 'trim');
			$this->form_validation->set_rules('address', 'Address Name', 'trim');


			$data['errors'] = array();

			if($this->form_validation->run() == FALSE) 
			{
					$data["gender"]=$this->userz->getListTable("gender");
					$data["countries"]=$this->userz->getListTable("countries");
					$data["cities"]=$this->userz->getListTable("cities");
					$data['userz']=$this->userz->getRow('userz',$id);
					$this->load->view('admin/userz/view_student', $data);

			}
			else
			{
					redirect('admin/userz/view_student');
			}

		}

		else

		{
			$data['ion_auth'] = $this->ion_auth;
			$this->session->set_flashdata('message', 'هذاالطالب غير موجود'); 
			redirect('admin/userz/view_student', data);
		}

  }



	function edit($id)

    {

	 	if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		if(isset($id) and !empty($id))

		{

			//  print_r($_POST);
        	// return;

			$data = NULL;
			 $data['ion_auth'] = $this->ion_auth;


		$this->form_validation->set_rules('username', 'Username Name', 'required');
		//$this->form_validation->set_rules('password', 'Password Name', 'required');
		$this->form_validation->set_rules('full_name', 'Full_name Name', 'required');
		$this->form_validation->set_rules('birth_date', 'Birth_date Name', 'trim');
		$this->form_validation->set_rules('gender', 'Gender Name', 'trim');
		$this->form_validation->set_rules('company', 'Company Name', 'trim');
		$this->form_validation->set_rules('mobile', 'Mobile Name', 'numeric');
		$this->form_validation->set_rules('phone', 'Phone Name', 'numeric');
		$this->form_validation->set_rules("photo", "Photo", "trim|xss_clean");
		//$this->form_validation->set_rules("cv", "cv", "trim|xss_clean");

         $this->userz->uploadData($photo_data, "photo", "photo_path","","gif|jpg|png|jpeg");
         $this->userz->uploadData($cv_data, "cv", "file_path","","doc|docx|pdf");
		
	    if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))

	    {

			$data["errors"]=$photo_data["photo_err"];

			$this->form_validation->set_rules("photo","Photo","trim");

		}		
		
		
		$this->form_validation->set_rules('country', 'Country Name', 'trim');
		$this->form_validation->set_rules('city', 'City Name', 'trim');
		$this->form_validation->set_rules('address', 'Address Name', 'trim');




            $data['errors'] = array();
            if($this->form_validation->run() == FALSE) 
            {  
              	$data['userz']=$this->userz->getRow('userz',$id);

              	$data["gender"]=$this->userz->getListTable("gender");$data["countries"]=$this->userz->getListTable("countries");$data["cities"]=$this->userz->getListTable("cities");

				$this->load->view('admin/userz/edit', $data);
            }

            else

            {
			  
				
				$saveData['username'] = set_value('username');

				$password =  set_value('password');
				if(isset($password) and !empty($password)){
					$this->load->library('gethashedpass');	
            		$hashed_password = $this->gethashedpass->getv($password); // $hasher->HashPassword(set_value('password'));
					$saveData['password'] = $hashed_password;

				}
				$saveData['full_name'] = set_value('full_name');
				$saveData['birth_date'] = set_value('birth_date');
				$saveData['gender'] = set_value('gender');
				//echo $cv_data["cv"];
				//return;
				$saveData['about'] = set_value('about');
				
				if(isset($cv_data["cv"]) && !empty($cv_data["cv"]))
				{
					$saveData["cv"] = $cv_data["cv"];
				}
				$saveData['company'] = set_value('company');
				$saveData['mobile'] = set_value('mobile');
				$saveData['phone'] = set_value('phone');
				if(isset($photo_data["photo"]) && !empty($photo_data["photo"]))
				{
					$saveData["photo"] = $photo_data["photo"];
				}			
				
				$saveData['country'] = set_value('country');
				$saveData['city'] = set_value('city');
				$saveData['address'] = set_value('address');						

				$this->userz->updateData('userz',$saveData,$id);					

				$this->session->set_flashdata('message', 'Userz Updated Successfully!');

				redirect('admin/userz');

            }

		}

		else

		{

			$this->session->set_flashdata('message', ' Invalid Id !');	

		    redirect('admin/userz');

		}

	 }



	 function delete($id='')

     {

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



 		if(isset($id) and !empty($id))

		{

			$count=$this->userz->getCount('userz','userz.id',$id);

			if(isset($count) and !empty($count))

			{

				$this->userz->delete('userz','id',$id);

				$this->session->set_flashdata('message', ' Userz Deleted Successfully !');

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

			

			//$count=$this->userz->getCount('userz','userz.id',$id);

			for($a=0; $a<count($all_ids); $a++)

	  		{

	  			if($all_ids[$a]!="")

	  			{

					$this->userz->delete('userz','id',$all_ids[$a]);

					$this->session->set_flashdata('message', ' Userz(s) Deleted Successfully !');

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

		$v_fields=array('username', 'password', 'full_name', 'birth_date', 'gender', 'company', 'mobile', 'phone', 'photo', 'country', 'city', 'address');



		$data['sortBy']='';



        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';



        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);

        $pagi = array('order'=>$order, 'order_by'=>$order_by);



		$result = $this->userz->getList("userz");



		if($filetype=='csv'){

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=userz.csv');

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

			<h1 align="center">Userz</h1>

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

			$pdf->Output('userz.pdf', "D");

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

				if (!is_null($userz=$this->userz->getRow('userz',$id)))	

				{					

					$status = $userz->$field;				

					if($status == 1){

						$status = 0;

					}else{

						$status = 1;

					}

						$statusData[$field] = $status;

						$this->userz->updateData('userz',$statusData,$id);

						$this->session->set_flashdata('message', ucfirst($field).' Updated Successfully');

						if(isset($_GET['redirect']) && $_GET['redirect']!=''){

							redirect($_GET['redirect']);

						} else{

							redirect('admin/userz');

						}

				}else{

						$this->session->set_flashdata('error', 'Invalid Record Id!');

						redirect('admin/userz');

				}

			}

			else

			{

				$this->session->set_flashdata('error', 'Invalid Record Id!');

				redirect('admin/userz');

			}

		}

	}


// -------------------mdawaina

	function register($param = 'empty',$id = 0){


		$this->form_validation->set_rules('full_name', 'full_name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		

		 $data = NULL;
		 $data['ion_auth'] = $this->ion_auth;

		//$this->load->view('admin/userz/register', $data);



		$data['errors'] = array();
		$data['param'] = $param;
		if($this->form_validation->run() == FALSE) 
        {
			if($param == 'course')
				$this->session->set_flashdata('info_message', 'يتطلب التسجيل كمتدرب للتمكن من التسجيل في هذه الدورة');
				
			$this->_view('login/register', $data);
		} 
		else
		 {
			$saveData['full_name'] = set_value('full_name');
			$email = $saveData['email'] = set_value('email');
            $hashed_password = $this->gethashedpass->getv(set_value('password')); // $hasher->HashPassword(set_value('password'));
			
			$saveData['password'] = $hashed_password;
			$saveData['mobile'] = set_value('mobile');

			$saveData['gender'] = 1;
			$saveData['country'] = 258; //unknown country
			$saveData['city'] = 4240;
			$saveData['role'] = set_value('user_group');
			$course_id = set_value('course_id');
			$saveData['active'] = 0;

			$random = $saveData['activation_code'] = random_string('alnum',12); //  random_string('alnum', 16);		

			if($course_id > 0){
				$this->session->set_userdata['course_id'] = $course_id;
			}


			if($this->email_or_mobile_exists(set_value('email'),set_value('mobile'))){
				redirect('auth/login/already_registered');
			}
			else {
				$insert_id = $this->userz->insert('userz',$saveData);	
				$users_groups['group_id'] = set_value('user_group');
				$users_groups['user_id'] = $insert_id;
				$insert_id = $this->userz->insert('users_groups',$users_groups);

				$this->session->set_flashdata('success_message', 'تم تسجيلك بنجاح، الرجاء مراجعة البريد الالكتروني لتفعيل الحساب');
				
					$email_base64 = str_replace("=","",base64_encode($email));
                    $data["link"]  = base_url().'admin/userz/activate_account/'.$random.'/'.$email_base64;
                    $data["message"] = "اضغط على الرابط التالي لضبط كلمة مرور جديدة";                    
                    $content = $this->load->view('email/mail_template', $data ,true);
                    $issent = $this->mailsender->send_mail($email,"كود التفعيل", $content);
				redirect('auth/login/registered_successfuly');				
			}
			

		}



	}

	function activate_account($random="0000",$email="mail@mail.com"){
		
		 $email = base64_decode($email);

		  $query = $this->db->get_where("userz",array('activation_code'=>$random,'email'=>$email));
           
            if($query->num_rows()==1){
				$result = $query->row();
				
				$saveData['active'] = 1;
				$saveData['activation_code'] = null;
				$this->db->where(array("activation_code"=>$random,"email"=>$email));
				$this->db->update("userz", $saveData);

                             
                $this->session->set_flashdata('info_message', "تم تفعيل حسابك، فضلا سجل الدخول");
                redirect('auth/login/account_activated');
               
            }else{
                    $this->session->set_flashdata('message', "يبدو أن هناك خطأ ما");            
                    $this->_view('login/empty_page',$data);               
            }
	}

	

	function email_or_mobile_exists($email, $mobile){
		$email_query = $this->db->get_where("userz", array('email'=>$email));
		if($email_query->num_rows()> 0)
			return true;

		//$mobile = substr( $string_n, 0, 4 ) === "05";
		$mobile_query = $this->db->get_where("userz", array('mobile'=>$mobile));
		if($mobile_query->num_rows()> 0)
			return true;
	}

	
	function test(){
		// $data["link"] = base_url().'admin/userz/validate_code/mohameddawaina@gmail.com/'.random_string('alnum', 16);
		// $data["message"] = "اضغط على الرابط التالي لتنشيط حسابك";
		// $content = $this->load->view('email/mail_template', $data ,true);
		// $hashed_password = $this->mailsender->send_mail("mohameddawaina@gmail.com","Test2", $content);

	  $var = $this->gethashedpass->hasCoursesWithThisInstructor($this->ion_auth->get_user_id(),12);
	  echo $var;
	  return;
	}

	function validate_code($email, $activation_code){
		$query = $this->db->get_where("userz",array("email"=>$email,"activation_code"=>$activation_code));
		if($query->num_rows() > 0){
			$this->session->set_flashdata('success_message', 'تم تنشيط حسابك، يمكنك الان تسجيل الدخول');
			redirect('auth/login');
		}else {

		}
	}

	function instructors(){

 		//  $data["gender"]=$this->userz->getListTable("gender");
		//  $data["countries"]=$this->userz->getListTable("countries");
		//  $data["cities"]=$this->userz->getListTable("cities");
			$search = array();
			$full_name = null;
			 if (isset($_POST)) {
				$full_name = $this->input->get("full_name");
			}
			

		  	$this->db->select("userz.id, username, full_name, company, mobile, phone, photo, country, city, address");
			$this->db->from("userz");
			$this->db->join('users_groups', 'users_groups.user_id = userz.id');
			$this->db->where("group_id",2);
			 if (isset($full_name)) {
				$this->db->like('full_name', $full_name);
			}
			
            $this->db->order_by("id","desc");
			$query = $this->db->get();
			
			if($query->num_rows()>0){
				
			$data['instructors'] = $query->result();
			$data['serviceslib'] = $this->gethashedpass;		
			$data['instructors_cards'] =  $this->load->view('front/instructors/instructor_card',$data, true);			
			$data['ion_auth'] = $this->ion_auth;
			$data['active'] = 'instructors';
            $this->gethashedpass->_view('instructors/instructors_cards', $data);
		}else{
			echo "No Data Found";
		}
		 
			
	}

	function about_instructor($id){
			if (!isset($id) || empty($id)) {
				redirect('/'); 
			}

			$data['ion_auth'] = $this->ion_auth;
			$data['hasCoursesWithThisInstructor'] = $this->gethashedpass->hasCoursesWithThisInstructor($this->ion_auth->get_user_id(),$id);
			$data['profileIsComplete'] = $this->gethashedpass->profileIsComplete($this->ion_auth->get_user_id());
			$data['calculated_rating'] = $this->gethashedpass->calculated_rating($id);
			

			/* $this->db->select("*");
			$this->db->from("userz");
			$this->db->where("id",$id);
            $this->db->order_by("id","desc");
			$query = $this->db->get(); */
			$query = $this->db->get_where("userz",array("id"=>$id));
			$data['instructor'] = $query->row();

			// courses provided by instructor

			$this->db->select("*");
			$this->db->from("training_courses");
			$this->db->where("instructor",$id);
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$data['courses'] = $query->result();
			}           

            $this->gethashedpass->_view('instructors/about_instructor', $data);
	}
	function rate_instructor($instructor_id){
		$json_post = file_get_contents('php://input');
		$decoded_data = json_decode($json_post);
		
		$save['user_id'] = $this->ion_auth->get_user_id();
		$save['instructor_id'] = $instructor_id;
		$save['rating'] = $decoded_data->rating;
		$save['content'] ="";
		$now = new DateTime("now", new DateTimeZone('Asia/Riyadh') );        
		$save['created'] = $now->format('Y-m-d H:i:s');
		$this->db->insert("instructors_review", $save);
		$insert_id = $this->db->insert_id();
		echo $insert_id;
		return $insert_id;
	}

	function update_rate_instructor(){
		$json_post = file_get_contents('php://input');
		$decoded_data = json_decode($json_post);
		
		$instructors_review_id = $decoded_data->instructors_review_id; // $this->input->post("instructors_review_id");

		if (!isset($instructors_review_id) || empty($instructors_review_id)) {
			return "done";
		}

		$content = $decoded_data->content; // $this->input->post("conent");


		if (!isset($content) || empty($content)) {
			return "done";
		}else {
			$update['content'] = $content;
			//$id = (int)$instructors_review_id;
			$this->db->where("id",$instructors_review_id);
			$this->db->update("instructors_review",$update);
		}
		return "done";
	}
	

	

 public function _view($page,$data = null,$isHTML = false)
    {
        $data['ion_auth'] = $this->ion_auth;
        if($isHTML){
            return $this->load->view('front/'.$page,$data, $isHTML);
        }else {
            $this->load->view('front/header', $data);
            $this->load->view('front/'.$page,$data, $isHTML);
            $this->load->view('front/footer');
        }		
    }
}



