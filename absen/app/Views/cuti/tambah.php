<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Cuti &mdash; Cuti</title>
<?= $this->endsection() ?>

<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
        <div class="section-header-back">
              <a href="<?=site_url('cuti')?>" class="btn btn-primary"><i class="fas fa-arrow-left"> </i></a>
            </div>    
        <h1>Cuti</h1>
            
        </div>

        <div class="section-body">
        <div class="card">
        <div class="card-header">
        <h4> Tambah Data Cuti</h4>
       </div>
       <!--form tambah data-->
       <div class="card-body">
       <form>
       <div class="form-group">
          <label for="exampleFormControlSelect1">nama_karyawan</label>
          <select name="id_karyawan" id="exampleFormControlSelect1">
            <option></option>
            <option></option>
            <option></option>
            <option></option>
            <option></option>
          </select>
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