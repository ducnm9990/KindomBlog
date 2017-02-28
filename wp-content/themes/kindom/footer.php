<?php wp_footer(); ?>

<footer>
    <div class="foot-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="foot-col">
                        <div class="foot-col-title">More</div>
                        <div class="foot-col-content">
                            <ul class="foot-link clearfix">
                                <li class="foot-link-item"><a href="#">Sub menu item 1</a></li>
                                <li class="foot-link-item"><a href="#">Sub menu item 2</a></li>
                                <li class="clearfix visible-xs"></li>
                                <li class="foot-link-item"><a href="#">Sub menu item 3</a></li>
                                <li class="foot-link-item"><a href="#">Sub menu item 4</a></li>
                                <li class="clearfix visible-xs"></li>
                                <li class="foot-link-item"><a href="#">Sub menu item 5</a></li>
                                <li class="foot-link-item"><a href="#">Sub menu item 6</a></li>
                                <li class="clearfix visible-xs"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="foot-col foot-col-address">
                        <div class="foot-col-title">Our Address</div>
                        <div class="foot-col-content">
                            <p><?php echo get_field('contact_address', 'options')?></p>
                            <p>
                            	phone: <?php echo get_field('contact_phone', 'options')?>
								<br>
								email: <?php echo get_field('contact_email', 'options')?> 
								<br>
								web: <?php echo get_field('contact_website', 'options')?>
							</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="foot-col">
                        <div class="foot-col-title">Drop us a line</div>
                        <div class="foot-col-content">
                            <form name="form_contact">
                                <div class="form-group">
                                	<label>Name</label>
                                	<input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                	<label>Email</label>
                                	<input class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                	<label>Message</label>
                                	<textarea class="form-control" name="message" rows="5" cols="15"></textarea>
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-primary btn-contact-submit" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <p class="foot-copyright">&copy;&nbsp;Copyright 2017 Kinchip Systems Pty Ltd</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="foot-link-bottom">
                        <ul>
                            <li><a href="#">Privacy Policy | </a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>