<?php 

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" type="image/jpeg" sizes="16x16" href="/images/logo-kassouwa-new.png">
    <link href="/css/app.css" rel="stylesheet">
    
    <style >
    header{
        background-color: #FF9888;

  position: fixed;
 right: 0;
 left: 0;
 top: 0;/*
  top: 50%;
  width: 8em;
  margin-top: -2.5em;*/

    }
    footer{
        background-color: #FF9888;
        bottom: 0;
        left: 0;
        right: 0;

    }
    
fieldset{
    border-radius: 5px;
    top: 50%;
margin-left: 500px;
    width: 350px;
}
.entete-kassouwa div{
    float: left;
}	
   .BoutiqueProfil{
	 height:40px; width: 60px; margin-left:2px; position:fixed;
   }
   .BoutiqueMarkTitle{
	margin-left: 60px;margin-top:20px;font-size:30px;color:white;
   }
   .rechercheBox{
	width:400px;margin-top:7px;
   }
.recherche{
           
		   margin-left: 400px;
		   margin-right: 320px;
		   float: left;
	   }
  .champ-requet{
		   /* margin-top: 10px; */
		   height: 37px;
		   width: 350px ;
		   border-radius: 20px;
		   padding-left: 5px;
		   border-color: #FF9888;


		   /*border-top: 5px;*/
	   }
		 .btn-recherche{
		   
		 /*  margin-top: 10;
		   margin-left: 5px;*/
		   width: 40px;
		   height: 40px;
		   /*border-radius: px;*/
		   /*display: inline-block;*/
		   float: right;


		   
	   }
        .btn-recherche:hover{
            background-color: white;
            border-radius: 5px;
        }
        .compte{

            margin-left: 1000px;
            text-decoration: none;

        }
        .inscription{

            background-color: #00FF00;
            width: 135px;
            border-radius: 5px;
            
        }
         h3.nom-kassouwa{
            display: none;
            color: white;
            font-size: 20px;

        } 
          .triangle{
        width:333px; height:50px;

    }
    .nom-boutique{
    color:black; padding-left:75px;
}
.boutique-photo{
    margin-left: 15px;
    }
       .menu-mobile{
            display: none;
        }
    .btn-mobile-menu{
        display: none;
    }
     .btn-mobile-menu{
        display: none;
        width: 40px;
            height: 40px;
    }
    .btn-quitter-menu{
         display: none;
        width: 40px;
            height: 40px;

    }
    

 @media  screen and (max-width: 824px)  {  /* 480 pour android   */
     

      header{
        background-color: #FF9888;

  position: fixed;
 right: 0;
 left: 0;
 top: 0;]
 height: 60px;/*

  top: 50%;
  width: 8em;
  margin-top: -2.5em;*/

    }
