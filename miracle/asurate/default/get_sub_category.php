<?php
session_start();
include '../include/config.php';

$organic_menu_id = $_POST['organic_menu_id_val'];

echo '<option selected="selected">Select a Sub Category</option>';

 $Get_Sub_Cat = mysqli_query($connect,"SELECT * from `sub_category` where status = '1' and organic_menu_id = '$organic_menu_id' ") 
 or die(mysqli_error($connect));

while($Fetch_Sub_Cat = mysqli_fetch_array($Get_Sub_Cat))
       
{

				$sub_category_id = $Fetch_Sub_Cat['sub_category_id'];
				$sub_category_name = $Fetch_Sub_Cat['sub_category_name'];
				echo '<option value="'.$sub_category_id.'">'.$sub_category_name.'</option>';

}


?>