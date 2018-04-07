<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_model extends CI_Model {

    public $table = 'pegawai';
    public $id = 'id_pegawai';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    //ini untuk memasukkan kedalam tabel pegawai
    function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'nama' => $dataarray[$i]['nama'],
                'tempat_lhr' => $dataarray[$i]['tempat_lahir'],
                'tanggal_lhr' => $dataarray[$i]['tanggal_lahir']
            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
                $this->db->insert($this->table, $data);
        }
