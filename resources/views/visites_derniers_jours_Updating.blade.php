
             
<html>
    <head>
        <title>mise a jour visites dernier jous boutiques</title>
    </head>
    
    <body>
        <?php
        use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use App\Models\Vendeur;
use App\Models\Boutique;
use App\Models\Commande;
use App\Models\Message;
use App\Models\Abonnement;
use App\Models\Hamoprise;
use App\Models\Visites_derniers_jours;

                  $dateToday=new DateTime();
        $jour_dateToday= $dateToday->format('d');
        if($jour_dateToday==1||$jour_dateToday==2){
            $visites_derniers_jours=DB::table('visites_derniers_jours')->get();
             foreach ($visites_derniers_jours as $abn){
         $visites_derniers_jour=Visites_derniers_jours::find($abn->id);

          $visites_derniers_jour->nbVisites=0;
          $visites_derniers_jour->save();
        }
             }   
            echo "executé";
        // }
        // catch( Exception $e){
        //     echo "erreur";
        // }

        ?>
    </body>
    
</html>