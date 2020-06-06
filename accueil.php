<?php 
include("include/connection.php");



function creatpost($url,$imegeurl,$decr,$titel,$chambre,$surface,$adresse,$description,$datepub,$prix,$ville)
{
$postp ='<div class="item">
        <div class="thumb-item">
            <a href="'.$url.'">
                <img src="'.$imegeurl.'" alt="'.$decr.'" title="'.$decr.'">
                <span>'.$prix.' DH</span>
            </a>
        </div>   
        <div class="body-item">
        
				<h2 class="SpremiumH2">
					<a href="'.$url.'">'.$titel.'</a></h2>
				<div>
					<h4>'.$chambre.' chambres, '.$surface.' m²</h4>
				</div>
				<h3>'.$adresse." in ".$ville.'</h3>
				<p>'.$description.'</p>
				<div class="controlBar">
					<span class="SpremiumDetails iconPadR">'.$datepub.'</span>
					
				</div>
			</div>
        </div>';
    
    echo $postp;
}
	
function showtoolbar(){
    if(isset($_SESSION['admin_name']))
    {
   echo '<div id="menu-top">
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
                        <a href="profile-form.php">hello '.$_SESSION['admin_name'].'</a>
                    </li>
                     <li>
                        <a href="home.php">home</a>
                    </li>
                </ul>
            </div>';
    }else
    {
    echo '<div id="menu-top">
                <ul>
                    <li >
                        <a href="help">Aide</a>
                    </li>
                    <li>
                        <a href="registre.php">Inscription</a>
                    </li>
                    <li>
                        <a href="login.php">Connexion</a>
                    </li>
                </ul>
            </div>
            <div id="menu-top1">
                <ul>
                    <li>
                        <a href="home.php">home</a>
                    </li>
                </ul>
            </div>';
    }
    
    
    
}

?> 

<!DOCTYPE html>
<html>

<head>
  
    <title>locations  Maroc</title>
   
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
        height: 380px;
        position: relative;
    }
    
    
    /*-------imgh-*/
    
    .himg {
        z-index: -1;
        height: 100%;
        width: 100%;
        position: absolute;
    }
    .himg img {
        height: 100%;
        width: 100%;
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
    
    /*----card-----*/
    .card {
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    display: table;
    background: #fff;
    margin-top: 50px;
    padding: 40px;
    margin-left: 10%;
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
        position: relative;
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
    
   
    .controlBar {
    text-align: right;
    }
    
    .thumb-item span {
    position: absolute;
    top: 25px;
    right: -9px;
    background: #16a085;
    border-radius: 15px;
    padding: 3px 9px;
    color: #fff;
    font-weight: bolder;
}
    
    </style>

</head>

<body>
    
    <!--if(isset($_SESSION['admin_name']))
  {
    header("Location:home.php");
    exit;
  }-->
    
    <div class="top-continer">
        <div class="himg">
            <img  src="https://a0.muscache.com/4ea/air/r:w775-h300-sfit,e:fjpg-c70/pictures/c49d2d28-c0ae-484b-9db9-0dc93a5e1cd4.jpg" >
        </div>
        
        <nav class="header-top">
           <?php showtoolbar(); ?>
        </nav>
        
        <div class="card">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Registration Info</h2>
                <form method="POST">
                    
                    <p>ou </p>
                    <select name="ville" required >
                        
                        <?php 
        
                        $sql = 'SELECT * from villes';
                        $result = mysqli_query($mysqli, $sql);
        
                        while($row = mysqli_fetch_assoc($result)) {
                
                            echo '<option value="'.$row["idville"].'" '.((isset($_POST["ville"]) && $_POST["ville"] == $row["idville"]) ? "selected" : "").' > '.$row["ville"].'</option>';
                            
                            
                        }
                        ?>
                    </select>
                    
                    <p>surface</p>
                    <input type="number" placeholder="Minimum" name="sumin" value="<?php if(isset($_POST["sumin"])) echo $_POST["sumin"]; ?>">
                    <input type="number" placeholder="Maximum" name="sumax" value="<?php if(isset($_POST["sumax"])) echo $_POST["sumax"]; ?>">
                    
                    <p>prix</p>
                    <input type="number" placeholder="Minimum" name="prmin" value="<?php if(isset($_POST["prmin"])) echo $_POST["prmin"]; ?>" >
                    <input type="number" placeholder="Maximum" name="prmax" value="<?php if(isset($_POST["prmax"])) echo $_POST["prmax"]; ?>">
                    <p>nombre de chambre</p>
                    <select name="chambre" >
                        <option disabled="disabled" selected="selected">chambre</option>
                        <option value="1" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "1") ? "selected" : ""); ?>>1 ou plus</option>
                        <option value="2" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "2") ? "selected" : ""); ?>>2 ou plus</option>
                        <option value="3" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "3") ? "selected" : ""); ?>>3 ou plus</option>
                        <option value="4" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "4") ? "selected" : ""); ?>>4 ou plus</option>
                        <option value="5" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "5") ? "selected" : ""); ?>>5 ou plus</option>
                        <option value="6" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "6") ? "selected" : ""); ?>>6 ou plus</option>
                    </select>
                    
                    <br/>
                          
                    <button type="submit" name="submit">Search</button>
                    
                    </form>
                </div>
            </div>
        
    </div>
    
    <div class="continer">
    
   
        <?php 
        
        $sql = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville FROM maisan m inner join  photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join villes v on v.idville = m.idville ORDER BY datepub desc limit 50  ';
        
        if(isset($_POST["submit"])){
            
            $sql = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr FROM maisan m inner join  photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join villes v on v.idville = m.idville where v.idville = '.$_POST["ville"].' and (surface between '.(($_POST["sumin"] == "") ? "0" : $_POST["sumin"]).' and 
            '.(($_POST["sumax"] == "") ? "1000" : $_POST["sumax"]).') and  (prix between '.(($_POST["prmin"] == "") ? "0" : $_POST["prmin"]).' and '.(($_POST["prmax"] == "") ? "10000" : $_POST["prmax"]).') and chambre >= '.$_POST["chambre"].' ORDER BY datepub desc limit 50 ';
            echo $sql;
            /*$str = 'In My Cart : 11 items';
            $int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
            make sision an quiry
            */
        }
        
        
        
         $result = mysqli_query($mysqli, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                creatpost('details.php?id='. $row["idmaisan"],'img/'.$row["urlphoto"],$row["decr"],$row["titel"],$row["chambre"],$row["surface"],$row["adresse"],$row["description"],$row["datepub"],$row["prix"],$row["ville"]);
            }
         } else {
            echo "0 results";
         }
         mysqli_close($mysqli);
        
        
        	
        ?>
      
    </div>
    
    
   </body >
   </html>