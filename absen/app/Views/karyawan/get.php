<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data karyawan &mdash; Karyawan</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <h1>Karyawan</h1>
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
      
        <!-- ini tampilan import excel yang lumayan fix -->
         
        <div class="card-body"> 
           <!--ini adalah button pdf-->
           <div class="d-grid gap-4 d-md-flex justify-content-md-end">
            <a href="<?=site_url('karyawan/new') ?>" class="btn btn-primary">Tambah data</a>
            <a href="<?=site_url('export/karyawan') ?>" class="btn btn-danger">Export PDF</a>
              
            </div><!--end ini adalah button pdf-->
        <form method="post" action="/karyawan/prosesExcel" enctype="multipart/form-data">
        <label for="exampleFormControlFile1">Import Excel ke Database: </label>
        <div class="input-group mb-3">
        
          <div class="custom-file">
          <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" />
          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        </div>
          <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Upload</button>  
          </div>
        </div>
        </form> </div>
       
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                        <tr> 
                          <th>id</th>
                          <th>No.Kartu</th>
                          <th>Nik</th>
                          <th>Nama Karyawan</th>
                          <th>Tgl Lahir</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                        <!-- ?php foreach ($karyawan as $key => $value): ?> -->
                          <?php $no=1+(10*($page-1));
		        	            foreach($karyawan as $value):?>
                        <tr> 
                        <td><?=$no;?></td>
                        <td><?=$value['nokartu'] ?></td>
                          <td><?=$value['nik'] ?></td>
                          <td><?=$value['nama_karyawan'] ?></td>
                          <td><?=date('d/m/Y', strtotime($value['tgl_lahir'] ))?></td> 
                          <td><?=$value['alamat'] ?></td>
                          <td class="text-center" style="width:15%">
                            <a href="<?= site_url('karyawan').'/'.$value['id_karyawan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></a>
                            <a href="<?= site_url('karyawan/'.$value['id_karyawan'].'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <form action="<?= site_url('karyawan/'.$value['id_karyawan'].'/delete') ?>" method="post" class="d-inline" onsubmit="return confirm ('yakin hapus data')">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                          </form>
                          </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody></table>
                      <?= $pager->Links() ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        </div>
        </section>
<?= $this->endSection() ?>