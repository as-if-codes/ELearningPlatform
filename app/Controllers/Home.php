<?php

namespace App\Controllers;
use App\Models\Courses;
use App\Models\Modules;

use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $coursesModel = new Courses();

        $data['courses'] = $coursesModel->findAll();
    
        return view('welcome_message',$data);
    }
    public function Register()
    {
        return view('Register');
    }


  
     public function iupdate()
    {
        $userid = $this->request->getPost('user_id');
        $data['user'] = session()->get('user');
  
        $user =$data['user'];
        
        if ($user['user_role'] == 'instructor') {
            return view('Users/Instructor/iupdate.php', $data);
        } elseif ($user['user_role'] == 'admin') {
            return view('Users/Admin/aDashboard.php', $data);
        } else {
            return view('Users/Student/supdate.php', $data);
        }
    }
     
    public function update()
    {
         if ($this->request->getMethod() === 'post') {
             $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $phone = $this->request->getPost('phone');
            $age = $this->request->getPost('age');
            $city = $this->request->getPost('city');

               $userModel = new Users();

             $data = [
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'age' => $age,
                'city' => $city,
            ];

             $userId = session()->get('user')['user_id'];

            $userModel->update($userId, $data);
            echo '<script>alert("Profile updated successfully");</script>';
        
             return $this->UHome();
        }
   }

    
    public function UHome()
    {
        $data['user'] = session()->get('user');
  
        $user =$data['user'];
        
        if ($user['user_role'] == 'instructor') {
            return view('Users/Instructor/iDashboard.php', $data);
        } else {
            return view('Users/Student/sDashboard.php', $data);
        }


    }

    public function updatePassword()
{
    if ($this->request->getMethod() == 'post') {
        $userModel = new Users();

        $userId = session()->get('user')['user_id'];
        $user = $userModel->find($userId);
        $currentPassword = $this->request->getPost('currentPassword');
        $newPassword = $this->request->getPost('newPassword');
        $confirmPassword = $this->request->getPost('confirmPassword');

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            echo '<script>alert("All fields are required.");</script>';
            return;
        }

        if ($user['password'] !== $currentPassword) {
            echo '<script>alert("Invalid current password.");</script>';
            return $this->usersettings();
        }

        if ($newPassword !== $confirmPassword) {
            echo '<script>alert("New password and confirmation do not match.");</script>';
            return $this->usersettings();
        }

        $userModel->update($userId, ['password' => $newPassword]);

        echo '<script>alert("Password updated successfully.");</script>';
        return $this->usersettings();
    } else {
        echo '<script>alert("Invalid request.");</script>';
        return $this->usersettings();
    }
}

    public function usersettings(){
        $data['user'] = session()->get('user');
  
        $user =$data['user'];
        
        if ($user['user_role'] == 'instructor') {
            return view('Users/Instructor/Changepsw.php', $data);
        } elseif ($user['user_role'] == 'admin') {
        return view('Users/Admin/Changepsw.php', $data);
        } else {
            return view('Users/Student/Changepsw.php',$data);
        }

        
    }
     
    public function logout()
    {
        $session = \Config\Services::session();
        
        session_destroy();
        echo '<script>alert("Logout Successful!");</script>';
        $coursesModel = new Courses();

        $data['courses'] = $coursesModel->findAll();
    
        return view('welcome_message',$data);

    }
    
    public function addCourse()
    {
        if ($this->request->getMethod() === 'post') {
            $coursesModel = new Courses();
    
            $data['user'] = session()->get('user');
            
            $instructorId = $data['user']['user_id'];
            $courseData = [
                'course_title' => $this->request->getPost('course_title'),
                'description' => $this->request->getPost('description'),
                'instructor_id' => $instructorId, 
                'date_created' => date('Y-m-d H:i:s')  
            ];
    
            if ($coursesModel->insert($courseData)) {
                echo '<script>alert("Course added successfully!");</script>';
            } else {
                echo '<script>alert("Something went wrong!!");</script>';
                return view('LoginPage');
            }
        }
    
        return $this->UHome();
        
    }
    
    public function Login()
    {
        return view('LoginPage');
    } 
    
    public function uLogin(){
    if ($this->request->getMethod() == 'post') {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $userModel = new Users();  
        $user = $userModel->where('email', $email)->first();
        
        if ($user && $user['password'] === $password) {

            session()->set('user', $user);
            $data['user'] = session()->get('user');

            if ($user['user_role'] == 'instructor') {
                return view('Users/Instructor/iDashboard.php', $data);
            } elseif ($user['user_role'] == 'admin') {
                return view('Users/Admin/aDashboard.php', $data);
            } else {
                return view('Users/Student/sDashboard.php', $data);
            }
        } else {
            echo '<script>alert("Invalid Credentials!!");</script>';
            return view('LoginPage');
        }
    }
 }
    
    public function uRegister() {
        $data = [
            'meta_title' => 'New Data',
            'title' => 'New Record',
        ];
        if ($this->request->getMethod() == 'post') {

            $model = new Users();

            if ($model->save($_POST)) {
                echo '<script>alert("User registered successfully.");</script>';
            } else {
                echo '<script>alert("Failed to register.");</script>';
                return view('Register');
            }

        }
        return view('LoginPage');
    

    }

    public function courseViewLogout()
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
      
        echo '<script>alert("Please login to enroll !");</script>';
        return view('LoginPage');
       }
       
      return view('ModulesView', ['courseId' => $courseId, 'modules' => $modules, 'course' => $course]);
    }

    public function loginplz(){
        $home = new Home();

        echo '<script>alert("Please login to enroll !");</script>';
        return view('LoginPage');


    }
}