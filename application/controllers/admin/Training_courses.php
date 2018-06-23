<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Training_courses extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('ion_auth');
		$this->load->helper('text');

		$this->load->library('form_validation');

		$this->load->model('admin/training_courses_model','training_courses');

	}



	function index($id=1)

	{
		$data['ion_auth'] = $this->ion_auth;
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->training_courses->v_fields;
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

		$data['csvlink'] = base_url().'admin/training_courses/export/csv';
		$data['pdflink'] = base_url().'admin/training_courses/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";

		// PAGINATION

		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/training_courses/index";
        $total_row = $this->training_courses->getCount('training_courses', $searchBy, $searchValue);
        $config["first_url"] = base_url()."admin/training_courses/index".'?'.$_SERVER['QUERY_STRING'];
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
		
		// user id
		$user_id = null;

		if($this->ion_auth->in_group('Instructor')){
			$user_id = $this->ion_auth->get_user_id();        
		}

        $data["results"] = $result = $this->training_courses->getList("training_courses",$pagi, $user_id);
        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;
        // ./ PAGINATION /.

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }

		else {
			$data['training_courses']  = $this->training_courses->getList('training_courses');
		    $this->load->view('admin/training_courses/manage',$data);
		}

	}

	function centerCourses($id=1)

	{
		$data['ion_auth'] = $this->ion_auth;
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->training_courses->v_fields;
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

		$data['csvlink'] = base_url().'admin/training_courses/export/csv';
		$data['pdflink'] = base_url().'admin/training_courses/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";

		// PAGINATION

		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/training_courses/index";
        $total_row = $this->training_courses->getCountCenterCourses('training_courses', $searchBy, $searchValue, $this->ion_auth->get_user_id());
        $config["first_url"] = base_url()."admin/training_courses/index".'?'.$_SERVER['QUERY_STRING'];
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
		
		// user id
		$user_id = null;

		if($this->ion_auth->in_group('Instructor')){
			$user_id = $this->ion_auth->get_user_id();        
		}

        $data["results"] = $result = $this->training_courses->getListOfCenterCourses("training_courses",$pagi,$this->ion_auth->get_user_id());
        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;
        // ./ PAGINATION /.

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }

		else {
			$data['training_courses']  = $this->training_courses->getListOfCenterCourses('training_courses',null,$this->ion_auth->get_user_id());
		    $this->load->view('admin/training_courses/manage',$data);
		}

	}


	function coursesToApproved($id = 1){
		
		$data['ion_auth'] = $this->ion_auth;
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->training_courses->v_fields;
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

		$data['csvlink'] = base_url().'admin/training_courses/export/csv';
		$data['pdflink'] = base_url().'admin/training_courses/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";

		// PAGINATION

		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/training_courses/coursesToApproved";
        $total_row =  $this->training_courses->getCountUnApprovedCourses('training_courses', $searchBy, $searchValue, $this->ion_auth->get_user_id());
        $config["first_url"] = base_url()."admin/training_courses/coursesToApproved".'?'.$_SERVER['QUERY_STRING'];
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
		
		// user id
		$user_id = null;

		if($this->ion_auth->in_group('Instructor')){
			$user_id = $this->ion_auth->get_user_id();        
		}

        $data["results"] = $result = $this->training_courses->getListOfUnApprovedCourses("training_courses",$pagi,$this->ion_auth->get_user_id());
        $str_links = $this->pagination->create_links();

        $data["links"] = $str_links;
        // ./ PAGINATION /.

		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }

		else {
			$data['training_courses']  = $this->training_courses->getListOfUnApprovedCourses('training_courses',null,$this->ion_auth->get_user_id());
		    $this->load->view('admin/training_courses/courses_unapproved',$data);
		}
	}

	function approve($course_id){

		//check the ownerness of this training course
		if(true){
			$this->training_courses->approve_course($course_id);
			$this->session->set_flashdata("message","تمت الموافقة على الكورس");
			redirect('/admin/training_courses/coursesToApproved');			
		}
	}

	
	function reject($course_id){

		//check the ownerness of this training course
		if(true){
			$this->training_courses->reject_course($course_id);
			$this->session->set_flashdata("message","تم رفض الكورس");
			redirect('/admin/training_courses/coursesToApproved');			
		}
	}

	function my_courses($id=1)

	{
		$data['ion_auth'] = $this->ion_auth;
		$cond="";
		$data['searchBy']='';
		$data['searchValue']='';
		$v_fields=$this->training_courses->v_fields;
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

		$data['csvlink'] = base_url().'admin/training_courses/export/csv';
		$data['pdflink'] = base_url().'admin/training_courses/export/pdf';
		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";



		// PAGINATION

		$config = array();
		$config['suffix']='?'.$_SERVER['QUERY_STRING'];
        $config["base_url"] = base_url() . "admin/training_courses/my_courses";
        $total_row = $this->training_courses->getCount('training_courses', $searchBy, $searchValue);
        $config["first_url"] = base_url()."admin/training_courses/my_courses".'?'.$_SERVER['QUERY_STRING'];
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
		
		// user id
		$user_id = null;

		if($this->ion_auth->in_group('Trainee')){
			$user_id = $this->ion_auth->get_user_id();        
		}
		


        $data["results"] = $result = $this->training_courses->getListOfCourses("training_courses",$pagi, $user_id);
        $str_links = $this->pagination->create_links();



        $data["links"] = $str_links;

        // ./ PAGINATION /.



		if (!$this->ion_auth->logged_in()) {
			redirect('/auth/login/');
        }

		else {
			$data['training_courses']  = $this->training_courses->getListOfCourses('training_courses');
			
		    $this->load->view('admin/training_courses/manage_my_courses',$data);
		}

	}



	public function add()

	{   

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



	    $data = NULL;
		 $data['ion_auth'] = $this->ion_auth;
		


		$this->form_validation->set_rules('course_name', 'Course_name Name', 'required');
		$this->form_validation->set_rules('course_specilization', 'Course_specilization Name', 'trim');
		$this->form_validation->set_rules('about_course', 'About_course Name', 'trim');
		$this->form_validation->set_rules('tcenter', 'Tcenter Name', 'trim');
		$this->form_validation->set_rules('instructor', 'Instructor Name', 'trim');
		$this->form_validation->set_rules('start_date', 'Start_date Name', 'trim');
		$this->form_validation->set_rules('end_date', 'End_date Name', 'trim');
		$this->form_validation->set_rules('time_from', 'Time_from Name', 'trim');
		$this->form_validation->set_rules('time_to', 'Time_to Name', 'trim');
		$this->form_validation->set_rules('no_of_seats', 'No_of_seats Name', 'numeric');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('currency', 'Currency Name', 'required');
			



        $data['errors'] = array();

        if($this->form_validation->run() == FALSE) 

        {

			$data["specialization"]=$this->training_courses->getListTable("specialization");
			$data["centers"]=$this->training_courses->getListTable("centers");
			$data["userz"]=$this->training_courses->getListTable("userz");
			$data["currency"]=$this->training_courses->getListTable("currency");

		

			$this->load->view('admin/training_courses/add', $data);

        }

        else

        {

			$saveData['course_name'] = set_value('course_name');
			$saveData['course_specilization'] = set_value('course_specilization');
			$saveData['about_course'] = set_value('about_course');
			$saveData['tcenter'] = set_value('tcenter');
			$saveData['instructor'] = set_value('instructor');
			$saveData['start_date'] = set_value('start_date');
			$saveData['end_date'] = set_value('end_date');
			$saveData['time_from'] = set_value('time_from');
			$saveData['time_to'] = set_value('time_to');
			$saveData['no_of_seats'] = set_value('no_of_seats');
		
			$saveData['price'] = set_value('price');
			$saveData['currency'] = set_value('currency');
			
			if($this->ion_auth->in_group('Instructor')){
				$user_id = $this->ion_auth->get_user_id();  
				$saveData['instructor'] = $user_id;    
			}

			$center = $this->training_courses->getRow("centers",set_value('tcenter'));
			$user = $this->training_courses->getRow("userz",$center->owner);
			$insert_id = $this->training_courses->insert('training_courses',$saveData);

			$data["link"] = base_url().'admin/userz/training_courses/index';
			$data["message"] = "لديك طلب موافقة على اعلان عن دورة تدريبية";
			$content = $this->load->view('email/mail_template', $data ,true);

			//$hashed_password = $this->mailsender->send_mail($user->email,"Test2", $content);
			$hashed_password = $this->mailsender->send_mail("mohameddawaina@gmail.com","Test2", $content);

			$this->session->set_flashdata('message', 'تمت اضافة الدورة، سيتم الاعلان عن الدورة بعد موافقة المركز التدريبي');

			redirect('admin/training_courses');

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


		$this->form_validation->set_rules('course_name', 'Course_name Name', 'required');
		$this->form_validation->set_rules('course_specilization', 'Course_specilization Name', 'trim');
		$this->form_validation->set_rules('about_course', 'About_course Name', 'trim');
		$this->form_validation->set_rules('tcenter', 'Tcenter Name', 'trim');
		$this->form_validation->set_rules('instructor', 'Instructor Name', 'trim');
		$this->form_validation->set_rules('start_date', 'Start_date Name', 'trim');
		$this->form_validation->set_rules('end_date', 'End_date Name', 'trim');
		$this->form_validation->set_rules('time_from', 'Time_from Name', 'trim');
		$this->form_validation->set_rules('time_to', 'Time_to Name', 'trim');
		$this->form_validation->set_rules('no_of_seats', 'No_of_seats Name', 'numeric');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('currency', 'Currency Name', 'required');




       $data['errors'] = array();

       if($this->form_validation->run() == FALSE) 

       {

      	$data["specialization"]=$this->training_courses->getListTable("specialization");$data["centers"]=$this->training_courses->getListTable("centers");$data["userz"]=$this->training_courses->getListTable("userz");$data["currency"]=$this->training_courses->getListTable("currency");

      	

      	

        $data['training_courses']=$this->training_courses->getRow('training_courses',$id);

        $this->load->view('admin/training_courses/view', $data);

       }

       else

       {

		redirect('admin/training_courses/view', $data);

       }

    }

    else

    {

       $this->session->set_flashdata('message', ' Invalid Id !'); 

       redirect('admin/training_courses/view');

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



			    		$this->form_validation->set_rules('course_name', 'Course_name Name', 'required');
		$this->form_validation->set_rules('course_specilization', 'Course_specilization Name', 'trim');
		$this->form_validation->set_rules('about_course', 'About_course Name', 'trim');
		$this->form_validation->set_rules('tcenter', 'Tcenter Name', 'trim');
		$this->form_validation->set_rules('instructor', 'Instructor Name', 'trim');
		$this->form_validation->set_rules('start_date', 'Start_date Name', 'trim');
		$this->form_validation->set_rules('end_date', 'End_date Name', 'trim');
		$this->form_validation->set_rules('time_from', 'Time_from Name', 'trim');
		$this->form_validation->set_rules('time_to', 'Time_to Name', 'trim');
		$this->form_validation->set_rules('no_of_seats', 'No_of_seats Name', 'numeric');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('currency', 'Currency Name', 'required');




            $data['errors'] = array();

            if($this->form_validation->run() == FALSE) 

            {
              	$data['training_courses']=$this->training_courses->getRow('training_courses',$id);

              	$data["specialization"]=$this->training_courses->getListTable("specialization");$data["centers"]=$this->training_courses->getListTable("centers");$data["userz"]=$this->training_courses->getListTable("userz");$data["currency"]=$this->training_courses->getListTable("currency");

				$this->load->view('admin/training_courses/edit', $data);

            }

            else

            {

			   				$saveData['course_name'] = set_value('course_name');
			$saveData['course_specilization'] = set_value('course_specilization');
			$saveData['about_course'] = set_value('about_course');
			$saveData['tcenter'] = set_value('tcenter');
			$saveData['instructor'] = set_value('instructor');
			$saveData['start_date'] = set_value('start_date');
			$saveData['end_date'] = set_value('end_date');
			$saveData['time_from'] = set_value('time_from');
			$saveData['time_to'] = set_value('time_to');
			$saveData['no_of_seats'] = set_value('no_of_seats');
			$saveData['price'] = set_value('price');
			$saveData['currency'] = set_value('currency');
			
					

				$this->training_courses->updateData('training_courses',$saveData,$id);

				

				$this->session->set_flashdata('message', 'Training_courses Updated Successfully!');

				redirect('admin/training_courses');

            }

		}

		else

		{

			$this->session->set_flashdata('message', ' Invalid Id !');	

		    redirect('admin/training_courses');

		}

	 }



	 function delete($id='')

     {

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



 		if(isset($id) and !empty($id))

		{

			$count=$this->training_courses->getCount('training_courses','training_courses.id',$id);

			if(isset($count) and !empty($count))

			{

				$this->training_courses->delete('training_courses','id',$id);

				$this->session->set_flashdata('message', ' Training_courses Deleted Successfully !');

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

			

			//$count=$this->training_courses->getCount('training_courses','training_courses.id',$id);

			for($a=0; $a<count($all_ids); $a++)

	  		{

	  			if($all_ids[$a]!="")

	  			{

					$this->training_courses->delete('training_courses','id',$all_ids[$a]);

					$this->session->set_flashdata('message', ' Training_courses(s) Deleted Successfully !');

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

		$v_fields=array('course_name', 'course_specilization', 'about_course', 'tcenter', 'instructor', 'start_date', 'end_date', 'time_from', 'time_to', 'no_of_seats','price', 'currency');



		$data['sortBy']='';



        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';



        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);

        $pagi = array('order'=>$order, 'order_by'=>$order_by);



		$result = $this->training_courses->getList("training_courses");



		if($filetype=='csv'){

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=training_courses.csv');

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

			<h1 align="center">Training_courses</h1>

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

			$pdf->Output('training_courses.pdf', "D");

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

				if (!is_null($training_courses=$this->training_courses->getRow('training_courses',$id)))	

				{					

					$status = $training_courses->$field;				

					if($status == 1){

						$status = 0;

					}else{

						$status = 1;

					}

						$statusData[$field] = $status;

						$this->training_courses->updateData('training_courses',$statusData,$id);

						$this->session->set_flashdata('message', ucfirst($field).' Updated Successfully');

						if(isset($_GET['redirect']) && $_GET['redirect']!=''){

							redirect($_GET['redirect']);

						} else{

							redirect('admin/training_courses');

						}

				}else{

						$this->session->set_flashdata('error', 'Invalid Record Id!');

						redirect('admin/training_courses');

				}

			}

			else

			{

				$this->session->set_flashdata('error', 'Invalid Record Id!');

				redirect('admin/training_courses');

			}

		}

	}





}



