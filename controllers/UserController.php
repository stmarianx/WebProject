<?php
require_once '../controllers/controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        switch ($action) {
            case 'signup':
                $this->signup();
                break;
            case 'login':
                $this->log_in();
                break;
            default:
                break;
        }
    }


    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $c_password = $_POST["c_password"];

            if ($password !== $c_password) {
               // header("Location: signup.php?error=password_mismatch");
                exit;
            }
            else {
                $this->model->addUser($username, $email, $password);
                $this->view->main_page();
            }
             
        }
        else 
        {
            $this->view->signup_form();
        }
    }

    public function log_in()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($username!= null && $password != null)
               if($this->model->checkUser($username,$password)==true)
               {
                   $_SESSION['username']=$username;
                   $this->view->succes();
               }
               else 
               {
                    $this->view->fail("Wrong Password or User");
               }
            else {
                $this->view->fail("Empty fields are not allowed");
            }
        }
    }
}

$signupController = new UserController();
$signupController->handleRequest();
?>
