<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <!-- Styles -->

</head>

<body>
    <div class="container">
        <div class="custom-title">
            <h1>Top Secret CIA Database</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="search-panel">
                    <form action="{{url('users')}}" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="birth_year">Birth Year</label>
                                    <input type="number" min="1900" max="2099" name="birth_year" value="{{$birth_year}}" class="form-control" id="birth_year" placeholder="Birth Year" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="birth_month">Birth Month</label>
                                    <input type="number" min="1" max="12" value="{{$birth_month}}" name="birth_month" class="form-control" id="birth_month" placeholder="Birth Month">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> &nbsp;</label>
                                    <button type="submit" class="btn custom-submit-search form-control">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pagination-box">
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Bitrh Day</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userData as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email_address}}</td>
                                    <td>{{$user->birthday}}</td>
                                    <td>{{$user->ip}}</td>
                                    <td>{{$user->country}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-box">
                            {{ $userData->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>