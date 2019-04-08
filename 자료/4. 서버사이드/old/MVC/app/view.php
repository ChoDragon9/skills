<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WorldSkills Statistics</title>
<style type="text/css">
<!--
/* Classes for feedback messages */
.ok {
	background-color: #e8ffd8;
	border: 1px solid #006d00;
	padding: 5px 10px;
	width: 365px;
}

p {
	background-color: #ffd8d8;
	border: 1px solid #e50000;
	padding: 5px 10px;
	width: 365px;
	border-radius:5px;
	font-weight:bold;
	padding:10px;
}
* { font-family:Century Gothic; }  
table { border-collapse:collapse; table-layout:fixed; }
td { padding:10px; }
thead th { background-color:rgb(0,95,190); padding:10px; color:#fff; border-color:#000; font-weight:normal; }
tr:nth-child(even) { background-color:#ededed; }
-->
</style>
</head>

<body>
<h1>WorldSkills Statistics</h1>
<div id="MedalsByCountry">
  <h2>Medals by country over the years</h2>
  <form action="" method="post">
    <select name="post_con1">
      <option value="">Select a country</option>
	  <?php
	  foreach($con1_opt as $con1){
		  echo '<option value="'.$con1['iso'].'" '.$con1['chk'].'>'.$con1['iso'].' - '.$con1['country'].'</option>';
	}
	  ?>
    </select>
	<button type="submit">Show</button>
	<span class="message"></span>
	<?php
	echo $table_err;
	?>
  </form>
  <table id="MedalsByCountryTable" border="1" align="left" summary="Select the country with the dropdown above">
    <caption style="visibility:hidden">
    Medals by country over the years
    </caption>
    <thead>
      <tr bgcolor="#CCCCCC">
        <th>Trade</th>
        <th>2007</th>
        <th>2009</th>
        <th>2011</th>
      </tr>
    </thead>
    <tbody>
	<?php
	foreach($result as $trade=>$year_list){
	?>
		<tr>
			<td><?php echo $trade;?></td>
			<?php
			foreach($year_order as $year){
				echo '<td>';
				if(array_key_exists($year,$year_list)){
					echo $year_list["$year"];
				}
				echo '</td>';
			}
			?>
		</tr>
	<?php
	 }
	?>
    </tbody>
  </table>
</div>

<br clear="all">

<div id="PerformanceOverYears">
  <h2>Performance by trade over the years</h2>
  <form action="" method="post">
    <select name="post_trade">
      <option value="">Select a trade</option>
	<?php
	foreach($trade_opt as $trade){
		  echo '<option value="'.$trade['number'].'" '.$trade['chk'].'>'.$trade['number'].' - '.$trade['name_en'].'</option>';
	}
	?>
    </select>
    <select name="post_con2">
      <option value="">Select a country</option>
	  <option value="all" <?php echo $all_country_chk;?>>All Countrys</option>
	  <?php
	  foreach($con2_opt as $con2){
		  echo '<option value="'.$con2['iso'].'" '.$con2['chk'].'>'.$con2['iso'].' - '.$con2['country'].'</option>';
	}
	  ?>
    </select>
    <button type="submit">Show</button>
  </form>
  <?php
  echo $diagram;
  ?>
</div>

</body>
</html>
