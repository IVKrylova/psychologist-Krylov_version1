<?php include 'header.php'; ?>

<div class="wrapper-content" id="timet">
	<!-- Расписание -->
	<div class="timetale">
		<h2>расписание</h2>

		<?php

			function my_calendar($fill = array()) { 
				$month_names = array("Январь","Февраль","Март","Апрель","Май","Июнь", "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
				if (isset($_GET['y'])) $y = $_GET['y'];
				if (isset($_GET['m'])) $m = $_GET['m']; 
				if ((isset($_GET['date'])) AND (strstr($_GET['date'],"-"))) list($y,$m) = explode("-",$_GET['date']);
				if ((!isset($y)) OR ($y < 2017) OR ($y > 2038)) $y = date("Y");
				if ((!isset($m)) OR ($m < 1) OR ($m > 12)) $m = date("m");

				$month_stamp = mktime(0,0,0,$m,1,$y);
				$day_count = date("t",$month_stamp);
				$weekday = date("w",$month_stamp);
				if ($weekday == 0) $weekday = 7;
				$start = -($weekday-2);
				$last = ($day_count+$weekday-1) % 7;
				if ($last == 0) $end = $day_count;
				else $end = $day_count+7-$last;
				$today = date("Y-m-d");
				$prev = date('?\m=m&\y=Y',mktime (0,0,0,$m-1,1,$y));
				$next = date('?\m=m&\y=Y',mktime (0,0,0,$m+1,1,$y));
				$i = 0;
		?>
		<p>Выберите день</p>
		<table class="timetale-table-month"> 
			<tr> 
				<td class="month-nav-left">
					<a href="<?php echo $prev ?>"><</a>
				</td> 
				<td class="month-nav-center">
					<?php echo $month_names[$m-1]," ",$y ?>
				</td> 
				<td class="month-nav-right">
					<a href="<?php echo $next ?>">></a>
				</td> 
			</tr> 
		</table> 
		<table class="timetale-table"> 
			<tr>
				<td class="timetale-box timetale-box-day">Пн</td>
				<td class="timetale-box timetale-box-day">Вт</td>
				<td class="timetale-box timetale-box-day">Ср</td>
				<td class="timetale-box timetale-box-day">Чт</td>
				<td class="timetale-box timetale-box-day">Пт</td>
				<td class="timetale-box timetale-box-day">Сб</td>
				<td class="timetale-box timetale-box-day">Вс</td>
			</tr> 
			
		<?php
			for($d=$start; $d<=$end; $d++) { 
				if (!($i++ % 7)) echo " <tr>\n";
				echo '  <td class="timetale-box"><form method="post">';
				if (($d < 1) OR ($d > $day_count)) {
					echo "&nbsp";
				} else {
					if((($d >= date(j)) && ($m == date(m))) || ($m == date(m)+1)) {
						echo '<button class="button-time" type="submit" name="number" value='.$d.'>'.$d;
					}
					else echo '<p class="timetale-box-number">'.$d.'</p>';
				} 
				echo "</form></button></td>\n";
				if (!($i % 7)) echo " </tr>\n";
			}
		
			echo "</table>"; 	

			if (isset($_POST['number'])) {

				$day = $_POST['number'];
				$month = $m;
				$time = array('9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00');

				include_once 'bd.php';
				$res3 = mysqli_query($mysqli, "SELECT * FROM `schedule`");
				while($row3 = mysqli_fetch_assoc($res3)) {
					if (($day==$row3['day']) && ($month==$row3['month'])) {
						$mass[]=$row3;
					}
				} 
			
				echo "<p>Выберите, пожалуйста, удобное для Вас время</p>";
				echo "<div class=\"timetale-table-time\">";
				
				for($j=0; $j<count($time); $j++) {
					for($i=0; $i<count($mass); $i++) {
						if($time[$j] != $mass[$i]['time']) {
							$arr[] = $time[$j];
						}
					}
				}

				$q=0;

				if (count($mass) > 1) {
					for ($i=0; $i < count($arr)-1; $i++) { 
						if ($arr[$i]==$arr[$i+1]) {
							$q++;
							if ($q==count($mass)-1) {
								$arr2[]=$arr[$i];
							}
						} else {
							$q=0;
						}
					}
					for ($i=0; $i < count($arr2); $i++) { 
						echo "<a id=\"go\" class=\"modalbox numb\" href=\"#windowsform\"><button class=\"but-time\" type=\"submit\" name=\"numbers\" value=".$i.">".$arr2[$i]."</button></a>";
						$t[$i] = $arr2[$i];
					}
				}

				if (count($mass) == 1) {
					for ($i=0; $i < count($arr); $i++) { 
						echo "<a id=\"go\" class=\"modalbox numb\" href=\"#windowsform\"><button class=\"but-time\" type=\"submit\" name=\"numbers\" value=".$i.">".$arr[$i]."</button></a>";
						$t[$i] = $arr[$i];
					}
				}

				if (count($mass)==0) {
					for ($i=0; $i < count($time); $i++) { 
						echo "<a id=\"go\" class=\"modalbox numb\" href=\"#windowsform\"><button class=\"but-time\" type=\"submit\" name=\"numbers\" value=".$i.">".$time[$i]."</button></a>";
						$t[$i] = $time[$i];
					}
				}

				if (count($mass) > 10) {
					echo "<p>Все время занято</p>";
				}
				echo "</div>";
			}
			
			$mass = json_encode($t);
			echo "<div class=\"hidden\" value=".$mass."></div>";

			echo "<div id=\"windowsform\">
				<span id=\"modalclose\">X</span>
				<form method=\"post\">
					<p>
						<label>Как к Вам обращаться?<br></label>
						<input class=\"pole\" type=\"text\" name=\"name\" required placeholder=\"Ваше имя\"> 
					</p>
					<p>
						<label>Введите Ваш телефон:<br></label>
						<input class=\"pole\" type=\"text\" id=\"phone\" name=\"phone\" required placeholder=\"Ваш телефон\">
					</p>
						<input type=\"hidden\" name=\"day\" value=".$day.">
						<input type=\"hidden\" name=\"month\" value=".$month.">
						<input type=\"hidden\" class=\"num\" name=\"t\" value=\"\">
					<input class=\"submit button-form session-button\" type=\"submit\" name=\"button\" id=\"send\" value=\"Записаться\">
				</form>	
			</div>";

			if(isset($_POST['button'])) {
				if (empty($_POST['name'])) {
					echo "Введите Ваше имя";
				}
				elseif (empty($_POST['phone'])){
					echo "Введите Ваш телефон";
				}
				else {
					$name = $_POST['name'];
					$phone = $_POST['phone'];
					$a = $_POST['day'];
					$b = $_POST['month'];
					$c = $_POST['t'];
					$address = "basni_krylova@bk.ru";
					$mes = "Имя: $name\nТелефон: $phone\nДень: $a\nМесяц: $b\nВремя: $c\n";
					mail($address, "Сессия!", $mes);
					include_once 'bd.php';
					$res4 = mysqli_query($mysqli, "INSERT INTO `schedule`(`day`, `time`, `month`) VALUES ('$a', '$c', '$b')");
				}
			}
		}

		my_calendar(array(date("Y-m-d"))); 
	?>
	</div>

	<div id="overlay"></div>
</div>

<?php include 'footer.php'; ?>