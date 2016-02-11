<?php session_start();
$link = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');
if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
else { 
}
$res = mysqli_query($link,"SELECT * FROM users where my_uset='".$_GET['login']."'");
if($res) { 
while($row = mysqli_fetch_assoc($res)) {
      $log = $row['my_uset'] ;
	  $pas = $row['my_passwd'] ;
}
mysqli_free_result($res); 
}
mysqli_close($link);

if (!isset($_GET['go'])){
  echo "  
  <form id='slick-login'>
    Логин: <input type=text name=login  pattern='[A-Za-z0-9]{1,45}' title='Только латинские буквы и цифры'>
    Пароль: <input type=password 
                        name=passwd>
    <input type=submit name=go value='Войти'/>
	<center><p><a href='#reg' >Регистрация</a></p></center>
  </form>
  
			<div id='reg' class='modalDialog'>
				<div>
				<a href='#close' title='Закрыть' class='close'>X</a><center>
				<p><input type='text' id='login' onkeyup='Converter(this.id)' class='form-control' maxlength='15'></input></p>
	<p><input type='password' id='pas' class='form-control'></input></p>
    <p><button name='new' class='new btn btn-primary'>Регистрация</button></p>
				<div class='results2'>Введите ваши данные</div></center>
				</div>
			</div>";
}else {
   $_SESSION['login']=$_GET['login']; 
   $_SESSION['passwd']=$_GET['passwd']; 
    if ($_GET['login']==$log && 
        $_GET['passwd']==$pas) {?>
				<link rel="stylesheet" href="reveal.min.css"/>
				<div class="reveal concave center" data-transition-speed="default" data-background-transition="default">
						<div class="slides" style="width: 960px; height: 700px; zoom: 0.801;">
					<style>
@keyframes anim{
 0% { opacity: 0}
 100% { opacity: 1}
}

@keyframes anim1{
 0% { opacity: 0}
 20% { opacity: 0}
 100% { opacity: 1}
}

#wrap1{
animation:anim 3s;
}

#wrap2{
animation:anim1 3s;
}
	</style>
                <section style="top: -350px; display: block;" class="present">
				<div id="wrap1">Здравствуйте</div>
				<div id="wrap2"><? echo $_SESSION['login'] ?>!</div>
                </section>
                <section style="top: 0px; display: block;" hidden="" class="future stack">
                    <section data-background="rgba(0,0,0,0.5)" data-background-transition="slide" style="top: -236px; display: block;">
                     Все свободные диски
                    </section>
                    <section data-background="rgba(0,0,0,0.3)" class="future" style="top: -299.5px; display: block;">
                    Здесь Вы можете выбрать диск из тех, что оставили другие пользователи.
                    </section>
					
					<?php						
					$link1 = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');
						if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
							else { 
							}
								$res1 = mysqli_query($link1,"SELECT * FROM `disc` where free='1'");
								if($res1) { 

								while($row = mysqli_fetch_assoc($res1)) {
									echo	'<section class="future" style="top: -20px; display: none;">';
									echo	'<p>ID:';
									echo   $row['id'];
									echo	' </p><p>Название: ';
									echo   $row['name'];
									echo	' </p><p>Владелец: ';
									echo   $row['owner'];	
									echo	'</p><p><button onclick="tt('.$row['id'].');this.disabled = true;" class="btn btn-danger">Взять</button></p> ';
									
									echo '</section>';		
								}

							mysqli_free_result($res1); 
								
							}

					mysqli_close($link1);
				?>                  

                </section>
				
				
				<section style="top: 0px; display: block;" hidden="" class="future stack">
                    <section data-background="rgba(0,0,0,0.5)" data-background-transition="slide" style="top: -236px; display: block;">
                     Взятые мной диски
                    </section>
                    <section data-background="rgba(0,0,0,0.3)" class="future" style="top: -299.5px; display: block;">
                     Здесь Вы можете посмотреть список всех дисков, что Вы взяли
                    </section>
					
					
					<?php
					$link2 = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');
						if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
							else { 
							}
								
							$res2 = mysqli_query($link2,"SELECT * FROM `sost` where haver= '".$_SESSION['login']."'");
							
								if($res2) { 
								while($row = mysqli_fetch_assoc($res2)) {
								echo	'<section class="future" style="top: -20px; display: none;">';
								echo	'<p>ID: ';
								echo   $row['id'];	
								echo	'</p><p><button onclick="gb('.$row['id'].');this.disabled = true;" class="btn btn-warning">Вернуть диск</button></td> ';
								echo '</p></section>';	
						}

						mysqli_free_result($res2); 
							
						}

					mysqli_close($link2);
				?>
                </section>
				
				
					<section style="top: 0px; display: block;" hidden="" class="future stack">
                    <section data-background="rgba(0,0,0,0.5)" data-background-transition="slide" style="top: -236px; display: block;">
                    Мои диски
                    </section>
                    <section data-background="rgba(0,0,0,0.3)" class="future" style="top: -299.5px; display: block;">
                    Здесь Вы можете добавить диск и посмотреть список добавленых Вами дисков
                    </section>
					
                    <section class="future" style="top: -20px; display: none;">
                    <p>Добавить диск</p>
					<p><input type="text" id="textfield" onkeyup="Converter(this.id)" class='form-control'></input></p>
					<p><button name="add" class="add btn btn-success" onclick="this.disabled = true; this.innerHTML='Добавляется'">Добавить</button></p>
                    </section>
					
