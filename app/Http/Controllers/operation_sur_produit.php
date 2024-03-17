<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use App\Models\Vendeur;
use App\Models\Boutique;
use App\Models\Commande;
use App\Models\Message;
use App\Models\Visites_derniers_jours;
use App\Models\Comptebank;
use App\Models\Abonnement;
use App\Models\Conversation;
use App\Models\Flayer;
use App\Models\Achat;
use PHPMailer\PHPMailer\PHPMailer;
use spatie\PdfToText\Pdf;
use DateTime;
use App\Models\Document;
use Dompdf\Dompdf; 
class operation_sur_produit_test extends Controller

{  /*  la fonction qui nous permet d'ajouter un produit dans une boutique*/
    public function ajouterP(Request $request){
        
        try{
        $stripe = new \Stripe\StripeClient(
  'sk_key'
);
$stripe_produit=$stripe->products->create([
  'name' => $request->get('libelle'),
  'default_price_data' => [
      'unit_amount' => $request->get('prix')*$request->get('deviseMultipliePar'),
      'currency' => $request->get('deviseCode'),
    ],
    'expand' => ['default_price'],
  "description" => $request->get('description').".",
]);

        $p=new Produit();
        // $p->url_photo=$request->get('url_photo');//concatenation avec le nom du fichier et le chemin de dossier ou` il sera envoye
        $donneeValid=$request->validate(['url_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048', /* les extentions du fichier autorisées */
        ]);
         
        
        $chemin = $request->file('url_photo')->store('images');
        $p->url_photo = $chemin;
        $p->prix=$request->get('prix')*$request->get('deviseMultipliePar');
        $p->deviseCode=$request->get('deviseCode');
        $p->deviseMultipliePar=$request->get('deviseMultipliePar');
        $p->deviseSymbole=$request->get('deviseSymbole');
        $p->libelle=$request->get('libelle');
        $p->description=$request->get('description');
        $p->id_B=$request->get('id_B'); 
         $p->id_V=$request->get('id_V');
         $p->stripe_id=$stripe_produit->id;
         $p->stripe_price=$stripe_produit->default_price->id;
        $p->traite="non";
         $p->save();
        $id=DB::getPdo()->lastInsertId();
//          $id = DB::table('produits')->insertGetId([
//     'url_photo' => $chemin,
//     'prix' => $request->get('prix'),
//     'libelle' => $request->get('libelle'),
//     'description' => $request->get('description'),
//     'id_B' => $request->get('id_B'),
//     'id_V' => $request->get('id_V'),
//     'stripe_id' => $stripe_produit->id,
//     'prix' => $stripe_produit->default_price->id
// ]);
         
          $boutique=Boutique::find($request->get('id_B'));
           $boutique->Nbr_Produit= $boutique->Nbr_Produit+1;
            $boutique->save();
         
         $produitsALL=DB::table('produits')->get();
         foreach($produitsALL as $value){
            if ($value->id_B==$request->get('id_B')) {
                $produits=$value;
            }
         }
        //return redirect('/boutique');
        
        $request->session()->put('boutique',$boutique);

 return response()->json([
            'success' =>"Ajouté avec succès",
            'id'=>  $id,
            "stripe_id" => $stripe_produit->id,
            "Nbr_Produit" => session('boutique')->Nbr_Produit
        ]);
}
catch(Exception $e){
    return response()->json([
            'success' =>"Erreur d\'Ajout"
        ]);
}
        // return redirect()->back()->with('messageAdd', "Ajouté avec succes");
     }

/* la fonction qui nous permet de suprimer un produit dont son id est donné dans la requete */
     public function suprimer(Request $request){
try{
      $stripe = new \Stripe\StripeClient(
  'sk_key'
    );
  
$stripe->products->update(
  $request->get('stripe_id'),
  ['active' => false]
);

    $produit=Produit::find($request->id);
        
        $nom=substr($produit->url_photo, 7);
            $link="storage/images/".$nom;
        unlink($link);
        
        $boutique=Boutique::find($produit->id_B);
           $boutique->Nbr_Produit= $boutique->Nbr_Produit-1;
            $boutique->save();
             $request->session()->put('boutique',$boutique);
        $produit->delete();
        return response()->json([
            'success' =>"suprimé avec succès"
        ]);
}
catch(Exception $e){
    return response()->json([
            'success' =>"Erreur de supression"
        ]);
}
        
        
  
        // //return redirect('/boutique');
        // return redirect()->back()->with('messageSup', "suprimé avec succes");
     }

/* la fonction qui nous renvoi une view avec un produit à afficher dont son id est dans la requete*/
     public function afficher(Request $request){
        $produit=Produit::find($request->get('id'));
        return view('produit',['produit'=>$produit]);
     }

/* la fonction qui permet à un prostataeur (client) d'effectuer une commande d 'un produit dans une dans une boutique*/
     public function commande(Request $request){
       /* sur un meme produit ,un numero de telephone(contacts) n'a le droit qu'à une seule commande(il peut preciser la quantité dans le message)donc on doit donc forcer  cette regle avant de passer l'enreigistrement de la commande */
        
        $commandeExs=DB::table('commandes')->where('contacts',$request->get('contacts'))->where('id_P',$request->get('id_P'))->get();
        if(count($commandeExs)>0){
               foreach($commandeExs as $commandeEx){ 
                     if ($commandeEx->id_P==$request->get('id_P') and $commandeEx->contacts==$request->get('contacts')) {
                        
                              echo "<h2> vous avez deja envoye la commande pour ce produit!</h2>";
                     }
               }
          }


        else{ /* si c'est pas le cas alos on effectue la commande */
               $commande= new Commande();
               $commande->contacts=$request->get('contacts');
               $commande->id_P=$request->get('id_P');
               $commande->id_B=$request->get('id_B');
               $commande->save();
               $request->session()->put('contacts',$request->get('contacts'));//par la suite ca serai remplasser par cookie
           
               /* le feedback  que va recevoir le client apres l'envoi de sa commande*/
               echo '<div align="center"><fieldest><h2 style="color:green;">commande envoyée !!!!!!!</h2><br><p style="background-color:#C9D2D1;color:black; width:200px;border-radius:5px; padding:5px;"> votre contacts et le produits dont vous avez choisis sont envoyés à la boutique "'.Boutique::find($request->get("id_B"))->nom_B.'"ils vous contacterons pour discuter sur l`achat. mais pour etre sùr de vos commandes et mieux communiquer via KASSOUWA comme (envoyer le message ecrit ou vocal à une boutique sur le produits conserné, voir si votre message est lu/ecouté ou non, voir si  la boutique est enligne ou non, appeler la boutique) installer l`application KASSOUWA en cliquant sur le bouton "installer"</p></fieldest></div>';

               echo '<button align="center" style="background-color:green;color:white;width :150; border-radius: 5px;"><a align="center" style="text-decoration:none;color:white;font-size:30px;" href="https://play.google.com/store/apps/details?id=com.plarium.raidlegends" >installer</a></button>';
       }    
  }


