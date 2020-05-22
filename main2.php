<?php
$bedData = @file_get_contents('https://script.google.com/macros/s/AKfycbwjofX41Qll_2LohSzF3Na6SOciJ5g8seAv4UOujgrj62Nb36pO/exec');
if ($bedData === FALSE) { ?>
    <h1 class="text-center align-middle">internet connection failed</h1>
    <?php
} else {
    $bed = json_decode($bedData, true);
    $i = 0;
    foreach ($bed["bed"] as $key => $value) {
        if ($i >= 6) { ?>
            <div class="card w-50 d-flex flex-row p-1">
                <div class="bg-primary text-light rounded-lg d-flex align-content-around flex-wrap w-50" style="height: 145px">
                    <div class="d-flex justify-content-center w-100">
                        <h4 class="m-0 p-0 text-center" style="line-height: 1.5rem"><?= str_replace("_", " ", (strtoupper($key))) ?></h4>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <h1 class="display-4"><?= $value["available"] ?></h1>
                    </div>
                </div>
                <div class="d-flex flex-column w-50 p-3" style="height: 145px">
                    <div class="d-flex flex-row justify-content-between mt-3">
                        <h4 class="card-title">Tersedia</h4>
                        <h4 class=""><?= $value["available"] ?></h4>
                    </div>
                    <div class="d-flex flex-row justify-content-between mt-auto mb-3">
                        <p class="h5">Total</p>
                        <p class="h5"><?= $value["total"] ?></p>
                    </div>
                </div>
            </div>
<?php
        }
        $i++;
    }
}
?>