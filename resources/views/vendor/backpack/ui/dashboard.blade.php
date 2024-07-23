@extends(backpack_view('blank'))
@section('before_breadcrumbs_widgets')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    </head>

    <body>
    <img src="public\uploads\download.jpeg"class="img-fluid" alt="   ">
      
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        
            <header class="app-header bg-light border-0 navbar">
                <div class="container-fluid d-flex justify-content-between p-2">
                    <ul class="nav navbar-nav d-md-down-none">
                        <div class="card border-0 text-white bg-info">
                            <div class="card-body">
                                <div class="text-value">132</div>

                                <div class="card-title">Registered users.</div>

                                <div class="progress progress-white progress-xs my-2">
                                    <div class="progress-bar" role="progressbar" style="width: 13.2%" aria-valuenow="13.2"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <small class="card-text">868 more until next milestone.</small>
                            </div>
                        </div>
                    </ul>
            </header>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection
