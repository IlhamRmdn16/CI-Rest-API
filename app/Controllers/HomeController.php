<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class HomeController extends BaseController
{
    private $client;

    public function __construct()
    {
        $this->client = Services::curlrequest();
    }

    public function index()
    {
        try {
            // Mengambil data proyek
            $responseProyek = $this->client->get('http://localhost:8080/api/proyek');
            if ($responseProyek->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data proyek.');
            }
            $data['proyek'] = json_decode($responseProyek->getBody(), true);

            // Mengambil data lokasi
            $responseLokasi = $this->client->get('http://localhost:8080/api/lokasi');
            if ($responseLokasi->getStatusCode() !== 200) {
                throw new \Exception('Gagal memuat data lokasi.');
            }
            $data['lokasi'] = json_decode($responseLokasi->getBody(), true);

            // Mengirim data ke view
            return view('home', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
