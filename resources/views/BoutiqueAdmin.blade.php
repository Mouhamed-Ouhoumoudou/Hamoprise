 
@extends('base_boutique')
@section('titre')

    <?php use App\Models\Boutique;
    

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
//  require __DIR__ .'/Teste/file.css';
 require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


    
    
    /* cette page peut etre referencié pqr deux internaute , soit un client en passage ou un vendeur lui-meme qui va d'abord se connecter*/
  if(isset($_GET['id'])){ /* si c'est client */

  echo Boutique::find($_GET['id'])->nom_B;

}
  else{ /* sinon c'est que c'est vendeur */
     try{
          echo session('boutique')->nom_B;
     }
     catch(Exception $e ){
         echo "Veillez vous reconnecter";
     }
   

  }
  ?>
  @endsection
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <meta name="google" content="notranslate">
     <link href="wwwroot/CSS/bootstrap.min.css" rel="stylesheet" />
         <link href="wwwroot/CSS/font-awesome.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="wwwroot/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
         <link href="wwwroot/CSS/alertify.core.css" rel="stylesheet" />
         <link href="wwwroot/CSS/alertify.default.css" rel="stylesheet" />
     <style>/* Googlefont Poppins CDN Link */

#ArticleBox{
    display:block;
    /*margin-top:100px;*/
}

#AddbuttonDiv{
    position:fixed;
    margin-top:20px;
    right:0;
   
    
}
.spaceEntreProduitEtHead{
    display:block;
}
.divEspaceFonds_Et_head{
             display:block;height:100px;
         }
#loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #FF5757;
  border-right: 16px solid #FF5757;
  border-bottom: 16px solid #FF5757;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -50px 0 0 -50px;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}






.fondu-out {
    opacity: 0;
    transition: opacity 0.4s ease-out;
}


.container{
            margin-top: 60px;
            margin-left:  100px;
          
            
        }
        
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
        }
        .sidebar{
          position: fixed;
          margin-top:80px;
          height: 100%;
          width: 180px;
          /*background: #0A2558;*/
          background: #252627;
          
          transition: all 0.5s ease;
        }
        .sideBarMobile{
              display:none;
          }
          .mobile-header{
              display:none;
          }
          }
        .sidebar.active{
          width: 60px;
        }
        .sidebar .logo-details{
          height: 80px;
          display: flex;
          align-items: center;
        }
        .sidebar .logo-details i{
          font-size: 28px;
          font-weight: 500;
          color: #fff;
          min-width: 60px;
          text-align: center
        }
        .sidebar .logo-details .logo_name{
          color: #fff;
          font-size: 24px;
          font-weight: 500;
        }
        .sidebar .nav-links{
          margin-top: 10px;
        }
        .sidebar .nav-links li{
          position: relative;
          list-style: none;
          height: 50px;
        }
        .sidebar .nav-links li a{
          height: 100%;
          width: 100%;
          display: flex;
          align-items: center;
          text-decoration: none;
          transition: all 0.4s ease;
        }
        .sidebar .nav-links li a.active{
          /*background: #081D45;*/
          background: #ff5757;
        }
        .sidebar .nav-links li a:hover{
          background: #081D45;
        }
        .sidebar .nav-links li i{
          min-width: 60px;
          text-align: center;
          font-size: 18px;
          color: #fff;
        }
        .sidebar .nav-links li a .links_name{
          color: #fff;
          /*color:#fff;*/
          font-size: 15px;
          font-weight: 400;
          white-space: nowrap;
        }
        .sidebar .nav-links .log_out{
          position: absolute;
          bottom: 0;
          width: 100%;
        }
        
        .menuIconForDesktop{
            height:20px;width:20px;
        }
        .home-section{
          position: relative;
          background: #f5f5f5;
          min-height: 100vh;
          width: calc(100% - 240px);
          left: 180px;
          transition: all 0.5s ease;
        }
        .sidebar.active ~ .home-section{
          width: calc(100% - 60px);
          left: 60px;
        }
        .home-section nav{
          display: flex;
          justify-content: space-between;
          height: 80px;
          background: #FF5757; /*#FF9888;*/
          display: flex;
          align-items: center;
          position: fixed;
          width: calc(100% - 0px);
          left: 0px;
          z-index: 100;
          padding: 0 20px;
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
          transition: all 0.5s ease;
        }
        .sidebar.active ~ .home-section nav{
          left: 60px;
          width: calc(100% - 60px);
        }
        .home-section nav .sidebar-button{
          display: flex;
          align-items: center;
          font-size: 24px;
          font-weight: 500;
        }
        nav .sidebar-button i{
          font-size: 35px;
          margin-right: 10px;
          color:white;
        }
        .home-section nav .search-box{
          position: relative;
          height: 50px;
          max-width: 550px;
          width: 100%;
          margin: 0 20px;
        }
        nav .search-box input{
          height: 100%;
          width: 100%;
          outline: none;
          background: #F5F6FA;
          border: 2px solid #EFEEF1;
          border-radius: 6px;
          font-size: 18px;
          padding: 0 15px;
        }
        nav .search-box .bx-search{
          position: absolute;
          height: 40px;
          width: 40px;
          background: #2697FF;
          right: 5px;
          top: 50%;
          transform: translateY(-50%);
          border-radius: 4px;
          line-height: 40px;
          text-align: center;
          color: #fff;
          font-size: 22px;
          transition: all 0.4 ease;
        }
        .home-section nav .profile-details{
          display: flex;
          align-items: center;
          background: #F5F6FA;
          border: 2px solid #EFEEF1;
          border-radius: 6px;
          height: 50px;
          min-width: 190px;
          padding: 0 15px 0 2px;
        }
        nav .profile-details img{
          height: 40px;
          width: 40px;
          border-radius: 6px;
          object-fit: cover;
        }
        nav .profile-details .admin_name{
          font-size: 15px;
          font-weight: 500;
          color: #333;
          margin: 0 10px;
          white-space: nowrap;
        }
        nav .profile-details i{
          font-size: 25px;
          color: #333;
        }
        .dashboard{
            color:white;
        }
        .home-section .home-content{
          position: relative;
          padding-top: 104px;
        }
        .home-content .overview-boxes{
          display: flex;
          align-items: center;
          justify-content: space-between;
          flex-wrap: wrap;
          padding: 0 20px;
          margin-bottom: 26px;
        }
        .overview-boxes .box{
          display: flex;
          align-items: center;
          justify-content: center;
          width: calc(100% / 4 - 15px);
          background: #fff;
          padding: 15px 14px;
          border-radius: 12px;
          box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        .overview-boxes .box-topic{
          font-size: 20px;
          font-weight: 500;
        }
        .home-content .box .number{
          display: inline-block;
          font-size: 35px;
          margin-top: -6px;
          font-weight: 500;
        }
        .home-content .box .indicator{
          display: flex;
          align-items: center;
        }
        .home-content .box .indicator i{
          height: 20px;
          width: 20px;
          background: #8FDACB;
          line-height: 20px;
          text-align: center;
          border-radius: 50%;
          color: #fff;
          font-size: 20px;
          margin-right: 5px;
        }
        .box .indicator i.down{
          background: #e87d88;
        }
        .home-content .box .indicator .text{
          font-size: 12px;
        }
        .home-content .box .cart{
          display: inline-block;
          font-size: 32px;
          height: 50px;
          width: 50px;
          background: #cce5ff;
          line-height: 50px;
          text-align: center;
          color: #66b0ff;
          border-radius: 12px;
          margin: -15px 0 0 6px;
        }
        .home-content .box .cart.two{
           color: #2BD47D;
           background: #C0F2D8;
         }
        .home-content .box .cart.three{
           color: #ffc233;
           background: #ffe8b3;
         }
        .home-content .box .cart.four{
           color: #e05260;
           background: #f7d4d7;
         }
        .home-content .total-order{
          font-size: 20px;
          font-weight: 500;
        }
        .home-content .sales-boxes{
          display: flex;
          justify-content: space-between;
          /* padding: 0 20px; */
        }
        
        /* left box */
        .home-content .sales-boxes .recent-sales{
          width: 65%;
          background: #fff;
          padding: 20px 30px;
          margin: 0 20px;
          border-radius: 12px;
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .home-content .sales-boxes .sales-details{
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
        .sales-boxes .box .title{
          font-size: 24px;
          font-weight: 500;
          /* margin-bottom: 10px; */
        }
        .sales-boxes .sales-details li.topic{
          font-size: 20px;
          font-weight: 500;
        }
        .sales-boxes .sales-details li{
          list-style: none;
          margin: 8px 0;
        }
        .sales-boxes .sales-details li a{
          font-size: 18px;
          color: #333;
          font-size: 400;
          text-decoration: none;
        }
        .sales-boxes .box .button{
          width: 100%;
          display: flex;
          justify-content: flex-end;
        }
        .sales-boxes .box .button a{
          color: #fff;
          background: #0A2558;
          padding: 4px 12px;
          font-size: 15px;
          font-weight: 400;
          border-radius: 4px;
          text-decoration: none;
          transition: all 0.3s ease;
        }
        .sales-boxes .box .button a:hover{
          background:  #0d3073;
        }
        
        /* Right box */
        .home-content .sales-boxes .top-sales{
          width: 35%;
          background: #fff;
          padding: 20px 30px;
          margin: 0 20px 0 0;
          border-radius: 12px;
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .sales-boxes .top-sales li{
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin: 10px 0;
        }
        .sales-boxes .top-sales li a img{
          height: 40px;
          width: 40px;
          object-fit: cover;
          border-radius: 12px;
          margin-right: 10px;
          background: #333;
        }
        .sales-boxes .top-sales li a{
          display: flex;
          align-items: center;
          text-decoration: none;
        }
        .sales-boxes .top-sales li .product,
        .price{
          font-size: 17px;
          font-weight: 400;
          color: #333;
        }
        /* Responsive Media Query */
        @media (max-width: 1240px) {
          .sidebar{
            width: 60px;
            display:none;
          }
          .sidebar.active{
            width: 220px;
          }
          .home-section{
            width: 100%;
            left: 0px;
          }
          .sideBarMobile{
              display:block;
              width:100%;
              display: inline;
              background-color:#FF5757;
              height:100px;
              
              
              
          }
          .home-section .sideBarMobile{
              background-color:#FF5757;
              height:100px;
              right:0;
              bottom:0;
              
              
          }
          .mobile-header{
              display:block;
              background-color:#FF5757;
              position:fixed;
              width:100%;
              height:45px;
              /*bottom:0;*/
              
          }
          .couvertureMenuMonile{
              display:block;
              background-color:white;
              position:fixed;
              width:100%;
              height:45px;
              bottom:0;
              
          }
          .sideBarMobile .nav-links li{
              display: inline;
              /*background-color:#FF5757;*/
              
          }
          .sideBarMobile .nav-links{
            width:100%;
              height:55px;
              background-color:white;
              position:fixed;
              bottom:0;
          }
          .sidebar.active ~ .home-section{
            /* width: calc(100% - 220px); */
            overflow: hidden;
            left: 0px;
          }
          .home-section nav{
              display:none;
            width: calc(100% - 0px);
            left: 0px;
          }
          .sidebar.active ~ .home-section nav{
            width: calc(100% - 0px);
            left: 0px;
          }
        }
        @media (max-width: 1150px) {
          .home-content .sales-boxes{
            flex-direction: column;
          }
          .home-content .sales-boxes .box{
            width: 100%;
            overflow-x: scroll;
            margin-bottom: 30px;
          }
          .home-content .sales-boxes .top-sales{
            margin: 0;
          }
          .spaceEntreProduitEtHead{
             display:none;
         }
         
        }
        @media (max-width: 1000px) {
          .overview-boxes .box{
            width: calc(100% / 2 - 15px);
            margin-bottom: 15px;
          }
          .spaceEntreProduitEtHead{
             display:none;
         }
         .divEspaceFonds_Et_head{
             display:block;height:12%;
         }
        }
        @media (max-width: 700px) {
          nav .sidebar-button .dashboard,
          nav .profile-details .admin_name,
          nav .profile-details i{
            display: none;
          }
          .home-section nav .profile-details{
            height: 50px;
            min-width: 40px;
          }
          .home-content .sales-boxes .sales-details{
            width: 560px;
          }
          .spaceEntreProduitEtHead{
             display:none;
         }
         .divEspaceFonds_Et_head{
             display:block;height:10%;
         }
         #AddbuttonDiv{
            position:fixed;
             margin-top:125%;
            margin-left:40%;
            width:25%;height:50%;
    
         }
          #AddbuttonDiv img{
              width:80%;
          }
        }
        @media (max-width: 550px) {
          .overview-boxes .box{
            width: 100%;
            margin-bottom: 15px;
          }
          .sidebar.active ~ .home-section nav .profile-details{
            display: none;
          }
          .spaceEntreProduitEtHead{
             display:none;
         }
         .divEspaceFonds_Et_head{
             display:block;height:9%;
         }
         #AddbuttonDiv{
            position:fixed;
             margin-top:125%;
            margin-left:40%;
    
         }         
        }
        
        
        
        
        /* partie de stackoverFlow mobile menu footer */
        
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

#nav2 {
  position: fixed;
  width: 100%;
  right: 0;
  left: 0;
  top: 0;
}

