@extends('layouts.app')

@section('content')

<share-address-component
  v-bind:user='@json($user)'
></share-address-component>

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
  :csrf="{{json_encode(csrf_token())}}"
></address-area-component>

@endforeach

@endsection
