<?php $tittle = "register";
include_once "../helper/Sessions.php";
?>

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
                                <form action="../admin.php?page=logic_register" method="POST">
                                    <?php if (Sessions::has("fail") == 'true') { ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?php Sessions::flash("fail");
                                            Sessions::remove("fail"); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="single-acc-field">
                                        <label for="name">Name</label>
                                        <input type="text" name=name id="name" placeholder="Enter Your Name">
                                        <?php if (Sessions::has("name") == 'true') { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("name");
                                                Sessions::removeAll() ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" placeholder="Enter your Email">
                                        <?php if (Sessions::has("email") == 'true') { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("email");
                                                Sessions::remove("email");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="phone">phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="Enter your phone">
                                        <?php if (Sessions::has("phone") == 'true') { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("phone");
                                                Sessions::remove("phone");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="At least 8 Charecter">
                                        <?php if (Sessions::has("password") == 'true') { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("password");
                                                Sessions::remove("password");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="confirm_password">confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirmpassword" placeholder="At least 8 Charecter">
                                        <?php if (Sessions::has("confirm_password") == 'true') { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("confirm_password");
                                                Sessions::remove("confirm_password");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <p>gender : </p>
                                          <input type="radio" id="male" name="gender" value="male">
                                          <label for="male">male</label><br>
                                          <input type="radio" id="female" name="gender" value="female">
                                          <label for="female">female</label><br>
                                    </div>
                                    <?php if (Sessions::has("gender") == 'true') { ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?php Sessions::flash("gender");
                                            Sessions::remove("gender");
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <p>role : </p>
                                          <input type="radio" id="admin" name="role" value="admin">
                                          <label for="admin">admin</label><br>
                                          <input type="radio" id="user" name="role" value="user">
                                          <label for="user">user</label><br>
                                    </div>
                                    <?php if (Sessions::has("role") == 'true') { ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?php Sessions::flash("role");
                                            Sessions::remove("role");
                                            ?>
                                        </div>
                                    <?php } ?>

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