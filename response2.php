<?php
$link = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');


if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
else { 
}
?>
<?php

switch ($_REQUEST['action']) {
    		case 'take':
		mysqli_query($link,"update disc set free=0 where id='" . $_POST['takeid'] . "'");
		mysqli_query($link,"insert into sost values('" . $_POST['takeid'] . "','". $_POST['login'] ."','". $_POST['name'] ."')");
        break;
		
		case 'selecttaked':
		echo	'<table>';
		$res = mysqli_query($link,"SELECT * FROM `sost`");
if($res) { 
echo	'<table>';
while($row = mysqli_fetch_assoc($res)) {
		echo	'<tr><td>';
		echo	'ID: ';
		echo   $row['id'].' </td>';	
		echo '</tr>';		
}
echo	'</table>';
mysqli_free_result($res); 
       


}
 break;
 
 
     		case 'saygoodbye':
		mysqli_query($link,"update disc set free=1 where id='" . $_POST['saygoodbyeid'] . "'");
		mysqli_query($link,"delete from sost where id=" . $_POST['saygoodbyeid'] );
        break;
}


?>
<?mysqli_close($link);

?>