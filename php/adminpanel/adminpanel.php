<?
session_start();
include "../bd.php";
if ($_SESSION["id"] != 1)
 {
	header("location:enter.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/adminpanel.css">
	<title>Enter</title>
</head>

<body>
<target value = '1'> 1 </target>
	<target value = '2'> 2 </target>
<section>
<div class="container">
		<div class="row">
			<div class="col-md-10">
 				<h2><strong>ColorPicker</strong> Admin Panel</h2>
			</div>
			<div class="col-md-2">
 				<a href="logout.php" style="float:right; margin-top:20px" class="btn btn-default">EXIT</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
			<h2><strong>Popular Sites</strong></h2>
				<?$res = mysqli_query($con,"SELECT c AS site, COUNT(*) as total FROM (SELECT LEFT(REPLACE(REPLACE(REPLACE(page,'https://', ''), 'www.', ''),'http://', ''), INSTR(REPLACE(REPLACE(REPLACE(page,'https://', ''), 'www.', ''),'http://', ''), '/')-1) AS c FROM colors) sub WHERE c is not null GROUP BY c ORDER BY 2 DESC LIMIT 10");
				$row = mysqli_fetch_assoc($res);?>
					<div class="table-responsive">
						<table text-align="center" class="table table-bordered" >
							<thead>
								<tr style="text-align:center">
										<td>№</td>
										<td>Page</td>
										<td>Count</td>
								</tr>
							</thead>
							<tbody>
								<?$i = 0;
								do {$i++;?>
								<tr style="text-align:center">
										<td><?=$i?></td>
										<td><?=$row['site']?></td>
										<td><?=$row['total']?></td>
								</tr>
								<?}while($row = mysqli_fetch_assoc($res))?>
							</tbody>						
						</table>
					</div> 				
			</div>
			<div class="col-md-9 ">
				<h2><strong>Popular Colors</strong></h2>
				<?$res = mysqli_query($con,"SELECT color_code, COUNT(*) as total FROM colors  WHERE color_code is not null GROUP BY color_code ORDER BY 2 DESC LIMIT 10");
				$row = mysqli_fetch_assoc($res);?>
				<div class="popular_colors">
					<div class="row">
						<?do {?>
							<div id="color_blocks" style="background-color:<?=$row['color_code']?>">
								<div class="center_text"><?=$row['color_code']?></div>
							</div>
						<?}while($row = mysqli_fetch_assoc($res))?>
					</div>
				</div>					
			</div>
		</div>

		<div class="row">
			<?
			$res = mysqli_query($con,"SELECT * FROM colors ORDER BY `id` DESC");
			$row = mysqli_fetch_assoc($res);
			?>
			<div class="table-responsive">
				<table text-align="center" class="table table-bordered" id="dataTable">
					<thead>
						<tr style="text-align:center">
								<td>Page</td>
								<td>Color</td>
								<td>Color code</td>
								<td>Element type</td>
								<td>Date and time</td>
						</tr>
					</thead>
            		<tbody>
						<?do{
							switch ($row['element_type']) {
								case "IMG":
									$element_type = "Picture";
									break;
								case "VIDEO":
									$element_type = "Video";
									break;
								default:
									$element_type = "CSS/HTML";;	
							}?>
						<tr class="item" style="text-align:center">
								<td><a href="<?=$row['page']?>" target="_blank"><?=$row['page']?></a></td>
								<td id="bg_hex_<?=$row['id']?>"><div style="background-color:<?=$row['color_code']?>" id="result_panel"></div></td>
								<td id="hex_code_<?=$row['id']?>"  target = "<?=$row['id']?>"><?=$row['color_code']?></td>
								<td><?=$element_type?></td>
								<td><?=$row['datetime']?></td>
						</tr>
						<?}while($row = mysqli_fetch_assoc($res));?>
						</tbody>
												
				</table>
				<ul class="pagination example"></ul>

			</div>
		</div>
</div>

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/pagination.js"></script>
<script language="javascript" type="text/javascript" defer>
	$('.example').rpmPagination({
		domElement:'.item',
		limit: 20
	});

	function hexToRgb(hex) {
		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

		if(result){
			var r= parseInt(result[1], 16);
			var g= parseInt(result[2], 16);
			var b= parseInt(result[3], 16);
			return "rgb(" + r + "," + g + "," + b + ")";//return 23,14,45 -> reformat if needed 
		} 

		return null;
	}

	function change_text() {
			const incList = document.querySelectorAll("[id ^=\'hex_code_\']");
			[].forEach.call(incList, function(element) {
				const tID = element.getAttribute("target");
				let hex_value = document.getElementById("hex_code_"+tID).innerHTML;
				let rgb = hexToRgb(hex_value);
				document.getElementById("hex_code_"+tID).innerHTML += "<br />" + rgb;
			});	
	}
window.onload=change_text;
</script>
</body>
</html>



