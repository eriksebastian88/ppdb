<?php 
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$user = $db->query("SELECT * FROM ro_user WHERE username = '$username' AND password = '$password'");
		$check = $user->rowcount();
		if($check){
			$data = $user->fetch(PDO::FETCH_ASSOC);
			$username = $data['username'];
			$password = $data['password'];
			if($data['level'] == 1){
				// session_start();
				$_SESSION['username']=$data['username'];
				$_SESSION['password']=md5($data['password']);
				// $data['username'] = $_SESSION['username'];
				echo "<script language='javascript'>alert('Berhasil Login');document.location='dashboard';</script>";
			}else{
				echo "<script language='javascript'>alert('Login Gagal!');document.location='login';</script>";
			}
		}else{
				echo "<script language='javascript'>alert('Data tidak ditemukan!');document.location='login';</script>";
		}
	}
 ?>