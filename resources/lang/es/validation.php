<?php


return array(
	"accepted"             => "El campo :attribute debe ser aceptado.",
	"active_url"           => "El campo :attribute no es una URL válido.",
	"after"                => "El campo :attribute debe ser una fecha después de :date.",
	"alpha"                => "El campo :attribute solo puede contener letras.",
	"alpha_dash"           => "El campo :attribute solo puede contener letras, números, and guiones.",
	"alpha_num"            => "El campo :attribute solo puede contener letras y números.",
	"array"                => "El campo :attribute debe ser un array.",
	"before"               => "El campo :attribute debe ser una fecha antes de :date.",
	"between"              => [
		"numeric" => "El campo :attribute debe estar entre :min y :max.",
		"file"    => "El campo :attribute debe estar entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe estar entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe contener entre :min y :max elementos.",
	],
	"boolean"              => "El campo :attribute debe ser verdadero o falso.",
	"confirmed"            => "El campo Confirmacion de :attribute confirmation does not match.",
	"date"                 => "El campo :attribute no es una fecha válida.",
	"date_format"          => "El campo :attribute no coincide con el formato :format.",
	"different"            => "El campo :attribute y :other deben ser diferentes.",
	"digits"               => "El campo :attribute debe tener :digits dígitos.",
	"digits_between"       => "El campo :attribute debe estar entre :min y :max dígitos.",
	"email"                => "El campo :attribute debe ser un correo electrónico válido.",
	"filled"               => "El campo :attribute es requerido.",
	"exists"               => "El campo :attribute seleccionado no es válido.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El campo :attribute seleccionado no es válido.",
	"integer"              => "El campo :attribute debe ser un número entero.",
	"ip"                   => "El campo :attribute debe ser una dirección IP válida.",
	"max"                  => [
		"numeric" => "El campo :attribute no puede ser mayor que :max.",
		"file"    => "El campo :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no puede ser mayor que :max characters.",
		"array"   => "El campo :attribute no puede ser mayor que :max items.",
	],
	"mimes"                => "El campo :attribute debe ser un archivo de tipo: :values.",
	"min"                  => [
		"numeric" => "El campo :attribute debe ser al menos :min.",
		"file"    => "El campo :attribute debe pesar al menos :min kilobytes.",
		"string"  => "El campo :attribute debe contener al menos :min caracteres.",
		"array"   => "El campo :attribute debe contener al menos :min elementos.",
	],
	"not_in"               => "El campo :attribute seleccionado no es válido.",
	"numeric"              => "El campo :attribute debe ser un número.",
	"regex"                => "El formato del campo :attribute no es válido.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"        => "El campo :attribute es requerido cuando :values está presente.",
	"required_with_all"    => "El campo :attribute es requerido cuando :values está presente.",
	"required_without"     => "El campo :attribute es requerido cuando :values no está presente.",
	"required_without_all" => "El campo :attribute es requerido cuando ninguno de estos valores :values están presentes.",
	"same"                 => "Los campos :attribute y :other deben coincidir.",
	"size"                 => [
		"numeric" => "El campo :attribute debe ser :size.",
		"file"    => "El campo :attribute debe tener un tamaño de :size kilobytes.",
		"string"  => "El campo :attribute debe contener :size caracteres.",
		"array"   => "El campo :attribute debe contener :size elementos.",
	],
	"unique"               => "El campo :attribute ya existe.",
	"url"                  => "El formato del campo :attribute no es válido.",
	"timezone"             => "El campo :attribute debe ser una zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
		'business_name' => array(
			'required' => 'El campo Razón Social es requerido'
		),
		'rfc' => array(
			'required' => 'El campo RFC es requerido'
		),
		'business_office' => array(
			'required' => 'El campo Domicilio Fiscal'
		),
		'invoice_email' => array(
			'required' => 'El campo Correo Electrónico es requerido'
		),
		'amount' => array(
			'required' => 'El campo Importe es requerido'
		),
		'payment_date' => array(
			'required' => 'El campo Fecha de Pago es requerido'
		),
		'product' => array(
			'required' => 'El campo Producto es requerido'
		),
		'name' => array(
			'required' => 'El campo Nombre es requerido'
		),
		'captcha' => array(
			'required' => 'El Texto es requerido'
		)
		
	],
	'captcha' => 'El texto no coincide',
		/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'full_name' => 'Nombre Completo',
		'phone' => 'Teléfono',
		'email' => 'Correo electrónico',
		'message' => 'Mensaje',
		'captcha' => 'Texto',
		 // applications table fields
		'application_date' => 'Fecha de aplicación',
		'total_candidates_classroom' => 'Candidatos por aula',		
		'total_candidates' => 'Total de candidatos',
		'registered_candidates' => 'Candidatos registrados',
		'type' => 'Tipo',
		'initial_registration_date' => 'Inicio de registro',
		'final_registration_date' => 'Cierre de registro',
		'application_date' => 'Fecha de aplicación',
		'payment' => 'Pago',
		'venue_id' => 'Sede',
		'product_id' => 'Producto',
		'product_types' => 'Versión de producto',
		'operator_id' => 'Operador',
		'exam_id' => 'Examen',		
		// application_candidate table fields
		'registration_status' => 'Status de registro',
		'payment_method' => 'Método de pago',
		'price' => 'Precio',
		'proof_payment' => 'Comprobante de pago',
		'folio_me' => 'Folio ME',
		'application_id' => 'Aplicación',
		'candidate_id' => 'Candidato',
		// candidates table fields
		'authorized_persons' => 'Personas autorizadas',
		'birthdate' => 'Fecha de nacimiento',
		'birthplace_state' => 'Estado',
		'city' => 'Ciudad',
		'colony' => 'Colonia',
		'cp' => 'Código postal',
		'curp' => 'CURP',
		'email' => 'Correo electrónico',
		'firstname' => 'Nombre(s)',
		'genere' => 'Género',
		'lastname' => 'Apellidos',
		'n_exterior' => 'No. exterior',
		'n_interior' => 'No. interior',
		'nationality' => 'Nacionalidad',
		'phone' => 'Teléfono',
		'state' => 'Estado',
		'street' => 'Calle',
		'town' => 'Colonia o localidad',
		'tutor' => 'Tutor',
		// cenny_surveys table fields
		'actual_position' => 'Cargo o Puesto actual',
		'current_profession' => 'Profesion actual',
		'disability' => 'Discapacidad Específica',
		'experience_area' => 'Sector con experiencia',
		'handicapped' => 'Discapacidad',
		'how_learned_language' => 'Método de aprendizaje',
		'indigenous' => 'Pueblo indígena',
		'indigenous_people' => 'Nombre del pueblo indígena',
		'institution' => 'Institución',
		'level_academic_experience' => 'Nivel académico con experiencia',
		'maximum_degree_studies' => 'Máximo grado de estudio',
		'motive' => 'Motivo de solicitud',
		'previous_exam' => 'Examen previo',
		'previous_exam_month' => 'Mes',
		'previous_exam_year' => 'Año',
		'profession' => 'Profesion',
		'profession_area' => 'Area de su profesión',
		'where_learned_language' => 'Lugar donde aprendio el idioma',
		'years_experience' => 'Años de experiencia',
		'years_studying_language' => 'Años de estudio del idioma',
		//	cities table fields
		'name' => 'Nombre',
		'state_id' => 'Estado',
		//	operators table fields
		'address' => 'Domicilio',
		//	products table fields
		'parents_information' => 'Información de los padres',
		'maximum_age' => 'Edad máxima',
		'minimum_age' => 'Edad mínima',
		// product_types table fields
		'paypal_code' => 'Código Paypal',
		'password' => 'Contraseña',
		'role' => 'Tipo',
		//	venues table fields
		'authorized_center' => 'Centro autorizado',
		'school' => 'Institución',
		'contact' => 'Contacto',
		'location' => 'Ubicación',
		'discount' => 'Descuento',
		'percentage' => 'Porcentaje',
		'initial_agreement_date' => 'Fecha de inicial de convenio',
		'final_agreement_date' => 'Fecha de vencimiento de convenio',
		'city_id' => 'Ciudad'
	),
);
