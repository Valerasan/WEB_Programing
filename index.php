<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Лабораторна робота №1</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="addons/slick-slider/slick.css">
	<link rel="stylesheet" type="text/css" href="addons/slick-slider/slick-theme.css">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type="text/javascript" src="addons/slick-slider/slick.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>



	<section class="head">
		<div class="container">
			<div class="head-content">
				<div class="logo">
					<img src="images/logo.svg" alt="logo-site" class="logo logo-header">
				</div>
				<div class="nav">
					<ul class="nav-list">
						<li class="item-nav">
							<a href="#booking" class="link-nav">
								Забронювати
							</a>
						</li>
						<li class="item-nav">
							<a href="#house" class="link-nav">
								Будинки
							</a>
						</li>
						<li class="item-nav">
							<a href="#about" class="link-nav">
								Про нас
							</a>
						</li>
						<li class="item-nav">
							<a href="#review" class="link-nav">
								Відгуки
							</a>
						</li>
						<li class="item-nav">
							<a href="#contact" class="link-nav">
								Контакти
							</a>
						</li>
					</ul>
				</div>
				<div class="head-phone">
					<a href="tel:+38 (000) 000-00-00" class="link-phone">+38 (000) 000-00-00</a>
				</div>
			</div>
			<div class="head-content-mobile">
				<div class="row">
					<div class="column">
						<div class="justify">
							<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
						</div>
					</div>
					<div class="column">
						<div class="logo">
							<img  src="images/logo.svg" alt="logo-site" class="logo logo-header">
						</div>
					</div>

				</div>

				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<a onclick="closeNav()" href="#booking" class="link-nav">Забронювати</a>
					<a onclick="closeNav()" href="#house" class="link-nav">Будинки</a>
					<a onclick="closeNav()" href="#about" class="link-nav">Про нас</a>
					<a onclick="closeNav()" href="#review" class="link-nav">Відгуки</a>
					<a onclick="closeNav()" href="#contact" class="link-nav">Контакти</a>
				</div>
			</div>
		</div>
	</section>
	<section class="main-slide">
		<div class="slider-wrap">
			<div class="sliders one-time">
				<div class="slide">
					<img src="images/desktop_slide_1.jpg" class="slide-desktop">
				</div>
				<div class="slide">
					<img src="images/desktop_slide_2.jpg" class="slide-desktop">
				</div>
			</div>
		</div>
	</section>
	<section id="boking" class="form-booking">
		<div class="container">
			<div class="block-form">
                <form class="form-data" method="post"  action="confirmationPage.php">
                    <div class="main-selest-data">
                        <div class="input-field">
                            <label for="date-start">Дата заїзду</label>
                        <input type="date" id="date-start" name="date-start" class="input-date" required>
                        </div>
                        <div class="input-field">
                            <label for="date-end">Дата виїзду</label>
                            <input type="date" id="date-end" name="date-end" class="input-date" required>
                        </div>
                        <div class="input-field">
                            <label for="room-select">Кількість кімнат:</label>
                            <select id="room-select" name="room-select">
                                <option value="1" data-price="0">1 кімната</option>
                                <option value="2" data-price="1000">2 кімнати</option>
                                <option value="3" data-price="1200">3 кімнати</option>
                                <option value="4" data-price="1500">4 кімнати</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="person-select">Кількість дорослих:</label>
                            <select id="person-select" name="person-select">
                                <option value="1">1 дорослий</option>
                                <option value="2">2 дорослих</option>
                                <option value="3">3 дорослих</option>
                                <option value="4">4 дорослих</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="person-select">Кількість дітей:</label>
                            <select title="Children" id="child-select" name="children">
                                    <option value="0">Без дітей</option>
                                    <option value="1">1 дитина</option>
                                    <option value="2">2 дітей</option>
                                    <option value="3">3 дітей</option>
                                    <option value="4">4 дітей</option>
                            </select>
                        </div>
                    </div>
                        <div class="additional-options">
                            <label for="additional-options">Додаткові опції:</label>
                            <input type="checkbox" id="additional-options">
                            <div class="additional-options-content">
                                <div class="check-option">
                                    <label for="option-1">Сніданок</label>
                                    <input type="checkbox" id="option-1" name="breakfast" value="Сніданок">
                                    <div id="breakfast-price">Вартість сніданків: 0 грн</div>
                                </div>
                                <div class="check-option">
                                    <label for="option-2">Підвезення з вокзалу</label>
                                    <input type="checkbox" id="option-2" name="taxi-to-train" value="Підвезення з вокзалу">
                                </div>
                            </div>
                        </div>
                        <div id="price">Вартість: 0 грн</div>
                        <div class="approw-btn">
                            <input type="button" id="approw-btn" class="btn" value="Замовити">
                        </div>
                        <div id="additional-fields" class="additional-fields" style="display: none;">
                            <div class="fields">
                            <div class="input-field">
                                <label for="surname">Прізвище:*</label>
                                <input type="text" id="surname" name="surname" required><br>
                            </div>
                            <div class="input-field">
                                <label for="name">Ім'я:*</label>
                                <input type="text" id="name" name="name" required><br>
                            </div>
                            <div class="input-field">
                                <label for="patronymic">По-батькові:*</label>
                                <input type="text" id="patronymic"  name="secondName" required><br>
                            </div>
                            <div class="input-field">
                                <label for="phone">Номер телефону:*</label>
                                <input type="text" id="phone" name="telephone" required><br>
                            </div>
                            <div class="input-field">
                                <label for="email">Email:*</label>
                                <input type="email" id="email" name="email" required><br>
                            </div>
                        </div>
                            <div class="approw-btn">
