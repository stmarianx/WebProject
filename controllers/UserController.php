<?php
require_once '../controllers/controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $c_password = $_POST["c_password"];

            if ($password !== $c_password) {
                header("Location: signup.php?error=password_mismatch");
                exit;
            }
            else {
                $this->model->addUser($username, $email, $password);
            }
             
        }
        else 
        {
            $this->view->signup_form();
        }
    }
}

$signupController = new UserController();
$signupController->signup();
?>
