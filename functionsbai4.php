<?php
function inmang($a){
    foreach ((array)$a as $value) {
        echo $value . ' ';
    }
}
function timMax($a){
    return max($a);
}
function timMin($a){
    return min($a);
}
function tinhtong($a){
    return array_sum($a);
}
function sapxep($a){
    sort($a);
    return $a;
}
function kiemTraPhanTu($a, $phanTu) {
    return in_array($phanTu, $a);
}

?>