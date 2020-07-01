<?php 
include("include/connection.php");


if(isset($_COOKIE["emaile"])&& !isset($_SESSION['admin_name']) ) {
    
  $qry="select * from users where email='".$_COOKIE["emaile"]."' and password='".$_COOKIE["passworde"]."'";
		 
		$result=mysqli_query($mysqli,$qry);	
    		if(mysqli_num_rows($result) > 0)
		{ 
			$row=mysqli_fetch_assoc($result);

			$_SESSION['iduser']=$row['iduser'];
		    $_SESSION['admin_name']=$row['firstname']." ".$row['lastname'];
            
            				
		}
}


function creatpost($id,$imegeurl,$decr,$titel,$chambre,$surface,$adresse,$description,$datepub,$prix,$ville,$idres,$date_debut,$date_fin)
{
    $isres = (date($date_fin) <= date("Y-m-d"));
    
$postp ='<div class="item">
        <div class="thumb-item">
            <a href= "details.php?id='.$id.'">
                <img src="'.$imegeurl.'" alt="'.$decr.'" title="'.$decr.'">
                <span>'.$prix.' DH</span>
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
                 <div class="addres">
                <label class="card-banner card-blue-light" >
                '.(($isres) ? 'disponible' : 'réserver de '.$date_debut.' a '.$date_fin).'
                
                
                </label>
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
    margin-top: 4px;
    padding: 36px;
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
    margin-left: 20px;

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
    .addres {
    float: right;
}
    .addres label {
    padding: 10px;
    color: #fff;
    font-size: 14px;
}
    .card-blue-light {
    background: linear-gradient(60deg,#66bb6a,#43a047);
}
    .card-banner {
    width: 100%;
    position: static;
    overflow: auto;
    display: block;
    border-radius: 4px;
    transition: all 0.2s ease;
    margin: 13px 0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    color: rgba(0,0,0, 0.87);
}
    
     /* footer----------------------*/
    
    body{ 
  display:flex; 
  flex-direction:column; 
}

    .site-footer {
    background: #16a085;
    width: 100%;
    height: 40px;
        margin-top:auto; 
        }
    .site-footer img {
    width: 100%;
    height: 100%;
        }
    .focon {
    width: 70px;
    float: left;
        }
    .site-footer p {
    text-align: center;
    line-height: 37px;
            color: #fff;
        }
    
    
    @media screen and (max-width: 1024px) {
        .thumb-item span {
            right: 12px;
        }
        .thumb-item {
            float: none; 
            width: 100%;
            margin-right: 0px;
        }
        
        .body-item {
            float: none;
            width: 93%;
            margin: auto;
            margin-top: 19px;
        }
        
        .item {
            width: 90%;
        }
        
        .continer {
            width: 100%;
        }
        
    
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
            <img  src="img/home.jpg" >
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
                        <option value="1" selected >1 ou plus</option>
                        <option value="2" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "2") ? "selected" : ""); ?>>2 ou plus</option>
                        <option value="3" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "3") ? "selected" : ""); ?>>3 ou plus</option>
                        <option value="4" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "4") ? "selected" : ""); ?>>4 ou plus</option>
                        <option value="5" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "5") ? "selected" : ""); ?>>5 ou plus</option>
                        <option value="6" <?php echo ((isset($_POST["chambre"]) && $_POST["chambre"] == "6") ? "selected" : ""); ?>>6 ou plus</option>
                    </select>
                    
                    <p>affichage</p>
                    <input type="checkbox"  name="nores" id="nores"  ><label for="nores"> Ne pas afficher les maison réserver</label>
                    
                    
                    <br/>
                      <br/>    
                    <button type="submit" name="submit">Search</button>
                    
                    </form>
                </div>
            </div>
        
    </div>
    
    <div class="continer">
    
   
        <?php 
        
        $sql = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville ,r.idres,r.date_debut , r.date_fin FROM maisan m inner join photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join reserver r on r.idres = ( SELECT idres FROM reserver re WHERE re.idmaisan = m.idmaisan ORDER BY date_fin DESC LIMIT 1) inner join villes v on v.idville = m.idville ORDER BY datepub desc limit 50';
        
        if(isset($_POST["submit"])){
            
            $sql = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville ,r.idres,r.date_debut , r.date_fin FROM maisan m inner join photos p on p.idphoto  = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join reserver r on r.idres = ( SELECT idres FROM reserver re WHERE re.idmaisan = m.idmaisan ORDER BY date_fin DESC LIMIT 1) '.((isset($_POST["nores"])) ? 'and r.date_fin < now()' : '').' inner join villes v on v.idville = m.idville where v.idville = '.$_POST["ville"].' and (surface between '.(($_POST["sumin"] == "") ? "0" : $_POST["sumin"]).' and 
            '.(($_POST["sumax"] == "") ? "1000" : $_POST["sumax"]).') and  (prix between '.(($_POST["prmin"] == "") ? "0" : $_POST["prmin"]).' and '.(($_POST["prmax"] == "") ? "10000" : $_POST["prmax"]).') and chambre >= '.$_POST["chambre"].' ORDER BY datepub desc limit 50 ';
        }

         $result = mysqli_query($mysqli, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
             creatpost($row["idmaisan"],'img/'.$row["urlphoto"],$row["decr"],$row["titel"],$row["chambre"],$row["surface"],$row["adresse"],$row["description"],$row["datepub"],$row["prix"],$row["ville"],$row["idres"],$row["date_debut"],$row["date_fin"]);
            }
         } else {
            echo "0 results";
         }
         mysqli_close($mysqli);	
        ?>
    </div>
    
<div class="site-footer">
    <div class="focon">
        <img src="img/home-logo.png">
    </div>  
    <p> &copy; 2020 Location Nord. All Rights Reserved</p>
</div>
    
   </body >
   </html>