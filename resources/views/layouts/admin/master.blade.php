<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<div class="container">
    <div class="row headerbg">
        <div class="col-md-3">
            <h1 class="gol">GOL SOFT</h1>
        </div>
        <div class="col-md-9">
            <h1 class="header">HEADER</h1>
        </div>
    </div>
    <div class="row" style="margin-top:8px">
        <div class="col-md-3 ">
            <div class="menu">
                <h2>
                  <span>
                    System
                  </span>
                </h2>
                  <a target="_top" href="">User management</a>
                  <a href="">Role management</a>
                  <a href="">Permssion management</a>
                <br>
                <h2>
                  <span>
                    Catalog
                  </span>
                </h2>
                  <a target="_top" href="">Product management</a>
                  <a href="">Category management</a>
                </div>
        </div>
        @yield('content')
      <div class="col-md-12">
        <div class="footer">FOOTER</div>
      </div>
 </div>





</body>
</html>
