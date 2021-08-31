<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Karyawan &mdash; Karyawan</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?=site_url('karyawan/') ?>" class="btn" ><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data</h1>
        </div>
        <div class="section-body">
        <div class="card">
        <div class="card-header">
        <h4>Tambah Data Karyawan</h4>
        </div>
                <div class="card-body ">
                  <form action="<?=site_Url('karyawan')?>" method="post" autocomplete="off">
                  <?= csrf_field() ?>
                  <div class="row">
                  <div class="form-group col-md-6 ">
                          <label>Nik</label>
                          <input type="text" name="nik" class="form-control" required autofocus>
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Nama Karyawan</label>
                          <input type="text" name="nama_karyawan" class="form-control" required >
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control" required >
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Alamat</label>
                          <textarea name="alamat" id="" class="form-control"></textarea>    
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Jenis Kelamin</label>
                          <!-- <input type="text" name="jk" class="form-control" required > -->
                          <select name="jk" class="form-control" required>
                              <option>Laki Laki</option>
                              <option>Perempuan</option>
                          </select>
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Tanggal Masuk</label>
                          <input type="date" name="tgl_masuk" class="form-control" required >
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Status</label>
                          <!-- <input type="text" name="status" class="form-control" required > -->
                          <select name="status" class="form-control" required>
                              <option>Pegawai Harian</option>
                              <option>Pegawai Tetap</option>
                          </select>
                      </div>
                      <div class="form-group col-md-6 ">
                          <label>Bagian</label>
                          <input type="text" name="bagian" class="form-control" required >
                      </div>
                      <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>simpan</button>
                        <button type="reset" class="btn btn-secondary">reset</button>
                      </div>
                      </div>
                  </form>    
                </div>
                  </div>
                </div>
              </div>
              </div>
        </div>
        </section>
<?= $this->endSection() ?>