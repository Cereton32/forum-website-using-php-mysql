<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <style>
        #bottom {
            min-height: 433px;
        }
    </style>


    <?php require ('component/header.php'); ?>
    <?php require ('component/connect.php'); ?>



    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/2400x1000/?C++,Apple,"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?computer,Microsoft,"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/2400x700/?programming,computer engineer"
                    alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container-fluid text-light bg-dark mt-1 mb-3 ">
        <h2 class="text-center">iDiscuss - Categories</h2>
        <div class="row">
            <?php
            $sqlfind = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sqlfind);
            while ($row = mysqli_fetch_assoc($result)) {
                $cate = $row['category_name'];
                $catedesc = $row['category_desc'];
                $cateid = $row['category_id'];

                ?>
                <div class="col-md-2.5 mb-5">
                    <div class="card mb-10 h-100 d-flex flex-column p-x-15 " style="width: 22.7rem;">
                        <img class="card-img-top"
                            src="https://source.unsplash.com/500x400/?programming,<?php echo $cate; ?>,programming techincal"
                            alt="Card image cap">
                        <div class="card-body">

                            <h5 class="card-title" style="color: black; font-weight: bold;"><a
                                    href="threadlist.php?catid=<?php echo $cateid; ?>"> <?php echo $cate; ?></a></h5>
                            <p class="card-text mb-3" style="color: black;"><?php echo substr($catedesc, 0, 140); ?></p>
                            <a href="threadlist.php?catid=<?php echo $cateid;?>" class="btn btn-primary mt-2"
                                style=" position: absolute; bottom: 0;">View Threads</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div> <!-- Close the row here -->
    </div>









    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->




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