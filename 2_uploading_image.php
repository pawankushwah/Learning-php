<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Uploading Image to a database</title>
</head>

<body>
    <div class="h-screen w-screen flex justify-center items-center">
        <div class="form-container bg-gray-200 p-4 rounded-lg">
            <!-- After Image has been uploaded -->
            <?php
            // error_reporting(0);

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $filename = $tempfilename = $folder = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uploadImage'])) {
                $imagename = 'image';
                $filename = test_input($_FILES[$imagename]['name']);
                $tempfilename = test_input($_FILES[$imagename]['tmp_name']);
                $filesize = test_input($_FILES[$imagename]['size']);
                $folder = "./uploads/";
                $maxFileSize = 2097152;
                $tableName = "imageupload";

                // validating image file
                $allowed_image_extension = array(
                    "png",
                    "jpg",
                    "jpeg"
                );
                $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                // Validate file input to check if is not empty
                if (!file_exists($_FILES[$imagename]['tmp_name'])) {
                    $response = array(
                        "type" => "error",
                        "ImageMessage" => "Choose image file to upload."
                    );
                }    // Validate file input to check if it is with valid extension
                else if (!in_array($file_extension, $allowed_image_extension)) {
                    $response = array(
                        "type" => "error",
                        "ImageMessage" => "Upload valid images. Only PNG and JPEG are allowed."
                    );
                }    // Validate image file size
                else if (($filesize > $maxFileSize)) {
                    $response = array(
                        "type" => "error",
                        "ImageMessage" => "Image size exceeds 2MB"
                    );
                }    // Validate image file dimension
                // else if ($width > "300" || $height > "200") {
                //     $response = array(
                //         "type" => "error",
                //         "ImageMessage" => "Image dimension should be within 300X200"
                //     );
                // } 
                else {
                    $uniqFileName = pathinfo($_FILES[$imagename]["name"],PATHINFO_FILENAME) . "-" . uniqid() . "." . pathinfo($_FILES[$imagename]["name"],PATHINFO_EXTENSION);
                    $target = $folder . $uniqFileName;
                    if (move_uploaded_file($_FILES[$imagename]["tmp_name"], $target)) {
                        $response = array(
                            "type" => "success",
                            "ImageMessage" => "Image uploaded successfully."
                        );
                    } else {
                        $response = array(
                            "type" => "error",
                            "ImageMessage" => "Problem in uploading image files."
                        );
                    }
                }

                if ($response['type'] != "error") {
                    $db = mysqli_connect("localhost", "root", "", "learning-php");
                    $sql = "INSERT INTO `$tableName` (`name`, `date`) VALUES ('$uniqFileName', current_timestamp());";
                    $result = mysqli_query($db, $sql);
                    if ($result == 1) {
                        $response["type"] = "success";
                        $response = array_merge($response, array("databaseAlert" => "Submitted Successfully"));
                    } else {
                        $response['type'] = "error";
                        $response = array_merge($response, array("databaseAlert" => "Error Submitting the form"));
                    }
                }
            }
            ?>
            <!-- Messages are shown here -->
            <?php if (!empty($response)) { ?>
                <h3 class="alert alert-<?php if(isset($response["type"])) echo  $response["type"]; ?> shadow-lg pl-8">
                    <?php echo $response["ImageMessage"]; ?>
                    <?php echo "<br>"; ?>
                    <?php if(isset($response["databaseAlert"])) echo $response["databaseAlert"]; ?>
                </h3>
            <?php } ?>
            

            <!-- Form Starts -->
            <form id="imageUploadForm" action="<?php test_input($_SERVER['PHP_SELF']); ?>" method="post" class="w-full" enctype="multipart/form-data">
                <label class="label">
                    <span class="label-text">Pick a file</span>
                </label>
                <input type="file" name="image" class="file-input file-input-bordered w-full max-w-xs">
                <button type="submit" name="uploadImage" class="w-full mt-4 text-white bg-orange-500 rounded-lg">Upload File</button>
            </form>
            <!-- Form Ends -->
        </div>
    </div>
</body>

<script>
    let form = document.querySelector("#imageUploadForm");
    let uploadbtn = document.querySelector("name['uploadImage']");
    uploadbtn.addEventListener('click', ()=>{
        form.reset();
    });
</script>

</html>