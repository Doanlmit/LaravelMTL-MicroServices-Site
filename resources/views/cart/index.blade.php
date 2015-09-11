@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">Name</div>
            <div class="col-sm-6">Description</div>
            <div class="col-sm-2">Price</div>
        </div>
        @foreach($items as $item)
            <div class="row">
                <div class="col-sm-4"><a href="/products/{{ $item->id }}">{{ $item->name }}</a></div>
                <div class="col-sm-6">{{ $item->description }}</div>
                <div class="col-sm-2">{{ $item->price }}</div>
            </div>
        @endforeach
    </div><!-- /.container -->
@stop