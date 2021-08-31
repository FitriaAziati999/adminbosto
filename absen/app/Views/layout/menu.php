<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown"><a href="<?=site_url()?>" ><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
<li class="nav-item dropdown"><a href="<?=site_url('karyawan')?>" ><i class="fas fa-user"></i><span>Karyawan</span></a></li>
</li>

<li class="active"><a class="nav-link" href="<?=site_url('absensi')?>"><i class="far fa-square"></i> <span>Absensi</span></a></li>
<li class="nav-item dropdown">
<a href="<?=site_url('laporan')?>" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan</span></a>
<ul class="dropdown-menu">
    <li><a class="nav-link" href="bootstrap-alert.html">Harian</a></li>
    <li><a class="nav-link" href="bootstrap-badge.html">Bulan</a></li>
    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
</ul>
</li>