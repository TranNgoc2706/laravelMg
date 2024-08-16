@extends('main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px ">ID</th>
            <th>Tên user</th>
            <th>email </th>
            <th>password </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/edit/{{ $user->id }}">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$user->id}},'/destroy');">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


@endsection
