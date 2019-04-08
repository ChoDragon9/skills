<div id="mcon">
	<div id="mani">
		<div id="mani_left">
			<img src="/animation/mani1.png" id="mani1" />
			<img src="/animation/mani2.png" id="mani2" class="dn" />
			<img src="/animation/mani3.png" id="mani3" class="dn" />
			<img src="/animation/mani4.png" id="mani4" class="dn" />
			<img src="/animation/mani5.png" id="mani5" class="dn" />
		</div>
		<div id="mani_right">
			<div id="mani_top"><?php img("/animation/manilogo.png");?></div>
			<div id="mani_bottom">
				<div id="menutxt"><?php img("/animation/manitxt.png");?></div>
				<div id="menubg"><?php img("/animation/manitxtbg.png");?></div>
			</div>
		</div>
	</div>
	<div id="mproduct">
		<div class="title"><?php img("/img/mproducttitle.png","최근 등록 상품");?></div>
		<div id="mproductimg">
		<?php
		$res = $db->query("select","product","","1=1 order by no desc limit 5");
		while($row = $db->fetch($res)){
		?>
			<ul>
				<li><a href="<?php echo "/".$row['main_id']."/sub3/view/".$row['no'];?>"><?php img("/file/thumb_".$row['wfile'],$row['name']);?></a></li>
				<li><?php echo $row['name'];?></li>
				<li class="cr fw"><?php echo number_format($row['price'])."원";?></li>
			</ul>
		<?php
		}
		?>
		</div>
	</div>
	<div id="msearch">
		<div class="title"><?php img("/img/msearchtitle.png","상품 검색");?></div>
		<div class="img"><?php img("/img/msearchtxt.png","Search &amp; Click 클릭하나로 원하는 상품을 찾으세요");?></div>
		<form action="/search/search" method="post" onsubmit="return frmchk('search');">
			<div class="input"><?php $input->input("text","schText");?></div><div class="submit"><?php $input->input("submit","검색");?></div>
		</form>
	</div>
	<div id="mboard">
		<div class="title"><?php img("/img/mboard.png","공지사항");?></div>
		<?php
		$res = $db->query("select","board","","main_id='main8' and sub_id='sub0' order by no desc limit 4");
		while($row = $db->fetch($res)){
			$row2 = $db->fetarr("select * from member where no='$row[name]'");
		?>
		<ul>
			<li><a href="/main8/sub0/view/<?php echo $row['no'];?>"><?php echo strcut($row['subject'],0,40);?></a></li>
			<li><?php echo wdate($row['wdate'])." | By ".$row2['name'];?></li>
		</ul>
		<?php
		}
		?>
	</div>
	<div id="mbn"><?php img("/img/mbn.png");?></div>
</div>