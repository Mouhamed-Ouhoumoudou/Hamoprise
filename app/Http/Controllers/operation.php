<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vendeur;
use App\Models\Boutique;
use App\Models\Document;
use App\Models\Produit;
use App\Models\Visites_derniers_jours;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Abonnement;
use App\Models\Page_content;
use DateTime;
require_once '../vendor/autoload.php';
class operation extends Controller
{
  
  public  function afficherBoutique(){
        
    $boutiques=DB::table('boutiques')->get();
    return view('kassouwa',['boutiques'=>$boutiques]);
  }

  public function rechercher(Request $request){
      
    //   $T=array();
    //   $j=0;
    // $phrase=explode(' ',$request->get('_token'));/* cette ligne nous permet de decouper les mot de la requete un à sous forme d'un tableau des mots*/
    // for ($i=0; $i <count($phrase) ; $i++) { 
    //     // if(strtolower($phrase[$i])!="le"|| strtolower($phrase[$i])!="la" || strtolower($phrase[$i])!="les"){
    //         // $singulier=substr($phrase[$i], -1);
            
    //         $mot=$phrase[$i];
    //         if($i!=count($phrase)-1){
    //           $suvantMot=$phrase[$i+1];
    //       }else{
    //           $suvantMot=$mot;
    //       }
    //     if(substr($mot, -1)=='s'){
    //     $mot=substr($mot,0,strlen($mot)-1);
     
    //     $requete_singuliers=$mot;
    //      }
    //          else{
    //       $requete_singuliers=$mot;
    //   }
    //   if(substr($suvantMot, -1)=='s'){
    //     $suvantMot=substr($suvantMot,0,strlen($suvantMot)-1);
     
    //     $suvantMot=$suvantMot;
    //      }
    //          else{
    //       $suvantMot=$suvantMot;
    //   }
    
       
    //   if($requete_singuliers!="le" && $requete_singuliers!="la" && $requete_singuliers!="un" && $requete_singuliers!="une" && $requete_singuliers!="et" && $requete_singuliers!="en"){

    //               $produits=Produit::query()
    //     ->where('libelle','LIKE',"%".$requete_singuliers."%")->where('id_B',$request->get('id_B'))->get(); /* pour chque mot i du tableau phrase on verifie s'il est dans la table produit */
      
    //      if(count($produits)>0){
    //          $T[$j]=$produits;
    //          $j=$j+1;
    //         // return view('rechercheTemplate1',['produits'=>$produits]);
    //     }
        
    //   }

    //     // }
    //   }
          /*  meme si $produits est vide et bah il faut le retourner , il serait traité par l'autre view*/
    //   return view('rechercheTemplate1',['produits'=>$T,'id_B'=>$request->get('id_B')]);
      
      
      
                
               
      $T=array();
      $j=0;
      $q='chaussure hommes noir';
      $q1='chaussure femme talon en kaki en plus Nike un peu blanc et noires';
    $phrase=explode(' ',$request->get('_token'));/* cette ligne nous permet de decouper les mot de la requete un à sous forme d'un tableau des mots*/
    for ($i=0; $i <count($phrase) ; $i++) { 

            $mot=$phrase[$i];

        if(substr($mot, -1)=='s'){
        $mot=substr($mot,0,strlen($mot)-1);
     
        $requete_singuliers=$mot;
         }
             else{
          $requete_singuliers=$mot;
       }

       
       if($requete_singuliers!="le" && $requete_singuliers!="la" && $requete_singuliers!="un" && $requete_singuliers!="une" && $requete_singuliers!="et" && $requete_singuliers!="en"){

                   $produits=Produit::query()
        ->where('libelle','LIKE',"%".$requete_singuliers."%")->where('id_B',1)->get(); /* pour chque mot i du tableau phrase on verifie s'il est dans la table produit */
      
         if(count($produits)>0){
             $T[$j]=$produits;
             $j=$j+1;
            // return view('rechercheTemplate1',['produits'=>$produits]);
        }
        
       }

        // }
      }
      
      
      function NotExist($e,$tab){
          foreach($tab as $eTab){
              if($e->id==$eTab->get_id()){
                  return $eTab->get_range();
              }
          }
          return -1;
          
      }
              function trier($produits){
            $i=0;
            $j=$i+1;
            $produits2=$produits;
            
            foreach ($produits as $produit){
                
                foreach ($produits2 as $produit2){
                    if($j>=$i){
                    if($produit2->get_score()<$produit->get_score()){
                        $tmp=$produit->get_score();
                        $produit->set_score($produit2->get_score());
                        $produit2->set_score($tmp);
                        
                        $tmp=$produit->get_id();
                        $produit->set_id($produit2->get_id());
                        $produit2->set_id($tmp);
                        
                        $tmp=$produit->prix;
                        $produit->prix=$produit2->prix;
                        $produit2->prix=$tmp;
                        
                        $tmp=$produit->libelle;
                        $produit->libelle=$produit2->libelle;
                        $produit2->libelle=$tmp;
                        
                        $tmp=$produit->url_photo;
                        $produit->url_photo=$produit2->url_photo;
                        $produit2->url_photo=$tmp;
                        
                        $tmp=$produit->description;
                        $produit->description=$produit2->description;
                        $produit2->description=$tmp;
                        
                        $tmp=$produit->id_G;
                        $produit->id_G=$produit2->id_G;
                        $produit2->id_G=$tmp;
                        
                        $tmp=$produit->id_message;
                        $produit->id_message=$produit2->id_message;
                        $produit2->id_message=$tmp;
                        
                        $tmp=$produit->id_B;
                        $produit->id_B=$produit2->id_B;
                        $produit2->id_B=$tmp;
                        
                        $tmp=$produit->id_V;
                        $produit->id_V=$produit2->id_V;
                        $produit2->id_V=$tmp;
                        
                        $tmp=$produit->id_F;
                        $produit->id_F=$produit2->id_F;
                        $produit2->id_F=$tmp;
                        
                        $tmp=$produit->stripe_price;
                        $produit->stripe_price=$produit2->stripe_price;
                        $produit2->stripe_price=$tmp;
                        
                        $tmp=$produit->stripe_id;
                        $produit->stripe_id=$produit2->stripe_id;
                        $produit2->stripe_id=$tmp;
                        
                        $j=$j+1;
                    }
                    
                }                        
                    }

            $i=$i+1;
            $j=$i+1;
            }
            return $produits;
        }
        
        
      $V=array();
        $k=0;

          foreach($T as $t){
          foreach($t as $row){
              $rc=NotExist($row,$V);
              if($rc==-1){
                  $Object=new Document();
                  $Object->set_range($k);
                  $Object->augmente_score(1);
                  $Object->set_id($row->id);
                  $Object->prix=$row->prix;
                  $Object->libelle=$row->libelle;
                  $Object->url_photo=$row->url_photo;
                  $Object->description=$row->description;
                  $Object->id_G=$row->id_G;
                  $Object->id_message=$row->id_message;
                  $Object->id_B=$row->id_B;
                  $Object->id_V=$row->id_V;
                  $Object->id_F=$row->id_F;
                  $Object->stripe_price=$row->stripe_price;
                  $Object->stripe_id=$row->stripe_id;
                 
                  $V[$k]=$Object;
                  $k=$k+1;
              }
              else{
                  $V[$rc]->augmente_score(1);
                   
              }
          }
      }
      
 
    $V_to_Trie=$V;

    $V=trier($V_to_Trie);
    return view('rechercheTemplate1',['produits'=>$V,'id_B'=>$request->get('id_B')]);

  }

