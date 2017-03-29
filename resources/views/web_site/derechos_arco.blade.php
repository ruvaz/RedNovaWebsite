@extends('layouts/master')

@section('title','Derechos Arco')

@section('content')
<section class="wrapper">
  <section class="inner-hld red-link">
      <h1>Solicitud de Derechos ARCO</h1>
      <p>
        <strong>Macmillan Publishers, S.A. de C.V.</strong>, en lo sucesivo Macmillan, con domicilio en Insurgentes Sur 1886, 
        Colonia Florida, Delegación Álvaro Obregón, C.P. 01030, en México, Distrito Federal, utilizará sus datos personales 
        recabados para identificarle, proporcionarle nuestros servicios y productos, así como brindarle información sobre ellos 
        y evaluar la calidad de los mismos. <br>
        Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de 
        privacidad integral a través de <a href="/{{App::getLocale()}}/politica-de-privacidad">http://rednovaconsultants.com/{{App::getLocale()}}/politica-de-privacidad</a>.
      </p>
      <p>
        A continuación se encuentra el formato descargable para realizar la solicitud de derechos ARCO. Dicho formato deberá ser 
        debidamente llenado y firmado y podrá enviarlo a la dirección de correo electrónico 
        <a href="mailto:privacidadrednova@grupomacmillan.com?subject=Solicitud%20para%20dejar%20de%20recibir%20informaci%C3%B3n&body=En%20este%20caso,%20su%20solicitud%20deber%C3%A1%20contener%20%20al%20menos%20su%20nombre%20completo,%20tel%C3%A9fono,%20domicilio%20y%20correo%20electr%C3%B3nico%20que%20usted%20%20designe%20para%20o%C3%ADr%20y%20recibir%20notificaciones%20y%20una%20copia%20de%20su%20identificaci%C3%B3n%20%20oficial%20vigente.%20Favor%20de%20adjuntar%20copia%20de%20Identificacion%20%20oficial%20vigente.">privacidadrednova@grupomacmillan.com</a> o entregarlo directamente en la dirección previamente mencionada junto con la información que acredite su identidad en un horario de 9 a 14 horas y de 15:30 a 19 horas de Lunes a Viernes.</p>
      <a class="cta" target="_blank" href="{{asset('documents/SOLICITUD_DE_DERECHOS_ARCO_MACMILLAN_PUBLISHERS.pdf')}}">Descargar</a>
  </section>
</section>
<p></p>
@endsection