 <?php
	include('../dtb/dtb.php'); 
	include('../inc/header-admin.php'); 
	include('../inc/css-admin.php'); 
	include('../inc/nav-admin.php');
	include('../dtb/global-session.php');

//main page
$page = (isset($_GET['halaman']))?$_GET['halaman']:"main";
switch($page) {
	case'dashboard':include"dashboard.php";break;
	case'data-siswa':include"dashboarddata-siswa.php";break;
	case'verifikasi-siswa':include"verifikasi-siswa.php";break;
	case'terima-siswa':include"../cmd/terima-siswa.php";break;
	case'rombel':include"rombel.php";break;
	case'siswa-diterima':include"siswa-diterima.php";break;
	case'siswa-ditolak':include"siswa-ditolak.php";break;
	case'tambah-siswa':include"../ppdb/daftar.php";break;
	case'zonasi-form':include"../ppdb/zonasi-form.php";break;
	case'login':include"login.php";break;


case 'main':
default:include"dashboard.php";
}
?>