@extends('layouts.panel');


@section('content')

    <div class = "container">
        <div class = "row">

            <div class = "col-sm-4">
                <div class = "text-lg-center text-center">
                    <h2>Adauga reducere</h2>
                </div>

                <form class = "form-horizontal" action="/versionMultipliers" method="POST">
                    @csrf


                    <div class="form-group">
                        <label for="version_id" class="control-label col-sm-5">Version id:</label>
                        <div class="col-sm-10">
                            <input type="number" id="version_id" name="version_id" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="multiplier_id" class="control-label col-sm-5">Multiplier id:</label>
                        <div class="col-md-10">
                            <input type="number"  class="span6 form-control" rows="10" id="multiplier_id" name="multiplier_id">
                        </div>
                    </div>

                    <div class="d-flex justify-content-left offset-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>







            <div class="col-sm-8">
                <div class = "text-lg-center text-center">
                    <h2>Reduceri</h2>
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

                    @foreach($versionMultipliers as $vm)

                        <tr>
                            <td scope="row">{{ $vm['id'] }}</td>
                            <td>{{ $vm['version_id'] }}</td>
                            <td>{{ $vm['multiplier_id'] }}</td>
                            <td>   <form action="/versionMultipliers" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="delete_version_'.'{{ $vm["id"]}}'"  class="btn btn-success" value="Delete" />
                                    <input type="hidden" name="hidden_id" value='{{ $vm["id"]}}' />
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>





            <div class="col-sm-6">
                <div class = "text-lg-center text-center">
                    <h2>Versiuni</h2>
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

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>



            <div class="col-sm-6">
                <div class = "text-lg-center text-center">
                    <h2>Multiplicatoare</h2>
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

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>



        </div>

    </div>


@endsection
