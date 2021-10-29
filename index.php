<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="head">
       <a class="title-nav">PHP5.4 Demo</a>
       <a class="active">Main Site</a>
       <a >Blog Post</a>
   </div>
   <section>
       <div class="title">
           <p>PHP 5.4 File Upload Progress Demo</p>
           <hr>
        </div>
        <div class="form-part">
            <p class="title-sect">Upload</p>
            <p class="subtitle">Select one or two files to upload (Max total size 2MB)</p>
        </div>
        <form  action="" method="post" enctype="multipart/form-data">
            
            <div class="form">
                <label for="file1">File1</label>
                <input type="text" name="file1" id="textfile" >
                <input type="file"  id="fileupl1" name="fileupl1"/>
            </div>
            <br>
            <div class="form">
                <label for="file2">File2</label>
                <input type="text" name="file2" id="textfile2">
                <input type="file" id="fileupl2" name="fileupl2"/>
            </div>
            
            <div class="btn">
            <input class="button "type="submit" name="upload" id="upload" value="upload"/>
            </div>
        </form>
        <p class="end-parag">Progress</p>
        
   <?php
    $target_dir = "uploads/";
    $target_file1 = $target_dir . basename($_FILES["fileupl1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["fileupl2"]["name"]);
    $uploadOk = 1;
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    $error_ada = 1;
    $sudah_upload = "NO";
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
   
    
    // Check if file already exists
    if($_FILES["fileupl1"]["tmp_name"]){
    if (file_exists($target_file1)) {
    }
    }

    // Check if file already exists
    if($_FILES["fileupl2"]["tmp_name"]){
    if (file_exists($target_file2)) {
    }
    }

    // Check file size
    if($_FILES["fileupl1"]["tmp_name"]){
    if ($_FILES["fileupl1"]["size"] > 2097152) {
        // $msg= "Sorry, your file is too large.";
        // alert($msg);
       
    }
    }

    // Check file size
    if($_FILES["fileupl2"]["tmp_name"]){
    if ($_FILES["fileupl2"]["size"] > 2097152) {
        // $msg= "Sorry, your file is too large.";
        // alert($msg);
       
    }
    }

    if ($uploadOk == 0) {
        alert("Sorry your file is not uploaded");
    } else {
    if($_FILES["fileupl1"]["tmp_name"]){
        if (move_uploaded_file($_FILES["fileupl1"]["tmp_name"], $target_file1)) {
        $error_ada = 0;
        empty($_FILES["fileupl1"]["tmp_name"]);
        // $msg = "The file ". htmlspecialchars( basename( $_FILES["fileupl1"]["name"])). " has been uploaded.";
        // alert($msg);
        } else {
        $error_ada = 1;
        }
    }

    if($_FILES["fileupl2"]["tmp_name"]){
        //check if file is same
    if($_FILES["fileupl1"]==$_FILES["fileupl2"]){
        // $msg = "File is same";
        // alert($msg);
    } else if (move_uploaded_file($_FILES["fileupl2"]["tmp_name"], $target_file2)) {
        $error_ada = 0;
        empty($_FILES["fileupl2"]["tmp_name"]);
        // $msg = "The file ". htmlspecialchars( basename( $_FILES["fileupl2"]["name"])). " has been uploaded.";
        // alert($msg);
        } else {
        $error_ada = 1;
        }
    }
    
    if ($error_ada === 1) {
        // $msg= "Sorry, there was an error uploading your file.";
        // alert($msg);
    } else {
        $sudah_upload = "YA";
    }
    
    }

    ?>
    
    <div id="contain">       
            <div id="barr" class="myBar <?php
                if(isset($sudah_upload)){
                    if($sudah_upload === "YA"){
                        echo "complete" ;
                    }
                }
            ?>">
        </div>
    </div>
   </section>
</body>

</html>
