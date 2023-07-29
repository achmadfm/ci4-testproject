<?php

namespace App\Controllers;

use \App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    public function index()
    {
        $karyawan = new KaryawanModel();
        $data['karyawan'] = $karyawan->findAll();
        echo view('view_data', $data);
    }

    public function add()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jabatan' => 'required',
            'jk' => 'required',
            'alamat' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $karyawan = new KaryawanModel();
            $karyawan->insert([
                "nama" => $this->request->getPost('nama'),
                "jabatan" => $this->request->getPost('jabatan'),
                "jenis_kelamin" => $this->request->getPost('jk'),
                "alamat" => $this->request->getPost('alamat')
            ]);
            return redirect('/');
        }
    }

    public function edit($id)
    {
        // ambil karyawan yang akan diedit
        $karyawan = new KaryawanModel();
        $data['karyawan'] = $karyawan->where('id', $id)->first();

        // lakukan validasi data karyawan
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'jk' => 'required',
            'alamat' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, maka simpan ke database
        if ($isDataValid) {
            $karyawan->update($id, [
                "nama" => $this->request->getPost('nama'),
                "jabatan" => $this->request->getPost('jabatan'),
                "jk" => $this->request->getPost('jk'),
                "alamat" => $this->request->getPost('alamat')
            ]);
            return redirect('/');
        }
    }

    public function importjson()
    {
        $url = $this->request->getVar('json');
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

    public function delete($id)
    {
        $karyawan = new KaryawanModel();
        $karyawan->delete($id);
        return redirect('/');
    }
}
