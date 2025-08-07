@extends('cms.layout')

@section('title',$page['title'])

@section('Cabeçalho',$page['title'])

@section('contentA')
    <h1>{{$page['slug']}}</h1>
@endsection

@section('ContentB')
    <h6>{!! $page['body'] !!}</h6>
@endsection
