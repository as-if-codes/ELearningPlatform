<?php

namespace App\Models;

use CodeIgniter\Model;

class user_progress extends Model
{
    protected $table = 'user_progress';

    protected $primaryKey = ['user_id', 'course_id', 'module_id'];

    protected $allowedFields = ['user_id', 'course_id', 'module_id', 'moduleStatus'];

    public function calculateOverallProgress($userId, $courseId)
    {
        $finishedModules = $this->where([
            'user_id' => $userId,
            'course_id' => $courseId,
            'module_status' => 'finished',
        ])->countAllResults();
    
        $totalModules = $this->distinct('module_id')
            ->where(['user_id' => $userId, 'course_id' => $courseId])
            ->countAllResults();
    
        // Debug statements
        log_message('debug', 'Finished modules: ' . $finishedModules);
        log_message('debug', 'Total modules: ' . $totalModules);
    
        return ($totalModules > 0) ? ($finishedModules / $totalModules) * 100 : 0;
    }
    
 }
