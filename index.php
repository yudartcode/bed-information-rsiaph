<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="palette.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Bed Information</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row pb-3">
            <img src="res/header-edit.jpg" width="100%" alt="header">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="bg-primary shadow text-light mb-3 mt-1 rounded-lg d-flex justify-content-center p-1" style="height: 85px">
                    <p class="display-4 m-0" id="datetime"></p>
                </div>
                <div id="slide-ph" class="carousel slide img-thumbnail" data-ride="carousel">
                    <div class="carousel-inner" style="height: 350px">
                        <?php
                        $dirname = "res/slide/";
                        $images = glob($dirname . "*.jpg");
                        $ke = 0;
                        foreach ($images as $image) {
                        ?>
                            <div class="carousel-item <?= ($ke == 0) ? 'active' : ''; ?>">
                                <img src="<?= $image ?>" class="w-100 h-100" alt="<?= $image ?>">
                            </div>
                        <?php
                            $ke++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 pr-3">
                <div id="slide-data" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex flex-wrap" id="data">

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="d-flex flex-wrap" id="data2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="bottom: 0px">
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
            $('#data2').load('main2.php');
            setInterval(function() {
                $("#data").load('main.php');
                $("#data2").load('main2.php');
                var dt = new Date();
                $('#datetime').html('Info Bed : ' + dt.getDate() + ' ' + months[dt.getMonth()] + ' ' + dt.getFullYear());
            }, 1000);
        });
    </script>
</body>

</html>