<?php
$bedData = @file_get_contents('https://script.google.com/macros/s/AKfycbwjofX41Qll_2LohSzF3Na6SOciJ5g8seAv4UOujgrj62Nb36pO/exec');
if ($bedData === FALSE) { ?>
    <h1 class="text-center align-middle">internet connection failed</h1>
    <?php
} else {
    $bed = json_decode($bedData, true);
    foreach ($bed["bed"] as $key => $value) { ?>
        <div class="card w-50 float-left p-1">
            <div class="row no-gutters">
                <div class="bg-primary shadow text-light align-self-center rounded-lg" style="width: 105px; height: 105px">
                    <div class="row d-flex justify-content-center">
                        <h4><?= str_replace("_", " ", (strtoupper($key))) ?></h4>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <h1 class="h1 font-weight-bold"><?= $value["available"] ?></h1>
                    </div>
                </div>
                <div class="col-md-8 mb-0 pb-0">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Tersedia</h5>
                            </div>
                            <div class="col">
                                <h5 class="float-right"><?= $value["available"] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">Total</p>
                            </div>
                            <div class="col">
                                <p class="float-right"><?= $value["total"] ?></p>
                            </div>
                        </div>
                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>