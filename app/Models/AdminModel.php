<?php
 namespace App\Models;
 
 use CodeIgniter\Model;
  
 class AdminModel extends Model
 {
     protected $table = 'user';
     protected $allowedFields = ['name','email','date','age'];
     protected $updatedField  = 'updated_at';
 
    function userinsert($data)
    {
        $builder = $this->db->table('user');
        $builder->insert($data);
        
    }


}