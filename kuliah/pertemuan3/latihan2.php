<?php
// pengkondisian atau percabangan
// if elseif else if else
// ternary
// switch

$x = 20;
if ($x < 20) {
    echo "benar";
} elseif ($x == 20) {
    echo "bingo";
}
else { 
    echo "salah";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <style>
        .warna_baris {
            background-color: silver ;
        }
    </style>
</head>
<body>  

<table border="1" cellpadding="10" cellspacing="0" >
    <?php for ($i = 1; $i <= 5; $i ++ ) : ?>
        <?php if ($i % 2 == 1) : ?>
            <tr class="warna_baris">
        <?php else :?>
            <tr>
        <?php endif;?>
            <?php for ($j = 1; $j <= 5; $j ++) : ?>
                <td><?php echo "$i,$j"?></td>
            <?php endfor; ?>
        
    <?php endfor; ?>
</table>

</body>
</html>