<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="mobile-web-app-capable" content="yes">
<title>Aquarium Dashboard</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
	}
</style>

</head>

<body>
<?php

    if (isset($_POST['Feed']))
	        {
					$fdh=fopen("fd_progress","r+");
					                 $check_fd=fread($fdh,filesize("fd_progress"));
					                 if ($check_fd==0) {
								                          exec('sudo /usr/bin/python pys/feed.py');
											                           $_POST['Feed'] == '0';
											                           date_default_timezone_set("Asia/Jerusalem");
														                            $date = date('d/m/Y H:i:s', time());
														                		 $feed = 'Feed';
														                        	 file_put_contents($feed, $date);
																		                  }
                     if ($check_fd==1) {
			                              echo "<script>alert('Warning! Feeding is still in Progress, Ignoring Request...');</script>";
						           }
							     }


        if (isset($_POST['Lights_on']))
		    {
			             exec('sudo /usr/bin/python pys/lights_on.py');
				     	     $_POST['Light'] = '0';
				         }
	    if (isset($_POST['Lights_off']))
		        {
				         exec('sudo /usr/bin/python pys/lights_off.py');
					 	     $_POST['Light'] = '0';
					     }


	    if (isset($_POST['Drain']))
		        {
				         $fch=fopen("ch_progress","r+");
					 		 $check_fch=fread($fch,filesize("ch_progress"));
					 		 if ($check_fch=="0") {
								 			 exec('sudo /usr/bin/python pys/drain.py &');
											 		   	 $_POST['Change'] == '0';
											 			 date_default_timezone_set("Asia/Jerusalem");
														 			 $date = date('d/m/Y H:i:s', time());
														              $change = 'Change';
														 		     file_put_contents($change, $date);
														 		 }
							 		 if ($check_fch=="1") {
										 			 echo "<script>alert(\"Warning! Water Drain or Refill is still in Progress, Ignoring Request...\");</script>";
													 		 }
							 		}


	    if (isset($_POST['Refill']))
		        {
				         $rfch=fopen("ch_progress","r+");
					                  $check_rfch=fread($rfch,filesize("ch_progress"));
					                  if ($check_rfch==0) {
								                           exec('sudo /usr/bin/python pys/refill.py &');
											                            $_POST['Change'] == '0';
											                            date_default_timezone_set("Asia/Jerusalem");
														                             $date = date('d/m/Y H:i:s', time());
														                 $change = 'Change';
														                         file_put_contents($change, $date);
														                     }
							                   elseif ($check_rfch==1)  {
										                            echo "<script>alert(\"Warning! Water Drain or Refill is still in Progress, Ignoring Request...\");</script>";
													                     }
							  		   }
	        if (isset($_POST['Name']))
				{
							$aq_name = 'aq_name';
									file_put_contents($aq_name, $_POST['Name']);
							 	}
			if (isset($_POST['Feed_Interval']))
					{
								$Feed_Interval = 'Feed_Interval';
										file_put_contents($Feed_Interval, $_POST['Feed_Interval']);
								 	}
	if (isset($_POST['Feed_Interval_At']))
		        {
				                $Feed_Interval_At = 'Feed_Interval_At';
						                file_put_contents($Feed_Interval_At, $_POST['Feed_Interval_At']);
						        }
		if (isset($_POST['Filter']))
			        {
							date_default_timezone_set("Asia/Jerusalem");
									$date = date('d/m/Y H:i:s', time());
							                $Filter = 'Filter';
											file_put_contents($Filter, $date);
									        }

			if (isset($_POST['Change_Interval']))
					{
								$Change_Interval = 'Change_Interval';
										file_put_contents($Change_Interval, $_POST['Change_Interval']);
								 	}
				if (isset($_POST['Change_Interval_At']))
							{ $Change_Interval_At = 'Change_Interval_At';
				 	         file_put_contents($Change_Interval_At, $_POST['Change_Interval_At']);
						}
				 	if (isset($_POST['Light_Interval']))
							{

										$start = intval(substr($_POST['Light_Interval'], 0, 2));
												$start_str = substr($_POST['Light_Interval'], 0, 2);
												$dur = intval($_POST['Light_Duration']);
														$sum = $start + $dur;
														$sum_str = strval($sum);
																if ($sum <= 24) {
																			$Light_Dur = 'Light_Dur';
																					$end_resault = $start_str.$sum_str;
																					file_put_contents($Light_Dur,$end_resault);
																							}
														 	}
						if (isset($_POST['lcd_on']))
								{
										 exec('sudo /usr/bin/python pys/lcd_on.py');
										          $_POST['lcd_on'] == '0';
										 	}
							 if (isset($_POST['lcd_off']))
								         {
										          exec('sudo /usr/bin/python pys/lcd_off.py');
											           $_POST['lcd_on'] == '0';
											          }


