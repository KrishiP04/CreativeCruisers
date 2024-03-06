@extends ('header')
@section ('content')
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Creative Cruisers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/adminAdd.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins') }}" rel='stylesheet'>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


        @yield('content')

    <div class="add-container">
        <h3>Add A New product</h3>
        <form method="POST" action="{{ route('admin_add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="file">File Input</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name of product" required autocomplete="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="price of product" required autocomplete="price">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('price') is-invalid @enderror" id="description" name="description" rows="3" required autocomplete="price"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select multiple class="form-control @error('category') is-invalid @enderror" id="category" name="category" required autocomplete='category'>
                    <option>Decks</option>
                    <option>Trucks</option>
                    <option>Wheels</option>
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Stock Number</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="Stock_num" name="Stock_num" placeholder="Stock number" required autocomplete="stock">
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

@endsection