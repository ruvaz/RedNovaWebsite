$(function(){ 
	
	var lang = $("#lang").val();
	var count_captcha_refresh = 0;
    
    $.validator.addClassRules("required",{
        required: true,        
    });

    $.validator.addClassRules("equal-13",{
        maxlength: 13,        
        minlength: 13
    });
        
    $.validator.addMethod("digits_float", function(value, element){
        var re = new RegExp("^[0-9]+(\.[0-9]{1,2})?$");
        return this.optional(element) || re.test(value);
    }, "Please enter a number with two decimals");		

    var v_payment_notification = $("#form_payment_notification").validate({
        rules:
        {
            name:
            {
                required: true,
                minlength: 4,
                maxlength: 60
            },
            phone:
            {
                digits: true, 
                maxlength: 18              
            },
            email:
            {
                required: true ,
                maxlength: 50               
            },
            payment_date:
            {
                required: true,
                minlength: 10,
                maxlength: 10  
            },
            // hours:
            // {
                // required: true
            // },
            // minutes:
            // {
                // required: true
            // },
            captcha:
            {
                required: true
            },
            amount:
            {         
                required: true,   
                digits_float: true,
                maxlength: 10,
                minlength: 2   
            }
        }
    });

    //----------------------------------- Validations-------------------------------    
    var v_login_opt = $("#form_login_opt").validate({
        rules:
        {
            username:
            {
                required: true
            },
            password:
            {
                required: true
            }
        }
    });

    var v_myresults_opt = $("#form_myresults_opt").validate({
        rules:
        {
           user:
           {
                required: true
           },
           pass:
           {
                required: true
           } 
        }
    });

    var v_login_cec = $("#form_login_cec").validate({
        rules:
        {
            username:
            {
                required: true
            },
            password:
            {
                required: true
            }
        }
    });    

    var v_login_cet = $("#form_login_cet").validate({
        rules:
        {
            username:
            {
                required: true
            },
            password:
            {
                required: true
            }            
        }
    });

    var v_myresults_dtes = $("#form_myresults_dtes").validate({
        rules:
        {
            curp:
            {
                required: true
            },
            folio:
            {
                required: true
            }    
        }
    });
    

    // ---------------- Selectors-----------------------------------------------------

    $("#form_myresults_opt").on('submit',function(e)
    { 

        e.preventDefault(); //stop event

        $(".error_message").remove(); //remove error message

        if(!v_myresults_opt.numberOfInvalids())  // inputs validation
        {                   

            var rq_optresults = $.Deferred(); //promise variable
            var opt_results_form = $(this); // current form

            addWaitMessage(opt_results_form.parent()); //add wait message

            opt_results_form.hide("slow"); // hide current form

                                    // original URL
            url = "http://opt.rednovaconsultants.com/opt-results/login_ajax.php";
            data = $(this).serializeArray(); //data form
            method = "POST"; //request method

            rq_optresults = sendAjaxRequest(url, data, method); // ajax request

            $.when(rq_optresults).done(function(response) // this is executed when the server response
            {
                // response = $.parseJSON(response);  // convert server response to JSON              

                if(response.status == 1) // check success status
                {                                    
                    setTimeout(function()
                    {              // exec current event in 4 seconds                                   
                        e.currentTarget.submit();
                        $("#myresults_opt").modal("hide");  //hide modal
                    },4000);

                }
                else if(response.status == 0) // check error status
                {    
                    setTimeout(function()
                    {  // show error message in 4 seconds
                        $(".wait_message").remove();
                        addErrorMessage(opt_results_form.parent(), response.msg); // show error message
                        opt_results_form.show('slow');   // show current form again                     
                    },4000);

                }    
            });            
        }
    });

    // $("#form_login_opt").submit(function(e){
//         
        // e.preventDefault(); //stop event
// 
        // $(".error_message").remove(); //remove error message
// 
        // if(!v_login_opt.numberOfInvalids()) // inputs validation
        // {
            // var rq_optlogin = $.Deferred(); //promise variable
            // var opt_login_form = $(this); // current form
// 
            // addWaitMessage(opt_login_form.parent()); //add wait message
// 
            // opt_login_form.hide("slow"); // hide current form
// 
                                    // // original URL
            // url = "http://opt.rednovaconsultants.com/opt-results/login_ajax.php";
            // data = $(this).serializeArray(); //data form
            // method = "POST"; //request method
// 
            // rq_optlogin = sendAjaxRequest(url, data, method); // ajax request
// 
            // $.when(rq_optlogin).done(function(response) // this is executed when the server response
            // {
// 
                // // response = $.parseJSON(response); // convert server response to JSON   
// 
                // if(response.status == 1) // check success status
                // {
                    // setTimeout(function()
                    // {              // exec current event in 4 seconds
                        // e.currentTarget.submit();
                        // $("#login_opt").modal("hide");  //hide modal
                    // },4000);   
                // }
                // else if(response.status == 0) // check error status
                // {    
                    // setTimeout(function()
                    // {  // show error message in 4 seconds
                        // $(".wait_message").remove();
                        // addErrorMessage(opt_login_form.parent(), response.msg); // show error message
                        // opt_login_form.show('slow');   // show current form again                     
                    // },4000);
// 
                // } 
            // });
        // }    
    // });

    $("#form_payment_notification").submit(function(e){

        e.preventDefault(); //stop event

        $(".error_message").remove(); //remove error message

        if(!v_payment_notification.numberOfInvalids()){ // inputs validation

            var request = $.Deferred(); //promise variable
            var request_captcha = $.Deferred(); //promise variable
            var payment_notification_form = $(this);
            
            addWaitMessage(payment_notification_form.parent()); //add wait message                  

            $(this).hide("slow");  // hide current form


            url = "/"+lang+"/opt/payment-notification";      // URL request
            data = $(this).serializeArray();   //data form
                 
            method = "POST"; //request method

			if(lang == 'en' || lang == 'es'){
				request = sendAjaxRequest(url, data, method); // ajax request

	            $.when(request).done(function(response){ // this is executed when the server response								               
	                    setTimeout(function() // exec current event in 4 seconds
	                    {
	                        $(".wait_message").remove(); // remove wait message
	
	                        addSuccessMessage(payment_notification_form.parent(), response.msg); // add seccess message                      
	                        addButtonCloseModal(payment_notification_form.parent()); // add button to close modal
	
	                    },2000);
	                    v_payment_notification.resetForm();                              
	            })
	            .fail(function(response){
			    	   setTimeout(function()// exec current event in 4 seconds
			            {
			                $(".wait_message").remove();// remove wait message
			                addErrorMessage(payment_notification_form.parent(), response.msg); // show error message
			                $("#form_payment_notification").show('slow'); // show current form
			            },2000);
	            });
	        }
        }    
    });

    $("#form_login_cec").submit(function(e){

        e.preventDefault(); //stop event

        $(".error_message").remove();  //remove error message      

        if(!v_login_cec.numberOfInvalids()) // inputs validation
        {
            var rq_ceclogin = $.Deferred(); //promise variable
            var cec_login_form = $(this); //current form

            addWaitMessage(cec_login_form.parent()); //add wait message 

            cec_login_form.hide("slow");  // hide current form
            
            setTimeout(function()
                    {              // exec current event in 4 seconds
                        e.currentTarget.submit(); // send form
                        $("#login_cec").modal("hide");  //hide modal
                    },4000);           
        }    
    });
    $("#form_login_cet").submit(function(e){

        e.preventDefault(); //stop event

        $(".error_message").remove();     //remove error message   

        if(!v_login_cet.numberOfInvalids())   // inputs validation
        {
            var rq_cetlogin = $.Deferred(); //promise variable
            var cet_login_form = $(this); //current form

            addWaitMessage(cet_login_form.parent());  //add wait message 

            cet_login_form.hide("slow"); // hide current form
            
            setTimeout(function()
                    {              // exec current event in 4 seconds
                        e.currentTarget.submit();
                        $("#login_cet").modal("hide");  //hide modal
                    },4000);
                               // original URL         
            // url = "http://moodle.rednovaconsultants.com/login/index.php"; //http://moodle.rednovaconsultants.com/login/index.php
            // data = cet_login_form.serializeArray();//data form 
            // method = "POST";//request method
// 
            // rq_cetlogin = sendAjaxRequest(url, data, method);// ajax request
// 
            // $.when(rq_cetlogin).done(function(response) // this is executed when the server response
            // {
//                     
                // // response = $.parseJSON(response);    // convert server response to JSON  
// 
                // if(response.status == 1) // check success status
                // {
                    // setTimeout(function()
                    // {              // exec current event in 4 seconds
                        // e.currentTarget.submit();
                        // $("#login_cet").modal("hide");  //hide modal
                    // },4000); 
                // }
                // else if(response.status == 0) // check error status
                // {
                    // setTimeout(function()
                    // {  // show error message in 4 seconds
                        // $(".wait_message").remove();// remove wait message
                        // addErrorMessage(cet_login_form.parent(), response.msg); // show error message
                        // cet_login_form.show('slow');   // show current form again                     
                    // },4000);
                // }
// 
            // });

        }
    });

    $("#form_myresults_dtes").submit(function(e){

        e.preventDefault();//stop event

        $(".error_message").remove();   //remove error message         

        if(!v_myresults_dtes.numberOfInvalids()) // inputs validation
        {            
            var rq_dtesresults = $.Deferred(); //promise variable
            var dtes_results_form = $(this);//current form

            addWaitMessage(dtes_results_form.parent()); //add wait message 

            dtes_results_form.hide("slow");// hide current form
                                    // original URL
            url = 'http://dtes.rednovaconsultants.com/en/dtes/results/login_ajax.php';
            data = dtes_results_form.serializeArray(); // data form
            method = "POST";//request method

            rq_dtesresults = sendAjaxRequest(url, data, method);// ajax request

            $.when(rq_dtesresults)
            .done(function(response){ // this is executed when the server response            
                // response = $.parseJSON(response);

                if(response.status == 1)// check success status
                {
                    setTimeout(function()
                    {              // exec current event in 4 seconds
                        e.currentTarget.submit();
                        $("#myresults_dtes").modal("hide");  //hide modal
                    },4000); 
                }   
                else if(response.status == 0)  // check error status
                {
                    if(lang == 'en')
                        response.msg = 'Verify your CURP and Folio number';
                    setTimeout(function()
                    {  // show error message in 4 seconds
                        $(".wait_message").remove();// remove wait message
                        addErrorMessage(dtes_results_form.parent(), response.msg); // show error message
                        dtes_results_form.show('slow');   // show current form again                     
                    },4000);
                }

            });
        }    
    });
    
    
    $("#refreshCaptcha").click(function(e){
    	url = '/website/refresh-captcha';
    	method = 'GET';
    	
    	var rq_refreshCaptcha = $.Deferred();    	   	    	
    	    	
	    	rq_refreshCaptcha = sendAjaxRequest(url,{},method);
	    	if(count_captcha_refresh < 3)
	    	$.when(rq_refreshCaptcha)
	    	.done(function(response){	    		
	    		$("#img_captcha").attr('src',response.captcha);
	    		count_captcha_refresh = count_captcha_refresh + 1;
	    		if(count_captcha_refresh == 2)
	    			$("#refreshCaptcha").remove();		
	    	})
	    	.fail(function(error){
	    		console.log(error);
	    	});	    
    	
    	
    });

    height = $("#login .account-actions").height();
    $(".activate").parent().css("height",(height) + "px");
    $(".activate > h1").css({"position":"absolute", "vertical-align":"middle","bottom":"30%"});
    

    $("#invoice").click(function(evento) {
        if ($("#invoice").is(":checked")){
            $("#facturacion").css("display", "block");
            $("#facturacion input").addClass("required");
            $("#rfc").addClass("equal-13");
        }
        else{
            $("#facturacion").css("display", "none");
            $("#facturacion input").attr("class","");
            $("#facturacion label.error").hide();
        }
    }); 

    $("#login_opt").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        v_login_opt.resetForm();
        $("#form_login_opt").show();
    });  

    $("#myresults_opt").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        v_myresults_opt.resetForm();
        $("#form_myresults_opt").show();
    });
    $("#payment_notification").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        $(".success_msg").remove();
        $("#form_payment_notification").show("slow");
        $("#facturacion").css("display", "none");
        // v_payment_notification.resetForm();
    });

    $("#login_cec").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        v_login_cec.resetForm();
        $("#form_login_cec").show();
    }); 

    $("#login_cet").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        v_login_cet.resetForm();
        $("#form_login_cet").show();
    });

    $("#myresults_dtes").on("hide.bs.modal", function(e){
        $(".added_button").remove();
        $(".error_message").remove();
        $(".wait_message").remove();
        v_myresults_dtes.resetForm();
        $("#form_myresults_dtes").show();
    });

    function sendAjaxRequest(url, data, method){
        
           return $.ajax({
                dataType: 'json',
                url: url,
                data: data,
                method: method,
            }).done(function(data){
                return data;
            });
    }
    
    function addErrorMessage(htmlElement, msg)
    {
        htmlElement.prepend('<div class="error_message"><p class="red-text">'+ msg +'</p></div>');
    }

    function addWaitMessage(htmlElement)
    {
    	if(lang == 'en')
    		text_wait = 'Wait a moment';
    	else if(lang == 'es')
    		text_wait = 'Espere un momento';
    	
        htmlElement.prepend('<div class="wait_message"><p>'+text_wait+'</p></div>');
    }

    function addSuccessMessage(htmlElement, msg)
    {
        htmlElement.append('<div class="success_msg"><p class="blue-text">' + msg + '</p></div>')
    }
    
    function addButtonCloseModal(htmlElement)
    {
    	if(lang == 'en')
    		text_button = 'Close';
    	else if(lang == 'es')
    		text_button = 'Cerrar';
    		
        htmlElement.append('<br><label class="added_button"><input type="button" class="cancel" data-dismiss="modal" value="'+text_button+'"></label>');
    }            

});