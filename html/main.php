        <div id="main_img_bar">
            <center><img src="./img/main_img.png"></center>
        </div>
        <div id="main_content">
            <div id="latest">
                <a href="notice_list.php"><h4>공지사항</h4></a>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "docdo21", "dhckstjr1!", "docdo21");
    $sql = "select * from notice order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "공지사항 DB 테이블(board)이 생성 전이거나 아직 공지사항이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
            $num = $row["num"];
            $page = $row["page"];
?>
                <li>
                    <span><a href="notice_view.php?num=<?=$num?>&page=<?=$page?>"><?=$row["subject"]?></a></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="point_rank">
                <a href="board_list.php"><h4>게시판</h4></a>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(members)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
            $num = $row["num"];
            $page = $row["page"];
?>
                
                <li>
                    <span><a href="board_view.php?num=<?=$num?>&page=<?$page?>"><?=$row["subject"]?></a></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
                
<?php
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>