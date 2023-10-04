<?php

namespace root\src\models;

include __DIR__.'./../database/database.php';

use root\src\database\Database;

use function root\src\helpers\arrayToString;

class Tab {

    private $id;
    private $header;
    private $content;
    private $parent_id;
    private $user_id;

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }

    public function getHeader(){
        return $this->header;
    }

    public function getContent(){
        return $this->content;
    }

    public function getParentId(){
        return $this->parent_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getDB() {
        return $this->db;
    }

    //SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setHeader($header){
        $this->header = $header;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setParentId($parent_id){
        $this->parent_id = $parent_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    //TO ARRAY
    public function toArray() {
        return get_object_vars($this);
    }

    //REPO METHODS
    public function showTabs() {
        $dataSet = array();

        $sql = "SELECT * from tabs WHERE user_id = {$this -> user_id}";
        $result = $this->db->query($sql);

        while($current = $result->fetch_assoc()) array_push($dataSet, $current);
        
        return $dataSet;
    }

    public function storeTab(){
        $sql = "INSERT INTO tabs (header, content, parent_id, user_id) VALUES('{$this->header}', '{$this->content}', '{$this->parent_id}', '{$this->user_id}')";
        $result = $this->db->query($sql);

        return $result;
    }

    public function updateTab(){
        $sql = "UPDATE tabs SET header = '{$this->header}', content = '{$this->content}' WHERE id = {$this->id} AND user_id = {$this->user_id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function deleteTab(){
        $tabs = array();
        $stack = array();
        $dataSet = array();

        $sql = "SELECT * from tabs WHERE user_id = '{$this -> user_id}'";
        $retrieved = $this->db->query($sql);

        while($current = $retrieved->fetch_assoc()) array_push($tabs, $current);

        if(count($tabs) === 0) throw new \Exception('Wrong id', 400);

        foreach($tabs as $tab){
            if($tab['id'] === $this->id){
                array_push($stack, $tab);
                array_push($dataSet, $tab['id']);
            }
        }

        while(count($stack) > 0){
            $current = array_pop($stack);

            foreach($tabs as $tab){
                if($tab['parent_id'] === $current['id']){
                    array_push($stack, $tab);
                    array_push($dataSet, $tab['id']);
                }
            }
        }

        $id_string = arrayToString(',', $dataSet);

        $sql_2 = "DELETE FROM tabs WHERE id IN ($id_string)";

        $result = $this->db->query($sql_2);

        return $result;
    }

}