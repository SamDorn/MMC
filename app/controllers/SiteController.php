<?php

namespace App\controllers;

use App\core\Controller;
use App\models\EvaluationModel;
use App\models\UserModel;

class SiteController extends Controller
{
    /**
     * It returns the rendered view of the home_page.php file.
     * 
     * @return string 
     */
    public function home(): string
    {
        return $this->render('home_page');
    }
    /**
     * Returns a rendered login page with a GoogleController object passed as a
     * parameter needed to create the URL.
     * 
     * @return string A string that represents the rendered login page
     */
    public function login(): string
    {
        return $this->render('login_page');
    }
    public function add(): string
    {
        return $this->render('add_page');
    }
    public function addUtente(): string
    {
        return $this->render('add_user');
    }
    public function visualizza(): string
    {
        $evaluationModel = new EvaluationModel();
        $userModel = new UserModel();
        $params = [
            'evaluationModel' => $evaluationModel,
            'userModel' => $userModel
        ];
        return $this->render("visualizza_page", $params);
    }
    public function modifica(): string
    {
        $evaluationModel = new EvaluationModel();
        $evaluationModel->setId($_GET['id']);
        $params = [
            'info' => $evaluationModel->getById()
        ];
        return $this->render("modify_page", $params);
    }
}
