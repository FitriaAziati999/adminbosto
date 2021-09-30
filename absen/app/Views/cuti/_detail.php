<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Detail karyawan &mdash; Karyawan</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <h1>Karyawan</h1>
        </div>

        <div class="section-body">
            <!-- <div class="card">
                <div class="card-header">
                    <h4>Detail karyawan</h4>
                </div>
                
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <b>Nik </b>
                            <p><?= $karyawan['nik'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Nama Karyawan</b>
                            <p><?= $karyawan['nama_karyawan'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Tanggal Lahir</b>
                            <p><?= $karyawan['tgl_lahir'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>alamat</b>
                            <p><?= $karyawan['alamat'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Jenis Kelamin</b>
                            <p><?= $karyawan['jk'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Tanggal Masuk</b>
                            <p><?= $karyawan['tgl_masuk'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Status</b>
                            <p><?= $karyawan['status'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Bagian</b>
                            <p><?= $karyawan['bagian'] ?></p>
                        </div>
                        <div class="form-group col-md-6">
                            <b>Jabatan</b>
                            <p><?= $karyawan['jabatan'] ?></p>
                        </div>
                    </div>
                    
                </div>
            </div> -->
            <div class="card">
                <div class="card-header">
                    <h4>Detail Cuti</h4>
                </div>
                
                <div class="card-body table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>No</th><th>Tanggal Cuti</th><th>Keterangan Cuti</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
                        foreach ($data as $d) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['tgl_cuti'] ?></td>
                            <td><?= ($d['cuti'] == 1 ? "Sehari" : "Setengah Hari") ?></td>
                        </tr>
                            
                        <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </section>
<?= $this->endSection() ?>