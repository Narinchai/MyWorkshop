<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laravel Crud</title>
    </head>
    <body>
            <div class="container mt-2">
                <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>laravel 9 crud example</h2>
                </div>
                <div>
                    <a href="{{ route ('companies.create')}}" class="btn btn-success"> Create company</a>
                </div>
                @if($messege = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $messege }}</p>
                </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th> No. </th>
                        <th> Company Name </th>
                        <th> Email </th>
                        <th> Address </th>
                        <th width="250px"> Action </th>
                    </tr>
                    @foreach($companies as $company)
                    <tr>
                        <td> {{$company->id}}</td>
                        <td> {{$company->name}}</td>
                        <td> {{$company->email}}</td>
                        <td> {{$company->address}}</td>
                        <td><form action="{{ route ('companies.destroy',$company->id)}}" method="POST">
                            <a href="{{ route ('companies.edit',$company->id)}}"class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </table>
                    {!! $companies->links() !!}
            </div>
            </div>

</body>
</html>