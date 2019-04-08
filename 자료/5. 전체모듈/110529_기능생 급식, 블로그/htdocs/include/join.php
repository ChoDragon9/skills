<div id="join">
<form action="<?=$index?>/join_ok" method="post">
	<ul>
		<li><input type="text" value="" name="name" style="height:20px;width:150px;" /></li>
		<li><input type="text" value="" name="id" style="height:20px;width:150px;" /></li>
		<li><input type="password" value="" name="pwd" style="height:20px;width:150px;" /></li>
		<li>
			<select name="job" style="height:20px;">
				<option value="mechatronics">메카트로닉스</option>
				<option value="cad">CAD</option>
				<option value="mobilerobot">모바일로보틱스</option>
				<option value="electrical">전기기기</option>
				<option value="infortech">정보기술</option>
				<option value="inforandcom">컴퓨터정보통신</option>
				<option value="gamedevelop">게임개발</option>
				<option value="webdesign">웹디자인</option>
				<option value="productdesign">제품디자인</option>
				<option value="animation">애니메이션</option>
			</select>
		</li>
		<li><input type="submit" value="회원가입" style="width:70px;height:25px;" />&nbsp;<input type="button" value="취소" onclick="history.back();" style="width:70px;height:25px;" /></li>
	</ul>
</form>
</div>