#nav2 > ul {
  list-style: none;
  display: flex;
  justify-content: center;
  padding: 20px 0;
}

#nav2 > ul > li {
  margin: 0 10px;
}

#nav2 > ul > li > a {
  text-decoration: none;
  color: #121212;
}

#nav2 > ul > li > a > .menuIcon {
  display: none;
  font-size: 20px;
  /*color: #f1f1f1;*/
  /*background: #1a7523;*/
  padding: 5px;
  border-radius: 4px;
  height:35px;
}

@media screen and (max-width:768px){
  #nav2 {
    bottom: 0;
    top: unset;
    /*background: #20992c;*/
    height: 50px;
  }
  
  #nav2 > ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0;
    height: 100%;
  }
  
  #nav2 > ul > li {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  #nav2 > ul > li > a {
    text-decoration: none;
    color: #121212;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  #nav2 > ul > li > a > .menuIcon {
    display: block;
  }
  
  #nav2 > ul > li > a > span {
    display: none;
  }
  
           #AddbuttonDiv{
            position:fixed;
             margin-top:125%;
            margin-left:70%;
    
         }
}
        </style>
  

@section('contenue')

 <div class="sidebar">
     <?php
//         if(isset($_GET['id'])){
//     /*affichage de logo de la boutique au niveau client*/
//      session()->put('id_B',$_GET['id']);
//      echo '<header ><a href=""><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.Boutique::find($_GET['id'])->photo_profil.'" alt="logo de profil"></figure></a></header><br><br><br><br><hr>';

//   }
//   else{
//       try{
//                 $nom1=substr(session('boutique')->photo_profil, 11);
//     /*affichage de logo de la boutique  au niveau vendeur*/
//  echo '<a href=""><div><img style="height:70px; width: 100px;  margin-left:7px; position:fixed;border-radius:20px;" src="storage/MarkImages/'.$nom1.'" alt="logo de profil"></div></a>';
//       }
//       catch(Exception $e){
//           function Reconnexion(){
//               return redirect("/connexion");
//               header('Location: https://hamoprise.com/connexion');
//           }
//           echo '<button> <a href="https://hamoprise.com/connexion">session expirée veuillez-vous reconnecter </a></button>';
          
//           Reconnexion();
          
//       }


// }
      ?>
    <div class="logo-details">
      
      <!-- <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">App</span> -->
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" id="DashbordId" onclick="Article()" class="active">
            <!--<i class='bx bx-grid-alt' ></i>-->
             <i>
                 <img class="menuIconForDesktop"  src="/images/ProduitDesktop.png"/>
             </i>
     
            <span class="links_name">Articles</span>
          </a>
        </li>
        <li>
          <a id="CommandeId" onclick="CommandeAfficher()" href="#">
            <!--<i class="bx bx-command"></i>-->
             <i>
                 <img class="menuIconForDesktop"  src="/images/CommandeDesktop.png"/>
             </i>
            <span class="links_name">Commande</span>
          </a>
        </li>

      
        <li>
          <a id="AnalyseId" onclick="AnalyseAfficher()" href="#">
            <!--<i class='bx bx-bar-chart' ></i>-->
             <i>
                 <img class="menuIconForDesktop"  src="/images/AnalyseDesktop.png"/>
             </i>
            <span class="links_name">Analyse</span>
          </a>
        </li>
        <li>
          <a id="RecetteId" onclick="RecetteAfficher()" href="#">
          <!--<i class="bx-currency-dollar"></i>-->
          <!-- <i class="fa fa-dollar" style="font-size:24px;color:white"></i> -->
           <i>
                 <img class="menuIconForDesktop"  src="/images/RevenueDesktop.png"/>
             </i>
            <span class="links_name">Fonds</span>
          </a>
        </li>
        <!--<li>-->
        <!--  <a id="PayementId" onclick="PayementAfficher()" href="#">-->
        <!--    <i class="bx bx-credit-card"></i>-->
        <!--    <span class="links_name">Payement</span>-->
        <!--  </a>-->
        <!--</li>-->
        <li>
          <a id="ProfilId" onclick="ProfilAfficher()" href="#">
          <!--<i class="bx bx-**"></i>-->
           <i>
                 <img class="menuIconForDesktop"  src="/images/SettingDesktop.png"/>
             </i>
            <span class="links_name">Parametres</span>
          </a>
        </li>
        
       
      
      </ul>
  </div>
  <section class="home-section">
     
      
    <nav>
          
      <div class="sidebar-button">
          <div>
        <i class='bx bx-menu sidebarBtn' style="float:left;"></i>
        <span class="dashboard"> 
        <?php 
        
      try{
                $nom1=substr(session('boutique')->photo_profil, 11);
  $nomB=session('boutique')->nom_B;
        
    /*affichage de logo de la boutique  au niveau vendeur*/
 echo '<div><img style="height:40px; width: 40px;  margin-left:7px; position:fixed;border-radius:50px;" src="storage/MarkImages/'.$nom1.'" alt="logo de profil"><h4 style="margin-left:18:px;">'.$nomB.' si le nom est long</h4></div>';
      }
      catch(Exception $e){
          function Reconnexion(){
              return redirect("/connexion");
              header('Location: https://hamoprise.com/connexion');
          }
          echo '<button> <a href="https://hamoprise.com/connexion">session expirée veuillez-vous reconnecter </a></button>';
          
          Reconnexion();
          
      }
        
        //  try{
        //       $nomB=session('boutique')->nom_B;
        // echo $nomB;
        
          
        //     }
        //     catch(Exception $e){
        //         echo "Session expirée veuillez-vous reconnecter";
        //     }
        ?>
        </span>
       </div>
       
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span id="profil" class="admin_name">
            <?
            try{
                $nomV=session('vendeur')->nom_V;
            $prenomV=session('vendeur')->prenom_V;
             echo $nomV;
             echo " ";
            echo $prenomV;
          
            }
            catch(Exception $e){
                echo "Session expirée veuillez-vous reconnecter";
            }
              ?>
            
            </span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    
  
  <div class="mobile-header">
      <?php
     
     
      try{
              $nom1=substr(Boutique::find(session('boutique')->id)->photo_profil, 11);
     session()->put('id_B',session('boutique')->id);
    //  echo '<div style=""><a href=""><img class="BoutiqueProfilTriangle"  src="/images/triangle.png"><img class="BoutiqueProfil" src="storage/MarkImages/'.$nom1.'" alt="logo de profil"></a>
     
    // </div>';
      echo'<div style="width:25%;height:25%;border-radius:50px;display: grid;
  justify-content: center;align-content: center;
             ">
     <img class="BoutiqueProfil" style="width:10%;height:5%;border-radius:50px;" src="storage/MarkImages/'.$nom1.'" alt="logo de profil">
     </div>
     <div style="margin-left:15%;"><h2 translate="no" style="color:white;" class="BoutiqueMarkTitl">'.Boutique::find(session('boutique')->id)->nom_B.' <a href="https://hamoprise.com/boutique?id='.session('boutique')->id.'">  appercu</a></h2> 
     </div>';
          
            }
            catch(Exception $e){
                echo '<a href="https://hamoprise.com/connexion">Session expirée veuillez-vous reconnecter</a>
                <br><button style="color:red;"><a href="https://hamoprise.com/connexion">Connexion</a>
                </button>';
            }
     ?>
  </div>
  <div class="couvertureMenuMonile">
      
  </div>
