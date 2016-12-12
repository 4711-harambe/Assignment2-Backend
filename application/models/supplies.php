<?php

class supplies extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function rules() {
        $config = [
            ['field' => 'id', 'label' => 'Supply code', 'rules' => 'required|integer'],
            ['field' => 'code', 'label' => 'Supply name', 'rules' => 'required'],
            ['field' => 'description', 'label' => 'Supply description', 'rules' => 'required|max_length[256]'],
            ['field' => 'receivingUnit', 'label' => 'Supply receiving unit', 'rules' => 'required'],
            ['field' => 'receivingCost', 'label' => 'Supply receving cost', 'rules' => 'required|decimal'],
            ['field' => 'stockingUnit', 'label' => 'Supply stocking unit', 'rules' => 'required'],
            ['field' => 'quantityOnHand', 'label' => 'Supply quantity', 'rules' => 'required|integer']
        ];
        return $config;
    }

}
