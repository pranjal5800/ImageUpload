<?php
	$con=mysqli_connect("localhost", "root", "","ass1");
	
	if(isset($_REQUEST['sub'])){
		if(isset($_FILES['img_uploader'])){
			
			
			$file=$_FILES['img_uploader'];
			$file_name=$file['name'];
			$temp_filename=$file['tmp_name'];
			$file_size=$file['size'];
			$file_error=$file['error'];
			
			$file_ext=explode('.',$file_name);
			$file_ext=strtolower(end($file_ext));
			$allowed_file_types=array('jpg','png','jpeg');
		}
		else{
			echo"<h3>*Select Image To Upload</h3>";
		}
		
		if(in_array($file_ext,$allowed_file_types)){
			if($file_error==0){
				if($file_size<=1000000){
					$file_new_name=uniqid('',true) . '.' .$file_ext;
					$file_destination='images/' . $file_new_name;
					if(move_uploaded_file($temp_filename,$file_destination)){
						$query="INSERT INTO `ass1`.`img_upload` (`Id`, `Path`) VALUES (NULL, '".$file_destination."')";
						mysqli_query($con,$query);
					}
				}else{
					echo"<h3>*Image size should b less than 1mb</h3>";
				}
			}else{
			echo"<h3>*Somwthing Went Wrong</h3>";
			}
		}else{
			echo"<h3>*Not a Valid Image File</h3>";
		}
			
	}
	if(isset($_REQUEST['Del'])){
		if(isset($_REQUEST['selected_image'])){
			$images=$_REQUEST['selected_image'];
			foreach($images as $img_id){
				$insert_query="DELETE FROM `img_upload` WHERE `Id`=".$img_id;
				mysqli_query($con,$insert_query);	
			}	
		}
		else{
			echo "Please select any image to delete";
		}
		
	}	
?>
<style type="text/css">
.container {
    height: 500px;
    width: 580px;
    display: -webkit-inline-box;
    border: 1px solid black;
	overflow-y:scroll;
	float:left;
}
img.img {
    height: 150px;
    width: 150px;
    padding: 5px;
}
</style>


<form method="post" action="#" enctype="multipart/form-data">
	<div class="container">
		<?php
            $selquery="select * from img_upload";
            $result=mysqli_query($con,$selquery);
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <img src=<?php echo $row['Path']?> class="img"></img>
        <input type="checkbox" name="selected_image[]" value=<?php echo $row['Id']?>></input>
        <?php		
            }
        ?>
	</div>

	<h1>Image Upload</h1>
	<input type="file" name="img_uploader"></input>
    <input type="submit" name="sub" value="Upload"></input>
    <input type="submit" name="Del" value="Delete Image"></input>
    
    <h1>Create Event</h1>
    <input type="text" name="event_name"></input>
    <input type="submit" name="create" value="Create"></input>
    <a href="Event_list.php">View Event List </a>
</form>
<?php
	if(isset($_REQUEST['create'])){
		$images=$_REQUEST['selected_image'];
		$event_name=$_REQUEST['event_name'];
		$insert="INSERT INTO `ass1`.`event` (`Event_Id`, `Event_name`) VALUES (NULL, '".$event_name."');";
		mysqli_query($con,$insert);
		$sel="select Event_Id from event where Event_name='".$event_name."'";
		$res=mysqli_query($con,$sel);
		while($r=mysqli_fetch_assoc($res)){
			$event_id=$r["Event_Id"];
		}
		foreach($images as $img_id){
			$insert_query="INSERT INTO `ass1`.`event_list` (`List_Id`, `Event_Id`, `Image_id`) VALUES (NULL, '".$event_id."', '".$img_id."')";
			mysqli_query($con,$insert_query);	
		}
		header("Location: Event_list.php");
	}
?>