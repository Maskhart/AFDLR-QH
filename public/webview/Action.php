<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/FrontOffice/Action.css"/>
        <title></title>
    </head>
    <body>
        <img class="head" src="../img/front/bdtop.png" alt="Quest'Handi"/>
        <div class="banniere">
            <img class="logo" src="../img/front/logoqh.png" alt="Quest'Handi"/>
        </div>
        <?php
            $today = date('Y-m-d');
            $aAction = My_Orm_Action::findSome(1,$today);
            foreach ($aAction as $action){
                echo '<div class="action">';
                            if ($action->Image != null){
                                echo '<img class="picture" SRC="'.$action->Image->Chemin.'" ALT="Pictures" TITLE="'.$action->Image->Titre.'">';
                            }
                        echo '<h4>'.$action->Titre.'</h4>';
                    echo '<div class="contenu">';

                    echo '<span class="description">'.nl2br($action->Description).'</span>';
                    echo '</div>';                                    
                echo '</div>';
                $i++;
            }?>
        <!-- Bannière Bas -->          
            <img class="footer" src="../img/front/bdbot.png" alt="Quest'Handi"/>
    </body>
</html>
