<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        {{-- links --}}
        @include('partials.links')
    </head>

    <body>
        <h1 class="text-center display-2">Register</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>
                            Name:
                            <input type="text" name="name" class="form-control form-control-lg">
                            @error('name')
                            <span class="text-danger">
                                {{ $mesage }}
                            </span>
                            @enderror
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            Email:
                            <input type="email" name="email" class="form-control form-control-lg">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>

                    </div>

                    <div class="form-group">
                        <label>
                            Password:
                            <input type="password" name="password" class="form-control form-control-lg">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            Password Confirmation:
                            <input type="password" name="password_confirmation" class="form-control form-control-lg">
                            @error('password_confirmation')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </label>

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-info">Register</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>

</html>
