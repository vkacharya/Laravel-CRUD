@extends('pages.layout.masterlayout')

@section('title')
post page
@endsection

@section('content')
post page content
@endsection

@section('sidebar')
@parent
<ul>
    <li>first</li>
    <li>second</li>
    <li>third</li>
</ul>
@endsection