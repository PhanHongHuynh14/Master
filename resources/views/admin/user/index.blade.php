@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>UserList</h1>
        <a href="{{ route('admin.user.create')}}" class="btn btn-new">+Addnew</a>
        <a href="{{ route('admin.mails.create')}}" class="btn btn-sendmail">Send mail</a>
    </div>
    <div>

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
@endsection
