@extends('layouts.app')



@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Menus CRUD</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('menuCRUD.create') }}"> Create New Menu</a>

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

            <th>Menu</th>

            <th>Active?</th>

            <th width="280px">Action</th>

        </tr>
        @foreach ($menus as $key => $menu)

            <tr>
                <td>{{ $menu->id }}</td>

                <td>{{ $menu->menu }}</td>

                <td><strong>{{ $menu->active?'yes':'no' }}</strong></td>

                <td>

                    <a class="btn btn-info" href="{{ route('menuCRUD.show',$menu->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('menuCRUD.edit',$menu->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['menuCRUD.destroy', $menu->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>
@endsection