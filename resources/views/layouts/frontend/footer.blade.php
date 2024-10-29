<script>
    //====================== lazy load code here
    $(function() {
        $("img.lazy").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

<footer class="footer footer-white background-body">
    <div class="container-fluid">
        <div class="container-footer">
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <div class="mt-20 mb-20"><a class="d-inline-block mb-20" href="index.html"><img class="dark-mode"
                                alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"><img class="light-mode"
                                alt="Travila" src="{{ asset('assets/imgs/template/logo.png') }}"></a>
                        <div class="box-info-contact mt-0">
                            <p class="text-md neutral-1000">Dive into local recommendations for a truly authentic
                                experience.</p>
                        </div>
                        <div class="box-need-help">
                            <p class="need-help text-md-medium mb-5 neutral-1000">Need help? Call us</p><br><a
                                class="heading-6 phone-support" href="tel:1-800-222-8888">1-800-222-8888</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <h6 class="neutral-1000">Company</h6>
                            <ul class="menu-footer">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Community Blog</a></li>
                                <li><a href="#">Jobs & Careers</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Our Awards</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h6 class="neutral-1000">Services</h6>
                            <ul class="menu-footer">
                                <li><a href="#">Tour Guide</a></li>
                                <li><a href="#">Tour Booking</a></li>
                                <li><a href="#">Hotel Booking</a></li>
                                <li><a href="#">Ticket Booking</a></li>
                                <li><a href="#">Rental Services</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h6 class="neutral-1000">Legal</h6>
                            <ul class="menu-footer">
                                <li><a href="{{ route('terms.service') }}">Terms of Service</a></li>
                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('payment.policy') }}">Payment Policy</a></li>
                                {{-- <li><a href="#">Data Processing</a></li>
                                <li><a href="#">Data Policy</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h6 class="neutral-1000">Support</h6>
                            <ul class="menu-footer">
                                <li><a href="#">Forum support</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Security</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="text-lg neutral-1000 mb-15">Newsletter</p>
                    <div class="d-flex align-items-center">
                        <form id="newsletterForm" class="form-newsletter form-newsletter-2" action="#">
                            <input class="form-control" id="emailInput" type="email" placeholder="Enter your email">
                            <input class="btn btn-brand-secondary" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('newsletterForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Get the email input value
                    const emailInput = document.getElementById('emailInput');
                    const email = emailInput.value;

                    // Basic email validation regex
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    // Validate email format
                    if (!emailPattern.test(email)) {
                        alert('Please enter a valid email address.');
                        emailInput.focus();
                        return;
                    }

                    axios.post(`{{ route('subscriptions.store') }}`, {
                            email: email
                        })
                        .then(function(response) {

                            $('#subscribeSuccessModal').modal('show');

                            setTimeout(function() {
                                $('#subscribeSuccessModal').modal('hide');
                            }, 4000);

                            document.getElementById('newsletterForm').reset();
                        })
                        .catch(function(error) {
                            console.error('There was an error!', error);
                        });
                });
            </script>

            <div class="footer-bottom mt-50">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center mb-20">
                        <p class="text-sm neutral-1000">© 2024 Travila Inc. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end text-center mb-20">
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-md-end box-socials-footer-cover">
                            <p class="text-lg-bold neutral-1000 d-inline-block mr-10">Follow us</p>
                            <div class="box-socials-footer d-inline-block"><a class="icon-socials icon-instagram"
                                    href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.4915 1.6665H6.50817C3.47484 1.6665 1.6665 3.47484 1.6665 6.50817V13.4832C1.6665 16.5248 3.47484 18.3332 6.50817 18.3332H13.4832C16.5165 18.3332 18.3248 16.5248 18.3248 13.4915V6.50817C18.3332 3.47484 16.5248 1.6665 13.4915 1.6665ZM9.99984 13.2332C8.2165 13.2332 6.7665 11.7832 6.7665 9.99984C6.7665 8.2165 8.2165 6.7665 9.99984 6.7665C11.7832 6.7665 13.2332 8.2165 13.2332 9.99984C13.2332 11.7832 11.7832 13.2332 9.99984 13.2332ZM14.9332 5.73317C14.8915 5.83317 14.8332 5.92484 14.7582 6.00817C14.6748 6.08317 14.5832 6.1415 14.4832 6.18317C14.3832 6.22484 14.2748 6.24984 14.1665 6.24984C13.9415 6.24984 13.7332 6.1665 13.5748 6.00817C13.4998 5.92484 13.4415 5.83317 13.3998 5.73317C13.3582 5.63317 13.3332 5.52484 13.3332 5.4165C13.3332 5.30817 13.3582 5.19984 13.3998 5.09984C13.4415 4.9915 13.4998 4.90817 13.5748 4.82484C13.7665 4.63317 14.0582 4.5415 14.3248 4.59984C14.3832 4.60817 14.4332 4.62484 14.4832 4.64984C14.5332 4.6665 14.5832 4.6915 14.6332 4.72484C14.6748 4.74984 14.7165 4.7915 14.7582 4.82484C14.8332 4.90817 14.8915 4.9915 14.9332 5.09984C14.9748 5.19984 14.9998 5.30817 14.9998 5.4165C14.9998 5.52484 14.9748 5.63317 14.9332 5.73317Z"
                                            fill=""></path>
                                    </svg></a><a class="icon-socials icon-facebook" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.3334 13.4915C18.3334 16.5248 16.5251 18.3332 13.4917 18.3332H12.5001C12.0417 18.3332 11.6667 17.9582 11.6667 17.4998V12.6915C11.6667 12.4665 11.8501 12.2748 12.0751 12.2748L13.5417 12.2498C13.6584 12.2415 13.7584 12.1582 13.7834 12.0415L14.0751 10.4498C14.1001 10.2998 13.9834 10.1582 13.8251 10.1582L12.0501 10.1832C11.8167 10.1832 11.6334 9.99985 11.6251 9.77485L11.5918 7.73317C11.5918 7.59984 11.7001 7.48318 11.8417 7.48318L13.8417 7.44984C13.9834 7.44984 14.0918 7.34152 14.0918 7.19985L14.0584 5.19983C14.0584 5.05816 13.9501 4.94984 13.8084 4.94984L11.5584 4.98318C10.1751 5.00818 9.07509 6.1415 9.10009 7.52484L9.14175 9.8165C9.15008 10.0498 8.96676 10.2332 8.73342 10.2415L7.73341 10.2582C7.59175 10.2582 7.48342 10.3665 7.48342 10.5082L7.50842 12.0915C7.50842 12.2332 7.61675 12.3415 7.75841 12.3415L8.75842 12.3248C8.99176 12.3248 9.17507 12.5082 9.18341 12.7332L9.2584 17.4832C9.26674 17.9498 8.89174 18.3332 8.42507 18.3332H6.50841C3.47508 18.3332 1.66675 16.5248 1.66675 13.4832V6.50817C1.66675 3.47484 3.47508 1.6665 6.50841 1.6665H13.4917C16.5251 1.6665 18.3334 3.47484 18.3334 6.50817V13.4915V13.4915Z"
                                            fill=""></path>
                                    </svg></a><a class="icon-socials icon-twitter" href="#">
                                    <svg width="21" height="20" viewbox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.2845 8.46864L19.5698 0H17.8434L11.5176 7.3532L6.4651 0H0.637695L8.278 11.1193L0.637695 20H2.36419L9.04447 12.2348L14.3802 20H20.2076L12.284 8.46864H12.2845ZM9.9198 11.2173L9.14568 10.1101L2.98627 1.29967H5.63806L10.6088 8.40994L11.3829 9.51718L17.8442 18.7594H15.1925L9.9198 11.2177V11.2173Z"
                                            fill=""></path>
                                    </svg></a><a class="icon-socials icon-be" href="#">
                                    <svg width="21" height="15" viewbox="0 0 21 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.82393 10.736L13.9225 7.78881L8.82393 4.84165V10.736ZM20.1803 3.04389C20.308 3.50561 20.3964 4.12451 20.4554 4.91042C20.5242 5.69633 20.5536 6.37418 20.5536 6.96361L20.6126 7.78881C20.6126 9.94024 20.4554 11.5219 20.1803 12.5337C19.9347 13.4179 19.3649 13.9877 18.4808 14.2333C18.0191 14.361 17.1742 14.4494 15.8775 14.5083C14.6004 14.5771 13.4313 14.6066 12.3507 14.6066L10.7887 14.6655C6.67251 14.6655 4.10848 14.5083 3.09662 14.2333C2.21247 13.9877 1.64269 13.4179 1.39709 12.5337C1.26938 12.072 1.18097 11.4531 1.12203 10.6672C1.05326 9.8813 1.02379 9.20345 1.02379 8.61402L0.964844 7.78881C0.964844 5.63739 1.12203 4.05575 1.39709 3.04389C1.64269 2.15974 2.21247 1.58996 3.09662 1.34436C3.55834 1.21665 4.4032 1.12823 5.69995 1.06929C6.97705 1.00052 8.14609 0.971052 9.22671 0.971052L10.7887 0.912109C14.9049 0.912109 17.4689 1.06929 18.4808 1.34436C19.3649 1.58996 19.9347 2.15974 20.1803 3.04389Z"
                                            fill=""></path>
                                    </svg></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- <div class="popup-firstload">
    <div class="popup-container">
        <div class="popup-content"> <a class="close-popup"></a>
            <div class="popup-left">
                <div class="logo-area"> <img class="light-mode" alt="Travila"
                        src="{{ asset('assets/imgs/template/logo.png') }}"><img class="dark-mode" alt="Travila"
                        src="{{ asset('assets/imgs/page/dashboard/logo-w.svg') }}"></div>
                <h3 class="title-popup">Book, Pack, Go! Your Ultimate Travel Companion</h3><a class="btn btn-black-lg"
                    href="#">Exploring Now
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg></a>
            </div>
            <div class="popup-right">
                <div class="box-price">
                    <div class="box-price-inner"> <span class="text-price-1">SAVE 39%</span><span
                            class="text-price-2">$899</span><a class="text-price-3" href="#">BOOK NOW</a></div>
                </div><img alt="Travila" src="{{ asset('assets/imgs/template/img-popup.png') }}">
                <div class="button-area"> <a class="btn btn-next" href="#">
                        <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99992 10.6668L10.6666 6.00016L5.99992 1.3335M10.6666 6.00016L1.33325 6.00016"
                                stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a></div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="popup-signin">
    <div class="popup-container">
        <div class="popup-content"> <a class="close-popup-signin"></a>
            <div class="d-flex gap-2 align-items-center"><a href="#"><img
                        src="{{ asset('assets/imgs/template/popup/logo.png') }}" alt="Travila"></a>
                <h4 class="neutral-1000">Hello there !</h4>
            </div>
            <div class="box-button-logins"> <a class="btn btn-login btn-google mr-10" href="#"><img
                        src="{{ asset('assets/imgs/template/popup/google.svg') }}" alt="Travila"><span
                        class="text-sm-bold">Sign in with Google</span></a><a class="btn btn-login mr-10"
                    href="#"><img src="{{ asset('assets/imgs/template/popup/facebook.svg') }}"
                        alt="Travila"></a><a class="btn btn-login" href="#"><img
                        src="{{ asset('assets/imgs/template/popup/apple.svg') }}" alt="Travila"></a></div>
            <div class="form-login">
                <form action="#">
                    <div class="form-group">
                        <label class="text-sm-medium">User name</label>
                        <input class="form-control username" type="text" placeholder="Email / Username">
                    </div>
                    <div class="form-group">
                        <label class="text-sm-medium">Password</label>
                        <input class="form-control password" type="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="box-remember-forgot">
                            <div class="remeber-me">
                                <label class="text-xs-medium neutral-500">
                                    <input class="cb-remember" type="checkbox">Remember me
                                </label>
                            </div>
                            <div class="forgotpass"> <a class="text-xs-medium neutral-500" href="#">Forgot
                                    password?</a></div>
                        </div>
                    </div>
                    <div class="form-group mt-45 mb-30"> <a class="btn btn-black-lg" href="#">Login
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a></div>
                    <p class="text-sm-medium neutral-500">Don’t have an account? <a class="neutral-1000 btn-signup"
                            href="#">Register Here !</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="popup-signup">
    <div class="popup-container">
        <div class="popup-content"> <a class="close-popup-signup"></a>
            <div class="d-flex gap-2 align-items-center"><a href="#"><img
                        src="{{ asset('assets/imgs/template/popup/logo.png') }}" alt="Travila"></a>
                <h4 class="neutral-1000">Register</h4>
            </div>
            <div class="box-button-logins"> <a class="btn btn-login btn-google mr-10" href="#"><img
                        src="{{ asset('assets/imgs/template/popup/google.svg') }}" alt="Travila"><span
                        class="text-sm-bold">Sign up with Google</span></a><a class="btn btn-login mr-10"
                    href="#"><img src="{{ asset('assets/imgs/template/popup/facebook.svg') }}"
                        alt="Travila"></a><a class="btn btn-login')}}" href="#"><img
                        src="{{ asset('assets/imgs/template/popup/apple.svg') }}" alt="Travila"></a></div>
            <div class="form-login">
                <form action="#">
                    <div class="form-group">
                        <label class="text-sm-medium">Username *</label>
                        <input class="form-control username" type="text" placeholder="Email / Username">
                    </div>
                    <div class="form-group">
                        <label class="text-sm-medium">Your email *</label>
                        <input class="form-control email" type="text" placeholder="Email / Username">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-sm-medium">Password *</label>
                                <input class="form-control password" type="password" placeholder="***********">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-sm-medium">Confirm Password *</label>
                                <input class="form-control password" type="password" placeholder="***********">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box-remember-forgot">
                            <div class="remeber-me">
                                <label class="text-xs-medium neutral-500">
                                    <input class="cb-remember" type="checkbox">I agree to term and conditions
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-45 mb-30"> <a class="btn btn-black-lg" href="#">Create New
                            Account
                            <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a></div>
                    <p class="text-sm-medium neutral-500">Already have an account <a class="neutral-1000 btn-signin"
                            href="#">Login Here !</a></p>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="subscribeSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="subscribeSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subscribeSuccessModalLabel">Successful</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="success-icon"
                        style="width: 50px; height: 50px; border-radius: 50%; background-color: green; display: flex; align-items: center; justify-content: center; margin: auto;">
                        <span style="color: white; font-size: 24px;">&#10003;</span> <!-- Checkmark -->
                    </div>
                    <p>You subscribed successfully!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="paymentSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentSuccessModalLabel">Successful</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="success-icon"
                        style="width: 50px; height: 50px; border-radius: 50%; background-color: green; display: flex; align-items: center; justify-content: center; margin: auto;">
                        <span style="color: white; font-size: 24px;">&#10003;</span> <!-- Checkmark -->
                    </div>
                    <p>Your payment was successful!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentFailModal" tabindex="-1" role="dialog"
        aria-labelledby="paymentFailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentSuccessModalLabel">Fail</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="success-icon"
                        style="width: 50px; height: 50px; border-radius: 50%; background-color: rgb(207, 19, 45); display: flex; align-items: center; justify-content: center; margin: auto;">
                        <span style="color: white; font-size: 24px;">&#10008;</span>

                    </div>
                    <p>Your payment was Fail!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inquirySuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="inquirySuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inquirySuccessModalLabel">Successful</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="success-icon"
                        style="width: 50px; height: 50px; border-radius: 50%; background-color: green; display: flex; align-items: center; justify-content: center; margin: auto;">
                        <span style="color: white; font-size: 24px;">&#10003;</span> <!-- Checkmark -->
                    </div>
                    <p>Your inquiry sent successful!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Vendors Scripts-->
{{-- <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<!--Other-->
{{-- <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/plugins/slick.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/plugins/jquery.carouselTicker.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/plugins/masonry.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
{{-- <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dark.js') }}"></script>
<!-- Count down-->
{{-- <script src="{{ asset('assets/js/vendor/jquery.countdown.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/noUISlider.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slider.js') }}"></script>
<!--Custom script for this template-->
<script src="{{ asset('assets/js/main.js?v=1.0.0') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
