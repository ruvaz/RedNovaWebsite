@extends('layouts/master')

@section('title','Examenes')

@section('content')
<section class="banner-hld wrapper static-img clearfix">
	<img src="../images/slider/dtes.jpg" id="ctl00_mainC_HeaderBanner_imgB">		   
    <div class="carousel-caption">
        <div class="wrapper" style="display: block; margin-top: 180px;">
            <div class="inner-hld">
                <!-- <h1 id="ctl00_mainC_HeaderBanner_headerTitle">{{trans('messages.menu.exams')}}</h1> -->
                <div class="macCaption">
                	<table width="100%" border="0">
                		<tbody>
                			<tr>
                				<td valign="middle">
                					{{trans('messages.exams.home_description')}}
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
							<div class="auth-txt red"><h2>{{trans('messages.menu.exams')}}</h2></div>
						</div>
            			<div id="dvImg1" class="prodimg dtes">
                    		<a id="toggleImg1" href="/{{App::getLocale()}}/dtes" class="clicktoopen" target="_blank">
                        		<span class="default-color"></span>
                         		<img src="../images/examenes/674X774_DTES_alpha.png" alt="Access Course" class="bkg-gray">
                         		<i></i>
                    		</a>
           				</div>
	                    <div id="dvImg3" class="prodimg opt">
                            <a id="toggleImg3" href="/{{App::getLocale()}}/opt" class="clicktoopen" target="_blank">
	                            <span class="default-color"></span>
	                            <img src="../images/examenes/674X774_OPT_alpha.png" alt="Language Development Course" class="bkg-gray">
	                            <i></i>
                            </a>
	                   	</div>
        			</section>
    			</div>
			</section>
		</div>
	</div>	
</section>
@endsection