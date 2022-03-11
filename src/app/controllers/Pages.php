<?php
//namespace App;

session_start();
use App\Controller;
use App\Database;

class Pages extends Controller
{
    public function __construct()
    {
    }
    public function signup()
    {
        $this->view('/signup', $data=[], $arr=[]);
    }
    public function user()
    {
        if (isset($_POST['againlogin'])) {
            $this->view('/signin', $data=[], $arr=[]);
        } else {
            $arr=[];
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            array_push($arr, array('name' => $name, 'email' => $email,
            'password' => $password, 'password2' => $password2));
            $this->model('User', $arr);
        }
    }
    public function signin()
    {
        $this->view('/signin', $data=[], $arr=[]);
    }
    public function signout()
    {
        $this->view('/signout', $data=[], $arr=[]);
    }
    public function check()
    {
        if (isset($_POST['againsignup'])) {
            $this->view('/signup', $data=[], $arr=[]);
        } else {
            $arr=[];
            $email = $_POST['email'];
            $password = $_POST['password'];
            array_push($arr, array('email' => $email, 'password' => $password));
            $this->model('CheckUser', $arr);
        }
    }
    public function dashboard()
    {
        $obj = new Database;
        $obj->query("SELECT * FROM users ORDER BY user_id DESC LIMIT 5");
        $data = $obj->resultSet();
        $obj->query("SELECT * FROM blogs ORDER BY user_id DESC LIMIT 5");
        $arr = $obj->resultSet();
        $this->view('/dashboard', $data, $arr);
    }
    public function writeBlog()
    {
        $this->view('/writeBlog', $data=[], $arr=[]);
    }
    public function addBlog()
    {
        $arr = [];
        $title = $_POST['title'];
        $content = $_POST['content'];
        array_push($arr, array('title' => $title, 'content' => $content));
        $this->model('/published', $arr);
    }
    public function blogs()
    {
        $obj = new Database;
        $obj->query("SELECT * FROM blogs ");
        $data = $obj->resultSet();
        $this->view('/blogs', $data, $arr=[]);
    }
    public function actionBlog()
    {
        if (isset($_POST['edit'])) {
            $blogId = $_POST['edit'];
            $obj = new Database;
            $obj->query("SELECT * FROM blogs WHERE blog_id = $blogId ");
            $data = $obj->resultSet();
            $this->view('/writeBlog', $data, $arr=[]);
        }
        if (isset($_POST['update'])) {
            $blogId = $_POST['update'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $obj = new Database;
            $obj->query("UPDATE blogs SET title = '$title', content = '$content' WHERE blog_id = $blogId");
            $obj->execute();
            if ($_SESSION['role'] == 'Admin') {
                $obj->query("SELECT * FROM blogs ");
                $data = $obj->resultSet();
                $this->view('/blogs', $data, $arr=[]);
            } else {
                $userName = $_SESSION['name'];
                $obj->query("SELECT * FROM blogs WHERE user_name = '$userName'");
                $data = $obj->resultSet();
                $this->view('/userBlogs', $data, $arr=[]);
            }
        }
        if (isset($_POST['status'])) {
            $blogId = $_POST['status'];
            $obj = new Database;
            $obj->query("SELECT status FROM blogs WHERE blog_id = $blogId ");
            $data = $obj->resultSet();
            print_r($data[0]['status']);
            if ($data[0]['status']=='Approved') {
                $obj->query("UPDATE blogs SET status = 'Disapproved' WHERE blog_id = $blogId");
                $obj->execute();
                $obj->query("SELECT * FROM blogs ");
                $data = $obj->resultSet();
                $this->view('/blogs', $data, $arr=[]);
            } else {
                $obj->query("UPDATE blogs SET status = 'Approved' WHERE blog_id = $blogId");
                $obj->execute();
                $obj->query("SELECT * FROM blogs ");
                $data = $obj->resultSet();
                $this->view('/blogs', $data, $arr=[]);
            }
        }
        if (isset($_POST['delete'])) {
            if ($_SESSION['role'] == 'Admin') {
                $blogId = $_POST['delete'];
                $obj = new Database;
                $obj->query("DELETE FROM blogs WHERE blog_id = $blogId");
                $obj->execute();
                $obj->query("SELECT * FROM blogs ");
                $data = $obj->resultSet();
                $this->view('/blogs', $data, $arr=[]);
            } else {
                $blogId = $_POST['delete'];
                $obj = new Database;
                $obj->query("DELETE FROM blogs WHERE blog_id = $blogId");
                $obj->execute();
                $obj->query("SELECT * FROM blogs ");
                $data = $obj->resultSet();
                $this->view('/userBlogs', $data, $arr=[]);
            }
        }
    }
    public function users()
    {
        $obj = new Database;
        $obj->query("SELECT * FROM users");
        $data = $obj->resultSet();
        $this->view('/users', $data, $arr=[]);
    }
    public function actionUser()
    {
        if (isset($_POST['role'])) {
            $userId = $_POST['role'];
            $obj = new Database;
            $obj->query("SELECT role FROM users WHERE user_id = $userId ");
            $data = $obj->resultSet();
            if ($data[0]['role']=='Admin') {
                $obj->query("UPDATE users SET role = 'Bloger' WHERE user_id = $userId");
                $obj->execute();
                $obj->query("SELECT * FROM users ");
                $data = $obj->resultSet();
                $this->view('/users', $data, $arr=[]);
            } else {
                $obj->query("UPDATE users SET role = 'Admin' WHERE user_id = $userId");
                $obj->execute();
                $obj->query("SELECT * FROM users ");
                $data = $obj->resultSet();
                $this->view('/users', $data, $arr=[]);
            }
        }
        if (isset($_POST['status'])) {
            $userId = $_POST['status'];
            $obj = new Database;
            $obj->query("SELECT status FROM users WHERE user_id = $userId ");
            $data = $obj->resultSet();
            if ($data[0]['status']=='Approved') {
                $obj->query("UPDATE users SET status = 'Disapproved' WHERE user_id = $userId");
                $obj->execute();
                $obj->query("SELECT * FROM users ");
                $data = $obj->resultSet();
                $this->view('/users', $data, $arr=[]);
            } else {
                $obj->query("UPDATE users SET status = 'Approved' WHERE user_id = $userId");
                $obj->execute();
                $obj->query("SELECT * FROM users ");
                $data = $obj->resultSet();
                $this->view('/users', $data, $arr=[]);
            }
        }
        if (isset($_POST['delete'])) {
            $userId = $_POST['delete'];
            $obj = new Database;
            $obj->query("DELETE FROM users WHERE user_id = $userId");
            $obj->execute();
            $obj->query("SELECT * FROM users ");
            $data = $obj->resultSet();
            $this->view('/users', $data, $arr=[]);
        }
    }
    public function home()
    {
        $obj = new Database;
        $obj->query("SELECT * FROM blogs WHERE status = 'Approved'");
        $data = $obj->resultSet();
        $this->view('/home', $data, $arr=[]);
    }
    public function actionHome()
    {
        $blogId = $_POST['more'];
        $obj = new Database;
        $obj->query("SELECT * FROM blogs WHERE blog_id = $blogId");
        $data = $obj->resultSet();
        $this->view('/fullBlog', $data, $arr=[]);
    }
    public function userBlogs()
    {
        $userId = $_SESSION['user_id'];
        $obj = new Database;
        $obj->query("SELECT * FROM blogs WHERE user_id = $userId");
        $data = $obj->resultSet();
        /* print_r($data); */
        $this->view('/userBlogs', $data, $arr=[]);
    }
    public function errors()
    {
        
        $this->view('/errors', $data=[], $arr=[]);
    }
}
