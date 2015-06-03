<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="../css/FrontOffice/ListeArtiste.css"/>
        <script src="../js/jquery-1.11.2.min.js"></script>
        <script src="../js/script-listeartiste.js"></script>
        <title></title>
    </head>
    <body>
        <div id="background"></div>
        <div class="subbody">
            <!-- <img src="../img/header.png" alt="header" /> -->
            <div class="filtre">
                <div class="filtreSelect">
                    <select id="filtreGenre">
                        <option value="Defaut">Genre</option>
                        <?php 
                            $aGenre = My_Orm_Genre::findAll();
                            sort($aGenre);
                            foreach ($aGenre as $genre){
                                echo '<option value="'.$genre->Identifiant.'">'. $genre->Libelle.'</option>';
                            }
                        ?>                        
                    </select>
                    <select id="filtreJour">
                        <option value="Defaut">Jour</option>
                        <?php
                        $aPrestation = My_Orm_Prestation::findAll();
                            foreach ($aPrestation as $prestation){
                                if (!in_array($prestation->JourPassage,$aJour)){
                                    $aJour[] = $prestation->JourPassage;
                                }
                            }
                            rsort($aJour);
                            foreach ($aJour as $jour){
                                echo '<option value="'.$jour.'">'. $jour.'</option>';
                            } 
                        ?>                        
                    </select>
                </div>
                <div id="filtreNom">
                    <form class="ajax" action="" method="get">
                        <input class="champsnom" onfocus="this.value = '';" type="text" name="rnom" id="rnom" value="Nom"/>
                    </form>
                </div>
            </div>
            <!-- Tableau de la liste des artistes -->
            <div class="tablecontainer">
            </div>
        </div>
    </body>
</html>
