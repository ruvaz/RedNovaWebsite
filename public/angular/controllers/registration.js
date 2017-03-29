(function(){
	angular.module('registration',['ui.bootstrap','StateService','RegistrationService','ngRoute'])
	.constant('urls',{		
		BASE_API: '/apidtes'
	})
	.controller('RegistrationCtrl',['$scope','$location','$routeParams','$anchorScroll','stateSVC','registrationSVC',
		function($scope,$location,$routeParams,$anchorScroll,stateSVC,registrationSVC)
		{
			$scope.terms = false;						
			$scope.popup = {};			
			$scope.payment = {};
			$scope.candidate = {};
			$scope.cenni_survey = {};
			$scope.tab = 0;
			$scope.status_curp = false;
			$scope.flag = true;
			$scope.registration_success = false;
			
			$scope.error = {};
			$scope.success = {};
			
			$scope.regex_curp = "([A-Z]|[a-z]){1}([AEIOU]|[aeiou]){1}([A-Z]|[a-z]){2}[0-9]{2}" +
								"(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])" +
								"([HM]|[hm]){1}" +
								"(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE" +
								"|as|bc|bs|cc|cs|ch|cl|cm|df|dg|gt|gr|hg|jc|mc|mn|ms|nt|nl|oc|pl|qt|qr|sp|sl|sr|tc|ts|tl|vz|yn|zs|ne)" +
								"([B-DF-HJ-NP-TV-Z]|[b-df-hj-np-tv-z]){3}" +
								"([0-9A-Z]|[0-9a-z]){1}[0-9]{1}$";
			
			$scope.regex_foliME = "(0[1-9]|1[0-2])([A-Z]){4}D([1-3]|E)" + new Date().getFullYear().toString().substr(2,2);
			
			$scope.currentDate = new Date();
			$scope.currentYear = $scope.currentDate.getFullYear();
			
			$scope.states = stateSVC.states();
			$scope.format = 'dd-MMMM-yyyy';			
					
			$scope.tabs = [
				{disable: true},
				{disable: true},
				{disable: true},
				{disable: true},
				{disable: true}
			];
			
			$scope.changeTab = function(tab)
			{
				$scope.tab = tab;
				
			}
			
			$scope.setPayment = function(active)
			{
				nextStep(active);
			}
			
			$scope.setTermsConditions = function(active)
			{				
				$scope.terms = true;
				nextStep(active);
			}
			
			$scope.setCandidateInformation = function(active)
			{				
				// $scope.sendForm();
				nextStep(active);	
								
			}
			
			$scope.sendCenniSurveyForm = function(active)
			{
				if($scope.payment.method == 3)
					nextStep(active);
				else
					$scope.sendForm();
			}
			
			$scope.validateFolioME = function(active)
			{
				$scope.flag = false;
				registrationSVC.validateFolioME($scope.application.id,$scope.candidate.folio_me)
					.then(function(data){
						$scope.success_folioME = true;
					},
					function(error){
						$scope.success_folioME = null;
						$scope.flag = true;
						$scope.error = error.errors;
						$scope.candidate.folio_me = '';
					});
			}
			
			$scope.validateCandidateCURP = function()
			{							
				
				registrationSVC.validateCURP($scope.application.id,$scope.candidate.curp)
					.then(function(data){
						if(data.status == 2){
							$scope.candidate = data.candidate;
							$scope.cenni_survey = data.cenni_survey;
							
							$scope.candidate.lastname_1 = data.candidate.lastname.split(' ')[0];
							$scope.candidate.lastname_2 = data.candidate.lastname.split(' ')[1];
							if($scope.candidate.genere == 'HOMBRE')
								$scope.candidate.genere = 'male';
							else
								$scope.candidate.genere = 'female';
						}
						$scope.status_curp = true;
						$scope.error.validation_curp = data.msg;
					},
					function(error){
						$scope.error.validation_curp = error.msg;
					})
			}
			
			$scope.sendForm = function()
			{					
				$scope.disabled = true;
				$scope.candidate.lastname = $scope.candidate.lastname_1 + " " + $scope.candidate.lastname_2;
				
				if($scope.candidate.tutor_firstname != undefined && $scope.candidate.tutor_lastname != undefined)
				{
					$scope.candidate.tutor = $scope.candidate.tutor_firstname + " " + $scope.candidate.tutor_lastname;
				}
				else
				{
					delete $scope.candidate.tutor_firstname;
					delete $scope.candidate.tutor_lastname;	
				}								
				
				$scope.candidate.authorized_persons = [];
				
				if($scope.candidate.p1 != undefined)
					if($scope.candidate.p1.firstname != undefined && $scope.candidate.p1.lastname != undefined)
						$scope.candidate.authorized_persons[0] = $scope.candidate.p1.firstname + " " + $scope.candidate.p1.lastname;				
					
				if($scope.candidate.p2 != undefined)
					if($scope.candidate.p2.firstname != undefined && $scope.candidate.p2.lastname != undefined)
						$scope.candidate.authorized_persons[1] = $scope.candidate.p2.firstname + " " + $scope.candidate.p2.lastname;
						
					
				$scope.candidate.curp = $scope.candidate.curp.toUpperCase();				
				
				candidate_application = {
					"application_id": $scope.application.id,
					"payment_method": $scope.payment.method
				}											
								
				registrationSVC.newCandidate($scope.candidate, $scope.cenni_survey, candidate_application,$scope.proof_payment)
					.then(function(data){						
						$scope.registration_success = true;
						$scope.registration_success_msg = data.msg;
					},
					function(error){
						$scope.error = error.errors;
					});
			}
			
			function nextStep(active)
			{				
				$scope.tabs[active].disable = true;
				$scope.active = active + 1;
				$anchorScroll();
			}
			
			function convertDate(inputDate)
			{
				return new Date(inputDate).toISOString().slice(0,10);
			}
			
			$scope.getApplication = function(application_id)
			{
				registrationSVC.getApplication(application_id)
					.then(function(data){
						$scope.application = data.data;
						$scope.application.payment = parseInt(data.data.payment); 	
						if(parseInt(data.data.payment) == 0)
						{						
							$scope.active = 1;
							$scope.tabs[1].disable = false;
							$scope.payment.method = 5;
						}
						else{
							$scope.active = 0;
							$scope.tabs[0].disable = false;
						}
							
						$scope.form_registration = true;
					},
					function(error){
						$location.path('./registration');
					});
			}
			
			$scope.back = function(active)
			{
				$scope.active = active - 1
				$scope.tabs[active].disable = true;
				
				if($scope.active == 1)
					$scope.terms = false;
					
				$anchorScroll();
			}
			
			$scope.setFile = function(element) {
				
		        $scope.$apply(function($scope) {
		        	if(element.files.length)
		        	{
		            	$scope.proof_payment_name = element.files[0].name;
		            	$scope.proof_payment = element.files[0];
		            }
		        	else
						$scope.proof_payment_name = null;
		        });
		    };
		    
		    $scope.paypalPayment = function()
		    {		    	
		    	$scope.payment.method = 1;
		    	$scope.active = 1;	
		    	$scope.paypal_payment_method = true;
		    }
		}
	]);
})();
