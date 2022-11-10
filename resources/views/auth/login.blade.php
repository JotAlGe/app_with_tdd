<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        {{-- links bootstrap --}}
        @include('partials.links')
    </head>

    <body>
        <h1 class="text-center display-2">Login</h1>
        <div class="row">

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{route('login')}}" method="POST">

                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" id="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" value="Log in" class="btn btn-info">
                    </div>

                </form>

            </div>
            <div class="col-md-4"></div>
        </div>

    </body>

</html>
