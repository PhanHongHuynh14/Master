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
    <div class="row" style="margin-top:8px">
        <div class="col-md-3">
            <ul>System
                <li>User management</li>
                <li>Role management</li>
                <li>Permissin management</li>
            </ul>
            <ul>Catalog
            <li>Prodct management</li>
            <li>Category management</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div>
                <h1>UserList</h1>
                <a href="login" class="btn btn-new">+Addnew</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aza</td>
                    <td>Aza@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png"alt=""></td>
                    <td>Thorn</td>
                    <td>Thorn@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=></td>
                    <td>Wish</td>
                    <td>Wish@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Aya</td>
                    <td>Aya@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
                    <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png" alt=""></td>
                    <td>Home</td>
                    <td>Home@gmail.com</td>
                    <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
                  </tr>

                </tbody>
              </table>
        </div>

    </div>
 </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
<style>
    .container{
  }
  .table{
    color:
  }
  .btn{
    position: relative;
  }
  .btn-new{
        background: #0d6efd;
        color: #ffffff;
        float:right;
        left: 0;
        bottom: 50px;
        width: 110px;
        border-radius: 5px
    }
    .btn-new:hover{
        background: #0d6efd;
        border: none;
        color: #ffffff;
    }
    .pagination{
        align-items: center;
        display: flex;
        justify-content: center;
    }
</style>
</body>
</html>