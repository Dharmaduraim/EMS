<?php

namespace App\Controllers;
use App\Models\UserModel;


class Home extends BaseController
{

     public function __construct()
    {
             $session = session(); 

     $db=db_connect();
     $this->session  = \Config\Services::session();

    }



    public function index()
    {
           return redirect()->to(site_url('home/viewentry'));
    }

    public function dashboard()
    {
        return view('home');
    }


 public function register()
    {

     helper(['form']);   
     $session = session(); 
      $model = new UserModel();

    if($this->request->getMethod()=='post') 
    {
     $data=[ 'name'    => $this->request->getVar('name'),
                'email'    => $this->request->getVar('mail'),
                 'date'    => $this->request->getVar('date'),
                'age'    => $this->request->getVar('age'),
                 ];
                  $user = $model->userinsert($data);
                  echo "Data Entry Success";

           return redirect()->to(site_url('home/viewentry'));

    	}
        return view('entryform');
    }



      public function viewentry() //..userprofile view admin..
    {                                   
       // $userid =$this->uri->getSegment(3);   

        helper(['form']);
        $session=session();
        $model=new UserModel();       
         // $condition=array('id'=>$userid);
        $data['result']=$model->userlist();
        // print_r($data['result']);exit();
    return view('entrylist',$data);
    }

    function delete($id){
    $session=session();
    $user=new UserModel();  
            $user->delete($id); //print_r($data['result']);exit();
    $session->setFlashdata('msg','Delete success');
   // $user->delete($id); //print_r($data['result']);exit();
    
       return redirect()->to(site_url('home/viewentry'));

}


  public function userdelete($id= null)  //..userdata delete..//
    {        //echo "1";exit();                           
       $userid =$this->uri->getSegment(3);  //echo $userid;exit(); 
        helper(['form']);
         $session=session();
        $model=new UserModel();  
        $data['result']=$model->where('id',$userid)->delete(); //print_r($data['result']);exit();
     $session->setFlashdata('flash_message',$model->user_flash_message('success','Delete success'));

       return redirect()->to(site_url('home/viewentry'));

    } 

    function edit($id){
    $session=session();
            helper(['form']);

   $model=new UserModel(); 
    $data['result'] = $model->where('id', $id)->first();
    // print_r($data['result']);exit();
        return view('updatedata', $data);
}


 function userupdate($id){
    $model=new UserModel(); 
            helper(['form']);

    $session=session();

   
        $data= [
            'name'     => $this->request->getVar('name'),
            'email'    => $this->request->getVar('mail'),
            'date' => $this->request->getVar('date'),
            'age' => $this->request->getVar('age'),
        ];
        $db=db_connect();

         // print_r($data);exit();
       $user=$model->update($id,$data);
               $session->setFlashdata('msg','update success');
               echo "update success";
    
        return redirect()->to(site_url('home/viewentry'));
 
   
}

}
