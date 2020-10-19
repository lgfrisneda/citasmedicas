<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		h2{
			margin-top: 10%;
			text-align: center;
		}
		.table{
			margin: 5% auto;
		    width: 65%;
		    border: 10px ridge;
		    padding: 2px;
		}
		td {
			border-bottom: groove;
			height: 50px;
		}
		td:first-child{
			font-weight: bold;
		}
		td:last-child{
			font-style: oblique;
		}
	</style>
</head>
<body>
	<h2>Comprobante de cita generada</h2>
	<table class="table">
		<tr>
			<td>Datos del Paciente:</td>
			<td>{{ $comprobante->paciente }}</td>
		</tr>
		<tr>
			<td>Datos del Representante:</td>
			<td>{{ $comprobante->pacienteRep }}</td>
		</tr>
		<tr>
			<td>Entidad:</td>
			<td>{{ $comprobante->entity }}</td>
		</tr>
		<tr>
			<td>Cita:</td>
			<td>{{ $comprobante->cita }}</td>
		</tr>
		<tr>
			<td>Empresa:</td>
			<td>{{ $comprobante->company }}</td>
		</tr>
		<tr>
			<td>Servicio:</td>
			<td>{{ $comprobante->servicio }}</td>
		</tr>
		<tr>
			<td>Sede:</td>
			<td>{{ $comprobante->sede }}</td>
		</tr>
		<tr>
			<td>Fecha y hora:</td>
			<td>{{ $comprobante->datetime }}</td>
		</tr>
		<tr>
			<td>Profesional:</td>
			<td>{{ $comprobante->profesional }}</td>
		</tr>
	</table>
</body>
</html>