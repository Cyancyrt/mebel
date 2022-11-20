<div id="contact" class="contact">
    <div class="container" data-aos="fade-up" style="color:white ;">
        <div class="div-title">
            <h2>Contact Us</h2>
        </div>
        <div>
            <h3>
                <a href="{{ route('about') }}" style="color: #DDC190;"><i class="bx bx-info-circle">learn more about us</i></a>
            </h3>
        </div>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.942191922296!2d110.38331401487328!3d-7.016081170677008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b073bdf32d7%3A0xc0d4f7f46e90ea69!2sBALAI%20RW%201%20RINGIN%20TELU!5e0!3m2!1sen!2sbg!4v1662444377596!5m2!1sen!2sbg" width="100%" height="270px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 text-white">
                <div class="info" style="color: #DDC190;">
                    <div class="address">
                        <i class='bx bx-map bx-sm'></i>
                        <h4>Location:</h4>
                        <p>Jln.RinginTelu rt4 rw1, Kalipancur, Ngaliyan, Semarang</p>
                    </div>
                    <div class="email">
                        <i class='bx bx-envelope bx-sm'></i>
                        <h4>Email:</h4>
                        <p>UDJATILAWAS@example.com</p>
                    </div>
                    <div class="phone" sty>
                        <i class='bx bx-phone bx-sm'></i>
                        <h4>Call:</h4>
                        <p>089876523654</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="text-center mt-5"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End Contact Section -->
<style>
    .email p,
    .address p,
    .phone p {
        color: white;
    }
</style>
