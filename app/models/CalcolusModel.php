<?php

namespace App\models;

use App\core\Model;

class CalcolusModel extends Model
{
    public function getPeso(EvaluationModel $evaluationModel): float
    {
        $peso = 20;
        $query = "SELECT fattore FROM altezza WHERE altezza = :altezza";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":altezza", $evaluationModel->getAltezza());
        $stmt->execute();
        $result = $stmt->fetch();
        $peso = $peso * $result['fattore'];

        $query = "SELECT fattore FROM distanza_verticale WHERE dislocazione = :altezza";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":altezza", $evaluationModel->getDistanzaVerticale());
        $stmt->execute();
        $result = $stmt->fetch();
        $peso = $peso * $result['fattore'];

        $query = "SELECT fattore FROM distanza_orizzontale WHERE distanza = :altezza";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":altezza", $evaluationModel->getDistanzaOrizzontale());
        $stmt->execute();
        $result = $stmt->fetch();
        $peso = $peso * $result['fattore'];

        $query = "SELECT fattore FROM dislocazione WHERE dislocazione = :altezza";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":altezza", $evaluationModel->getDislocazioneAngolare());
        $stmt->execute();
        $result = $stmt->fetch();
        $peso = $peso * $result['fattore'];

        $peso = $evaluationModel->getGiudizio() === "buono" ? $peso * 1 : $peso * 0.9;

        // $query = "SELECT fattore FROM frequenza WHERE frequenza = :frequenza AND durata = :durata";
        // $stmt = $this->conn->prepare($query);
        // $stmt->bindValue(":frequenza", $evaluationModel->getFrequenza());
        // $stmt->bindValue(":durata", $evaluationModel->getOraFrequenza());
        // $stmt->execute();
        // $result = $stmt->fetch();
        // $peso = $peso * $result['fattore'];
        return $peso;
    }
}