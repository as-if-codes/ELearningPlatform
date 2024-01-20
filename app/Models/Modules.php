<?php
namespace App\Models;

use CodeIgniter\Model;

class Modules extends Model
{
    protected $table = 'Modules';
   
    protected $primaryKey = 'module_id';  

    protected $allowedFields = ['course_id', 'title', 'content', 'module_order'];  
   protected $useAutoIncrement = true;
}
