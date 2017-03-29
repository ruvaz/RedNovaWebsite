@extends("layouts/master")

@section("title","Desarrollo Profesional")

@section("content")
<section class="banner-hld wrapper static-img clearfix">
	<img src="../images/slider/cet_2.jpg" id="ctl00_mainC_HeaderBanner_imgB">		   
    <div class="carousel-caption">
        <div class="wrapper" style="display: block; margin-top: 180px;">
            <div class="inner-hld">
                <!-- <h1 id="ctl00_mainC_HeaderBanner_headerTitle">{{trans('messages.menu.professional_development')}}</h1> -->
                <div class="macCaption">		                    
                	<table width="100%" border="0">
                		<tbody>
                			<tr>
                				<td valign="middle">
                					{{ trans('messages.professional_development.home_description') }} 
                				</td>
                			</tr>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="floting-fld clearfix">					
	<div class="wrapper">
		<div class="inner-hld">
			<section class="so-what-holder">
    			<div class="culture-gallery">
        			<section class="authors-block" id="sectionImg">
	                    <div id="ctl00_mainC_MMAuthorList_contentB">
							<div class="auth-txt red">
								<h2>
								{{ trans('messages.menu.professional_development') }}
								</h2>
							</div>
						</div>                    
	                    <div id="dvImg2" class="prodimg cet">			                        	
                            <a id="toggleImg2" href="/{{App::getLocale()}}/cet" class="clicktoopen" target="_blank">
                            	<span class="default-color"></span>
                            	<img src="../images/cursos/674X774_CET_alpha.png" alt="Certificate for English Teachers" class="bkg-gray">
                            	<i></i>
                            </a>
	                    </div>
	                    <div id="dvImg4" class="prodimg cec">                        
		                    <a id="toggleImg4" href="/{{App::getLocale()}}/cec" class="clicktoopen" target="_blank">
			                    <span class="default-color"></span>
			                    <img src="../images/cursos/674X774_CEC_alpha.png" alt="Certificate for English Coordinators" class="bkg-gray">
			                    <i></i>
		                    </a>                                                      
	                   	</div>                                                                                                                                                             
        			</section>
    			</div>
			</section>
		</div>
	</div>
	<script type="text/javascript">
	    $(window).load(function () {
	      
	            var h = $('.prodimg img').outerHeight();
	            $('.prodimg').css('height', h + 1);          
	            $('.auth-txt').css('height', h + 1);
	       
	    });
	
	    $(window).resize(function () {
	
	        var h = $('.prodimg img').outerHeight();
	            $('.prodimg').css('height', h + 1);
	            $('.auth-txt').css('height', h + 1);
	       
	    });
	
	</script>
</section>
@endsection
