@extends('layouts.template')
@section('title', 'Panel')
@section('content')
<div>
    <x-siderbar attribute="value" />
</div>
@livewire('show-users')
@endsection
