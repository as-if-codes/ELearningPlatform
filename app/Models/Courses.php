<?php
namespace App\Models;

use CodeIgniter\Model;

class Courses extends Model
{
    protected $table = 'Courses';
    protected $primaryKey = 'course_id';

    protected $allowedFields = ['course_id', 'course_title', 'description', 'instructor_id', 'date_created'];
    protected $useAutoIncrement = true;
}
