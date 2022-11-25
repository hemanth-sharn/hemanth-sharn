
<?php
	$title = $_POST['title'];
    $content = $_POST['content'];
	
	$conn = new mysqli('localhost','root','','mini1');
	if($conn-> connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into blog(title,content) values(?,?)");
		$stmt->bind_param("ss", $title,$content);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }
?>