@extends('layout')

@section('title', 'Products')

@section('content')

@if(session('success'))
<div class="row">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>
@endif

<div class="row flex">
        @foreach($products as $product)
        <section>

            <img src="{{ $product->photo }}" alt="{{ $product->name }}" />
              <h2>{{ $product->name }}</h2>
              <p>{{ Str::limit(strtolower($product->description), 50) }}</p>
              <aside>
                <ul>
                  <li>Price: {{ $product->price }}</li>
                  <li>In Stock</li>
                </ul>
                <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center add-to-cart" role="button">Add to cart</a>
              </aside>
        </section>
        @endforeach
    </div>
@endsection