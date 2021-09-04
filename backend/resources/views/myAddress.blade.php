@extends('layouts.app')

@section('content')

<add-address-component
    v-bind:blockchains='@json($block_chains)'
    :csrf="{{json_encode(csrf_token())}}"
></add-address-component>

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

@foreach($addresses as $address)

<address-area-component
    v-bind:address='@json($address)'
    v-bind:bcinfo='@json($address->getBlockChainInfo)'
    :csrf="{{json_encode(csrf_token())}}"
></address-area-component>

@endforeach

@endsection
