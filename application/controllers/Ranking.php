<?php

/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 04/06/17
 * Time: 21:49
 */
class Ranking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Exercises_model', 'exercises_model');
        $this->load->model('Users_model', 'users_model');

    }

    public function index() {

        $data['ranking'] = $this->exercises_model->ranking();

        $this->load->view('ranking', $data);

    }

}