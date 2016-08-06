<?php

require_once 'navigation.php';

$user = new User();
$db = DB::getInstance();

if ($user->isLoggedIn()) {

// delete decrypted images
    $images = $db->get('Images', ['fkUser', '=', $user->data()->idUtente]);
//    if user has uploaded images, show button
    if ($images->count()) {
        $count = true;
    }
    foreach ($images->results() as $image) {
        $pic = $user->data()->idUtente . $image->id . '.jpg';
        $imageName = 'uploads/' . $pic;
        if (file_exists($imageName)) {
            UploadFile::eliminaImmagine($imageName);
        }
    }
//  check if crypted images are saved on the db


    if (isset($_POST['submit'])) {
        $upload = new UploadFile($_FILES["fileToUpload"], $_FILES["fileToUpload"]["name"]);
        $upload->validate();
        $upload->upload();

        // genero una chiave per criptare e decriptare le immagini partendo dalla password dell'utente
        $key = hash('md5', $user->data()->password);
        $crypt = new Encryption($key);

// nome del file da criptare
        $filename = $upload->nomeFile();
//        $fileCriptato = UPLOADDIR.'fileCriptato';
        // new file name
        $file = hash('md5', $filename . $user->data()->idUtente);
        $fileCriptato = UPLOADDIR . $file;

        $encrypted_string = $crypt->encrypt(base64_encode(file_get_contents($filename)));
//salva il file codificato
        file_put_contents($fileCriptato, $encrypted_string);
//        record the upload in the database
        $db->insert('images', ['name' => $file, 'fkUser' => $user->data()->idUtente]);
//delete the uploaded decrypted image
        UploadFile::eliminaImmagine($filename);
    }

// verifico che se esistono delle immagini già caricate dall'utente
//    print_r($images);
//        if (!file_exists(
//
//            UPLOADDIR . hash('', 'CIf' . $user->data()->idUtente))
//        ) {
//        elimina
//        }
//    }

    if (isset($_POST['mostra'])) {

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

        $images = $db->get('Images', ['fkUser', '=', $user->data()->idUtente]);
        foreach ($images->results() as $image) {
            if (file_exists('uploads/' . $image->name)) {
                $fileCriptato = UPLOADDIR . $image->name;
                $fileDecriptato = UPLOADDIR . $user->data()->idUtente . $image->id . '.jpg';
                $decrypted_string = base64_decode($crypt->decrypt(file_get_contents($fileCriptato)));
                file_put_contents($fileDecriptato, $decrypted_string);
                echo '<div class="col-md-8"><img src="' . $fileDecriptato . '" height="300px"></div><br>';
            } else {
                echo 'file NON trovato ' . $image->id . '.jpg<br>';
            }
        }

        // per ogni file verifico se esiste e in tal caso lo decodifico. una volta mostrata l'immagine la elimino
//        $user->data()->idUtente;

        echo '
                    <div class="clearfix"></div><br>
                        <div class="col-md-12">
                                per uscire in modo sicuro <a href="upload.php">clicca qui</a> 
                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                </div> <!-- chiusura homeContainer-->
            ';


    } else {

        ?>

        <div class="homeContainer">
            <div class="group col-md-7">
                <div class="clearfix"></div>
                <br>
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
                                <input type="submit" class="form-control btn btn-success" value="Carica Documento"
                                       name="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12"><br></div>
                <?php
                if ($count) {
                    ?>
                    <div class="col-md-4"
                         style="padding: 20px 0px 20px 0px;">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <input type="submit" class="btn btn-primary" name="mostra" value="Show Images">
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="clearfix"></div>
            <br>
        </div>

        <?php
    }

    include 'footer.php';


// se l'utente non è loggato lo reindirizzo
} else {
    Redirect::to('home.php');
}