     /* la fonction qui permet de modifier un produit dont l'id et les nouvelles données sont dans la requete*/

     public function modifier(Request $request){


try{
      $stripe = new \Stripe\StripeClient(
  'sk_key'
    );
  


    $produit=Produit::find($request->get('id'));

$stripe_produit=$stripe->products->create([
  'name' => $request->get('libelle'),
  'default_price_data' => [
      'unit_amount' => $request->get('prix')*$produit->deviseMultipliePar,
      'currency' => $produit->deviseCode,
    ],
    'expand' => ['default_price'],
  "description" => $request->get('description').".",
]);
         


         
 $stripe->products->update(
  $produit->stripe_id,
  ['active' => false]
);
        //   $donneeValid=$request->validate(['url_photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048', /* les extentions du fichier autorisées */
        //  ]);
         
        if($request->file('url_photo')){
             $nom=substr($produit->url_photo, 7);
            $link="storage/images/".$nom;
        unlink($link);
        
        $chemin = $request->file('url_photo')->store('images');
        $produit->url_photo = $chemin;
        
        }
        
         $produit->libelle=$request->get('libelle');
         $produit->prix=$request->get('prix')*$produit->deviseMultipliePar;
         // $produit->url_photo=$request->get('url_photo');
         $produit->description=$request->get('description');
         $produit->stripe_id=$stripe_produit->id;
         $produit->stripe_price=$stripe_produit->default_price->id;
         $produit->save();
        // return redirect('/BoutiqueAdmin');
        
        return response()->json([
            'success' =>"Enreigistré avec succès"
        ]);
       
}
catch(Exception $e){
    return response()->json([
            'success' =>"Erreur"
        ]);
}
         
     
     }

