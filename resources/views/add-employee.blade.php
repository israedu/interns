<html>
    <head>
        <title>Add/Update Employee</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
<body>
    <div class="container">
        <h1>{{ isset($editEmp) ? 'Update Employee' : 'Add New Employee' }}</h1>

        <form action="{{ isset($editEmp) ? route('update-employee') : route('store-employee') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($editEmp))
                <input type="hidden" name="id" value="{{ $editEmp->id }}">
            @endif

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required
                    value="{{ isset($editEmp) ? $editEmp->name : '' }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required
                    value="{{ isset($editEmp) ? $editEmp->email : '' }}">
            </div>

            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" class="form-control" required
                    value="{{ isset($editEmp) ? $editEmp->position : '' }}">
            </div>

            <input type="submit" value="{{ isset($editEmp) ? 'Update Employee' : 'Add Employee' }}" class="btn btn-primary">
        </form>

        @php
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
                        <td class="d-flex">
                            <form action="{{ route('delete-employee') }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $emp->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <form action="{{ route('edit-employee') }}" method="GET" style="display: inline-block;">
                                <input type="hidden" name="id" value="{{ $emp->id }}">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
