@extends('layouts/master')

@section('title','Glosario')

@section('content')
<section class="commn-hld faq-hld clearfix">			
	<div class="wrapper">
		<div class="inner-hld">
			<h1 id="ctl00_mainC_faqtitle" class="faqtitleForJs" style="text-transform:none">{{trans('messages.glosary.title')}}</h1>					
			<section class="left-col-inner">
				<div class="faq-list">			
					<div class="list red-link">
						<a name="ceneval"></a>
						<article id="ceneval">
							<h3>CENEVAL</h3>
							<p class="long">
								{{trans('messages.glosary.ceneval')}}
							</p>
						</article>
					</div>
					<div class="list red-link">
						<a name="cenni"></a>
						<article id="cenni">
							<h3><a href="http://www.cenni.sep.gob.mx/" target="_blank" ><span style="color: #ee3e33;">CENNI</span></a></h3>
							<!-- <p class="long">
								{{trans('messages.glosary.cenii_paragraph1')}}
							</p> -->
							<p class="long"> 
								{!! trans('messages.glosary.cenii_paragraph2') !!}
							</p>
							<p class="long">
								{!! trans('messages.glosary.cenii_paragraph3') !!}
							</p>
							<p class="long">
								&nbsp;&nbsp;&nbsp;&nbsp;I. {{trans('messages.glosary.cenii_skill1')}}
							</p>
							<p class="long">
								&nbsp;&nbsp;&nbsp;&nbsp;II. {{trans('messages.glosary.cenii_skill2')}}
							</p>
							<p class="long">
								&nbsp;&nbsp;&nbsp;&nbsp;III. {{trans('messages.glosary.cenii_skill3')}}
							</p>
						</article>
					</div>
					<div class="list red-link">
						<a name="clb"></a>
						<article id="clb">
							<h3><a href="http://www.language.ca" target="_blank"><span style="color: #ee3e33;">CLB</span></a></h3>												
							<p class="long">
								{!! trans('messages.glosary.clb') !!}
							</p>
						</article>
					</div>
					<div class="list red-link">
						<a name="copei"></a>
						<article id="copei">
							<h3><a href="http://www.copeimexico.org/" target="_blank"><span style="color: #ee3e33;">COPEI</span></a></h3>												
							<p class="long">
								{{trans('messages.glosary.copei')}}
							</p>
						</article>
					</div>
					<div class="list red-link">
						<a name="dgair"></a>
						<article id="dgair">
							<h3><a href="http://www.sep.gob.mx/wb/sep1/sep1_Direccion_General_de_Acreditacion#" target="_blank"><span style="color: #ee3e33;">DGAIR</span></a></h3>												
							<p class="long">
								{{trans('messages.glosary.dgair')}}
							</p>
						</article>
					</div>
					<div class="red-link">
						<a name="mcer"></a>
						<article id="mcer">
							<h3><a href="http://www.coe.int/t/dg4/linguistic/cadre1_en.asp" target="_blank"><span style="color: #ee3e33;">MCER</span></a></h3>												
							<p class="long">
								{{trans('messages.glosary.mcer')}}
							</p>
						</article>
					</div>
				</div>
			</section>
		</div>
	</div>	
</section>
@endsection