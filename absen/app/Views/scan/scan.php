<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>scan kartu</title>


	<!-- scanning membaca kartu RFID -->

    <script type="text/javascript" src="<?=base_url()?>/template/assets/jquery.min.js "></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#cekkartu").load('<?=site_url('bacakartu') ?>')
			}, 2000);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>
	<?= $this->endsection() ?>
<?= $this->section('content') ?>

<section class="section">
        <div class="section-header">
            <div class="">
            <a href="" ><i class=""></i></a>
        </div>
        <h1>scan</h1>
        </div>
        <div class="section-body">
			<div class="card">
				<div class="card-header">
					<div class="container-fluid" style="padding-top: 10%">
						<div id="cekkartu"></div>
					</div>
				</div>
			</div>
		</div>
</section>

</body>
<?= $this->endSection() ?>