fieldset{
    border-radius: 5px;
    top: 50%;
margin-left: 1px;
    width: 230px;
}
.recherche{
		  
          margin-left: 5px;
          /*margin-right: 320px;*/
          float: left;

      }
         
  .BoutiqueProfil{
     height:20px; width: 30px;  position:fixed;
  }
  
  .BoutiqueMarkTitle{
   margin-left: 35px; margin-top:1px;  font-size:17px;color:white; float: left;
  }
  .rechercheBox{
   width:180px;margin-top:7px;
  }
  .champ-requet{
   
          height: 27px;
          width: 150px ;
          border-radius: 20px;
          padding-left: 5px;
          border-color: #FF9888;
          float:left;
           
          /*border-top: 5px;*/
      }
       .btn-recherche{
          
        /*  margin-top: 10;
          margin-left: 5px;*/

          width: 26px;
          height: 26px;
         
          /*border-radius: px;*/
          /*display: inline-block;*/
         
          /*position: fixed;*/


          
      }
        img.kassouwa-logo{
            display: none;
        }
        .menu{
            display: none;
        }
        .menu-mobile{
            margin-top: 200px;
            display: none;
            background-color: #FF9888;
            width: 158px;
            position: fixed;
            left: 0;
        }
        h3.nom-kassouwa{
            display: block;
            color: white;
            font-size: 20px;

        } 
        .compte{

            margin-left: 1000px;
            text-decoration: none;

        }
        .inscription-mobile{

            background-color: #00FF00;
            width: 135px;
            border-radius: 5px;
            
        }
        .inscription{
            display: none;
        }

        .triangle{
        width:90px; height:10px;
    }
    .boutique-photo{
       
        width: 75px;
        height: 40px;
        margin-left: 5px;
    }
    .nom-boutique{
    color:black; float: right; font-size:15px;margin-left:5px;
}

 .btn-mobile-menu{
        display: block;
        width: 30px;
            height: 30px;
            float:right;
            margin-left:10px;
            
    }
    .btn-quitter-menu{
         display: none;
        width: 30px;
            height: 30px;

    }
    
     button{
            border: none;
            border-radius: 2px;
            font-size: 14px;
            color: white;
            width: 120px;
            margin-left: 20px;
            /*background-color: #FF9888;*/
            
        }
       /* button:hover{
            border-radius: 5px;
            color: white;
            background-color: #FF9888;
            border-color: white;
        } */


            .cadre{
                display: none;
            }




    }
  
        

       

    

        /*.champ-requet:focus{
            margin-top: 10px;
            height: 37px;
            width: 550px ;
            border-radius: 20px;
            padding-left: 5px;
            border: none;
            


        }*/
             
        .titre{
            font-size: 20;
        }
        button{
            border: none;
            border-radius: 2px;
            font-size: 14px;
            color: #FF9888;
            width: 120px;
            margin-left: 20px;
            
        }
        button:hover{
            border-radius: 5px;
            color: white;
            background-color: #FF9888;
            border-color: white;
        }
        
  

        button a{
            color: white;
            

        }
        a{
            text-decoration: none;
        }
        nav{
            margin-right: 1200px;
        }
        img.produit{
            width:190px;height:185px; border-radius:10px;display:inline-block;
        }
        a img.produit:hover{
            /*padding-left: 2px;*/
            padding-bottom: 2px;
        }
        .boutique{
            max-height:200px;max-width: 295px;border-radius:5px;
            padding-left: 25px;
        }
        .boutique:hover{
            /*padding-left: 2px;*/
            padding-bottom: 2px;
        }
        div#section-de-footer div{
            float: left;
            margin-left: 170px;
           
          
        }
        div#section-de-footer{
              background-color: #FF9888;
        bottom: 0;
        left: 0;
        right: 0;
                    /*margin-right: 2px;*/

        }
        .btn-sub{
            background-color: #00FF00; border-bottom-color: #00FF00;border-radius: 5px; width: 200px; font-size: 15px;
        }
        .btn-sub:hover{
            background-color: #40A494; border-bottom-color: #00FF00;border-radius: 5px; width: 200px; font-size: 15px;color: white;
        }
      

    </style>
    <!-- <link rel="stylesheet" type="text/css" href="/public/css/base.css"> -->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <?php echo $__env->yieldContent('style'); ?>
 </head>
 <body style="background-color: #FFFFF0;">
    
    <!-- <header> -->
       
    <div style="background-color: #FF9888;position:fixed;width:100%;">
       

              <!-- <form class="recherche" id="recherche" action="/rechercher" method="get">
             <input class="champ-requet" id="champ-requet" type="search" name="requete" placeholder="Recherche de ..." required="">
             
                <input  class="btn-recherche" id="btn-recherche" type="image" name="recherche" src="images/recherche.png"   onclick="recherche()"> <script > function recherche(){
                    document.getElementById('champ-requet').style.display="block";
                    document.getElementById('nom-kassouwa').style.display="none";
                   

                } </script>

            </form> -->
            <div>
            <div class="BoutiqueProfil">
            <a style="text-decoration: none;" href="/"><img class="BoutiqueProfil"  src="/images/logo-kassouwa-new2.png" alt="logo de kassouwa">
            </div>
                <h3 class="BoutiqueMarkTitle" id="nom-kassouwa">Kassouwa</h3>
                </a>
             <div class="btn-mobile-menu">
                 
                 <input  class="btn-mobile-menu" id="btn-mobile-menu" type="image" name="btn-mobile-menu" src="images/btn_mobile_menu2.png"   onclick="menu()">
             <input  class="btn-quitter-menu" id="btn-quitter-menu" type="image" name="btn-mobile-menu" src="images/btn-quitter-menu.png"   onclick="quitterMenu()">
            </div>
            </div>
              <script >
                function menu(){
                    document.getElementById('menu-mobile').style.display="block";
                    document.getElementById('btn-mobile-menu').style.display="none";
                    document.getElementById('btn-quitter-menu').style.display="block";
                } 
                function quitterMenu(){
                    document.getElementById('menu-mobile').style.display="none";
                    document.getElementById('btn-mobile-menu').style.display="block";
                    document.getElementById('btn-quitter-menu').style.display="none";
                }
            </script>