<div  id="loader"></div>
<script>
const loader = document.querySelector('#loader');

window.addEventListener('load', () => {
    loader.classList.add('fondu-out');

})
</script>

    <div id="ArticleBox" >
        
       
        <!-- The Modal -->
<div id="myModal3" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
      
      

    
      <style>
.loader2 {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #ff5757;
  border-radius: 50%;
  border-top: 16px solid white;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  display:none;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

      </style>
      <script>
          var myVar;

function stopeLoader() {
//   myVar = setTimeout(showPage, 3000);
  document.getElementById("loader2").style.display = "none";
}
function startLoader() {
  document.getElementById("loader2").style.display = "block";
}
// function showPage() {
//   document.getElementById("loader2").style.display = "none";
//   document.getElementById("myDiv").style.display = "block";
// }
      </script>
       <div class="loader2"  id="loader2"></div>
      <!-- The Close Button -->
    <span class="close">&times;</span>
   <h2>Nouveau Article</h2>
   <!-- formulaire d'ajout d'un produit -->
   <div style="display:none;" id="myDiv" class="animate-bottom">
       </div>
  <form action="{{ url('/boutique/ajouterP') }}" method="post" enctype="multipart/form-data">
      {{ @csrf_field() }}
      <?php
      try{
          $id_B=session('boutique')->id;
      echo '<input style="display:none;" type="number" value="'.$id_B.'" name="id_B" id="id_B">
      <input style="display: none;" type="number" value="'.session('vendeur')->id.'" name="id_V" id="id_V">';
      }catch(Exception $e){
          echo 'Session expirée' ;
      }
      
      
      ?>
      

<p><img id="output" width="100" height="100" /></p>
<script>
var loadFile = function(event) {

	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
	image.style.display="block";
	document.getElementById('uplaodImageIcon').style.display="none";
	document.getElementById('ArticleattribuitBox').style.display="block";
};
function annulerAdd(){
     var modal = document.getElementById("myModal3");
    modal.style.display = "block";
}
</script>


      <!--<div class="form-group">-->
      <!--    <label for="url_photo">photo:</label>-->
      <!--<input type="file" name="url_photo" accept=".jpg, .jpeg, .png" multiple id="url_photo" class="form-control" required=""><br>-->
      <!--</div>-->
      <div class="form-group">
          <!--<label for="url_photo">photo:</label>-->
      <div class="image-upload">
  <label for="file-input">
    <!--<img id="uplaodImageIcon" src="/images/uplaodImageIcon.png"/>-->
  <div style="border-style: dotted;border-radius:7px;border-color:#FF5757;">
      <img style="padding:7px;" id="uplaodImageIcon" src="/images/addImageIcon.png"/>
  </div>  
  </label>
    </div>
  <input id="file-input" style="display:none;" name="url_photo" onchange="loadFile(event)"  type="file" accept=".jpg, .jpeg, .png" />
    </div>
    
    <div id="ArticleattribuitBox" >
       <div class="form-group">
           <label for="prix">Prix(<span>€</span>):</label>
      <input type="number" name="prix" placeholder="0.00€" class="form-control" id="prix" required="" max="900000000000">
       </div>
       <div class="form-group">
           <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelleAdd" placeholder="exemple: Pantalon Rouge" class="form-control"  required=""><br>
       </div>
       <div class="form-group">
           <label for="description">description:</label>
           
      <textarea type="text" class="form-control"style="height:200px;" name="description" id="descriptionAdd"  placeholder="Decrire les caracteristiques de votre Produit"></textarea><br>
       </div>
       <div>
           <div >
                <input class="btn btn-primary" style="width:100%;"  type="button"   name="Terminer" value="Publier"  onclick="addProduit()">
            </div>
           
            
            
           
       </div>
       
     </div>
     
    </form>
    
    
  </div>
  </div>



 <?php
 use Illuminate\Support\Facades\DB;
 try{
     

  $produits=DB::table('produits')->get();
  
$id_B=session('boutique')->id;
       
  session()->put('client',0);
      
        /* affichage de produit b*/
        echo '<br>';
        echo "<br>";
        echo "<br>";
        echo '<br class="spaceEntreProduitEtHead">';
        echo '<br class="spaceEntreProduitEtHead">';
        echo '<br class="spaceEntreProduitEtHead">';
        $i=0;
        
        if(session('boutique')->Nbr_Produit==0){
                        // Boutique n'ap pas de produit
                        echo '<style> #produit_Vide_Div{width:100%;height:100%;display:grid;justify-content:center;align-content:center;
                        }
                        </style>';
            echo '<div id="produit_Vide_Div" >';
            echo '<div style="margin-left:30%;background-color:#808080;border-radius:73px;width:150px;height:150px;display:grid;justify-content:center;align-content:center; ">';
             echo '<img src="/images/contenueVide.png">';
            echo '</div>';
            // echo '<p>Aucun Produit</p>';
            echo '<h2 style="padding-left:30%;" >Aucun Produit</h2>';
            // echo '</div>';
            //   echo '<div style="width:100%;display:grid;justify-content:center;">';
            
            echo '<p>veuillez ajouter vos produits à vendre en cliquant sur le button rouge de votre écran.</p>';
            echo '<img style="padding-left:40%;" src="/images/addIcon.png" onclick="addProduct()">
          <h6 style="color:#ff5757;padding-left:42%;"onclick="addProduct()">Ajouter</h6>';
            
            echo '</div>';
       
        }
      
                    foreach ($produits as $produit) {
          if($produit->id_B==session('boutique')->id){
          
           $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
           
          
          
        


echo '
           
           <div class="produitEntity">';
           echo '<div><img id="'.$produit->id.'id" class="produit" onclick="launchModal('.$produit->id.')"  alt="une image d un produit" src="storage/images/'.$nom.'">
               </div>';
           echo '<div style="">
           <p > <span style="font-size:15px;" id="'.$produit->id.'libelle">'.$produit->libelle.' </span><br>  ';
           echo '<span style="font-size:15px;"  id="'.$produit->id.'prix" style="color:black;float:bottom;">'.$produit->prix.'<span style="background-color:#FF5757;color:white; border-radius:3px;">New</span></span></p>
           </div>
           
           <p id="'.$produit->id.'description" style="display:none;">'.$produit->description.'</p>
           <input type="number" id="idBoutique" style="display:none;" value="'.$produit->id_B.'">
           <input type="text" id="'.$produit->id.'stripe_id" value="'.$produit->stripe_id.'" style="display:none;" >
           
           
           ';

           echo "
           </div>";

if(session('boutique')->Nbr_Produit!=0){
    
        
if($produit->nbVisites>0 || $produit->nbVisites=0){
    $i=$i+1;
   echo '<input type="number" id=max'.$i.'  value='.$produit->nbVisites.' style="display:none;" >';
   echo '<input type="text" id=libel'.$i.'  value='.$produit->libelle.' style="display:none;" >';
   
}


}
else{
    echo '<input type="number" id="max1"  value="0"style="display:none;" >';
     echo '<input type="number" id="max2"  value="0"style="display:none;" >';
      echo '<input type="number" id="max3"  value="0"style="display:none;" >';
   echo '<input type="text" id="libel1"  value="aucun prduit" style="display:none;" >';
   echo '<input type="text" id="libel2"  value="aucun prduit" style="display:none;" >';
   echo '<input type="text" id="libel3"  value="aucun prduit" style="display:none;" >';
   
   
  
    }
         }

       } //fin for
       
       
echo '<div id="divForProduitAjoutes">';

echo '</div>';

       
       
       
       
 }
 catch(Exception $e){
     echo 'Session Expirée';
 }
 
    ?>
    
 
      <div id="AddbuttonDiv">
          <img src="/images/addIcon.png" onclick="addProduct()">
          <h6 style="color:#ff5757;padding-left:19%;">Ajouter</h6>
           <!--<button class="btn btn-primary"  onclick="addProduct()">Ajouter</button>-->
       </div>
     

     
    
