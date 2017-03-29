
@extends('layouts/master')

@section('title', 'HOME')

@section('content')
<section class="banner-hld wrapper"> 
	<div class="flexslider">
		<div class="flex-viewport" style="overflow: hidden;">
			<ul class="slides">
				<li class="flex-active-slide clone">
                  <a href="/{{App::getLocale()}}/opt" target="_blank">
					<img src="/images/slider/opt.jpg" draggable="false">
					<div class="carousel-caption">
						<div class="heroCaption">
							<h1 style="">OPT</h1>
							<div class="macCaption clearfix">
								<table width="100%" border="0">
									<tbody>
										<tr>
											<td valign="middle">
												{!! trans('messages.home.slider_opt_description') !!}
											</td>
										</tr>
									</tbody>
								</table>
								<span class="capArrow"><i class="fa fa-arrow-right"></i></span>
							</div>
						</div>
					</div>
                      </a>
				</li>         
				<li>
                  <a href="/{{App::getLocale()}}/dtes" target="_blank">
					<img src="/images/slider/dtes.jpg" draggable="false">
					<div class="carousel-caption">
						<div class="heroCaption">
							<h1 style="">DTES</h1>
							<div class="macCaption clearfix">
								<table width="100%" border="0">
									<tbody>
										<tr>
											<td valign="middle">
												{!! trans('messages.home.slider_dtes_description') !!}
											</td>
										</tr>
									</tbody>
								</table>
								<span class="capArrow"><i class="fa fa-arrow-right"></i></span>
							</div>
						</div>
					</div>
                      </a>
				</li> 
				<li>
                  <a href="/{{App::getLocale()}}/cet" target="_blank">
					<img src="/images/slider/cet.jpg" draggable="false">
					<div class="carousel-caption">
						<div class="heroCaption">
							<h1 style="">{{trans('messages.home.slider_cet_title')}}</h1>
							<div class="macCaption clearfix">
								<table width="100%" border="0">
									<tbody>
										<tr>
											<td valign="middle">
												{!! trans('messages.home.slider_cet_description') !!}
											</td>
										</tr>
									</tbody>
								</table>
								<span class="capArrow"><i class="fa fa-arrow-right"></i></span>
							</div>
						</div>
					</div>
                  </a>
				</li>				     					
			</ul>
		</div>
	</div>
</section>
<div id="ctl00_mainC_MM3Banner_contentB1">
	<section class="wrapper we-do-hld clearfix home-what-we-do">
		<div class="inner-hld clearfix">
			<div class="row clearfix">
				<div class="col-4">
					<div class="home-what-we">
						<h2>{{trans('messages.home.what_we_do_title')}}</h2>
						<p>							
							{{trans('messages.home.what_we_do_p1')}}
						</p>
						<p>
							{!! trans('messages.home.what_we_do_p2') !!}
						</p>
					</div>
				</div>
				<div class="col-8">
					<ul class="quick-liks media-link">
						<li>
							<a href="/{{App::getLocale()}}/{{trans('messages.menu.professional_development_url')}}">
								<span class="darkOverlay"></span>
								<figure class="curve-top-left">
									<img src="/images/small_images/cet.jpg" alt="Professional Development">
								</figure>
								<span type="button" class="btn-default orchid">
									<span>{{trans('messages.menu.professional_development')}}</span>
									<i class="fa fa-arrow-right fr"></i>
								</span>
							</a>
						</li>
						<li>
							<a href="/{{App::getLocale()}}/{{trans('messages.menu.exams_url')}}">
								<span class="darkOverlay"></span>
								<figure class="curve-top-left">
									<img src="/images/small_images/dtes.jpg" alt="Exams">
								</figure>
								<span type="button" class="btn-default red">
									<span>{{trans('messages.menu.exams')}}</span>
									<i class="fa fa-arrow-right fr"></i>
								</span>
							</a>
						</li>
						<li>
							<a href="/{{App::getLocale()}}/{{trans('messages.menu.other_services_url')}}">
								<span class="darkOverlay"></span>													
								<figure class="curve-top-left">
									<img src="/images/small_images/other_services.jpg" alt="Other Services">
								</figure>
								<span type="button" class="btn-default sky">
									<span>{{trans('messages.menu.other_services')}}</span>
									<i class="fa fa-arrow-right fr"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="alt-row">
		<section class="sectionAuthor wrapper awards-hld clearfix">
			<div class="inner-hld clearfix">
				<h2 id="ctl00_mainC_ucImageBannerWithLinks_titleTXT">{{trans('messages.social.home_title')}}</h2>
				<div class="col-12">
					<ul class="quick-liks media-link" id="social-section">
						<li  id="ctl00_mainC_ucImageBannerWithLinks_rendereArea">
							<a href="https://www.facebook.com/RedNovaConsultants" target="_blank">
								<span class="darkOverlay"></span>													
								<figure class="curve-top-left">
									<img src="/images/small_images/v5.jpg" style="min-height: 150px" alt="Professional Development">
								</figure>
								<span type="button" class="btn-default sapphire">
									<span>{{trans('messages.social.follow_facebook')}}</span>
									<i class="fa fa-arrow-right fr"></i>
								</span>
							</a>
						</li>					
						<li id="social-container">
							<a class="twitter-timeline" id="twitter-widgets" href="https://twitter.com/RedNovaMexico" data-widget-id="277084325579718656"  width="100%" height="">{{trans('messages.social.twitter_title')}}</a>
							<script>
								! function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
									if (!d.getElementById(id)) {
										js = d.createElement(s);
										js.id = id;
										js.src = p + "://platform.twitter.com/widgets.js";
										fjs.parentNode.insertBefore(js, fjs);
									}
								}(document, "script", "twitter-wjs");
							</script>
						</li>
					</ul>
				</div>
			</div>	
		</section>	
	</section>
</div>		
<script type="text/javascript">
	$(function(){
		$("#twitter-widget-0").on('load',function(){
			$(this).show();
		});
	});
	$(document).ready(function(){
		var height = $("#ctl00_mainC_ucImageBannerWithLinks_rendereArea").height();							
		$("#twitter-widgets").attr("height", height + "px");																
	});
	$(window).resize(function(){
		var height = $("#ctl00_mainC_ucImageBannerWithLinks_rendereArea").height();							
		$("#social-container iframe").css("height", height + "px");
		$("#social-container").css("height", height + "px");
	});
</script>
@endsection