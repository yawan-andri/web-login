<?php

include "../conn/conn.php";

$notrans = $_POST['notrans'];
$hapus = mysqli_query($koneksi, "DELETE FROM sop_control WHERE notrans ='$notrans'") or die(mysqli_error($koneksi));
if($hapus){
	 echo "Record deleted successfully!";
                header("Location: ../view/index.php?message=Record+deleted+successfully");
}
else{
	echo '<script>alert("Data Gagal Dihapus")</script>';
}
?>
