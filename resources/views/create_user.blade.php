<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/assetsLogin/css/style.css">

        <link  href=""stylesheet" >

	</head>
	<body style="background-color:#FFFFFF ">
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Create an account</h3>
                  <p style="text-align: center"> Start Your journey!</p>
						<form action="#" class="login-form">
		      		<div class="form-group">
                        <label for="username" class="form-label">Name</label>
		      			<input type="text" class="form-control rounded-left" placeholder="Enter Your Name" required>
		      		</div>
	            <div class="form-group">
                    <label for="text" class="form-label">Email</label>
	              <input type="password" class="form-control rounded-left" placeholder="Enter Your Email" required>
	            </div>


                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input style="height: 38px;" type="password"  class="form-control" name="user_pass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                      {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                    </div>
                  </div>

                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input style="height: 38px;" type="password"  class="form-control" name="confirm_pass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                      {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                    </div>
                  </div>

                  <button style="height: 38px;
                  border-radius: 4px; background-color:#4DD4AC" class="btn btn- d-grid w-100" >
                   <i class="fa-solid fa-g"></i> Get Started
                  </button>
                </br>
            </br>
                  <button  style="height: 38px;
                  border-radius: 4px;background-color:#ffffff;border: 1px solid #0D6EFD; color:#0d41fd;" class="btn btn- d-grid w-100">
                        Sign up with Google
                  </button>
                   <p class="text-center">
            <span>Already have an account?</span>
            <a href="auth-login-basic.html">
              <span style="color: #0d41fd">Sign in instead</span>
            </a>
          </p>


	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

