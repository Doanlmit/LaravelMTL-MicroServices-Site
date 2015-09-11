@extends('layout')

@section('content')
    <div class="container">
        <ul>
            @foreach($products as $product)
                <li class="product">
                    <div>
                        <h5><a href="/products/{{ $product->id }}">{{ $product->name }}</a></h5>
                        <img src="{{ $product->images[0] }}" width="50" />
                        <div>{{ $product->description }}</div>
                    </div>

                    @include('product.addtocart')
                </li>
            @endforeach
        </ul>

    </div><!-- /.container -->
@stop