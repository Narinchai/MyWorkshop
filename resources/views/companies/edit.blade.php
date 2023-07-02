<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <title>EditData</title>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit company</h2>
            </div>
                <div>
                    <a href="{{ route ('companies.index')}}" class="btn btn-primary"> back index</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{route('companies.update',$company->id)}}" method="POST" enctype="multipart/form-data">
@csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <strong>company name</strong>
                                <input type="text" name="name" id=""class="form-control" value="{{ $company->name }}" placeholder="company name">
                                    @error('name')
                                    <div class="alert alert-danger">{{$messege}}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <strong>company Email</strong>
                                <input type="email" name="email" id=""class="form-control" value="{{ $company->email }}" placeholder="company email">
                                    @error('email')
                                    <div class="alert alert-danger">{{$messege}}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <strong>company address</strong>
                                <input type="text" name="address" id=""class="form-control"  value="{{ $company->address }}" placeholder="company address">
                                    @error('address')
                                    <div class="alert alert-danger">{{$messege}}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-12"><button type="submit" class="btn btn-primary">Submit</button></div>
                       

                    </div>
                </form>

        </div>
    </div>
</body>
</html>