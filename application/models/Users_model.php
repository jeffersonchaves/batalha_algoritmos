<?php

/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 01/06/17
 * Time: 21:40
 */
class Users_model extends CI_Model {

    private $userid;

    public function __construct() {
        $this->userid = $this->session->userdata('user_id');
    }

    private function openFile(): array {
        return json_decode(file_get_contents(APPDATA_PATH.'users.json'), true);
    }

    public function getRows($username, $password){

        foreach ($this->openFile() as $user){

            if ($user['username'] == $username && $user['password'] == $password){
                return $user;
            }
        }

        return false;
    }

    public function get_user_by_id($user_id){

        foreach ($this->openFile() as $user){

            if ($user['id'] == $user_id){
                return $user;
            }
        }

        return false;
    }

    public function get_logged_user(){

        foreach ($this->openFile() as $user){

            if ($user['id'] == $this->userid){
                return $user;
            }
        }

        return false;
    }

    public function is_logged_in(){
        //Caso nao esteja logado é redirecionado para o login
        if($this->session->userdata('is_logged_in'))
            return true;

        return false;
    }
}