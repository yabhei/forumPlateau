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
        $usermanager = new UserManager();

        return [
            "view" => VIEW_DIR."security/login.php",
            "data" => [
                "infos" => $usermanager->add()
            ]
        ];
    


    }

}



?>