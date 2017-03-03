@extends('layouts.app')



@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Applications CRUD</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('applicationCRUD.create') }}"> Create New Application</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>
            <th>ID</th>

            <th>Application</th>

            <th>Menu</th>

            <th>Active?</th>

            <th width="280px">Action</th>

        </tr>
        @foreach ($applications as $key => $application)

            <tr>
                <td>{{ $application->id }}</td>

                <td>{{ $application->application }}</td>

                <td>{{ $application->menu->menu }}</td>

                <td><strong>{{ $application->active?'yes':'no' }}</strong></td>

                <td>

                    <a class="btn btn-info" href="{{ route('applicationCRUD.show',$application->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('applicationCRUD.edit',$application->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['applicationCRUD.destroy', $application->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>
@endsection