     /* la fonction qui permet de modifier un profile, celle-ci doit etre definie dans un autre autre controller car elle n'a pas de relation avec produit, contrairement aux autres. alors dans ce cas pourquoi est-ce qu'on la definie ici?
     eh-bah c'est toujours le probleme technique*/
     public function modifierProfil(Request $request){
         $boutique=Boutique::find($request->get('id_B'));
        
         
          $donneeValid=$request->validate(['photo_profil' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048', /* les extentions du fichier autorisées */
         ]);
         
        if($request->file('photo_profil')){
            $chemin = $request->file('photo_profil')->store('MarkImages');
         $boutique->photo_profil = $chemin;
        }
         
        $codeMonnaie=$request->get('monnaie');
        $deviseCode=$boutique->deviseCode;
        $deviseSymbole=$boutique->deviseSymbole;
        $deviseMultipliePar=$boutique->deviseMultipliePar;
        $label=$boutique->deviseLabel;

                    if($codeMonnaie=="xof"){
                            $deviseCode='xof';
                            $deviseSymbole='F';
                            $deviseMultipliePar=1;
                            $label="Franc cfa d'Afrique de l'Ouest";
                    }
                    else if($codeMonnaie=="xaf"){
                            $deviseCode='xaf';
                            $deviseSymbole='F';
                            $deviseMultipliePar=1;
                            $label="Franc cfa d'Afrique de Centrale";
                            
                    }
                    else if($codeMonnaie=="cdf"){
                            $deviseCode='cdf';
                            $deviseSymbole='F';
                            $deviseMultipliePar=100;
                            $label="Franc Congolais";
                            
                    }
                    else if($codeMonnaie=="gnf"){
                            $deviseCode='gnf';
                            $deviseSymbole='FG';
                            $deviseMultipliePar=1;
                            $label="Franc Guinéen";
                   }
                    else if($codeMonnaie=="dzd"){
                            $deviseCode='dzd';
                            $deviseSymbole='DA';
                            $deviseMultipliePar=100;
                            $label="Dinar Algerien";
                    }
                    else if($codeMonnaie=="tnd"){
                            $deviseCode='tnd';
                            $deviseSymbole='DT';
                            $deviseMultipliePar=1000;
                            $label="Dinar Tunisien";
                    }
                    else if($codeMonnaie=="mad"){
                            $deviseCode='mad';
                            $deviseSymbole='DH';
                            $deviseMultipliePar=100;
                            $label="Dirham Marocain";
                    }
                    else if($codeMonnaie=="usd"){
                            $deviseCode='usd';
                            $deviseSymbole='$US';
                            $deviseMultipliePar=100;
                            $label="Dollar Etats Unis";
                    }
                    else if($codeMonnaie=="cad"){
                            $deviseCode='cad';
                            $deviseSymbole='$CA';
                            $deviseMultipliePar=100;
                            $label="Dollar Canadien";
                    }
                    else if($codeMonnaie=="ngn"){
                            $deviseCode='ngn';
                            $deviseSymbole='₦';
                            $deviseMultipliePar=100;
                            $label="Nigeria Naira";
                    }
                    else if($codeMonnaie=="try"){
                            $deviseCode='try';
                            $deviseSymbole='T';
                            $deviseMultipliePar=100;
                            $label="Livre Turc";
                    }
                    else if($codeMonnaie=="mro"){
                            $deviseCode='mro';
                            $deviseSymbole='MRU';
                            $deviseMultipliePar=100;
                            $label="Mauritanian ouguiya";
                    }
                    else if($codeMonnaie=="cny"){
                            $deviseCode='cny';
                            $deviseSymbole='¥/元';
                            $deviseMultipliePar=100;
                            $label="Yuan Chine";
                    }
                    else{
                            $deviseCode='eur';
                            $deviseSymbole='€';
                            $deviseMultipliePar=100;
                            $label="Euro";
                    }
         $boutique->deviseCode=$deviseCode;
         $boutique->deviseSymbole=$deviseSymbole;
         $boutique->deviseMultipliePar=$deviseMultipliePar;
         $boutique->deviseLabel=$label;
         $boutique->nom_B=$request->get('nom_B');
         $boutique->adresse_B=$request->get('adresse_B');
          
          
         // $boutique->photo_profil="/images/logo-boutique-par-defaut.jpg";
        //  $donneeValid=$request->validate(['photo_profil' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',  /*les extentions du fichier autorisées */
        // ]);
         
        // $chemin = $request->file('photo_profil')->store('public/images');
        // $boutique->photo_profil = $chemin;

         $boutique->save();
        
          $vendeur=Vendeur::find($request->get('id_V'));
          $vendeur->nom_V=$request->get('nom_V');
        $vendeur->prenom_V=$request->get('prenom_V');
        // $vendeur->mpass=$request->get('mpass');
        $vendeur->adresse=$request->get('adresse_V');
        $vendeur->tel=$request->get('tel_V');
        $vendeur->save();
          
         $request->session()->put('boutique',$boutique);
         
         $vendeurs=DB::table('vendeurs')->get();
         foreach($vendeurs as $vnd){
             if($vnd->id==$request->get('id_V')){
                 $vendeur=$vnd;
                 $request->session()->put('vendeur',$vendeur);
             }
         }
         ;
        // return redirect('/boutique/profil?id='.$request->get('id_B').'');
         return redirect()->back()->with('messageProfil', "Profile modifié avec succes");
     }

     /* fonction qui permet l'envoi d'un message à un destinateur(client ou vendeur)  
     NB: c'est la boutique qui considerée comme utilisateur et non le vendeur*/
     public function envoi(Request $request){
      $message= new Message();
      $message->id_exp=$request->get('id_exp');
      $message->id_dest=$request->get('id_dest');
      $message->lu="false";
      $maintenant= new DateTime(); 
      $message->date_heure=$maintenant;
      $message->message=$request->get('message');
      $message->save();
      if(session('client')==0){/*  teste si c'est un client ou un vendeur*/
            $messages=DB::table('messages')->where('id_dest',session('boutique')->id)->where('id_exp',$request->get('id_exp'))->orWhere('id_exp',session('boutique')->id)->where('id_dest',$request->get('id_dest'))->orderby('date_heure','asc')->get();
      return view('/afficheMessage',['messages'=>$messages]);

       
   }
   else{
      $messages=DB::table('messages')->where('id_dest',session('contacts'))->where('id_exp',$request->get('id_exp'))->orWhere('id_exp',session('contacts'))->where('id_dest',$request->get('id_dest'))->orderby('date_heure','asc')->get();
      return view('/afficheMessage',['messages'=>$messages]);

   }

      
      



     }
     /* fonction qui affiche les messages entre deux utilisateurs(reçu ou envoyé) */

     public function message(){

     return view('/boutique/message');
  
   

     }
     public function deconnecter(Request $request){
     
     $boutique=Boutique::find($request->get('id_B'));
      $boutique->enligne="false";
      $boutique->save();
      
      return redirect('/connexion');
     }
     
     
        public function share(Request $request){
        $p=new Produit();
        // $p->url_photo=$request->get('url_photo');//concatenation avec le nom du fichier et le chemin de dossier ou` il sera envoye
        $donneeValid=$request->validate(['url_photo' => 'required|mimes:jpg,png,jpeg,gif,pdf,mp4,mp3,svg|max:3048', /* les extentions du fichier autorisées */
        ]);
         
        
        $chemin = $request->file('url_photo')->store('images');
        $p->url_photo = $chemin;
        $p->prix=$request->get('prix');
        $p->libelle=$request->get('libelle');
        $p->description=$request->get('description');
        $p->id_B=$request->get('id_B'); 
         $p->id_V=$request->get('id_V');
         $p->save();
          $boutique=Boutique::find($request->get('id_B'));
           $boutique->Nbr_Produit= $boutique->Nbr_Produit+1;
            $boutique->save();
         
         $produitsALL=DB::table('produits')->get();
         foreach($produitsALL as $value){
            if ($value->id_B==$request->get('id_B')) {
                $produits=$value;
            }
         }
        //return redirect('/boutique');
        

        return redirect()->back()->with('messageAdd', "Ajouté avec succes");
     }
     
