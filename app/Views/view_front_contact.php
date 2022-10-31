<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zafa Tour Padang</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/css/style.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
</head>

<body>
    <header class="foi-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('paket') ?>">Paket</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('booking') ?>">Pesanan</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <?php if (session()->get('pesertaId')) { ?>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item mr-2 mb-3 mb-lg-0">
                                <a class="btn btn-secondary" href="<?= base_url('register') ?>">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('login') ?>">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="page-header">
                <h2>Tell us about yourself</h2>
                <h5>Whether you have questions or you would just like to say hello, contact us.</h5>
            </section>
            <section class="contact-content">
                <div class="contact-widget media">
                    <img src="<?= base_url() ?>/assets-front/images/icon-4.png" alt="monitor" width="50px">
                    <div class="media-body">
                        <h6 class="widget-title">Production Office</h6>
                        <p class="widget-content">service@zafatour.com</p>
                    </div>
                </div>
                <div class="contact-widget media">
                    <img src="<?= base_url() ?>/assets-front/images/icon-5.png" alt="book" width="40px">
                    <div class="media-body">
                        <h6 class="widget-title">Administration Office</h6>
                        <p class="widget-content">service@zafatour.com</p>
                    </div>
                </div>
            </section>
            <section class="contact-form-wrapper">
                <form action="<?= base_url('contact/save') ?>" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">YOUR NAME <sup>*</sup></label>
                            <input type="text" required class="form-control" id="name" name="name" placeholder="Name *">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">YOUR EMAIL ADDRESS <sup>*</sup></label>
                            <input type="email" required class="form-control" id="email" name="email" placeholder="jhon@gmail.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subject">SUBJECT <sup>*</sup></label>
                            <input type="text" required class="form-control" id="subject" name="subject" placeholder="Development">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">YOUR PHONE NUMBER <sup>*</sup></label>
                            <input type="text" required class="form-control" id="phone" name="phone" placeholder="0821-7153-8531">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="message">HOW CAN WE HELP YOU? <sup>*</sup></label>
                            <textarea name="message" required id="message" class="form-control" rows="7" placeholder="Hi there, I would like to ..."></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-4">Submit</button>
                        <p class="form-footer-text">We'll get back to you in 1-2 business days.</p>
                    </div>
                </form>
            </section>
        </div>
    </main>


    <footer class="foi-footer text-white">
        <div class="container">
            <div class="row footer-content">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <a href="<?= base_url('contact') ?>" class="btn btn-secondary btn-lg">Contact form</a>
                </div>
            </div>
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3">
                        <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                    </div>
                    <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                    <div>
                        <button class="btn btn-app-download mr-2"><img src="<?= base_url() ?>/assets-front/images/ios.svg" alt="App store"></button>
                        <button class="btn btn-app-download"><img src="<?= base_url() ?>/assets-front/images/android.svg" alt="play store"></button>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My tasks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Activity</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Careers <span class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Shop with us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; Zafa Tour. 2022 <a href="https://www.zafatourpadang.com" target="_blank" rel="noopener noreferrer" class="text-reset">Zafa Tour</a>.
                    </p>
                    <p>All rights reserved.</p>
                    <nav class="social-menu">
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/facebook.svg" alt="facebook"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/instagram.svg" alt="instagram"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/twitter.svg" alt="twitter"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/youtube.svg" alt="youtube"></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>