<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		error_reporting(E_ERROR | E_PARSE);
		
		
       
       
    
       
        
		//$one= date('Y-m-d',strtotime(date().'-1 year'));
		//$tri = date('Y-m-d',strtotime(date().'-1095 day'));
		$q="SELECT * FROM `user`";
		if(isset($_GET['date'])){
		 
        
		    $q.=" where ";
		    if($_GET['date']==1){
		        $q.="`tgl_msk` >'".$one."'";
		    }else if($_GET['date']==2){
		        $q.="`tgl_msk`<'".$one."' AND `tgl_msk`>'".$tri."'";
		    }else if($_GET['date']==3){
		        $q.="`tgl_msk`<'".$tri."'";
		    }
		}
		//echo $q;
		$user=$this->db->query($q)->result_array();
		//$user=$this->user_m->getdata("user")->result_array();
        //$object = (object) $user; 
        $data=[];
        $urut=1;
        
      
    


       
     
        foreach($user as $u){
            
        $birthdate = new DateTime($u['tgl_msk']);
        $today     = new DateTime();
        $interval  = $today->diff($birthdate);
        $interval->format('%y');
            
            $usx=$u;
            
       

           $usx ['lama'] = $interval->format('%y');
          
            $usx['urut']=$urut;
            array_push($data, $usx);
            $urut++;
             
        }
      
        //print_r($data);
		$json=json_encode($data);
        header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET");
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		echo str_replace("\\/", "/", $json); 
	}
    public function detail($nik)
	{
	    
	   

	$user=$this->user_m->getwhere("user",array("nik"=>$nik))->result_array();
       // $data['id']=(int)$user[0]["id"];
        $data['nik']=$user[0]["nik"];
        $data['nama']=$user[0]["nama"];
        $data['alamat']=$user[0]["alamat"];
        $data['tgl_msk']=$user[0]["tgl_msk"];
        $data['tgl_lahir']=$user[0]["tgl_lahir"];
      
        
        $object = (object) $data;

		$json=json_encode($object);
        header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET");
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		echo str_replace("\\/", "/", $json); 
	}
    public function insert(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 1000');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
            // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
            }
        exit(0);
        }
        $data=json_decode($this->input->raw_input_stream,true);
        //print_r($data);
        $result=array(
            "error"=>"",
            "status"=>"saved"
        );
        $cekuser=$this->user_m->getwhere("user",array("nik"=>$data['nik']))->result_array();
        //print_r($cekuser);
        if(count($cekuser)>0){
            http_response_code(400);
            $result['error']="duplicated";
            $result['status']="error";
        }else{
            $insert=$this->user_m->InsertData("user",$data);
            if(!$insert){
                http_response_code(400);
                $result['error']="something wrong when add data";
                $result['status']="error";
            }
        }
        $json=json_encode($result);
        header("Content-type: application/json");
		/*header("Access-Control-Allow-Origin: http://localhost:3000");
		header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
		header("Access-Control-Allow-Methods: *");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");*/
		echo str_replace("\\/", "/", $json); 
    }
    public function update($nik){
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 1000');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
            }
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
            }
            exit(0);
        }
        $data=json_decode($this->input->raw_input_stream,true);
        //print_r($data);
        $result=array(
            "error"=>"",
            "status"=>"updated"
        );
        
        $cekuser=$this->user_m->getwhere("user",array("nama"=>$data['nama']),)->result_array();
     ;

        if(count($cekuser )>0){
            http_response_code(400);
            $result['error']="duplicated";
            $result['status']="error";
        }else{
            $update=$this->user_m->UpdateData("user",$data,array("nik"=>$nik));
            if(!$update){
                http_response_code(400);
                $result['error']="something wrong when update data";
                $result['status']="error";
            }
        }
        $json=json_encode($result);
        /*header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: *");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");*/
		echo str_replace("\\/", "/", $json); 
    }
    public function delete($nik){
        //print_r($data);
        $result=array(
            "status"=>"deleted"
        );
        $update=$this->user_m->DeleteData("user",array("nik"=>$nik));
        if(!$update){
            $result['status']="not deleted";
        }
        $json=json_encode($result);
        header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: *");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		echo str_replace("\\/", "/", $json); 
    }
}
