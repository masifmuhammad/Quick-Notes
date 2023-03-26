
<!doctype html>

<html lang="en">
<head>
  <title>Quick-Notes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script>
	window.addEventListener('DOMContentLoaded', (event) => {
	  const urlParams = new URLSearchParams(window.location.search);
	  const error = urlParams.get('error');
	  if (error) {
		alert(decodeURIComponent(error));
	  }
	});
  </script>

</head>
<body onload="displayErrorFromQueryString()">
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
			<div class="section pb-5 pt-5 pt-sm-2 text-center">
				<h6 class="mb-0 pb-3"><span>Log In</span><span>Sign Up</span></h6>
				<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
				<label for="reg-log"></label>
				<div class="card-3d-wrap mx-auto">
				  <div class="card-3d-wrapper">
					<div class="card-front">
					  <div class="center-wrap">
						<div class="section text-center">
						  <h4 class="mb-4 pb-3">Log In</h4>
						  <form method="post" action="index2.php">
							<div class="form-group">
							  <input type="text" name="username" class="form-style" placeholder="Username" />
							  <i class="input-icon uil uil-user"></i>
							</div>
							<div class="form-group mt-2">
							  <input type="password" name="password" class="form-style" placeholder="Password" />
							  <i class="input-icon uil uil-lock-alt"></i>
							</div>
							<button type="submit" class="btn mt-4">Log In</button>
						  </form>
						  <p class="mb-0 mt-4 text-center"><a href="resetpassword.html" class="link">Forgot your password?</a></p>
						</div>
					  </div>
					</div>
					<div class="card-back">
					  <div class="center-wrap">
						<div class="section text-center">
						  <h4 class="mb-3 pb-3">Sign Up</h4>
						  <form method="post" action="signup.php">
							<div class="form-group">
								<input type="text" name="UserName" class="form-style" placeholder="username" />

							  <i class="input-icon uil uil-user"></i>
							</div>
							<div class="form-group mt-2">
								<input type="tel" name="PhoneNumber" class="form-style" placeholder="Phone Number" />

							  <i class="input-icon uil uil-phone"></i>
							</div>
							<div class="form-group mt-2">
								<input type="email" name="Email" class="form-style" placeholder="Email" />

							  <i class="input-icon uil uil-at"></i>
							</div>
							<div class="form-group mt-2">
							  <input type="password" name="password" class="form-style" placeholder="Password" />
							  <i class="input-icon uil uil-lock-alt"></i>
							</div>
							<button type="submit" class="btn mt-4">Sign Up</button>
						  </form>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  