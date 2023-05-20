<?php

namespace App\models;

use App\core\Model;
use Exception;

class EvaluationModel extends Model
{
    protected int $id;
    protected int $id_utente;
    protected ?string $ragioneSociale;
    protected string $data;
    protected string $peso;
    protected string $altezza;
    protected string $distanzaVerticale;
    protected string $distanzaOrizzontale;
    protected string $dislocazioneAngolare;
    protected string $giudizio;
    protected string $frequenza;
    protected string $oraFrequenza;
    protected string $costo;
    protected string|bool $unaMano;
    protected string|bool $duePersone;
    protected float $pesoMassimo;
    protected float $indice;
    protected bool $valido;



    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setValido(bool $valido): void
    {
        $this->valido = $valido;
    }
    public function setRagioneSociale(?string $ragioneSociale): void
    {
        $this->ragioneSociale = $ragioneSociale;
    }
    public function setPesoMassimo(float $pesoMassimo): void
    {
        $this->pesoMassimo = $pesoMassimo;
    }
    public function setIndex(float $index): void
    {
        $this->indice = $index;
    }
    public function getAltezza()
    {
        return $this->altezza;
    }
    public function getDistanzaOrizzontale()
    {
        return $this->distanzaOrizzontale;
    }
    public function getDistanzaVerticale()
    {
        return $this->distanzaVerticale;
    }
    public function getDislocazioneAngolare()
    {
        return $this->dislocazioneAngolare;
    }
    public function getFrequenza()
    {
        return $this->frequenza;
    }
    public function getOraFrequenza()
    {
        return $this->oraFrequenza;
    }
    public function getGiudizio()
    {
        return $this->giudizio;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getPesoMassimo()
    {
        return $this->pesoMassimo;
    }


    public function add(): string
    {
        try {
            $this->unaMano = isset($this->unaMano) ? true : false;
            $this->duePersone = isset($this->unaMano) ? true : false;
            $query = "INSERT INTO evaluation (id, id_utente, ragione_sociale, data_emissione, peso, altezza_da_terra, distanza_verticale, distanza_orizzontale, dislocazione_angolare, giudizio, frequenza, ora_frequenza, costo, una_mano, due_persone, peso_massimo, indice, valido)
            VALUES (null, :id_utente, :ragione_sociale, :data_emissione, :peso, :altezza_da_terra, :distanza_verticale, :distanza_orizzontale, :dislocazione_angolare, :giudizio, :frequenza, :ora_frequenza, :costo, :una_mano, :due_persone, :peso_massimo, :indice, true)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_utente", $_SESSION['id_utente']);
            $stmt->bindValue(":ragione_sociale", $this->ragioneSociale);
            $stmt->bindValue(":data_emissione", $this->data);
            $stmt->bindValue(":peso", floatval($this->peso));
            $stmt->bindValue(":altezza_da_terra", floatval($this->altezza));
            $stmt->bindValue(":distanza_verticale", floatval($this->distanzaVerticale));
            $stmt->bindValue(":distanza_orizzontale", floatval($this->distanzaOrizzontale));
            $stmt->bindValue(":dislocazione_angolare", floatval($this->dislocazioneAngolare));
            $stmt->bindValue(":giudizio", $this->giudizio);
            $stmt->bindValue(":frequenza", $this->frequenza);
            $stmt->bindValue(":ora_frequenza", $this->oraFrequenza);
            $stmt->bindValue(":costo", floatval($this->costo));
            $stmt->bindValue(":una_mano", $this->unaMano);
            $stmt->bindValue(":due_persone", $this->duePersone);
            $stmt->bindValue(":peso_massimo", $this->pesoMassimo);
            $stmt->bindValue(":indice", $this->indice);
            $stmt->execute();
            return "ok";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getAll(): array
    {
        $query = "SELECT id, id_utente, ragione_sociale, data_emissione, valido FROM evaluation ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result === false ? [] : $result;
    }
    public function getByRagioneSociale(): array
    {
        $query = "SELECT id, id_utente, ragione_sociale, data_emissione, valido FROM evaluation where ragione_sociale = :ragione";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":ragione", $this->ragioneSociale);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result === false ? [] : $result;
    }
    public function getByAutore(): array
    {
        $query = "SELECT id, id_utente, ragione_sociale, data_emissione, valido FROM evaluation where id_utente = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result === false ? [] : $result;
    }
    public function deleteById(): string
    {
        try {
            $query = "DELETE from evaluation WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $this->id);
            $stmt->execute();
            return "ok";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getById(): array
    {
        $query = "SELECT * FROM evaluation where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result === false ? [] : $result;
    }
    public function modify(): string
    {
        try {
            $this->unaMano = isset($this->unaMano) ? true : false;
            $this->duePersone = isset($this->unaMano) ? true : false;
            $query = "INSERT INTO evaluation (id, id_utente, ragione_sociale, data_emissione, peso, altezza_da_terra, distanza_verticale, distanza_orizzontale, dislocazione_angolare, giudizio, frequenza, ora_frequenza, costo, una_mano, due_persone, peso_massimo, indice, valido)
            VALUES (null, :id_utente, :ragione_sociale, :data_emissione, :peso, :altezza_da_terra, :distanza_verticale, :distanza_orizzontale, :dislocazione_angolare, :giudizio, :frequenza, :ora_frequenza, :costo, :una_mano, :due_persone, :peso_massimo, :indice, true)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id_utente", $_SESSION['id_utente']);
            $stmt->bindValue(":ragione_sociale", $this->ragioneSociale);
            $stmt->bindValue(":data_emissione", $this->data);
            $stmt->bindValue(":peso", floatval($this->peso));
            $stmt->bindValue(":altezza_da_terra", floatval($this->altezza));
            $stmt->bindValue(":distanza_verticale", floatval($this->distanzaVerticale));
            $stmt->bindValue(":distanza_orizzontale", floatval($this->distanzaOrizzontale));
            $stmt->bindValue(":dislocazione_angolare", floatval($this->dislocazioneAngolare));
            $stmt->bindValue(":giudizio", $this->giudizio);
            $stmt->bindValue(":frequenza", $this->frequenza);
            $stmt->bindValue(":ora_frequenza", $this->oraFrequenza);
            $stmt->bindValue(":costo", floatval($this->costo));
            $stmt->bindValue(":una_mano", $this->unaMano);
            $stmt->bindValue(":due_persone", $this->duePersone);
            $stmt->bindValue(":peso_massimo", $this->pesoMassimo);
            $stmt->bindValue(":indice", $this->indice);
            $stmt->execute();
            $query = "UPDATE evaluation SET valido = false WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $this->id);
            $stmt->execute();
            return "ok";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
