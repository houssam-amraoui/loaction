

<?php 
include("include/connection.php");


	
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
                    <li>
                        <a href="accueil.php">accueil</a>
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
                    <li>
                        <a href="accueil.php">accueil</a>
                    </li>
                </ul>
            </div>';
    }
}
     
    if(!isset($_GET["id"])){
        header("Location:accueil.php");
        exit();
    }
    
    $sql = 'SELECT * FROM maisan WHERE idmaisan ='.$_GET["id"].' ;';
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql1 = 'SELECT * FROM users WHERE iduser ='.$row["iduser"].' ;';
    $result1 = mysqli_query($mysqli, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sqlcont = 'UPDATE vu set vues = vues+1 WHERE idmaisan ='.$_GET["id"].';';
    mysqli_query($mysqli, $sqlcont);

    $sqlvu = 'SELECT vues FROM vu WHERE idmaisan ='.$_GET["id"].' ;';
    $vu = mysqli_fetch_row(mysqli_query($mysqli, $sqlvu));
    
?> 

<html>

<head>
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <title>locations  Maroc</title>
   
<style>
  /* Minified CSS Reset */
  html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;vertical-align:baseline;}
  article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}
  body{line-height:1;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}table{border-collapse:collapse;border-spacing:0;}
  html{box-sizing:border-box}*,:after,:before{box-sizing:inherit}body{font-family:Circular,"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.43;color:#484848;background-color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;padding:0;margin:0}::placeholder{color:#767676!important;opacity:1}:-ms-input-placeholder{color:#767676!important}::-ms-input-placeholder{color:#767676!important}a{text-decoration:none;color:#008489}.screen-reader-only{border:0;clip:rect(0,0,0,0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.screen-reader-only-focusable:focus{clip:auto;height:auto;margin:0;overflow:visible;position:static;width:auto}.skip-to-content:focus{background-color:#fff;font-size:18px;padding:0 24px;position:absolute;left:3px;line-height:64px;top:3px;z-index:10000}#checkin_input,#checkout_input{color:#484848!important;font-weight:600!important;font-size:16px!important}[data-ghost="ghost"] #checkin_input,[data-ghost="ghost"] #checkout_input{font-weight:400!important}[data-ghost="ghost"] button{font-size: 16px !important}#marqueeImage{opacity:1!important}.flatpickr-months .flatpickr-month{overflow:initial}.flatpickr-months{padding-top:4px;padding-bottom:8px}.flatpickr-weekday{font-weight:400}.flatpickr-months .flatpickr-next-month,.flatpickr-months .flatpickr-prev-month{padding:16px 10px}#checkin_input,#checkout_input,.flatpickr-mobile{min-height:46px}.flatpickr-mobile:before{content:attr(placeholder);color:#aaa;margin-right:.5em}.flatpickr-mobile:focus:before{content:""}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:400;font-display:swap}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:600;font-display:swap}@font-face{font-family:Circular;unicode-range:U+F0000-FFFFD;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-368a4dfb2060306905d934709d7356f8.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/airmojix-Regular-e0adf0d9735aee379296283c36fa3840.woff") format("woff");font-weight:800;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Bold-bdfb98485e7836ba31b456f65cded088.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Bold-a188841af78481a25b7bb2316a5f5716.woff") format("woff");font-weight:800;font-style:normal;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Medium-50fc004b3082375f12ff0cfb67bf8e56.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Medium-4bc8dafd2e0fd8914bf4d5edce9acd24.woff") format("woff");font-weight:600;font-style:normal;font-display:swap}@font-face{font-family:Circular;src:url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Book-9a1c9cca9bb3d65fefa2aa487617805e.woff2") format("woff2"),url("https://a0.muscache.com/airbnb/static/airbnb-dls-web/build/fonts/Airbnb_Cereal-Book-aa38e86e3f98554f9f7053d7b713b4db.woff") format("woff");font-weight:400;font-style:normal;font-display:swap}
</style>
    
<style>
    body{
        background: #ffefef;
    }
    
    /*-------top-continer---*/
    .top-continer{
        width: 100%;
        position: relative;
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
    
    
    /*--------continer------*/
    .continer {
        width: 1200px;
        margin: auto;
        overflow: hidden;
        padding-bottom: 30px;
    }
    
    /*----card-----*/
    .card {
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    float: right;
    background: #fff;
    margin-top: 50px;
    padding: 40px;
    }
    
    .crl{
        float: left;
        width: 66.6%;
    }
    
    .crr{
        float: right;
        width: calc(100% - 40px);
    }
    .crrr{
        float: right;
        width: 33.3%;
    }
    
    /*----userSidbar---*/
    .userimg{
    float: left;
    border-radius: 50% 11% 57% 50%;
    background: #e07d94;
    margin: 6px;
    }


    
    /*----------------------------- new style------------*/
    /* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 12%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
    opacity: 0.8; 
    cursor: pointer; 
    border-radius: 7px;
    height: 44px;
}

.column img:hover {
  opacity: 1;
}
.row {
    overflow: hidden;
}

/* The expanding image container */
.container {
  position: relative;
    overflow: hidden;
    object-fit: cover;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: #41a3ff;
  font-size: 20px;
}

    .titel p {
    font-size: 25px;
    color: #41a3ff;
}
.chambr.surface {
    font-weight: 900;
    color: #16a085;
}
    .descreption {
    font-size: 18px;
    color: #7d7d7d;
}
    .descreption p {
    font-size: 28px;
    color: #484848;
}
    .vu {
    float: right;
    position: relative;
    top: -60px;
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
    
    .adress.time i {
    padding-right: 5px;
    }
    .adress.time span {
    padding-right: 7px;
    }
    
    @media screen and (max-width: 1220px) {

        .continer {
            width: 100%;
            padding: 15px;
        }
        .crrr {
            float: none; 
            width: 100%; 
        }
        .crl {
            float: none;
            width: 100%;
        }
        .crr {
            float: none;
            width: 100%;
            margin-top: 20px;
        }
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
    
    
    
    
    
    </style>

</head>

<body>
    
    <div class="top-continer">
        
        
        <nav class="header-top">
           <?php showtoolbar(); ?>
        </nav>
        
    </div>
    
    <div class="continer">
        
    <div class="card crl">
            
            <div class="card-body">
                
                    <?php
                    $conti =1;
                    
                    $sql2 = 'SELECT * FROM photos WHERE idmaisan ='.$row["idmaisan"].' ;';
                    $result2 = mysqli_query($mysqli, $sql2);                    
                    while($row2 = mysqli_fetch_assoc($result2)) {   
                    if($conti == 1){
                        echo '<div class="container"><img id="expandedImg" src="img/'.$row2["urlphoto"].'" style="width:100%"><div id="imgtext">'.$row2["decr"].'</div></div>';
                        echo '<div class="row">';
                    }  
                    echo '<div class="column"><img src="img/'.$row2["urlphoto"].'" alt="'.$row2["decr"].'" style="width:100%" onclick="myFunction(this);"></div>';
                        $conti++;
                    }
                    echo '</div>';
                    ?>
                    
                <div class="prix titel" >
                  <h2><?php echo $row["prix"] ; ?> DH</h2>
                  <p><?php echo $row["titel"] ; ?></p>
                </div>
                <div class="vu">
                    <span><?php echo $vu[0] ; ?> </span><i class="zmdi zmdi-eye"></i>
                </div>
                <div class="adress time">
                <i class="zmdi zmdi-pin"></i> <span><?php echo $row["adresse"] ; ?> </span>
                    <span>
                    <i class="zmdi zmdi-calendar"></i><?php echo $row["datepub"] ; ?></span>
                </div>
                <div class="chambr surface" >
                    <p>chambres : <?php echo $row["chambre"] ; ?> pies </p>
					<p>surface : <?php echo $row["surface"] ; ?> m²</p>
				</div>
                <div class="descreption" >
                    <p>descreption</p>
                    <span><?php echo $row["description"] ; ?></span>
				</div>



            </div>
    </div>
        
    <div class="crrr">
    <div class="card crr">
        <div class="userinfo">
            <img class="userimg" src="img/user.png" srcset="" mode="cover" width="64px" height="64px" >
            <p>name : <?php echo $row1["firstname"]." ".$row1["lastname"] ; ?></p>
            <p>numero : <?php echo $row1["num"]; ?> </p>
            <p>email : <?php echo $row1["email"]; ?></p>
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
        function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        }
    </script>
    
   </body >
   </html>