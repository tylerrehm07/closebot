@extends('layouts.app')

@section('content')
    <properties-view
            property='{{ $property }}'
    ></properties-view>
@endsection