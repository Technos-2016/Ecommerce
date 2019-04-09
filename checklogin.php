<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE UserStatus = 1 AND Email= '$email' AND Password = '$password'";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $dbuid = $row['UID'];
        $dbfname = $row['FirstName'];
        $dblname = $row['LastName'];
        $dbemail = $row['Email'];
        $dbimage = $row['Image'];
        $dbmember = $row['IsMember'];
        $dbpass = $row['Password'];
        $dbstatus = $row['UserStatus'];

        if ($dbemail == $email AND $dbpass == $password AND $dbmember == 0) {
            //echo "<script> alert('Welcome Admin...');location.href = 'home/dashboard';</script>";
            echo "Welcome Admin ..";
            header("Location:home/dashboard");
            $_SESSION['UID'] = $dbuid;
            $_SESSION['FirstName'] = $dbfname;
            $_SESSION['LastName'] = $dblname;
            $_SESSION['Email'] = $dbemail;
            $_SESSION['Member'] = $dbmember;
            $_SESSION['Status'] = $dbstatus;
            $_SESSION['Image'] = $dbimage;
        } else if ($dbemail == $email AND $dbpass == $password AND $dbmember == 1) {
            echo "Welcome Member...";
            header("Location:member/dashboard");
            $_SESSION['UID'] = $dbuid;
            $_SESSION['FirstName'] = $dbfname;
            $_SESSION['LastName'] = $dblname;
            $_SESSION['Email'] = $dbemail;
            $_SESSION['Member'] = $dbmember;
            $_SESSION['Status'] = $dbstatus;
            $_SESSION['Image'] = $dbimage;
        } else {
            echo "<script> alert('Error Logging..');location.href = 'login';</script>";
        }
    } else {
        
        echo "<script> alert('No User Found with this credetials..');location.href = 'register';</script>";
    }
}
?>
