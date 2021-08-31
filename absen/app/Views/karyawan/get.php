<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data karyawan &mdash; Karyawan</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <h1>Karyawan</h1>
            <div class="section-header-button">
            <a href="<?=site_url('karyawan/new') ?>" class="btn btn-primary">Tambah data</a>
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
        <h4>Data karyawan</h4>
        </div>
            
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                        <tr>
                          <th>id</th>
                          <th>Nik</th>
                          <th>Nama Karyawan</th>
                          <th>Tgl Lahir</th>
                          <th>Alamat</th>
                          <!-- <th>JK</th>
                          <th>Tgl Masuk</th>
                          <th>Status</th>
                          <th>Bagian</th> -->
                        </tr>
                        <?php foreach ($karyawan as $key => $value): ?>
                        <tr>
                          <td><?=$key + 1?></td>
                          <td><?=$value->nik ?></td>
                          <td><?=$value->nama_karyawan ?></td>
                          <td><?=date('d/m/Y', strtotime($value->tgl_lahir ))?></td>
                          <td><?=$value->alamat ?></td>
                          <!-- <td><?=$value->jk ?></td>
                          <td><?=$value->tgl_masuk ?></td>
                          <td><?=$value->status ?></td>
                          <td><?=$value->bagian?></td> -->
                          <td class="text-center" style="width:15%">
                            <a href="<?= site_url('karyawan').'/'.$value->id_karyawan ?>" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></a>
                            <a href=""<?= site_url('karyawan/edit/.$value->id_karyawan') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
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