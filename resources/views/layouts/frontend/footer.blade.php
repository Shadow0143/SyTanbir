<footer class="main-footer">
    <div class="top-pattern-layer-dark"></div>

    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Column-->
                <div class="column col-xl-3 col-lg-12 col-md-12 col-sm-12">
                    <div class="footer-widget about-widget">
                        <div class="logo">
                            <h2 style="color:white;font-family: 'Yeseva One', cursive;"><b><em><span
                                            style="color: #ff0000;">S</span>y<span
                                            style="color:red">T</span>anbir</em></b></h2>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-xl-5 col-lg-8 col-md-12 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="widget-title">
                                        <h4>Services</h4>
                                    </div>
                                    <ul class="links">
                                        <li><a href="index.html" style="text-decoration: underline!important;">Home</a>
                                        </li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="models.html">Categories</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="widget-title">
                                        <h4>Contact</h4>
                                    </div>
                                    <ul class="info">
                                        <li class="address">Memari, Bardhaman, West Bengal 713146</li>
                                        <li class="phone"><a href="tel:(+91) 9474910681">(+91) 9474910681</a>
                                        </li>
                                        <li class="email"><a
                                                href="mailto:sytanbir1316@gmail.com">sytanbir1316@gmail.com</a>
                                        </li>
                                        <li class="social-links">
                                            <a href="https://www.facebook.com/BeingTanbirRamiz"><span
                                                    class="fab fa-facebook-f"></span></a>
                                            <a href="https://twitter.com/beingtanbir1310"><span
                                                    class="fab fa-twitter"></span></a>
                                            <a href="https://www.instagram.com/beingtanbirramiz/"><span
                                                    class="fab fa-instagram"></span></a>
                                            <a href="https://www.youtube.com/TanbirRamiz"><span
                                                    class="fab fa-youtube"></span></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget newsletter-widget">
                        <div class="widget-title">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="text">Subscribe to our Newsletter </div>
                        <!--Newsletter-->
                        <div class="newsletter-form">
                            <form method="post" action="{{route('submitLeads')}}">
                                @csrf
                                <div class="form-group clearfix">
                                    <input type="email" name="leademail" value="" placeholder="Email" required>
                                    <button type="submit" class="theme-btn btn-style-one"><span
                                            class="btn-title custom custom">Send Now</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="copyright">&copy; 2020 SyTanbir - All Right Reserved | Designed by Labbayk
                    Technologies Pvt ltd</div>
                <div class="bottom-links">
                    <a href="#">Terms of Service</a> &ensp;|&ensp; <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

</footer>