?>


<style>
	td {
	font-size: 100%;
	}
	button {
 		 color: #000;
 		 border: 1px solid #2BC067;
 		 background-color: #44D7D7;
	}
	input[type=submit]{
	     color: #000;
 		 border: 1px solid #000;
 		 line-height: 1px;
 		 padding: 10px;
 	}
 	input, select {
 	padding: 1px 1px;
 	line-height: 1px;
 	width 20px;

 	}


}
.auto-style4 {
	font-weight: normal;
}
.auto-style5 {
	border: 1px solid #000000;
	background-color: #44D7D7;

}
.auto-style6 {
	border: 1px solid #000000;
	text-align: left;
	background-color: #44D7D7;
	width: auto;
	height: auto;

}
.auto-style7 {
	border: 1px solid #000000;
	text-align: justify;
	background-color: #2BC067;
}
.auto-style8 {
	background-color: transparent;
	color: black;
}
.auto-style10 {
	border: 1px solid #000000;
	background-color: #44D7D7;
	font-size: small;
}
.auto-style12 {
	border: 1px solid #000000;
	background-color: #2BC067;
	font-size: small;
}
.auto-style13 {
	font-size: small;
}

.auto-style14 {
	border: 1px solid #000000;
	text-align: left;
	background-color: #44D7D7;
	width: auto;
}



</style>


<table cellpadding="0" cellspacing="0" class="auto-style8" align="center">
	<tr>
		<td class="auto-style1" colspan="2"><h2>Aquarium Dashboard	<?php
															$cel=fopen("aq_name","r");
															echo " - ".fread($cel,filesize("aq_name"));
															fclose($cel);
														?>

		</h2>

		<script>
			var nameOfDay = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
			var data = new Date();
			data.setTime(<?php echo time() * 1000; ?>);
			function clock()
			{
				var hou = data.getHours();
				var min = data.getMinutes();
				var sec = data.getSeconds();
				if(hou<10){ hou= "0"+hou;}
				if(min<10){ min= "0"+min;}
				if(sec<10){ sec= "0"+sec;}
				var dayIdx = data.getDay();
				var day = nameOfDay[dayIdx];
				document.getElementById('clock').style.fontSize = "large";
				document.getElementById('clock').style.font
				document.getElementById('clock').innerHTML ="Aquarium Status: " + day + " " + data.getDate()+"/"+(data.getMonth()+1)+"/"+data.getFullYear()+" - "+hou+":"+min+":"+sec;
			    data.setTime(data.getTime()+1000)
		    setTimeout("clock();",1000);
			}
		</script>
<body onload="clock()">
<div id="clock"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<table style="width: 100%">
			<tr>
				<td class="auto-style12" style="width: 146px; height: 16px; " >Current Temprature:</td>
				<td class="auto-style12" colspan="3" style="height: 16px">
					<?php
					$cel=fopen("temprature","r");
					echo fread($cel,filesize("temprature"));
					fclose($cel);
					?>&deg;C

				&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style10" style="width: 146px; height: 1px;">Last Feed:</td>
				<td class="auto-style5" style="width: 150px; height: 1px">
				 <?php
                                        $cel=fopen("last_feed_time","r");
                                        echo fread($cel,filesize("last_feed_time"));
                                        fclose($cel);
                                        ?>
				</td>
<!--				<td class="auto-style10" style="width: 162px; height: 1px;">Next Auto Feed:</td>
				<td class="auto-style5" style="height: 1px; width: 150px;"> -->
				</td>
			</tr>
			<tr>
				<td class="auto-style10" style="width: 146px; ">Last Water
				Exchange:</td>
				<td class="auto-style5" style="width: 150px; ">
				<?php
					$cel=fopen("Change","r");
					echo fread($cel,filesize("Change"));
					fclose($cel);
					?>
				</td>