  public  function ajouter(Request $request){    
      $vendeurExistes=DB::table('vendeurs')->where('email_V',$request->get('email_V'))->orWhere('tel',$request->get('tel_V'))->get();
        if(count($vendeurExistes)>0){
            return redirect('/connexion_forwarder');
        }
        else{
            
    $add=new vendeur();
    $addB= new Boutique();
    $page_content= new Page_content();
    // $donneeValid=$request->validate(['photo_B' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', /* les extentions du fichier autorisées */
    //     ]);
         
        
    //     $chemin = $request->file('photo_B')->store('images');
        
       // Create a 100*30 image
// $im = imagecreate(100, 100);

// // White background and blue text
// $bg = imagecolorallocate($im, rand(1, 255), rand(0, 255), rand(0, 255));
// $textcolor = imagecolorallocate($im, 0, 0, 255);

// // Write the string at the top left
// $logo=substr($request->get('nom_B'),0,1);
// imagestring($im, 5,50 , 50, $logo, $textcolor);

// // Output the image
// header('Content-type: image/png');


// $imageName=$request->get('nom_B').".png";
// imagepng($im,"storage/MarkImages/$imageName");

// autre methode

$im=imagecreatefrompng("storage/MarkImages/StoreLogoTemplate.png");
$textcolor = imagecolorallocate($im, 0, 0, 0);

// Write the string at the top left
$nom=$request->get('nom_B');


imagestring($im, 340,368 , 540, strtoupper($nom), $textcolor);
// imagestring($im, 16,200 , 195, $mari, $textcolor);

header('Content-type: image/png');
$imageName=$request->get('nom_B').".png";


imagepng($im,"storage/MarkImages/$imageName");
 $hash =password_hash($request->get('mpass'), PASSWORD_DEFAULT);
        $addB->photo_profil="MarkImages/".$imageName;
    if ($request->isMethod('post')) {
        /* insertion de vendeur*/
        $add->nom_V=$request->get('nom_V');
        $add->prenom_V=$request->get('prenom_V');
        $add->mpass=$hash;
        $add->adresse=$request->get('adresse_V');
        $add->email_V=$request->get('email_V');
        $add->tel=$request->get('tel_V');
        $add->enligne=false;
        $add->save();
        // $id_V=$add->id;
        /* insertion de boutique*/
        /* on doit d'abord recuperer l'id de vendeur qui vient d'etre inseré, cet id sera la clé etrangeres dans la boutique en question*/
        $vendeurs=DB::table('vendeurs')->get();  
        foreach($vendeurs as $vendeur){
          if ($vendeur->tel==$request->get('tel_V')) {
            /* on a utilisé tel parceque c'est le seul qui peut etre unique dans les champs de formulaire*/
            $id_V=$vendeur->id;
          }
        }   
        $request->session()->put('vendeur',$vendeur);
        /* et maintenant l'insertion de la boutique*/
        $addB->type="reel";
        $addB->nom_B=$request->get('nom_B');
        $addB->adresse_B=$request->get('adresse_B');
        $addB->id_V=$id_V;
        $addB->Nbr_Produit=0;
        $addB->nbArticleVisites=0;
        $addB->nbVisites=0;
        $addB->nbCommandeRecu=0;
        $addB->nombreSession=0;
        $addB->	headCouleur="#009999";
        $addB->tel=$request->get('tel_V');
        $addB->email=$request->get('email_V');
        $addB->save();
        $idB=DB::getPdo()->lastInsertId();
        
        
                      
       $request->session()->put('boutique',$addB);  
        $page_content->type="about";
        $page_content->image1="/storage/MarkImages/$imageName";
        $page_content->col1_Title='À Propos de '.$request->get('nom_B') ;
        $page_content->col1_p1='Bienvenue chez '.$request->get('nom_B').' votre destination en ligne pour des découvertes uniques et des expériences shopping exceptionnelles. Chez nous, chaque produit a une histoire, et chaque achat contribue à une aventure.';
        $page_content->col1_p2='À '.$request->get('nom_B').', notre mission est de rendre le shopping en ligne simple, inspirant et personnel. Nous nous engageons à vous offrir des produits de qualité qui ajoutent une touche spéciale à votre vie quotidienne.';
        $page_content->col1_p3="Chacun de nos produits est soigneusement sélectionné pour sa qualité exceptionnelle, son design innovant et son impact positif. Nous croyons que chaque achat devrait apporter de la joie et de la satisfaction.";
        $page_content->col2_Title="Service Client Exceptionnel";
        $page_content->col2_p1="Notre équipe dévouée est là pour vous aider à chaque étape. Besoin de conseils, de suivi de commande ou simplement de partager votre expérience d'achat ? Nous sommes à votre disposition.";
        $page_content->col3_Title="Explorez avec Nous";
        $page_content->col3_p1='Rejoignez-nous dans cette aventure shopping en ligne. Découvrez de nouveaux produits régulièrement ajoutés à notre collection et soyez inspiré par le monde merveilleux de '.$request->get('nom_B').' .';
                $page_content->col3_p2='Merci de choisir '.$request->get('nom_B').'. Nous sommes ravis de faire partie de votre histoire shopping ! .';

        $page_content->id_B=session('boutique')->id;
        $page_content->save();  
        
        // pour page contact
                $page_content= new Page_content();
       
        $page_content->type="contact";
   
        $page_content->col1_p1="Nous sommes là pour vous aider et répondre à toutes vos questions. Choisissez l'option qui vous convient le mieux pour entrer en contact avec notre équipe.";
        $page_content->col1_p2="Notre équipe de service client dévouée est prête à vous assister. Si vous avez des questions concernant une commande, un produit ou simplement besoin de conseils, n'hésitez pas à nous contacter.";
                $page_content->col2_p1="Nous sommes là pour vous aider et répondre à toutes vos questions. Choisissez l'option qui vous convient le mieux pour entrer en contact avec notre équipe.";
        $page_content->col1_p2="Notre équipe de service client dévouée est prête à vous assister. Si vous avez des questions concernant une commande, un produit ou simplement besoin de conseils, n'hésitez pas à nous contacter.";

        $page_content->col2_p1=$request->get('email_V');;
        $page_content->col2_p2=$request->get('tel_V');;
        $page_content->id_B=session('boutique')->id;
        $page_content->save();  
        
         $i=0;
         for($i=1;$i<31;$i++){
             $vistes_derniers_jours=new Visites_derniers_jours();
        
        $vistes_derniers_jours->jour=$i;
        $vistes_derniers_jours->nbVisites=0;
        $vistes_derniers_jours->id_B=session('boutique')->id;
        $vistes_derniers_jours->save();
         }
        
        $boutique=$addB;/* pour utiliser ses information une fois connecté*/
        
        
        
        $dateToday=new DateTime();
        $jour_dateToday= $dateToday->format('d');
        $mois_dateToday=$dateToday->format('m');
        $annee_dateToday=$dateToday->format('y');
   
        $date_exp=null;
        if($mois_dateToday==2){
            if($jour_dateToday<=7){
                $day_date_exp=$jour_dateToday+21;
                $month_date_exp=$mois_dateToday;
                $year_date_exp=$annee_dateToday;
                // $date_exp=new DateTime($jour_dateToday+21-$mois_dateToday-$annee_dateToday);
            }
            else if($jour_dateToday>7){
                 $diferance=28-$jour_dateToday;
                 $jours_date_exp=21-$diferance;
                 
                $day_date_exp=$jours_date_exp;
                $month_date_exp=$mois_dateToday+1;
                $year_date_exp=$annee_dateToday;
                //  $date_exp=new DateTime($jours_date_exp-($mois_dateToday+1)-$annee_dateToday);
            }
        }
        else if($mois_dateToday==4 || $mois_dateToday==6 || $mois_dateToday==9 || $mois_dateToday==11)
        {
             if($jour_dateToday<=9){
                 
                 $day_date_exp=$jour_dateToday+21;
                $month_date_exp=$mois_dateToday;
                $year_date_exp=$annee_dateToday;
                // $date_exp=new DateTime($jour_dateToday+21-$mois_dateToday-$annee_dateToday);
            }
            else if($jour_dateToday>9){
                 $diferance=30-$jour_dateToday;
                 $jours_date_exp=21-$diferance;
                 
                 $day_date_exp=$jours_date_exp;
                $month_date_exp=$mois_dateToday+1;
                $year_date_exp=$annee_dateToday;
                
                //  $date_exp=new Date($jours_date_exp-($mois_dateToday+1)-$annee_dateToday);
            }           
        }
        
        
        else{
                         if($jour_dateToday<=10){
                             $day_date_exp=$jour_dateToday+21;
                        $month_date_exp=$mois_dateToday;
                        $year_date_exp=$annee_dateToday;
                        
                        // $date_exp=new DateTime($jour_dateToday+21-$mois_dateToday-$annee_dateToday);
                         }
            else if($jour_dateToday>10){
               
                
                if($mois_dateToday==12){
                    $annee_dateToday=$annee_dateToday+1;
                    $month_date_exp=1;
                }
                else{
                    $month_date_exp=$mois_dateToday+1;
                }
                 $diferance=31-$jour_dateToday;
                 $jours_date_exp=21-$diferance;
                 
                  $day_date_exp=$jours_date_exp;
                $year_date_exp=$annee_dateToday;
                
                //  $date_exp=new DateTime($jours_date_exp-($mois_dateToday+1)-$annee_dateToday);
            }           
        }
        

        
        $abonnment= new Abonnement();
       
        $abonnment->montant=0;
        $abonnment->duree="21 jours";
        $abonnment->day_date_exp=$day_date_exp;
        $abonnment->month_date_exp=$month_date_exp;
        $abonnment->year_date_exp=$year_date_exp;
        $abonnment->mode="essai";
        $abonnment->id_B=session('boutique')->id;
        $abonnment->duree_Non_Confirmee=0;
        $abonnment->text1="Vous avez 21 jours gratuit pour le Forfait Pro";
        $abonnment->text2="Hamoprise offre deux type de licence pour les marchands,la licence gratuite et la licence payante à 12.5 €/ mois.";
        $abonnment->save();

     /* Confirmer le vendeur par mail pour la creation de sa boutique */   
$mail = new PHPMailer;

// $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hamoprise.com//';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@hamoprise.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$email_vendeur=$request->get('email_V');
$mail->Port=465;
$mail->From = 'contact@hamoprise.com';
$mail->FromName = 'Hamoprise';
$mail->addAddress($email_vendeur, $request->get('nom_V')." ".$request->get('prenom_V'));     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Votre Boutique';
// $mail->Body    = 'Bonjour '.$request->get('prenom_V').' Votre boutique \"'.$request->get("nom_B").'\" est Cree avec Sucess, vous pouver des a present vendre vos produits sans aucune configuration particuliere,les clients vennant de google ou de reseaux sociaux peuvent acheter vos produit en toute simplicite , Noubliez pas de joindre votre IBAN dans la rubrique \"Mes Soldes\" afin de vous envoyer vos argents automatiquement une fois les commandes Livrees. </b></b>Votre Societe Hamoprise</b>';

        $mail->Body = "
<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Bienvenue sur Hamoprise</title>
                <style>
                    /* Styles pour l'en-tête */
                    .header {
                        background-color: #FF5757;
                        color: white;
                        padding: 20px;
                        text-align: center;
                    }
                    .logo {
                        max-width: 200px; /* Ajustez la taille de votre logo */
                    }
                    /* Styles pour le contenu */
                    .content {
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    /* Styles pour les boutons */
                                        .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #FF5757;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                    }

                    @media screen and (max-width: 600px) {
                        .button {
                        display: block;
                        margin: 10px 0; /* Ajout de marge entre les boutons pour les appareils mobiles */
                        padding: 10px 20px;
                        background-color: #FF5757;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                        text-align: center;;
                    }
                        .button {
                            display: block;
                            width: 70%;
                            margin-bottom: 10px;
                        }
                    }
                    /* Styles pour le pied de page */
                    .footer {
                        text-align: center;
                        padding: 10px;
                        background-color: #28282B;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <!-- En-tête -->
                <div class='header'>
                    <img class='logo' src='https://hamoprise.com/images/logo-kassouwa-new2.png' alt='Logo de votre marque'> <!-- Remplacez par le chemin vers votre logo -->
                    <h1>Hamoprise</h1>
                </div>

                <!-- Contenu du courriel -->
                <div class='content'>
                    <p>Félicitations ".$request->get('prenom_V').", votre boutique ".$request->get('nom_B')." a été créée avec succès.</p>
                    <p>Nous sommes ravis de vous avoir parmi nous. Utilisez les boutons ci-dessous pour commencer :</p>
                    <p>
                        <a class='button' style=\"color:#ffffff\" href='http://hamoprise.com/BoutiqueAdmin'>Accéder au Tableau de Bord</a>
                        <a class='button' style=\"color:#ffffff\" href='https://hamoprise.com/store?id=$idB'>Visiter votre Boutique</a>
                    </p>


                    <p>Voici quelques ressources pour vous aider à commencer :</p>
                    <ul>
                    
                    <li>
                    <a href=\"https://hamoprise.com/services\">Guides des  interfaces principales</a>
                    </li>

                    <li>

                    <a href=\"https://hamoprise.com/Guide\">Conseils et astuces sur la gestion d'une boutique</a>
                    </li>
                    <li>
                    <a href=\"https://daniloduchesnes.com/facebook-ads-academy/\">Publicité pour atirer des clients </a>
                    </li>
                    </ul>
                    <p>
                    Vous pouvez personnaliser l'apparence de votre boutique, ajouter des produits, ajouter les moyens de reception d'argents, et bien plus encore
                    
                    </p>
                    <p>N'hésitez pas à explorer nos fonctionnalités et à nous contacter si vous avez des questions.</p>
                </div>

                <!-- Pied de page avec plusieurs références -->
                <div class='footer'>
                    <p class='references'>Retrouvez-nous sur : <a href='https://www.facebook.com/profile.php?id=100060345133351'>Facebook</a> | <a href='https://www.youtube.com/channel/UCICRR13kZla4KO3kBUBE_3g'>Youtube</a> | <a href='https://www.instagram.com/hamoprise/'>Instagram</a></p>
                    <p class='references'>Visitez notre site web : <a href='http://www.hamoprise.com'>www.hamoprise.com</a></p>
                </div>
            </body>
            </html>

        ";
$mail->AltBody = 'c\'est le corps du mail';



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  
    echo '<h1 style="color:green;">Le mail de confirmation vous a été envoyé contenant le recu et toutes informations concernant votre achat</h1>';
}
        /*le system m\'envoi un mail qu'une nouvelle boutique a été créé*/


         
// require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hamoprise.com//';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@hamoprise.com';                 // SMTP username
$mail->Password = 'passeword';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port=465;
$mail->From = 'contact@hamoprise.com';
$mail->FromName = 'Hamoprise';
$mail->addAddress("mouhamed.ouhoumoudou7@gmail.com", 'Mouhamed Ouhoumoudou');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Util !! Nouvelle Boutique cree !';
$mail->Body    = 'Un nouveau client vient d\'arrivé, le nom de la boutique est '.$request->get("nom_B").',le nom et prenom du Vendeur est:  '.$request->get('nom_V')." ".$request->get('prenom_V').'</b>';
$mail->AltBody = 'c\'est le corps du mail';



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  
    echo '<h1 style="color:green;">Le mail de confirmation vous a été envoyé contenant le recu et toutes informations concernant votre achat</h1>';
}
    }
    return redirect('/BoutiqueAdmin');
    
        }//fin else
    }

