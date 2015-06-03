<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/FrontOffice/Calendrier.css"/>
        <title></title>
    </head>
    <body>
        <div class="subbody">
		<img class="head" src="../img/front/bdtop.png" alt="Quest'Handi"/>
        <div class="banniere">
            <img class="logo" src="../img/front/logoqh.png" width="100px" height="100px" alt="Quest'Handi"/>
        </div>
        <?php
            $today = date('Y-m-d');
            $aAction = My_Orm_Action::findAgenda(1,$today);
            $aDate = array();
            foreach ($aAction as $daction){
              if (in_array($daction->DateAction, $aDate) == FALSE){
                  $aDate[] = $daction->DateAction;
                }
            }
            
            foreach ($aDate as $date){
                echo '<div class="line">';
                    echo '<div class="date">'.date("d/m/Y", strtotime($date)).'</div>';
                    foreach ($aAction as $action){
                        $desc = $action->Description;
                        $longueur = strlen($desc);
                        if ($longueur > 40){
                            $desc = substr($desc, 0, 40).'...';
                        }
                        if ($action->DateAction == $date){
                            echo '<div class="action">';
								if ($action->Image != null){
									echo '<img class="picture" SRC="'.$action->Image->Chemin.'" ALT="Pictures" TITLE="'.$action->Image->Titre.'">';
								}
                                echo '<h4>'.$action->Titre.' à '.$action->Adresse->Ville .'</h4>';
								echo '<div class="image">';
								
								echo '</div>';
                                echo '<div class="contenu">';
                                    echo '<div class="description">'.$desc.'</div>';
                                    if ($action->NbBenevole > 0){
                                        echo '<span class="benevole">Vous souhaitez participer ? Nous cherchons '.$action->NbBenevole.' bénévole(s)</span>';
                                    }
                                echo '</div>';
                            echo '</div>';                        
                        }
                    }
                echo '</div>';
            }
            
        ?>
        <!-- Bannière Bas -->
        <img class="head" src="../img/front/bdbot.png" alt="Quest'Handi"/>
        </div>
    </body>
</html>