<!--                            <input type="button" id="send"  name="Send" class="btn" value="Відправити">-->
<!--                            <input type="submit" id="send"  name="Send" class="btn" value="Відравити">-->
                            <input type="submit" class="btn" name="submit" value="Відравити">
                        </div>
                        </div>
                </form>
			</div>
		</div>
	</section>
	<section id="house" class="list-house">
		<div class="container">
			<div class="name-block">
				<h1>Будинки під замовлення</h1>
			</div>
			<!-- <div class="slider-wrap">
				<div class="sliders center">	
				</div>
			</div> -->
			<div class="slider centered" >
				<div class="slide" id="slide-1">
					<div class="item">
						<div class="img-house">
							<img src="images/home_1.jpg">
						</div>
						<div class="name-house">
							<span>Будинок для 2-х</span>
						</div>
						<div class="house-param">
							<div class="person">
								<img src="images/person.svg" class="icon-img">
								<span>2 дорослих</span>
							</div>
							<div class="room">
								<img src="images/room.svg" class="icon-img">
								<span>1 кімната</span>
							</div>
							<div class="other">
								<div class="other-house-block">
									<img src="images/wifi.svg">
									<span>Вільний інтернет</span>
								</div>
								<div class="other-house-block">
									<img src="images/snow.svg" class="icon-img">
									<span>Кондиціонер</span>
								</div>
							</div>
						</div>
						<div class="price-house">
							<span>1000 грн/доба</span>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-2">
					<div class="item">
						<div class="img-house">
							<img src="images/home_1.jpg">
						</div>
						<div class="name-house">
							<span>Будинок для 2-х</span>
						</div>
						<div class="house-param">
							<div class="person">
								<img src="images/person.svg" class="icon-img">
								<span>2 дорослих</span>
							</div>
							<div class="room">
								<img src="images/room.svg" class="icon-img">
								<span>1 кімната</span>
							</div>
							<div class="other">
								<div class="other-house-block">
									<img src="images/wifi.svg">
									<span>Вільний інтернет</span>
								</div>
								<div class="other-house-block">
									<img src="images/snow.svg" class="icon-img">
									<span>Кондиціонер</span>
								</div>
							</div>
						</div>
						<div class="price-house">
							<span>1000 грн/доба</span>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-3">
					<div class="item">
						<div class="img-house">
							<img src="images/home_2.jpg">
						</div>
						<div class="name-house">
							<span>Будинок для сім'ї</span>
						</div>
						<div class="house-param">
							<div class="person">
								<img src="images/person.svg" class="icon-img">
								<span>2 дорослих + 2 дитини</span>
							</div>
							<div class="room">
								<img src="images/room.svg" class="icon-img">
								<span>1 кімната</span>
							</div>
							<div class="other">
								<div class="other-house-block">
									<img src="images/wifi.svg">
									<span>Вільний інтернет</span>
								</div>
								<div class="other-house-block">
									<img src="images/snow.svg" class="icon-img">
									<span>Кондиціонер</span>
								</div>
							</div>
						</div>
						<div class="price-house">
							<span>1000 грн/доба</span>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-4">
					<div class="item">
						<div class="img-house">
							<img src="images/home_3.jpg">
						</div>
						<div class="name-house">
							<span>Будинок для компанії</span>
						</div>
						<div class="house-param">
							<div class="person">
								<img src="images/person.svg" class="icon-img">
								<span>6 дорослих</span>
							</div>
							<div class="room">
								<img src="images/room.svg" class="icon-img">
								<span>3 кімната</span>
							</div>
							<div class="other">
								<div class="other-house-block">
									<img src="images/wifi.svg">
									<span>Вільний інтернет</span>
								</div>
								<div class="other-house-block">
									<img src="images/snow.svg" class="icon-img">
									<span>Кондиціонер</span>
								</div>
							</div>
						</div>
						<div class="price-house">
							<span>1200 грн/доба</span>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-5">
					<div class="item">
						<div class="img-house">
							<img src="images/home_1.jpg">
						</div>
						<div class="name-house">
							<span>Будинок для компанії №2</span>
						</div>
						<div class="house-param">
							<div class="person">
								<img src="images/person.svg" class="icon-img">
								<span>8 дорослих</span>
							</div>
							<div class="room">
								<img src="images/room.svg" class="icon-img">
								<span>4 кімнатиі</span>
							</div>
							<div class="other">
								<div class="other-house-block">
									<img src="images/wifi.svg">
									<span>Вільний інтернет</span>
								</div>
								<div class="other-house-block">
									<img src="images/snow.svg" class="icon-img">
									<span>Кондиціонер</span>
								</div>
							</div>
						</div>
						<div class="price-house">
							<span>1500 грн/доба</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="about" class="about-us">
		<div class="container">
			<div class="name-block">
				<h2>Про нас</h2>
			</div>
			<div class="text">
				"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.""On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
			</div>
		</div>
	</section>
	<section id="review" class="reviews-main">
		<div class="container">
			<div class="name-block">
				<h2>Відгуки</h2>
			</div>
			<div class="slider-wrap">
				<div class="sliders center">
					<div class="review-item">
						<div class="heade-review-item">
							<div class="author-review">
								<img src="images/user.svg" class="icon-img">
								<span>Андрій</span>
							</div>
							<div class="date-review">
								<span>15.09.2023</span>
							</div>
						</div>
						<div class="text-review">
							"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
						</div>	
					</div>
					<div class="review-item">
						<div class="heade-review-item">
							<div class="author-review">
								<img src="images/user.svg" class="icon-img">
								<span>Сергій</span>
							</div>
							<div class="date-review">
								<span>20.09.2023</span>
							</div>
						</div>
						<div class="text-review">
							"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
						</div>	
					</div>
					<div class="review-item">
						<div class="heade-review-item">
							<div class="author-review">
								<img src="images/user.svg" class="icon-img">
								<span>Марія</span>
							</div>
							<div class="date-review">
								<span>30.09.2023</span>
							</div>
						</div>
						<div class="text-review">
							"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
						</div>	
					</div>
					<div class="review-item">
						<div class="heade-review-item">
							<div class="author-review">
								<img src="images/user.svg" class="icon-img">
								<span>Руслан</span>
							</div>
							<div class="date-review">
								<span>05.10.2023</span>
							</div>
						</div>
						<div class="text-review">
							"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
						</div>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="contact" class="contact-main">
		<div class="container">
			<div class="name-block">
				<h2>Контакти</h2>
			</div>
			<div class="for-two-part">
				<div class="second-block">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d87312.73210452773!2d7.7525693746406725!3d46.85308164863182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swooden!5e0!3m2!1sru!2sua!4v1696863889449!5m2!1sru!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="first-bloc">
					<div class="logo-contact">
						<img src="images/logo.svg" alt="logo-site" class="logo logo-header">
					</div>
					<div class="adress">
						Dorfstrasse 77, 6196 Marbach, Швейцарія
					</div>
					<div class="phone">
						<a href="tel:+38 (000) 000-00-00" class="link-phone">+38 (000) 000-00-00</a>
					</div>
					<div class="social-block">
						<div class="facebook-link">
							<a href="#">
								<img src="images/facebook.svg" class="icon-social">
							</a>
						</div>
						<div class="instagram-link">
							<a href="#">
								<img src="images/instagram.svg" class="icon-social">
							</a>
						</div>
						<div class="telegram-link">
							<a href="#">
								<img src="images/telegram.svg" class="icon-social">
							</a>
						</div>
						<div class="youtube-link">
							<a href="#">
								<img src="images/youtube.svg" class="icon-social">
							</a>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</section>
	<div id="myModal" class="modal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Информация о бронировании</h2>
                <div id="data-form"></div>
                <!-- Здесь будет отображаться информация из формы -->

            </div>
        </div>
	<footer class="footer">
		<div class="container">
			
		</div>
	</footer>

</body>
</html>