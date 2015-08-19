<?php 
	$con=mysqli_connect("localhost", "root", "","ass1");
	$event_id=$_REQUEST['event_id'];
	$images=array();
	$query="SELECT `Image_id` FROM `event_list` WHERE `Event_Id`=".$event_id;
	$result=mysqli_query($con,$query);
	
	while($row=mysqli_fetch_assoc($result)){
		$images[]=$row["Image_id"];	
	}
	$query="SELECT `Event_name` FROM `event` WHERE `Event_Id`=".$event_id;
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_assoc($result)){
		$event_name=$row["Event_name"];	
	}
?>	
	<h1>Event: <?php echo $event_name?><h1>
	<div class="container">
			<?php
				foreach($images as $id){
				$selquery="select * from img_upload where Id=".$id;
				$result=mysqli_query($con,$selquery);
				while($row=mysqli_fetch_assoc($result)){
			?>
			<img src=<?php echo "/imageupload/".$row['Path']?> class="img"></img>
			<?php		
				}
			}
			?>
           
	</div>
<style type="text/css">
.container {
    height: auto;
    width: 514px;
    display: -webkit-inline-box;
    border: 1px solid black;
    overflow-y: scroll;
    float: left;
}
img.img {
    height: 150px;
    width: 150px;
    padding: 5px;
}
</style>