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
        <div class="card">
        <div class="card-header">
        <h4>Detail karyawan</h4>
        </div>
            
                    <div class="card-body table-responsive">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <b>Nik </b>
                              <p><?= $data['nik'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Nama Karyawan</b>
                              <p><?= $data['nama_karyawan'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Tanggal Lahir</b>
                              <p><?= $data['tgl_lahir'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>alamat</b>
                              <p><?= $data['alamat'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Jenis Kelamin</b>
                              <p><?= $data['jk'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Tanggal Masuk</b>
                              <p><?= $data['tgl_masuk'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Status</b>
                              <p><?= $data['status'] ?></p>
                          </div>
                          <div class="form-group col-md-6">
                              <b>Bagian</b>
                              <p><?= $data['bagian'] ?></p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        </div>
        </section>
<?= $this->endSection() ?>