<div id="myModal" class="modal">
      <style>
      #hamopriseTitle{
            position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  color:#ff5757;
  display:none;
      }
#loaderModif {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #ff5757;
  border-radius: 50%;
  border-top: 16px solid white;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  display:none;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

      </style>
      <script>
          var myVar;

function stopeLoaderModif() {
//   myVar = setTimeout(showPage, 3000);
  document.getElementById("loaderModif").style.display = "none";
  document.getElementById("hamopriseTitle").style.display = "none";
}
function startLoaderModif() {
  document.getElementById("loaderModif").style.display = "block";
  document.getElementById("hamopriseTitle").style.display = "block";
}
// function showPage() {
//   document.getElementById("loader2").style.display = "none";
//   document.getElementById("myDiv").style.display = "block";
// }
      </script>
       
  <!-- Modal content -->
  <div id="modalContent1" class="modal-content">
      
      <!-- The Close Button -->
    <span class="close">&times;</span>
  <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" style="border-radius:7px;" id="pic-1">
						  <img style="border-radius:6px;" id="img01"/></div>
						  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>
					
						
					</div>
					<div class="details col-md-6">
	<div  id="loaderModif"></div>
	<div id="hamopriseTitle">
	    <h2>Hamoprise</h2>
	</div>
	
					    <h3>Information sur cet article</h3>
					    <form action="{{url('/boutique/produit/modifier')}}" method="post">
	{{ @csrf_field()}}

	<?php
	
	echo '<div class="form-group">
	
	<input style="display:none;" type="number" id="idInModal" name="id">';
	  echo '<label for="url_photo">changer l\'image:</label>
      <input type="file" name="url_photo" accept=".jpg, .jpeg, .png" class="form-control" id="url_photo"><br>
	   </div>
	
    <div class="form-group">
	 <label for="prix">prix:</label>
      <input type="number" name="prix" class="form-control" id="prixidInModal">
	   </div>
	   
	   <div class="form-group">
	 <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" class="form-control" id="libelleidInModal">
	   </div>
	   
	   <div class="form-group">
	 <label for="description">description:</label>
      <textarea type="text" name="description" style="height:200px;" class="form-control" id="descriptionidInModal"></textarea>
	   </div>

     ';


	?>

	<div class="form-group" style="width:100%;">
	    <div class="btn btn-primary" style="float:left;width:55px;height:60px;" onclick="modifierArticheAsync()">
	        <img src="/images/saveIcon.png">
	        <b><h6>Enreigistrer</h6>
	        	<!--<input class="btn btn-primary"  type="button" class="form-control" name="modifier" value="Enreigistrer">-->
	    </div>

	<div class="btn btn-primary" id="product" style="float:left;margin-left:2%;width:55px;height:60px;">
	    <img src="/images/partagerIcon.png"><h6>partager</h6>
	     <!--<p><button id="product"></i></button></p>-->
    <input style="display:none;" type="text" id="ProductLink">
	</div>
		<div class="btn btn-success" style="float:left;;margin-left:2%;width:55px;height:60px;">
		    <a id="ProductLinkForApercu" href="https://hamoprise.com/boutique/produit?id=">
	    <img src="/images/apercuProduitIcon.png"><h6>Apercu</h6>
	    </a>
	    
	</div>
	<div onclick="SupArticle()" class="btn btn-danger" style="margin-left:1%;width:45px;height:60px;top:0;">
	    <img src="/images/suprimerIcon.png" style="height:38px;"><h5>
	        <h6>Suprimer</h6>
		<form id="sup-form" action="/boutique/suprimer" methode="post">
							    


<input  style="display:none;" type="number" name="id" id="idInModalForDelete">
<!--<button  class="btn btn-danger"  id="btn-suprimer"  nom="suprimer" >Suprimer</button>-->

</form>
<script>
    function SupArticle(){
        startLoaderModif();
        var s=0
        if(confirm("Voulez-vous suprimer cet arcle?")){
            // document.forms["sup-form"].submit();
           
        var id=document.getElementById("idInModalForDelete").value;      
         var stripe_id=document.getElementById("stripe_idInModalForDelete").value;    
         var libelle=document.getElementById("libelleidInModal").value;     
         var description=document.getElementById("descriptionidInModal").value;  
         var idStr=id+"id";
          var idLibelle2=id+"libelle";
         var idPrix2=id+"prix";

         

  
  
 
                $.ajax({
                   
          type:'GET',
          url:'/boutique/suprimer',
          data:{id:id,stripe_id:stripe_id},
          dataType: 'JSON',
            success: function (data) {
                stopeLoaderModif();
                document.getElementById(idStr).style.display="none";
                document.getElementById(idLibelle2).style.display="none"; 
                document.getElementById(idPrix2).style.display="none"; 
                document.getElementById("myModal").style.display="none";
                      alertify.success(data.success);
                       
                    }
                });
        }
        else{
            return false
        }
     
    }
</script>
</h5>

<input  style="display:none;" type="text" name="stripe_id" id="stripe_idInModalForDelete">
	</div>
	</div>
	
	
	    
   

	
</form>

<!--                        <div class="action">-->
							
<!--							<form id="sup-form" action="/boutique/suprimer" methode="post">-->
<!--	<input  style="display:non;" type="text" name="stripe_id" id="stripe_idInModalForDelete">						    -->
<!--<input  style="display:none;" type="number" name="id" id="idInModalForDelete">-->
<!--<button  class="btn btn-danger"  id="btn-suprimer"  nom="suprimer"  onclick="SupArticle()">Suprimer l'article</button>-->
<!--</form>-->
<!--<script>-->
<!--    function SupArticle(){-->
<!--        var s=0-->
<!--        if(confirm("Voulez-vous suprimer cet arcle?")){-->
<!--            document.forms["sup-form"].submit();-->
<!--        }-->
<!--        else{-->
<!--            return false-->
<!--        }-->
     
<!--    }-->
<!--</script>-->
<!--						</div>-->
		
				</div>
			</div>
		</div>
	</div>
 
	
  </div> 
 </div>
 <!--fin modal-->
 

  </div>
 

    </div>
    
    
     
     <div id="CommandeBox">
         <div id="DivInCommandeBox">
   
         <?php
         use App\Models\Commande;
use App\Models\Produit;
use App\Models\Achat;

//     $commandes=DB::table('commandes')->get();
// $nbr=0;
// echo'<table class="table table-striped">';
// echo '<thead>
// <th>client</th>
// <th>produit</th>
// <th>prix</th>
// <th> action</th>
// </thead>';
// echo '<tbody>';
// foreach ($commandes as $commande) {

// 	if ($commande->id_B==session('boutique')->id) {
// 		$nbr=$nbr+1;
// 		if($produit=Produit::find($commande->id_P)){
// 		echo '<tr>';
// 		$nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
// 		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id_P.'">';
// 		 echo '<td><h1 class="contact-client">Contacts Client: "'.$commande->contacts.'"</h1></td>';
//           echo '<td><img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'"></td>';
//              echo '<td><h2>'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2></td>';
//              echo "</a>";

//              echo '<td><button class="btn-repondre" ><a style="text-decoration:none;color:white;"" href="/boutique/message?id='.$commande->contacts.'">Repondre via Kasouwa</a></button></td>';
// 	echo '</tr>';}
// 		else{
		    	
	
// 		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="">';
// 		 echo '<h1 class="contact-client">Contacts Client: "'.$commande->contacts.'"</h1>';
//           echo '<h3>vous avez suprimé cet article apres avoir été commandé par un client</h3>';

//              echo "</a>";

//              echo '<button class="btn-repondre" ><a style="text-decoration:none;color:white;"" href="">Suprimer la commande</a></button>';
// 		}
// 	}
	
// }
// echo '</tbody>';
// echo '</table>';


         $achats=DB::table('achats')->get();
$nbr=0;
echo '<div style="height:100px;">
</div>';
echo'<div style="display:grid;justify-content:center;"><h5>Liste des commandes réçus</h5></div>';
echo'<table class="table table-striped" style="width:100%;">';

echo '<thead>

<th>Produit</th>
<th>Prix</th>
<th>Achat</th>
</thead>';
echo '<tbody>';
try{
    
        
    
    foreach ($achats as $achat) {

	if ($achat->id_B==session('boutique')->id) {
		$nbr=$nbr+1;
		if($produit=Produit::find($achat->id_P)){
		echo '<tr>';
		$nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id_P.'">';
		 echo '<h1 style="display:none" id="'.$achat->id.'nomClient" class="contact-client">'.$achat->nomClient.'</h1>';
		 echo '<h1 style="display:none" id="'.$achat->id.'mailClient" class="contact-client">'.$achat->email.'</h1>';
		 echo '<h1 style="display:none" id="'.$achat->id.'NumeroClient" class="contact-client">'.$achat->telephone.'</h1>';
		 echo '<h1 style="display:none" id="'.$achat->id.'AdresseLivraison" class="contact-client">'.$achat->adresseLivraison.'</h1>';
           echo '<td><img class="produit" style="width:60px;height:60px;"  alt="une image d un produit" src="/storage/images/'.$nom.'"></td>';
             echo '<td><h2>'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2></td>';
             echo "</a>";

            //  echo '<td><button class="btn-repondre" ><a style="text-decoration:none;color:white;"" href="/boutique/message?id='.$achat->email.'">Client et livraison</a></button></td>';
            echo '<td><button onclick="afficheClient('.$achat->id.')" class="btn-repondre" ><a style="text-decoration:none;color:white;">Client et livraison</a></button></td>';
	echo '</tr>';}
		else{
		    	
	
		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="">';
		 echo '<h1 class="contact-client">Email Client: "'.$achat->email.'"</h1>';
           echo '<h3>vous avez suprimé cet article apres avoir été commandé par un client</h3>';

             echo "</a>";

             echo '<button class="btn-repondre" ><a style="text-decoration:none;color:white;"" href="">Suprimer la commande</a></button>';
		}
	}
	
}
echo '</tbody>';
echo '</table>';


}
catch(Exception $e){
    echo 'Session Expirée';
}
try{
    if(session('boutique')->nbCommandeRecu==0){
                        // Boutique n'ap pas de produit
            echo '<div style="width:100%;height:100%;display:grid;justify-content:center;align-content:center;">';
            echo '<div style="margin-left:30%;background-color:#808080;border-radius:73px;width:150px;height:150px;display:grid;justify-content:center;align-content:center; ">';
             echo '<img src="/images/contenueVide.png">';
            echo '</div>';
            // echo '<p>Aucun Produit</p>';
            echo '<h3 style="padding-left:18%;" >Aucune commande reçue</h3>';
            // echo '</div>';
            //   echo '<div style="width:100%;display:grid;justify-content:center;">';
            
            echo '<p>Les commandes des clients appraitront ici. Vous n\'avez réçu aucune commande pour l\'instant.</p>';

            
            echo '</div>';
       
        }
}
catch(Exception $e){
    echo 'Session Expirée';
}

     
         ?>
         
         
         
         