<div class="compte"> 
             <button class="inscription"><a href="/inscription">creer une boutique</a></button>
                <button class="inscription"><a href="/connexion" target="_blank">se connecter</a></button>
            </div>

            <form class="recherche" id="recherche" action="/rechercher" method="get">
     <div class="rechercheBox">
     
     <input class="champ-requet" id="champ-requet" type="search" name="requete" placeholder="Recherche ..." required="">
     
    
        <input  class="btn-recherche" id="btn-recherche" type="image" name="recherche" src="images/recherche.png"   onclick="recherche()"> 
      
      </div>
    </form>
    
    <div class="menu" id="menu"><button>accueil</button><button>meilleurs ventes</button><button>Nouveautes</button><button ><?php echo '
        <a style="color: #FF9888;" href="/boutique/commande?id='.session('contacts').'">
        <img src="">

    commandes
  </a></button>';
?><button>chaussure</button><button>maquiage</button></div></a></div>

            </div>

    
        
           
                                        
            <?php echo $__env->yieldContent('compte'); ?>

            
            
        <!-- </header> -->
            </div>

             <div class="menu-mobile" id="menu-mobile"><button>accueil</button><br><br><button class="inscription-mobile" ><a href="/inscription">creer une boutique</a></button><br><br><button class="inscription-mobile"><a href="/connexion">se connecter</a></button><br><br>

                <button>meilleurs ventes</button><br><br><button>Nouveautes</button><br><br><button ><?php echo '
        <a style="color: #FF9888;" href="/boutique/commande?id='.session('contacts').'">
        <img src="">

    commandes
  </a></button>';
?><br><br><button>chaussure</button><br><br><button>maquiage</button></div></a></div>
            </div>

        
    
    <main role="main">
</br><br></br><br></br><br></br><br></br>

    <?php echo $__env->yieldContent('contenue'); ?>


    
    
 <br><br><br><br><br><br><br><br><br><br><br><br>
 <footer style="background-color: #FF9888;
        bottom: 0;
        left: 0;
        right: 0;" >
    
     <div id="section-de-footer">
        <hr>
        <div>
        <h3>à propos de kassouwa</h3>
         <a href=""> Qui sommes nous?</a>
     <br><br><a href="">cariere</a>
     <br><br><a href="">contacts</a>
     
     </div>
     <div >

         <h3>gagner de l'argent</h3>
         <a href=""> devenez vendeur</a>
     <br><br><a href="">devenir partenaire</a>
     <br><br>
 </div>
     <div >
          <h3>service client</h3>
         <a href=""> centre de guide</a>
     <br><br><a href="">acheter sur kassouwa</a>
     <br><br><a href="">methode de payement </a>
     <br><br><a href="">expedition & livraison</a>
 </div>
 <div>
       <h3>site kassouwa</h3>
         <a href=""> Niger</a>
     <br><br><a href="">@copyright  juilet 2021</a>
     
 </div>
</div>
     
     
 </footer>
 </body>
 </html><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/base.blade.php ENDPATH**/ ?>