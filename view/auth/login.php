<?php $tittle = "login";
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
                                <h2>Login now</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">

                                <form action="../admin.php?page=logic_login" method="POST">
                                    <?php if (Sessions::has("fail")) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?php Sessions::flash("fail"); ?>
                                        </div>
                                    <?php } ?>
                                    <!-- <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" placeholder="Enter your Email">
                                        <?php if (Sessions::has("email")) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("email");

                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div> -->
                                    
                                            <div class="single-acc-field">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" placeholder="Email" id="email">
                                                <?php if (Sessions::has("email") == 'true') { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <?php Sessions::flash("email"); 
                                                        ;
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        
                                    <div class="single-acc-field">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" placeholder="Enter your password">
                                        <?php if (Sessions::has("password")) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("password");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" id="checkbox">
                                        <label for="checkbox">Remember me</label>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Login Account</button>
                                    </div>
                                    <a href="forget-password.html">Forget Password?</a>
                                    <a href="register.html">Not Account Yet?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>