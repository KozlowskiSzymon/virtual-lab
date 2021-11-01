<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virtual Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script></head></head>
<body>
<header class="row">
    @include('components.navbar')
</header>
<div class="container">
    <div class="row"></div>
        <div class="col-12" style="padding: 20px 20px 20px 20px;">
            <h4>Users</h4>
            <hr>
            <form action="save-user" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    @if($toEdit)
                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$toEdit['name']}}">
                    @else
                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
                    @endif
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    @if($toEdit)
                        <input type="text" class="form-control" placeholder="Enter surname" name="surname" value="{{$toEdit['surname']}}">
                    @else
                        <input type="text" class="form-control" placeholder="Enter surname" name="surname" value="{{old('surname')}}">
                    @endif
                    <span class="text-danger">@error('surname') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    @if($toEdit)
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{$toEdit['email']}}">
                    @else
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                    @endif
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    @if($toEdit)
                        <input type="text" class="form-control" placeholder="Enter login" name="login" value="{{$toEdit['login']}}">
                    @else
                        <input type="text" class="form-control" placeholder="Enter login" name="login" value="{{old('login')}}">
                    @endif
                    <span class="text-danger">@error('login') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" value="">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role">
                        <option value="{{\App\Models\Role::Admin}}"
                        @if($toEdit && $toEdit['role'] == 'ADMIN') selected @endif>Admin</option>
                        <option value="{{\App\Models\Role::User}}"
                        @if($toEdit && $toEdit['role'] == 'USER') selected @endif>User</option>
                    </select>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group" style="margin-top: 20px;">
                    @if($toEdit)
                        <input type="hidden" value="{{$toEdit['id']}}" name="id" />
                        <button class="btn btn-block btn-primary" type="submit">Update</button>
                    @else
                        <button class="btn btn-block btn-primary" type="submit">Add</button>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-12" style="padding: 20px 20px 20px 20px;">
            <hr>
            <table>
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Login</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $row)
                    <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['surname']}}</td>
                        <td>{{$row['email']}}</td>
                        <td>{{$row['login']}}</td>
                        <td>{{$row['role']}}</td>
                        <td style="width: 5%; text-align: center; vertical-align: middle">
                            <form action="/edit-user" method="post">
                                @csrf
                                <input type="hidden" value="{{$row['id']}}" name="id" />
                                <button type="submit" class="btn btn-block btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td style="width: 5%; text-align: center; vertical-align: middle">
                            <form action="/delete-user" method="post">
                                @csrf
                                <input type="hidden" value="{{$row['id']}}" name="id" />
                                <button type="submit" class="btn btn-block btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>
