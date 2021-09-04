@extends('layouts.app')

@section('content')

<add-address-component
    v-bind:blockchains='@json($block_chains)'
    :csrf="{{json_encode(csrf_token())}}"
></add-address-component>

@foreach($addresses as $address)

<address-area-component
    v-bind:address='@json($address)'
    v-bind:bcinfo='@json($address->getBlockChainInfo)'
></address-area-component>

@endforeach

@endsection
