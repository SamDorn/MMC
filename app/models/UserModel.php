<?php

namespace App\models;

use App\core\Model;
use Exception;

class UserModel extends Model
{
    protected ?int $id;
    protected ?string $username;
    protected ?string $email;
    protected ?string $password;
    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    /**
     * Undocumented function
     *
     * @param ?string $username
     * @return void
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }
    /**
     * Undocumented function
     *
     * @param ?string $email
     * @return void
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
    /**
     * Undocumented function
     *
     * @param ?string $password
     * @return void
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Checks if the user is in the database
     * 
     * @return bool
     */
    public function checkUser(): bool
    {
        $query = "SELECT id, password FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            if ($this->password === $result["password"]) {
                return true;
            } else
                return false;
        } else
            return false;
    }
    public function getUserByEmail(): void
    {
        $query = "SELECT id, username FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION['id_utente'] = $result['id'];
        $_SESSION['username'] = $result['username'];
    }
    public function getById(): string
    {
        $query = "SELECT username FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['username'];
    }

}
