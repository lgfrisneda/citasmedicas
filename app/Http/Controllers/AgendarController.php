<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Entity;
use App\Appointment;
use App\Company;
use App\Service;
use App\Location;
use App\Professional;
use App\Datetime;
use App\Patient;
use App\PatientRep;
use App\Register;


class AgendarController extends Controller
{
    //
    public function index()
    {
    	$entities = Entity::all();

    	return view('agendar.index', compact('entities'));
    }

    public function cita($entity)
    {
    	$appointments = Appointment::all();

    	return view('agendar.cita', compact('appointments', 'entity'));
    }

    public function company($entity, $cita)
    {
    	$entity_id = Entity::where('slug', $entity)->pluck('id')->first();

    	if($entity_id == 3){
    		$company = "n-a";
    		return redirect('agendar/'.$entity.'/'.$cita.'/'.$company);
    	}

    	$companies = Company::where('entity_id', $entity_id)
    						->orderBy('valuation', 'DESC')
    						->paginate(18);

    	return view('agendar.tipoEntidad', compact('companies', 'cita', 'entity'));
    }

    public function servicio($entity, $cita, $company)
    {
    	$entity_id = Entity::where('slug', $entity)->pluck('id')->first();

    	$appointment_id = Appointment::where('slug', $cita)->pluck('id')->first();

    	if( $company == "n-a"){
    		$services = Service::where('entity_id', $entity_id)
	    						->where('appointment_id', $appointment_id)
	    						->paginate(12);
    	}else{
    		$company_id = Company::where('slug', $company)->pluck('id')->first();
    		$services = Service::where('entity_id', $entity_id)
    							->where('appointment_id', $appointment_id)
	    						->where('company_id', $company_id)
	    						->paginate(12);
    	}

    	return view('agendar.servicios', compact('entity', 'cita', 'company', 'services'));
    }