<!--				<td class="auto-style10" style="width: 162px; ">Next Auto Water
				Exchange:</td>
				<td class="auto-style5" style="width: 150px;">
				</td> -->
			</tr>
			<tr>
				<td class="auto-style10" style="width: 146px; ">Last Filter
				Maintenance:
<form method="post" style="display: inline;"><button name="Filter">Click to Mark Maintenance</button></form>
</td>
				<td class="auto-style5" style="width: 10px;">
				<?php
				$fn=fopen("Filter","r");
                                echo fread($fn,filesize("Filter"));
                                fclose($fn);
				?>
				</td>
<!--				<td class="auto-style10" style="width: 146px; ">Next Maintenance:</td>
				<td class="auto-style5" style="width: 150px;">
				</td> -->
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;<hr style="color: #000; background-color: #000; height: 1px;"></hr></td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2"><h3 class="auto-style4">Aquarium Quick Tools</h3></td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2">&nbsp;
			<form method="post" style="display: inline;"><button name="Feed">Feed Now</button></form>
			<form method="post" style="display: inline;"><button name="Lights_on">Lights On</button></form>
			<form method="post" style="display: inline;"><button name="Lights_off">Lights Off</button></form>
			<form method="post" style="display: inline;"><button name="Drain">Drain Water Portion Now</button></form>
			<form method="post" style="display: inline;"><button name="Refill">Refill  Water Portion Now</button></form>
			<form method="post" style="display: inline;"><button name="Refresh" onclick="history.go(0)" value="Refresh">Refresh Page</button></form>
			<hr style="color: #000; background-color: #000; height: 1px;"></hr>
		</td>
	</tr>

	<tr>
	<td class="auto-style1" colspan="2"><h3 class="auto-style4">Aquarium Automation Settings</h3></td>




	</tr>
	<tr>
		<td class="auto-style7" colspan="2">
		<form method="post"><span class="auto-style13">Set Aquarium Name:</span>&nbsp;<input name="Name" type="text"  size="20" maxlength="20" style="width: 150px !important";/>&nbsp;&nbsp;<input type="submit" value="Set"> (*Max. 20 Characters)</form>
		</td>
	</tr>

	<tr>
		<td class="auto-style6" style="width: 412px">
		<form method="post"><span class="auto-style13">Set Feeding Cycle</span>:&nbsp;
		    	<select name="Feed_Interval" style="width: 150px !important";>
					  <option value="Once a Day">Once a Day</option>
					  <option value="Twice a Day">Twice a Day</option>
					  <option value="Shut Auto Feeding">Shut Auto Feeding</option>
				</select>&nbsp;at&nbsp;<select name="Feed_Interval_At" style="width: 70px !important";>
                                          <option value="00:00">00:00</option>
                                          <option value="01:00">01:00</option>
                                          <option value="02:00">02:00</option>
                                          <option value="03:00">03:00</option>
                                          <option value="04:00">04:00</option>
                                          <option value="05:00">05:00</option>
                                          <option value="06:00">06:00</option>
                                          <option value="07:00">07:00</option>
                                          <option value="08:00">08:00</option>
                                          <option value="09:00">09:00</option>
                                          <option value="10:00">10:00</option>
                                          <option value="11:00">11:00</option>
                                          <option value="12:00">12:00</option>
                                          <option value="13:00">13:00</option>
                                          <option value="14:00">14:00</option>
                                          <option value="15:00">15:00</option>
                                          <option value="16:00">16:00</option>
                                          <option value="17:00">17:00</option>
                                          <option value="18:00">18:00</option>
                                          <option value="19:00">19:00</option>
                                          <option value="20:00">20:00</option>
                                          <option value="21:00">21:00</option>
                                          <option value="22:00">22:00</option>
                                          <option value="23:00">23:00</option>
                                        </select>

		<input type="submit" value="Set"></form>
		</td>

		<td class="auto-style6" style="width: 300px">
		&nbsp;&nbsp;
		<?php
					$fi=fopen("Feed_Interval","r+");
					$filefi=fread($fi,filesize("Feed_Interval"));
					if ($filefi == "Shut Auto Feeding"){
						Echo "Auto Feeding is Shut";
						}else{
					echo $filefi;
					fclose($fi);
					echo " at ";
					$fl=fopen("Feed_Interval_At","r+");
                                        echo fread($fl,filesize("Feed_Interval_At"));
                                        fclose($fl);
					}
					exec('sudo /usr/bin/python pys/cronjob-change.py');
		?>
		</td>
	<tr>
		<td class="auto-style6" style="width: 412px">
		<form method="post"><span class="auto-style13">Set exchange Day:</span>&nbsp;
		    	<select name="Change_Interval" style="width: 150px !important";>
					  <option value="Sunday">Sunday</option>
					  <option value="Monday">Monday</option>
					  <option value="Tuesday">Tuesday</option>
					  <option value="Wednesday">Wednesday</option>
					  <option value="Thursday">Thursday</option>
					  <option value="Friday">Friday</option>
					  <option value="Saturday">Sarurday</option>
					  <option value="Shut Auto Change">Shut Auto Change</option>
				</select>

				&nbsp;at&nbsp;<select name="Change_Interval_At" style="width: 70px !important";>
                                          <option value="00:00">00:00</option>
                                          <option value="01:00">01:00</option>
                                          <option value="02:00">02:00</option>
                                          <option value="03:00">03:00</option>
                                          <option value="04:00">04:00</option>
                                          <option value="05:00">05:00</option>
                                          <option value="06:00">06:00</option>
                                          <option value="07:00">07:00</option>
                                          <option value="08:00">08:00</option>
                                          <option value="09:00">09:00</option>
                                          <option value="10:00">10:00</option>
                                          <option value="11:00">11:00</option>
                                          <option value="12:00">12:00</option>
                                          <option value="13:00">13:00</option>
                                          <option value="14:00">14:00</option>
                                          <option value="15:00">15:00</option>
                                          <option value="16:00">16:00</option>
                                          <option value="17:00">17:00</option>
                                          <option value="18:00">18:00</option>
                                          <option value="19:00">19:00</option>
                                          <option value="20:00">20:00</option>
                                          <option value="21:00">21:00</option>
                                          <option value="22:00">22:00</option>
                                          <option value="23:00">23:00</option>
                                        </select>

