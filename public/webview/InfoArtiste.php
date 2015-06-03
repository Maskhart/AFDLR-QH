<!DOCTYPE html>
<?php include_once '../../library/MobileDetect/Mobile_Detect.php';?>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="../css/FrontOffice/InfoArtiste.css" />
        <title></title>
    </head>
    <body>
        <div class="subbody">
            <!c -- Block bannière-->
            <div class="banniereartiste">
                <!-- Bouton retour à la page précédente -->
                <a class="retour" href="javascript:history.go(-1)">Retour</a>
                <!-- Image Artiste -->
                <?php
                
                $Artiste = My_Orm_Artiste::find($_GET['ID']);
                echo '<img class="banniere" src="'. $Artiste->Image->Chemin .'" alt="'. $Artiste->Nom.'"/>';
                ?>
                <div class="leftCell">
                    <!-- Nom de l'artiste -->
                    <?php echo '<div class="nomArtiste">'.$Artiste->Nom.'</div>'; ?>
                    
                    <?php
                        $sGenreNat = null;
                        foreach ($Artiste->GenreArtiste as $genreartiste) {
                            if ($sGenreNat == null){
                                $sGenreNat = "[ ";
                                $sGenreNat = $sGenreNat . $genreartiste->Genre->Libelle;
                            }
                            else {
                                $sGenreNat = $sGenreNat . " | " . $genreartiste->Genre->Libelle;
                            }

                        }
                        $sGenreNat = $sGenreNat . " ] - ";
                        $cNat = 0;
                        foreach ($Artiste->NationaliteArtiste as $nationaliteartiste) {
                            if ($cNat == 0){
                                $sGenreNat = $sGenreNat . $nationaliteartiste->Nationalite->LibelleCourt;
                                $cNat = $cNat + 1;
                            }
                            else if ($cNat >= 1){
                                $sGenreNat = $sGenreNat . "-" . $nationaliteartiste->Nationalite->LibelleCourt;
                            }

                        }
                    ?>
                    <div class="band">
                    <!-- Genre et Nationalite de l'artiste -->
                    <?php echo '<div class="infoArtiste">'. $sGenreNat . '</div>';?>    
                    
                    <!-- Renseigement LSF -->
                    <div class="rightCell">
                        <?php
                        $hasLSF = 0;
                            foreach ($Artiste->Musique as $musique){
                                if ($musique->IdentifiantVideo != null){
                                    $hasLSF++;
                                }
                            }

                            if ($hasLSF != 0) {
                                echo '<img class="imgLSF" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf" />';
                            }
                        ?>
                    </div>
                </div>
                </div>
                
                
            </div>
            <!-- Milieu de page -->
            <div class="mid">
                <!-- Info de l'artiste -->
             
                <!-- Description de l'artiste -->
                <div class="descriptionArtiste">
                    <?php echo nl2br($Artiste->Description);?>                      
                </div>
            </div>
            <!-- Video de l'artiste-->
            <div class="video">
                <?php 
                $detect = new Mobile_Detect();
                if($detect->isAndroidOS()){
                    echo '<a class="avideo" href="afdlr-qh-video://url=http://front.afdlr-qh.damien-pereira.net/' , $Artiste->Video->Chemin , '">' ,
                             '<img src="../img/front/banniere.png">' ,
                         '</a>';
                } else {
                    echo '<video controls width="100%" height="240" poster="../img/front/banniere.png">' , 
                             '<source src="../' , $Artiste->Video->Chemin , '" type="video/mp4">' ,
                         '</video>';
                }
                ?>
        </div>
    </body>
</html>
