@extends('layouts.app')

@section('content')
    <properties-edit
            property='{{ $property }}'
    ></properties-edit>
@endsection