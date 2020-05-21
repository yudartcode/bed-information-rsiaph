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
                <div class="bg-primary shadow text-light rounded-lg d-flex align-content-center flex-wrap" style="width: 125px; height: 82px">
                    <div class="d-flex justify-content-center" style="width: 120px">
                        <h5 class="m-0 p-0 text-center" style="line-height: 1.2rem"><?= str_replace("_", " ", (strtoupper($key))) ?></h5>
                    </div>
                    <div class="d-flex justify-content-center" style="width: 120px">
                        <h1 class="m-0 p-0" style="line-height: 2rem"><?= $value["available"] ?></h1>
                    </div>
                </div>
                <div class="col-6 mb-0 p-0 pl-3 mt-2">
                    <div class="card-body p-0">
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