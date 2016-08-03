<?php

require_once 'navigation.php';

$user = new User();
if ($user->isLoggedIn()) {

    if (isset($_POST['submit'])) {
        $upload = new UploadFile($_FILES["fileToUpload"], $user->data()->username . '_' . $_POST[titolo]);
        $upload->validate();
        $upload->upload();

        // genero una chiave per criptare e decriptare le immagini partendo dalla password dell'utente
        $key = hash('md5', $user->data()->password);
        $crypt = new Encryption($key);

// nome del file da criptare
        $filename = $upload->nomeFile();
//nome del file criptato
//        $fileCriptato = UPLOADDIR.'fileCriptato';
            $fileCriptato = UPLOADDIR . hash('md5', $idImage . $user->data()->idUtente);

        $encrypted_string = $crypt->encrypt(base64_encode(file_get_contents($filename)));
//salva il file codificato
        file_put_contents($fileCriptato, $encrypted_string);
// elimino le immagini originali

        UploadFile::eliminaImmagine($filename);

//        record the upload in the database
        $db = DB::getInstance();
        $db->insert('images',['name'=>$filename,'fkUser'=>$user->data()->idUtente]);

    }

// verifico che se esistono delle immagini già caricate dall'utente
    $CIf = file_exists(UPLOADDIR . hash('md5', 'CIf' . $user->data()->idUtente));

    if(isset($_POST['mostra'])) {
        
        echo '<div class="homeContainer" style="background: ">
                <div class="col-md-8">
                    <form action="upload.php" method="POST">                
                        <input type="submit" class="btn btn-primary" name="indietro" value="Indietro">
                    </form>
                     <div class="clearfix"></div><br>
               ';

                // genero una chiave per criptare e decriptare le immagini partendo dalla password dell'utente
                $key = hash('md5', $user->data()->password);
                $crypt = new Encryption($key);

                // per ogni file verifico se esiste e in tal caso lo decodifico. una volta mostrata l'immagine la elimino
                if ($CIf) {
                    $fileCriptato = UPLOADDIR . hash('md5', 'CIf' . $user->data()->idUtente);
                    $fileDecriptato = UPLOADDIR . $user->data()->idUtente . 'CIf.jpg';
                    //decodifica del file
                    $decrypted_string = base64_decode($crypt->decrypt(file_get_contents($fileCriptato)));
                    //salvataggio del file decodificato
                    file_put_contents($fileDecriptato, $decrypted_string);
                    echo '<div class="col-md-8">Carta Identità fronte:<br> <img src="' . $fileDecriptato . '" height="300px"></div>';
                }

                echo '
                    <div class="clearfix"></div><br>
                        <div class="col-md-12">
                                per uscire in modo sicuro <a href="upload.php">clicca qui</a> 
                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                </div> <!-- chiusura homeContainer-->
            ';



    }else {

        ?>

        <div class="homeContainer" >
            <div class="group col-md-7">
                <div class="clearfix"></div><br>
                <div class="col-md-12" style="padding: 20px 0px 20px 0px;">
                    <div class="col-md-12" style="padding-top:10px;">
                        <p>È possibile caricare solo file jpg non superiori a 5MB.</p><br>
                    </div>
                    <div class="col-md-12">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <input type="hidden" name="titolo" value="CIr">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="form-control btn btn-success" value="<?php if ($CIr) {echo 'Aggiorna Documento';}else{echo 'Carica Documento';} ?>" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12"><br></div>
                <?php
                if($CF||$CIf||$CIr){
                    ?>
                    <div class="col-md-4"
                         style="padding: 20px 0px 20px 0px;">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <input type="submit" class="btn btn-primary" name="mostra" value="Mostra Documenti">
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="clearfix"></div><br>
        </div>

        <?php
    }

    include 'footer.php';


// se l'utente non è loggato lo reindirizzo
} else {
    Redirect::to('home.php');
}
