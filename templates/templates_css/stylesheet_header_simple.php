/* nav bar simple */

<style>	/*NB: in php, it's better to use <style> rather than to link a .css file as it saves a http request */
nav {
	position: fixed;
	top: 0px;
	height: 60px;
	width: 100%;
	background-color: #000000;
	display: inline-block;
	overflow: visible;
	z-index: 200;
}

#nav_aelkyr_logo {
	position: fixed;
	left: 0px;
	margin-top: 7px;
	margin-left: 20px;
}

.nav_button_back {
	z-index: 10;
}

.nav_button_front {
	z-index: 20;
	position: absolute;
	top: 0px;
	left: 0; /* WRNG: necessary for firefox */
} 

#nav_aelkyr_logo:hover .nav_button_front { /*https://www.tutorialrepublic.com/faq/how-to-change-image-on-hover-with-css.php*/
	z-index: -99;
}

.nav_button:hover .nav_button_front { /*https://www.tutorialrepublic.com/faq/how-to-change-image-on-hover-with-css.php*/
	z-index: -99;
}
</style>
