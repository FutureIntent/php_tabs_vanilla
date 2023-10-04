<?php

namespace root\src\models;

include __DIR__.'./../database/database.php';

use root\src\database\Database;

class User {

    private $id;
    private $name;
    private $email;
    private $password;
    private $role;

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getName(){
        return $this->name;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole(){
        return $this->role;
    }

    public function getDB() {
        return $this->db;
    }

    //SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setRole($role){
        $this->role = $role;
    }

    //TO ARRAY
    public function toArray() {
        return get_object_vars($this);
    }

    //REPO METHODS
    public function showUsers() {
        $dataSet = array();

        $sql = "SELECT * from user";
        $result = $this->db->query($sql);

        while($current = $result->fetch_assoc()) array_push($dataSet, $current);
        
        return $dataSet;
    }

    public function getByEmailAndPassword() {
        $sql = "SELECT * from user WHERE email = '{$this -> email}' AND password = '{$this -> password}'";
        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    public function storeUser() {
        $email = strtolower($this->email);
        $name = $this->name;
        $password = $this->password;
        $role = 'user';

        $sql = "INSERT INTO user (email, name, password, role) VALUES ('$email', '$name', '$password', '$role')";
        $result = $this->db->query($sql);

        return $result;
    }

}