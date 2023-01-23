<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Showing Uploaded images | learning_php</title>
</head>

<body>
    <div class="p-8 grid grid-cols-3 justify-between bg-blue-500 gap-8 overflow-x-hidden overflow-y-auto">
    <!-- <div class="w-screen h-screen p-8 flex flex-col justify-between bg-blue-500 gap-y-8 overflow-x-hidden overflow-y-auto"> -->
        <!-- <button class="bg-orange-500 text-white rounded-lg p-4 border-b-8 border-gray-600 active:border-b-2" onclick="imageView('List')">List View</button>
        <button class="bg-orange-500 text-white rounded-lg p-4 border-b-8 border-gray-600 active:border-b-2" onclick="imageView('thumbnail')">thumbnail View</button>
        <button class="bg-orange-500 text-white rounded-lg p-4 border-b-8 border-gray-600 active:border-b-2" onclick="imageView('icon')">icon View</button> -->
        <!-- dynamically getting the images -->
        <?php
        $response = "";
        $db = mysqli_connect("localhost", "root", "", "learning-php");
        if (!$db) {
            $response = array("type" => "error", "message" => "Unable to get Data");
        }
        $sql = "SELECT * FROM `imageupload`";

        $result = mysqli_query($db, $sql);
        if (!$result) {
            $response = array("type" => "error", "message" => "Unable to get Data");
        }
        $num = mysqli_num_rows($result);
        $rows = mysqli_fetch_field($result)
        ?>

        <div class="card col-span-3">
        <!-- <div class="card"> -->
            <!-- Messages are shown here -->
            <?php if (!empty($response)) { ?>
                <h3 class="alert alert-<?php if (isset($response["type"])) echo  $response["type"]; ?> shadow-lg pl-8">
                    <?php echo $response["message"]; ?>
                </h3>
            <?php } ?>
        </div>

        <!-- cards start -->
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <span id="card" class="card card-compact w-96 bg-gray-100 shadow-xl">
                <figure><img class="bg-contain" src="./uploads/<?php echo $row['name'] ?>"></figure>
                <div class="card-body"> </div>
            </span>

            <!-- <span class="alert w-full lg:card-side bg-base-100 shadow-xl">
                <figure><img class="bg-contain w-40 h-20" src="./uploads/<?php echo $row['name'] ?>"></figure>
                <div class="card-body"></div>
                <div class="flex-none">
                    <button class="btn btn-sm btn-ghost">Deny</button>
                    <button class="btn btn-sm btn-primary">Accept</button>
                </div>
            </span> -->

        <?php } ?>
    </div>
</body>

<script>
    // function imageView(view){
    //     let card = Array.from(document.getElementsByClassName("card"));
    //     if(view == "thumbnail"){
    //         for (let i = 0; i < card.length; i++) {
    //             var cardImg = card[i].firstElementChild.firstElementChild;
    //             var cardBody = card[i].lastElementChild;
    //             card.classList = "card card-compact w-96 bg-gray-100 shadow-xl";
    //             cardImg.className = "bg-contain";                
    //         }
    //     }
    //     else if(view == "list"){
    //         for (let i = 0; i < card.length; i++) {
    //             let cardImg = card[i].firstElementChild.firstElementChild;
    //             let cardBody = card[i].lastElementChild;
    //             card.classList = "card lg:card-side bg-base-100 shadow-xl";
    //             cardImg.classList = "";
    //         }
    //     }
    //     else{
    //         // card.classList = "";
    //         // cardImg.classList = "";            
    //     }
    // }
</script>

</html>