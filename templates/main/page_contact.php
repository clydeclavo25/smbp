
    <section id="contact-info" style="">
        <div class="center">                
            <h2>How to Reach Us?</h2>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
         

                    <div class="col-sm-12 map-content">
                        <ul class="row">
                            <li class="col-lg-3">
                                
                            </li>
                            <li class="col-sm-7">
                                <address>
                                    <h2>Head Office</h2>
                                    <p>Unit 213/215 Alpha Bldg, Subic International Hotel Complex
                                    Sta. Rita Road CBD Area<br>
                                    Subic Bay Freeport Zone, Olongapo City, Philippines</p>
                                    <p>Telephone:(047) 251-3799 <br>
                                    Email Address: scimathbrainpowerphils@gmail.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" id="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" id="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control">
                        </div>                      
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" id="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message"  required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                            <!-- <input type="submit" class="btn btn-primary btn-lg" name="btnSubmit" value="SUBMIT"> -->
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->