<!-- The Modal -->
<div id="myModalCommande" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div>
        <style>
            .ClientTitle{
                font-weight: bold;
            }
        </style>
        <h3 class="ClientTitle">CLient</h3>
        <h5>Nom:  <span id="nomClient" class="ClientTitle">Mohamed </span></h5>
        <h5>Numero: <span id="NumeroClient" class="ClientTitle">55524954     </span><span id="idAppel">  appeler</span></h5>
        <h5> Mail: <span id="mailClient" class="ClientTitle">mouhamed.ouhoumoudou7@gmail.com</span> <span id="idMail">mail</span></h5>
        
    </div>
    <div>
        <h3 class="ClientTitle">Adresse Livraison</h3>
        <h5>Adress: <span id="AdresseLivraison" class="ClientTitle">Niamey </span></h5>
    </div>
    <div>
        <h3 class="text text-danger">Attention:Lors de la livraison le client doit vous donner le code qu'il a recu apres sa commande. sans ce code vous ne vouvez pas marquer la commande comme livrée et vos montant pour ce article ne seront pas transferable,munissez-vous de votre Telephone et valider sur place en cliquant sur le boutton "marquer comme livrée" ci-dessous, et si s'il s'agit d'un livreur qui ne peut pas acceder à votre boutique, il peut toujour valider cette commande sur le lien ci-dessous.</h3>
        <button class="btn btn-primary">marquer comme livrée</button>
    </div>
    <div>
        <h5>
            Lien public pour votre livreur
        </h5>
        <h6 class="ClientTitle" style="color:blue;">https://hamoprise.com/livraison?C=Ref32L98776<span class="btn btn-primary">copier</span></h6>
        <button class="btn btn-primary"> Envoyer au Livreur</button>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModalCommande");

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
function afficheClient(id) {
  modal.style.display = "block";
  
  var nomC=document.getElementById(id+"nomClient").textContent;
  var numeroC=document.getElementById(id+"NumeroClient").textContent;
  var mailC=document.getElementById(id+"mailClient").textContent;
  var AdressC=document.getElementById(id+"AdresseLivraison").textContent;
  
  document.getElementById("nomClient").innerHTML=nomC;
  document.getElementById("NumeroClient").innerHTML=numeroC;
  document.getElementById("mailClient").innerHTML=mailC;
  document.getElementById("AdresseLivraison").innerHTML=AdressC;
  document.getElementById("idAppel").innerHTML=`<div  style="width:30px;height:30px;border-radius:20px;display:grid;justify-content:center;float:right;margin:left:10px;" class=\"btn btn-success\"> <a id=\"callNumber\" href=\"tel:`+numeroC+`\"><img alt=\"call number" src=\"/images/call2.png\"><h6 style="font-size:5px;">Appeler</h6></a><h4 id=\"callNumber\"></h4>
  </div>`;

 document.getElementById("idMail").innerHTML='<a href=\"mailto:'+mailC+'\"><img src="/images/sendMail.png" /></a>';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



                  
         </div>
     </div>
     
     <div id="AnalyseBox">
         <div id="DivInAnalyseBox" style="background: #00;
  color: #ff;">
         <div class="divDespacement" style="height:100px;">
             
         </div>
         <style>
         .chiffresListeItem{
             float:left; width:20%;height:20%;background-color:white; margin-left:3%; border-radius:5px;
         }
             .iconChifreDiv{
                 background-color:#1fb141;width:25%;height:45%;border-radius:50px;display: grid;
  justify-content: center;align-content: center;
             }
             #iconChifreDiv1{
                background-color: #1fb141;
             }
             #iconChifreDiv2{
                background-color: #2697FF;
             }
             #iconChifreDiv3{
                background-color: #FF5757;
             }
             #iconChifreDiv4{
                background-color: #Ffa500;
             }
             .iconChifreDiv img{
                 width:35px;
             }
             div.space{
                 margin-bottom:15%;
             }
             .diagram{
                 width:70%;
                 margin-left:10%;
                 display: grid;
  justify-content: center;
             }
             div.listeVide{
                 background-color: red;
             }
              @media (max-width: 1240px) {
                  .iconChifreDiv{
                 width:46%;height:25%;border-radius:50px;display: grid;
  justify-content: center;align-content: center;
             }
             
             .iconChifreDiv img{
                 width:18px;height:18px;
             }
             div.space{
                 margin-bottom:40%;
             }
             diagram{
                 width:100%;
             }
             #myChart{
                 width:100%;max-width:600px;
             }
              }
         </style>
         <diV class="chiffresListe">
             <div class="chiffresListeItem" >
                 <div class="iconChifreDiv" id="iconChifreDiv1">
                     <img  src="images/produitVue.png">
                 </div>
                 <div class="TexteChiffreDiv">
                     <h2 style="size:50%; margin-top:6%;"><span id="Nb_Produit"><?
         try{ echo session('boutique')->Nbr_Produit; 
         }
         catch(Exception $e){
         }?></span>
         </h2>
                     <h4>Articles Total</h4>
                 </div>
             </div>
             
             <div class="chiffresListeItem" >
                 <div class="iconChifreDiv" id="iconChifreDiv2">
                     <img src="images/ProduitVisite.png">
                 </div>
                 <div class="TexteChiffreDiv">
                     <h2 style="size:50%; margin-top:6%;">
                     <span><?
         try{ echo session('boutique')->nbArticleVisites; 
         }
         catch(Exception $e){
         }?>
         </span>
         </h2>
                     <h4>articles visités</h4>
                 </div>
             </div>
             
             <div class="chiffresListeItem">
                 <div class="iconChifreDiv" id="iconChifreDiv3" >
                     <img style="width:35px;" src="images/BoutiqueVue.png">
                 </div>
                 <div class="TexteChiffreDiv">
                     <h2 style="size:50%; margin-top:6%;">
                     <span><?
         try{ echo session('boutique')->nbVisites; 
         }
         catch(Exception $e){
         }?></span>
         </h2>
                     <h4>visite dans la boutique</h4>
                 </div>
             </div>
             
              <div class="chiffresListeItem" >
                 <div class="iconChifreDiv" id="iconChifreDiv4" >
                     <img src="images/CommandeRecu.png">
                 </div>
                 <div class="TexteChiffreDiv">
                     <h2 style="size:50%; margin-top:6%;">
                          <span><?
         try{ echo session('boutique')->nbCommandeRecu; 
         }
         catch(Exception $e){
         }?></span>
         </h2>
                     <h4> commandes reçu</h4>
                 </div>
             </div>
             
         </diV>
      
         
        
         
         
         
        
         
        
           <div class="space">
               
           </div>
<div class="diagram">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   <canvas id="myChart" ></canvas>
<canvas id="myChartCourbe"></canvas>

<script>
var max1=document.getElementById('max1').value;

var max2=document.getElementById('max2').value;
var max3=document.getElementById('max3').value;

var libel1=document.getElementById('libel1').value;

var libel2=document.getElementById('libel2').value;
var libel3=document.getElementById('libel3').value;
// var max1=document.getElementById('max1').value;
const xValues = [libel1, libel2, libel3, "USA", "Argentina"];
const yValues = [max1, max2, max3, 0, 0];
const barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Visites par produit"
    }
  }
});

<!--window.addEventListener('load',() => {-->
var Liste_nbVisites=[];
var i=0
  var id = document.getElementById('id_B').value;

                 $.ajax({
                    url: "/visite-derniers-jours?id="+id
                })
                .done(function( data ) {
                var aujourdui=new Date();
                   for( i=0;i<30;i++){
                   if(data.liste[i].jour<=data.aujourdhui){
                    Liste_nbVisites[i]= data.liste[i].nbVisites;
                   }
                  

                   }
                });
                
                
<!--});-->

