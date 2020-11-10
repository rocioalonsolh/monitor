
@extends('layouts.app')
@section('title', 'Crear Paciente')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('/images/256px_logo_isp.png') }}" class="img-fluid" alt="Instituto de Salud Pública de Chile" width="70%">
        </div>
        <div class="col-md-10">
            <h3 class="mb-3">Formulario notificación inmediata y envío de muestras
                <br>a confirmación IRA grave y 2019-nCoV </h3><input type="button" class="d-print-none" value="Imprimir" onclick="javascript:window.print()">
            <h3 class="mb3 float-right"> Número de ingreso: {{$suspectCase->id}}</h3>
        </div>
        <div class="col-md-2"></div>
    </div>

    <hr/>
    <form method="POST" class="form-horizontal" >
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-md-4">
                <h4 class="mb-3">
                    Información del Paciente
                </h4>
            </div>
        </div>

        <div class="form-group row">
            <label for="for_run" class="col-sm-2 col-form-label">Rut</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_run" value="{{$suspectCase->patient->identifier}}">
            </div>
            <label for="for_address" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_address" value="{{$suspectCase->patient->demographic->address . ' '.
                                                                                 $suspectCase->patient->demographic->number . ' '.
                                                                                 $suspectCase->patient->demographic->department}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_name" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_name" value="{{$suspectCase->patient->name}}">
            </div>
            <label for="for_region" class="col-sm-2 col-form-label">Región</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_region" value="{{$suspectCase->patient->demographic->region->name}}" >
            </div>
        </div>
        <div class="form-group row">
            <label for="for_fathers_family" class="col-sm-2 col-form-label">Apellido Paterno</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_fathers_family" value="{{$suspectCase->patient->fathers_family}}">
            </div>
            <label for="for_city" class="col-sm-2 col-form-label">Ciudad</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_city">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_mothers_family" class="col-sm-2 col-form-label">Apellido Materno</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_mothers_family" value="{{$suspectCase->patient->mothers_family}}">
            </div>
            <label for="for_commune" class="col-sm-2 col-form-label">Comuna</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_commune" value="{{$suspectCase->patient->demographic->commune->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_gender" class="col-sm-2 col-form-label">Sexo</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_gender" value="{{$suspectCase->patient->sexEsp}}">
            </div>
            <label for="for_telephone" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_telephone" value="{{$suspectCase->patient->demographic->telephone}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_birthday" class="col-sm-2 col-form-label">Nacimiento</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_birthday" value="{{Carbon\Carbon::parse($suspectCase->patient->birthday)->format('d/m/Y')}}">
            </div>
            <label for="for_age" class="col-sm-2 col-form-label">Edad</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_age" value="{{$suspectCase->patient->age}}">
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col-md-4">
                <h4 class="mb-3">
                    Datos de Procedencia
                </h4>
            </div>
        </div>
        <div class="form-group row">
            <label for="for_run_medic" class="col-sm-2 col-form-label">Profesional Responsable</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_run_medic" value="{{$user->run . '-' .$user->dv}}">
            </div>
            <label for="for_laboratory" class="col-sm-2 col-form-label">Laboratorio</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_laboratory">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_region_origin" class="col-sm-2 col-form-label">Región</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_region_origin" value="{{$suspectCase->patient->demographic->region->name}}">
            </div>
            <label for="for_unit_origin" class="col-sm-2 col-form-label">Unidad</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_unit_origin" >
            </div>
        </div>
        <div class="form-group row">
            <label for="for_province_origin" class="col-sm-2 col-form-label">Provincia</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_province_origin">
            </div>
            <label for="for_email_origin" class="col-sm-2 col-form-label">Correo Electrónico</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_email_origin" value="{{$suspectCase->establishment->email}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_commune_origin" class="col-sm-2 col-form-label">Comuna</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_commune_origin" value="{{$suspectCase->establishment->commune->name}}">
            </div>
            <label for="for_address_origin" class="col-sm-2 col-form-label">Médico</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_address_origin" value="{{$suspectCase->run_medic}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="for_address_origin" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_address_origin" value="{{$suspectCase->establishment->address}}">
            </div>
            <label for="for_address_origin" class="col-sm-2 col-form-label">Epivigila</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_address_origin" value="{{$suspectCase->epivigila}}">
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col-md-4">
                <h4 class="mb-3">
                    Antecedentes de la Muestra
                </h4>
            </div>
        </div>
        <div class="form-group row">
            <label for="for_sample_at" class="col-sm-1 col-form-label">Obtención</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="for_sample_at" value="{{Carbon\Carbon::parse($suspectCase->sample_at)->format('d/m/Y')  }}">
            </div>
            <div class="col-sm-6">

            </div>
        </div>

        <hr/>

        <div class="form-group row">
            <label for="for_sample_type" class="col-sm-1 col-form-label">Tipo de muestra</label>
            <div class="col-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                    <label class="form-check-label" for="defaultCheck1">
                        {{$suspectCase->sample_type}}
                    </label>
                </div>
            </div>
            <label for="for_sample_type" class="col-sm-1">Otro</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="for_establishment">
            </div>
            <label for="for_establishment_sample" class="col-sm-2">Establecimiento</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="for_establishment_sample"
                       value="{{$suspectCase->establishment->alias}}">
            </div>
        </div>

        <hr/>
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <h4 class="mb-3">--}}
{{--                    Síntomas--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <hr/>--}}

        <div class="form-group row">

            <label class="col-sm-1" for="for_symptoms" >Síntomas</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_symptoms" value="{{($suspectCase->symptoms === NULL) ? '' : (($suspectCase->symptoms === 1) ? 'Si' : 'No' ) }}">
            </div>

            <label class="col-sm-1" for="for_symptoms_at" >Inicio Síntomas</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="for_symptoms_at" value="{{($suspectCase->symptoms_at === NULL) ? '' : $suspectCase->symptoms_at}}">
            </div>

            <label class="col-sm-1" for="for_gestation" >Gestante</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_gestation" value="{{($suspectCase->gestation === NULL) ? '' : (($suspectCase->gestation === 1) ? 'Si' : 'No' )}}">
            </div>

            <label class="col-sm-1" for="for_gestation_week" >Semanas gestación</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_gestation_week" value="{{($suspectCase->gestation_week === NULL) ? '' : $suspectCase->gestation_week }}">
            </div>

            <label class="col-sm-1" for="for_functionary" >Funcionario salud</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_functionary" value="{{($suspectCase->functionary === NULL) ? '' : (($suspectCase->functionary === 1) ? 'Si' : 'No' )}}">
            </div>

        </div>

{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck1">--}}
{{--                        Fiebre sobre 38°C--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Dolor de garganta--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Mialgia--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Neumonía--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Encefalitis--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Tos--}}
{{--                    </label>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Rinorrea/congestión Nasal--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Dificultad respiratoria--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Hipotensión--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck1">--}}
{{--                        Cefalea--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Taquipnea--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Hipoxia--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Deshidratación o rechazo alimentario (lactantes)--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-4">--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Cianosis--}}
{{--                    </label>--}}
{{--                </div>--}}

{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Compromiso hemodinámica--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Consulta repetida por deterioro cuadro respiratorio--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                    <label class="form-check-label" for="defaultCheck2">--}}
{{--                        Enfermedad de base--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <input type="text" class="form-control" id="for_dv">--}}
{{--            </div>--}}

{{--        </div>--}}

        <hr/>

        <div class="row">
            <div class="col-md-4">
                <h4 class="mb-3">
                    Fallecimiento
                </h4>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Fallece
                    </label>
                </div>
            </div>
            <label for="for_vaccination_date" class="col-sm-2 col-form-label">Fecha Fallecimiento</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_vaccination_day" >
            </div>
            <label for="for_vaccination_day" class="col-sm-1 col-form-label">Día</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_vaccination_month" >
            </div>
            <label for="for_vaccination_month" class="col-sm-1 col-form-label">Mes</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="for_vaccination_year" >
            </div>
            <label for="for_vaccination_year" class="col-sm-1 col-form-label">Año</label>
        </div>
        <div class="form-group row">
            <label for="for_diagnosis" class="col-sm-3 col-form-label">Diagnostico de fallecimiento</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="for_diagnosis">
            </div>
        </div>

    </form>

@endsection
<style>
    @media print{
        @page {
            size: auto;   /* auto is the initial value */
            size: letter portrait;
            /*margin: 0;  !* this affects the margin in the printer settings *!*/
        }
    }

</style>
{{--<style type="text/css" media="print">--}}

{{--    body {--}}
{{--        zoom:92%; /* reducción */--}}
{{--    }--}}

{{--</style>--}}