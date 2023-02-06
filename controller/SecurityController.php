<?php

namespace Controller;
use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;


class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {


    }

    public function registerUser()
    {

        // filter les données
        // array called data = associa.. array with the colomn name and the data 
        // creat obj from usemanager class (already done)
        // call the method add($data)

        if (isset($_POST['submit'])) {

            $usermanager = new UserManager();

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirm_password = filter_input(INPUT_POST, 'confirmpassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $checkUser = $usermanager->findOneByEmail($email);
            $checkname = $usermanager->findOneByName($username);

            if ($username && $email && $password) {
                if (!$checkUser && !$checkname) {
                    if ($password == $confirm_password) {

                        $data = [
                            'pseudo' => $username,
                            'email' => $email,
                            'password' => password_hash($password, PASSWORD_DEFAULT)
                        ];
                        $usermanager->add($data);

                        return [
                            "view" => VIEW_DIR . "security/login.php"
                        ];
                    } else {
                        echo "<script>alert('Repeated Password dosen\'t match')</script>";

                    }

                   
                } else {
                    echo "<script>alert('User already exist!!')</script>";
                   
                }
            }


        }
        return [
            "view" => VIEW_DIR . "security/register.php"
        ];
    }


    public function loginUser()
    {

        if (isset($_POST['submit'])) {

            $usermanager = new UserManager();
            $topicManager = new TopicManager();


            $email = filter_input(INPUT_POST, 'loginUsername', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            if ($email && $password) {

                $checkUser = $usermanager->findOneByEmail($email);
                if ($checkUser) {
                    if (password_verify($password, $checkUser->getpassword())) {

                        

                            Session::setUser($checkUser);
                            return [
                                "view" => VIEW_DIR."forum/listTopics.php",
                                "data" => [
                                    "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                                    
                                ]
                            ];

                        
                    }else{
                        echo "<script>alert('Email or Password is not correct !')</script>";
                        return [
                            "view" => VIEW_DIR . "security/login.php"
                        ];
                    }




                    //         return [
                    //             "view" => VIEW_DIR."home.php"
                    //         ];
                    //     }else{
                    //         echo "<script>alert('Email or Password isn't correct!')</script>";
                    //     }

                    // }else{
                    //     echo "<script>alert('Email or Password isn't correct!')</script>";
                    // }


                }



            }
           

        }else{
        return [
            "view" => VIEW_DIR . "security/login.php"
        ];
    }

    }

    public function logout(){
        unset($_SESSION['user']);
    return [
        "view" => VIEW_DIR."security/logout.php"
    ];
    }













}



?>