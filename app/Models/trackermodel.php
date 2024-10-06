<?php namespace App\Models;
use CodeIgniter\Model;

class trackermodel extends Model 
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'fullname', 'email', 'moblie_no','password','reg_date'];
           



    public function insertUser($data)
    {
      $db = \Config\Database::connect();
      $builder = $db->table($this->table);
      return $builder->insert($data);

      // $db = \Config\Database::connect();
      // $builder = $db->table($this->table);

      // // Debugging: Print data and SQL query
      // echo '<pre>'; print_r($data); echo '</pre>';
      
      // $sql = $builder->getCompiledInsert($data);
      // echo $sql; // Uncomment to see the query and debug if needed

      // return $builder->insert($data);
       


    }

    // public function verifyUser($email, $password)
    // {
    //     $builder = $this->db->table($this->table);
    //     $user = $builder->where('email', $email)->get()->getRowArray();

    //     // Check if user exists and the password matches
    //     if ($user && password_verify($password, $user['password'])) {
    //         return $user;
    //     }
    //     return false;
    // }

}