<input type="submit" value="Set">
		</form>

		</td>


		<td style="height: 20px; width: 300px;" class="auto-style6">
		&nbsp;&nbsp;
		<?php

					$fi=fopen("Change_Interval","r+");
					$filefi=fread($fi,filesize("Change_Interval"));
					 if ($filefi == "Shut Auto Change"){
                                                echo "Auto Changing is Shut";
						fclose($fi);
					     }
					else{
					$fn=fopen("Change_Interval","r+");
					echo fread($fn,filesize("Change_Interval"));
					fclose($fn);
					fclose($fi);
					echo " at ";
					$fl=fopen("Change_Interval_At","r+");
                    			echo fread($fl,filesize("Change_Interval_At"));
			                fclose($fl);
					}
					exec('sudo /usr/bin/python pys/cronjob-change.py');
		?>

		&nbsp;</td>


	</tr>

	<tr>
		<td style="width: 412px;" width: 208px;" class="auto-style14">
		<form method="post"><span class="auto-style13">Set Light Start Time:</span>&nbsp;
		    	<select name="Light_Interval" style="width: 70px !important";>
					  <option value="00:00">00:00</option>
					  <option value="01:00">01:00</option>
					  <option value="02:00">02:00</option>
					  <option value="03:00">03:00</option>
					  <option value="04:00">04:00</option>
					  <option value="05:00">05:00</option>
					  <option value="06:00">06:00</option>
					  <option value="07:00">07:00</option>
					  <option value="08:00">08:00</option>
					  <option value="09:00">09:00</option>
					  <option value="10:00">10:00</option>
					  <option value="11:00">11:00</option>
					  <option value="12:00">12:00</option>
					  <option value="13:00">13:00</option>
					  <option value="14:00">14:00</option>
					  <option value="15:00">15:00</option>
					  <option value="16:00">16:00</option>
					  <option value="17:00">17:00</option>
					  <option value="18:00">18:00</option>
					  <option value="19:00">19:00</option>
					  <option value="20:00">20:00</option>
					  <option value="21:00">21:00</option>
					  <option value="22:00">22:00</option>
					  <option value="23:00">23:00</option>
					</select>
					<span class="auto-style13">Duration</span>:
					<select name="Light_Duration" style="width: 50px !important";>
					  <option value="1">01</option>
					  <option value="2">02</option>
					  <option value="3">03</option>
  					  <option value="4">04</option>
					  <option value="5">05</option>
					  <option value="6">06</option>
					  <option value="7">07</option>
					  <option value="8">08</option>
					  <option value="9">09</option>
					  <option value="10">10</option>
					  <option value="11">11</option>
					  <option value="12">12</option>
					  <option value="13">13</option>
					  <option value="14">14</option>
					  <option value="15">15</option>
					  <option value="16">16</option>
					  <option value="17">17</option>
					  <option value="18">18</option>
					  <option value="19">19</option>
					  <option value="20">20</option>
					  <option value="21">21</option>
					  <option value="22">22</option>
					  <option value="23">23</option>



				</select>&nbsp;&nbsp;<span class="auto-style13">Hours</span>.&nbsp;&nbsp;<input type="submit" value="Set">


		</td>

		<td style="width: 300px;" width: 208px;" class="auto-style14">
		&nbsp;&nbsp;
		<?php
			ini_set( "display_errors", 0);
			$Light_Ans=Light_Ans;
			$start = intval(substr($_POST['Light_Interval'], 0, 2));
			$dur = intval($_POST['Light_Duration']);
			$sum = $start + $dur;
			if ($sum > 24) {
			$ans = "Time is not Within 24H Time Frame!";
			echo $ans;
			$fans = fopen($light_ans,"r+");
			file_put_contents($Light_Ans, $ans);
			fclose($Light_Ans);
			} else {
			$fi=fopen("Light_Dur","r");
			$file_start = fread($fi, 2);
			fseek($fi,2);
			$file_end = fread($fi, 2);
			$ans = "Lights On Between: ".$file_start.":00 to ".$file_end.":00";
			echo $ans;
			fclose($fi);
			$fans = fopen($Light_Ans,"r+");
			file_put_contents($Light_Ans, $ans);
			fclose($Light_Ans);
			}
			exec('sudo /usr/bin/python pys/cronjob-change.py');
		?>

		</td>
	</tr>


			<tr>

		<td class="auto-style1" colspan="2">


			<p>&nbsp;</p>
		<hr style="color: #000; background-color: #000; height: 1px;"></hr>

			<h3 class="auto-style4">Aquarium History</h3></td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2">&nbsp;

		<form><button onclick="changelog()">Change Log</button>
			<script>
				function changelog() {
				window.open("logs/change.log","_blank","width=400, height=600","location=no");
				}
			</script>
		<button onclick="lightslog()">Lights Log</button>
			<script>
				function lightslog() {
				window.open("logs/light.log","_blank","width=400, height=600","location=no");
				}
			</script>
		<button onclick="feedlog()">Feeding Log</button>
			<script>
				function feedlog() {
				window.open("logs/feed.log","_blank","width=400, height=600","location=no");
				}
			</script></form><br><br>
			<form method="post"><span class="auto-style13">Log Retention (in days):&nbsp;
			<input type="text" name="rotate_log" size="2" maxlength="2"><input type="submit" value="Set"></span></form>

 				<?php

			        	                function rotateget(){
												        $rot=fopen("rotate","r+");
													                                        $check=fread($rot,filesize("rotate"));
													                            	         echo"<br>";
													                               		 echo "Current Retention: Logs will be archived Every ".$check." Days";
																		                                          }
						        if (isset($_POST['rotate_log']))
											                {
															                        	if ($_POST['rotate_log'] == "") {
																				        	                        	 echo "<font color=red><br>Rotate days CANNOT be empty!</font>";
																										 	                        	         goto EOC;
																										         	                	         }
								        	                elseif (is_numeric($_POST['rotate_log']) == false ) {
													        	        	                 echo "<font color=red><br>Rotate days Rate MUST be a number!</font>";
																			                         	        	 goto EOC;
																			 	                                	 }
																					                        elseif (intval($_POST['rotate_log']) <= 0) {
																									        		                         echo "<font color=red><br>Refresh Rate MUST be between 1 and 90 !</font>";
																															                         		         goto EOC;
																															                                 		 }

																					                        elseif (intval($_POST['rotate_log']) >= 91) {
																									        		                         echo "<font color=red><br>Refresh Rate MUST be between 1 and 90 !</font>";
																															                         		         goto EOC;
																															                                 		 }

																								$rotate_log = 'rotate';
																			        	                	file_put_contents($rotate_log, $_POST['rotate_log']);
																													exec('sudo /usr/bin/python pys/rotate.py');
																													goto EOC;
																																		}

											EOC:
											rotateget();
									                ?>




		<hr style="color: #000; background-color: #000; height: 1px;"></hr>
		</td>




		<tr>

		<td class="auto-style1" colspan="2">

			<h3 class="auto-style4">Aquarium External LCD Display Settings</h3></td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2">&nbsp;

		<form method="post" style="display: inline;"><button name="lcd_on">Turn On LCD</button></form>
		<form method="post" style="display: inline;"><button name="lcd_off">Turn Off LCD</button></form>
		<form method="post" <br></br>
		<form method="post"><span class="auto-style13">Set LCD Data Refresh Rate (in min):&nbsp;
                <input type="text" name="lcd_refresh" size="2" maxlength="2"><input type="submit" value="Set"></span><br></form>
		<?php
		 if (isset($_POST['lcd_refresh']))
		{
			function refreshlcdshow(){
  		       		 $lcdr=fopen("lcd_refresh","r");
                		 $show=fread($lcdr,filesize("lcd_refresh"));
				 echo"<br>";
		                 echo "Current LCD Refresh Rate: ".$show." Minutes";
				 }

						if ($_POST['lcd_refresh'] == "") {
											 echo "<font color=red><br>Refresh Rate CANNOT be empty!</font>";
											 				 refreshlcdshow();
											 				 exit;
															 				 }
						if (is_numeric($_POST['lcd_refresh']) == false ) {
							                                 echo "<font color=red><br>Refresh Rate MUST be a number!</font>";
											 				 refreshlcdshow();
											                                  exit;
											                                  }
						if ($_POST['lcd_refresh'] <= 0 || $_POST['lcd_refresh'] > 60) {
											 echo "<font color=red><br>Refresh Rate MUST be between 1 and 60 !</font>";
											 				 refreshlcdshow();
											 				 exit;
															 				 }
						$lcd_refresh = 'lcd_refresh';
			        	        file_put_contents($lcd_refresh, $_POST['lcd_refresh']);

						                }
		 		?>

		<?php
		$lcdr=fopen("lcd_refresh","r");
                $show=fread($lcdr,filesize("lcd_refresh"));
                echo "Current LCD Refresh Rate: ".$show." Minutes";
		?>

		<hr style="color: #000; background-color: #000; height: 1px;"></hr>
	</tr>

	</tr>

	<tr>
	<td class="auto-style1" colspan="2"><center>
	<h3 class="auto-style4">Aquarium Safety Drain and Refill Limits</h3>
	<font color=red><b>WARNING PROCEED - WITH CAUTION!</b></font>
	<p>The aquarium refill and drain mechanism are based on floatation device, meaning that the drain and refill
	   will stop when the float is closed or open. since it is a mechanical device, it can fail, and a failiure
	   means that you can Harm your fish and/or flood the house. Hence you are encouraged to follow one water
	   exchange cycle and measure the time it takes to drain and refill accourding to you're fish tank size.
	   Please Set Maximum time of drainage and Maximum time of refill so they'll be a little bit bigger than you're
	   measures by 5% factor</p><br>
	   <b> In order to shut the safty mechanism, set both  to "0" - NOT RECOMAMNDED!!! </b><br>
	  <form method="post"><span class="auto-style13">Set MAXIMUM Refill Time (in sec):&nbsp;
          <input type="text" name="refill_limit" size="3" maxlength="3"><br>
			      <span class="auto-style13">Set MAXIMUM Drain Time (in sec):&nbsp;
          <input type="text" name="drain_limit" size="3" maxlength="3">

	<br><input type="submit" value="Set"></span><br>
	<?php
		function showrefreshlimits(){
                                 $refill_limit=fopen("refill_limit","r+");
                                 $drain_limit=fopen("drain_limit","r+");
                                 $show_refill_limit=fread($refill_limit,filesize("refill_limit"));
                                 $show_drain_limit=fread($drain_limit,filesize("drain_limit"));
					if ($show_drain_limit == "Safty is Shut!" || $show_refill_limit == "Safty is Shut!"){
					echo "<br>Safty is Shut!";
					}
					else {
                                 	echo"<br>";
                                 	echo "Current Safty Limits are (Refill/Drain): ".$show_refill_limit."/".$show_drain_limit." Seconds";
					}
                                 }

				 if (isset($_POST['refill_limit'],$_POST['drain_limit'])){


					 		 if ($_POST['refill_limit'] == "") {
								                                  echo "<font color=red><br>Refill and/or Drain limit  CANNOT be empty!</font>";
												                                   goto EOSA;
																                                    }
							 		 elseif ($_POST['drain_limit'] == ""){
										 				echo "<font color=red><br>Refill and/or Drain limit  CANNOT be empty!</font>";
														        	                goto EOSA;
																						}

							                  if (is_numeric($_POST['refill_limit']) == false) {
										                                   echo "<font color=red><br>Refill and/or Drain limit MUST be numeric!</font>";
														                                    goto EOSA;
																		                                     }
							 		elseif (is_numeric($_POST['drain_limit']) == false){
										                                 echo "<font color=red><br>Refill and/or Drain limit MUST be numeric!</font>";
														                                  goto EOSA;
														 				}

							 		if ($_POST['refill_limit'] == 0 && $_POST['drain_limit'] == 0){
														$refill_limit = 'refill_limit';
																		$drain_limit = 'drain_limit';
														                		file_put_contents($refill_limit, "Safty is Shut!");
																		                		file_put_contents($drain_limit, "Safty is Shut!");
																						echo "<font color=red><br>Safty has been set to shut! Please consider setting the safty limits!</font>";
																										showrefreshlimits();
																										exit;
																												}

							 		if ($_POST['refill_limit'] == 0 || $_POST['drain_limit'] == 0){
														echo "<font color=red><br>Refill or Drain cannot be set to 0, to shut the safty set both to 0, NOT RECOMMANDED!</font>";
																		goto EOSA;
																				}


							 		$refill_limit = 'refill_limit';
							                 file_put_contents($refill_limit, $_POST['refill_limit']);
							 		fclose($refill_limit);

							 		$drain_limit = 'drain_limit';
									                file_put_contents($drain_limit, $_POST['drain_limit']);
									                fclose($drain_limit);

					EOSA:							}
				 		showrefreshlimits();
				 	?>

	<hr style="color: #000; background-color: #000; height: 1px;"></hr>


	</tr>

	<tr>
 	<td class="auto-style1" colspan="2"><center>
	<h3 class="auto-style4">Aquarium Wifi Settings</h3>
	<p> You can Either connect the aquarium to an existing Wifi netwrok, meaning that you'll be able to
	    access your Aquarium from pontentially anywhere. this option is for advanced users, choose if you know
	    what you are doing. or  make the aquarium his own network, and connect to it from any wifi enabled
	    device nearby, this is recommanded and more secure. </p><br>
		<?php
			 exec('sudo /usr/bin/python /var/www/html/pys/wifi_status.py');
			 $ws=fopen("wifi_status","r");
 			 $wsr=fread($ws,filesize("wifi_status"));
			 echo "Connection Status: <br>";
			 echo $wsr;
			 echo "<br><br>";
			 fclose($ws);

		?>

	<button onclick="feedlog()">Connect to a Wifi Network</button>
                        <script>
                                function feedlog() {
                                window.open("wifi.php","_blank","width=800, height=1300","location=no");
				}
			</script>
	 <button name=apactive>Work as a AccessPoint</button>
			<?php
			 if(isset($_POST['apactive'])){
				unset($_POST['apactive']);
				echo "<font color=red><br><br> Changing Back to AccessPoint mode will Disconnect the Current Session:</font><br>";
				echo "<br>Are you Sure?&nbsp;<button name=apconyes>Yes</button>&nbsp;&nbsp;<button name=apconno>No</button>";
			 }

			 if(isset($_POST['apconyes'])){
				 unset($_POST['apactive']);
				 unset($_POST['apconyes']);
				 exec('sudo nmcli connection delete `nmcli connection show | grep wlan0 | cut -d" " -f1`');
				 exec('sudo pys/ap_active.sh');
				 sleep(3);

			}

			?>





	</tr>
	<!--
	<tr>
		<td style="height: 20px" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td style="height: 20px" colspan="2">&nbsp;</td>
	</tr>
	-->
</table>
</body>

</html>
