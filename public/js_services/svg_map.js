    var prevActiveRegion = "";	
	
    $(document).ready(function () {      
		
		var deferred = $.Deferred();
		var data = {};
		var labels = {};
		var lang = $("#lang").val();
		
		$("#authorized-center").hide();
		
		url = '/' + lang + '/website/authorized-centers';		
		method = 'GET';
		
		deferred = sendAjaxRequest(url, null, method);
		
		$.when(deferred)
		.done(function(response){
			
			labels = response.labels;
			
			$.each(response.states, function(index, value){
				$("svg path").each(function(){					
					if($(this).attr("class") === value.nickname){						
						data[$(this).attr("class")] = value.authorized_center;
						$(this).attr('data-status','active');
						$(this).attr("fill", "#999");						
					}
					$("#authorized-center").show('slow');
				});
			});
		})
		.fail(function(error){
			$("#authorized-center").hide();
		});
	
      $("path").attr("fill", "#dddddd");
      $("#information").hide("slow");
      _initActiveMapColor();

        $("svg path").hover(function () {          
            // console.log($(this).attr('class'));

            var className = $(this).attr('class');

            var colorCode = "#999999";            
        
            var buttonpanel = className;  

            
        });

        //_-----------------------------------------------------------------------------------------------------------------------

        $("svg path").click(function () {        	        	

            $("#information").hide();
                        
            $("body").scrollTop($("#authorized-center").offset().top - 100);

            var className = $(this).attr('class');
            var colorCode = "#d2040e";          
            var active = $(this).attr('data-status');

            if(active == 'active')
            {
                $("#information").empty;   

                items = data[className];            

                $("#information").html(htmlInformationContent(items, className));
                $("#information").show("slow");

                prevActiveRegion = className;
                _resetMapColor(1);
                $("path." + className).attr("fill", colorCode);
                $("path." + className).attr("clicked", "true");
            }
            else
                _resetMapColor(1);
        });
        
        function _regionNameClickResetMapColor()
	    {
	        $("path").attr("fill", "#dddddd");
	    }
	
	    function _resetMapColor(isAll) {
	
	        $("path").each(function () {
	            var className = $(this).attr('class');
	            var active = $(this).attr('data-status');
	            if (className != prevActiveRegion && active != "active") {
	                $(this).attr("fill", "#dddddd");
	            }
	            if( active == "active")
	                $(this).attr("fill", "#999");
	        });
	        return;
	        //$("path").attr("fill", "#565656");
	    }
	
	    function _initActiveMapColor() {
	        $("path").each(function () {
	            var className = $(this).attr('data-status');
	            // console.log(className)
	            if (className == 'active') {
	                $(this).attr("fill", "#999");
	            }
	        });        
	    }
	
	    function _buttonPanelHighlighted(regionId, color) {
	        $(regionId).css("color", color);
	    }
	
	    function htmlInformationContent(items, className)
	    {                    	
	        html = '<h3 class="blue-text">'+className.replace(/_/gi, " ")+'</h3>'
	                + '<div>'
	                    +'<p class="text-center">' + labels.city + '</p>'
	                    +'<p class="text-center">' + labels.centre + '</p>'
	                    +'<p class="text-center">' + labels.address + '</p>'
	                    +'<p class="text-center">' + labels.contact + '</p>'
	                    +'<p class="text-center">' + labels.phone + '</p>'
	                    +'<p class="text-center">' + labels.email + '</p>'
	                +'</div>';
	
	        $.each(items, function(key, value){
	            html = html + '<div >'
	                    +'<label class="mobile-l">' + labels.city + '</label><p>'+ value.city.name +'</p>'
	                    +'<label class="mobile-l">' + labels.centre + '</label><p>'+ value.school +'</p>'
	                    +'<label class="mobile-l">' + labels.address + '</label><p>'+ value.address +'</p>'
	                    +'<label class="mobile-l">' + labels.contact + '</label><p>'+ value.contact +'</p>'
	                    +'<label class="mobile-l">' + labels.phone + '</label><p>'+ value.phone +'</p>'
	                    +'<label class="mobile-l">' + labels.email + '</label><p>'+ value.email +'</p>'
	                   +'</div>';
	        });
	        return html;
	    }
	
	    function getDataElement(key)
	    {
	        
	        return data[key];
	    }
		
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
        
    });
     
