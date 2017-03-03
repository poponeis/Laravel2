@extends('layouts.app')
@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2> Show Application</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('applicationCRUD.index') }}"> Back</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>ID:</strong>

            {{ $application->id }}

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Application:</strong>

            {{ $application->application }}

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Active:</strong>

            {{ $application->active?'yes':'no' }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Menu:</strong>

            {{ $application->menu->menu }}

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Created Date:</strong>

            {{ $application->created_at }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Updated Date:</strong>

            {{ $application->updated_at }}

        </div>

    </div>


</div>

@endsection