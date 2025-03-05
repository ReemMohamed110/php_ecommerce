<?php $tittle = "contact";

include_once "../helper/Sessions.php";
?>
<section class="account">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="account-contents" style="background: url('assets/img/about/about2.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="account-thumb">
                                <h2>Contact us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <div class="account-content">
                                <form action="../admin.php?page=logic_contact" method="POST">
                                <?php if (Sessions::has("success") == 'true') { ?>
                                                    <div class="alert alert-success alert-dismissible fade show">
                                                        <?php Sessions::flash("success"); 
                                                        Sessions::remove("success");?>
                                                    </div>
                                                <?php } ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <?php
                                                // $validator->has()
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" placeholder="Name" id="name">
                                                <?php if (Sessions::has("name") == 'true') { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <?php Sessions::flash("name");
                                                        Sessions::removeAll() ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" placeholder="Email" id="email">
                                                <?php if (Sessions::has("email") == 'true') { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <?php Sessions::flash("email"); 
                                                        Sessions::remove("email");
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-acc-field">
                                                <label for="msg">Message</label>
                                                <textarea name="msg" id="msg" rows="4"></textarea>
                                                <?php if (Sessions::has("message") == 'true') { ?>
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <?php Sessions::flash("message"); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" name="remember_me" id="checkbox">
                                        <label for="checkbox">Remember me</label>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>