<?php
$page_title = "Contact Us - Smart Crop Advisory System";
include 'includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Get In Touch</h1>
        <p>We'd love to hear from you</p>
    </div>
</section>

<section class="contact-page-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-container">
                <h2>Send Us a Message</h2>
                <form action="contact_handler.php" method="POST" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="support">Technical Support</option>
                            <option value="feedback">Feedback</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" rows="6" required placeholder="Tell us how we can help you..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-large btn-block">Send Message →</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-container">
                <h2>Contact Information</h2>
                
                <div class="contact-info-card">
                    <div class="contact-info-icon">📍</div>
                    <div class="contact-info-content">
                        <h3>Our Address</h3>
                        <p>Agricultural Technology Hub<br>
                        Innovation District, Sector 12<br>
                        New Delhi - 110001, India</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">📞</div>
                    <div class="contact-info-content">
                        <h3>Phone Numbers</h3>
                        <p>Main Office: +91 11 1234-5678<br>
                        Support: +91 11 1234-5679<br>
                        Toll Free: 1800-123-4567</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">📧</div>
                    <div class="contact-info-content">
                        <h3>Email Addresses</h3>
                        <p>General: info@smartcrop.com<br>
                        Support: support@smartcrop.com<br>
                        Partnership: partner@smartcrop.com</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">🕐</div>
                    <div class="contact-info-content">
                        <h3>Working Hours</h3>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                        Saturday: 9:00 AM - 2:00 PM<br>
                        Sunday: Closed</p>
                    </div>
                </div>

                <div class="social-links">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon">📘</a>
                        <a href="#" class="social-icon">🐦</a>
                        <a href="#" class="social-icon">📷</a>
                        <a href="#" class="social-icon">💼</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section (Placeholder) -->
        <div class="map-container">
            <h2>Find Us On Map</h2>
            <div class="map-placeholder">
                <p>🗺️ Map will be integrated here</p>
                <p style="font-size: 14px; color: #666;">Google Maps or OpenStreetMap integration</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
