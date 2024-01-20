<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'Users';  
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_id','username', 'email', 'password', 'user_role', 'age', 'phone', 'city'];
    protected $useAutoIncrement = true;


  

 }
