<?php

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class SuppliesController extends Rest_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('SuppliesModel');
    }

    // Handle an incoming GET ... return a supply item or all of them
    function index_get() {
        $key = $this->get('code');
        if (!$key) {
            $this->response($this->suppliesmodel->all(), 200);
        } else {
            $result = $this->suppliesmodel->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Supply item not found!'), 404);
        }
    }

    // Handle an incoming GET ... return 1 supply item
    function item_get() {
        $key = $this->get($id);
        $result = $this->suppliesmodel->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Supply item not found!'), 404);
    }

    // Handle an incoming POST - add a new menu item
    function index_post() {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->suppliesmodel->add($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming POST - add a new menu item
    function item_post() {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->suppliesmodel->add($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming PUT - update a menu item
    function index_put() {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->suppliesmodel->update($record);
        $this->response(array('ok'), 200);
    }

    function item_put() {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->suppliesmodel->update($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming DELETE - delete a menu item
    function index_delete() {
        $key = $this->get('id');
        $this->suppliesmodel->delete($key);
        $this->response(array('ok'), 200);
    }

    function item_delete() {
        $key = $this->delete('id');
        $fake = $this->suppliesmodel->delete($key);
        if ($fake === null)
            $this->response(array('ok'), 200);

        $this->response(array($fake), 500);
    }
}