     public function createMarketingImageDesign(Request $request){
         $im = imagecreate(100, 100);

// White background and blue text
$bg = imagecolorallocate($im, rand(1, 255), rand(0, 255), rand(0, 255));
$textcolor = imagecolorallocate($im, 0, 0, 255);

$im2=imagecreatefrompng("storage/MarkImages/AAA.png");

// get source image size
list($w, $h) = getimagesize("storage/MarkImages/AAA.png");
// specifying new image size
$new_width = 30;
$new_height = 22;
// creating a black picture
$dst = imagecreatetruecolor($new_width, $new_height);
// loading the source image
$src =imagecreatefrompng("storage/MarkImages/AAA.png");
// resizing the image
imagecopyresized($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $w, $h);
// previewing the image
imagejpeg($dst);
imagepng($dst,"storage/MarkImages/testpetit.png");

$im3=imagecreatefrompng("storage/MarkImages/testpetit.png");

ImageCopy($im,$im3, 5, 5, 0, 0, 129, 117);

// // Output the image
header('Content-type: image/png');

imagepng($im,"storage/MarkImages/test.png");
     }
     
     
     
     public function displayImage(){
// get source image size
list($w, $h) = getimagesize("storage/images/nature1.jpg");

// specifying new image size
$new_width = 1080;
$new_height = 1920;
// creating a black picture
$dst = imagecreatetruecolor($new_width, $new_height);
// set background to white
$white = imagecolorallocate($dst, 255, 255, 255);
imagefill($dst, 0, 0, $white);
// loading the source image
$src =imagecreatefromjpeg("storage/images/nature1.jpg");
// resizing the image
imagecopyresized($dst, $src, 10, 320, 0, 0, 320, 320, $w, $h);
// previewing the image
// imagejpeg($dst);

list($w, $h) = getimagesize("storage/images/nature2.jpg");
imagepng($dst,"storage/MarkImages/test1Item.png");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature2.jpg");
imagecopyresized($im4,$im3 , 385, 320, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature3.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature3.jpg");
imagecopyresized($im4,$im3 , 720, 320, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature4.jpeg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature4.jpeg");
imagecopyresized($im4,$im3 , 10, 695, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature5.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature5.jpg");
imagecopyresized($im4,$im3 , 385, 695, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature6.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature6.jpg");
imagecopyresized($im4,$im3 , 720, 695, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature7.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature7.jpg");
imagecopyresized($im4,$im3 , 10, 1040, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature8.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature8.jpg");
imagecopyresized($im4,$im3 , 385, 1040, 0, 0,320 , 320, $w, $h);
imagepng($im4,"storage/MarkImages/test1Item.png");

list($w, $h) = getimagesize("storage/images/nature9.jpg");
$im4=imagecreatefrompng("storage/MarkImages/test1Item.png");
$im3=imagecreatefromjpeg("storage/images/nature9.jpg");
imagecopyresized($im4,$im3 , 720, 1040, 0, 0,320 , 320, $w, $h);
$p="100euro";
$textcolor = imagecolorallocate($im4, 0, 0, 255);
imagestring($im4, 5,485 , 1580, $p, $textcolor);
imagepng($im4,"storage/MarkImages/test1Item.png");
}

  public function createImageMariage(Request $request){
      $im=imagecreatefromjpeg("storage/MarkImages/couple.JPG");
$textcolor = imagecolorallocate($im, 0, 255, 255);

// Write the string at the top left
$mari=$request->get('nom_V');
$sep="&";
$mark="mariagein.com";
$femme=$request->get('prenom_V');
$date=$request->get('adresse_V');
$lieu=$request->get('tel_V');
$code="#code d'invitation:4070";
imagestring($im, 8,100 , 15, $mark, $textcolor);
imagestring($im, 16,200 , 195, $mari, $textcolor);
imagestring($im, 16,220 , 210, $sep, $textcolor);
imagestring($im, 8,200 , 225, $femme, $textcolor);
imagestring($im, 8,200 , 243, $date, $textcolor);
imagestring($im, 8,190 , 256, $lieu, $textcolor);

imagestring($im, 12,118 , 330, $code, $textcolor);
header('Content-type: image/png');
$imageName="resultMariageImage.png";
imagepng($im,"storage/MarkImages/$imageName");
echo "<h1>Image d'invitation créé avec succes</h2>";
}

 public function badging(Request $request){
     
        $p=new Produit();
        // $p->url_photo=$request->get('url_photo');//concatenation avec le nom du fichier et le chemin de dossier ou` il sera envoye
        $donneeValid=$request->validate(['url_photo' => 'required|image|mimes:jpg,png,jpeg,gif,pdf,svg|max:3048', /* les extentions du fichier autorisées */
        ]);
         
        
        $chemin = $request->file('url_photo')->store('images');
        $p->url_photo = $chemin;
        $p->prix=999;
        $p->libelle=$request->get('libelle');
        $p->description=$request->get('description');
        $p->id_B=25; 
         $p->id_V=29;
         $p->save();
          $productId  = DB::getPdo()->lastInsertId();
         
         $lastProduct=Produit::find($productId);
        
         $imageNameInserted=substr($lastProduct->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                $xtension=substr($imageNameInserted,strrpos($imageNameInserted,'.')+1);
						
          
        //   echo '<img  alt="une image d un produit" src="storage/images/'.$imageNameInserted.'">';
         
           $im=imagecreatefrompng("storage/MarkImages/badgeTemplate.png");
$textcolor = imagecolorallocate($im, 0, 0, 0);

// Write the string at the top left
$nom=$request->get('libelle')." :";


imagestring($im, 40,118 , 640, strtoupper($nom), $textcolor);
// imagestring($im, 16,200 , 195, $mari, $textcolor);

header('Content-type: image/png');
$imageName=$imageNameInserted;
//"resultBadgeImage.png";
list($w, $h) = getimagesize("storage/images/$imageNameInserted");
if($xtension=="png"){
    $im3=imagecreatefrompng("storage/images/$imageNameInserted");
}
else if($xtension=="jpg" || $xtension=="jpeg"){
    $im3=imagecreatefromjpeg("storage/images/$imageNameInserted");
}
else{
    echo  "image non pris en charge";
}

imagecopyresized($im,$im3 , 40, 320, 0, 0,420 , 220, $w, $h);

imagepng($im,"storage/MarkImages/$imageName");
$lien='/partage?id='.$productId;
     
    return redirect($lien);
 }
 
 
 
 public function payer(Request $request){
     
require_once '../vendor/autoload.php';



\Stripe\Stripe::setApiKey("sk_key");
header('Content-Type: application/json');
$YOUR_DOMAIN = 'http://hamoprise.com';
// $produit=Produit::find($request->get('id_pInModal'));

// $nom=substr($produit->url_photo, 7);
$checkout_session = \Stripe\Checkout\Session::create([
    'submit_type' => 'pay',
  'payment_method_types' => ['card'],
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $request->get('stripe_price'),
    'quantity' => 1,
  ]],
  'phone_number_collection' => [
    'enabled' => true,
  ],
'shipping_address_collection' => [
    'allowed_countries' => ['FR','US','BE','CA','DE','CH','ES','IT','NE'],
],
  'mode' => 'payment',
//   'images' => ["https://hamoprise.com/storage/images/'.$nom.'"],
//   'shipping_address_collection' => ['allowed_countries' => ['FR']],
//     'custom_text' => [
//       'shipping_address' => [
//         'message' => 'Please note that we can\'t guarantee 2-day delivery for PO boxes at this time.',
//       ],
//       'submit' => ['message' => 'We\'ll email you instructions on how to get started.'],
//     ],
 'customer_creation'=> 'always',
  'success_url' => $YOUR_DOMAIN . '/success_test?session_id="debut"'.$request->get("id_pInModal").'a123{CHECKOUT_SESSION_ID}0123',
  'cancel_url' => $YOUR_DOMAIN . '/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
 }


  public function commandeParFormulaire(Request $request)
  {
       $idAcha=0;
try{
    global $idAcha;
$produit=Produit::find($request->get("id"));
          $achat= new Achat();
              $achat->id_P=$request->get("id");
              $achat->id_B=$produit->id_B;
              $achat->adresseLivraison=$request->get("quartier")."-".$request->get("ville").", ".$request->get("pays");
              $achat->telephone=$request->get("num");
              $achat->email='non founi';
              $achat->nomClient=$request->get("nomclient");
              $achat->expediee="non";
            //   $achat->session_id=;
              $achat->save();
              $idAcha=DB::getPdo()->lastInsertId();
              $boutique=Boutique::find($produit->id_B);

         $boutique->nbCommandeRecu=$boutique->nbCommandeRecu+1;
         $boutique->save();
         
    $cmd=Achat::find($idAcha);  
    $id_P=intval($produit->id);
    $boutique=Boutique::find($produit->id_B);
    
    $nom=strval($cmd->nomClient);  
    $bnom=strval($boutique->nom_B);
    
    
    
$cher = $nom;
$commande = $bnom;
$entreprise = $bnom;
$cordialement = $bnom;
         
//          $cher = "Mohamed";
// $commande = "Ztyle Zone";
// $entreprise = "notre entreprise";
// $cordialement = "L'équipe de vente";
        //  creation de recu
        
 require_once '../vendor/autoload.php';
// Reference the Dompdf namespace 
$dateToday=new DateTime();
$today= $dateToday->format('Y-m-d');
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$html='

<div style="width:100%;
  display: flex;
  justify-content: center;">
<h3> Style Zone</h3>

<h1 style="color:#3B71CA;font-size:45px;margin-left:300px;"> REÇU d\'ACHAT</h1>

<h2>Numero de la Commande: <span style="margin-left:15px;"> REF_HB'.$boutique->id.'_C000'.$idAcha.'</span></h2>

<h2>Date de la Commande:<span style="margin-left:15px;">'.$today.'</span></h2>

<style>
    table {
        font-family: arial;
        width:950px;
        border-collapse: collapse;
    }
    td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: gray;
    }
</style>

<table>
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Montant</th>
    </tr>
    <tr>
        <td>'.$produit->libelle.'</td>
        <td>1</td>
        <td>'.number_format($produit->prix/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.'</td>
        <td>'.number_format($produit->prix/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.'</td>
    </tr>


</table>


<br>


<div style="width: 60%; display: table;">
    <div style="display: table-row">
        <div style="width: 550px; display: table-cell;">
        <h2>Sous-total:<span style="margin-left:15px;">'.number_format($produit->prix/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.'</span></h2>
<h2>Frais de Livraison: <span style="margin-left:15px;"> '.number_format($produit->fraisLivraison/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.'</span></h2>
<h2>Taxes: <span style="margin-left:15px;"> '.number_format($produit->taxe/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.' </span></h2> </div>
        <div style="width: 300px;display: table-cell;">
        <h1>Total à Payer: <span style="margin-left:15px;"> '.number_format(($produit->prix+$produit->fraisLivraison+$produit->taxe)/$produit->deviseMultipliePar, 2,',', '').' '. $produit->deviseSymbole.'</span></h1>
 </div>
    </div>
</div>

<br>

<div style="width: 60%; display: table;">
    <div style="display: table-row">
        <div style="width: 550px; display: table-cell;"> <h1>Information de Livraison</h1>
  
<h2> '.$request->get("nomclient").'</h2>
<h2>'.$request->get("quartier")."-".$request->get("ville").", ".$request->get("pays").'</h2>

<h2>'.$request->get("num").'</h2> </div>
        <div style="width: 300px;display: table-cell;"> <h3>Méthode de Paiement:</h3>
<h4>Paiment à la livraison</h4>
<h4>En liquide ou autre moyen</h4>
 </div>
    </div>
</div>


<h2>Politique de Retour:</h2>

<p>3 semaines apres votre commande , vous pouvez envoyer une réclamation avec le numero de votre commande sur cette adresse email <span style="color:#3B71CA">reclamation@hamoprise.com</span> ou sur cette page <span style="color:#3B71CA">htttps/hamoprise.com/reclamation</span>.
</p>

<p>
Merci de votre commande! Nous vous sommes reconnaissants de votre confiance.

Pour toute question ou préoccupation, veuillez nous contacter à '.$boutique->email.' ou '.$boutique->tel .'.
</p>
<br>
<p>'.$boutique->nom_B .'</p>
<p>'.$boutique->adresse_B.'</p>
<p>'.$boutique->email .'</p>
<p>'.$boutique->tel.'.</p>

<p> emis par <span style="color:#3B71CA;" >www.Hamoprise.com</span></p>
</div>';


// ';
// Load HTML content 
$dompdf->loadHtml($html);
 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
// $dompdf->stream('dompdfTEST.pdf');
$pdf_string =   $dompdf->output();
$nomFile= 'Recu_Achat_'.$idAcha.'.pdf';
file_put_contents($nomFile, $pdf_string );       




$token="my_Metat_token";
$bnom=strval($cmd->telephone);
 $number =strval(substr($cmd->telephone, 1));//"33758326647"; //$request->get("num"); 
     $template = array(
      'name'=>'hello_world', //your your own or any default template. The names and samples are listed under message templates
      'language'=>array('code'=>'en_us'), //you can use yours
        'components' => array(
        array('type' => 'header'),
        array('type' => 'body', 'parameters' => array(
            array('type' => 'text', 'text' => $cher),
            array('type' => 'text', 'text' => $commande),
            array('type' => 'text', 'text' => $entreprise),
            array('type' => 'text', 'text' => $cordialement)
        )),
        array(
            'type' => 'button',
            'sub_type' => 'url',
            'index' => '0',
            'parameters' => array(
                array('type' => 'payload', 'payload' => $id_P) // Remplacez 'PAYLOAD' par votre payload
            )
        )
    )
      );

     $endpoint = 'https://graph.facebook.com/v16.0/100959132806847/messages';
     $params = array('messaging_product'=>'whatsapp', 'to'=>$number, 'type'=>'template', 'from'=>'20120834953', 'access_token'=>$token,'template'=>json_encode($template));

      $headers = array('Authorization'=>$token,'Content-Type'=>'application/json', 'User-Agent'=>'(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
      $url = $endpoint . '?' . http_build_query($params);

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, $endpoint);
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, $params);
      $result = curl_exec($ch );
    //   echo $result; //you can skip this, I did it to check the results
      curl_close( $ch );

            return response()->json([
            'success' =>"commandé avec succès",
             'client'=>$request->get("nomclient"),
            'id'=>  $idAcha,
            'fb'=> $result
        ]);
              
  
  } catch (QueryException $ex) {
  echo ' <h1 style="margin-bottom:300px;">l\'achat a  été effectué</h1>';
   
}
  
  }
  public function abonner(Request $request)
  {
      require_once '../vendor/autoload.php';

        $abonnment=Abonnement::find($request->get("id_abonnment"));
        $abonnment->duree_Non_Confirmee=$request->get("duree_Non_Confirmee");
        $abonnment->save();
\Stripe\Stripe::setApiKey("sk_key");
header('Content-Type: application/json');
$YOUR_DOMAIN = 'http://hamoprise.com';
// $produit=Produit::find($request->get('id_pInModal'));

// $nom=substr($produit->url_photo, 7);
$checkout_session = \Stripe\Checkout\Session::create([
    'submit_type' => 'pay',
  'payment_method_types' => ['card'],
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $request->get('strip_price_abonnement'),
    'quantity' => 1,
  ]],
  'mode' => 'payment',

 'customer_creation'=> 'always',
  'success_url' => $YOUR_DOMAIN . '/success-abonnement_test?session_id="debut"'.$request->get("id_abonnment").'a123{CHECKOUT_SESSION_ID}0123',
  'cancel_url' => $YOUR_DOMAIN . '/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
  }
 
 
 public function boutiqueVisite(Request $request)
    {
        $boutique=Boutique::find($_GET['id']);
         $boutique->nbVisites=$boutique->nbVisites+1;
         $boutique->save();
          $aujourdhou= new DateTime();
 $jour =$aujourdhou->format('Y-m-d H:i:s');
       $jour=intval(substr($jour,8,2));
 
         
         $visites_derniers_jours = Visites_derniers_jours::where("id_B", $_GET['id'])->where("jour", $jour)->get();
         
          foreach($visites_derniers_jours as $visites_derniers_jour) {      
          $visites_derniers_jour->nbVisites=$visites_derniers_jour->nbVisites+1;
          $visites_derniers_jour->save();
        }
    
        $answer = "Vue boutique ajoutee !!!!";
        return response()->json([
            'answer' => $answer
        ]);
    }
     public function produitVisite(Request $request)
    {
         $produit=Produit::find($_GET['id']);
 
        $boutique=Boutique::find($produit->id_B);
         if($produit->nbVisites==0){
         $boutique->nbArticleVisites=$boutique->nbArticleVisites+1;
         $boutique->save();
         }
         $produit->nbVisites=$produit->nbVisites+1;
         $produit->newVisites=$produit->newVisites+1;
         $produit->save();
         
        $answer = "Vue ajoutee !!!!";
        return response()->json([
            'answer' => $answer
        ]);
    }
         public function produitVisiteVue(Request $request)
    {
        //  $produit=Produit::find($_GET['id']);
 
        // $boutique=Boutique::find($produit->id_B);
        //  $produit->newVisites=0;
        //  $produit->save();
         
        $produits = Produit::where("id_B", $_GET['id'])->get();
         
          foreach($produits as $produit) {      
          $produit->newVisites=0;
          $produit->save();
        }
        $answer = "Vue ajoutee !!!!";
        return response()->json([
            'answer' => $answer
        ]);
    }
    
    
     public function visiteDerniersJours(Request $request)
    {
         $produit=Produit::find($_GET['id']);
         
 $visites_derniers_jours = Visites_derniers_jours::where("id_B", $_GET['id'])->get();
 $aujourdhou= new DateTime();
 $result =$aujourdhou->format('Y-m-d H:i:s');
        $answer = "visites derniers !!!!";
        return response()->json([
            'liste' => $visites_derniers_jours,
            'aujourdhui'=>intval(substr($result,8,2))
        ]);
    }
    
     public function addCompteBank(Request $request)
    {
 
        $comBank=new Comptebank();

        $comBank->nomPrenom = $request->get('nomRib');
        $comBank->iban=$request->get('iban');
        $comBank->paypal=$request->get('paypal');
        $comBank->id_B=$request->get('id_B');
        $comBank->save();

        $answer = "Compte bancaire ou paypal ajouté!!!!";
        return response()->json([
            'result' => $answer
        ]);
    }


 public function EditCompteBank(Request $request)
    {
         
    try{
         $comBanks=Comptebank::find($request->get('id'));

        
         $comBanks->iban=$request->get('iban');
         $comBanks->nomPrenom=$request->get('nomRib');
         $comBanks->paypal=$request->get('paypal');
         $comBanks->save();
        return response()->json([
            'success' =>" Compte Enreigistré avec succès"
        ]);
       
}
catch(Exception $e){
    return response()->json([
            'success' =>"Erreur"
        ]);
}
    }
    
    public function readCompteBank(Request $request)
    {
         
 $comBanks = Comptebank::where("id_B", $_GET['id'])->get();

        return response()->json([
            'liste' => $comBanks
        ]);
    }
        public function readAbonnement(Request $request)
    {
         
 $abonnment = Abonnement::where("id_B", $_GET['id'])->get();

        return response()->json([
            'liste' => $abonnment
        ]);
    }
        public function sendNewConversation(Request $request)
    {
       $conversations = Conversation::where("keyCompose", $request->get("source").$request->get("boutique_dest_id"))->get();
       
       if(count($conversations)==0){
        $conversation=new Conversation();
        $conversation->boutique_name = Boutique::find($request->get('boutique_dest_id'))->nom_B;
        $conversation->visiteurContact=$request->get('source');
        $conversation->boutique_dest_id=$request->get('boutique_dest_id');
        $conversation->keyCompose=$request->get("source").$request->get("boutique_dest_id");
        $conversation->save();
        
        $message=new Message();
        $message->label=$request->get('source');
        $message->message=$request->get('message');
        $message->keyCompose=$request->get("source").$request->get("boutique_dest_id");
        $message->id_exp=1;
        $message->id_dest=1;
        $message->lu="false";
        $maintenant= new DateTime(); 
        $message->date_heure=$maintenant;
        $message->save();
        $answer = "message envoyé!!!!";
        return response()->json([
            'result' => $answer
        ]);
       }
       else{
        $message=new Message();
        $message->label=$request->get('messagelabel');
        $message->message=$request->get('message');
        $message->keyCompose=$request->get("source").$request->get("boutique_dest_id");
        $message->id_exp=1;
        $message->id_dest=1;
        $message->lu="false";
        $maintenant= new DateTime(); 
        $message->date_heure=$maintenant;
        $message->save();
        $answer = "message envoyé!!!!";
        return response()->json([
            'result' => $answer
        ]);
       }

    } 
  
        public function getConversations(Request $request)
    {  
               $conversations = Conversation::where("boutique_dest_id", $_GET['id'])->get();

        return response()->json([
            'liste' => $conversations
        ]);
    }
            public function getMessages(Request $request)
    {  
               $messages = Message::where("keyCompose", $request->get("keyCompose"))->get();

        return response()->json([
            'liste' => $messages
        ]);
    }
    
           public function sendMessage(Request $request)
    {   
    
        $message=new Message();
        $message->label=$request->get('messagelabel');
        $message->message=$request->get('message');
        $message->keyCompose=$request->get("keycompose");
        $message->id_exp=1;
        $message->id_dest=1;
        $message->lu="false";
        $maintenant= new DateTime(); 
        $message->date_heure=$maintenant;
        $message->save();
        $answer = "message envoyé!!!!";
        return response()->json([
            'result' => $answer
        ]);
        
    }
          public function getFlayers(Request $request)
    {  
               $flayers = Flayer::where("id_B", $_GET['id'])->get();

        return response()->json([
            'liste' => $flayers
        ]);
    }
    
    
              public function boutiqueCouleur(Request $request)
    {  
        $boutique=Boutique::find($request->get('id'));
         $boutique->headCouleur=$request->get('headcouleur');
         $boutique->save();
         $request->session()->put('boutique',$boutique);
                return response()->json([
            'success' =>"Enreigistré avec succès"
        ]);
    }
    public function expedier(Request $request)
    {  
        $achat=Achat::find($request->get('id'));
         $achat->expediee="oui";
         $achat->save();
require_once '../vendor/autoload.php';
// require 'PHPMailerAutoload.php';

         
// require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hamoprise.com//';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@hamoprise.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port=465;
$emailClient=$achat->email;
$mail->From = 'contact@hamoprise.com';
$mail->FromName = 'Hamoprise';
$mail->addAddress($emailClient, $achat->nomClient);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to 

$mail->Subject = 'Votre Article est expedié';
$mail->Body=
'
<p>votre article est en route</p>
';
$mail->AltBody = 'ca c\'est le corps du mail';
// $mail->addAttachment("storage/images/".$nom);


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  
    echo '<h1 style="color:green;">Le mail de confirmation d\'expedition vous a été envoyé </h1>';
}
        //         return response()->json([
        //     'success' =>"Enreigistré avec succès"
        // ]);
        return response()->json([
            'success' =>"Enreigistré avec succès"
        ]);
    }
    


public function extractText()
{
    function existTil($mot,$document){
          $mot_docs=$document->tableMots;
          
            foreach($mot_docs as $mot_interne){
                if($mot==$mot_interne){
                    
                 $document->incremenete_score();
                //  echo $document->get_score();
                 return $document;
                 break;
            
                }
                else{
                return $document;
                }
                 
            }
        
    }
  function TextEnObjetDocumenet($id,$string){
      $doc= new Document();
    $tableMots=explode(' ', $string);

      $doc->set_id($id);
      $doc->set_tableMots($tableMots);
      $doc->set_score(0);
      return $doc;
  }
// foreach($DocsPertinants as $DocsPertinant){
    
// }
$d1=TextEnObjetDocumenet(23,"dans ce doc il ya des chose merci  abonnement et produit");
$d2=TextEnObjetDocumenet(4,"par contre merci pour votre soutient");
$d3=TextEnObjetDocumenet(54,"dle documenet 54 ");
$d4=TextEnObjetDocumenet(10," il est word mais pas pdf ");
   
   $documents=[$d1,$d2,$d3,$d4];
   
   
          $requete="merci de votre abonnements";

          $requete_singuliers="";

$MotsRequete=explode(' ', $requete);
foreach($MotsRequete as $mot){
    // echo $mot;
    // echo "<br>";
    
    if(substr($mot, -1)=='s'){
        $mot=substr($mot,0,strlen($mot)-1);
     
        $requete_singuliers=$requete_singuliers." ".$mot;
    }
    else{
        $requete_singuliers=$requete_singuliers." ".$mot;
    }
    
}
// echo $requete_singuliers;
$MotsRequete_singuliers=explode(' ', $requete_singuliers);
// foreach($MotsRequete_singuliers as $mot){
//     echo $mot;
//     echo "<br>";
// }
 $DocsPertinants=null;
foreach($MotsRequete_singuliers as $mot){
    foreach($documents as $document){
         $docAvant=$document;
         $docApres=existTil($mot,$document);
         echo $docApres->get_score();
        //  if($docApres->get_score()>$docAvant->get_score()){
        //     global $DocsPertinants;
        //      array_push( $DocsPertinants,$document);
        //  }
    }
}
echo "votre requete:".$requete;
 
 echo '<br>';
//  echo $DocsPertinants[0]->get_id();
//  foreach($DocsPertinants as $doc){
//      if($DocsPertinants!=null){
//               echo "<br>";
//      echo $doc->get_id();
//      }
//      else{
//          echo 'null';
//      }
     
// }
// $documents=$DocsPertinants;
//     foreach($documents as $document){
//         echo $document->get_id();
//     }
// $text=' ';
//     $parser = new \Smalot\PdfParser\Parser();

// $PDFfile = 'Recu_Abonnement_46.pdf';

// // $PDF = $parser->parseFile($PDFfile);

// // $PDFContent = $PDF->getText();
// // echo $PDFContent;
// $apple = new Mot_Documents();
// $apple->set_name('Apple');
// $apple->set_color('Red');

 

// echo "Name: " . $apple->get_name();

return view('marikoProjet',['apple'=>"nn"]);

}

public function checkDomain(Request $request){
        
try{

$domain= $request->get('domain_name');

// Résolution DNS du domaine
$ip = gethostbyname($domain);

// Vérification si l'IP résolue est identique au nom de domaine
if ($ip != $domain) {
    // echo "Le domaine existe.";
    $response='nondispo';
} else {
    // echo "Le domaine n'existe pas.";
    $response='dispo';
}


 return response()->json([
            'success' =>$response
        ]);
}
catch(Exception $e){
    return response()->json([
            'success' =>"Erreur de verification"
        ]);
}
        // return redirect()->back()->with('messageAdd', "Ajouté avec succes");
     }

public function achatDomain(Request $request){
     require_once '../vendor/autoload.php';



\Stripe\Stripe::setApiKey("sk_key);
header('Content-Type: application/json');
$YOUR_DOMAIN = 'http://hamoprise.com';
// $produit=Produit::find($request->get('id_pInModal'));

// $nom=substr($produit->url_photo, 7);
$checkout_session = \Stripe\Checkout\Session::create([
    'submit_type' => 'pay',
  'payment_method_types' => ['card'],
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $request->get('strip_price_nomdomain'),
    'quantity' => 1,
  ]],
  'phone_number_collection' => [
    'enabled' => true,
  ],
'shipping_address_collection' => [
    'allowed_countries' => ['FR','US','BE','CA','DE','CH','ES','IT','NE'],
],
  'mode' => 'payment',

 'customer_creation'=> 'always',
  'success_url' => $YOUR_DOMAIN . '/success_test?session_id="debut"'.$request->get("id_pInModal").'a123{CHECKOUT_SESSION_ID}0123',
  'cancel_url' => $YOUR_DOMAIN . '/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

}      
    
         
}
