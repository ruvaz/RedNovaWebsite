<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UtilsController extends  Controller{
	
	public function sendMessage(Request $request)
	
	{
		$rules = array('full_name' => 'required',
					   'email' => 'required',
					   'message' => 'required',
					   'phone' => 'required',
					   'captcha' => 'required | captcha');
					   
		$validator = \Validator::make($request->all(), $rules);								
		
		if($validator->fails())
		{
			return response()->json(array('errors' => $validator->errors()), 422);
		}
		
		$user = $request->all();
		
		
		
		\Mail::send(array('html' => 'emails.website_message'), array('data' => $request->all()), function($m)use($user){
			
			$headers = $m->getHeaders();
			$headers->addTextHeader('Mime-Version','1.0'.'\r\n');
			$headers->addTextHeader('X-Mailer','PHP/'.phpversion()."\r\n");								
			$headers->addTextHeader('Content-type','text/html; charset=UTF-8\r\n');
			$headers->addTextHeader('Return-path','No Reply <no-reply-opt@rednovaconsultants.com> \r\n');
						
			$m->from('no-reply-opt@rednovaconsultants.com','Sitio web RedNova Cunsultants');			
			$m->to(['inforednova@grupomacmillan.com','omendoza@grupomacmillan.com','mgalicia@grupomacmillan.com'])
			  ->subject('Mensaje desde el sitio web');
			$m->cc($user['email'],$user['full_name']);
									
		});
		
		return response()->json(array('msg' => trans('messages.send_message.response_website_message')), 200);
	}
		
	public function refreshCaptcha()
	{
		$captcha = 	captcha_src();
		if($captcha)
			return response()->json(array('captcha' => $captcha), 200);
		else
			return response()->json(array('error' => 'Ocurrio un error intente mas tarde'), 422);
	}
	
	public function optPaymentNotification(Request $request)
	{
		$data = $request->all();
		$data['payment_time'] = (int)$data['hours'].':'.$data['minutes'];
	
		$rules = array('name' => 'required',
					   'phone' => 'required',
					   'email' => 'required',
					   'payment_date' => 'required',
					   'payment_time' => 'required',
					   'amount' => 'required');
				
		$validator = \Validator::make($data, $rules);
		
		if($validator->fails())
			return response()->json(array('errors' => $validator->errors()), 422);
		
		if(isset($data['invoice']))
		{
			$rules_invoice = array('business_name' => 'required',
							   'rfc' => 'required',
							   'business_office' => 'required',
							   'invoice_email' => 'required');
			
			$validator_invoice = \Validator::make($data, $rules_invoice);
							   			
			if($validator_invoice->fails())
				return response()->json(array('errors' => $validator_invoice->errors()), 422);
		}
		
		\Mail::send(array('html' => 'emails.website_opt_payment_notification'), array('data' => $data), function($m){
			
			$headers = $m->getHeaders();
			$headers->addTextHeader('Mime-Version','1.0'.'\r\n');
			$headers->addTextHeader('X-Mailer','PHP/'.phpversion()."\r\n");								
			$headers->addTextHeader('Content-type','text/html; charset=UTF-8\r\n');
			$headers->addTextHeader('Return-path','No Reply <no-reply-opt@rednovaconsultants.com> \r\n');
			
			$m->from('no-reply-opt@rednovaconsultants.com','Sitio web RedNova');			;
			$m->to(['nkeymolent@grupomacmillan.com','mgalicia@grupomacmillan.com','emercadosanchez@grupomacmillan.com'])->subject('Notificación de Pago');		
		});
		
		return response()->json(array('msg' => trans('messages.opt.modal_payment_notification.success_message')), 200);								 
	}
	
	public function paypalOptPaymentNotification(Request $request)
	{		
		$data = $request->all();
		$data['payment_date'] = date('d/m/Y');
		
		// \Mail::send(array('html' => 'emails.test'), array('data' => $data), function($m){
// 			
			// $headers = $m->getHeaders();
			// $headers->addTextHeader('Mime-Version','1.0'.'\r\n');
			// $headers->addTextHeader('X-Mailer','PHP/'.phpversion()."\r\n");								
			// $headers->addTextHeader('Content-type','text/html; charset=UTF-8\r\n');
			// $headers->addTextHeader('Return-path','No Reply <no-reply-opt@rednovaconsultants.com> \r\n');
// 			
			// $m->from('no-reply-opt@rednovaconsultants.com','Sitio web RedNova');
			// $m->to('ashilon@grupomacmillan.com')->subject('Notificación de Pago');
// 			
		// });
		
		if(isset($data['cm']))					
			return redirect($data['cm'].'/opt')->with('data', $data);
		else
			return redirect('es/opt')->with('data', $data);
	}
}