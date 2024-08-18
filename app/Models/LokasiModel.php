<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lokasi', 'negara', 'provinsi', 'kota', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    protected $validationRules = [
        'nama_lokasi' => 'required|min_length[3]',
        'negara' => 'required|min_length[3]',
        'provinsi' => 'required|min_length[3]',
        'kota' => 'required|min_length[3]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