const jours = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
//[0,4,12,50,5,120,13,3,0,1,34],
new Chart("myChartCourbe", {
  type: "line",
  data: {
    labels: jours,
    datasets: [{ 
      data: Liste_nbVisites, 
      borderColor: "#2697FF",
      fill: false
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Visite de la boutique selon le jour"
    }
  }
});
</script>
         </div>
         <p style="margin-top:10px;">Nombre de visite pour tout les articles<span> 54</span></p>
<p>Liste des articles visités </p>

             
         </div>
     </div>
     
     <div id="RecetteBox">
         <div id="DivInRecetteBox">
         <style>
         <!--#RibIcon{-->
         
         <!--}-->
         </style>
             <!--<img src="images/revenue.jpg" height="300" style="margin-bottom:60px; height:80px;" >-->
             
         
         <div class="divEspaceFonds_Et_head" style="display:block;">
             </div>
             <div style="display:block;">
             <h1 class="fond" style="color:black;"><?php
         try{
         echo 'Mes Fonds : '.Boutique::find(session("boutique")->id)->solde." €"; 
         }
         catch(Exception $e){
         }?></h1>
         </div>
         
         <!--<button class="btn btn-primary">Mon RIB(IBAN)</button>-->

         <!--<button class="btn btn-primary"> Trnasactions</button>-->
       
        <div style="display:grid;justify-content:center;">
            <div style="display:grid;justify-content:center;">
                <img  id="RibIcon" src="images/RibIcon.png" alt="RIB">
            </div>
             <div style="display:grid;justify-content:center;">
                  <img id="TransactionIcon" src="images/TransactionIcon.png" alt="Tansaction">
             </div>

        </div>
       
       


         
         
        
         <h2 style="color:black;"> Liste des articles vendus</h2>
         <table class="table table-striped">
         <thead>
         <tr>
       
         <th>article</th>
         <th>prix</th>
         <th> date</th>
         </tr>
         </thead>
        
         </table>
       
       <?php
       try{
          
            if(session('boutique')->nbCommandeRecu==0){
                        // Boutique n'ap pas de produit
            echo '<div  style="width:100%;height:100%;display:grid;justify-content:center;align-content:start;">';
            echo '<div style="margin-left:30%;background-color:#808080;border-radius:73px;width:150px;height:150px;display:grid;justify-content:center;align-content:center; ">';
             echo '<img src="/images/contenueVide.png">';
            echo '</div>';
            // echo '<p>Aucun Produit</p>';
            echo '<h3 style="padding-left:18%;" >Aucun article vendu</h3>';
            // echo '</div>';
            //   echo '<div style="width:100%;display:grid;justify-content:center;">';
            
            echo '<p>Les article vendus appraitront ici. Vous n\'avez vendu aucun article pour l\'instant.</p>';

            echo '</div>';
            
           
       
        }
       }
       catch(Exception $e){
           echo 'session expirée';
       }
      
       ?>
           
         
         </div>
         
     </div>
     
     <div id="PayementBox">
         
            
         <div id="smart-button-container">
              <h1>
             Votre section de payement pour votre abonnement sur Hamoprise
        </h1>
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
        </div>
    </div>
    
         
        
    
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
  
   
     </div>
     
     
     
     <div id="ProfilBox">
         
         
         <div id="DivInProfilBox" align="center">

<button>Marketing</button><br>

<button>Message</button><br>
<button>Profil</button><br>
<button>Licence Hamoprise</button><br>
<?php try {
    echo '<a href="https://hamoprise.com/boutique?id='.session('boutique')->id.'">  appercu</a>';
}
catch(Exception $e){
    echo "session expirée";
}
?>
<div><img src="images/RibIcon.png" alt="RIB"></div>
<button>dashbord propietaire</button><br>
       
    <h1> votre profil</h1><br><br><form action="{{url('/boutique/profil/modifierProfil')}}" method="post" enctype="multipart/form-data">

{{ @csrf_field() }}


<?php

    // template pour le profile
    // https://bootsnipp.com/snippets/K0ZmK
 
 // echo '<img src="'.session('boutique')->photo_profil.'">';
try{
	echo '<input type="file" name="photo_profil"><br>
    <input  style="display:none;" type="number" name="id_B" value="'.session('boutique')->id.'" >
<h3>Boutique</h3>

<label for="nom_B">Nom de la boutique</label>
    <input type="text" name="nom_B" id="nom_B" class="form-control" value="'.session('boutique')->nom_B.'" autofocus>
   <label for="">Nom de la boutique</label>
    <input type="text" name="adresse_B" class="form-control" value="'.session('boutique')->adresse_B.'">
    <h3> Vendeur</h3>
    <label for="">Nom de la boutique</label>
     <input type="text" name="nom_V" class="form-control" value="'.session('vendeur')->nom_V.'">
     <label for="">Nom de la boutique</label>
      <input type="text" name="prenom_V" class="form-control" value="'.session('vendeur')->prenom_V.'">
      <label for="">Nom de la boutique</label>
    <input type="text" name="adresse_V" class="form-control" value="'.session('vendeur')->adresse.'">
    <label for="nom_B">Nom de la boutique</label>
     <input type="text" name="tel_V" class="form-control" value="'.session('vendeur')->tel.'">
     <label for="nom_B">Nom de la boutique</label>
     <input type="password"  class="form-control" name="mpass" id="mpassHiden" value="'.session('vendeur')->mpass.'">
     <i class="far fa-eye" id="togglePassword" onclick="ShowPassword() style="margin-left: -30px; cursor: pointer;"></i>
     <input type="checkbox" class="form-control" onclick="ShowPassword()">Afficher le mot de passe
    <input style="display:none;" type="text" name="id_V" value="'.session('boutique')->id_V.'"><br>


    <input class="btn btn-primary"  style="width:120px;" type="submit" name="changer" value="Enreigistrer">
</form>


';
}
catch(Exception $e){
    
}
?>
<form action="{{url('/boutique/profil/deconnecter')}}" method="post">
   {{ @csrf_field() }}
   <?php
   try{
    echo '<input  style="display:none;" type="number" name="id_B" value="'.session("boutique")->id.'">';
   }
   catch(Exception $e){
       
   }
    ?>
    <input  class="deconnecter"  type="submit" name="deconnecter" value="deconnecter">
 </form>







 </div>

     </div>
      <!--fin profi box-->
       
        
       
        
            <script type="text/javascript" src="wwwroot/JS/jquery-2.1.4.min.js"></script>
            <script type="text/javascript" src="wwwroot/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/jquery.validate.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/jquery.validate.unobtrusive.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/alertify.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/jquery.dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/dataTables.select.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/moment.min.js"></script>
            <script type="text/javascript" src="wwwroot/JS/Commandeer.js"></script>
        
      
        
     
    
     
<div id="nav2">
    <ul>
        <li>
            <a hre="#" onclick="Article()">
               <span>Home</span>
              
               <!--<img src="/images/panier-icon.png"/>-->
               <img id="NoIconProduitActive" class="menuIcon" onclick="ActiverProduitIcon()" src="/images/ProduitNoir.png"/>
                            
            <img id="IconProduitActive" class="menuIcon"  src="/images/ProduitRouge.png"/>
     
            <script>
           
            document.getElementById("NoIconProduitActive").style.display="none";
                function ActiverProduitIcon(){
                    document.getElementById("NoIconProduitActive").style.display="none";
                    document.getElementById("IconProduitActive").style.display="block";
                    
                     document.getElementById("IconRevenueActive").style.display="none";
                    document.getElementById("IconCommandeActive").style.display="none";
                    document.getElementById("IconAnalyseActive").style.display="none";
                    
                     document.getElementById("IconParamettreActive").style.display="none";
                     
                     document.getElementById("NoIconCommandeActive").style.display="block";
                     document.getElementById("NoIconAnalyseActive").style.display="block";
                    
                     document.getElementById("NoIconRevenueActive").style.display="block";
                      document.getElementById("NoIconParamettreActive").style.display="block";
                    
                }
         </script>
               <!--<ion-icon name="home"></ion-icon>?-->
            </a>
        </li>
        <li>
            <a href="#"  onclick="CommandeAfficher()">
                <span>Commande</span>
                   <img id="NoIconCommandeActive"  class="menuIcon" onclick="ActiverCommandeIcon()" src="/images/CommandeNoir.png"/>
                            
            <img id="IconCommandeActive"  class="menuIcon"  src="/images/CommandeRouge.png"/>
     
            <script>
            document.getElementById("IconCommandeActive").style.display="none";
                function ActiverCommandeIcon(){
                    document.getElementById("NoIconCommandeActive").style.display="none";
                    document.getElementById("IconCommandeActive").style.display="block";
                    
                    document.getElementById("IconProduitActive").style.display="none";
                    document.getElementById("IconAnalyseActive").style.display="none";
                    document.getElementById("IconRevenueActive").style.display="none";
                    
                     document.getElementById("IconParamettreActive").style.display="none";
                     
                    //  document.getElementById("NoIconProduitActive").style.display="block";
                    //  document.getElementById("NoIconAnalyseActive").style.display="block";
                    
                    //  document.getElementById("NoIconRevenueActive").style.display="block";
                    //   document.getElementById("NoIconParamettreActive").style.display="block";
                      
                      
                      
                       document.getElementById("NoIconProduitActive").style.display="block";
                     document.getElementById("NoIconAnalyseActive").style.display="block";
                    
                     document.getElementById("NoIconRevenueActive").style.display="block";
                      document.getElementById("NoIconParamettreActive").style.display="block";
                    
                }
         </script>
                       
            </a>
        </li>
        <li>
            <a href="#" onclick="AnalyseAfficher()">
                <span>Analyse</span>
                <!--<ion-icon name="build"></ion-icon>-->
                            <img id="NoIconAnalyseActive"  class="menuIcon" onclick="ActiverAnalyseIcon()" src="/images/AnalyseNoir.png"/>
                            
            <img id="IconAnalyseActive"  class="menuIcon"  src="/images/AnalyseRouge.png"/>
     
            <script>
            document.getElementById("IconAnalyseActive").style.display="none";
                function ActiverAnalyseIcon(){
                    document.getElementById("NoIconAnalyseActive").style.display="none";
                    document.getElementById("IconAnalyseActive").style.display="block";
                    
                     document.getElementById("IconProduitActive").style.display="none";
                    document.getElementById("IconCommandeActive").style.display="none";
                    document.getElementById("IconRevenueActive").style.display="none";
                    
                     document.getElementById("IconParamettreActive").style.display="none";
                     
                      document.getElementById("NoIconProduitActive").style.display="block";
                     document.getElementById("NoIconCommandeActive").style.display="block";
                    
                     document.getElementById("NoIconRevenueActive").style.display="block";
                      document.getElementById("NoIconParamettreActive").style.display="block";
                    
                }
         </script>
            </a>
        </li>
        <li>


