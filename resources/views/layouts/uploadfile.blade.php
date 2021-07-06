<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'File Trade') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

       
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    
                </div>
            </header>

            <!-- Page Content -->
            <main>

            @if(session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <form action="{{route('uploadfile')}}" method="post" enctype="multipart/form-data">
            @csrf

            <br>
                <br>
                <div class="container">
                <div class="jumbotron">
                <div class="card text-center">
                <div class="card-header">
                    Trade Some File
                </div>
                <div class="card-body">

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username File Uploader</label>
                <input type="text" class="form-control"  name ="name" placeholder="Your Username">
                @error('name')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                </div>
                
                <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload file To trade</label>
                <input class="form-control"  type="file"  name="file" id="formFileMultiple" multiple>
                @error('file')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">File Description</label>
                <textarea class="form-control"  name="description" rows="3"></textarea>
                @error('description')
                <small class="text-danger"> {{$message}}</small>
                @enderror
                </div>
               
              
                </div>
                <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>

                </div>
                </div>

                </form>
                
            </main>
        </div>
    </body>
</html>
