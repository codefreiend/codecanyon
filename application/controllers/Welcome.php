<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('admin/centers_model','centers');
		$this->load->model('admin/training_courses_model','training_courses');
        $this->load->model('admin/Userz_model','Userz');
        $this->load->library('gethashedpass');
		$this->load->library('mailsender');
        	
    }

    function login(){
        
         if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        } 


        if(isset($this->session->userdata['course_id'])){
            redirect('welcome/complete_course_register/'.$this->session->userdata['course_id']);            
        }
     //   $this->ion_auth->add_to_group(4, 6);
         $data['ion_auth'] = $this->ion_auth;
         $data['profileIsComplete'] = $this->gethashedpass->profileIsComplete($this->ion_auth->get_user_id());
         $this->load->view('welcome',$data); 
    }
    public function complete_course_register(){
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        } 

        echo "course is ". $this->session->userdata['course_id'];

    }
    public function index() {        
        $data['ion_auth'] = $this->ion_auth;
        $data['search_centers'] = $this->search_centers();        
        $data['center_blocks'] = $this->show_center_blocks(); 
        $data['center_carousel_items'] = $this->show_centers_carousel();       
        $data['instructors_data'] = $this->instructors();
        $data['instructor_cards'] = $this->instructor_cards();
        $data['search_instructor'] = $this->search_instructor();   
        $data['courses_data'] = $this->courses();
        $data['search_courses'] = $this->search_courses();
        $data['courses_cards'] = $this->show_course_blocks();
        $data['statistical_bar'] = $this->statistical_bar();
        $this->_view('home', $data);
        return;
    }

    function delete_notification($id = '') {

        if (!$this->tank_auth->is_logged_in()) {

            redirect('/auth/login/');
        }

        $id = $_POST['note_id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();

        $data['username'] = $this->tank_auth->get_username();

        $data['email'] = $this->tank_auth->get_email();

        $data['groupid'] = $this->tank_auth->get_group();



        if (isset($id) and ! empty($id)) {



            $count = $this->generic->getList('notification', 'c', '', '', 'user_id', $userid, 'id', $id);

            if (isset($count) and ! empty($count)) {

                $this->generic->crud('notification', '', 'id', $id, 'delete');

                $this->session->set_flashdata('message', ' Notification Deleted Successfully !');

                redirect('welcome');
            } else {

                $this->session->set_flashdata('message', ' Invalid Id !');

                redirect('welcome');
            }
        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('welcome');
        }
    }

    function common_delete($id = '', $table) {

        if (!$this->tank_auth->is_logged_in()) {

            redirect('/auth/login/');
        }

        $id = $_POST['id'];

        $data['user_id'] = $userid = $this->tank_auth->get_user_id();



        if (isset($id) and ! empty($id)) {

            $count = $this->generic->getList($table, 'c', '', '', '', '', 'id', $id);

            if (isset($count) and ! empty($count)) {

                $this->generic->crud($table, '', 'id', $id, 'delete');
            }
        }
    }
// DAWAINA functions starts here
    function test(){
        $var1 = $this->_view('login/enter_email_front',null,true);
        print_r($var1);

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
    
   

    function forgot_password(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		
        $data = NULL;		
        $data['errors'] = array();
        if($this->form_validation->run() == FALSE) {
            $this->_view('login/enter_email_front',$data);            
        }else {
                $email = set_value('email');
                $query = $this->db->get_where('userz', array('email'=>$email));
                if($query->num_rows() == 1){
                    $this->load->helper('string');
                    $random = random_string('alnum',12);
                    $data["link"]  = base_url().'welcome/reset_password/'.$random.'/' .base64_encode($email);
                    $data["message"] = "اضغط على الرابط التالي لضبط كلمة مرور جديدة";                    
                    $content = $this->load->view('email/mail_template', $data ,true);
                    $issent = $this->mailsender->send_mail("mohameddawaina@gmail.com","Reset Password", $content);

                    $update['activation_code'] = $random;                   
                    $update['forgotten_password_time'] = time();
                    $this->db->where("email", $email);
                    $this->db->update("userz",$update);

                    $this->session->set_flashdata('info_message', "تم ارسال رابط ضبط كلمة المرور على البريد الالكتروني، ستنتهي صلاحية الرابط بعد ساعتين");            
                    $this->_view('login/empty_page',$data);            
                }else{
                    $this->session->set_flashdata('message', 'البريد الالكتروني غير مسجل لدينا');            
                    $this->_view('login/enter_email_front',$data);
                }
            //$this->_view_unsigned();
            //echo 'i am here';
        }
    }  
        //<?=base_url()admin/userz/validate_email
    
    
    public function reset_password($random='abcdef',$email='mail@mail.com'){
        
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]|min_length[6]|alpha_numeric');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[6]|alpha_numeric');
		//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $data['errors'] = array();

        if(!$this->form_validation->run() == FALSE) {


             $password = set_value('password');
             

             $retrieved_email =  $this->session->userdata('userz_email');
             if(isset($retrieved_email)){
                $update['activation_code'] = null;
                $update['password'] = $this->gethashedpass->getv($password); // $hasher->HashPassword(set_value('password'));
                
                $this->db->where("email",$retrieved_email);
                $this->db->update("userz",$update);
             }

            $this->session->set_flashdata('info_message', "تم اعادة ضبط كلمة المرور ، فضلا سجل الدخول");                        
            $this->_view('login/login',$data);  
        }else {

            $email = base64_decode($email);
           
            $query = $this->db->get_where("userz",array('activation_code'=>$random,'email'=>$email));
            $data = array();
            if($query->num_rows()==1){
                $result = $query->row();
                $forgotten_password_time = $result->forgotten_password_time;
                $this->session->set_userdata('userz_email',$email);
                $seconds = time() - $forgotten_password_time;
                $hours = floor($seconds/3600);
                if ($hours < 2){
                    $this->session->set_flashdata('info_message', "فضلا أدخل كلمة المرور الجديدة");            
                   
                    $this->_view('login/reset_password',$data);        
                
                }else {
                    $data = NULL;		
                    $data['errors'] = array();
                    $this->session->set_flashdata('message', "تجاوزت مدة الرابط ساعتان، حاول مرةاخرى");            
                    $this->_view('login/enter_email_front',$data);               
                }
            }else{
                    $this->session->set_flashdata('message', "الرابط لا يعمل، حاول مرة أخرى");            
                    $this->_view('login/empty_page',$data);               
            }
        }    
    }

	public function show_center_block($id,$name,$about,$logo){
        $data['id'] = $id;
		$data['name'] = $name;
		$data['about'] = $about;
		$data['logo'] = $logo;
		return $this->load->view('front/centers/_center_block',$data, true);
	}

    function center_carousel_item($id, $name, $logo){
        $data['id'] = $id;
		$data['name'] = $name;
		$data['logo'] = $logo;
		return $this->load->view('front/centers/_center_carousel_item',$data, true);
    }

    function show_centers_carousel(){
        $center_blocks = "";
        $this->db->select("*");
        $this->db->from("centers");
        $this->db->limit(10);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        
		if($query->num_rows()>0){
			$centers = $query->result();
			foreach ($centers as $center) {				
				$center_blocks = $center_blocks . $this->center_carousel_item($center->id,$center->center_name,$center->logo);
			}
		}else{
			echo "No Data Found";
		}

        return  $center_blocks;
    }
	public function show_center_blocks($search = null){
		$this->load->helper('text');
        $center_blocks = "";
        $this->db->select("*");
        $this->db->from("centers");
        if(isset($search)){
            $this->db->like($search);
            $this->session->set_flashdata('search_result', 'نتائج البحث:');              
        }  
		$query = $this->db->get();
		if($query->num_rows()>0){
			$centers = $query->result();
			foreach ($centers as $center) {
				$about = $string = word_limiter($center->about_center,5);
				$center_blocks = $center_blocks . $this->show_center_block($center->id,$center->center_name,$about,$center->logo);
			}
		}else{
			echo "No Data Found";
		}

        return  $center_blocks;
    }

   


    function centers_list() {
        $search = array();
         if(isset($_GET['center_name']) && !empty($_GET['center_name'])){ 
            $search = array("center_name" =>  $this->input->get('center_name'));
         }
        
        $data['center_blocks'] = $this->show_center_blocks($search); 
        $data['instructors_data'] = $this->instructors();
        $data['courses_data'] = $this->courses();
        $data['statistical_bar'] = $this->statistical_bar();
       $data['center_carousel_items'] = $this->show_centers_carousel(); 
        $this->_view('centers/centers_list', $data);
        return;

    }

    function search_centers(){
        return $this->load->view('front/centers/search_centers',null, true);
    }

    function search_instructor(){
        return $this->load->view('front/instructors/search_instructor',null, true);
    }



    function instructors(){
        	$this->db->select("userz.id id, full_name");
			$this->db->from("userz");
			$this->db->join('users_groups', 'users_groups.user_id = userz.id');
            $this->db->where("group_id",2);
            $this->db->order_by("userz.id","desc");
		$query = $this->db->get();
		if($query->num_rows()>0){
            $data['instructors'] = $query->result();
            // print_r($data['instructors']);
            // return;		
          return $this->load->view('front/instructors/instructors_line',$data, true);
		}else{
			echo "No Data Found";
		}
    }

    function courses(){
        
        $query = $this->db->query('select *
         from training_courses
         where instructor in ( 
            Select user_id 
            From
            service_subscriptions
            Where(DATE_ADD(sub_date, INTERVAL 1 YEAR) > curdate())
        )'); // $this->db->get_where("training_courses");
        

		if($query->num_rows()>0){
			$data['courses'] = $query->result();		
          return $this->load->view('front/courses/courses_line',$data, true);
		}else{
			echo "No Data Found";
		}
    }
    
    public function center_details($id){

        
	  if(isset($id) and !empty($id))

	  {
	        $data = NULL;
		    $data['ion_auth'] = $this->ion_auth;
          
	        if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))
            {
                $data["errors"]=$photo_data["photo_err"];
                $this->form_validation->set_rules("logo","Logo","trim");
            }
		    $data['errors'] = array();
      	    $data["specialization"]=$this->centers->getListTable("specialization");$data["center_type"]=$this->centers->getListTable("center_type");$data["userz"]=$this->centers->getListTable("userz");$data["countries"]=$this->centers->getListTable("countries");$data["cities"]=$this->centers->getListTable("cities");
            $data['centers']=$this->centers->getRow('centers',$id);
            $this->_view('centers/center_details2',$data);            
        }        
    }


    function courses_list(){

        	$data["specialization"]=$this->training_courses->getListTable("specialization");
			$data["centers"]=$this->training_courses->getListTable("centers");
			$data["userz"]=$this->training_courses->getListTable("userz");
			$data["currency"]=$this->training_courses->getListTable("currency");

		
            $this->db->select("*");
            $this->db->from("training_courses");
            $this->db->order_by("id","desc");
        	$query = $this->db->get();
		if($query->num_rows()>0){
			$data['courses'] = $query->result();		
           //  $data['courses_accordion'] =  $this->load->view('front/courses/one_course_accordion',$data, true);
           // $this->_view('courses/courses_accordion', $data);
           $data['courses_cards'] =  $this->load->view('front/courses/course_block',$data, true);
            $this->_view('courses/courses_accordion', $data);
           
		}else{
			echo "No Data Found";
		}
    }


    function search_courses(){
        return $this->load->view('front/courses/search_courses',null, true);
    }

    public function show_course_blocks($search = null){

        $this->load->helper('text');
        $course_blocks = "";        
        //   if (!empty($search->course_name) && !empty($search->instructor)) 
            $this->db->select("*");
            $this->db->from("training_courses");
            if(isset($search)){
            $this->db->like($search);
            $this->session->set_flashdata('search_result', 'نتائج البحث:');              
            }   
            $this->db->limit(8, 0); 
             $this->db->order_by("id","desc");                   
            $query = $this->db->get();
        
        
        if($query->num_rows()>0){
            $courses = $query->result();
            foreach ($courses as $course) {
                $about_course = $string = word_limiter($course->about_course,7);
                $course_name = $string = word_limiter($course->course_name,3);
                $course_date = $course->start_date;
                $instructor = $course->instructor;
                //$about_course = $string = word_limiter($course->about_course,7);
                $course_blocks = $course_blocks . $this->show_course_block($course->id,$course_name,$about_course,$instructor,$course_date);
            }
        }else{
            echo "No Data Found";
        }

        return  $course_blocks;
    }

    public function show_course_block($id,$name,$about,$instructor,$date){
        $data['id'] = $id;
		$data['course_name'] = $name;
		$data['about_course'] = $about;
		$data['course_date'] = $date;
        $data['instructor'] = $instructor;
        $data["userz"]=$this->training_courses->getListTable("userz");
		//$data['logo'] = $logo;
		return $this->load->view('front/courses/_course_block',$data, true);
	}

    function courses_cards() {      
        $search = array();
       
         if(isset($_GET['course_name']) && !empty($_GET['course_name'])){ 
            $search = array("course_name" =>  $this->input->get('course_name'));
         }

          if(isset($_GET['instructor']) && !empty($_GET['instructor'])){
            $search = array("instructor" => $this->input->get('instructor'));
         }

           if(isset($_GET['start_date']) && !empty($_GET['start_date'])){
            $search = array("start_date" => $this->input->get('start_date'));
         }

       // print_r($search);
        $data['center_blocks'] = $this->show_center_blocks(); 
        $data['instructors_data'] = $this->instructors();
        $data['courses_cards'] = $this->show_course_blocks($search);
        $data['statistical_bar'] = $this->statistical_bar();
        $data['center_carousel_items'] = $this->show_centers_carousel(); 
        $data["instructors"] = $this->Userz->getAllInstructors();
        $this->_view('courses/courses_cards', $data);
        return;
    }

    function course_details($id){
        $data["courses"] = $this->training_courses->course_details($id);
         if($data["courses"] == null){
            $data["message"] = "عفوا هذه الصفحة غير موجودة";
            $this->_view('error', $data);     
        } 
         else
          {
             $this->load->library('Gethashedpass');
             $data['serviceslib'] = $this->gethashedpass;
             if($this->ion_auth->logged_in()) {
                $data["ion_auth"] = $this->ion_auth;
            }
            $rating_sum = $this->db->query("SELECT sum(rating) rating_sum,  count(rating) rating_count FROM review where course_id = $id");           
            $rating_query = $this->db->query("SELECT rating, count(rating) count1 FROM review where course_id = $id group by rating");
            $rating_sum = $rating_sum->row();
            
            $data['rating_average'] = 0; // $rating_sum->rating_sum / $rating_query->num_rows();
            $data['rating_data'] = $rating_query->result(); 
            $data['total_rating'] = $rating_sum->rating_count;
            
            $data['rating'] = $this->load->view('front/courses/course_rating',$data,true);

            $this->_view('courses/course_details', $data);
        }       
    }

   function register($id,$random="000"){
       if(isset($this->ion_auth)) {
           $auth = $this->ion_auth;           
           if($auth->in_group('Trainee')){
                $data['course'] = $this->training_courses->getRow('training_courses',$id);
                $data['course_id'] = $id;
                //$data['random'] = $this
                $this->_view('payment/course_payment', $data);
           }else {
                    $data["message"] = 'الرجاء التسجيل كمتدرب للتمكن من التسجيل في هذه الدورة ';
                 //$this->load->view('admin/userz/register',$data);
                // $data['errors'] = array();
               //  $this->load->view('admin/userz/register',$data);
                    redirect('admin/userz/register/course');

                 //$data["message"] .= '<a href="'.base_url().'index.php/admin/userz/register/course/'.$id.'">للتسجيل اضغط هنا</a>';
                 //$data["message"] .= '<br/>';
                 //$this->_view('error', $data); 
           }
       }
       else {
             redirect('/auth/login/');
       }
   }
   
   function register_complete($id){
     if($this->ion_auth->logged_in()){  
        $insert["course_id"] = $id;
        $insert["student_id"] = $this->ion_auth->get_user_id();
        $insert["join_date"] = date('Y-m-d');
        $insert["paid"] = 1;
        $this->db->insert("student_courses", $insert );
        $data["message"] = "تم تسجيلك في هذه الدورة";
       // $this->_view('success', $data); 
        $this->session->set_flashdata("message","تم تسجيلك في هذه الدورة");
       redirect('admin/training_courses/my_courses');
     }else{
         redirect('/auth/login/');
     }
   }


   function count_instructors(){
      $query =  $this->db->query("select count(userz.username) instructors from userz 
                        join users_groups on userz.id = users_groups.user_id
                        where users_groups.group_id =". INSTRUCTOR);
     return $query->row()->instructors;
   }

   function count_centers(){
      $query =  $this->db->query("select count(*) centers from centers");
      return $query->row()->centers;
   }


   function count_courses(){
      $query =  $this->db->query("select count(*) courses from training_courses");
     return $query->row()->courses;
   }

   function statistical_bar(){
        $data['count_instructors'] = $this->count_instructors();
        $data['count_centers'] = $this->count_centers();
        $data['count_courses'] = $this->count_courses();
       return $this->load->view('front/statistical_bar', $data, true);
   }


   function instructor_cards(){

 		
			$search = array();
			$full_name = null;
			
			

		  	$this->db->select("userz.id, username, full_name, company, mobile, phone, photo, country, city, address");
			$this->db->from("userz");
			$this->db->join('users_groups', 'users_groups.user_id = userz.id');
			$this->db->where("group_id",2);
			
            $this->db->order_by("id","desc");
			$query = $this->db->get();
			
			if($query->num_rows()>0){
				
			$data['instructors'] = $query->result();
			$data['serviceslib'] = $this->gethashedpass;		
			$result =  $this->load->view('front/instructors/instructor_card',$data, true);			
			
			
           // $this->gethashedpass->_view('instructors/instructors_cards', $data);
           return $result;
		}else{
			echo "No Data Found";
		}
		 
			
    }
    
    function login11(){

    }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */