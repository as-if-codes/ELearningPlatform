<?php
namespace App\Controllers;


use App\Models\Courses;
use App\Models\user_progress;
use App\Models\Modules;

class StudentC extends BaseController
{
  public function browsecourse()
  {
    $coursesModel = new Courses();

    $data['courses'] = $coursesModel->findAll();

    return view('Users/Student/sCourses', $data);

  }
  public function courseView()
  {


    $courseId = $this->request->getPost('course_id');
    $modulesModel = new Modules();
    $coursesModel = new Courses();

    $data['courses'] = $coursesModel
      ->select('courses.course_id, courses.course_title, courses.description, users.username AS instructor_name, courses.date_created')
      ->join('users', 'courses.instructor_id = users.user_id')
      ->where('courses.course_id', $courseId)
      ->get()
      ->getRowArray();

    $course = $data['courses'];

    $modules = $modulesModel->where('course_id', $courseId)->findAll();
    if(!$modules){
      $home = new Home();
      echo '<script>alert("Course not published yet");</script>';
     
       return $home->UHome();
     }
     
    return view('Users/Student/sModules', ['courseId' => $courseId, 'modules' => $modules, 'course' => $course]);
  }
  public function cEnroll()
  {
    $courseId = $this->request->getPost('course_id');
    $userId = session()->get('user')['user_id'];
 
     $progress = 0;
$db = \Config\Database::connect();

$data = [
    'user_id' => $userId,
    'course_id' => $courseId,
    'progress' => $progress,
];
 
if ($db->table('enrollment')->insert($data)) {
  $home = new Home();
  echo '<script>alert("Enrolled to course");</script>';
 
   return $home->UHome();}
}
  
  public function enrolledCourses(){
    $userId = session()->get('user')['user_id'];

    $db = \Config\Database::connect();

    $result = $db->query("SELECT DISTINCT courses.course_id, courses.course_title, courses.description, enrollment.progress
                            FROM enrollment
                            JOIN courses ON enrollment.course_id = courses.course_id
                            WHERE enrollment.user_id = $userId")->getResultArray();

 
    $data['enrolledCourses'] = $result;

    return view('Users/Student/enrolledCoursesView', $data);
}
public function openCourse(){
  $userId = session()->get('user')['user_id'];
   $courseId = $this->request->getPost('course_id');
 
   $modulesModel = new Modules();
  $modules = $modulesModel->where('course_id', $courseId)->findAll();
  return view('Users/Student/courseModule',['courseId' => $courseId,'modules' => $modules]);

}
public function updateModuleStatus()
{
    if ($this->request->getMethod() === 'post') {
        $selectedModuleId = $this->request->getPost('selected_module');
        $courseId = $this->request->getPost('course_id');

        $user_progress = new user_progress();
        $status = 'finished';
        $data = [
            'user_id' => session()->get('user')['user_id'],
            'course_id' => $courseId,
            'module_id' => $selectedModuleId,
            'module_status' => $status,
        ];
        $user_progress->insert($data);

$this->updateEnrollmentProgress($courseId, $data['user_id']);

        $modulesModel = new Modules();
        $modules = $modulesModel->where('course_id', $courseId)->findAll();
        return view('Users/Student/courseModule', ['courseId' => $courseId, 'modules' => $modules]);
    }
}

protected function updateEnrollmentProgress($courseId, $userId)
{
    $db = \Config\Database::connect();

     $query = "
        UPDATE enrollment e
        SET progress = (
            SELECT (COUNT(DISTINCT up.module_id) / (SELECT COUNT(DISTINCT module_id) FROM modules WHERE course_id = ?)) * 100
            FROM user_progress up
            WHERE up.user_id = ? AND up.course_id = ? AND up.moduleStatus = 'finished'
        )
        WHERE e.user_id = ? AND e.course_id = ?
    ";

    $db->query($query, [$courseId, $userId, $courseId, $userId, $courseId]);
}


}
