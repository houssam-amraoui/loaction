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
            
            $qry2= "insert into reserver (idmaisan, iduser, date_debut , date_fin) values (".$id.",".$_SESSION['iduser'].",'2020-01-01','2020-01-01');";
            mysqli_query($mysqli,$qry2);
            
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
  /* Minified CSS Reset */
  html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;vertical-align:baseline;}
  article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}
  body{line-height:1;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}table{border-collapse:collapse;border-spacing:0;}
  html{box-sizing:border-box}*,:after,:before{box-sizing:inherit}body{font-family:Circular,"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.43;color:#484848;background-color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;padding:0;margin:0}::placeholder{color:#767676!important;opacity:1}:-ms-input-placeholder{color:#767676!important}::-ms-input-placeholder{color:#767676!important}a{text-decoration:none;color:#008489}.screen-reader-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.screen-reader-only-focusable:focus{clip:auto;height:auto;margin:0;overflow:visible;position:static;width:auto}.skip-to-content:focus{background-color:#fff;font-size:18px;padding:0 24px;position:absolute;left:3px;line-height:64px;top:3px;z-index:10000}#checkin_input,#checkout_input{color:#484848!important;font-weight:600!important;font-size:16px!important}[data-ghost="ghost"] #checkin_input,[data-ghost="ghost"] #checkout_input{font-weight:400!important}[data-ghost="ghost"] button{font-size: 16px !important}#marqueeImage{opacity:1!important}.flatpickr-months .flatpickr-month{overflow:initial}.flatpickr-months{padding-top:4px;padding-bottom:8px}.flatpickr-weekday{font-weight:400}.flatpickr-months .flatpickr-next-month,.flatpickr-months .flatpickr-prev-month{padding:16px 10px}#checkin_input,#checkout_input,.flatpickr-mobile{min-height:46px}.flatpickr-mobile:before{content:attr(placeholder);color:#aaa;margin-right:.5em}.flatpickr-mobile:focus:before{content:""}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:400;font-display:swap}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:600;font-display:swap}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:800;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Bold-bdfb98485e7836ba31b456f65cded088.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Bold-a188841af78481a25b7bb2316a5f5716.woff") format("woff");font-weight:800;font-style:normal;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Medium-50fc004b3082375f12ff0cfb67bf8e56.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Medium-4bc8dafd2e0fd8914bf4d5edce9acd24.woff") format("woff");font-weight:600;font-style:normal;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Book-9a1c9cca9bb3d65fefa2aa487617805e.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Book-aa38e86e3f98554f9f7053d7b713b4db.woff") format("woff");font-weight:400;font-style:normal;font-display:swap}
</style>
    
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
    
    .top-continer{
        width: 100%;
        position: relative;
        background: #eee;
        overflow: hidden;
    }
     
     .header-top {
        height: 34px;
        background: #16a085;
    }
    #menu-top {
    float: right;
    padding-right: 10%;
    }
    #menu-top1{
        float: left;
        padding-left:4%;
    }
    #menu-top ul li,#menu-top1 ul li {
    float: left;
    }
    #menu-top ul li a,#menu-top1 ul li a
    {
    color: #fff;
    display: block;
    padding: 0 10px;
    font-size: 12px;
    line-height: 34px;     
    }

</style>
</head>
<body>
    <div class="top-continer">
    <nav class="header-top">
            <div id="menu-top">
                <ul>
                    <li>
                        <a href="profile-form.php">profile</a>
                    </li>
                    
                    <li>
                        <a href="logout.php">Deconnexion</a>
                    </li>
                </ul>
            </div>
            <div id="menu-top1">
                <ul>
                    <li>
                        <a href="profile-form.php">hello <?php echo $_SESSION['admin_name']; ?></a>
                    </li>
                     <li>
                        <a href="accueil.php">Search</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
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
                          <div class="fileupload_img"><img type="image" src="img/gallery.png" alt="profile image" style="width: 100px;height: 100px"></div>
                        	                        
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
                        <option value="1" >1 chambre</option>
                        <option value="2" >2 chambre</option>
                        <option value="3" >3 chambre</option>
                        <option value="4" >4 chambre</option>
                        <option value="5" >5 chambre</option>
                        <option value="6" >6 chambre</option>
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

