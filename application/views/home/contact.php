<section >
    <div class="">
        <div class="">

            <div class="box">

                <div class="col-sm-12">
                    <div class="col-sm-4 detail-section">
                        <div class="">
                            <div class="map">
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="contact-details">
                            <p>
                                <span>Address :</span></p>
                            <p>1001, Crescent Royale,</p> 
                            <p>Andheri (W)</p>
                            <p>Mumbai - 53</p>
                            <p><span>Email:</span></p>
                            <p>contact@indianmusiclab.com</p>
                            <p><span>Phone:</span></p>
                            <p>(+91)-773-891-0102</p>


                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h3>Contact Us:</h3>
                            <form id="contactForm" class="">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone: " class="form-input form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-input form-control" rows="3" placeholder="Message: "></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn form-button">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="clear"></div>
        </div>	
    </div>
</section>

<script type="text/javascript">
    $("#contactForm").submit(function(event){
        event.preventDefault();
        var a=document.forms["contactForm"]["name"].value;
        var b=document.forms["contactForm"]["email"].value;
        var c=document.forms["contactForm"]["phone"].value;
        var d=document.forms["contactForm"]["message"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="") {
          $('#err_msg').text('Please Enter value');
          $('#myModal').modal('show');
        }
    });
</script>