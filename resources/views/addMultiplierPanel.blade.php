@extends('layouts.panel');


@section('content')

    <div class = "container">
        <div class = "row">

            <div class = "col-sm-4">
                <div class = "text-lg-center text-center">
                    <h2>Add multiplier</h2>
                </div>

                <form class = "form-horizontal" action="/multiplier" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-sm-5" for="name">Name:</label>
                        <div class="col-sm-10">
                            <select size="3" class="form-control" id="name" name="name">
                                <option value="region">Region</option>
                                <option value="age">Age</option>
                                <option value="category">Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="identifier" class="control-label col-sm-5">Identifier:</label>
                        <div class="col-sm-10">
                            <input type="text" id="identifier" name="identifier" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="multiplier" class="control-label col-sm-5">Multiplier:</label>
                        <div class="col-md-10">
                            <input type="number" step="0.01" class="span6 form-control" rows="10" id="multiplier" name="multiplier">
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
                        <th scope="col">Name</th>
                        <th scope="col">Identifier</th>
                        <th scope="col">Multiplier</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($multipliers as $mul)

                        <tr>
                            <td scope="row">{{ $mul['id'] }}</td>
                            <td>{{ $mul['name'] }}</td>
                            <td>{{ $mul['identifier'] }}</td>
                            <td>{{ $mul['multiplier'] }}</td>
                            <td>   <form action="/multiplier" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="delete_multiplier_'.'{{ $mul["id"]}}'"  class="btn btn-success" value="Delete" />
                                    <input type="hidden" name="hidden_id" value='{{ $mul["id"]}}' />
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
