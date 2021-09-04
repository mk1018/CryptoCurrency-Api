@extends('layouts.app')

@section('content')

@foreach($addresses as $address)

<address-area-component
    v-bind:address='@json($address)'
    v-bind:bcinfo='@json($address->getBlockChainInfo)'
></address-area-component>

@endforeach

@endsection
