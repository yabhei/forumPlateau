<?php

namespace Controller;
use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;


class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {
       

    }

    public function registerUser(){
        
        // filter les données
        // array called data = associa.. array with the colomn name and the data 
        // creat obj from usemanager class (already done)
        // call the method add($data)

        if(isset($_POST['submit'])){

            $usermanager = new UserManager();
            
            
            
            

            $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirm_password = filter_input(INPUT_POST, 'confirmpassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // $chk = mysql_q("SELECT u.email FROM user u WHERE u.email = :email");
            // $num_rows = mysqli_num_rows($chk);
            
        // if($usermanager->findOneByEmail($email)){
        //     echo "<script>alert('User is already exist!!')</script>";
        // }  else{ 
            if($username&&$email&&$password){
                if($password == $confirm_password){

                    $data = [
                        'pseudo'=> $username,
                        'email'=>$email,
                        'password'=> password_hash($password, PASSWORD_DEFAULT)
                    ];
                    $usermanager->add($data);

                    return [
                        "view" => VIEW_DIR."security/login.php"
                    ];
                }
                else{
                       echo "<script>alert('Repeated Password dosen\'t match')</script>";
                
                }
            }
            
        
        // }
    }
        return [
            "view" => VIEW_DIR . "security/register.php"
        ];

    }

}



?>