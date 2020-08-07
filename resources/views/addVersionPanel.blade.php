@extends('layouts.panel');


@section('content')

    <div class = "container">
        <div class = "row">

            <div class = "col-sm-4">
                <div class = "text-lg-center text-center">
                    <h2>Add version</h2>
                </div>

                <form class = "form-horizontal" action="/version" method="POST">
                @csrf

                    <div class="form-group">
                        <label class="control-label col-sm-5" for="start_date">Start date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="control-label col-sm-5">End date:</label>
                        <div class="col-sm-10">
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="control-label col-sm-5">Description:</label>
                        <div class="col-md-10">
                            <textarea class="span6 form-control" rows="10" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-left offset-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>

            <div class="col-sm-6">
                <div class = "text-lg-center text-center">
                    <h2>Version data</h2>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Start_date</th>
                        <th scope="col">End_date</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($versions as $ver)

                        <tr>
                            <td scope="row">{{ $ver['id'] }}</td>
                            <td>{{ $ver['start_date'] }}</td>
                            <td>{{ $ver['end_date'] }}</td>
                            <td>{{ $ver['description'] }}</td>
                            <td>   <form action="/version" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="delete_version_'.'{{ $ver["id"]}}'"  class="btn btn-success" value="Delete" />
                                    <input type="hidden" name="hidden_id" value='{{ $ver["id"]}}' />
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>


            </div>

        </div>

    </div>


@endsection
