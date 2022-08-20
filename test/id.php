<?php
$faculty = "DGE";
$batch = "2076";
$increment = "0";
$id = "";

for ($i = 1; $i <= 15; $i++) {
    if ($i < 100) {
        if ($i < 10) {
            $increment = "00" . $i;
        } else {
            $increment = "0" . $i;
        }
    } else {
        $increment = $i;
    }

    $id = "$faculty-$batch-$increment";
    echo $id . "<br>";
}
