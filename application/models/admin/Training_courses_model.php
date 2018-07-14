<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Training_courses_model extends CI_Model

{

    public $v_fields=array('course_name', 'specialization.main_specialization', 'about_course', 'centers.center_name', 'userz.full_name', 'start_date', 'end_date', 'time_from', 'time_to', 'no_of_seats','price', 'currency.currency_desc');



	function __construct()

	{

		parent::__construct();

	}

    function approve_course($course_id){
        $update['tcenter_acceptance'] = 1;
        $this->db->where("id",$course_id);
        $this->db->update("training_courses",$update);
    }

     function reject_course($course_id){
        $update['tcenter_acceptance'] = 2;
        $this->db->where("id",$course_id);
        $this->db->update("training_courses",$update);
    }

	function getList($table, $pagination=array(), $user_id = null) {

        //  PAGINATION START
        if((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {
          $this->db->limit($pagination['per_page'],$pagination['cur_page']);
        }

        //  PAGINATION END
        // sort
          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';
          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
          if($order_by!=''){
            $this->db->order_by($order_by, $order);
          }
        // end sort

        // SEARCH START
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);
        }

        // SEARCH END  
        $this->db->select("$table.*  , specialization.main_specialization as course_specilization  , centers.center_name as tcenter  , userz.full_name as instructor  , currency.currency_desc as currency ");
        $this->db->from($table);
         $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left");     
          if((isset($user_id)) and !empty($user_id)){
            $this->db->where('instructor', $user_id);
        }

        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $result = $query->result();
    }

     function getListOfInstructorCourses($table, $pagination=array(), $user_id = null) {

        //  PAGINATION START
        if((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {
          $this->db->limit($pagination['per_page'],$pagination['cur_page']);
        }

        //  PAGINATION END
        // sort
          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';
          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
          if($order_by!=''){
            $this->db->order_by($order_by, $order);
          }
        // end sort

        // SEARCH START
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);
        }

        $center_id = 0;
        //get the center of the owner
        $center_query = $this->db->get_where("centers", array("owner"=>$user_id));
        if($center_query->num_rows() == 1){
            $center_id = $center_query->row()->id;
        }

        
        // SEARCH END  
        $this->db->select("$table.*  , specialization.main_specialization as course_specilization  , centers.center_name as tcenter  , userz.full_name as instructor  , currency.currency_desc as currency ");
        $this->db->from($table);
        $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left");     
          
         $this->db->where('instructor', $user_id);        
      //  $this->db->where_in('tcenter',$centers);        

        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    function getListOfCenterCourses($table, $pagination=array(), $user_id = null) {

        //  PAGINATION START
        if((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {
          $this->db->limit($pagination['per_page'],$pagination['cur_page']);
        }

        //  PAGINATION END
        // sort
          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';
          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
          if($order_by!=''){
            $this->db->order_by($order_by, $order);
          }
        // end sort

        // SEARCH START
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);
        }

        $center_id = 0;
        //get the center of the owner
        $center_query = $this->db->get_where("centers", array("owner"=>$user_id));
        if($center_query->num_rows() == 1){
            $center_id = $center_query->row()->id;
        }

         $centers = $this->getCentersOwned("centers",$user_id);
         if(!isset($centers) || Empty($centers))
            return null;
        // SEARCH END  
        $this->db->select("$table.*  , specialization.main_specialization as course_specilization  , centers.center_name as tcenter  , userz.full_name as instructor  , currency.currency_desc as currency ");
        $this->db->from($table);
        $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left");     
          
         $this->db->where('tcenter_acceptance',1);        
        $this->db->where_in('tcenter',$centers);        

        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $result = $query->result();
    }



    
    function getListOfUnApprovedCourses($table, $pagination=array(), $user_id = null) {

        //  PAGINATION START
        if((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {
          $this->db->limit($pagination['per_page'],$pagination['cur_page']);
        }

        //  PAGINATION END
        // sort
          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';
          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';
          if($order_by!=''){
            $this->db->order_by($order_by, $order);
          }
        // end sort

        // SEARCH START
        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {
            $this->db->like($_GET['searchBy'],$_GET['searchValue']);
        }

        $center_id = 0;
        //get the center of the owner
        $center_query = $this->db->get_where("centers", array("owner"=>$user_id));
        if($center_query->num_rows() == 1){
            $center_id = $center_query->row()->id;
        }

         $centers = $this->getCentersOwned("centers",$user_id);
        // SEARCH END  
        $this->db->select("$table.*  , specialization.main_specialization as course_specilization  , centers.center_name as tcenter  , userz.full_name as instructor  , currency.currency_desc as currency ");
        $this->db->from($table);
        $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left");     
          
       
        $this->db->where('tcenter_acceptance',0);        
      //  $this->db->where_in('tcenter',$centers);        

        $this->db->order_by("id","desc");
        $query = $this->db->get();
        return $result = $query->result();
    }


    
	function getListOfCourses($table, $pagination=array(), $user_id = null) {



        //  PAGINATION START

        if((isset($pagination['cur_page'])) and !empty($pagination['per_page']))

        {

          $this->db->limit($pagination['per_page'],$pagination['cur_page']);

        }

        //  PAGINATION END



        // sort

          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';

          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';

          if($order_by!=''){

            $this->db->order_by($order_by, $order);

          }



        // end sort



        // SEARCH START

        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {

            $this->db->like($_GET['searchBy'],$_GET['searchValue']);

        }

        // SEARCH END


       
        

        $this->db->select("training_courses.id,course_name,course_specilization,about_course,tcenter,instructor,start_date,end_date,days,time_from,time_to,no_of_seats,price,group_price,currency
          , specialization.main_specialization as course_specilization  ,
           centers.center_name as tcenter  , userz.full_name as instructor  ,
         currency.currency_desc as currency,student_courses.id as student_courses_id, student_courses.student_id as student_courses_student_id ");

        $this->db->from($table);

         $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left");     
         $this->db->join("student_courses", "training_courses.id=student_courses.course_id" );
        /*   if((isset($user_id)) and !empty($user_id)){
            $this->db->where('instructor', $user_id);
             $this->db->where('instructor', $user_id);
        } */
        // $this->db->where('student_courses.student_id',19);
        $this->db->order_by("training_courses.id","desc");

        $query = $this->db->get();

        

        return $result = $query->result();

    }



    function getListTable($table) {


        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();

    }

  



    function getRow($table, $id) {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('id' => $id));

        $data = $query->result();

        return $data[0];

    }


      function getCentersOwned($table, $owner) {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('owner' => $owner));

        $data = $query->result();

        $centers = array();
        $i = 0;
        foreach ($data as $key => $value) {
            $centers[$i] = $data[$i]->id;
            $i++;
        }

        return $centers;
    }



    function getSelectedData($table, $field, $idArr) {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where_in('id', $idArr);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$field;

        }

        return $arr;

    }



    function getCount($table, $key='', $value='') {

            $this->db->select("$table.*");
            if(isset($key) && isset($value) && !empty($key) && !empty($value))  {
                $this->db->where($key,$value);
            }
            $this->db->from($table);
             $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");  $this->db->join("centers", "training_courses.tcenter = centers.id", "left");  $this->db->join("userz", "training_courses.instructor = userz.id", "left");  $this->db->join("currency", "training_courses.currency = currency.id", "left"); 
            $query = $this->db->get();
            return $query->num_rows();
    }


       function getCountCenterCourses($table, $key='', $value='',  $user_id) {

            $centers =  $this->getCentersOwned("centers",$user_id);

            if(isset( $centers) || Empty($centers)){
                return 0;
            }

            $this->db->select("$table.*");
            if(isset($key) && isset($value) && !empty($key) && !empty($value))  {
                $this->db->where($key,$value);
            }
            $this->db->from($table);
            $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");
            $this->db->join("centers", "training_courses.tcenter = centers.id", "left"); 
            $this->db->join("userz", "training_courses.instructor = userz.id", "left"); 
            $this->db->join("currency", "training_courses.currency = currency.id", "left"); 
             $this->db->where_in('tcenter', $centers);
               $this->db->where('tcenter_acceptance',1);     
            $query = $this->db->get();
            return $query->num_rows();
    }


     function getCountInstructorCourses($table, $key='', $value='',  $user_id) {

           // $centers =  $this->getCentersOwned("centers",$user_id);

            

            $this->db->select("$table.*");
            if(isset($key) && isset($value) && !empty($key) && !empty($value))  {
                $this->db->where($key,$value);
            }
            $this->db->from($table);
            $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");
            $this->db->join("centers", "training_courses.tcenter = centers.id", "left"); 
            $this->db->join("userz", "training_courses.instructor = userz.id", "left"); 
            $this->db->join("currency", "training_courses.currency = currency.id", "left"); 
            // $this->db->where_in('tcenter', $centers);
            $this->db->where('instructor',$user_id);
            $this->db->order_by("id","desc");     
            $query = $this->db->get();
            return $query->num_rows();
    }


     function getCountUnApprovedCourses($table, $key='', $value='',  $user_id) {

          $centers =  $this->getCentersOwned("centers",$user_id);
          if(isset( $centers) || Empty($centers)){
                return 0;
            }

            $this->db->select("$table.*");
            if(isset($key) && isset($value) && !empty($key) && !empty($value))  {
                $this->db->where($key,$value);
            }
            $this->db->from($table);
             $this->db->join("specialization", "training_courses.course_specilization = specialization.id", "left");
             $this->db->join("centers", "training_courses.tcenter = centers.id", "left");
             $this->db->join("userz", "training_courses.instructor = userz.id", "left");
             $this->db->join("currency", "training_courses.currency = currency.id", "left"); 
             $this->db->where_in('tcenter', $centers);       
             $this->db->where('tcenter_acceptance',0);
            $query = $this->db->get();
            return $query->num_rows();
    }



    function insert($table, $data){

        $this->db->insert($table, $data);

        return $this->db->insert_id();

    }

    



    function multiSelectInsert($r_table, $field1, $value1, $field2, $value2=array())

    {

      $this->db->query("delete from $r_table where $field1='$value1'");

      if ($r_table!="" && $field1!="" && $value1!="" && $field2!="" && count($value2)>0) {

        for ($i=0; $i < count($value2); $i++) {

          $data[] = array(

            $field1 => $value1,

            $field2 => $value2[$i],

          );

        }

        $this->db->insert_batch($r_table, $data);        

      }

    }



    function getSelectedIds($table, $id, $select_field, $where_field)

    {

        $arr=array();

        $this->db->select("$select_field");

        $this->db->from($table);

        $this->db->where("$where_field",$id);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$select_field;

        }

        return $arr;

    }



    function updateData($table, $data, $id)

    {

        $this->db->where("id",$id);

        $this->db->update($table,$data);

    }



    function delete($table, $key='', $value='')

    {

        if(isset($key) && isset($value) && !empty($key) && !empty($value))

        {

            $this->db->where($key,$value);

        }

        $this->db->delete($table);

    }



    



public function uploadData(&$data, $file_name, $file_path, $postfix='', $allowedTypes)

{

   $config = NULL;

   $config['upload_path'] = $this->config->item($file_path);  

   $config['allowed_types'] = $allowedTypes;

   if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name']))

   {

    $this->load->library('upload', $config);

    $this->upload->initialize($config);

    $exts = explode(".",$_FILES[$file_name]['name']);

    $_FILES[$file_name]['name'] = $exts[0].$postfix.".".end($exts);

    if ( ! $this->upload->do_upload($file_name))

    {

     $data[$file_name.'_err'] = array('error' => $this->upload->display_errors());

    }

    else

    {

     $uploadImg = $this->upload->data();

     if($uploadImg['file_name'] != '')

    {

     if (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

     {

      @unlink($this->config->item($file_path).$_POST['old_'.$file_name]);

     }

     $data[$file_name] = $uploadImg['file_name'];

    }

   } 

  }

  elseif (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

  {

   $data[$file_name] = $_POST['old_'.$file_name];

  }   

}

function course_details($id) {
     $this->db->select("
                training_courses.id id,
                course_name,
                training_courses.course_specilization course_specilization,
                specialization.main_specialization main_specialization,
                specialization.branch_specialization branch_specialization,
                about_course,
                training_courses.tcenter tcenter,
                centers.center_name center_name,
                training_courses.instructor instructor,
                userz.full_name instructor_name,
                start_date, end_date,
                time_from, time_to,
                no_of_seats,
                price,
                training_courses.currency currency,
                currency.currency_desc currency_desc
          ");
         $this->db->from("training_courses");
         $this->db->join("currency","training_courses.currency = currency.id" );
         $this->db->join("userz", "training_courses.instructor = userz.id");
         $this->db->join("centers", "training_courses.tcenter=centers.id");
         $this->db->join("specialization", "training_courses.course_specilization=specialization.id");
         $this->db->where("training_courses.id", $id);
         $query = $this->db->get();
         if($query->num_rows() == 1){
             $result = $query->row();
         }
         else {
             return null;
         }
         return $result;
}

}



