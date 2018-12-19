jQuery(document).ready(function($)
 {
   getCountry_name();
   display_salesman();
 showsalesmaninfotable();


   var ruleSet1 = {
                     required: true,
                     minlength: 2,
                     lettersonly: true
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
                 var ruleSet21= {
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
                    minlength:"your name must be at least 2 characters long",
                    lettersonly:"this field can only contain characters"
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
                   var ruleSet22= {
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

   $("form[name='formsubmit']").validate({
     rules: {
                   firstname: ruleSet1,
                   lastname:  ruleSet1,
                   emailid:   ruleSet2,
                   mobileno:  ruleSet3,
                   mobileno1: ruleSet21,
                   birthdate: ruleSet2,
                   gender:    ruleSet2,
                   status:    ruleSet2,
                   country:ruleSet2,
                   state:ruleSet2,
                   city:ruleSet2,
                   salespincode:ruleSet7,
                   address:   ruleSet2
           },
   messages: {
                firstname:  ruleSet4,
                lastname:   ruleSet4,
                emailid:    ruleSet5,
                mobileno:   ruleSet6,
                mobileno1: ruleSet22,
                birthdate:  ruleSet5,
                gender:     ruleSet5,
                status:     ruleSet5,
                salescountry:ruleSet5,
                salesstate:ruleSet5,
                salescity:ruleSet5,
                salespincode:ruleSet8,
                address:    ruleSet5
        },
        submitHandler: function(form,event)
        {
          event.preventDefault();
          var formData = new FormData(form);
          var city=document.getElementById("city").value;
          var address=document.getElementById("address").value;
          var pincode=document.getElementById("salespincode").value;
          var salesaddress= city + address + pincode;
          var button = document.getElementById("salesid").value;
          var button1 = document.getElementById("salesmanid").value;
          var emp_id = document.getElementById("emp_id").value;

          var geocoder = new google.maps.Geocoder();
geocoder.geocode({ 'address': salesaddress }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    formData.append('lat', latitude);
                    formData.append('long', longitude);

            $.ajax({
                   url:"../src/salesRegistration.php",
          	       type:"POST",
                   dataType:'json',
            	     data: formData,
                   contentType: false,
                   processData:false,
                   beforeSend:function(){
                     if(!(emp_id))
                     {
                       var user = $(salesid);
                       user.button('loading');
                     }
                     else
                      {
                        var user = $(salesmanid);
                        user.button('loading');
                     }
                   },
          	       success:function(data)
                   {
          		         if(data['value'] == 'insert' && data['true']== 'true')
                       {
                         var msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Salesman Registered Successfully!</strong></font></div>";
                           $('#msg').html(msg);
                           window.setTimeout(function() {
                             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                 $(this).remove();
                             });
                         }, 3000);
                        $("#submitformdata")[0].reset();
                        $("#gender").select2("val", "");
                          $("#country").select2("val", "");
                          $("#state").select2("val", "");
                          $("#city").select2("val", "");

                        $("#status").select2("val", "");
                        window.location.reload();
                      }
                      else if(data['value'] == 'update'  && data['true']== 'true') {

                        var msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Salesman Updated Successfully!</strong></font></div>";
                          $('#msg').html(msg);
                          window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 3000);
                           $("#submitformdata")[0].reset();
                           $("#gender").select2("val", "");
                           $("#status").select2("val", "");
                           $("#country").select2("val", "");
                           $("#state").select2("val", "");
                           $("#city").select2("val", "");

                           window.location.reload();
                          }
                          else
                          {
                          var msg= "<div class='alert alert-danger text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Salesman Not Registered Try Again!</strong></font></div>";
                            $('#msg').html(msg);
                            window.setTimeout(function() {
                              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                  $(this).remove();
                              });
                          }, 3000);
                        }
                    },
                    complete:function(data){
                          user.button('reset');
                      }
                      });
                    }
                   else {
                    alert("Requ.")
                }
            });
                    }
      });
 });
