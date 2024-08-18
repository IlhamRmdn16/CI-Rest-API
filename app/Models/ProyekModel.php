<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_proyek', 'client', 'tgl_mulai', 'tgl_selesai', 'pimpinan_proyek', 'keterangan', 'lokasiList'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nama_proyek' => 'required|min_length[3]',
        'client' => 'required|min_length[3]',
        'tgl_mulai' => 'required|valid_date',
        'tgl_selesai' => 'required|valid_date',
        'pimpinan_proyek' => 'required|min_length[3]',
        'keterangan' => 'permit_empty|string',
        'lokasiList' => 'permit_empty|string'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
