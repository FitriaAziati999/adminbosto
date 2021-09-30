<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Cuti &mdash; Cuti</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <h1>Cuti</h1>
            <!--<div class="section-header-button">
              <a href="<?=site_url('cuti/add')?>" class="btn btn-primary">Pengajuan Cuti</a>
            </div>-->
            
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
        <h4>Data Cuti</h4>
        </div>
          <!-- ini adalah hapus seleuruh data di table cuti -->
          <div class="card-body justify-content-md-end">    
          <form action="<?= site_url('cuti/deleteAlltable') ?>" method="post" class="d-inline" onsubmit="return confirm ('Apakah anda yakin ingin mereset total cuti (12)?')">
                <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger btn-md" type="submit">
                            Reset Total Cuti Karyawan
                          </button>
                </form>
                <div class="d-grid gap-4 d-md-flex justify-content-md-end">
           
            <a href="<?=site_url('export/cuti') ?>" class="btn btn-danger">Export PDF</a>
              
            </div
            </div>

            <!-- ini adalah hapus seleuruh data di table cuti pakek tgl -->
            <?php 
            $date=date("m-d");
            if($date=='01-01'){
              
            }
            ?>
     
          <!-- <?php echo $jumlah; ?> -->
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                        <tr>
                        <th>No</th>
                          <th>Nik</th>
                          <th>Nama Karyawan</th>
                          <th>Jabatan</th>
                          <th>Sisa Cuti</th>
                          <th>Aksi</th>
                         
                        </tr>
                        <?php $no=1+(10*($page-1));
                        
		        	foreach($cuti as $row):?>
                        <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['nik'];?></td>
                        <td><?=$row['nama_karyawan'];?></td>
                        <td><?=$row['jabatan'];?><br>Bagian: <?=$row['bagian']; ?></br></td>
                        <td><?=($row['sisa_cuti'] == null ? $row['total_cuti'] : $row['sisa_cuti']);?></td>
                        
                         
                          <td class="text-center">
                            <a href="<?=site_url('cuti/'.$row['id_karyawan'].'/setengah_hari')?>" class="btn btn-info btn-sm">Cuti Setengah Hari</a>
                            
                            <a href="<?=site_url('cuti/'.$row['id_karyawan'].'/sehari')?>" class="btn btn-primary btn-sm">Cuti Sehari</i></a>
                            <a href="<?= site_url('cuti').'/'.$row['id_karyawan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></a>
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