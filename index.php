<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="palette.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <title>Bed Information</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row pb-3">
            <img src="res/header-edit.jpg" width="100%" alt="header">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- start slide -->
                <div id="slide-ph" class="carousel slide img-thumbnail" data-ride="carousel">
                    <div class="carousel-inner" style="height: 350px">
                        <div class="carousel-item active">
                            <img src="res/slide/image1.jpg" class="w-100 h-100" alt="res/slide/image1.jpg">
                        </div>

                        <?php
                        $dirname = "res/slide/";
                        $images = glob($dirname . "*.jpg");
                        foreach ($images as $image) {
                        ?>
                            <div class="carousel-item">
                                <img src="<?= $image ?>" class="w-100 h-100" alt="<?= $image ?>">
                            </div>
                        <?php
                        }
                        ?>

                        <!-- <div class="carousel-item">
                            <img src="res/slide/image2.jpg" class="w-100 h-100" alt="res/slide/image2.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="res/slide/image4.jpg" class="w-100 h-100" alt="res/slide/image4.jpg">
                        </div> -->
                    </div>
                </div>
                <!-- end slide -->
                <div class="bg-primary shadow text-light mt-3 rounded-lg d-flex justify-content-center p-1" style="height: 83px">
                    <p class="display-4 m-0" id="datetime"></p>
                </div>
            </div>
                            <hr><hr><hr>
            <div class="col-lg-6 pl-0" id="data">

            </div>
        </div>
        <div class="row mt-3">
            <?php $bedData = @file_get_contents('https://script.google.com/macros/s/AKfycbwjofX41Qll_2LohSzF3Na6SOciJ5g8seAv4UOujgrj62Nb36pO/exec');
            $bed = json_decode($bedData, true); ?>
            <marquee>
                <h3 class="display-4 font-weight-bolder"><?= $bed["runing_text"] ?></h3>
            </marquee>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
            $('#data').load('main.php');
            setInterval(function() {
                $("#data").load('main.php');
                var dt = new Date();
                $('#datetime').html(dt.getDate() + ' ' + months[dt.getMonth()] + ' ' + dt.getFullYear() + '-' + dt.getHours() + ':' + dt.getMinutes() + ':' + dt.getSeconds());
            }, 1000);
        });
    </script>
</body>

</html>