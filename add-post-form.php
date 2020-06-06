<?php 
include("include/connection.php");
include("include/msg.php");

if(!isset($_SESSION['admin_name']))
  {
    header("Location:login.php");
    exit;
  }

if(isset($_POST["submit"])){
    
    $images = $_FILES["images"];
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	$surface = filter_input(INPUT_POST, 'surface', FILTER_SANITIZE_STRING);
    $chambre = filter_input(INPUT_POST, 'chambre', FILTER_SANITIZE_STRING);
	$prix = filter_input(INPUT_POST, 'prix', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
    
	 if ($ville!='0' || $chambre!='0'){
		$qry="insert into maisan (adresse, surface,chambre,prix ,titel ,description ,datepub ,iduser ,idville )  values ('$address',$surface,$chambre,$prix,'$title','$description',NOW(),".$_SESSION["iduser"].",$ville);";
        
		if(!mysqli_query($mysqli,$qry)){
            $_SESSION['msg'] = mysqli_error($mysqli);
            
        }else{
            $id = mysqli_insert_id($mysqli);     
            $qry1= 'insert into vu (idmaisan,vues )  values ('.$id.',1);';
            mysqli_query($mysqli,$qry1);
             for($i = 0; $i < count($images["name"]); $i++){
                $dst =time().rand(0,999)."_".$_SESSION['iduser']."_".$images["name"][$i];
                move_uploaded_file($images["tmp_name"][$i],"img/".$dst);
                 
                $qry1="insert into photos (idmaisan,urlphoto, decr)  values ($id,'$dst','".substr($images["name"][$i],0,-4)."');";
                mysqli_query($mysqli,$qry1);
             }
                header("Location:home.php");

            
        }	
		}else{
        $_SESSION['msg']= $client_msg['22'];
     }
    
    
}
	
	  
	


?> 


<html>
<head>
    
<style>
    .row {
    margin-right: 0px;
    margin-left: 0px;
    }
    
    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
    }
    
    .col-md-12 {
    float: left;
    width: 100%;
    }
    .card {
    display: inline-block;
    position: relative;
    width: 100%;
    margin: 25px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    border-radius: 6px;
    color: rgba(0,0,0, 0.87);
    background: #fff;
    }
    .page_title_block {
    width: 100%;
    float: left;
    display: block;
    border-bottom: 1px solid #dfe6e8;
    }
    .mrg-top {
    margin-top: 15px;
    }
    .card .card-body {
        padding: 30px 20px;
        margin-bottom: 30px;
    }
    .form-group{
        clear: both;
    }
    
    
    .col-md-3 {
    width:25%;
    
    }
    .col-md-6 {
    width: 50%;
    }

   .form-control {
    padding: 14px 15px;
    font-size: 1em;
    border: 1px solid #999;
    box-shadow: none;
    margin-bottom: 15px;
    display: block;
    width: 100%;
    line-height: 1.42857143;
    color: #555;
    border-radius: 5px;
    }
    .fileupload_block {
    border: 1px solid #999;
    padding: 10px;
    margin-bottom: 15px;
    float: left;
    width: calc(100% - 20px);
    border-radius: 7px;
    }
    .fileupload_block #fileupload {
    float: left;
    margin-top: 7%;
    }
    .fileupload_img {
    margin-top: 0px;
    display: inline-block;
    float: left;
    }

</style>
</head>
<body>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
		  <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">add new post</div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row mrg-top">
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                 
              </div>
            </div>
          </div>
          <div class="card-body mrg_bottom">
          	  
            <form action="" name="editprofile" method="post" class="form form-horizontal" enctype="multipart/form-data" >
              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">post Image </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                          <input type="file" name="images[]" id="fileupload" required multiple accept=".jpg, .png, .gif" />
                          <div class="fileupload_img"><img type="image" src="img/c1.jpg" alt="profile image" style="width: 100px;height: 100px"></div>
                        	                        
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">title </label>
                    <div class="col-md-6">
                      <input type="text" name="title"  class="form-control" required autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">description </label>
                    <div class="col-md-6">
                        
                        <textarea class="form-control" rows = "5" cols = "60" name = "description" autocomplete="off" required>Enter details here...</textarea>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">surface </label>
                    <div class="col-md-6">
                      <input type="number" name="surface"  class="form-control" required autocomplete="off">
                    </div>
                  </div>                 
                    <div class="form-group">
                    <label class="col-md-3 control-label">nembre de chambre </label>
                    <div class="col-md-6">
                        <select name="chambre" class="form-control" required >
                        <option value="" disabled="disabled" selected="selected">chambre</option>
                        <option value="1" >1 ou plus</option>
                        <option value="2" >2 ou plus</option>
                        <option value="3" >3 ou plus</option>
                        <option value="4" >4 ou plus</option>
                        <option value="5" >5 ou plus</option>
                        <option value="6" >6 ou plus</option>
                    </select>
                        
                    </div>
                  </div> 
                    <div class="form-group">
                    <label class="col-md-3 control-label">prix </label>
                    <div class="col-md-6">
                      <input type="number" name="prix" class="form-control" required autocomplete="off">
                    </div>
                  </div> 
                    <div class="form-group">
                    <label class="col-md-3 control-label">Address </label>
                    <div class="col-md-6">
                      <input type="text" name="address"  class="form-control" required autocomplete="off">
                    </div>
                        
                  </div> 
                    <div class="form-group">
                    <label class="col-md-3 control-label">ville </label>
                    <div class="col-md-6">
                        <select name="ville" class="form-control" required >
                        <option value="" disabled selected >ville</option>
                        <?php 
                        $sql = 'SELECT * from villes';
                        $result = mysqli_query($mysqli, $sql);
        
                        while($row = mysqli_fetch_assoc($result)) {
                
                            echo '<option value="'.$row["idville"].'" > '.$row["ville"].'</option>';
                        }
                        ?>
                    </select>
                        <div class="alert">
                            alert
                        </div>
                        
                    </div>
                        
                  </div> 
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">add</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
              
          </div>
        </div>
      </div>
    </div>
</body>
</html>

