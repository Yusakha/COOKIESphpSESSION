<?php
$file = fopen("database.csv","r");
$username = $_POST['username'];
$password = $_POST['password'];
$success = 'n';
while(!feof($file))
{
    $data = fgetcsv($file,0,',');
    for($i=0;$i<count($data);$i++)
    {
    if($username==$data[0] and $password==$data[1]){
        $success = 'y';
        if(isset($_POST['ingat'])){
            setcookie('username', $username, time()+60*60*7);
            setcookie('password', $password, time()+60*60*7);
            if(isset($_POST['ingat'])){
                $ingat = $_POST['ingat'];
                setcookie('ingat', $ingat, time()+60*60*7);
            }
        }
        else {
            setcookie('username', $username, time()-1);
            setcookie('password', $password, time()-1);
            if(isset($_POST['ingat'])){
                $ingat = $_POST['ingat'];
                setcookie('ingat', $ingat, time()-1);
            }
        }
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['time'] = time();
        echo "<script type='text/javascript'>alert('Login Success!');window.location.href='dashboard.php';</script>";
    }
  }
}
fclose($file); //tutup akses file csv
if($success=='n'){
    if(isset($_POST['ingat'])){
        $ingat = $_POST['ingat'];
        setcookie('username', $username, time()-1);
        setcookie('password', $password, time()-1);
        setcookie('ingat', $ingat, time()-1);
    }
    echo "<script type='text/javascript'>alert('username atau password salah. Silahkan coba lagi!');window.location.href='login.php';</script>";
}
?>