<?php
		$link2 = mysqli_connect('mysql.hostinger.ru','u774162186_bsc','QaWK9O2Nd1','u774162186_bsc');
			if(mysqli_connect_errno()) die('Connection error: '.mysqli_connect_error());
				else { 
				}
								
				$res2 = mysqli_query($link2,"SELECT * FROM `disc` where owner='".$_SESSION['login']."'");
				if($res2) { 

						while($row = mysqli_fetch_assoc($res2)) {
						echo	'<section class="future" style="top: -20px; display: none;">';
						echo	'<p>ID:';
						echo   $row['id'];
						echo	'</p><p>Name:';
						echo	$row['name'].'</p><p>';
						
							if ($row['free']==0){
								echo	'Диск кто- то взял... ';
							}
						
						if ($row['free']==1){
						echo	'Диск свободен ';
						}
						echo '</p></section>';
				}
				mysqli_free_result($res2); 
					
			}

		mysqli_close($link2);
		?>
                </section>
				
				<section data-background="rgba(0,0,0,0.2)" data-background-transition="slide" style="top: -286px; display: block;" hidden="" class="future">
				<a href="exit.php">Выйти</a>
				</section>

                
            </div>
		</div>

        <script src="head.min.js"></script>
        <script src="reveal.min.js"></script>

        <script>
            Reveal.initialize({
                controls: true,
                progress: true,
                history: true,
                center: true,

                theme: Reveal.getQueryHash().theme,
                transition: Reveal.getQueryHash().transition || 'concave'
            });

        </script>
		
		
	
	
			
<?
}
else echo "<div style='	position: absolute;
	left: 50%;
	top: 50%;'>Такого пользователя не существует<br>
				<a href='index.php'>Вернуться назад</a></div>";		
}
?>


<head>
 <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
		<script src="js/jquery.min.js" type="text/javascript"></script>
	 <script language="javascript" type="text/javascript">
	 var userName = '<?php echo $_SESSION['login'];?>';

	
	    $('.add').click( function() {
	var seln=document.getElementById('textfield').value;
        $.ajax({
          type: 'POST',
          url: 'response.php?action=add',
          data: 'name='+seln+'&owner='+userName,
          success: function(data){
            location.reload();
          }
        });
    });
	

	
	
		    function tt(id) {
			        $.ajax({
          type: 'POST',
          url: 'response2.php?action=take',
          data: 'takeid='+id+'&login='+userName,
          success: function(data){
				location.reload();
          }
        });
		
    };
	
	function gb(id) {
        $.ajax({
          type: 'POST',
          url: 'response2.php?action=saygoodbye',
          data: 'saygoodbyeid='+id,
          success: function(data){
			location.reload();
          }
        });
		
    }
	

	
		  
	
	

	$('.new').click( function() {
	var log=document.getElementById('login').value;
	var pas=document.getElementById('pas').value;
        $.ajax({
          type: 'POST',
          url: 'response.php?action=new',
          data: 'login='+log+'&pas='+pas,
          success: function(data){
           $('.results2').html(data);
          }
        });
    });
    </script>
	<script>
var russ = new Array(' ','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ч','ц','ш','щ','э','ю','я','ы','ъ','ь', ' ', '\'', '\"', '\#', '\$', '\%', '\&', '\*', '\,', '\:', '\;', '\<', '\>', '\?', '\[', '\]', '\^', '\{', '\}', '\|', '\!', '\@', '\(', '\)', '\-', '\=', '\+', '\/', '\\','А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ч','Ц','Ш','Щ','Э','Ю','Я','Ы','Ъ','Ь');
var conver = new Array('','a','b','v','g','d','e','jo','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','ch','c','sh','csh','e','ju','ja','y','', '', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','A','B','V','G','D','E','JO','ZH','Z','I','J','K','L','M','N','O','P','R','S','T','U','F','H','CH','C','SH','CSH','E','JU','JA','Y','','');
var from = "";

function Converter(pole)
  {
  from = document.getElementById(pole).value;
  var lenrus=russ.length;
  if (pole == 'login') {
  from = from.toLowerCase();
 } 
  var to = "";
  var len = from.length;
  var character, isRus;
  for(var i=0; i < len; i++)
    {
    character = from.charAt(i,1);
    isRus = false;
	if (pole == 'login'){
    for(var j=0; j < lenrus; j++)
      {
      if(character == russ[j])
        {
        isRus = true;
        break;
        }
      }
	}
	else {
    for(var j=1; j < lenrus; j++)
      {
      if(character == russ[j])
        {
        isRus = true;
        break;
        }
      }
	}
    to += (isRus) ? conver[j] : character;
    }
  document.getElementById(pole).value = to; 
  }
</script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
	<script type="text/javascript" src="placeholder.js"></script>
	
	    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
          integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
          integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
            integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
            crossorigin="anonymous"></script>
             <title>Обмен ДВД</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	</head>
<body>

</body>
</html>