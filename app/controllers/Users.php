<?php


    class Users extends Controller
    {
        public function __construct()
        {
          $this->userModel = $this->model('User');
        }

        public function register()
        {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                ];

                // Validate email
                if ( empty($data['email']) ) {
                    $data['email_err'] = 'Please inform your email';
                } else {
                    // Check email
                    if ( $this->userModel->getUserByEmail($data['email']) ) {
                        $data['email_err'] = 'Email is already in use. Choose another one!';
                    }
                }

                // Validate Name
                 if ( empty($data['name']) ) {
                    $data['name_err'] = 'Please inform your name';
                 }

                 // Validate Password
                 if ( empty($data['password']) ) {
                    $data['password_err'] = 'Please inform your password';
                 } elseif ( strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                 }

                 // Validate Confirm Password
                 if ( empty($data['confirm_password']) ) {
                     $data['confirm_password_err'] = 'Please inform your password';
                 } else if ( $data['password'] != $data['confirm_password'] ) {
                     $data['confirm_password_err'] = 'Password does not match!';
                 }

                 //Make sure errors are empty
                 if ( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                     // Hash Password
                     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                     //echo "<pre>";
                     //print_r($data);
                     // Register User
                     if ( $this->userModel->register($data) ) {
                         flash('register_success','You are now registered! You !');
                         redirect('users/login');
                     } else {
                         die ('Something wrong');
                     }
                 } else{
                     // Load view with errors
                     $this->view('users/register',$data);
                 }
            } else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }

       public function login()
       {
          //Check for POST
          if($_SERVER['REQUEST_METHOD']=='POST'){
             // Process form
             // Sanitize POST Data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             // Process form
             $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
             ];

             // Validate email
             if( empty($data['email']) ){
                $data['email_err'] = 'Please inform your email';
             }

             // Validate password
             if( empty($data['password']) ){
                $data['password_err'] = 'Please inform your password';
             }

             // Check for user/email
             if( $this->userModel->getUserByEmail($data['email']) ){
                // User found
             } else {
                // User not found
                $data['email_err'] = 'No user found!';
             }

             //Make sure are empty
             if( empty($data['email_err']) && empty($data['password_err']) ){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if( $loggedInUser){
                   // Create session
                   $this->createUserSession($loggedInUser);
                } else {
                   $data['email_err'] = 'Email or Password are incorrect';
                   $data['password_err'] = 'Email or Password are incorrect';
                   $this->view('users/login', $data);
                }
             } else{
                // Load view with errors
                $this->view('users/login',$data);
             }

          } else {
             // Init data
             $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
             ];

             // Load view
             $this->view('users/login', $data);
          }
       }

       public function createUserSession($user)
       {
          $_SESSION['user_id'] = $user->id;
          $_SESSION['user_email'] = $user->email;
          $_SESSION['user_name'] = $user->name;
          redirect('posts');
       }

       public function logout()
       {
          unset($_SESSION['user_id']);
          unset($_SESSION['user_mail']);
          unset($_SESSION['user_name']);
          session_destroy();
          redirect('users/login');
       }

       public function isLoggedIn(){
          if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
             return true;
          } else {
             return false;
          }
       }

    }