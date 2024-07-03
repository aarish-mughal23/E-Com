<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>Login</title>
    <style>
        body {
            --s: 140px;
            /* control the size*/
            --c1: #170409;
            --c2: #67917a;

            --_g: #0000 52%, var(--c1) 54% 57%, #0000 59%;
            background:
                radial-gradient(farthest-side at -33.33% 50%, var(--_g)) 0 calc(var(--s)/2),
                radial-gradient(farthest-side at 50% 133.33%, var(--_g)) calc(var(--s)/2) 0,
                radial-gradient(farthest-side at 133.33% 50%, var(--_g)),
                radial-gradient(farthest-side at 50% -33.33%, var(--_g)),
                var(--c2);
            background-size: calc(var(--s)/4.667) var(--s), var(--s) calc(var(--s)/4.667);
        }
    </style>
</head>

<body>
    <div class="row d-flex content-align-center align-items-center vh-100">
        <div class="col"></div>
        <div class="col">
            <div class="card p-3">
                <div class="row mb-1">
                    <div class="col">
                        <h1 class="card-title display-1">Login</h1>
                        <hr>
                    </div>
                </div>
                <form action="#">


                    <div class="row mb-1">
                        <div class="col">
                            <label for="email" class="form-text">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="password" class="form-text">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <a href="#" class="form-text" style="font-size: 10px;">Forgot Password?</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-1">
                        <div class="col">
                            <button class="btn btn-primary" style="width: 100%;">Login</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                    <div class="col">
                        <a href="./signup.php" class="btn btn-info" style="width: 100%;">Register Instead</a>
                    </div>
                    <div class="col">
                        <a href="./index.php" class="btn btn-outline-primary" style="width: 100%;">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>

</html>