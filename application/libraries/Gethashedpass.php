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

        public function _view($page,$data = null,$isHTML = false){
          $this->load->view('front/header', $data);
          $this->load->view('front/'.$page,$data, $isHTML);
          $this->load->view('front/footer');		
	    }
    }