@extends('layouts/master')

@section('title','Preguntas Frecuentes')

@section('content')
<section class="banner-hld wrapper static-img clearfix">
	<img src="../images/slider/faqs.jpg" id="ctl00_mainC_HeaderBanner_imgB">
	<div class="carousel-caption">
        <div class="wrapper">
            <div class="inner-hld">
                <h1 id="ctl00_mainC_HeaderBanner_headerTitle">{{trans('messages.faqs.title')}}</h1>
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
	                    <div id="dvImg1" class="prodimg cet">			                        	
                            <a id="toggleImg1" href="javascript:_ShowDetails('dvImg1');" class="clicktoopen">
                            	<span class="default-color"></span>
                            	<img src="../images/cursos/674X774_CET_alpha.png" alt="Certificate for English Teachers" class="bkg-gray">
                            	<i></i>
                            </a>
                            <div id="DIV_toggleImg1" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>					                        	
	                            	<div class="row">
	                                	<div class="content-cols">
						                    <div class="col-large">                        										                        
						                        <div class="faq-nav js-faq-nav blue-link">
						                            <h4><a href="#question-0-0" class="question">How long will my subscription last for?</a></h4>
						                            <h4><a href="#question-0-1" class="question">How do I find my access code?</a></h4>
						                            <h4><a href="#question-0-2" class="question">How do I activate my access code?</a></h4>
						                            <h4><a href="#question-0-3" class="question">How do I log into my account?</a></h4>
						                            <h4><a href="#question-0-4" class="question">I have forgotten my username or password, what can I do?</a></h4>
						                            <h4><a href="#question-0-5" class="question">System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</a></h4>
						                            <h4><a href="#question-0-6" class="question">Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</a></h4>
						                            <h4><a href="#question-0-7" class="question">Mobile system requirements for Digital Student’s Book</a></h4>
						                        </div>
						                    </div>										                    
						                </div>
						                <div class="large-screen-limit-width">
						                    <h2>Preguntas Frecuentes</h2>										                        
						                            <h3></h3>
						                            <div id="question-0-0" style="border-color:#EF911C" class="faq-open">
						                                <h4>How long will my subscription last for?</h4>
						                                <p>If you are a teacher, your subscription will last for four years from the day you activated your code.</p>
														<p>If you are a student your subscription will last for 18 months from the day you activated your code.</p>
														<p>For further information please check the email you received when you activated your code.</p>
						                            </div>
						                            <div id="question-0-1" style="border-color:#EF911C" class="">
						                                <h4>How do I find my access code?</h4>
						                                <p>You will find your access code printed on the inside cover of your book or booklet.</p>
						                            </div>
						                            <div id="question-0-2" style="border-color:#EF911C">
						                                <h4>How do I activate my access code?</h4>
						                                <p>
						                                	To activate your access code ensure that you have<br>
															- An active email account<br>
															- An internet browser installed on your computer<br>
															- Your code for example: BEP3216669561909. You will find your access code on the inside cover of your book or booklet.
														</p>
														<p>
															Follow the below instructions:<br>
															1. Go to the Resource Centre website.<br>
															2. Click on “Activate your Code”.<br>
															3. Enter your access code. You will find your access code printed on the inside cover of your book.<br>
															4. If you do not have an account, enter your details and click on “Continue”. You will then be able to log in.<br>
															5. If you already have an account, click on “Log in” and enter your existing login details. On the next screen you will be able to edit your details if you wish to do so.
														</p>
						                            </div>
						                            <div id="question-0-3" style="border-color:#EF911C">
						                                <h4>How do I log into my account?</h4>
						                                <p>After activating your code you will be able to log into your account by following the below instructions:</p>
														<p>
															1. Go to the Resource Centre website.<br>
															2. Click on “Log in”.<br>
															3. Enter your username and password.<br>
															4. Click on “Log in”.<br>
															5. You will then be able to access your resources.
														</p>
						                            </div>
						                            <div id="question-0-4" style="border-color:#EF911C">
						                                <h4>I have forgotten my username or password, what can I do?</h4>
						                                <p>
						                                	If you have forgotten your username or password please follow the instructions below to request them:<br>
															Forgotten Password:<br>
															1. Go to “Log in”.<br>
															2. Click on Forgotten password?<br>
															3. Enter your username<br>
															4. You will then receive an email with your password.<br>
															If you have forgotten your username please contact us.
														</p>
						                            </div>
						                            <div id="question-0-5" style="border-color:#EF911C">
						                                <h4>System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</h4>
						                                <p>Windows 7, 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.</p>
														<p>Browser: IE9, 10, 11 / Firefox / Chrome.</p>
														<p>Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
														Browser: Safari 6, 7, 8, 9.</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-0-6" style="border-color:#EF911C">
						                                <h4>Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</h4>
						                                <p>
						                                	Windows 7 &amp; 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: IE10, 11 / Firefox / Chrome* / Opera (*Chrome recommended).
														</p>
														<p>
															Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: Safari 7, 8, 9.
														</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-0-7" style="border-color:#EF911C" class="">
						                                <h4>Mobile system requirements for Digital Student’s Book</h4>
						                                <p>Android: Dual core 1GHz or better, 1GB RAM, 8GB internal storage with Android 4.1, 4.2, 4.3, 4.4, 5.</p>
														<p>iOS: iPad 2, 3, 4 with iOS 7, 8, 9.</p>
														<p>Minimum resolution: 1024x768</p>
														<p>Internet connection required on first use.</p>
						                            </div>										                        
						                </div>					                                    	
	                                </div>					                            
	                        </div>
	                    </div>  
	                    <div id="dvImg2" class="prodimg opt">
                            <a id="toggleImg2" href="javascript:_ShowDetails('dvImg2');" class="clicktoopen">
	                            <span class="default-color"></span>
	                            <img src="../images/examenes/674X774_OPT_alpha.png" alt="Language Development Course" class="bkg-gray">
	                            <i></i>
                            </a>
                            <div id="DIV_toggleImg2" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>					                        	
	                            	<div class="row">
	                                	<div class="content-cols">
						                    <div class="col-large">                        										                        
						                        <div class="faq-nav js-faq-nav blue-link">
						                            <h4><a href="#question-1-0" class="question">How long will my subscription last for?</a></h4>
						                            <h4><a href="#question-1-1" class="question">How do I find my access code?</a></h4>
						                            <h4><a href="#question-1-2" class="question">How do I activate my access code?</a></h4>
						                            <h4><a href="#question-1-3" class="question">How do I log into my account?</a></h4>
						                            <h4><a href="#question-1-4" class="question">I have forgotten my username or password, what can I do?</a></h4>
						                            <h4><a href="#question-1-5" class="question">System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</a></h4>
						                            <h4><a href="#question-1-6" class="question">Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</a></h4>
						                            <h4><a href="#question-1-7" class="question">Mobile system requirements for Digital Student’s Book</a></h4>
						                        </div>
						                    </div>										                    
						                </div>
						                <div class="large-screen-limit-width">
						                    <h2>Preguntas Frecuentes</h2>										                        
						                            <h3></h3>
						                            <div id="question-1-0" style="border-color:#EF911C" class="faq-open">
						                                <h4>How long will my subscription last for?</h4>
						                                <p>If you are a teacher, your subscription will last for four years from the day you activated your code.</p>
														<p>If you are a student your subscription will last for 18 months from the day you activated your code.</p>
														<p>For further information please check the email you received when you activated your code.</p>
						                            </div>
						                            <div id="question-1-1" style="border-color:#EF911C" class="">
						                                <h4>How do I find my access code?</h4>
						                                <p>You will find your access code printed on the inside cover of your book or booklet.</p>
						                            </div>
						                            <div id="question-1-2" style="border-color:#EF911C">
						                                <h4>How do I activate my access code?</h4>
						                                <p>
						                                	To activate your access code ensure that you have<br>
															- An active email account<br>
															- An internet browser installed on your computer<br>
															- Your code for example: BEP3216669561909. You will find your access code on the inside cover of your book or booklet.
														</p>
														<p>
															Follow the below instructions:<br>
															1. Go to the Resource Centre website.<br>
															2. Click on “Activate your Code”.<br>
															3. Enter your access code. You will find your access code printed on the inside cover of your book.<br>
															4. If you do not have an account, enter your details and click on “Continue”. You will then be able to log in.<br>
															5. If you already have an account, click on “Log in” and enter your existing login details. On the next screen you will be able to edit your details if you wish to do so.
														</p>
						                            </div>
						                            <div id="question-1-3" style="border-color:#EF911C">
						                                <h4>How do I log into my account?</h4>
						                                <p>After activating your code you will be able to log into your account by following the below instructions:</p>
														<p>
															1. Go to the Resource Centre website.<br>
															2. Click on “Log in”.<br>
															3. Enter your username and password.<br>
															4. Click on “Log in”.<br>
															5. You will then be able to access your resources.
														</p>
						                            </div>
						                            <div id="question-1-4" style="border-color:#EF911C">
						                                <h4>I have forgotten my username or password, what can I do?</h4>
						                                <p>
						                                	If you have forgotten your username or password please follow the instructions below to request them:<br>
															Forgotten Password:<br>
															1. Go to “Log in”.<br>
															2. Click on Forgotten password?<br>
															3. Enter your username<br>
															4. You will then receive an email with your password.<br>
															If you have forgotten your username please contact us.
														</p>
						                            </div>
						                            <div id="question-1-5" style="border-color:#EF911C">
						                                <h4>System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</h4>
						                                <p>Windows 7, 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.</p>
														<p>Browser: IE9, 10, 11 / Firefox / Chrome.</p>
														<p>Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
														Browser: Safari 6, 7, 8, 9.</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-1-6" style="border-color:#EF911C">
						                                <h4>Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</h4>
						                                <p>
						                                	Windows 7 &amp; 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: IE10, 11 / Firefox / Chrome* / Opera (*Chrome recommended).
														</p>
														<p>
															Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: Safari 7, 8, 9.
														</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-1-7" style="border-color:#EF911C" class="">
						                                <h4>Mobile system requirements for Digital Student’s Book</h4>
						                                <p>Android: Dual core 1GHz or better, 1GB RAM, 8GB internal storage with Android 4.1, 4.2, 4.3, 4.4, 5.</p>
														<p>iOS: iPad 2, 3, 4 with iOS 7, 8, 9.</p>
														<p>Minimum resolution: 1024x768</p>
														<p>Internet connection required on first use.</p>
						                            </div>										                        
						                </div>					                                    	
	                                </div>					                            
	                        </div>                                                    
	                   	</div>                  			                    
	                    <div id="dvImg3" class="prodimg cec">                        
		                    <a id="toggleImg3" href="javascript:_ShowDetails('dvImg3');" class="clicktoopen">
			                    <span class="default-color"></span>
			                    <img src="../images/cursos/674X774_CEC_alpha.png" alt="Certificate for English Coordinators" class="bkg-gray">
			                    <i></i>
		                    </a>
		                    <div id="DIV_toggleImg3" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>					                        	
	                            	<div class="row">
	                                	<div class="content-cols">
						                    <div class="col-large">                        										                        
						                        <div class="faq-nav js-faq-nav blue-link">
						                            <h4><a href="#question-2-0" class="question">How long will my subscription last for?</a></h4>
						                            <h4><a href="#question-2-1" class="question">How do I find my access code?</a></h4>
						                            <h4><a href="#question-2-2" class="question">How do I activate my access code?</a></h4>
						                            <h4><a href="#question-2-3" class="question">How do I log into my account?</a></h4>
						                            <h4><a href="#question-2-4" class="question">I have forgotten my username or password, what can I do?</a></h4>
						                            <h4><a href="#question-2-5" class="question">System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</a></h4>
						                            <h4><a href="#question-2-6" class="question">Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</a></h4>
						                            <h4><a href="#question-2-7" class="question">Mobile system requirements for Digital Student’s Book</a></h4>
						                        </div>
						                    </div>										                    
						                </div>
						                <div class="large-screen-limit-width">
						                    <h2>Preguntas Frecuentes</h2>										                        
						                            <h3></h3>
						                            <div id="question-2-0" style="border-color:#EF911C" class="faq-open">
						                                <h4>How long will my subscription last for?</h4>
						                                <p>If you are a teacher, your subscription will last for four years from the day you activated your code.</p>
														<p>If you are a student your subscription will last for 18 months from the day you activated your code.</p>
														<p>For further information please check the email you received when you activated your code.</p>
						                            </div>
						                            <div id="question-2-1" style="border-color:#EF911C" class="">
						                                <h4>How do I find my access code?</h4>
						                                <p>You will find your access code printed on the inside cover of your book or booklet.</p>
						                            </div>
						                            <div id="question-2-2" style="border-color:#EF911C">
						                                <h4>How do I activate my access code?</h4>
						                                <p>
						                                	To activate your access code ensure that you have<br>
															- An active email account<br>
															- An internet browser installed on your computer<br>
															- Your code for example: BEP3216669561909. You will find your access code on the inside cover of your book or booklet.
														</p>
														<p>
															Follow the below instructions:<br>
															1. Go to the Resource Centre website.<br>
															2. Click on “Activate your Code”.<br>
															3. Enter your access code. You will find your access code printed on the inside cover of your book.<br>
															4. If you do not have an account, enter your details and click on “Continue”. You will then be able to log in.<br>
															5. If you already have an account, click on “Log in” and enter your existing login details. On the next screen you will be able to edit your details if you wish to do so.
														</p>
						                            </div>
						                            <div id="question-2-3" style="border-color:#EF911C">
						                                <h4>How do I log into my account?</h4>
						                                <p>After activating your code you will be able to log into your account by following the below instructions:</p>
														<p>
															1. Go to the Resource Centre website.<br>
															2. Click on “Log in”.<br>
															3. Enter your username and password.<br>
															4. Click on “Log in”.<br>
															5. You will then be able to access your resources.
														</p>
						                            </div>
						                            <div id="question-2-4" style="border-color:#EF911C">
						                                <h4>I have forgotten my username or password, what can I do?</h4>
						                                <p>
						                                	If you have forgotten your username or password please follow the instructions below to request them:<br>
															Forgotten Password:<br>
															1. Go to “Log in”.<br>
															2. Click on Forgotten password?<br>
															3. Enter your username<br>
															4. You will then receive an email with your password.<br>
															If you have forgotten your username please contact us.
														</p>
						                            </div>
						                            <div id="question-2-5" style="border-color:#EF911C">
						                                <h4>System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</h4>
						                                <p>Windows 7, 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.</p>
														<p>Browser: IE9, 10, 11 / Firefox / Chrome.</p>
														<p>Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
														Browser: Safari 6, 7, 8, 9.</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-2-6" style="border-color:#EF911C">
						                                <h4>Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</h4>
						                                <p>
						                                	Windows 7 &amp; 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: IE10, 11 / Firefox / Chrome* / Opera (*Chrome recommended).
														</p>
														<p>
															Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: Safari 7, 8, 9.
														</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-2-7" style="border-color:#EF911C" class="">
						                                <h4>Mobile system requirements for Digital Student’s Book</h4>
						                                <p>Android: Dual core 1GHz or better, 1GB RAM, 8GB internal storage with Android 4.1, 4.2, 4.3, 4.4, 5.</p>
														<p>iOS: iPad 2, 3, 4 with iOS 7, 8, 9.</p>
														<p>Minimum resolution: 1024x768</p>
														<p>Internet connection required on first use.</p>
						                            </div>										                        
						                </div>					                                    	
	                                </div>					                            
	                        </div>
	                   	</div>
	                   	<div id="dvImg4" class="prodimg dtes">
                    		<a id="toggleImg4" href="javascript:_ShowDetails('dvImg4');" class="clicktoopen">
                        		<span class="default-color"></span>
                         		<img src="../images/examenes/674X774_DTES_alpha.png" alt="Access Course" class="bkg-gray">
                         		<i></i>
                    		</a>
                    		<div id="DIV_toggleImg4" class="culture-gallery-holder clearfix" style="display:none;">
	                            <div class="clear"></div>					                        	
	                            	<div class="row">
	                                	<div class="content-cols">
						                    <div class="col-large">                        										                        
						                        <div class="faq-nav js-faq-nav blue-link">
						                            <h4><a href="#question-3-0" class="question">How long will my subscription last for?</a></h4>
						                            <h4><a href="#question-3-1" class="question">How do I find my access code?</a></h4>
						                            <h4><a href="#question-3-2" class="question">How do I activate my access code?</a></h4>
						                            <h4><a href="#question-3-3" class="question">How do I log into my account?</a></h4>
						                            <h4><a href="#question-3-4" class="question">I have forgotten my username or password, what can I do?</a></h4>
						                            <h4><a href="#question-3-5" class="question">System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</a></h4>
						                            <h4><a href="#question-3-6" class="question">Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</a></h4>
						                            <h4><a href="#question-3-7" class="question">Mobile system requirements for Digital Student’s Book</a></h4>
						                        </div>
						                    </div>										                    
						                </div>
						                <div class="large-screen-limit-width">
						                    <h2>Preguntas Frecuentes</h2>										                        
						                            <h3></h3>
						                            <div id="question-3-0" style="border-color:#EF911C" class="faq-open">
						                                <h4>How long will my subscription last for?</h4>
						                                <p>If you are a teacher, your subscription will last for four years from the day you activated your code.</p>
														<p>If you are a student your subscription will last for 18 months from the day you activated your code.</p>
														<p>For further information please check the email you received when you activated your code.</p>
						                            </div>
						                            <div id="question-3-1" style="border-color:#EF911C" class="">
						                                <h4>How do I find my access code?</h4>
						                                <p>You will find your access code printed on the inside cover of your book or booklet.</p>
						                            </div>
						                            <div id="question-3-2" style="border-color:#EF911C">
						                                <h4>How do I activate my access code?</h4>
						                                <p>
						                                	To activate your access code ensure that you have<br>
															- An active email account<br>
															- An internet browser installed on your computer<br>
															- Your code for example: BEP3216669561909. You will find your access code on the inside cover of your book or booklet.
														</p>
														<p>
															Follow the below instructions:<br>
															1. Go to the Resource Centre website.<br>
															2. Click on “Activate your Code”.<br>
															3. Enter your access code. You will find your access code printed on the inside cover of your book.<br>
															4. If you do not have an account, enter your details and click on “Continue”. You will then be able to log in.<br>
															5. If you already have an account, click on “Log in” and enter your existing login details. On the next screen you will be able to edit your details if you wish to do so.
														</p>
						                            </div>
						                            <div id="question-3-3" style="border-color:#EF911C">
						                                <h4>How do I log into my account?</h4>
						                                <p>After activating your code you will be able to log into your account by following the below instructions:</p>
														<p>
															1. Go to the Resource Centre website.<br>
															2. Click on “Log in”.<br>
															3. Enter your username and password.<br>
															4. Click on “Log in”.<br>
															5. You will then be able to access your resources.
														</p>
						                            </div>
						                            <div id="question-3-4" style="border-color:#EF911C">
						                                <h4>I have forgotten my username or password, what can I do?</h4>
						                                <p>
						                                	If you have forgotten your username or password please follow the instructions below to request them:<br>
															Forgotten Password:<br>
															1. Go to “Log in”.<br>
															2. Click on Forgotten password?<br>
															3. Enter your username<br>
															4. You will then receive an email with your password.<br>
															If you have forgotten your username please contact us.
														</p>
						                            </div>
						                            <div id="question-3-5" style="border-color:#EF911C">
						                                <h4>System requirements  for Student's Resource Centre and Teacher’s Resource Centre:</h4>
						                                <p>Windows 7, 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.</p>
														<p>Browser: IE9, 10, 11 / Firefox / Chrome.</p>
														<p>Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
														Browser: Safari 6, 7, 8, 9.</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-3-6" style="border-color:#EF911C">
						                                <h4>Desktop system requirements for Digital Student’s Book, Online Workbook and Teacher’s Presentation Kit</h4>
						                                <p>
						                                	Windows 7 &amp; 8, 8.1, 10: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: IE10, 11 / Firefox / Chrome* / Opera (*Chrome recommended).
														</p>
														<p>
															Apple Macintosh OS 10.7, 10.8, 10.9, 10.10, 10.11: CPU Speed (equivalent): Any 2GHz dual core processor.<br>
															Browser: Safari 7, 8, 9.
														</p>
														<p>RAM: 1GB (32-bit), 2GB (64-bit), Display: 1024 x 768 pixels, 32-bit colour, Audio sound card.</p>
						                            </div>
						                            <div id="question-3-7" style="border-color:#EF911C" class="">
						                                <h4>Mobile system requirements for Digital Student’s Book</h4>
						                                <p>Android: Dual core 1GHz or better, 1GB RAM, 8GB internal storage with Android 4.1, 4.2, 4.3, 4.4, 5.</p>
														<p>iOS: iPad 2, 3, 4 with iOS 7, 8, 9.</p>
														<p>Minimum resolution: 1024x768</p>
														<p>Internet connection required on first use.</p>
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