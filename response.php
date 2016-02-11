<?php
$link = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');


if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
else { 

}
?>
<?php

switch ($_REQUEST['action']) {

	case 'add':
		mysqli_query($link,"insert into disc values(DEFAULT,'" . $_POST['name'] . "','". $_POST['owner'] ."','1')");
		echo '<script language="javascript">';
		echo 'alert("Someth cold '. $_POST['name'] .' addet to database")';  //not showing an alert box.
		echo '</script>';
        break;
			case 'new':
			$chek=0;
			$res2 = mysqli_query($link,"SELECT * FROM `users` where my_uset='". $_POST['login'] ."'");
if($res2) { 
while($row3 = mysqli_fetch_assoc($res2)) {
		$chek=$chek+1;
}
mysqli_free_result($res2);
}		
		
		if ($chek==0){
		mysqli_query($link,"insert into users values('". $_POST['login'] ."','". $_POST['pas'] ."')");
		echo '<script language="javascript">';
		echo 'document.location.href = "index.php";'; 
		echo '</script>';
		}
		
		else{
		echo 'Этот логин уже занят, попробуйте ввести другой';
		}
        break;
?>
<?mysqli_close($link);
}
?>