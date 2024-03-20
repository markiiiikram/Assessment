<div class="accordion">
    <div class="accordion-top">
        <p><strong> Email us on: </strong><br></p>
        <p class="tele"><a href="#">sales@netmatters.com</a></p>
        <p><strong> Business hours:</strong></p>
        <p><strong> Monday - Friday 07:00 - 18:00
        </strong></p>
    </div>
    <div class="">
        <div class="accordion-bottom out-of-hours">
            <span class="accordion-trigger">Out of Hours IT Support <span class="icon-chevron-thin-down"></span></span>
            <div class="accordion-dropdown">
                <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                <p><strong>Monday - Friday 18:00 - 22:00</strong>
                <strong>Saturday 08:00 - 16:00</strong>
                <br>
                <strong>Sunday 10:00 - 18:00</strong>
                </p>
                <p>To log a critical task, you will need to call our main line number and select Option 2 to leave
                    an Out of Hours&nbsp; voicemail.A technician will contact you on the number provided within 45 minutes of your call.&nbsp;</p>
            </div>

        </div>
    </div>
</div>

<div class="contact-us">
<?php include_once 'validation.php'?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (empty($nameErr) && empty($emailErr) && empty($telephoneErr) && empty($messageErr)): ?>
            <div class="success">
                <p><?php echo $successMessage; ?></p>
                <span class="icon-x1 close"></span>
            </div>
        <?php elseif (!empty($nameErr) || !empty($emailErr) || !empty($telephoneErr) || !empty($messageErr)): ?>
            <div class="errors">
                <?php if (!empty($nameErr)): ?>
                    <div class="error"><p><?php echo $nameErr; ?></p> <span class="icon-x1 close"></span></div>
                <?php endif; ?>
                <?php if (!empty($emailErr)): ?>
                    <div class="error"><p><?php echo $emailErr; ?></p> <span class="icon-x1 close"></span></div>
                <?php endif; ?>
                <?php if (!empty($telephoneErr)): ?>
                    <div class="error"><p><?php echo $telephoneErr; ?></p> <span class="icon-x1 close"></span></div>
                <?php endif; ?>
                <?php if (!empty($messageErr)): ?>
                    <div class="error"><p><?php echo $messageErr; ?></p> <span class="icon-x1 close"></span></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="news-input">
    <div class="email-input-container">
                <label for="your-name-contact">Your Name</label><br>
                <input type="text" id="your-name-contact" name="name" autocomplete="name" class="email" value="<?php echo htmlspecialchars($name); ?>"><br>
            </div>
            <div class="company-container">
                <label for="your_company_name">Company Name</label><br>
                <input type="text" id="your_company_name" name="company_name" autocomplete="company" class="email" value="<?php echo htmlspecialchars($company_name); ?>">
            </div>
            <div class="email-input-container">
                <label for="your-email-contact">Your Email</label><br>
                <input type="text" id="your-email-contact" name="email" class="email" value="<?php echo $email; ?>">
            </div>
            <div class="email-input-container">
                <label for="your-telephone">Your Telephone Number</label><br>
                <input type="text" id="your-telephone" name="telephone" class="email" value="<?php echo htmlspecialchars($telephone); ?>">
            </div>
            <div class="email-input-container input-message-container">
                <label for="message-container">Message</label><br>
                <textarea rows="4" name="message" placeholder="Hi, I am interested in discussing a Our Offices solution, could you please give me a call or send an email?" id="message-container"><?php echo htmlspecialchars($message); ?></textarea>
            </div>
    </div>
    <br>
    <div class="privacy-policy">
        <div class="checkbox-container-1"></div>
        <input type="checkbox" id="check-sup">
        <label for="check-sup" id="label-checkmark">Please tick this box if you wish to receive marketing information from us. Please see our <a href='#'>Privacy Policy</a> for more information on how we keep your data safe.</label>
    </div>
    <div class="recaptcha">
        <span>This site is protected by reCAPTCHA and the Google <a href="#" target="_blank"><u>Privacy Policy</u></a> and <a href="#" target="_blank"><u>Terms of Service</u></a> apply.</span>
    </div>
    <div class="button-block">
        <button id="submit1" class="btn button-black enquiry" action="#contact-form">SEND ENQUIRY</button>
        <small class="required">Fields Required</small>
    </div>
</form>
</div>
