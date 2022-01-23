<!--File uploading script -->
<?php include 'upload.php'; ?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Upload Image and Store in the Database by CodeAT21</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>
	<div class="App">
		<h1> Upload Images And Store In Database Using PHP And MySQL </h1>
		<div class="wrapper">
			<div class="form__field">
				<?php if(!empty($statusMsg)){ ?>
					<p class="status__msg"><?php echo $statusMsg; ?></p>
				<?php } ?>
				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="file" class="form__field__img">
					<input type="submit" name="submit" value="Upload" class="btn__default">
				</form>
			</div>

			<div class="gallery">
				<h2>Uploaded Images</h2>
				<?php include 'dbConfig.php';
					$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
					if($query->num_rows > 0){
						while($row = $query->fetch_assoc()){
							$imageURL = 'uploads/'.$row["file_name"];
						?>
							<img src="<?php echo $imageURL; ?>" alt="" />
						<?php }
					}else{ ?>
						<p>No image(s) found...</p>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>