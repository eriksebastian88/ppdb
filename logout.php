<?php 
	session_unset();
	session_destroy();
	echo "<script>alert('Anda sudah logout');document.location='login'</script>"
 ?>