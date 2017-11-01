@extends('layouts.app')

@section('content')
    @foreach($properties as $property)
        <properties-quick
                property='{{ $property }}'
        ></properties-quick>
    @endforeach
@endsection