<style>
               .bubble {
  border-radius: 100%;
  height: 14px;
  width: 14px;
  background-color: rgba(226, 32, 91, 0.77);
  color: #ffffff;
  text-align: top;
  position: relative;
  top: 0px;
  float: right;
  right: -3px;
}
       </style>
 
            <a href="#"  onclick="RecetteAfficher()">
                <span>Fonds</span>
                <!--<ion-icon name="chatbox"></ion-icon>-->
                <img id="NoIconRevenueActive"  class="menuIcon" onclick="ActiverRevenueIcon()" src="/images/RevenueNoir.png"/>
                <!--<ion-icon name="chatbox"></ion-icon>-->
                <img id="IconRevenueActive"  class="menuIcon" onclick="ActiverRevenueIcon()" src="/images/RevenueRouge.png"/>
                  <script>
                  
            document.getElementById("IconRevenueActive").style.display="none";
                function ActiverRevenueIcon(){
                    document.getElementById("NoIconRevenueActive").style.display="none";
                    document.getElementById("IconRevenueActive").style.display="block";
                    
                     document.getElementById("IconProduitActive").style.display="none";
                    document.getElementById("IconCommandeActive").style.display="none";
                    document.getElementById("IconAnalyseActive").style.display="none";
                    
                     document.getElementById("IconParamettreActive").style.display="none";
                     
                     document.getElementById("NoIconProduitActive").style.display="block";
                     document.getElementById("NoIconCommandeActive").style.display="block";
                    
                     document.getElementById("NoIconAnalyseActive").style.display="block";
                      document.getElementById("NoIconParamettreActive").style.display="block";
                    
                }
         </script>
            </a>
        </li>
        <li>
            <a href="#" onclick="ProfilAfficher()">
                <span>Paramettre</span>
                <!--<ion-icon name="chatbox"></ion-icon>-->
               <img id="NoIconParamettreActive"  class="menuIcon" onclick="ActiverParamettreIcon()" src="/images/SettingNoir.png"/>
                <img id="IconParamettreActive"  class="menuIcon" onclick="ActiverParamettreIcon()" src="/images/SettingRouge2.png"/>
                 <script>
                  
            document.getElementById("IconParamettreActive").style.display="none";
                function ActiverParamettreIcon(){
                    document.getElementById("NoIconParamettreActive").style.display="none";
                    document.getElementById("IconParamettreActive").style.display="block";
                    document.getElementById("IconProduitActive").style.display="none";
                    document.getElementById("IconCommandeActive").style.display="none";
                     document.getElementById("IconAnalyseActive").style.display="none";
                     document.getElementById("IconRevenueActive").style.display="none";
                     document.getElementById("NoIconProduitActive").style.display="block";
                     document.getElementById("NoIconCommandeActive").style.display="block";
                     document.getElementById("NoIconAnalyseActive").style.display="block";
                     document.getElementById("NoIconRevenueActive").style.display="block";
                    
                }
         </script>
            </a>
        </li>
        
    </ul>
</div>

     
     
     
     
     
      <!--<div class="sideBarMobile">-->
      <!--       <ul class="nav-links">-->
      <!--  <li>-->
      <!--    <a href="#" id="DashbordId" onclick="Article()" class="active">-->
      <!--      <i style="" class='bx bx-grid-alt' ></i>-->
      <!--      <img src="/images/panier-icon.png"/>-->
      <!--      <span class="links_name">Articles</span>-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a id="CommandeId" onclick="CommandeAfficher()" href="#">-->
      <!--      <i class="bx bx-command"></i>-->
      <!--      <span class="links_name">Commande</span>-->
            
      <!--    </a>-->
      <!--  </li>-->

      
      <!--  <li>-->
      <!--    <a id="AnalyseId" onclick="AnalyseAfficher()" href="#">-->
            <!--<i class='bx bx-bar-chart' ></i>-->
            <!--<span class="links_name">Analyse</span>-->
      <!--      <img id="NoIconAnalyseActive" onclick="ActiverAnalyseIcon()" src="/images/AnalyseNoir.png"/>-->
      <!--      <img id="IconAnalyseActive"  src="/images/AnalyseRouge.png"/>-->
      <!--      <script>-->
      <!--      document.getElementById("IconAnalyseActive").style.display="none";-->
      <!--          function ActiverAnalyseIcon(){-->
      <!--              document.getElementById("NoIconAnalyseActive").style.display="none";-->
      <!--              document.getElementById("IconAnalyseActive").style.display="block";-->
                    
      <!--          }-->
      <!--      </script>-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a id="RecetteId" onclick="RecetteAfficher()" href="#">-->
      <!--    <i class="bx-currency-dollar"></i>-->
          <!-- <i class="fa fa-dollar" style="font-size:24px;color:white"></i> -->
            <!--<span class="links_name">Recette</span>-->
      <!--      <img src="/images/RevenueNoir.png"/>-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a id="PayementId" onclick="PayementAfficher()" href="#">-->
      <!--      <i class="bx bx-credit-card"></i>-->
      <!--      <span class="links_name">Payement</span>-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a id="ProfilId" onclick="ProfilAfficher()" href="#">-->
      <!--    <i class="bx bx-**"></i>-->
            <!--<span class="links_name">Profil</span>-->
      <!--      <img  src="/images/profileNoir.png"/>-->
      <!--    </a>-->
      <!--  </li>-->
      <!--</ul>-->
      <!--</div>-->
      
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

// function CommandeAfficher(){
//     document.getElementById("CommandeBox").style.display="block";
//     $("#CommandeId").attr('class',"active");
//     $("#DashbordId").attr('class',"unactive");
// }

function Article(){
    
    $("#DashbordId").attr('class',"active");
    $("#CommandeId").attr('class',"unactive");
    $("#AnalyseId").attr('class',"unactive");
    $("#RecetteId").attr('class',"unactive");
    $("#PayementId").attr('class',"unactive");
    $("#ProfilId").attr('class',"unactive");
    document.getElementById("ArticleBox").style.display="block";
    document.getElementById("CommandeBox").style.display="none";
    document.getElementById("AnalyseBox").style.display="none";
    document.getElementById("RecetteBox").style.display="none";
    document.getElementById("PayementBox").style.display="none";
    document.getElementById("ProfilBox").style.display="none";
}
function CommandeAfficher(){
         $("#DashbordId").attr('class',"unactive");
    $("#CommandeId").attr('class',"active");
    $("#AnalyseId").attr('class',"unactive");
    $("#RecetteId").attr('class',"unactive");
    $("#PayementId").attr('class',"unactive");
    $("#ProfilId").attr('class',"unactive");
    document.getElementById("ArticleBox").style.display="none";
    document.getElementById("CommandeBox").style.display="block";
    document.getElementById("AnalyseBox").style.display="none";
    document.getElementById("RecetteBox").style.display="none";
    document.getElementById("PayementBox").style.display="none";
    document.getElementById("ProfilBox").style.display="none";
    
    document.getElementById("DivInCommandeBox").style.display="block";
}

function AnalyseAfficher(){
        $("#DashbordId").attr('class',"unactive");
    $("#CommandeId").attr('class',"unactive");
    $("#AnalyseId").attr('class',"active");
    $("#RecetteId").attr('class',"unactive");
    $("#PayementId").attr('class',"unactive");
    $("#ProfilId").attr('class',"unactive");
    
    document.getElementById("ArticleBox").style.display="none";
    document.getElementById("CommandeBox").style.display="none";
    document.getElementById("AnalyseBox").style.display="block";
    document.getElementById("RecetteBox").style.display="none";
    document.getElementById("PayementBox").style.display="none";
    document.getElementById("ProfilBox").style.display="none";
    
     document.getElementById("DivInAnalyseBox").style.display="block";
}
    
function RecetteAfficher(){
        $("#DashbordId").attr('class',"unactive");
    $("#CommandeId").attr('class',"unactive");
    $("#AnalyseId").attr('class',"unactive");
    $("#RecetteId").attr('class',"active");
    $("#PayementId").attr('class',"unactive");
    $("#ProfilId").attr('class',"unactive");
    
    document.getElementById("ArticleBox").style.display="none";
    document.getElementById("CommandeBox").style.display="none";
    document.getElementById("AnalyseBox").style.display="none";
    document.getElementById("RecetteBox").style.display="block";
    document.getElementById("PayementBox").style.display="none";
    document.getElementById("ProfilBox").style.display="none";
    
    document.getElementById("DivInRecetteBox").style.display="block";
}
    
