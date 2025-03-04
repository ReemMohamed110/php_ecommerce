<?php $tittle="register"; ?>

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Register now</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="index.php?page=logic_register" method="POST">
                                        <div class="single-acc-field">
                                            <label for="name">Name</label>
                                            <input type="text" name=name id="name" placeholder="Enter Your Name">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" placeholder="Enter your Email">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" placeholder="At least 8 Charecter">
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" name="not_robot" id="checkbox">
                                            <label for="checkbox">I'm not a robot</label>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Register now</button>
                                        </div>
                                        <a href="index.php?page=login">Already account? Login</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

   