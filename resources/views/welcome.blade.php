@extends('layouts.app-layout')
@section('content')
    <h1>This is a welcome page - blade file</h1>

    <h2>Data from Controller: {{ $name }}</h2>

    <h2>Looping through an array</h2>
    @if ($a > $b)
        <p>a with value of {{$a}} is greater than b with the value of {{$b}}</p>
    @else
        <p>b with value of {{$b}} is greater than a with the value of {{$a}}</p>
    @endif

    @for ($i = 1; $i < 10; $i++)
        The current value is {{ $i }} <br>
    @endfor

    @foreach ($array as $item)
        <p>This is user {{ $item['name'] }} {{ $item['email'] }} {{ $item['address'] }}</p>
    @endforeach 
@endsection