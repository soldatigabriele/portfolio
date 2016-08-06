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

//    delete decrypted images
    foreach ($images->results() as $image) {
        $pic = $user->data()->idUtente . $image->id . '.' . $image->ext;
        $imageName = 'uploads/' . $pic;
        if (file_exists($imageName)) {
            UploadFile::eliminaImmagine($imageName);
        }
    }

    if (isset($_POST['submit'])) {
        $upload = new UploadFile($_FILES["fileToUpload"], $_FILES["fileToUpload"]["name"]);
        $upload->validate();
//        if there is no error encrypt the image
        $upload->upload();
        if ($upload->hasErrors() == 1) {
            // genero una chiave per criptare e decriptare le immagini partendo dalla password dell'utente
            $key = hash('md5', $user->data()->password);
            $crypt = new Encryption($key);

// name and extension
            $filename = $upload->nomeFile();
            // new file name
            $file = hash('md5', $_FILES["fileToUpload"]["tmp_name"] . $user->data()->idUtente);
            $fileCriptato = UPLOADDIR . $file;

            $encrypted_string = $crypt->encrypt(base64_encode(file_get_contents($filename)));
//salva il file codificato
            file_put_contents($fileCriptato, $encrypted_string);
//        record the upload in the database
            $db->insert('images', ['name' => $file, 'fkUser' => $user->data()->idUtente, 'ext' => $extension]);
//delete the uploaded decrypted image
            UploadFile::eliminaImmagine($filename);
        }
    }

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

        $directory = 'uploads/';
        $images = $db->get('Images', ['fkUser', '=', $user->data()->idUtente]);
        $files = scandir($directory);

        foreach ($images->results() as $image) {
            if (file_exists($directory . $image->name)) {
                $fileCriptato = UPLOADDIR . $image->name;
                $fileDecriptato = UPLOADDIR . $user->data()->idUtente . $image->id . '.' . $image->ext;
                $decrypted_string = base64_decode($crypt->decrypt(file_get_contents($fileCriptato)));
                file_put_contents($fileDecriptato, $decrypted_string);
                echo '<div class="col-md-8"><img src="' . $fileDecriptato . '" height="300px"></div><br>';
            } else {
                // delete from the DB the files that doesn't exist
                $db->delete('Images', ['id', '=', $image->id]);
            }
        }
//        if the files are not stored in the DB, delete it
        foreach ($files as $file) {
            $images = $db->get('Images', ['name', '=', $file]);
            if (!$images->count()) {
                UploadFile::eliminaImmagine('uploads/' . $file);
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
            <div class="group col-md-4">
                <div class="clearfix"></div>
                <br>
                <div class="col-md-12" style="padding: 20px 0px 20px 0px;">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Upload Image"
                                   name="submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-12"></div>
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
