<!--Section: Contact v.2-->
<section class="contactUs">
  <div class="container">
    <div class="row">

        <div class="col-md-9 mb-md-0 mt-20">
            <h2 class="text-center">Contact us</h2>
            <div class="alert alert-success" id='success_id' style="display:none;">
              <p>Your enquiry has been submitted successfully</p>
            </div>
        </div>
        <div class="col-md-9 mb-md-0 mt-20">
            <form id="contact-form" name="contact-form" onsubmit="return false;" method="POST">
                <!--Grid row-->
                <div class="row mt-20">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">First name*</label>
                            <input type="text" id="name" name="first_name" class="form-control" placeholder="First name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Last name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"  placeholder="Last name">
                        </div>
                    </div>
                </div>

                <div class="row mt-20">

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email*</label>
                            <input type="email" id="email" name="email" class="form-control"  placeholder="Your email" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Phone number*</label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone number" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                          <label for="service" class="">Type of service*</label>
                            <select name="service" id=""  class="form-control" required>
                                <option value="">Please select</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Home appliances">Home appliance</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-md-12">
                        <div class="md-form">
                          <label for="message">Your message*</label>
                          <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required placeholder="Please enter the service details">
                          </textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-md-12 mt-20">
                      <div class="text-center text-md-left mt-10">
                          <input id="enquiry_submit" type='submit' class="btn btn-success btn-block form-control" value="Submit" />
                      </div>
                      <div class="status"></div>
                    </div>
                  </div>
            </form>
   
        </div>

        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li>
                <i class="fa fa-home mt-10 fa-2x"></i>
                    <p>Solinganallur, Chennai</p>
                </li>

                <li><i class="fa fa-phone mt-10 fa-2x"></i>
                    <p>+91 9791913649</p>
                </li>

                <li><i class="fa fa-envelope mt-10 fa-2x"></i>
                    <p>contact@mdbootstrap.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>
  </div>
</section>

<script>
    jQuery("#enquiry_submit").click(function(event){
      event.preventDefault();
      var enPoint = "<?php echo admin_url('admin-ajax.php') ?>";
      var formData = new FormData;
      var formFields = jQuery("#contact-form").serialize();
      formData.append("action", "enquiry");
      formData.append("enquiry", formFields);
      jQuery.ajax({
        url : enPoint,
        data : formData,
        type : 'POST',
        processData : false,
        contentType : false,
        success : function (res) {
          jQuery("#success_id").fadeIn(2000);
          jQuery("#contact-form").fadeOut(2000).trigger('reset').fadeIn(2000);
          alert(res.data);
        },
        error : function() {
          alert(res.data);
        }
      });
    });
</script>