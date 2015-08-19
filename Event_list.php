<?php
	$con=mysqli_connect("localhost", "root", "","ass1");
	$query="select * from event";
	$result=mysqli_query($con,$query);
?>
<form method="post" action="#">
    <table border="1px">
    	<tr>
        	<td>
            	<Bold>Sr.</Bold>
            </td>
            <td>
            	<Bold>Event</Bold>
            </td>
            <td>
            	<Bold>View</Bold>
            </td>
        </tr>
    <?php
    	while($Row=mysqli_fetch_assoc($result)){
	?>
    	<tr>
        	<td>
            <?php echo $Row['Event_Id']?>
            </td>
            <td>
            <?php echo $Row['Event_name']?>
            </td>
            <td>
           		<a href=<?php echo "View.php?event_id=".$Row['Event_Id']?> >View </a>
            </td>
        </tr>
     <?php
		}
	 ?>
    </table>
</form>