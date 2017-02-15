<?php
    require_once './helligdager.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Norske Helligdager</title>
    </head>
    <body>
        <h1>Vi har følgende helligdager i <?php echo date("Y"); ?></h1>
        <?php
        $helligdagerObj = new helligdager();
        $ts = mktime(0, 0, 0, 1, 1);
        $tsEnd = mktime(0, 0, 0, 12, 31);
        while ($ts <= $tsEnd) {
            if ($helligdagerObj->isHelligdag($ts)) {
                echo date("d.m.Y", $ts).'<br/>';
            }
            $ts += (60*60*24);
        }
        ?>
    </body>
</html>
