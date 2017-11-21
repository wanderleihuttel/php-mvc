<?php


    class Pages extends Controller
    {

       public function index()
       {
          if( isLoggedIn() ) {
             redirect('posts');
          }
          $data = [
              'title' => 'PHP MVC Framework',
              'description' => 'Simple social network built using PHP/MVC.'
          ];
          $this->view('pages/index', $data);
       }

       public function about()
       {
          $data = [
              'title' => 'About Us',
              'description' => 'App to share posts with other users'
          ];
          $this->view('pages/about',$data);
       }
    }