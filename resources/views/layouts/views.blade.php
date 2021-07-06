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
        
        <!-- Data Table link -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
       
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
            <div class="container">
            <div class="jumbotron">
            <table class="table table-bordered">
            <thead class="table-white">
            <br>
            <script>
            $(document).ready(function(){
                $('.table').DataTable()
            })
            </script>
            <tr>
            <th scope ="col">Name of Uploaders</th>
            <th scope ="col">File</th>
            <th scope ="col">Description</th>
            <th scope="col">Download</th>
            <th scope="col">Actions</th>
            


            </tr>
            </thead>
            <tbody>
            @foreach($s as $storage)
            <tr>
            <td>{{$storage->name}}</td>
            <td>{{$storage->file}}</td>
            <td>{{$storage->description}}</td>
            <td><a href="/file/download/{{$storage->file}}">Download</a></td>
            <td><a href="{{route('fileedit',['id'=>$storage->id])}}">Edit</a>
            <form action="{{route('deletefile',['id'=>$storage->id])}}" method="post">
            @csrf
            <a href="{{route('deletefile',['id'=>$storage->id])}}">Delete</a>
            </form>
           
            </td>
            
            </tr>
            @endforeach
            </tbody>
            </table>
           

            </div>
            </div>

            </main>
        </div>
    </body>
</html>
