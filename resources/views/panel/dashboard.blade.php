@extends('layouts.template')
@section('title', 'Panel')
@section('content')
<div>
  <x-siderbar attribute="value" />
</div>
<div class="w-full flex flex-col h-screen overflow-y-hidden">
  <x-nav attribute="value" />
  <h1 class="text-3xl m-3">Dashboard</h1>
</div>
@endsection
