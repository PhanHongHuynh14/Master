<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
{{-- <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> --}}
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
                <div class="col-md-9">
                    <div>
                        <h1>Create a user</h1>
                        <a href="createuser" class="btn btn-back">Back</a>
                    </div>
                    <form class="row" action="" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập email của bạn">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập password">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lại password">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Address">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Youtobe</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripion</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bt">
                        <button type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
         </div>
         <div class="col-md-12">
            <div class="footer">FOOTER</div>
          </div>
     </div>
</body>

<style>
    .gol {
        font-size: 20px;
        text-align: center;
        padding-top: 10px;
    }
    .header{
        font-size: 20px;
        text-align: center;
        padding-top: 10px;
    }
    .headerbg{
        background: #c0f6fa;
    }
    .clearfix {
        overflow: auto;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .btn-back{
        background: #0d6efd;
        color: #ffffff;
        float:right;
        right: 92px;
        bottom: 50px;
        width: 70px;
        border-radius: 5px
    }
    .bt{
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .btn-back:hover{
        background: #0d6efd;
        border: none;
        color: #ffffff;
    }
    .btn{
        position: relative;
        margin: 10px
    }
    .btn-primary{
        margin-top: 10px;
        width: 70px;
        border-radius: 5px;
    }
    .btn-secondary{
        margin-top: 10px;
        width: 70px;
        border-radius: 5px;
    }
    .page{
        margin-top: 55px;
    }
    h2{
        padding-left: 16px;
        margin: -4px 0 4px 0;
        width: 204px;
    }
    .menu{
        height: 100%;
        width: 100%;
        background-color: #E7E9EB;
        overflow-y: scroll;
        overflow-x: hidden;
        padding-top: 20px;
        display: block;
        font-family: Verdana,sans-serif;
        font-size: 15px;
        line-height: 1.5;
}
    a{
        font-family: "Segoe UI",Arial,sans-serif;
        text-decoration: none;
        display: block;
        padding: 2px 1px 1px 16px;
        color: inherit;
        background-color: transparent;
        box-sizing: inherit;
}
    a:hover{
        color: #000000;
        background-color: #CCCCCC;
    }
    .footer{
        font-size: 20px;
        max-width: 500;
        background: #c0f6fa;
        text-align: center;
        height: 50px;
        padding: 10px
    }
</style>
</html>
