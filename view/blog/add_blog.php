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
                                    <?php if (Sessions::has("fail") == "true") { ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <?php Sessions::flash("fail"); ?>
                                        </div>
                                    <?php } ?>
                                  
                                    <div class="single-acc-field">
                                        <label for="text"></label>
                                        <input type="text" name="title" placeholder="Enter your title">
                                        <?php if (Sessions::has("title") == "true") { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("title");
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="text"></label>
                                        <input type="text" name="content" placeholder="Enter your blog">
                                        <?php if (Sessions::has("content") == "true") { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("content");?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="text"></label>
                                        <input type="file" name="image" placeholder="Enter your blog">
                                        <?php if (Sessions::has("image") == "true") { ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php Sessions::flash("image");?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    
                                    <div class="single-acc-field">
                                        <button type="submit">Add Blog</button>
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