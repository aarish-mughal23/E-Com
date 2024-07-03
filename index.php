<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Some Cool Font Name: Google Fonts -->

    <title>Ecommerce Store PHP</title>
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

        footer,
        body {
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <nav class="py-2 bg-body-tertiary border-bottom" id="navigationBar">
            <div class="d-flex flex-wrap px-5">
                <ul class="nav me-auto">
                    <li class="nav-item">
                        <a href="#main" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link link-body-emphasis px-2">Item2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link link-body-emphasis px-2">Item3</a>
                    </li>
                    <li class="nav-item">
                        <a href="#app" class="nav-link link-body-emphasis px-2">Item4</a>
                    </li>
                    <li class="nav-item me-5"1>
                        <a href="#about" class="nav-link link-body-emphasis px-2">Item5</a>
                    </li>
                    <div class="alert alert-success p-1" style="font-size: 10px;"><?= $_SESSION["dbSuccess"]; ?></div>
                    <?php if(!empty($_SESSION["dbSuccess"]) && $_SESSION["dbSuccess"]=="Database Deletion Successful"){?>

                        <li class="nav-item ms-5">
                            <form action="process.php" method="post">
                                <input type="hidden" name="action" value="ftsetup">
                                <button class="btn btn-outline-success" type="submit">Click Here to Setup Localhost Database</button>
                            </form>
                        </li>

                    <?php }else if(!empty($_SESSION["dbFail"])) { ?>

                        <li class="nav-item ms-5">
                            <form action="process.php" method="post">
                                <input type="hidden" name="action" value="fterror">
                                <button class="btn btn-outline-danger" type="submit">Database Setup Unsuccessful, Click to Drop Corrupt Database</button>
                            </form>
                        </li>

                    <?php } ?>
                </ul>
                <ul class="nav">
                    <li class="nav-item pe-2">
                        <a href="./login.php" class="btn btn-outline-primary px-2">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="./signup.php" class="btn btn-primary px-2">Sign up</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="row mb-4 border border-5 border-danger rounded-4 bg-secondary" style="height: 500px;">
        <div class="col d-flex flex-column justify-content-center align-items-center border border-5 border-success rounded-3">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">This will be the Home Page</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <p class="fst-italic text-center">This grey will be replaced by some image.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="container mt-3">
        <div class="row mb-4 border border-5 border-danger rounded-4 bg-secondary" style="height: 500px;">
            <div class="col d-flex content-align-center align-items-center border border-5 border-success rounded-3">
                <h1 class="display-1">Electronics</h1>
            </div>
            <div class="col d-flex content-align-center align-items-center border border-5 border-info rounded-3">
                <h5 class="display-5">Some Placeholder Image here.</h5>
            </div>
        </div>
        <div class="row mb-4 border border-5 border-danger rounded-4 bg-secondary" style="height: 500px;">
            <div class="col d-flex content-align-center align-items-center border border-5 border-info rounded-3">
                <h5 class="display-5">Some Placeholder Image here.</h5>
            </div>
            <div class="col d-flex content-align-center align-items-center border border-5 border-success rounded-3">
                <h1 class="display-1">Mechanics</h1>
            </div>

        </div>
        <div class="row mb-4 border border-5 border-danger rounded-4 bg-secondary" style="height: 500px;">
            <div class="col d-flex content-align-center align-items-center border border-5 border-success rounded-3">
                <h1 class="display-1">Home Appliances</h1>
            </div>
            <div class="col d-flex content-align-center align-items-center border border-5 border-info rounded-3">
                <h5 class="display-5">Some Placeholder Image here.</h5>
            </div>
        </div>
    </section>
    <div class="container">
        <footer class="row row-cols-2 row-cols-sm-2 row-cols-md-2 py-5 my-5 border-top">
            <div class="col-2">
                <div class="d-flex align-content-center">
                    <p> Ecommerce Store PHP </p>
                </div>
                <p class="text-muted">© 2024</p>
            </div>
            <div class="col-10 mb-0">
                <h5>Explore</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#main" class="nav-link p-0 text-muted">Home</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#features" class="nav-link p-0 text-muted">Item2</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#pricing" class="nav-link p-0 text-muted">Item3</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#app" class="nav-link p-0 text-muted">Item4</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link p-0 text-muted">Item5</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</body>

</html>