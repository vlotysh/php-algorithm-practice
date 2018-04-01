<?php

$word1 = 'blue';
$word2   = 'clues';

$cells = [];

for($i = 0; $i < strlen($word1); $i++) {
    for($j = 0; $j < strlen($word2); $j++) {
        if ($word1[$i] == $word2[$j]) {
            if(!isset($cells[$i])) {
                $cells[$i] = [];
            }

            $cells[$i][$j] = $cells[$i-1][$j-1] + 1;
        } else {

            if (!isset($cells[$i-1][$j])) {
                $cells[$i-1][$j] = 0;
            }

            if (!isset($cells[$i][$j-1])    ) {
                $cells[$i][$j-1] = 0;
            }
            $cells[$i][$j] = max($cells[$i-1][$j], $cells[$i][$j-1]);
        }
    }
}

echo '<pre>';

print_r($cells);

echo '</pre>';
?>

<table width="100%" border="1">
    <thead>
        <th>
            <?php foreach (str_split($word1,1) as $index => $letter):?>
                <td align="center"><?=$letter;?></td>
            <?php endforeach;?>
        </th>
    </thead>
    <tbody>
        <?php foreach (str_split($word2,1) as $index => $letter):?>
            <tr align="center">
                <td><?=$letter;?></td>
                <?php foreach ($cells as $cell):?>
                    <td>
                        <?= $cell[$index];?>
                    </td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>


