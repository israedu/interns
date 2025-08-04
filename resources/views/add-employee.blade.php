<html>
    <head>
        <title>Add Employee</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <h1>Add New Employee</h1>   
            <form action="{{ route('store-employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" class="form-control" required>
                </div>
                <input type="submit" value="Add Employee" class="btn btn-primary">
            </form>
            <@php
                $emps = \App\Models\Employee::all();
                
            @endphp
            <table border="1" class="table mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emps as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->name }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->position }}</td>
                            <td>
                                <form action="{{ route('delete-employee') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $emp->id }}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>
