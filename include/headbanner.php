<!-- Card header -->
<div class="card text-right bg-primary mb-5 mb-md-2" id="header-card">
    <div class="card-body">
        <h4 class="card-title">Welcome to my webboard</h4>
        <p class="card-text">Only user can post and reply. If you want use those function just register and login
            first : ) </p>
    </div>
</div>
<header>
    <?php
    if (!empty($_SESSION['username'])) {


    ?>
        <nav class="navbar navbar-expand-lg bg-info">
            <span class="mr-lg-2"><b>Welcome</b></span>
            <a href="profile-page.php?id=<?= $_SESSION['user_id']; ?>" id="profilebut" class="mr-xl-2"><i class="fa fa-user-circle-o " aria-hidden="true"></i>
                <b>
                    <i><?= $_SESSION['username']; ?></i>
                </b>
            </a>

            <a href="logout.php" class="nav-link mr-xl-2" id="logoutbut">
                <b>
                    logout
                </b>
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Most View</a>
                            <a class="dropdown-item" href="#">Most Reply</a>
                        </div>
                    </li>
                </ul>


                <!-- <form class="form-inline my-2 my-lg-0">
                <span class="mr-sm-2"><b>Welcome</b></span>
                <a href="profile-page.php" id="profilebut" class="mr-sm-2"><i class="fa fa-user-circle-o "
                        aria-hidden="true"></i>
                    <b>
                        <i><?//=$_SESSION['username'];?></i>
                    </b>
                </a>

                <a href="logout.php" class="nav-link mr-sm-2" id="logoutbut">
                    <b>
                        logout
                    </b>
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
            </form> -->

            <?php

        } else {


            ?>
                <nav class="navbar navbar-expand-lg bg-info">
                    <a class="nav-link mr-xl-2">
                        <b>
                            RepriseBoard
                        </b>
                    </a>
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <!-- <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Sign up</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Most View</a>
                                    <a class="dropdown-item" href="#">Most Reply</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0" method="POST" action="signin.php" id="nav-login">
                            <label for="username" class="mr-sm-2">Sign in</label>
                            <input class="form-control mr-sm-2" type="text" id="username" name="username" placeholder="Username..." required>
                            <input class="form-control mr-sm-2" type="password" id="password" name="password" placeholder="Password..." required>
                            <button class="btn btn-success my-2 my-sm-0" data-type="success" action="submit" type="submit">sign
                                in</button>
                        </form>
                    <?Php
                }
                    ?>
                    </div>
                </nav>

</header>