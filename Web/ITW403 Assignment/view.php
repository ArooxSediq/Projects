<!DOCTYPE html>
<html lang="en">
<head>
  <title>View</title>
  <style type="text/css">
  
    #comments
    { 
      padding: 10px;
      background-color: #F0F0F0;
    }

    
  
  </style>
  
  <?php 
	include_Once('auth.php');
  ?>
  
  <?php

   include_Once('Database.php');
   @ $dbObject = new Database('localhost', 'root', '', 'galleriawebsite');
    $db = $dbObject->CreateConnection();
     $query = 'select * from comment';
     $result = $db ->query($query);
     $rows = $result->fetch_all();
  ?>

</head>
<body>



<div class="container" id="container">

<img class="img-responsive" width="90%" src="<?php echo $_GET['V']; ?>" alt="" style="margin:25px;">
<div id="img_details">
	
</div>

<div name="comments" id="comments">
<?php  
	
 for ($i=0; $i < $result->num_rows; $i++) { 

    $comment = $rows[$i][0];
    $username = $rows[$i][1];
    $date = $rows[$i][2];
    $img_link=$rows[$i][3];
   
   if($img_link==$_GET['V'])
   {
    echo "
          <div>
    	    <h3 >".$username."  </h3>
    	    <p>".$comment."</p>
    	    <p>".$date."</p>
    	    </div>
        ";
    }
}

?>


</div>

   <form style=" padding-top:50px; " action="add_comment.php?V=<?php echo $_GET['V']; ?>" method="POST" enctype="multipart/form-data">

          <div class="form-row">
          
            <div class="form-group col-md-6">
            	<h3 style="margin-bottom:20px;">Leave a comment</h3>
            <div class="form-group">
               <label for="desc">comment:</label>
               <textarea class="form-control" rows="3" name="comment"></textarea>
            </div>

            </div>

        </div>
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

</body>
</html>