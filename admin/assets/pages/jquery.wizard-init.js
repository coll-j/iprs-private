/**
* Theme: Highdmin - Responsive Bootstrap 4 Admin Dashboard
* Author: Coderthemes
* Form wizard page
*/

!function($) {
    "use strict";

    var FormWizard = function() {};

    FormWizard.prototype.createBasic = function($form_container) {
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanged: function (event, currentIndex, priorIndex) {
                if(currentIndex == 4) {
                    $("#basic-form").find('a[href="#finish"]').remove();
                    $("#basic-form .actions li:last-child").append('<button type="submit" id="submit" class="btn-large"><span class="fa fa-chevron-right"></span></button>');
                }
            },
            onFinishing: function (event, currentIndex) {
                //NOTE: Here you can do form validation and return true or false based on your validation logic
                console.log("Form has been validated!");
                return true; 
            },
            onFinished: function (event, currentIndex) {
                //NOTE: Submit the form, if all validation passed.
                console.log("Form can be submitted using submit method. E.g. $('#basic-form').submit()"); 
                $("#basic-form").submit();

            }
        });
        return $form_container;
    },
    //creates vertical form
    FormWizard.prototype.createVertical = function($form_container) {
        $form_container.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            stepsOrientation: "vertical"
        });
        return $form_container;
    },
    FormWizard.prototype.init = function() {
        //initialzing various forms

        //basic form
        this.createBasic($("#basic-form"));

        //vertical form
        this.createVertical($("#wizard-vertical"));
    },
    //init
    $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormWizard.init()
}(window.jQuery);