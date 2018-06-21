@extends('layouts.admin')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                N0:
            </th>
            <th>
                Profile Image
            </th>
            <th>
                Lecturer No:
            </th>
            <th>
                Name
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($lecturers as $lecture)
            <tr>
                <td>{{$number++}}</td>
                <td><img src="{{asset('/images/default.jpg')}}" style="height: 40px; width: 40px; border-radius: 50%" ></td>
                <td>{{$lecture->lect_number}}</td>
                <td>{{$lecture->name}}</td>
                <td><a href='{{url("/edit/update/{$lecture->id}")}}'><button class="btn btn-success">Edit</button> </a> </td>

            </tr>
        @endforeach
        </tbody>
    </table>


@endsection