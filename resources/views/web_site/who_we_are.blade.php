@extends('layouts/master')

@section('title','Quienes Somos')

@section('content')
<section class="commn-hld clearfix">
	<div class="wrapper">
		<div class="inner-hld">
			<h1 id="ctl00_mainC_titleH1" class="browerheadertitle">{{ trans('messages.who_we_are.title') }}</h1>
			<section class="left-col-inner">				
				<div class="careers-content content-editor">
					<div id="ctl00_mainC_contentBlock">
						<div class="big-curve"><img src="{{asset('images/rednova_team.jpg')}}" alt="OurStory_900x601" title="OurStory_900x601" align="middle"></div>
						<p>{{ trans('messages.who_we_are.paragraph_1') }}</p>
					    <p>{!! trans('messages.who_we_are.paragraph_2') !!}</p>
					    <p>{!! trans('messages.who_we_are.paragraph_3') !!}</p>
					</div>
				</div>
			</section>
		<aside class="right-col-inner">
		
		<ul class="quick-liks reltd-links">
			<div id="ctl00_mainC_relatedImage_cbloack">
				<li>
					<a href="/{{App::getLocale()}}/{{trans('messages.menu.professional_development_url')}}" target="_self">
						<span class="darkOverlay"></span>
						<figure class="curve-top-left">
							<img src="{{asset('images/small_images/cet.jpg')}}">
						</figure>
						<span type="button" class="btn-default orchid">
							<span>{{ trans('messages.menu.professional_development') }}</span>
							<i class="fa fa-arrow-right fr"></i>
						</span>
					</a>
				</li>
				<li>
					<a href="/{{App::getLocale()}}/{{trans('messages.menu.exams_url')}}">
						<span class="darkOverlay"></span>
						<figure class="curve-top-left">
							<img src="{{asset('images/small_images/dtes.jpg')}}">
						</figure>
						<span type="button" class="btn-default red">
							<span>{{ trans('messages.menu.exams') }}</span>
							<i class="fa fa-arrow-right fr"></i>
						</span>
					</a>
				</li>
			</div>
		</ul>
		
		</aside>
		</div>
	</div>
</section>
@endsection