
        $(document).ready(function(){
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
               // ======= Click on Back / Previous button ====
                $(".previous").click(function(){
                    current_fs = $(this).parent().parent().parent().parent();
                    previous_fs = $(this).parent().parent().parent().parent().prev();
                    //Remove class active
                    $("#progressbarAct li").removeClass("active");
                                //Add Class Active
                    $("#progressbarAct li").eq($("fieldset").index(previous_fs)).addClass("active");
                    // $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                    });
                });
    
                // ======= Click on Save and Continues button ====
    
                $(".next").click(function() {
                    current_fs = $(this).parent().parent().parent().parent();
                    next_fs = $(this).parent().parent().parent().parent().prev();
                     $("#progressbarAct li").removeClass("active");
                    //Add Class Active
                    $("#progressbarAct li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                      // for making fielset appear animation
                      opacity = 1 - now;
                      current_fs.css({
                      'display': 'none',
                      'position': 'relative'
                      });
                      next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });
    
            $(".submit").click(function(){
            return false;
            });  
        });