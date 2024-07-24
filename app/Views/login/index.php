<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="<?= base_url('/img/logop3e.png'); ?>" rel="icon" type="image/png">
    <link href="<?= base_url('css/custom.css'); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(img/bg.jpg) no-repeat;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
        }

        @media screen and (max-width: 600px) {
            body {
                background-size: cover;
            }
        }
    </style>

</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4" style="width: 350px;">

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <img class="card-img-top" src="<?= base_url('img/logop3e.png') ?>" style="width: 180px; height: 180px;" alt="User Logo">

            <div class="card-body">
                <h3 class="card-title text-center text-primary">Login</h3>
                <form action="<?= base_url('login/proses') ?>" method="POST">

                    <div class="mb-3">
                        <input type="email" class="form-control rounded-pill <?= session('errors.email') ? 'is-invalid' : '' ?>" name="email" placeholder="Email" autofocus>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control rounded-pill <?= session('errors.password') ? 'is-invalid' : '' ?>" name="password" placeholder="Password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary rounded-pill" value="Login">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>