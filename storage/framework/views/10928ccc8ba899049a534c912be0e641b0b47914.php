


<?php $__env->startSection('titre'); ?>
    <?php use App\Models\Boutique;
    /* cette page peut etre referencié pqr deux internaute , soit un client en passage ou un vendeur lui-meme qui va d'abord se connecter*/
  if(isset($_GET['id'])){ /* si c'est client */

  echo Boutique::find($_GET['id'])->nom_B;

}
  else{ /* sinon c'est que c'est vendeur */
     
    echo session('boutique')->nom_B;

  }
  ?>
  <?php $__env->stopSection(); ?>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
     <link href="wwwroot/CSS/bootstrap.min.css" rel="stylesheet" />
         <link href="wwwroot/CSS/font-awesome.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="wwwroot/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
         <link href="wwwroot/CSS/alertify.core.css" rel="stylesheet" />
         <link href="wwwroot/CSS/alertify.default.css" rel="stylesheet" />
     <style>/* Googlefont Poppins CDN Link */
#CommandeBox{
    display: none;
}
.container{
            margin-top: 60px;
            margin-left:  100px;
          
            
        }
        @import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
        }
        .sidebar{
          position: fixed;
          height: 100%;
          width: 180px;
          background: #0A2558;
          transition: all 0.5s ease;
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
          background: #081D45;
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
          font-size: 15px;
          font-weight: 400;
          white-space: nowrap;
        }
        .sidebar .nav-links .log_out{
          position: absolute;
          bottom: 0;
          width: 100%;
        }
        .home-section{
          position: relative;
          background: #f5f5f5;
          min-height: 100vh;
          width: calc(100% - 240px);
          left: 240px;
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
          background: #FF9888;
          display: flex;
          align-items: center;
          position: fixed;
          width: calc(100% - 240px);
          left: 240px;
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
          }
          .sidebar.active{
            width: 220px;
          }
          .home-section{
            width: calc(100% - 60px);
            left: 60px;
          }
          .sidebar.active ~ .home-section{
            /* width: calc(100% - 220px); */
            overflow: hidden;
            left: 220px;
          }
          .home-section nav{
            width: calc(100% - 60px);
            left: 60px;
          }
          .sidebar.active ~ .home-section nav{
            width: calc(100% - 220px);
            left: 220px;
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
        }
        @media (max-width: 1000px) {
          .overview-boxes .box{
            width: calc(100% / 2 - 15px);
            margin-bottom: 15px;
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
        }
        @media (max-width: 550px) {
          .overview-boxes .box{
            width: 100%;
            margin-bottom: 15px;
          }
          .sidebar.active ~ .home-section nav .profile-details{
            display: none;
          }
        }
        </style>
  
  <?php
//   if(isset($_GET['id'])){
//     /*affichage de logo de la boutique au niveau client*/
//      session()->put('id_B',$_GET['id']);
//      echo '<header ><a href="/boutique?id='.$_GET['id'].'"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.Boutique::find($_GET['id'])->photo_profil.'" alt="logo de profil"></figure></a></header><br><br><br><br><hr>';

//   }
//   else{
//     /*affichage de logo de la boutique  au niveau vendeur*/
//  echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

//}
 
 
 
  ?>
<?php $__env->startSection('contenue'); ?>

  <!-- la partie javascript ecrit pour certains boutons de la page -->
  <!-- <script type="text/javascript">
    function ajouter(id_B,id_V){
            document.getElementById('btn-ajout').style.display="none";
      document.getElementById('produit').style.display="block";
      document.getElementById('id_B').value=id_B;
      document.getElementById('id_V').value=id_V;
      document.getElementById("btn-entete").style.display="none";
    }
    function terminer(){
      document.getElementById('produit').style.display="none";
            document.getElementById('btn-ajout').style.display="block";

    }
   
    function annuler(){
      document.getElementById('produit').style.display="none";
      location.reload();
    }
  </script> -->
  <!-- <br><br><br><div id="produit" style="display: none;"> -->

   <!-- formulaire d'ajout d'un produit -->

    <!-- <form action="<?php echo e(url('/boutique/ajouterP')); ?>" method="post" enctype="multipart/form-data">
      <?php echo e(@csrf_field()); ?>

      <input style="display:none;" type="number" name="id_B" id="id_B">
      <input style="display: none;" type="number" name="id_V" id="id_V">
      <label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo" required=""><br>
      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix" required=""> <br><br>
      <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelle" required=""><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description"></textarea><br>
      <input class="btn"  style="background-color: #00FF00;" type="submit" name="Terminer" value="Terminer"  onclick="terminer()">
      <button class="btn" onclick="annuler()">Annuler</button>
    </form>
  </div> -->


  <?php 

//   use Illuminate\Support\Facades\DB;

//   $produits=DB::table('produits')->get();
//   /* affichage des produit etant client */
//   if(isset($_GET['id'])){


//     session()->put('client',1);

//       foreach($produits as $produit){

    
//         if($produit->id_B==$_GET['id']){
                
                

//                 $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
//            echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id.'">'; 
//            echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
//            echo '<p>'.$produit->libelle.'</p>';
//            echo '<h2 style="color:black;">'.$produit->prix.' DT <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';

//            echo "</a>";

//                 }
//           }
//     }
//     else{
//       /* affichage des produits et d'autres boutons suplementaire etant vendeur*/
     

// echo '<div id="btn-entete" style="position:fixed;"><button class="produit" style="background-color:#FFFFF0;">

//     <a 
//     href="/boutique" style="text-decoration:none;"><img class="icon" src="images/icon-produit.jpg"> produits
//    </a>
//   </button>

//   ';



//       echo '<button class="commande">
//         <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-commande.jpg">

//     commandes
//   </a>
//   </button>';
//   echo '<button class="profil">
//         <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-boutique.jpg">

//    profil
//   </a>
//   </button>
//   </div>';
//    $id_B=session('boutique')->id;
//        //  le bouton d'ajout ne peut etre vu que par le vendeur 
//         echo '<br><br><button id="btn-ajout" class="btn-ajout"  onclick="ajouter('.$id_B.','.session('vendeur')->id.')">+</button><br>';
//   session()->put('client',0);
      
//         /* affichage de produit b*/
//         echo "<br>";
//         foreach ($produits as $produit) {
//           if($produit->id_B==session('boutique')->id){
          
//            $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
//           echo '<a style="text-decoration:none;display:inline-block; margin-left:5;" href="/boutique/produit?id='.$produit->id.'">';
//            echo '<img class="produit" style="width:170px;height:160px; border-radius:10px; display:inline-block;" src="/images/'.$nom.'">';
//            echo '<h3>'.$produit->libelle.'</h3>';
           
//             echo '<h2 style="color:black;">'.$produit->prix.' DT <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
//              echo "</a>";

          
//          }

//        }
    

//     }
   

 ?>
 <div class="sidebar">
    <div class="logo-details">
      <?php
        if(isset($_GET['id'])){
    /*affichage de logo de la boutique au niveau client*/
     session()->put('id_B',$_GET['id']);
     echo '<header ><a href="/boutique?id='.$_GET['id'].'"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.Boutique::find($_GET['id'])->photo_profil.'" alt="logo de profil"></figure></a></header><br><br><br><br><hr>';

  }
  else{
    /*affichage de logo de la boutique  au niveau vendeur*/
 echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

}
      ?>
      <!-- <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">App</span> -->
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" id="DashbordId" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Articles</span>
          </a>
        </li>
        <li>
          <a id="CommandeId" onclick="CommandeAfficher()" href="#">
            <i class="bx bx-command"></i>
            <span class="links_name">Commande</span>
          </a>
        </li>

      
        <li>
          <a id="Analyse" onclick="AnalyseAfficher()" href="#">
            <i class='bx bx-bar-chart' ></i>
            <span class="links_name">Analyse</span>
          </a>
        </li>
        <li>
          <a id="Recette" onclick="RecetteAfficher()" href="#">
          <i class="bx-currency-dollar"></i>
          <!-- <i class="fa fa-dollar" style="font-size:24px;color:white"></i> -->
            <span class="links_name">Recette</span>
          </a>
        </li>
        <li>
          <a id="PayementId" onclick="PayementAfficher()" href="#">
            <i class="bx bx-credit-card"></i>
            <span class="links_name">Payement</span>
          </a>
        </li>
        <li>
          <a id="ProfilId" onclick="ProfilAfficher()" href="#">
          <i class="bx bx-**"></i>
            <span class="links_name">Profil</span>
          </a>
        </li>
        
       
      
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span id="profil" class="admin_name">Nom admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>


    <div id="ArticleBox">

    <?php 

  use Illuminate\Support\Facades\DB;

  $produits=DB::table('produits')->get();
  /* affichage des produit etant client */
  if(isset($_GET['id'])){


    session()->put('client',1);

      foreach($produits as $produit){

    
        if($produit->id_B==$_GET['id']){
                
                

                $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
           echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id.'">'; 
           echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
           echo '<p>'.$produit->libelle.'</p>';
           echo '<h2 style="color:black;">'.$produit->prix.' DT <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';

           echo "</a>";

                }
          }
    }
    else{
      /* affichage des produits et d'autres boutons suplementaire etant vendeur*/
     

echo '<div id="btn-entete" style="position:fixed;"><button class="produit" style="background-color:#FFFFF0;">

    <a 
    href="/boutique" style="text-decoration:none;"><img class="icon" src="images/icon-produit.jpg"> produits
   </a>
  </button>

  ';



      echo '<button class="commande">
        <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-commande.jpg">

    commandes
  </a>
  </button>';
  echo '<button class="profil">
        <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-boutique.jpg">

   profil
  </a>
  </button>
  </div>';
   $id_B=session('boutique')->id;
       //  le bouton d'ajout ne peut etre vu que par le vendeur 
        echo '<br><br><button id="btn-ajout" class="btn-ajout"  onclick="ajouter('.$id_B.','.session('vendeur')->id.')">+</button><br>';
  session()->put('client',0);
      
        /* affichage de produit b*/
        echo "<br>";
        foreach ($produits as $produit) {
          if($produit->id_B==session('boutique')->id){
          
           $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
          echo '<a style="text-decoration:none;display:inline-block; margin-left:5;" href="/boutique/produit?id='.$produit->id.'">';
           echo '<img class="produit" style="width:170px;height:160px; border-radius:10px; display:inline-block;" src="storage/images/'.$nom.'">';
           echo '<h3>'.$produit->libelle.'</h3>';
           
            echo '<h2 style="color:black;">'.$produit->prix.' DT <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
             echo "</a>";

          
         }

       }
    

    }
   

 ?>

    </div>
    <div id="CommandeBox" class="home-content">
     
        <div class="container">

    
            <button id="CommandePeriodiqueBtn" onclick="affiche('CommandePeriodiqueBtn')"  class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" >Commande Periodique</button>
            <button id="CommandeImediateBtn" onclick="affiche('CommandeImediateBtn')" class="btn btn-primary"  type="button" data-toggle="modal" data-target="#exampleModal"> Commande Immediat</button>
            <button id="CommandePlanifierBtn" onclick="affiche('CommandePlanifierBtn')" class="btn btn-primary"  type="button" data-toggle="modal" data-target="#exampleModal">Commande Planifié</button>
            <br>
            <br>
        
        
        
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div id="ModalContainer"  class="modal-body">
                   
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  
                </div>
              </div>
            </div>
          </div>
        
        
        
            <table class="table table-striped" style="width: 800px;">
                <thead>
                    <tr> 
                        
                        <th>Etat</th>
                        <th>Message</th>
                        <th>Date de Commande</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="CommandeJournalListe">
                    
                </tbody>
            </table>
        </div>
            
        
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
        
      
        </div>
      </div>
    </div>
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
var nom=sessionStorage.getItem("username");
document.getElementById("profil").innerHTML=nom;
function CommandeAfficher(){
    document.getElementById("CommandeBox").style.display="block";
    $("#CommandeId").attr('class',"active");
    $("#DashbordId").attr('class',"unactive");
}
 </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/BoutiqueAdmin.blade.php ENDPATH**/ ?>