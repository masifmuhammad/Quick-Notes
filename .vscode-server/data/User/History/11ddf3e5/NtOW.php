<!DOCTYPE html>
<html>
    <style>*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;
}

body{
	height: 100vh;
	width: 100%;
}

.container{
	position: relative;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 20px 100px;
	flex-direction: column;
}

.container:after{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background : radial-gradient(
    rgb(87, 108, 117) 0%,
    rgb(37, 50, 55) 100.2%);
	background-size: cover;
	filter: blur(25px);
	z-index: -1;
}
.contact-box{
	max-width: 850px;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	justify-content: center;
	align-items: center;
	text-align: center;
	background-color: #fff;
	box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
}

.left{
	background: url("contact.jpg");
	background-size: cover;
	height: 100%;
}

.right{
	padding: 25px 40px;
}

h2{
	position: relative;
	padding: 0 0 10px;
	margin-bottom: 10px;
}

h2:after{
	content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    border-radius: 2px;
    background-color: rgb(255, 0, 0);
}

.field{
	width: 100%;
	border: 2px solid rgba(0, 0, 0, 0);
	outline: none;
	background-color: rgba(230, 230, 230, 0.6);
	padding: 0.5rem 1rem;
	font-size: 1.1rem;
	margin-bottom: 22px;
	transition: .3s;
}

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

textarea{
	min-height: 150px;
}

.btn1{
	width: 100%;
	padding: 0.5rem 1rem;
	background-color: rgb(255, 0, 0);
	color: #fff;
	font-size: 1.4rem;
	border: none;
	outline: none;
	cursor: pointer;
	transition: .3s;
}

.btn1:hover{
    background-color: rgba(255, 0, 0, 0.59);
}
/* .btn2{
	width: 300%;
	padding: 0.5 rem 1rem;
	background-color: rgb(255, 0, 0);
	color: #fff;
	position: auto ;
	font-size: 1.4rem;
	border: none;
	outline: none;
	cursor: pointer;
	transition: .3s;
}
.homebtn{
	max-width: 150%;
	padding: 1rem 1rem;
	display: block;
	position: auto ;
} */
.field:focus{
    border: 2px solid rgb(255, 0, 0);
    background-color: #fff;
}

@media screen and (max-width: 880px){
	.contact-box{
		grid-template-columns: 1fr;
	}
	.left{
		height: 200px;
	}
}</style>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
				<input type="text" class="field" placeholder="Your Name">
				<input type="text" class="field" placeholder="Your Email">
				<input type="text" class="field" placeholder="Phone">
				<textarea placeholder="Message" class="field"></textarea>
				<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <input type="checkbox" name="send" id="send" />
    <label for="send" class="send">
        <div class="rotate">
            <div class="move">
                <div class="part left"></div>
                <div class="part right"></div>
            </div>
        </div>
    </label>
</body>
			</div>
		</div>
		<!-- <div class = "homebtn"><button class="btn2"><a href="loginx.php" style="color: white; text-decoration: none;" > </a>HOME</button> </div> -->
	</div>
</body>
</html>