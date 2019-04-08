<div id="con_area">
	<div id="con_left">
		<?php
		include("./page/main_login.php");
		include("./page/category.php");
		?>
	</div>
	<div id="con_right">
		<div id="con_right_top"></div>
		<div id="con_right_middle">
			<?php
			if(!empty($sdt)){
				include("./include/".$sdt['type'].".php");
			}else{
				include("./include/board.php");
			}
			?>
		</div>
		<div id="con_right_bottom"></div>
	</div>
</div>