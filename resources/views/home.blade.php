@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <form action="{{url('excel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-2">
                                <!-- <label for="file">Choose Excel File</label> -->
                                <input type="file" name="file">
                            </div>
                            <div class="col-md-10 text-right">
                                <input type="submit" value="Upload Excel" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>      
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Employee Email</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value['employee_id']}}</td>
                                    <td>{{$value['employee_name']}}</td>
                                    <td>{{$value['employee_email']}}</td>
                                    <td><a href="{{ url('pdf/'.$value['employee_id']) }}">Preview</a></td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