    public function connecter(Request $request){
     // $vendeur=DB::table('vendeurs')->where('tel','=',$request->get('tel_V'))->get();
          $vendeurs=DB::table('vendeurs')->get();
          $boutiques=DB::table('boutiques')->get();
          $produitsAll=DB::table('produits')->get();

         function lignes($table,$col, $val){    /* deux ou une simple ligne d'instruction peut faire ça en utisant "where" (c'est deja mis en commentaire voulez-voyez vous-meme en premiere ligne de la fonction ) de laravel, mais vu qu'il y'a un soucis technique on va creer notre propre fonction qui va nous chercher les informations dont les conditions et la table seront données en arguments  */
             foreach ($table as  $value) {
                 if ($value->$col==$val) {
                        return $value;
                   }
             }
          }
             function lignesG($table,$col, $val,$col2,$val2){ /*  fonction avancee de la premiere*/
             foreach ($table as  $value) {
                 if ($value->$col==$val ||$value->$col2==$val2) {
                        return $value;
                   }

             }
          }
          $vendeur=lignesG($vendeurs,'tel',$request->get('tel_V'),'email_V',$request->get('tel_V'));/* recherche de vendeur qui la requete a envoyé */
          
           $vendeurs = Vendeur::where("tel", $request->get('tel_V'))->orWhere("email_V", $request->get('tel_V'))->get();
           foreach ($vendeurs as  $vndr) {
               if($vndr->tel=="$request->get('tel_V')"){
                   $vendeur=$vndr;
               }
               
           }
          if ($vendeur) { /* si il existe alors on peut se coinnecter avec les donnees de la requetes */
          
            
              $password_hashed = $vendeur->mpass;
 
/* Remember to validate the password. */
/* Create the new password hash. */

$password=$request->get('mpass');

if (password_verify($password, $password_hashed))
  {
    /* The password is correct. */
      $boutique=lignes($boutiques,'id_V',$vendeur->id); /* pour utiliser ses information une fois connecté*/
            $boutiqueUpdate=Boutique::find($boutique->id);
            $boutiqueUpdate->enligne="true";
            $boutiqueUpdate->nombreSession=$boutiqueUpdate->nombreSession+1;
            $boutiqueUpdate->save();
            setcookie(
              'vendeur_cookie',
              $boutique->id_V,
                 [
                'expires' => time() + 3*24*3600,//cree le 13/12/2024 a 2h du matin
                'secure' => true,
                'httponly' => true,
                ]
            );
            setcookie(
              'boutique_cookie',
              $boutique->id,
                 [
                'expires' => time() + 3*24*3600,
                'secure' => true,
                'httponly' => true,
                ]
            );
            $request->session()->put('vendeur',$vendeur);
            $request->session()->put('boutique',$boutique);
//             $params= array(
//       "messaging_product"=> "whatsapp",
//       "recipient_type"=> "individual",
//       "to" => "33758326647",
//       "type"=> "text",
//       "text"=> array( // the text object
//         "preview_url"=> false,
//         "body"=> "MESSAGE_CONTENT"
//         ),
//     );
// $token="EAALR0Ck8EQ0BO7NLHfZASsK1ph5j7YtHPMV6RTWLHWgee5Ec4dzWJHd8MrX6T5smZARfxAJZBZA4B6ZAEDFHDGEm6D6EnmHQNQbTYrgj0ZCpA9J0GCjYf5o9HVEdK76ZBmncOPfuGJOI2dH2UZBh3O6wC3CcaaXvNXzFP8LFMzhdKqXqxekKI2MiTXvFGBOYII5SUBN9GadZCkaDNDNZAm5doMqhBOqu3lUdCdtaorYB8ZA25txcAnjFVLR";
//  $number = "33758326647"; //you can use POST, I tried GET for testing
//      $template = array(
//       'name'=>'hello_world', //your your own or any default template. The names and samples are listed under message templates
//       'language'=>array('code'=>'en_us') //you can use yours
//       );

//      $endpoint = 'https://graph.facebook.com/v16.0/100959132806847/messages';
//      $params = array('messaging_product'=>'whatsapp', 'to'=>$number, 'type'=>'template', 'from'=>'20120834953', 'access_token'=>$token,'template'=>json_encode($template));

//       $headers = array('Authorization'=>$token,'Content-Type'=>'application/json', 'User-Agent'=>'(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
//       $url = $endpoint . '?' . http_build_query($params);

//       $ch = curl_init();
//       curl_setopt( $ch,CURLOPT_URL, $endpoint);
//       curl_setopt( $ch,CURLOPT_POST, true );
//       curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
//       curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
//       curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
//       curl_setopt( $ch,CURLOPT_POSTFIELDS, $params);
//       $result = curl_exec($ch );
//       echo $result; //you can skip this, I did it to check the results
//       curl_close( $ch );
      return redirect('/BoutiqueAdmin');
  }
  else{
      echo "mot de passe incorrect.";
  }


// $params=array(
// 'token' => '1sq42tsctu4rc2ru',
// 'to' => '+33758326647',
// 'body' => 'Boutique connectee !'
// );


/* envoi d'image */




// $instance='instance46139';
// $token='1sq42tsctu4rc2ru';
// $to='+33758326647';
// /////////// 
// $path="storage/images/jA4vmJ6GOmdLHWzq7c833zpuRrt6Khsl8CKnY1Io.jpg";
// $data = file_get_contents($path);
// // you can convert File to Base64  using ultramsg UI
// // https://user.ultramsg.com/app/base64/base64.php 

// //Encodes data base64
// $img_base64 =  base64_encode($data);  
// //urlencode — URL-encodes string  
// $img_base64 =urlencode($img_base64 );
// ////////////
// $curl = curl_init();
// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/image",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_SSL_VERIFYHOST =>0,
//   CURLOPT_SSL_VERIFYPEER =>0,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "token=$token&to=$to&image=$img_base64&caption=l'association OGEN vous invite apour la cotisation mensuelle de 5 euro en cliquant sur ce lien, vous pouvez voir la liste des membre ayant deja payé pour ce moi et leurs photos ! https://hamoprise.com/liste",
//   CURLOPT_HTTPHEADER => array(
//     "content-type: application/x-www-form-urlencoded"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }




            // return redirect('/BoutiqueAdmin');
          }
          else
            echo "echec de connexion verifier les champs";
       
    }
    
    public function askServer()
    {
        // Do all your process here
        $answer = "je vais va bien !!!!";
        return response()->json([
            'answer' => $answer
        ]);
    }
     
    
    public function htmlToPdf(){
        
   require "pdfcrowd.php";

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("mouhamed_ouhoumoudou", "key");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("https://hamoprise.com/boutique?id=1", "example.pdf");
    
     $client = new \Pdfcrowd\HtmlToImageClient("mouhamed_ouhoumoudou", "key");

    // configure the conversion
    $client->setOutputFormat("png");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("https://hamoprise.com", "example.png");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}
    }
 
    
    
}
