<html>
	<body>
		<h1> <?php echo "Tika extractor" ?> </h1>
		
		<form action="" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file">
			<input type="submit" name="submit" value="Submit">
		</form>

		<?php 
		 if($_SERVER['REQUEST_METHOD'] === 'POST') {
		  if ($_FILES["file"]["error"] > 0) {
		    echo "Error: " . $_FILES["file"]["error"] . "<br>";
		  }
		  else {
		    echo "File: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    echo "Stored in: " . $_FILES["file"]["tmp_name"];
			echo '<br/> <br/>';
			$contents = shell_exec('java -jar tika-app-1.4.jar --text '.$_FILES["file"]["tmp_name"]);
			echo $contents;
		  }
		 }		
		?>		

	</body>
</html>