    public function sede($entity, $cita, $company, $servicio)
    {
    	if($cita <> "consultorio"){
    		$sede = "n-a";
    		return redirect('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede);
    	}

    	$entity_id = Entity::where('slug', $entity)->pluck('id')->first();

    	$appointment_id = Appointment::where('slug', $cita)->pluck('id')->first();

    	$company_id = Company::where('slug', $company)->pluck('id')->first();

    	$service_id = Service::where('slug', $servicio)->pluck('id')->first();

    	$sedes = Location::where('service_id', $service_id)
    					->paginate(12);

    	return view('agendar.sedes', compact('entity', 'cita', 'company', 'servicio', 'sedes'));

    }

    public function calendario($entity, $cita, $company, $servicio, $sede)
    {
    	$servicio_id = Service::where('slug', $servicio)->pluck('id')->first();
    	$professional_id = Professional::where('service_id', $servicio_id)->pluck('id');
    	$date = Carbon::now()->addDay(4)->format('Y-m-d');
    	$professionals = Datetime::whereIn('professional_id', $professional_id)
						    	->where('date', $date)
						    	->orderBy('time', 'ASC')
						    	->get();

    	return view('agendar.profesional', compact('entity', 'cita', 'company', 'servicio', 'sede', 'professionals', 'date'));
    }

    public function profesional($date)
    {
    	//Esto funciona pero aun falta mostrar los datos
    	$profesionals = Datetime::where('date', $date)->get();

    	return $profesionals;
    }

    public function identificacion($entity, $cita, $company, $servicio, $sede, $profesional)
    {
    	return view('agendar.identificacion', compact('entity', 'cita', 'company', 'servicio', 'sede', 'profesional'));
    }

    public function dni($entity, $cita, $company, $servicio, $sede, $profesional, Request $request)
    {
    	$validatedData = $request->validate([
	        'dni' => 'required|numeric|min:2, max:20'
	    ]);

    	$dni = $validatedData['dni'];

    	$data = Patient::where('dni', $dni)->first();

    	if(!$data['id']){
    		$data = Patient::create([
    			'dni' => $dni
    		]);
    	}


    	return redirect('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni);
    }

    public function dataPatient($entity, $cita, $company, $servicio, $sede, $profesional, $dni)
    {
    	$dataPatient = Patient::where('dni', $dni)->first();

    	return view('agendar.dataPat', compact('entity', 'cita', 'company', 'servicio', 'sede', 'profesional', 'dni', 'dataPatient'));
    }

    public function updateDataPatient($entity, $cita, $company, $servicio, $sede, $profesional, $dni, Request $request)
    {
    	$validatedData = $request->validate([
	        'dni' => 'required|numeric|min:2, max:20',
	        'fullname' => 'required|min:2, max:50',
	        'birthdate' => 'required|date|date_format:Y-m-d',
	        'gender' => 'required',
	        'phone' => 'required',
	        'email' => 'required|email',
	        'address' => 'required',
	        'city' => 'required|min: 3',
	    ]);

	    $datos = request()->except(['_token','_method']);

	    Patient::where('dni','=',$dni)->update($datos);

	    $edad = Carbon::parse($datos['birthdate'])->age;

	    $data = Patient::where('dni', $dni)->first();

	    if($edad < 18){
	    	$dataRep = PatientRep::where('patient_id', $data->id)->first();

	    	if($dataRep['id']){
	    		$representante = $dataRep['id'];
	    	}else{
	    		$insertRep = PatientRep::create([
	    			'patient_id' => $data->id
	    		]);

	    		$representante = $insertRep->id;
	    	}
	    	return redirect('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni.'/'.$representante);
	    }

	    $representante = "n-a";

    	return redirect('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni.'/'.$representante.'/confirmacion');
    }

    public function dataPatientRep($entity, $cita, $company, $servicio, $sede, $profesional, $dni, $representante)
    {
    	$dataRep = PatientRep::find($representante);

    	return view('agendar.dataRep', compact('entity', 'cita', 'company', 'servicio', 'sede', 'profesional', 'dni', 'representante', 'dataRep'));
    }

    public function updateDataPatientRep($entity, $cita, $company, $servicio, $sede, $profesional, $dni, $representante, Request $request)
    {
    	$validatedData = $request->validate([
	        'dni' => 'required|numeric|min:2, max:20',
	        'fullname' => 'required|min:2, max:50',
	        'birthdate' => 'required|date|date_format:Y-m-d',
	        'relationship' => 'required',
	        'phone' => 'required',
	        'email' => 'required|email',
	        'address' => 'required',
	        'city' => 'required|min: 3',
	        'patient_id' => 'required',
	    ]);

	    $edad = Carbon::parse($validatedData['birthdate'])->age;

	    if($edad < 18){
	    	return back()->with('info', 'El representante no puede ser menor de edad.');
	    }

	    $patient = PatientRep::find($representante);

	    $patient->dni = $validatedData['dni'];
	    $patient->fullname = $validatedData['fullname'];
	    $patient->birthdate = $validatedData['birthdate'];
	    $patient->relationship = $validatedData['relationship'];
	    $patient->phone = $validatedData['phone'];
	    $patient->email = $validatedData['email'];
	    $patient->address = $validatedData['address'];
	    $patient->city = $validatedData['city'];
	    $patient->patient_id = $validatedData['patient_id'];

	    $patient->save();

	    return redirect('agendar/'.$entity.'/'.$cita.'/'.$company.'/'.$servicio.'/'.$sede.'/'.$profesional.'/'.$dni.'/'.$representante.'/confirmacion');
    }

    public function confirmacion($entity, $cita, $company, $servicio, $sede, $profesional, $dni, $representante)
    {
    	$entity = Entity::where('slug', $entity)->first();
    	$cita = Appointment::where('slug', $cita)->first();
    	$company = Company::where('slug', $company)->first();
    	$servicio = Service::where('slug', $servicio)->first();
    	$sede = Location::where('slug', $sede)->first();

    	$datetime = Datetime::find($profesional);
    	$profesional = Professional::find($datetime->professional_id);
    	$paciente = Patient::where('dni', $dni)->first();
    	$pacienteRep = PatientRep::find($representante);

    	return view('agendar/confirmacion', compact('entity', 'cita', 'company', 'servicio', 'sede', 'profesional', 'datetime', 'dni', 'representante', 'paciente', 'pacienteRep'));
    }

    public function storeCita(Request $request)
    {
    	$validatedData = $request->validate([
	        'entity' => 'required',
	        'cita' => 'required',
	        'company' => 'required',
	        'servicio' => 'required',
	        'profesional' => 'required',
	        'datetime' => 'required',
	        'sede' => 'required',
	        'paciente' => 'required',
	        'pacienteRep' => 'required'
	    ]);

	    $register = new Register();

	    $register->entity = $validatedData['entity'];
	    $register->cita = $validatedData['cita'];
	    $register->company = $validatedData['company'];
	    $register->servicio = $validatedData['servicio'];
	    $register->profesional = $validatedData['profesional'];
	    $register->datetime = $validatedData['datetime'];
	    $register->sede = $validatedData['sede'];
	    $register->paciente = $validatedData['paciente'];
	    $register->pacienteRep = $validatedData['pacienteRep'];

	    $register->save();

	    return redirect('agendar/')->with('info', 'Cita agendada exitosamente.');
    }
}
