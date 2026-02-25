@extends('base')

@section('content')

    <h1></h1>
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        @foreach($products as $product)
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }}</p>
            <p>{{ $product->description }}</p>
            <p>{{ $product->qty }}</p>
            <a href="/products/{{ $product->id }}">cliquer pour voir le produit</a>
        @endforeach
    @endif
    
    <form action="/products" method="post">
        @csrf
     <label for="name" >Name</label>
     <input type="text" name="name" placeholder="Enter your name"> <br>

    <label for="price">Price</label>
     <input type="text" name="price" placeholder="Enter your price"> <br>
     
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter your description"></textarea> <br>
    <label for="qty">Quantity</label>
    <input type="number" name="qty" id="qty" placeholder="Enter your quantity"> <br>
     <button type="submit">Submit</button>

    </form>

    <form action="/delete_All" method="delete">
        @csrf
        @method('DELETE')
        <button type="submit">Delete All Products</button>
    </form>

    
@endsection