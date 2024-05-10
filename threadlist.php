<?php
require ('component/connect.php');
$id = $_GET['catid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {





    // Retrieve form data
    $title = $_POST['questiontitle'];
    $desc = $_POST['questiondesc'];

    // Use prepared statement to prevent SQL injection
    $sqlinsert = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cate_id`, `thread_username`, `time_stamp`) VALUES ('$title', '$desc', '$id', 'User', current_timestamp())";
    $result = mysqli_query($conn, $sqlinsert);
    $success = true;







}





?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Thread Page</title>
</head>

<body>
    <?php require ('component/header.php'); ?>


    <?php

    $sqlfind1 = "SELECT * FROM `category` WHERE `category_id` = '$id' ";
    $result = mysqli_query($conn, $sqlfind1);
    while ($row = mysqli_fetch_assoc($result)) {
        $cate = $row['category_name'];
        $catedesc = $row['category_desc'];
    }


    ?>

    <div class="container my-4">

        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $cate; ?> forum </h1>
            <p class="lead"><?php echo $catedesc; ?> </p>
            <hr class="my-4">
            <p>This is for sharing knowledge to eacher other based on the topic of Python <br>
                Forum Rules <br>
                This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same
                respect you would a public park. ...
                <br> Improve the Discussion. ...
                <br> Be Agreeable, Even When You Disagree. ...
                <br>Always Be Civil. ...
                <br> Keep It Tidy.
            </p>
            <a class="btn btn-primary btn-lg btn-success" href="threadlist.php?catid=<?php echo $id; ?>"
                role="button">Learn more</a>
        </div>
    </div>
    <div class="container">
        <h2>Ask Your Question</h2>
        <form action="threadlist.php?catid=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="questiontitle">Question Title </label>
                <input type="text" class="form-control" id="questiontitle" name="questiontitle">
            </div>
            <div class="form-group">
                <label for="questiondesc">Question Description</label>
                <input type="text" class="form-control" id="questiondesc" name="questiondesc">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
    <div class="container mb-5">

        <h1>Browse Questions</h1>
        <!-- question of user -->

        <?php
        $sqlthread = "SELECT * FROM `thread` WHERE `thread_cate_id` = '$id'";
        $newResult = mysqli_query($conn, $sqlthread);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($newResult)) {

            $threadtitle = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
            $threadusername = $row['thread_username'];
            $threadtime = $row['time_stamp'];
            $threadid = $row['thread_id'];
            $noresult = false;
            echo '
            <div class="media my-3">

            <img class="mr-3" src="img/user.webp" width="70px" height="80px" alt="Generic placeholder image">
            <div class="media-body">
                <h4> ' . $threadusername . '</h4>
                <h5 class="mt-0"><a href="thread.php?id=' . $threadid . '" class="text-dark">' . $threadtitle . '</a></h5>
                <p>' . $threadtime . ' <br> ' . $threaddesc . ' </p>


            </div>
            
        </div>

';
            if ($success) {
                header("Location:thread.php?id=$threadid");
            }

        }
        if ($noresult) {
            echo '
            <div class="alert alert-danger" role="alert">
                No Question Founds,Feel Free to Ask Any Doubt
                </div>
      
                
            ';
        }


        ?>



    </div>




    <?php require ('component/footer.php') ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>