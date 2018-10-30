@extends('layouts.app')
@section('content')
    
<div class="content">
    <div class="title m-b-md">
        About Us
    </div>
</div>
<div class="container">
    {{-- dd($persons) --}}
    @foreach($persons as $person)
        {{ $person['firstname'] . " " . $person['lastname'] }}
        <br>
    @endforeach
    <h3 style="color: #ccc;"> {{$author}} </h3>
</div>
@endsection
