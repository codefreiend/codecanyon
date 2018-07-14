<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    require_once('phpass-0.1/PasswordHash.php');

  class Gethashedpass extends CI_Model{
        private $CI;

         public function __construct()
        {
                // Do something with $params

               // $this->_CI =& get_instance();
        }

       public function getv($password){            
                $hasher = new PasswordHash(
                        $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth'));

                $hashed_password = $hasher->HashPassword($password);
                    return $hashed_password;
        }


        function isSubscribedToService($service_id,$user_id){
            $this->load->database();
          $query =  $this->db->get_where("service_subscriptions", array("service_id"=>$service_id,"user_id"=>$user_id));
          if($query->num_rows() == 1)
            return true;
          else return false;
        }

        function isSubscriptionValid($user_id){
           $query = $this->db->query('select *
                from training_courses
                where instructor in ( 
                    Select user_id 
                    From
                    service_subscriptions
                    Where(DATE_ADD(sub_date, INTERVAL 1 YEAR) > curdate()
                    and user_id = '.$user_id.' )
                )'); // $this->db->get_where("training_courses");
                

            if($query->num_rows()>0){
              return true;
            }else{
               return false;
            }
        }

        function isAlreadyRegistered($trainee_id,$course_id){
          // to do 
          // check if he want to register in the same course again
            $query = $this->db->query("select * from student_courses where student_id = $trainee_id and course_id = $course_id");
            if($query->num_rows() > 0)
              return true;
            else 
              return false;
        }

        function get_first_last_name($full_name){
            $name_array = explode(" ",$full_name);

            if(sizeof($name_array) > 0){
              $lastEl = array_values(array_slice($name_array, -1))[0];
              $firstEl = $name_array[0];
              return $firstEl." ".$lastEl;
            }

            return null;
        }

        function profileIsComplete($user_id){
          $query = $this->db->get_where("userz", array("id"=>$user_id));
          if($query->num_rows() == 1){
            $user = $query->row();
            if($user->birth_date == '0000-00-00' || $user->company =='' || $user->photo =='' 
            || $user->country =='258' || $user->city =='4240' || $user->address =='' ){ // check CV also
              return false;
            }

          }else {
            return false;
          }

          return true;
        }

        public function _view($page,$data = null,$isHTML = false){
          $this->load->view('front/header', $data);
          $this->load->view('front/'.$page,$data, $isHTML);
          $this->load->view('front/footer');		
      }
      function getCoursesPresented($instructor) {

        $this->db->select('*');

        $query = $this->db->get_where("training_courses", array('instructor' => $instructor));

        $data = $query->result();

        $courses = array();
        $i = 0;
        foreach ($data as $key => $value) {
            $courses[$i] = $data[$i]->id;
            $i++;
        }

        return $courses;
    }
      public function hasCoursesWithThisInstructor($student_id=0, $instructor=0){
          $courses = $this->getCoursesPresented($instructor);
          $this->db->select("*");
          $this->db->from("student_courses");
          $this->db->where_in('course_id',$courses);
          $this->db->where('student_id',$student_id);
          $query = $this->db->get();
          if($query->num_rows() > 0){
            return true;
          }

          return false;
      }

      function calculated_rating($instructor_id = 0){
          $rating = 0;
          $query = $this->db->query('select count(rating) as count_of_rating, IFNULL(sum(rating), 0) as sum_of_rating from instructors_review where instructor_id ='.$instructor_id);
          if($query->num_rows() > 0){
            $result = $query->row();
            $count_of_rating = $result->count_of_rating;
            $sum_of_rating = $result->sum_of_rating;
            if($count_of_rating == 0){
                 $count_of_rating = 1;             
            }
             $rating = $sum_of_rating / $count_of_rating;
          }
          return $rating;
      }
      
      function courseIsValidDate($course_id){
        $this->db->select("*");
        $this->db->from("training_courses");
        $this->db->where('id',$course_id);
        $this->db->where('end_date >=', date('Y-m-d'));     
        $query = $this->db->get();       
        if($query->num_rows() > 0){
         return true;

        }

        return false;
      }
    }