@extends('layouts/master')

@section('title','Otros Servicios')

@section('content')
<section class="banner-hld wrapper static-img clearfix">
	<img src="{{asset('images/slider/other_services.jpg')}}" id="ctl00_mainC_HeaderBanner_imgB">		   
    <div class="carousel-caption">
        <div class="wrapper" style="display: block; margin-top: 180px;">
            <div class="inner-hld">
                <!-- <h1 id="ctl00_mainC_HeaderBanner_headerTitle">{{trans('messages.menu.other_services')}}</h1> -->
                <div class="macCaption">		                    
                	<table width="100%" border="0">
                		<tbody>
                			<tr>
                				<td valign="middle">
                					{{ trans('messages.other_services.home_description') }}
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
							<div class="auth-txt red"><h2>{{ trans('messages.menu.other_services') }}</h2></div>
						</div>                    			                    			
	                    <div id="dvImg1" class="prodimg access">
                    		<a id="toggleImg1" href="javascript:_ShowDetails('dvImg1');" class="clicktoopen">
                        		<span class="default-color"></span>
                         		<img src="{{asset('images/cursos/674X774_AC_alpha.png')}}" alt="Access Course" class="bkg-gray">
                         		<i></i>
                    		</a>
                    		<div id="DIV_toggleImg1" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>
	                        	<div id="dvInnerDetails" class="culture-gallery-detail clearfix">
	                            	<div class="row">
	                                	<div class="col-12">
	                                		<h3 class="sky-link">{{ trans('messages.introduction') }}</h3>						                                        
	                                        <p>
	                                        	{!! trans('messages.other_services.access_course.paragraph_1') !!}
	                                        	<br style="FONT-SIZE: 13px; FONT-VARIANT: normal; WHITE-SPACE: pre-wrap; TEXT-TRANSFORM: none; WORD-SPACING: 0px; FONT-WEIGHT: normal; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: left; WIDOWS: 1; LETTER-SPACING: normal; LINE-HEIGHT: normal; -webkit-text-stroke-width: 0px">
	                                        	<br style="FONT-SIZE: 13px; FONT-VARIANT: normal; WHITE-SPACE: pre-wrap; TEXT-TRANSFORM: none; WORD-SPACING: 0px; FONT-WEIGHT: normal; COLOR: rgb(0,0,0); FONT-STYLE: normal; TEXT-ALIGN: left; WIDOWS: 1; LETTER-SPACING: normal; LINE-HEIGHT: normal; -webkit-text-stroke-width: 0px">
	                                        	{{ trans('messages.other_services.access_course.paragraph_2') }}
	                                        </p>
	                                        <h3 class="sky-link">{{ trans_choice('messages.modules',2) }}</h3>
	                                        <p>
	                                        	{{ trans('messages.other_services.access_course.modules_description') }}
	                                        </p>
	                                		<div class="col-7">	                                	
		                                    	<strong>{{ trans_choice('messages.modules',1) }} 1: {{ trans('messages.other_services.access_course.module_1_title') }}</strong>						                                        
		                                        <p class="pl-small">
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_1_topics.t1') }}
		                                        		</div>
		                                        	</div>
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_1_topics.t2') }}
		                                        		</div>
		                                        	</div>
		                                        </p>
		                                        <strong>{{ trans_choice('messages.modules',1) }} 2: {{ trans('messages.other_services.access_course.module_2_title') }}</strong>
		                                        <p class="pl-small">
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_2_topics.t1') }}
		                                        		</div>
		                                        	</div>		                                        	
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_2_topics.t2') }}
		                                        		</div>
		                                        	</div>
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_2_topics.t3') }}
		                                        		</div>
		                                        	</div>
		                                        </p>
		                                        <strong>{{ trans_choice('messages.modules',1) }} 3: {{ trans('messages.other_services.access_course.module_3_title') }}</strong>
		                                        <p class="pl-small">
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>		                                        			
	                                        			</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_3_topics.t1') }}
		                                        		</div>
		                                        	</div>
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_3_topics.t2') }}
		                                        		</div>
		                                        	</div>
		                                        	<div class="list-item">
		                                        		<div>
		                                        			<i class="fa fa-check-square" aria-hidden="true"></i>
		                                        		</div>
		                                        		<div>
		                                        			{{ trans('messages.other_services.access_course.module_3_topics.t3') }}
		                                        		</div>
		                                        	</div>
		                                        </p>
	                                        </div>
	                                        <div class="col-5" style="margin-top: 10%">	                                        	
												<span class="darkOverlay"></span>
												<figure class="curve-bottom-right">
													<img src="{{asset('images/small_images/access.jpg')}}">
												</figure>																									
	                                        </div>
	                                        <div style="clear:both"></div>
	                                    </div>						                                    
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.other_services.access_course.admision_profile') }}</h3>
	                                    	<p>
	                                    		{{ trans('messages.other_services.access_course.admision_profile_description') }}
	                                    	</p>
	                                    	<strong>{{ trans('messages.other_services.access_course.admision_profile_p1') }}</strong>
	                                    	<div class="col-12">
		                                    	<p class="pl-small">						                                    								
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>	
		                                    			</div>
		                                    			<div>
		                                    				{!! trans('messages.other_services.access_course.admision_profile_requirements.r1_1') !!} 
		                                    				(<a href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#cenni" target="_blank" title="Certificación Nacional de Nivel de Idioma">CENNI</a>) 
		                                    				{!! trans('messages.other_services.access_course.admision_profile_requirements.r1_2') !!} 
		                                    			 	B1
		                                    			</div>	                                    			  				
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>	                                    				  
		                                    				{{ trans('messages.other_services.access_course.admision_profile_requirements.r2') }}
		                                    			</div>	
		                                    		</div>	                                    		
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.access_course.admision_profile_requirements.r3') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.access_course.admision_profile_requirements.r4') }}
		                                    			</div>
		                                    		</div>	                                    		
		                                    	</p>
		                                    </div>
	                                    </div>
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.other_services.access_course.graduate_profile') }}</h3>
	                                    	<p>
	                                    		{{ trans('messages.other_services.access_course.graduate_profile_p1') }}						                                    		
	                                    	</p>
	                                    	<p>
	                                    		{!! trans('messages.other_services.access_course.graduate_profile_p2') !!}
	                                    	</p>
	                                    </div>	                                    
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.results') }}</h3>
	                                    	<p>
	                                    		{{ trans('messages.other_services.access_course.results_p1') }}
	                                    	</p>
	                                    		{!! trans('messages.other_services.access_course.results_p2') !!}
	                                    	</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>                             		                           
           				</div>
	                   	<div id="dvImg2" class="prodimg mpo">
                            <a id="toggleImg2" href="javascript:_ShowDetails('dvImg2');" class="clicktoopen">
                            	<span class="default-color"></span>
                            	<img src="{{asset('images/examenes/674X774_MPO_alpha.png')}}" alt="Certificate for English Teachers"  class="bkg-gray">
                            	<i></i>
                            </a>
                            <div id="DIV_toggleImg2" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>
	                        	<div id="dvInnerDetails" class="culture-gallery-detail clearfix">
	                            	<div class="row">
	                                	<div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.introduction') }}</h3>						                                        
	                                        <p>
	                                        	<p>
	                                        		{!! trans('messages.other_services.mpo.mpo_description_t1') !!}
	                                        	</p>
	                                        	<p>
													{!! trans('messages.other_services.mpo.mpo_description_t1_1') !!}
													<a href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#cenni" target="_blank">{!! trans('messages.cenni') !!}</a>
													{{ trans('messages.and') }} 
													<a title="Marco Común Europeo de Referencia Lingüística">{!! trans('messages.mcer') !!}</a>
													{{ trans('messages.other_services.mpo.mpo_description_t2') }}						                                        																				
												</p>
												<p>
													{{ trans('messages.other_services.mpo.mpo_description_t3') }}		
												</p>						                                        	
	                                       	</p>						                                       	
	                                    </div>	
	                                    <div class="col-12">
	                                    	<img src="{{asset('images/cuadro-mpo.png')}}" alt="DTES Practice Online">
	                                    </div>
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.other_services.mpo.minimum_requirement') }}</h3>
	                                    	<p>
	                                    		{{ trans('messages.other_services.mpo.minimum_requirement_description') }}
	                                    	</p>
	                                    	<p class="pl-small">
	                                    		<div class="col-12">
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r1') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r2') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r3') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r4') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r5') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r6') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r7') }}
		                                    			</div>
		                                    		</div>
		                                    		<div class="list-item">
		                                    			<div>
		                                    				<i class="fa fa-check-square" aria-hidden="true"></i>
		                                    			</div>
		                                    			<div>
		                                    				{{ trans('messages.other_services.mpo.mpo_requirements.r8') }}
		                                    			</div>
		                                    		</div>
	                                    		</div>
	                                    	</p>
	                                    </div>
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{ trans('messages.buy') }}</h3>
	                                    	<p>	
												<a href="/{{App::getLocale()}}/{{trans('messages.dtes.practice_pack.buy_link_url')}}" class="btn" id="viewBasket" target="_blank">
												{{ trans('messages.other_services.mpo.mpo_buy_link') }}</a> {{ trans('messages.other_services.mpo.mpo_buy_text') }}
											</p>
	                                    </div>
	                                    <div class="col-12">
											<h3 class="sky-link">
												{{ trans('messages.other_services.mpo.mpo_link_dealers') }}
											</h3>																					
											<p>
												{!! trans('messages.other_services.mpo.mpo_more_info_1') !!} 
												<a href="mailto:elt@grupomacmillan.com" class="maclink">{{trans('messages.other_services.mpo.contact_us')}}</a>
												{{ trans('messages.other_services.mpo.mpo_more_info_2') }} 
											</p>	                                    	
	                                    </div>
	                                    <div class="col-12">
	                                    	<h3 class="sky-link">{{trans('messages.access')}}</h3>
	                                    	<p>
												{!! trans('messages.other_services.mpo.access_description') !!} 
												<a href="http://www.macmillanpracticeonline.com" target="_blank">www.macmillanpracticeonline.com</a>																	
											</p>											
	                                    </div>
	                                </div>
	                            </div>    
	                        </div> 
	                    </div>
	                    <div id="dvImg3" class="prodimg language">			                        
                            <a id="toggleImg3" href="javascript:_ShowDetails('dvImg3');" class="clicktoopen">
	                            <span class="default-color"></span>
	                            <img src="{{asset('images/cursos/674X774_LDC_alpha.png')}}" alt="Language Development Course" class="bkg-gray">
	                            <i></i>
                            </a>
                            <div id="DIV_toggleImg3" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>
	                        	<div id="dvInnerDetails" class="culture-gallery-detail clearfix">
	                            	<div class="row">
                                		<div class="col-12">
                                			<div class="col-7">
	                                    		<h3 class="sky-link">{{ trans('messages.introduction') }}</h3>
	                                        <!-- <strong>ELT Author</strong> -->	                                        
		                                        <p>
													{!! trans('messages.other_services.language_dev.ld_paragraph1_1') !!} 
													<a>{{ trans('messages.mcer') }}</a>, 
													{{ trans('messages.other_services.language_dev.ld_paragraph1_2') }}
													<br> <br>
													{{ trans('messages.other_services.language_dev.ld_paragraph2') }} 
												</p>
												<h3 class="sky-link">{{ trans('messages.content') }}</h3>	
												<p>
													{{trans('messages.other_services.language_dev.content_paragraph_1')}}
												</p>
												<p>
													{{trans('messages.other_services.language_dev.content_paragraph_2')}}
												</p>
											</div>
	                                        <div class="col-5" style="margin-top: 5%">	                                        	
												<span class="darkOverlay"></span>
												<figure class="curve-bottom-right">
													<img src="{{asset('images/small_images/language_development.jpg')}}">
												</figure>																									
	                                        </div>
	                                        <div style="clear:both"></div>																					
	                                    </div>	
	                                    <div class="col-12">
	                                    	<div class="col-7">
		                                    	<h3 class="sky-link">{{trans('messages.virtual_environment')}}</h3>
		                                    	<p>
		                                    		{{trans('messages.other_services.language_dev.virtual_environment_paragraph_1')}}
		                                    	</p>
		                                    	<p>
		                                    		{{trans('messages.other_services.language_dev.virtual_environment_paragraph_2')}}
		                                    	</p>
		                                    	<p>
		                                    		{{trans('messages.other_services.language_dev.virtual_environment_paragraph_3')}}
		                                    	</p>
		                                    </div>
	                                    </div>	
	                                    <!-- <div class="col-12">
	                                    	<h3 class="sky-link">{{trans('messages.course_outline')}}</h3>
	                                    	<p>
												{{trans('messages.other_services.language_dev.course_outline_description')}}
	                                    	</p>
	                                    	
	                                    	<ul class="course-table border">
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.level')}}:</span>
	                                    			<span>1</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans_choice('messages.modules',2)}}:</span>
	                                    			<span>a, b</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.access_course.graduate_profile')}}:</span>
	                                    			<span>A1</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}:</span>
	                                    			<span>
	                                    				<ul>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}	
	                                    						</span>	 
	                                    						<span>60</span>                                   						
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
	                                    						</span>
	                                    						<span>120</span>
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.total')}}
	                                    						</span>
	                                    						<span>180</span>
	                                    					</li>
	                                    				</ul>
	                                    			</span>
	                                    		</li>
	                                    	</ul>
	                                    	<ul class="course-table border">
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.level')}}:</span>
	                                    			<span>2</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans_choice('messages.modules',2)}}:</span>
	                                    			<span>c, d</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.access_course.graduate_profile')}}:</span>
	                                    			<span>A2</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}:</span>
	                                    			<span>
	                                    				<ul>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}	
	                                    						</span>	 
	                                    						<span>60</span>                                   						
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
	                                    						</span>
	                                    						<span>120</span>
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.total')}}
	                                    						</span>
	                                    						<span>180</span>
	                                    					</li>
	                                    				</ul>
	                                    			</span>
	                                    		</li>
	                                    	</ul>
	                                    	<ul class="course-table border">
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.level')}}:</span>
	                                    			<span>3</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans_choice('messages.modules',2)}}:</span>
	                                    			<span>e, f</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.access_course.graduate_profile')}}:</span>
	                                    			<span>B1</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}:</span>
	                                    			<span>
	                                    				<ul>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}	
	                                    						</span>	 
	                                    						<span>60</span>                                   						
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
	                                    						</span>
	                                    						<span>120</span>
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.total')}}
	                                    						</span>
	                                    						<span>180</span>
	                                    					</li>
	                                    				</ul>
	                                    			</span>
	                                    		</li>
	                                    	</ul>
	                                    	<ul class="course-table border">
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.level')}}:</span>
	                                    			<span>4</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans_choice('messages.modules',2)}}:</span>
	                                    			<span>g, h, i, j</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.access_course.graduate_profile')}}:</span>
	                                    			<span>B2</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}:</span>
	                                    			<span>
	                                    				<ul>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}	
	                                    						</span>	 
	                                    						<span>120</span>                                   						
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
	                                    						</span>
	                                    						<span>240</span>
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.total')}}
	                                    						</span>
	                                    						<span>360</span>
	                                    					</li>
	                                    				</ul>
	                                    			</span>
	                                    		</li>
	                                    	</ul>
	                                    	<ul class="course-table border">
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.level')}}:</span>
	                                    			<span>5</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans_choice('messages.modules',2)}}:</span>
	                                    			<span>k, l, m</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.access_course.graduate_profile')}}:</span>
	                                    			<span>C1</span>
	                                    		</li>
	                                    		<li>
	                                    			<span>{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}:</span>
	                                    			<span>
	                                    				<ul>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}	
	                                    						</span>	 
	                                    						<span>90</span>                                   						
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
	                                    						</span>
	                                    						<span>180</span>
	                                    					</li>
	                                    					<li>
	                                    						<span>
	                                    							{{trans('messages.other_services.language_dev.course_outline_table.total')}}
	                                    						</span>
	                                    						<span>360</span>
	                                    					</li>
	                                    				</ul>
	                                    			</span>
	                                    		</li>
	                                    	</ul>
	                                    	<table width="100%" class="basket desktop-course-table">
										        <thead class="table-head">
										          <tr>
										            <th rowspan="2" align="center" valign="middle">
										            	{{trans('messages.other_services.language_dev.course_outline_table.level')}}
										            </th>
										            <th rowspan="2" align="center" valign="middle">
										            	{{trans_choice('messages.modules',2)}}
										            </th>
										            <th rowspan="2" align="center" valign="middle">
										            	{{trans('messages.other_services.access_course.graduate_profile')}}
										            </th>
										            <th colspan="4" align="center" valign="middle">
										            	{{trans('messages.other_services.language_dev.course_outline_table.study_hours')}}
										            </th>
										          </tr>
										          <tr>
										            <th align="center" valign="middle">
										            	{{trans('messages.other_services.language_dev.course_outline_table.presencial')}}
										            </th>
										            <th align="center" valign="middle">
										            	{{trans('messages.other_services.language_dev.course_outline_table.virtual')}}
										            </th>
										            <th align="center" valign="middle">
										            	{{trans('messages.other_services.language_dev.course_outline_table.total')}}
										            </th>
										          </tr>
										        </thead>
										        <tbody>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">1</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">a</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4" class="qty">A1</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4" class="price"><p>60</p></td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4">120</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4" class="total">180</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">1</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">b</td>
										          </tr> 
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">2</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">c</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#DADADA" class="qty">A2</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#DADADA">60</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#DADADA">120</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#DADADA" class="total">180</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">2</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">d</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">3</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">e</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4" class="qty">B1</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4">60</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4">120</td>
										            <td rowspan="2" align="center" valign="middle" bgcolor="#f4f4f4" class="total">180</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">3</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">f</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">4</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">g</td>
										            <td rowspan="4" align="center" valign="middle" bgcolor="#DADADA" class="qty">B2</td>
										            <td rowspan="4" align="center" valign="middle" bgcolor="#DADADA">120</td>
										            <td rowspan="4" align="center" valign="middle" bgcolor="#DADADA">240</td>
										            <td rowspan="4" align="center" valign="middle" bgcolor="#DADADA" class="total">360</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">4</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">h</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">4</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">i</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="name">4</td>
										            <td align="center" valign="middle" bgcolor="#DADADA" class="weight">j</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">5</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">k</td>
										            <td rowspan="3" align="center" valign="middle" bgcolor="#f4f4f4" class="qty">C1</td>
										            <td rowspan="3" align="center" valign="middle" bgcolor="#f4f4f4">90</td>
										            <td rowspan="3" align="center" valign="middle" bgcolor="#f4f4f4">180</td>
										            <td rowspan="3" align="center" valign="middle" bgcolor="#f4f4f4" class="total">360</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">5</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">l</td>
										          </tr>
										          <tr>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="name">5</td>
										            <td align="center" valign="middle" bgcolor="#f4f4f4" class="weight">m</td>
										          </tr>
										        </tbody>
										    </table>
	                                    </div>	 -->			                                  
	                                    <div class="col-12">
	                                    	<div class="col-12">
		                                    	<h3 class="sky-link">{{trans('messages.results')}}</h3>
		                                    	<p>						                                    		
													{{trans('messages.other_services.language_dev.lg_results_paragraph1_1')}}
													<a>{{ trans('messages.mcer') }}</a> 
													{{trans('messages.other_services.language_dev.lg_results_paragraph1_2')}} 													
		                                    	</p>
		                                    </div>
	                                    </div>
	                                </div>						                            
	                            </div>
	                        </div>                                                    
	                   	</div>	                    
        			</section>
    			</div>
			</section>
		</div>
	</div>	
</section>

@endsection