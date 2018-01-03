jQuery("#phone_number").mask("9999999999");
jQuery( function() {
           var dateToday = new Date();
            jQuery("#startDate-datepicker").datepicker({
                numberOfMonths: 1,
                dateFormat: "yy-mm-dd",
                minDate: dateToday,
                onSelect: function(selected) {
                  jQuery("#expiryDate-datepicker").datepicker("option","minDate", selected)
                }
            });
            jQuery("#expiryDate-datepicker").datepicker({ 
                numberOfMonths: 1,
                dateFormat: "yy-mm-dd",
                onSelect: function(selected) {
                   jQuery("#startDate-datepicker").datepicker("option","maxDate", selected)
                }
            }); 
            jQuery( "#postedDate-datepicker").datepicker({
                        dateFormat: "yy-mm-dd",
                        minDate: dateToday,
                         }).
            datepicker("setDate", new Date());
          } );

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adImageShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#adImage").change(function(){
        readURL(this);
    });
