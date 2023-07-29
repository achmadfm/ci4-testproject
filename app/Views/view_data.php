<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan URL Json</label>
            <input type="text" name="json" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </form>
</header>

<main>
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop1">
            Tambah Data
        </button>
        <hr>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($karyawan as $data) :

                    if ($data['jenis_kelamin'] == 'Laki-laki') {
                        $jk = "Laki-laki";
                    } else {
                        $jk = "Perempuan";
                    }
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <td><?= $jk ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td>
                            <a href="#" data-href="<?= base_url('karyawan/' . $data['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop3">Edit</a>
                            <a href="#" data-href="<?= base_url('karyawan/' . $data['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop2">Delete</a>
                        </td>
                    </tr>

                <?php
                    $no++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" aria-label="Default select example">
                                <option value="">--Pilih Jabatan--</option>
                                <option value="fullstack">Fullstack</option>
                                <option value="frontend">Front-End</option>
                                <option value="backend">Back-End</option>
                                <option value="webdev">Web Dev</option>
                                <option value="mobiledev">Mobile Dev</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jk" aria-label="Default select example">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                            <input type="hidden" name="id" value="">
                            <input type=" text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" aria-label="Default select example">
                                <option value="">--Pilih Jabatan--</option>
                                <option value="fullstack">Fullstack</option>
                                <option value="frontend">Front-End</option>
                                <option value="backend">Back-End</option>
                                <option value="webdev">Web Dev</option>
                                <option value="mobiledev">Mobile Dev</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jk" aria-label="Default select example">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="h2">Are you sure?</h2>
                    <p>The data will be deleted and lost forever</p>
                </div>
                <div class="modal-footer">
                    <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmToDelete(el) {
            $("#delete-button").attr("href", el.dataset.href);
            $("#confirm-dialog").modal('show');
        }
    </script>
</main>
<?= $this->endSection() ?>