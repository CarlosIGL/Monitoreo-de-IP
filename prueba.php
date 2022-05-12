<?php
$iplist = array(
    array("192.168.1.79","PC_01"),
    array("192.168.1.82","PC_02")
);
$i = count($iplist);
$results = [];

for($j=0;$j<$i;$j++){
    $ip = $iplist[$j][0];
    $ping = exec("ping -n 1 $ip",$output,$status);
    $results [] = $status;
}

echo '<font face = Courier New>';
echo "<table border = 1 style='border-collapse: collapse'>
<th colspan=4> Ping Monitoring </th>
<tr>
<td align=right width=20>#</td>
<td width = 100>IP/URL</td>
<td width = 100>STATUS</td>
<td width = 250>DESCRIPTION</td>
</tr>
";

foreach ($results as $item =>$k) {
    echo '<tr>';
    echo '<td align=right>'.$item.'</td>';
    echo '<td>'.$iplist[$item][0].'</td>';
    if ($results[$item] ==0){
        echo '<td>Online</td>';
    } else {
        echo '<td>Offline</td>';
    }
    echo '<td>'.$iplist[$item][1].'</td>';
    echo '</tr>';
}

echo "</table>";
echo '</font>';
echo header("refresh: 2");
?>