<?php
    include("../../function/koneksi.php");   
	include("../../function/helper.php");  
	
	admin_only("user", $level);
	
	$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
	
	$nama = isset($_POST['nama']) ? $_POST['nama'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
	$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
	$level = isset($_POST['level']) ? $_POST['level'] : "";
	$status = isset($_POST['status']) ? $_POST['status'] : "";

	if($button == "Update"){
		mysqli_query($koneksi, "UPDATE user SET nama='$nama',
												email='$email',
												phone='$phone',
												alamat='$alamat',
												level='$level',
												status='$status'
												WHERE user_id='$user_id'");
		
	}
	else if($button == "Delete"){
        mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$user_id'");
    }

    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?>