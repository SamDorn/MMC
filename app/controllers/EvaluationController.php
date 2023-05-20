<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\models\CalcolusModel;
use App\models\EvaluationModel;

class EvaluationController extends Controller
{
    private EvaluationModel $evaluationModel;
    private CalcolusModel $calculusModel;
    public function __construct()
    {
        $this->evaluationModel = new EvaluationModel();
        $this->calculusModel = new CalcolusModel();
    }
    public function addEvaluation(Request $request): mixed
    {
        $this->evaluationModel->loadData($request->getBody());
        $this->evaluationModel->setPesoMassimo($this->calculusModel->getPeso($this->evaluationModel));
        $this->evaluationModel->setIndex($this->setIndice());
        //return json_encode($this->evaluationModel->getOraFrequenza());
        return json_encode($this->evaluationModel->add());
    }
    public function deleteEvaluation(Request $request) : mixed
    {
        $this->evaluationModel->loadData($request->getBody());
        return json_encode($this->evaluationModel->deleteById());
    }
    private function setIndice(): float
    {
        try{
            return $this->evaluationModel->getPeso()/$this->evaluationModel->getPesoMassimo();

        } catch(\DivisionByZeroError $e){
            return 100;
        }
    }
    public function modifyEvaluation(Request $request) : mixed
    {
        $this->evaluationModel->loadData($request->getBody());
        $this->evaluationModel->setPesoMassimo($this->calculusModel->getPeso($this->evaluationModel));
        $this->evaluationModel->setIndex($this->setIndice());
        return json_encode($this->evaluationModel->modify());
    }

}