<?php
 namespace App\Models;
 
 use CodeIgniter\Model;

  
 class UserModel extends Model
 {


    protected $table      = 'user';
    protected $primaryKey = 'id';

    /*protected $returnType     = 'array';*/
    /*protected $useSoftDeletes = true;-*/

    protected $allowedFields = ['name', 'age', 'email', 'date','age'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function userinsert($data)
    {
        $builder = $this->db->table('user');
        $builder->insert($data);
        
    } 


    function updateuser($updateData=array(),$condition=array())
    {
        $builder = $this->db->table('user');
        if(is_array($condition) && count($condition)>0)
            $builder->where($condition);
        $builder->set($updateData);
        return $builder->update();

    } 



    public function userlist() {
        return $this->db
                        ->table('user')
                        ->get()
                        ->getResult();
    }

 
 //    function update($id, $data) {
	// 	return $this->db
 //                        ->table('user')
 //                        ->where(["id" => $id])
 //                        ->set($data)
 //                        ->update();	
	// }
}