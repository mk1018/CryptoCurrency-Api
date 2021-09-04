@extends('layouts.public')

@section('content')

@if($name==null and count($addresses)==0)

  対象者がいません

@else

  {{$name}}

  @foreach($addresses as $address)
  <public-address-area-component
    v-bind:address='@json($address)'
    v-bind:bcinfo='@json($address->getBlockChainInfo)'
  ></public-address-area-component>
  @endforeach

@endif

@endsection
