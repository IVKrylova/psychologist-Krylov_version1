<?php include 'header.php'; ?>

<div class="wrapper-content" id="contacts">
	<!-- Контакты, форма обратной связи -->
	<div class="open-text-contact">
		<h2 class="zindex">Контакты</h2>
		<div class="adr">г. Нижний Новгород, ст.м. Горьковская, ул. Новая</div>
		<div class="project-contact-grid-2 zindex">
			<p class="pr-contact"><i class="fa fa-mobile" aria-hidden="true"></i> 8 (910) 103-15-99</p>
			<p class="pr-contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> basni_krylova@bk.ru</p>
		</div>
		<p class="pr-contact-header-form zindex">Также Вы можете отправить заявку или задать свои вопросы, используя форму:</p>
		<form name="form" method="post">
			<p>
				<label class="zindex">Как к Вам обращаться?<br></label>
				<input class="pole pole1" type="text" name="name" required placeholder="Ваше имя"> 
			</p>
			<p>
				<label class="zindex">Введите Ваш телефон:<br></label>
				<input class="pole pole2" type="text" id="phone" name="phone" required placeholder="Ваш телефон">
			</p>
			<p>
				<label class="zindex">Введите сообщение:<br></label>
				<textarea class="pole-text" type="text" name="message"  required placeholder="Введите сообщение"></textarea> 
			</p>
			<input type="hidden" name="bot" value="">
			<div class="g-recaptcha" data-sitekey="6LcbpFQUAAAAAIJ5ZJTqtvnOenviIemjAscLZElX"></div>
			<input class="submit button-form" type="submit" name="submit" value="Отправить">
		</form>
		<?php 

			include_once 'bd.php';

			/* reCAPTCHA */
			include 'recaptcha.php';
				if($arr['success']){

					if(isset($_POST['submit'])) {
						if (!empty($_POST['bot'])) {
							echo "Невозможно отправить сообщение";
						}
						elseif (empty($_POST['name'])) {
							echo "Введите Ваше имя";
						}
						elseif (empty($_POST['phone'])){
							echo "Введите Ваш телефон";
						}
						elseif (empty($_POST['message'])){
							echo "Введите сообщение";
						}
						else {
							$name = $_POST['name'];
							$phone = $_POST['phone'];
							$message = $_POST['message'];
							$address = "basni_krylova@bk.ru";
							$mes = "Имя: $name\nТелефон: $phone\nСообщение: $message";
							mail($address, "Сообщение с сайта!", $mes);
						}
					}
				}
			}
		?>
	</div>
	
</div>    

<?php include 'footer.php'; ?>