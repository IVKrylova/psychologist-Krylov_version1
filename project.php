<?php include 'header.php'; ?>

<div class="wrapper-content" id="proj">
	<!-- Название, описание -->
	<div class="project-block zindex project-description">
		<h2>Высвобождение и реализация собственных возможностей</h2>
		<div class="project-description-grid-2 animated boxHidded">
			<div class="project-descr-block1">
				<p class="title-line-right">Главная особенность проекта - глубинная и системная проработка личности человека и стратегий его мышления в рамках проблемно-символического подхода</p>
			</div>
			<div class="project-descr-blockNull"></div>
			<div class="project-descr-block2">
				<p class="title-line-left">Цель проекта - создать условия для наличия у человека возможности управлять своей жизнью через управление собственным мышлением</p>
			</div>
			<div class="project-descr-block3">
				<p class="title-line-right-bottom">Осуществляемая в рамках проекта работа со стратегиями мышления носит универсальный характер – подходит для решения самого широкого спектра проблем от налаживания отношений с окружающими до саморазвития и поиска собственных смыслов</p>
			</div>
		</div>
	</div>

	<!-- Возможности -->
	<div class="project-block zindex project-audience">
		<h2>О Возможностях</h2>
		<div class="project-audience-grid-2 animated boxHidded">
			<p>Вся жизнь человека состоит из возможностей. Сама жизнь - это возможность. Принимая выбор, человек отказывается от одной возможности и направляет свою жизнь на реализацию другой. К сожалению, люди достаточно часто либо не задумываются над своими возможностями, либо ошибаются при выборе. Итог двух вариантов один - разочарование и неудовлетворенность. Понять и прочувствовать, какая возможность представляет наибольшую ценность, позволяет встреча с проблемной ситуацией. При наличии проблемы можно увидеть, как осуществляется выбор и насколько свободно и самостоятельно человек может делать этот выбор. Человек проявляется в проблеме. Только свободный осознанный выбор позволяет реализовывать свои истинные возможности и придаёт жизни радость.</p>
			<img src="img/project.png" alt="Только осознанный выбор придает жизни радость!">
		</div>
		
	</div>

	<!-- Методы психоанализа -->
	<div class="project-block zindex project-methods">
		<h2>О методе</h2>
		<div class="project-methods-grid-3 animated boxHidded">
			<p class="project-methods-block1">Работа проводится в рамках проблемно-символического подхода</p>
			<p class="project-methods-block2">Проблемно-символический подход нацелен на последовательное формирование и развитие рефлексивного анализа и понимающего мышления через поиск и осознание наиболее значимой для каждого отдельного человека проблемы – подлинной проблемы</p> 
			<p class="project-methods-block3">В фокусе внимания проблемно-символического подхода всегда удерживаются такие сущностные вопросы бытия, как Кто Я? Чего Я Хочу? Как это сделать? Ради чего? Кто Автор моей жизни?</p>
		</div>
	</div>

	<!-- Условия участия -->
	<div class="project-block zindex project-conditions">
		<h2>Условия участия</h2>
		<div class="project-condition animated boxHidded">
			<p class="circle">Принять участие в проекте может любой желающий!</p>
			<p class="circle">Основное условие участия – готовность к длительной аналитической проработке своей жизни – не менее 50 сессий</p>
			<p class="circle"><span>Цена участия обсуждается в индивидуальном порядке</span></p>
		</div>
	</div>
	
	<!-- Контакты, форма обратной связи -->
	<div class="project-block project-contact">
		<h2 class="zindex">Контакты</h2>
		<div class="project-contacts">
			<div class="project-contact-grid-2 zindex">
				<p class="pr-contact zindex"><i class="fa fa-mobile" aria-hidden="true"></i> 8 (910) 103-15-99</p>
				<p class="pr-contact zindex"><i class="fa fa-envelope-o" aria-hidden="true"></i> basni_krylova@bk.ru</p>
			</div>
			<p class="pr-contact-header-form zindex">Также Вы можете отправить заявку или задать свои вопросы, используя форму:</p>
			<form name="form" method="post">
				<p>
					<label class="zindex">Как к Вам обращаться?<br></label>
					<input class="pole pole3" type="text" name="name" required placeholder="Ваше имя"> 
				</p>
				<p>
					<label class="zindex">Введите Ваш телефон:<br></label>
					<input class="pole pole4" type="text" id="phone" name="phone" required placeholder="Ваш телефон">
				</p>
				<p>
					<label class="zindex">Введите сообщение:<br></label>
					<textarea class="pole-text" type="text" name="message"  required placeholder="Введите сообщение"></textarea> 
				</p>
				<div class="g-recaptcha" data-sitekey="6LcbpFQUAAAAAIJ5ZJTqtvnOenviIemjAscLZElX"></div>
				<input class="submit button-form" type="submit" name="submit" value="Отправить">
			</form>
			<?php 

				include_once 'bd.php';

				/* reCAPTCHA */
				include 'recaptcha.php';
					if($arr['success']){

						if(isset($_POST['submit'])) {
							if (empty($_POST['name'])) {
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
								mail($address, "Проект!", $mes);
							}
						}
					}
				}
			?>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>




 









