<?php 
include("include/connection.php");


if(!isset($_SESSION['admin_name']))
  {
    header("Location:login.php");
    exit;
  }

function creatpost($id,$imegeurl,$decr,$titel,$chambre,$surface,$adresse,$description,$datepub,$prix,$ville )
{
$postp ='<div class="item">
        <div class="thumb-item">
            <a href="details.php?id='.$id.'">
                <img src="'.$imegeurl.'" alt="'.$decr.'" title="'.$decr.'">
            </a>
        </div>   
        <div class="body-item">
        
				<h2 class="SpremiumH2">
					<a href="details.php?id='.$id.'">'.$titel.'</a></h2>
				<div>
					<h4>'.$chambre.' chambres, '.$surface.' m²</h4>
				</div>
				<h3>'.$adresse." in ".$ville.'</h3>
				<p>'.$description.'</p>
				<div class="controlBar">
					<span class="SpremiumDetails iconPadR">'.$datepub.'</span>
				</div>
                <div class="edit-item">
                <ul>
                    <li>
                        <a type="button" class="btn btn-warning btn-sm" href="delete_post.php?id='.$id.'" >delete</a>
                        
                    </li>
                   
                </ul>
                </div>
			</div>
        </div>';
    
    echo $postp;
}

$sqlnumpost='SELECT COUNT(*) FROM maisan where iduser = '.$_SESSION['iduser'].';';
$numpost = mysqli_fetch_row(mysqli_query($mysqli, $sqlnumpost));

$sqlvu='SELECT sum(vues) from vu WHERE idmaisan in (SELECT idmaisan FROM maisan WHERE iduser = '.$_SESSION['iduser'].');';
$vu = mysqli_fetch_row(mysqli_query($mysqli, $sqlvu));
	
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
    /*-------top-continer---*/
    .top-continer{
        width: 100%;
        position: relative;
        background: #eee;
        overflow: hidden;
    }
    
   
    /*-------header-top-*/
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
    /*--------card------*/
    .col {
        float: left;
        padding-right: 30px;
        padding-left: 30px;
    }
    .col1 {
       
        float: left;
    }
    .col2 {
        float: right;
        margin: 28px;
    }
    
    .card-banner {
    width: 100%;
    position: static;
    overflow: auto;
    display: block;
    border-radius: 4px;
    transition: all 0.2s ease;
        margin: 25px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    color: rgba(0,0,0, 0.87);
    }
    
    
    .card-banner .card-body {
    padding: 0px;
    }
    
    .card-banner .card-body .icon {
    position: absolute;
    
    /*transform: translate(0, -50%);*/
    font-size: 3em;
    color: #444;
    z-index: 0;
    padding: 10px;
    height: 42px;
    width: 45px;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: center;
    border-radius: 90px;
    margin-left: 10px;
    }
    .card-banner .card-body .content {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    text-align: right;
    position: relative;
    width: 100%;
    padding: 10px 10px 10px 100px;
    z-index: 100;
    }
    .card-banner .card-body .content .title {
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    text-transform: none;
    }
    .card-banner .card-body .content .value {
    font-size: 3.5em;
    line-height: 3rem;
    font-weight: 600;
    padding-top: 10px;
    color: #fff;
    }
    
    .card-banner .card-body .content .value .sign {
    font-size: 0.4em;
    font-weight: 300;
    margin-right: 5px;
    opacity: 0.85;
    }
    .card-blue-light .card-body .icon {
    color: #43a047;
    background: #ffffff;
    }
    .card-blue-light {
    background: linear-gradient(60deg,#66bb6a,#43a047);
    }
    
    /*--------continer------*/
    .continer {
        width: 1200px;
    }
    
    .item {
    width: 80%;
    background: #eee;
    overflow: hidden;
    margin-top: 20px;
    }
    
    .thumb-item {
    float: left;
    width: 35%;
    height: 232px;
    margin-right: 17px;
    }
    
    .thumb-item img {
    height: 100%;
    width: 100%;
    }
    
    .body-item {
    float: left;
    width: 61%;
    margin-top: 40px;
    }
    
    /*--------edit-item------*/
    .edit-item ul li {
    float: left;
    padding-right: 15px;
    padding-top: 12px;
    }
    .controlBar {
    text-align: right;
    }
    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
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
        
        <div class="controler">
            
        <div class="col">
            <a href="#" class="card-banner card-blue-light">
                <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
                    <div class="content">
                        <div class="title">post</div>
                        <div class="value"><span class="sign"></span><?php echo $numpost[0]; ?></div>
                    </div>
                </div>
            </a> 
        </div>
         <div class="col1">
            <a href="#" class="card-banner card-blue-light">
                <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
                    <div class="content">
                        <div class="title">total vu</div>
                        <div class="value"><span class="sign"></span><?php echo $vu[0]; ?></div>
                    </div>
                </div>
            </a> 
        </div>  
            
            <div class="col2">
            <a href="add-post-form.php" class="card-banner card-blue-light">
                <div class="card-body"> <i class="icon">+</i>
                    <div class="content">
                        <div class="title">add new post</div>
                    </div>
                </div>
            </a> 
        </div> 
         
        </div>
    </div>
    
    <div class="continer">
    
   
        <?php 
        
        $sql = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville FROM maisan m inner join  photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join villes v on v.idville = m.idville  where iduser ='.$_SESSION['iduser'].' ;';
        
         $result = mysqli_query($mysqli, $sql);
        
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {   
            creatpost( $row["idmaisan"],'img/'.$row["urlphoto"],$row["decr"],$row["titel"],$row["chambre"],$row["surface"],$row["adresse"],$row["description"],$row["datepub"],$row["prix"],$row["ville"]);
            }
         } else {
            echo "0 results";
         }
         mysqli_close($mysqli);
        
        
        	
        ?>
        
      
    </div>
      
</body>

</html>
