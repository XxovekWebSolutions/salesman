jQuery(document).ready(function($)
 {

   var ruleSet1 = {
                     required: true,
                     minlength: 2,
                  };
   var ruleSet2 = {
                    required: true
                  };
  var ruleSet3 = {
                   required: true,
                   digits:true,
                   minlength:10,
                   maxlength: 10,
                   pattern:"[789][0-9]{9}"
                 };
                 var ruleSet9 = {
                                  digits:true,
                                  minlength:10,
                                  maxlength: 10,
                                  pattern:"[789][0-9]{9}"
                                };
                 var ruleSet7= {
                                 required: true,
                                 minlength:6,
                                 maxlength: 6,
                                 digits:true
                               };

  var  ruleSet4 = {
                    required:"Please Enter Your Name",
                    minlength:"your name must be at least 2 characters long"
                 };
  var ruleSet5 = {
                   required: "this field is required"
                 };
    var ruleSet6 = {
                      required: "Please enter your Mobile Number ",
                      digits:"please enter only digits",
                      minlength: "please enter at least 10 digits",
                      maxlength: "please do not enter more than 10 digit",
                      pattern:"Mobile Number Should start with 7,8,or 9"
                   };
                   var ruleSet10= {
                                     digits:"please enter only digits",
                                     minlength: "please enter at least 10 digits",
                                     maxlength: "please do not enter more than 10 digit",
                                     pattern:"Mobile Number Should start with 7,8,or 9"
                                  };
   var ruleSet8={
                   required: "Please enter pincode",
                   digits:"please enter only digits",
                   minlength: "please enter 6 digits pincode",
                    maxlength: "please do not enter more than 6 digits"
                 };

   $("form[name='submitshopkeeperform']").validate({
     rules: {
                   contactperson: ruleSet1,
                   lastname:  ruleSet1,
                   emailid:   ruleSet2,
                   mobileno:  ruleSet3,
                   mobileno1:ruleSet9,
                   country:ruleSet2,
                   state:ruleSet2,
                   city:ruleSet2,
                   shoppincode:ruleSet7,
                   address1:   ruleSet2
           },
   messages: {
                contactperson:  ruleSet4,
                lastname:   ruleSet4,
                emailid:    ruleSet5,
                mobileno:   ruleSet6,
                mobileno1:ruleSet10,
                country:ruleSet5,
                state:ruleSet5,
                city:ruleSet5,
                shoppincode:ruleSet8,
                address1: ruleSet5
        },
        submitHandler: function(form,event)
        {
          event.preventDefault();
          var formdata = $('#submitshopkeeperformdata').serialize();
          var shopkeeper_id = document.getElementById("shopkeeper_id").value;

          var city=document.getElementById("city").value;
          var address=document.getElementById("address").value;
          var pincode=document.getElementById("shoppincode").value;
          var shopaddress= city + address + pincode;
          var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': shopaddress }, function (results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                              var latitude = results[0].geometry.location.lat();
                              var longitude = results[0].geometry.location.lng();

            $.ajax({
                   url:'../src/shopKeeperRegistration.php',
                   type:'POST',
                   data:formdata+'&lat=' + latitude +'&long=' + longitude,
                   dataType:'json',
                   beforeSend:function(){
                     if(!(shopkeeper_id))
                     {
                       var user = $(shopid);
                       user.button('loading');
                     }
                     else
                      {
                        var user = $(shopmanid);
                        user.button('loading');
                     }
                   },
          	       success:function(response)
                   {
                     if(response.true){
                       if(response.C == 0){
                         var msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Shopkeeper Registered Successfully!</strong></font></div>";
                              $('#msg1').html(msg);
                              window.setTimeout(function() {
                                $(".alert").fadeTo(500,0).slideUp(500, function(){
                                    $(this).remove();
                                });
                            }, 3000);
                           $("#submitshopkeeperformdata")[0].reset();
                           $("#country").select2("val", "");
                           $("#state").select2("val", "");
                           $("#city").select2("val", "");
                           window.location.reload();
                       }else {
                         var msg1= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> ShopKeeper Updated Successfully!</strong></font></div>";
                             $('#msg1').html(msg1);
                             window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                   $(this).remove();
                               });
                           }, 3000);
                              $("#submitshopkeeperformdata")[0].reset();
                              $("#country").select2("val", "");
                              $("#state").select2("val", "");
                              $("#city").select2("val", "");
                              window.location.reload();
                       }
                     }else {
                       var msg1= "<div class='alert alert-danger text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Shopkeeper Not Registered Try Again!</strong></font></div>";
                             $('#msg1').html(msg1);
                             window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                   $(this).remove();
                               });
                           }, 3000);
                     }

                    },
                    complete:function(response){
                          user.button('reset');
                      }
                      })
                    }
                    else {
                     alert("Request Failed");
                 }
      });
    }
 });
});
