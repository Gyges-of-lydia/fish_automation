<html>

<center><H2>Loading Networks...</H2></center>"
<?php
	exec('sudo create_ap --stop wlan0');
	sleep(3);
?>
<script>document.body.innerHTML = "";</script>


<table border="1" cellpadding="3" cellspacing="0" width=100%>
	<tr bgcolor="#2E9AFE">
		<td><center><b>##</b></center></td> 
		<td><center><b><b>SSID</b></center></td> 
		<td><center><b>Type</b></center></td> 
		<td><center><b>Channel</b></center></td> 
		<td><center><b>Speed (Mbps)</b></center></td> 
		<td><center><b>% Signal</b></center></td> 
		<td><center><b>Security</b></center></td>
		<td><center><b>Toggle</b></center></td>
	</tr>
	
<form method="post">
	
<?php
exec('sudo /usr/bin/python /var/www/html/pys/wifi-listing.py');
$jsonfile = fopen("wifi.json", "r+");
$jsontest = fread($jsonfile,filesize("wifi.json"));
fclose("wifi.json");
$decodedjson=json_decode($jsontest);
$end=count($decodedjson);

for ($i=0; $i != count($decodedjson); $i++) {
	echo "<tr>";
	for ($j=0; $j != count($decodedjson[$i]); $j++) {
		
		echo "<td><center>".$decodedjson[$i][$j]."</center></td>";
	}
	echo "<td><center><input type=radio name=Connect value='".$decodedjson[$i][1].",".$decodedjson[$i][6]."'></center></td>";
	echo "</tr>";

}
echo "</table>";
?>

<center>
	<br>
	<input type='submit' value='Connect'>
	</form>
	<form method="post" style="display: inline;"><button name="Refresh" onclick="history.go(0)" value="Refresh">Refresh Page</button></form>
	<br><br>
	<H3>Please Note: After Connecting to a Wifi, <br>you'll need to Reconnect to the dashboard, <br>with the new ip address that was assigned by your DHCP.<br><h5>(The DHCP Server in a residential house hold is usually integrated with the Router provided by the Internet Provider.)</h5></H3>
</center>

<?php 
	if (isset($_POST['Connect'])) {
		$wifi_name=explode(",",$_POST['Connect'])[0];
		$sec_type=explode(",",$_POST['Connect'])[1];
		if ($sec_type == "--"){
			echo "<center><font color=red><b>Sorry, Unsecured Networks are not Supporterd!</b></font></center>";
		}
		else {
			echo "<center>Please enter the password for ".$wifi_name.": <form method=post><input type=password name='wifi_pass'><input type='submit' value='Submit'></form></center>";
			$wifi_file=fopen("wifi_file","w+");
			fwrite($wifi_file,$wifi_name);
			fclose($wifi_file);
		}
		
	}
	
	if (isset($_POST['wifi_pass'])) {
		$wifi_pass=$_POST['wifi_pass'];
		$wifi_name=fread(fopen("wifi_file","r+"),filesize("wifi_file"));
		echo "<br>";
		fclose("wifi_file");
		exec("sudo /usr/bin/python /var/www/html/pys/wifi-connect.py ".$wifi_name." ".$wifi_pass, $connect_output);
		echo "<center><b>".$connect_output[0]."</b></center>";
		
	}
		
	
?>
</html>
