<?php
namespace App\Controllers;

use App\Models\Enrollment;
use App\Models\Courses;
use App\Models\user_progress;
use App\Models\Users;
use App\Models\Modules;
class InstructorC extends BaseController
{
  public function Insights()
  {
      $instructorId = session()->get('user')['user_id']; 
      
      
      $coursesModel = new Courses();
      $enrollmentModel = new Enrollment();
      $userProgressModel = new user_progress();
  
      if ($instructorId) {
           $data['insights'] = $enrollmentModel->query("
              SELECT
                  MAX(e.enrollment_id) AS enrollment_id,
                  u.user_id,
                  u.username,
                  u.email,
                  u.user_role,
                  u.age,
                  u.phone,
                  u.city,
                  c.course_id,
                  c.course_title,
                  c.description,
                  MAX(e.enrollment_date) AS enrollment_date,
                  MAX(e.progress) AS progress
              FROM
                  enrollment e
              JOIN
                  users u ON e.user_id = u.user_id
              JOIN
                  courses c ON e.course_id = c.course_id
              WHERE
                  c.instructor_id = $instructorId
              GROUP BY
                  u.user_id, c.course_id
          ")->getResultArray(); 
  
          return view('Users/Instructor/insights', ['courseInsights' => $data]);
      } else {
          echo '<script>alert("You do not have any courses added!");</script>';
          $Home = new Home()
          ;
          return $Home->UHome();
      }
  }
  

    public function viewCourses()
    {
        
      $data['user'] = session()->get('user');
      $userid = $data['user']['user_id'];
      $usertype = $data['user']['user_role'];

      $coursesModel = new Courses(); 
           
    
      $data['courses'] = $coursesModel->where('instructor_id', $userid)->findAll();
      if ($data['courses'] && $usertype=="instructor") {
     return view('Users/Instructor/iCourses', $data); 
      }
      else{
        echo '<script>alert("You do not have any courses added!");</script>';
        $Home = new Home();
        return $Home->UHome();
      }
         }
    
         public function addModule()
         { 
              $courseId = $this->request->getPost('course_id');
              $modulesModel = new Modules();

     $modules = $modulesModel->where('course_id', $courseId)->findAll();

     return view('Users/Instructor/iModules', ['courseId' => $courseId, 'modules' => $modules]);
}
             
          public function addModules()
         {
          $courseId = $this->request->getPost('course_id');
          $module_order = $this->request->getPost('module_order');
          $title = $this->request->getPost('title');
          $video_file = $this->request->getFile('video_file');
          $newName = $video_file->getName();
 
       
         $moduleData = [
          'course_id' => $courseId,
          'title' => $title,
          'content' => $newName,  
          'module_order' => $module_order,
      ];
  
       $modulesModel = new Modules();
  
       $modulesModel->insert($moduleData);
  if ($modulesModel) {
    $path = "moduleContent/{$courseId}";
    $video_file->move($path, $newName);
    echo '<script>alert("Module added  Successfully!");</script>';

 
    $modules = $modulesModel->where('course_id', $courseId)->findAll();

    return view('Users/Instructor/iModules', ['courseId' => $courseId, 'modules' => $modules]);

  }
  else{
    echo '<script>alert("Module not added");</script>';
    $Home = new Home();      

    return $Home->UHome();
 
  }

          }  
           
}