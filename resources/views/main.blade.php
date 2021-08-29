@extends('layouts.ml')

@section('content')

    <navbar></navbar>
    <mainc></mainc>
    <router-view :key="$route.fullPath"></router-view>
    <router-view name='a'></router-view>
    <router-view name='b'></router-view>

    <!-- <map></map> -->
    <!-- <seo></seo> -->
    <foot></foot>

@endsection