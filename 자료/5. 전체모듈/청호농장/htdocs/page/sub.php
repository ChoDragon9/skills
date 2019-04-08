<div id="scon">
	<div id="submenu">
		<div class="img"><?php img("/img/".$main_id."title.png",$mdt['title']);?></div>
		<?php
		$res = $db->query("select","menu","","main_id='$main_id' and type!='main' order by no asc");
		while($row = $db->fetch($res)){
			if($sub_id == $row['sub_id']){
				$class = "class='now'";
			}else{
				$class = "class='submenu'";
			}
		?>
		<div <?php echo $class;?> onclick="move('<?php echo "/".$row['main_id']."/".$row['sub_id'];?>');"><?php echo $row['title'];?></div>
		<?php
		}
		?>
	</div>
	<div id="sub_right">
		<div id="sani">
			<img src="/animation/sani1.png" id="sani1" />
			<img src="/animation/sani2.png" id="sani2" class="dn" />
			<img src="/animation/sani3.png" id="sani3" class="dn" />
			<img src="/animation/sani4.png" id="sani4" class="dn" />
			<img src="/animation/sani5.png" id="sani5" class="dn" />
		</div>
		<ul id="sub_title">
			<li><?php echo $sdt['title'];?></li>
			<li><?php echo $title;?></li>
		</ul>
		<div id="con_area">
		<?php
		if($sdt['type'] == "html"){
			echo nl2br($sdt['content']);
		}else{
			if(file_exists("./include/".$sdt['type'].".php")){
				include("./include/".$sdt['type'].".php");
			}else{
				echo $sdt['type'].".php 파일이 존재하지 않습니다.";
			}
		}
		?>
		</div>
	</div>
</div>