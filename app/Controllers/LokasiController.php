<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class LokasiController extends BaseController
{
    private $client;

    public function __construct()
    {
        $this->client = Services::curlrequest();
    }

    public function index()
    {
        try {
            $response = $this->client->get('http://localhost:8080/api/lokasi');
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data lokasi.');
            }
            $data['lokasi'] = json_decode($response->getBody(), true);

            return view('lokasi/index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        return view('lokasi/create');
    }

    public function store()
    {
        $data = [
            'nama_lokasi' => $this->request->getVar('nama_lokasi'),
            'negara' => $this->request->getVar('negara'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota')
        ];
        try {
            $response = $this->client->post('http://localhost:8080/api/lokasi', [
                'json' => $data
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal menyimpan lokasi.');
            }

            return redirect()->to('/home'); // Kembali ke halaman home setelah menyimpan data
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $response = $this->client->get("http://localhost:8080/api/lokasi/{$id}");
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data lokasi.');
            }
            $data['lokasi'] = json_decode($response->getBody(), true);

            return view('lokasi/edit', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($id)
    {
        $data = [
            'nama_lokasi' => $this->request->getVar('nama_lokasi'),
            'negara' => $this->request->getVar('negara'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota')
        ];

        try {
            $response = $this->client->put("http://localhost:8080/api/lokasi/{$id}", [
                'json' => $data
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal memperbarui lokasi.');
            }

            return redirect()->to('/home'); // Kembali ke halaman home setelah memperbarui data
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete("http://localhost:8080/api/lokasi/{$id}");

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Gagal menghapus lokasi.');
            }

            return redirect()->to('/home'); // Kembali ke halaman home setelah menghapus data
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
