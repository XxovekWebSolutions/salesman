
function getCountry_name()
{
    $.ajax({
              type: "POST",
              url: "../src/get_countryNames.php",
              success: function(msg)
             {
                    $("#country").html(msg);
              }
            });
}
function getState(country)
{
  $.ajax({
              type: "POST",
              url: "../src/get_StateNames.php",
              data: ({
                        user_id:country
                      }),
                      success: function(msg)
                      {
                              $("#state").append(msg).val("").trigger("change");
                        }
          });
}


function getCity(state)
{
  $.ajax({
      type: "POST",
      url: "../src/getcityNames.php",
      data: ({
          user_id:state
      }),
      success: function(msg) {
        $("#city").append(msg).val("").trigger("change");
      }
  });
}
