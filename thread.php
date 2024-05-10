<?php
require ('component/connect.php');
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {





    // Retrieve form data
   
    $comment = $_POST['commentcontent'];

    // Use prepared statement to prevent SQL injection
    $sqlinsert2 = "INSERT INTO `comment` (`username`, `comment_content`, `thread_id`, `time_stamp`) VALUES ( 'User','$comment', '$id', current_timestamp())";
    $result = mysqli_query($conn, $sqlinsert2);
    







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
    <?php require ('component/connect.php'); ?>

    <?php
    $id=$_GET['id'];


    $sqlfind2 = "SELECT * FROM `thread` WHERE `thread_id` = '$id' ";
    $result2 = mysqli_query($conn, $sqlfind2);

        $row = mysqli_fetch_assoc($result2);
        $threadtitle = $row['thread_title'];
        $threaddesc = $row['thread_desc'];
        $threadusername = $row['thread_username'];
        $threadtime = $row['time_stamp'];
        $threadid = $row['thread_id'];
        
        echo '
        <div class=" container-fluid text-light bg-dark media my-2 mb-5">

        <img class="mr-3 my-3" src="img/user.webp" width="70px" height="80px" alt="Generic placeholder image">
        <div class="media-body my-3">
            <h4>@'.$threadusername.'</h4>
            <h5 class="mt-0">'.$threadtitle.'</h5>
            <p>'.$threaddesc.' </p>


        </div>
    </div>

';


    ?>
    
    <div class="container">
        <h2>Post your comment</h2>
        <form action="thread.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="commentcontent">Type your comment Comment</label>
                <input type="text" class="form-control" id="commentcontent" name="commentcontent">
            </div>
        
            <button type="submit" class="btn btn-success">Post</button>
        </form>


    </div>
    <div class="container">

    <h1 class="text-center">Discussion</h1>

    <?php
        $sqlcomment = "SELECT * FROM `comment` WHERE `thread_id` = $id";
        $newResult = mysqli_query($conn, $sqlcomment);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($newResult)) {
           $username = $row['username'];
           $commentcontent =$row['comment_content'];
           $time =$row['time_stamp'];
            
            $noresult = false;
            echo '
            <div class="media my-3">

            <img class="mr-3" src="img/user.webp" width="70px" height="80px" alt="Generic placeholder image">
            <div class="media-body">
                <h4> ' . $username . '</h4>
                <p>'.$commentcontent.' <br> '.$time.'</p>


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