<?php /*

testuser1~8a7f9d2828baa8ef45c428af86a2ccdf~544addc5250f43d6c44bf08b679ae0d2|
testuser2~51194d5f98c21662716fe9cf35c332ba~30704545a3f785428d5ffe6a5651b321|
testuser3~41f416bb98ca81b861709619bf256a92~e12565aa1d8ad3ddfc8ca3d91f7d8ecf|
testuser4~38c423de086d17f373090908366634d0~4249452e49576a8825a5154a6a5d5b2b|
testuser5~7b8eb5ee5e2fc3a1e7552ec076fac864~f33d63fdc87634a2a44e5e5e66e6a56e|
*/ ?>

<?php
    echo "<head>";
    echo "<meta name='robots' content='noindex'>";
    echo "</head>";
    echo "<strong>Unauthorized.</strong>";
    header('Location: ' . "index.php");
    die();
?>
