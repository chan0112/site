<?php
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid ="";
	if (isset($_SESSION["username"])) $username = $_SESSION["username"];
	else $username ="";

	if (!$userid)
	{
		echo("
			<script>
				alert('자료실은 로그인 후 이용해 주세요!');
				history.go(-1)
			</script>
			");
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">

<title>자료실</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <center><img src="./img/reference_img.jpg"></center>
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
	    		자료실 > 글 쓰기
		</h3>
	    <form  name="board_form" method="post" action="reference_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='reference_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> 
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>