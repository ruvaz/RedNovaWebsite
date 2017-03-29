<table style="width:700px;">									
	<thead>					
		<tr>
			<th  colspan="1" style="text-align: left">								
				<img src="/images/Logo_RN.png" style="max-width:200px;vertical-align: middle;"/>								
			</th>
			<th  colspan="2" style="text-align: right">
				<img src="/images/small_images/dtes_logo_pdf.png" style="max-width:200px"/>
			</th>
		</tr>
		<tr>
			<td colspan="3">AULA {{ $index }}</td>
		</tr>
		<tr>
			<td colspan="3">SEDE: {{ $application->venue_data->school }}</td>			
		</tr>	
		<tr>
			<td>EXAMEN: {{ $application->product->name }}</td>
			<td colspan="2"> FECHA: {{ Carbon\Carbon::createFromFormat('d-m-Y H:i:s',$application->application_date)->format('d-m-Y') }}</td>
		</tr>
		<tr>
			<td colspan="1">HORA DE INICIO: {{ Carbon\Carbon::createFromFormat('d-m-Y H:i:s',$application->application_date)->format('H:i') }}</td>
			<td colspan="2">HORA DE TÉRMINO: {{ Carbon\Carbon::createFromFormat('d-m-Y H:i:s',$application->application_date)->addHours(3)->format('H:i') }}</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center">SUPERVISOR DE EXAMEN</td>
		</tr>
		<tr>
			<td colspan="2" style="height: 70px"></td>
			<td style="height: 70px"></td>
		</tr>
		<tr style="text-align: center;">
			<td colspan="2">
				<p style="margin:0;vertical-align: bottom">NOMBRE COMPLETO</p>
			</td>
			<td>
				<p style="margin:0;vertical-align: bottom">FIRMA</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center">COORDINADOR DE APLICACIÓN</td>
		</tr>
		<tr>
			<td colspan="2" style="height: 70px"></td>
			<td style="height: 70px"></td>
		</tr>
		<tr style="text-align: center;">
			<td colspan="2">
				<p style="margin:0;vertical-align: bottom">NOMBRE COMPLETO</p>
			</td>
			<td colspan="1">
				<p style="margin:0;vertical-align: bottom">FIRMA</p>
			</td>
		</tr>						
		<tr style="background: #EFEFEF">
			<td  colspan="2">NOMBRE COMPLETO</td>
			<td  colspan="1">ASISTENCIA</td>
		</tr>
	</thead>
	<tbody style="padding-top: 150px;">																
		@foreach($candidates as $index => $candidate)
			<tr>				
				<td colspan="2">{{ $index + 1 }}. {{ $candidate->firstname.' '.$candidate->lastname }}</td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
</table>