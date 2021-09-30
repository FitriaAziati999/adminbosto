<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Absensi &mdash; absensi</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <h1>Absensi</h1>
            <div class="section-header-button">
            <!-- <a href="<?=site_url('absensi/new') ?>" class="btn btn-primary">Tambah data</a> -->
        </div>
        </div>
        <?php if(session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">X</button>
              <b>Success</b>
              <?=session()->getFlashdata('success')?>
            </div>
          </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">X</button>
              <b>Error</b>
              <?=session()->getFlashdata('error')?>
            </div>
          </div>
        <?php endif; ?>
        <div class="section-body">
        <div class="card">
        <div class="card-header">
        <h4>Data Absensi</h4>
        </div>
            
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                        <tr>
                          <th>id</th>
                        
                          <th>Nama Karyawan</th>
                          <th>tanggal</th>
                          <th>jam masuk</th>
                          <th>jam istirahat</th>
                          <th>jam kembali</th>
                          <th>jam pulang</th>
                        
                        </tr>
                        <?php foreach ($absensi as $key => $value): ?>
                        <tr>
                          <td><?=$key + 1?></td>
                         
                          <td><?=$value->nama_karyawan ?></td>
                          <td><?=$value->tanggal ?></td>
                          <td><?=$value->jam_masuk ?></td>
                          <td><?=$value->jam_istirahat ?></td>
                          <td><?=$value->jam_kembali ?></td>
                          <td><?=$value->jam_pulang ?></td>
                         
                         
                        </tr>
                        <?php endforeach ; ?>
                      </tbody></table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        </div>
        </section>
<?= $this->endSection() ?>