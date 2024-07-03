<?php
session_start();
if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    header("Location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>Signup</title>
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
            <div class="card px-3 pt-3">
                <div class="row mb-1">
                    <div class="col">
                        <h1 class="card-title display-1">Signup</h1>
                        <hr>
                    </div>
                </div>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="signupUser">
                    <div class="row mb-1">
                        <div class="col">
                            <label for="email" class="form-text">Email Address</label>
                            <input type="email" class="form-control <?= empty($_SESSION["error"]["email"]) ? "" : "is-invalid" ?>" id="email" name="email" value="<?= empty($_SESSION["userData"]["email"]) ? "" : $_SESSION["userData"]["email"] ?>">
                            <?php if (!empty($_SESSION["error"]["email"])) { ?> <div class="text-danger py-1 mt-1" role="alert" style="font-size:12px;"> <?= $_SESSION["error"]["email"] ?> </div> <?php } ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="password" class="form-text">Password</label>
                            <input type="password" class="form-control <?= empty($_SESSION["error"]["password"]) ? "" : "is-invalid" ?>" value="<?= empty($_SESSION["userData"]["password"]) ? "" : $_SESSION["userData"]["password"] ?>" id="password" name="password">
                            <?php if (!empty($_SESSION["error"]["password"])) { ?> <div class="text-danger py-1 mt-1" role="alert" style="font-size:12px;"> <?= $_SESSION["error"]["password"] ?> </div> <?php } ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="password2" class="form-text">Confirm Password</label>
                            <input type="password" class="form-control <?= empty($_SESSION["error"]["password2"]) ? "" : "is-invalid" ?>" value="<?= empty($_SESSION["userData"]["password2"]) ? "" : $_SESSION["userData"]["password2"] ?>" id="password2" name="password2">
                            <?php if (!empty($_SESSION["error"]["password2"])) { ?> <div class="text-danger py-1 mt-1" role="alert" style="font-size:12px;"> <?= $_SESSION["error"]["password2"] ?> </div> <?php } ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="phone" class="form-text">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text">+92</span>
                                <input type="text" class="form-control <?= empty($_SESSION["error"]["phone"]) ? "" : "is-invalid" ?>" value="<?= empty($_SESSION["userData"]["phone"]) ? "" : $_SESSION["userData"]["phone"] ?>" id="phone" name="phone">
                            </div>
                            <?php if (!empty($_SESSION["error"]["phone"])) { ?> <div class="text-danger py-1 mt-1" role="alert" style="font-size:12px;"> <?= $_SESSION["error"]["phone"] ?> </div> <?php } ?>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="gender" class="form-text">Gender</label>
                            <select name="gender" id="gender" class="form-control <?= empty($_SESSION["error"]["gender"]) ? "" : "is-invalid" ?>">
                                <?php if (!empty($_SESSION["userData"]["gender"]) && $_SESSION["userData"]["gender"] == "male") { ?>
                                    <option value="choose" disabled>Choose an Option</option>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                <?php } else if (!empty($_SESSION["userData"]["gender"]) && $_SESSION["userData"]["gender"] == "female") { ?>
                                    <option value="choose" disabled>Choose an Option</option>
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                <?php } else { ?>
                                    <option value="choose" disabled selected>Choose an Option</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                <?php } ?>
                            </select>
                            <?php if (!empty($_SESSION["error"]["gender"])) { ?> <div class="text-danger py-1 mt-1" role="alert" style="font-size:12px;"> <?= $_SESSION["error"]["gender"] ?> </div> <?php } ?>
                        </div>
                    </div>

                    <hr>
                    <div class="row mt-1">
                        <div class="col">
                            <button class="btn btn-primary" style="width: 100%;">Signup</button>
                        </div>
                    </div>
                </form>
                <?php
                unset($_SESSION["userData"]);
                unset($_SESSION["error"]);
                ?>
                <div class="row mt-2">
                    <div class="col">
                        <a href="./login.php" class="btn btn-info" style="width: 100%;">Login Instead</a>
                    </div>
                    <div class="col">
                        <a href="./index.php" class="btn btn-outline-primary" style="width: 100%;">Home</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p class="text-center" style="font-size: 12px;">Ecommerce Store PHP © 2024</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>

</html>