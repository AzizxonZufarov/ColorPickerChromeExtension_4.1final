<? include "bd.php";
$page = $_POST['page'];
$color_code = $_POST['color_code'];
$element_type = $_POST['element_type'];
$res = mysqli_query($con,"INSERT INTO colors (page, color_code, element_type) VALUES('$page', '$color_code', '$element_type')");
header("location:../index.html");
