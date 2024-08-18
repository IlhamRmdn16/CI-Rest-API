<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use App\Models\ProyekModel; // Pastikan model diimpor dengan benar
use App\Models\LokasiModel; // Pastikan model diimpor dengan benar

class ProyekController extends BaseController
{
    private $client;

    public function __construct()
    {
        $this->client = Services::curlrequest();
    }

    public function index()
    {
        try {
            $response = $this->client->get('http://localhost:8080/api/proyek');
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data proyek.');
            }
            $data['proyek'] = json_decode($response->getBody(), true);

            return view('home', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $response = $this->client->get('http://localhost:8080/api/lokasi');
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data lokasi.');
            }
            $data['lokasi'] = json_decode($response->getBody(), true);

            return view('proyek/create', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store()
    {
        $data = [
            'nama_proyek' => $this->request->getPost('nama_proyek'),
            'client' => $this->request->getPost('client'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'pimpinan_proyek' => $this->request->getPost('pimpinan_proyek'),
            'keterangan' => $this->request->getPost('keterangan'),
            'lokasiList' => $this->request->getPost('lokasi')
        ];

        try {
            $response = $this->client->post('http://localhost:8080/api/proyek', [
                'json' => $data
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal menyimpan proyek.');
            }

            return redirect()->to('/home');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $proyekModel = new ProyekModel();
        $lokasiModel = new LokasiModel();

        $data['proyek'] = $proyekModel->find($id);
        $data['lokasi'] = $lokasiModel->findAll();

        if (!$data['proyek']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Proyek not found');
        }

        // Assuming `lokasiList` is a comma-separated list of location IDs
        $data['lokasiList'] = implode(',', $proyekModel->getLokasiList($id));

        return view('proyek/edit', $data);
    }

    public function update($id)
    {
        $proyekModel = new ProyekModel();
        $data = [
            'nama_proyek' => $this->request->getPost('nama_proyek'),
            'client' => $this->request->getPost('client'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'pimpinan_proyek' => $this->request->getPost('pimpinan_proyek'),
            'keterangan' => $this->request->getPost('keterangan'),
            'lokasiList' => implode(',', $this->request->getPost('lokasi'))
        ];

        try {
            $response = $this->client->put("http://localhost:8080/api/proyek/{$id}", [
                'json' => $data
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memperbarui proyek.');
            }

            return redirect()->to('/proyek'); // Kembali ke halaman proyek setelah memperbarui data
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete("http://localhost:8080/api/proyek/{$id}");

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal menghapus proyek.');
            }

            return redirect()->to('/home'); // Kembali ke halaman home setelah menghapus data
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
