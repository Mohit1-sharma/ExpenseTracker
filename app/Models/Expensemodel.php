<?php namespace App\Models;
use CodeIgniter\Model;

class Expensemodel extends Model 
{
    protected $table = 'expense';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'expense_date	', 'expense_Item', 'expense_cost','entered_date','uid'];
           


   



    public function insertUser($data)
    {
      $db = \Config\Database::connect();
      $builder = $db->table($this->table);
      return $builder->insert($data);


    }



}