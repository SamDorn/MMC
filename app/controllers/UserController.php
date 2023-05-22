<?php

namespace App\controllers;

use App\core\Request;
use App\core\Controller;
use App\models\UserModel;


class UserController extends Controller
{
    private  $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /** 
     * This function calls the checkUser function of the UserModel
     * class with checks if the username and password match with a 
     * record in the database
     *
     * @return string
     */
    public function checkUser(Request $request): mixed
    {
        try {
            $this->userModel->loadData($request->getBody());
            if ($this->userModel->checkUser()) {
                
                $_SESSION['email'] = $this->userModel->getEmail();
                $this->userModel->getUserByEmail();
                return json_encode("ok");
            } else{
                return json_encode("wrong credential");
            }
                
        } catch (\Exception) {
            return json_encode("exception");;
        }
    }
    public function logout(): mixed
    {
        return json_encode(session_destroy());
    }
    public function adduser(Request $request): mixed
    {
        $this->userModel->loadData($request->getBody());
        return json_encode($this->userModel->addUser());
    }
}
