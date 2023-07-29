<?php

namespace App\Controllers;

use \App\Models\KaryawanModel;

use App\Controllers\BaseController;

class Datajson extends BaseController
{
    public function index()
    {
        $url = 'https://r17group.id/test-candidate/';
        $data = file_get_contents($url);
        $jsonData = json_decode($data, true);

        foreach ($jsonData as $item) {
            $karyawan = new KaryawanModel();
            $karyawan->insert([
                "id" => $item['id'],
                "nama" => $item['nama'],
                "jabatan" => $item['jabatan'],
                "jenis_kelamin" => $item['jenis_kelamin'],
                "alamat" => $item['alamat']
            ]);
            return redirect("/");
        }
    }
}
