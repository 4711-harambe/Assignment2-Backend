<?php
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class maintenance extends Rest_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('supplies');
    }
    
    //Return all or one supply item.
    function index_get() {
        $key = $this->get('id');
        $this->crud_get($key);
    }
    
    //Returns one supply item using /maintenance/item/id/{id}
    function item_get($key = null) {
        if (($key == null) || ($key == 'id'))
            $key = $this->get('id');
        $this->crud_get($key);
    }
    
    private function crud_get($key = null) {
        if (!$key) {
            $this->response($this->supplies->all(), 200);
            return;
        }

        $result = $this->supplies->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Read: Supply item ' . $key . ' not found!'), 404);
    }
    
    //POST with a payload. If the item id is in the payload POST to /maintenance.
    function index_post() {
        $this->crud_post($this->post());
    }
    
    //POST with item id as part of URI: /maintenance/item/id/{id}
    function item_post($key = null) {
        $record = json_decode($this->post(), true);

        if (($key == null) || ($key == 'id')) {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $record);
        }

        $this->crud_post($record);
    }

    private function crud_post($record = null) {
        $key = $record['id'];

        if (!isset($key)) {
            $this->response(array('error' => 'Create: No supply specified'), 406);
            return;
        }

        if ($this->supplies->exists($key)) {
            $this->response(array('error' => 'Create: Supply ' . $key . ' already exists'), 406);
            return;
        }

        $this->supplies->add($record);

        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }
    
    // PUT to "/maintenance" with the id passed in the payload, or a PUT to "/maintenance?id=123"
    function index_put() {
        $this->crud_put($this->post());
    }

    function item_put($key = null) {
        $incoming = key($this->put());

        $record = json_decode($incoming, true);

        $record['description'] = str_replace('_', ' ', $record['description']);

        if (($key == null) || ($key == 'id')) {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $record);
        }

        $this->crud_put($record);
    }

    private function crud_put($record = null) {
        $key = $record['id'];

        if (!isset($key)) {
            $this->response(array('error' => 'Update: No supply specified'), 406);
            return;
        }

        if (!$this->supplies->exists($key)) {
            $this->response(array('error' => 'Update: Supply ' . $key . ' not found'), 406);
            return;
        }

        $this->supplies->update($record);

        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }
    
    //DELETE using /maintenance/item/id/{id}
    function index_delete() {
        $this->crud_delete($this->delete());
    }

    function item_delete($key = null) {
        if (($key == null) || ($key == 'id')) {
            $key = $this->get('id');
        }

        $this->crud_delete($key);
    }

    private function crud_delete($key = null) {
        if (!isset($key)) {
            $this->response(array('error' => 'Delete: No supply specified'), 406);
            return;
        }

        if (!$this->supplies->exists($key)) {
            $this->response(array('error' => 'Delete: Supply ' . $key . ' not found'), 406);
            return;
        }

        $this->supplies->delete($key);
        $this->response(array('error' => $this->db->error(),
            'test' => 'testing'), 500);
        return;

        $oops = $this->db->error();
        if (empty($oops['code']))
            $this->response(array('ok'), 200);
        else
            $this->response($oops, 400);
    }

    function rules_get() {
        $this->response($this->supplies->rules(), 200);
    }

    function create_get() {
        return $this->response($this->supplies->create(), 200);
    }
}
