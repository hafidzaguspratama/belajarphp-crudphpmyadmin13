<?php include_once 'nav1.php';?>
<?php
 error_reporting(E_ALL);

 $title = 'Data Barang';
 include_once 'koneksi.php';

 if (isset($_POST['submit']))
 {
 $nama = $_POST['nama'];
 $kategori = $_POST['kategori'];
 $harga_jual = $_POST['harga_jual'];
 $harga_beli = $_POST['harga_beli'];
 $stok = $_POST['stok'];
 $file_gambar = $_FILES['file_gambar'];



$target = "image/".basename($file_gambar);

 $sql = 'INSERT INTO data_barang (nama, kategori,
harga_jual, harga_beli, stok, gambar) ';
 $sql .= "VALUE ('{$nama}', '{$kategori}',
'{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";

  mysqli_query($conn, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
   
    $result = mysqli_query($conn, "SELECT * FROM data_barang");
  
  header('location: index.php');
}

 include_once 'header.php';

 ?>

 <h2>Tambah Barang</h2>
 <form method="post" action="tambah_barang.php" enctype="multipart/form-data">
 	<div class="input">
 		<label>Nama Barang</label>
 		<input type="text" name="nama" />
 	</div>

 	<div class="input">
 		<label>Kategori</label>
 	<select class="kategori" name="kategori">
		 <option value="Komputer">Komputer</option><br>
		 <option value="Elektronik">Elektronik</option><br>
		 <option value="Hand Phone">HandPhone</option>
 	</select>

 	</div>

	<div class="input">
		 <label>Harga Jual</label>
		 <input type="text" name="harga_jual" />
 	</div>

 	<div class="input">
		 <label>Harga Beli</label>
		 <input type="text" name="harga_beli" />
	</div>

	 <div class="input">
		 <label>Stok</label> 
		 <input type="text" name="stok" />
	 </div>

	 <div class="input">
		 <label>File Gambar</label>
		 <input type="file" name="file_gambar" />
	 </div>

	 <div class="submit">
		 <input type="submit" name="submit" value="Simpan" />
	 </div>
 </form>

 <?php
 include_once 'footer.php';
 ?>