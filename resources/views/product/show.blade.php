@extends('layout')

@section('content')
    <div class="container">
        <div>
            <h5>{{ $product->name }}</h5>
            <div>{{ $product->description }}</div>
            @foreach($product->images as $image)
                <img src="{{ $image }}" width="250" />
            @endforeach
        </div>

        @include('product.addtocart')
    </div><!-- /.container -->
@stop