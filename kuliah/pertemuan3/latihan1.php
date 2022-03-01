<?php 
//pengulangan
//for
//while
//do.. while
//foreach : pengulangan khusus array

for ($i = 0; $i < 5; $i ++) {
    echo "hello world <br>";
}

echo "<br>";

$i = 0;
while ($i < 5) {
    echo "hello world <br>";
$i ++ ;
}

echo "<br>";

$i = 0;
do {echo "hello world <br>";
$i ++ ;
} while ( $i < 5);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0" >
    <?php
     for ($i = 1; $i <= 5; $i ++ ) {
        echo "<tr>";
        for ($j = 1; $j <= 5; $j ++) {
            echo "<td> $i,$j</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<br>    

<table border="1" cellpadding="10" cellspacing="0" >
    <?php for ($i = 1; $i <= 5; $i ++ ) { ?>
    
        <tr>
            <?php for ($j = 1; $j <= 5; $j ++) { ?>
                <td><?php echo "$i,$j"?></td>
            <?php } ?>
        </tr>        
        
    <?php } ?>
</table>

</body>
</html>