function PayementAfficher(){
        $("#DashbordId").attr('class',"unactive");
    $("#CommandeId").attr('class',"unactive");
    $("#AnalyseId").attr('class',"unactive");
    $("#RecetteId").attr('class',"unactive");
    $("#PayementId").attr('class',"active");
    $("#ProfilId").attr('class',"unactive");
    
    document.getElementById("ArticleBox").style.display="none";
    document.getElementById("CommandeBox").style.display="none";
    document.getElementById("AnalyseBox").style.display="none";
    document.getElementById("RecetteBox").style.display="none";
    document.getElementById("PayementBox").style.display="block";
    document.getElementById("ProfilBox").style.display="none";
    
    document.getElementById("smart-button-container").style.display="block";
    document.getElementById("smart-button-container").style.paddingTop="150";
    
}  

function ProfilAfficher(){
        $("#DashbordId").attr('class',"unactive");
    $("#CommandeId").attr('class',"unactive");
    $("#AnalyseId").attr('class',"unactive");
    $("#RecetteId").attr('class',"unactive");
    $("#PayementId").attr('class',"unactive");
    $("#ProfilId").attr('class',"active");
    
    document.getElementById("ArticleBox").style.display="none";
    document.getElementById("CommandeBox").style.display="none";
    document.getElementById("AnalyseBox").style.display="none";
    document.getElementById("RecetteBox").style.display="none";
    document.getElementById("PayementBox").style.display="none";
    document.getElementById("ProfilBox").style.display="block";
    
    document.getElementById("DivInProfilBox").style.display="block";
    document.getElementById("DivInProfilBox").style.paddingTop="100";
} 
  
  
  
  
  
  function launchModal(id){
      
history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(1);
  
      modal.style.display = "none";
history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(-1);
};

};
  var idStr=id+"id";
  var idLibelle=id+"libelle";
  var idPrix=id+"prix";
  var idDescription=id+"description";
  var idStripe_id=id+"stripe_id";
  var libelleValue=document.getElementById(idLibelle).textContent; 
  var Prix=document.getElementById(idPrix).textContent;
  var Description=document.getElementById(idDescription).textContent;
  var Stripe_id_input=document.getElementById(idStripe_id).value;
 
 
  var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(idStr);
var modalImg = document.getElementById("img01");


var libelleModal=document.getElementById("libelleidInModal");
var prixModal=document.getElementById("prixidInModal");
var descriptionModal=document.getElementById("descriptionidInModal");
var idProduitModal=document.getElementById("idInModal");
var idProduitModalInDeleteForm=document.getElementById("idInModalForDelete");
var stripe_idInModal=document.getElementById("stripe_idInModalForDelete");
modal.style.display = "block";
  modalImg.src = img.src;
    
  libelleModal.value=libelleValue;
  var matches = Prix.match(/(\d+)/);
             
            if (matches) {
                
                      prixModal.value=matches[0];
            }
  
  descriptionModal.value=Description;
  idProduitModal.value=id;
  idProduitModalInDeleteForm.value=id;
  
  stripe_idInModal.value=Stripe_id_input;
 
  stripe_idInModal.style.display="none";
  // document.getElementById("description").value=description;  


// Get the <span> element that closes the modal

var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
// When the user clicks on <span> (x), close the modal
document.getElementById("ProductLink").value="https://hamoprise.com/boutique/produit?id="+id;
ShareProduct(id);
document.getElementById("ProductLinkForApercu").setAttribute("href", "https://hamoprise.com/boutique/produit?id="+id)

span.onclick = function() {
  modal.style.display = "none";
history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(-1);
};
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  }
  
  }
  
  
  
  function addProduct(){
      
  var modal = document.getElementById("myModal3");

modal.style.display = "block";
    
// Get the <span> element that closes the modal

var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  }
  }
  
   function ShowPassword() {
  var x = document.getElementById("mpassHiden");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function ShareProduct(id){
   

const btn = document.querySelector('#product');


// Share must be triggered by "user activation"
btn.addEventListener('click', async () => {
  try {
    var lien=document.getElementById("ProductLink").value;
    const shareData = {
  title: 'Produit',
  text: ' Hamoprise le reseau commercial internationnal',
  url: lien
   }
    await navigator.share(shareData);
  } catch (err) {
    var lien=document.getElementById("ProductLink").value;
  }
});
}


function modifierArticheAsync(){
    
startLoaderModif();
         var id=document.getElementById("idInModal").value;      
         var prix=document.getElementById("prixidInModal").value;    
         var libelle=document.getElementById("libelleidInModal").value;     
         var description=document.getElementById("descriptionidInModal").value;  
         
         

  var idLibelle2=id+"libelle";
  var idPrix2=id+"prix";
  var idDescription2=id+"description";
//   var idStripe_id=id+"stripe_id";
  
//   const loader = document.querySelector('.loader');



//     loader.classList.add('fondu-out');


 
                $.ajax({
                   
          type:'POST',
          url:'/boutique/produit/modifier',
          data:{id:id, prix:prix, libelle:libelle,description:description},
          dataType: 'JSON',
            success: function (data) {
                stopeLoaderModif();
                document.getElementById(idLibelle2).innerHTML=libelle; 
                document.getElementById(idPrix2).innerHTML=prix;
                document.getElementById(idDescription2).innerHTML=description;
                    //   alert(data.success); 
                    document.getElementById("myModal").style.display="none";
                      alertify.success(data.success);
                       
                    }
                });
}


    
function addProduit(){
    startLoader();
    
     
     
    var formData = new FormData();
         var id_B=document.getElementById("id_B").value;  
         var id_V=document.getElementById("id_V").value;  
         var prix=document.getElementById("prix").value;    
         var libelle=document.getElementById("libelleAdd").value;     
         var description=document.getElementById("descriptionAdd").value;
         var imageP=document.getElementById("output").src;
        
        var fileInput = $('#file-input')[0];
        var file = fileInput.files[0];
        
        
        formData.append("id_B", id_B);
        formData.append("id_V", id_V);
        formData.append("url_photo", file);
        formData.append("prix", prix);
        formData.append("libelle", libelle);
        formData.append("description", description);
        
         $.ajax({
        url: "/boutique/ajouterP",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,  
        dataType: 'JSON',
        success: function (data) {
            
            stopeLoader();
            
               document.getElementById('Nb_Produit').innerHTML=" "+data.Nbr_Produit;
               document.getElementById('uplaodImageIcon').style.display="block";
               document.getElementById("output").style.display="none";
               
               var element=document.getElementById("produit_Vide_Div");
               if (element) {
                document.getElementById("produit_Vide_Div").style.display="none";
                } 
            
            //     var p="<div class=\"produitEntity\"><div><img id=\""+data.id+"id\" class=\"produit\" onclick=\"launchModal(\""+data.id+"\")\"  alt=\"une image d un produit\" src=\""+imageP+"\"> </div><div><p> <span style=\"font-size:15px;\" id=\""+data.id+"libelle\">"+libelle+" </span><br><span style=\"font-size:15px;\"  id=\""+data.id+"prix\" style=\"color:black;float:bottom;\">"+prix+"<span style=\"background-color:#FF9888;color:white; border-radius:3px;\">New</span></span></p></div><p id=\""+data.id+"description\" style=\"display:none;\">"+description+"</p><input type=\"number\" id=\"idBoutique\" style=\"display:none;\" value=\""+id_B+"\"> </div>";
            
            // $("#divForProduitAjoutes").html(p);
                    //   alert(data.id); 
                    
                    
                    const divP = document.createElement("div");
                    divP.classList.add('produitEntity');
                        divP.setAttribute("id",data.id+"produitAdded");
                    
divP.innerHTML = "<div><img id=\""+data.id+"id\" class=\"produit\" onclick=\"launchModal("+data.id+")\"  alt=\"une image d un produit\" src=\""+imageP+"\"> </div><div><p> <span style=\"font-size:15px;\" id=\""+data.id+"libelle\">"+libelle+" </span><br><span style=\"font-size:15px;\"  id=\""+data.id+"prix\" style=\"color:black;float:bottom;\">"+prix+"<span style=\"background-color:#FF9888;color:white; border-radius:3px;\">New</span></span></p></div><p id=\""+data.id+"description\" style=\"display:none;\">"+description+"</p><input type=\"text\" id=\""+data.id+"stripe_id\" value=\""+data.stripe_id+"\" style=\"display:none;\" ><input type=\"number\" id=\"idBoutique\" style=\"display:none;\" value=\""+id_B+"\">";

document.getElementById("divForProduitAjoutes").appendChild(divP);
$("#"+data.id+"produitAdded").load("content.html");
                    document.getElementById("myModal3").style.display="none";
                      alertify.success(data.success);
                       
                    }
    });   
}

function terminer(){
//     var prix=document.getElementById("prixidInModal").value;    
//          var libelle=document.getElementById("libelleidInModal").value;     
//          var description=document.getElementById("descriptionidInModal").value;  
         
         

//   var idLibelle2=id+"libelle";
//   var idPrix2=id+"prix";
//   var idDescription2=id+"description";
// //   var idStripe_id=id+"stripe_id";
  
 
//                 $.ajax({
                   
//           type:'POST',
//           url:'/boutique/produit/modifier',
//           data:{id:id, prix:prix, libelle:libelle,description:description},
//           dataType: 'JSON',
//             success: function (data) {
//                 document.getElementById(idLibelle2).innerHTML=libelle; 
//                 document.getElementById(idPrix2).innerHTML=prix;
//                 document.getElementById(idDescription2).innerHTML=description;
//                     //   alert(data.success); 
//                     document.getElementById("myModal").style.display="none";
//                       alertify.success(data.success);
                       
//                     }
//                 });
}
 </script>

@endsection
