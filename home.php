<!-- <a type="button" class="btn btn-warning btn-sm" href="delete_post.php?id='.$id.'" >delete</a>-->

<?php 
include("include/connection.php");


if(!isset($_SESSION['admin_name']))
  {
    header("Location:login.php");
    exit;
  }

function creatpost($id,$imegeurl,$decr,$titel,$chambre,$surface,$adresse,$description,$datepub,$prix,$ville,$idres,$date_debut,$date_fin )
{
    
 $isres = (date($date_fin) <= date("Y-m-d"));
    
$postp ='<div class="item">
        <div class="thumb-item">
            <a href="details.php?id='.$id.'">
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
                <div class="edit-item">
                <ul>
                    <li>
                    
                        <a href="#" type="button" class="btndel" onclick="confermdelete('.$id.')" >delete</a>
                    </li>
                   
                </ul>
                </div>
                <div class="addres">
                <a href = "'.(($isres) ? '#' : 'stop_reserve_db.php?idpost='.$id.'&reserver='.$idres).'" class="card-banner card-blue-light" '.(($isres) ? 'onclick="addres('.$id.')"' : '').' >
                '.(($isres) ? '<i class="zmdi zmdi-plus-circle-o"></i> ajouter un réservation ' : '<i class="zmdi zmdi-pause-circle-outline"></i> a '.$date_fin.' terminer maintenant ?').'
                </a>
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
    
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css"> 
    
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
        margin: 13px 0;
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
    margin-top: 21px;
    }
    
    /*--------edit-item------*/
    .edit-item ul li {
    float: left;
    padding-top: 22px;
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
    .addres {
    float: right;
    }
    .addres a {
    padding: 10px;
    color: #fff;
    font-size: 16px;
    }
    .addres a i {
    position: relative;
    top: 1px;
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
    
    .forme {
    background: #000000bd;
    width: 100%;
    height: 100%;
    position: absolute;
    display: none;
    top: 0;
    z-index: 9999;
    }
    
    .closebtn {
    position: absolute;
    top: 10px;
    right: 29px;
    color: #222;
    font-size: 35px;
    cursor: pointer;
    font-weight: bold;
    }
    
    .btndel {
    background: #ef0606;
    border-radius: 3px;
    padding: 9px;
    color: #fff;
    }
    

    /*add reserver----------------------*/
    

 input:focus, select:focus, textarea:focus {
  outline: none;
  box-shadow: none !important;}
    
.form-title {
  line-height: 1.66;
  margin: 0;
  padding: 0;
  font-weight: bold;
  color: #222;
  font-family: Poppins;
  font-size: 36px; }

.main {
  background: #f8f8f8;
  padding: 150px 0; }

.forme {
  font-size: 13px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  font-family: Poppins; }

.container {
  width: 900px;
  background: #fff;
  margin: 34px auto;
  box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
  border-radius: 20px;
    position: relative;
    }

.display-flex {
  justify-content: space-between;
  align-items: center;
  }

.display-flex-center {
  justify-content: center;
  align-items: center;
 }

.form-title {
  margin-bottom: 33px; }

figure {
  margin-bottom: 50px;
  text-align: center; }

.form-submit {
  display: inline-block;
  background: #6dabe4;
  color: #fff;
  border-bottom: none;
  width: auto;
  padding: 15px 39px;
  border-radius: 5px;
  margin-top: 25px;
  cursor: pointer; }
  .form-submit:hover {
    background: #4292dc; }


.term-service {
  font-size: 13px;
  color: #222; }


.form-group {
  position: relative;
  margin-bottom: 25px;
  overflow: hidden; }
  .form-group:last-child {
    margin-bottom: 0px; }

.form-group input {
  width: 100%;
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 5px;
  font-family: Poppins;
  box-sizing: border-box; 
font-size: 16px;
       }
.form-group span {
    width: 100%;
    font-family: Poppins;
    font-size: 16px;
    color: #6dabe4;;
       }


.agree-term {
  display: inline-block;
  width: auto; }


.label-has-error {
  top: 22%; }




.signin-content {
  padding-top: 22px;
  padding-bottom: 40px; }

.social-login {
  align-items: center;

  margin-top: 80px; }


       
 

  .form-button {
    text-align: center; }

  .signin-form {
    order: 1;
    margin-right: 0px;
    margin-left: 0px;
    padding: 0 30px; }

  .form-title {
    text-align: center; }
       
       
    
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
    
       

@media screen and (max-width: 1200px) {
  .container {
    width: calc( 100% - 30px);
    max-width: 100%; } }
@media screen and (min-width: 1024px) {
  .container {
    max-width: 1200px; } 
    
   
        
    
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
        
        
        $sql = "SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville ,r.idres,r.date_debut , r.date_fin FROM maisan m inner join photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join reserver r on r.idres = ( SELECT idres FROM reserver re WHERE re.idmaisan = m.idmaisan ORDER BY date_fin DESC LIMIT 1) inner join villes v on v.idville = m.idville where m.iduser =".$_SESSION['iduser']." ORDER BY datepub desc limit 50";
        
        
        $sqlxxx = 'SELECT m.idmaisan, adresse, surface,chambre,prix ,titel ,description ,datepub, p.urlphoto, p.decr , v.ville FROM maisan m inner join  photos p on p.idphoto = (select idphoto from photos ph where ph.idmaisan = m.idmaisan limit 1) inner join villes v on v.idville = m.idville  where iduser ='.$_SESSION['iduser'].' ;';
        
         $result = mysqli_query($mysqli, $sql);
        
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {   
            creatpost( $row["idmaisan"],'img/'.$row["urlphoto"],$row["decr"],$row["titel"],$row["chambre"],$row["surface"],$row["adresse"],$row["description"],$row["datepub"],$row["prix"],$row["ville"],$row["idres"],$row["date_debut"],$row["date_fin"]);
            }
         } else {
            echo "0 results";
         }
         mysqli_close($mysqli);
        
        
        	
        ?>
        
      
    </div>
    <div class="forme" id="forme">
            <div class="container">
            <span onclick="this.parentElement.parentElement.style.display='none'" class="closebtn">&times;</span>

                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">la réservation</h2>
                        <form method="POST" action="reserve_db.php" class="register-form" id="login-form">
                            <div class="form-group">
                               <span >date de début : </span> <input type="date" required name="date_debut" />
                            </div>
                            <div class="form-group">
                                <span >date de fin : </span> <input type="date" required name="date_fin" />
                            </div>
                            <input id="idpost" hidden type="text" required name="idpost" />
                            
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="réserver"/>
                            </div>
                        </form>
                             <?php if(isset($_SESSION['msg'])){?>
                                <div class="msg"> <?php echo $_SESSION['msg']; ?></div>
                             <?php unset($_SESSION['msg']);}?>

                    </div>
                </div>
            </div>

    </div>
    
    
    <div class="site-footer">
    <div class="focon">
        <img src="img/home-logo.png">
    </div>  
    <p> &copy; 2020 Location Nord. All Rights Reserved</p>
</div>

 <script>
     function addres(e) {
         document.getElementById("idpost").setAttribute("value",e);
         document.getElementById("forme").style.display = "block";

     }
     
     function confermdelete(e) {
             var result = confirm("Voulez-vous le supprimer ??");
         if (result) {
             window.location.replace(href="delete_post.php?id="+e);
         }
     }
 
    </script>
    
      
    
    
</body>

</html>
