<?php
session_start();
include("./include/config.php");
include("./include/lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type:text/html" charset="euc-kr" />
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/css/common.css" />
<link rel="stylesheet" type="text/css" href="/css/sub.css" />
<link rel="stylesheet" type="text/css" href="/css/main.css" />
</head>
<body onload="<?php if($mdt){echo "subani()";}else{echo "mainani()";}?>">
<div id="wrapper">
	<div id="wrap">
		<div id="header">
			<ul id="navi">
				<li><a href="/search/search">�˻�</a></li>
				<?php
				if($_SESSION['uno']){
				?>
				<li><a href="/login/login/logout">�α׾ƿ�</a></li>
				<?php
				}else{
				?>
				<li><a href="/login/login">�α���</a></li>
				<li><a href="/join/join">ȸ������</a></li>
				<?php
				}
				?>
				<li><a href="/">����ȭ��</a></li>
				<?php
				if($_SESSION['uno']){
				?>
				<li><strong><?php echo $_SESSION['uname']."��";?></strong></li>
				<li><a href="/mypage/mypage">����������</a></li>
				<?php
				}
//				$db->query("insert","menu","main_id='admin',sub_id='orderlistadmin',type='orderlistadmin',title='�ֹ� ����'");
				if($_SESSION['ulv'] ==10){
				?>
				<li><a href="/admin/menu" class="fw">[������������]</a></li>
				<?php
				}
				?>
			</ul>
			<div id="logo">
				<a href="/"><?php img("/img/logo.png","Chung Hoģȯ�� ��깰 ûȣ����");?></a>
			</div>
			<div id="menu">
				<ul>
					<?php
					$menuarr = array(6=>10,7=>75,8=>175,9=>80);
					$i = 1;
					$res = $db->query("select","menu","","type='main' and hd='1' order by no asc");
					$total = $db->num("select * from menu where type='main' and hd='1'");
					while($row = $db->fetch($res)){
						$row2 = $db->fetarr("select * from menu where main_id='$row[main_id]' and type!='main'");
						?>
						<li><a href="<?php echo "/".$row['main_id']."/".$row2['sub_id'];?>" onmouseover="dismenu(<?php echo $i.",",$total;?>)"><?php img("/img/".$row['main_id'].".png",$row['title']);?></a><br />
						<?php
						if($i >= 6 and $i <= 9){
						?>
							<ul id="sub<?php echo $i;?>" style="margin-left:-<?php echo $menuarr["$i"];?>px;">
						<?php
						}else{
						?>
							<ul id="sub<?php echo $i;?>">
						<?php
						}
							$res3 = $db->query("select","menu","","type!='main' and main_id='$row[main_id]'");
							while($row3 = $db->fetch($res3)){
							?>
							<li><a href="<?php echo "/".$row3['main_id']."/".$row3['sub_id'];?>"><?php echo $row3['title']?></a></li>
							<?php
							}
							?>
							</ul>
						</li>
						<?php
						$i++;
					}
					?>
				</ul>
			</div>
		</div>
		<?php
		if($sdt){
			include("./page/sub.php");
		}else{
			include("./page/main.php");
		}
		?>
	</div>
</div>
<div id="footer_out">
	<ul id="footer">
		<li>�� ������Ʈ�� ���۱��� <span class="fw cg">ûȣ����</span>�� �ֽ��ϴ�. ���� ������ ó���� �޽��ϴ�.</li>
		<li>copyright (c) <span class="fw cg">chung ho</span> all right reserved.</li>
	</ul>
</div>
</body>
</html>