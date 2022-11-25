<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['gender']) && isset($_POST['email']) &&
        isset($_POST['phoneCode']) && isset($_POST['phone'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneCode = $_POST['phoneCode'];
        $phone = $_POST['phone'];

        
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "mini1";

        $conn = new mysqli('localhost', $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$username, $password, $gender, $email, $phoneCode, $phone);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>

<?php
$host="localhost";
$user="root";
$pass="";
$db="mini";
$con = new mysqli_connect($host,$user,$pass,$db);
if (!$con){
    echo"there are some problem while connecting the database";
}
$name =$_POST['name'];
$phone =$_POST['phone'];
$email =$_POST['email'];
$msg =$_POST['msg'];
$qry = "INSERT INTO 'contact'('name','phone','email','msg') VALUES ('$name','$phone','$email','$msg')";
$insert = mysqli_query($con,$qry);
if(!$insert){
    echo"there are some problem while inserting data";
}
else{
    echo"Data inserted";
}
?>