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
                  <a target="_top" href="{{ route('admin.user.store') }}">User management</a>
                  <a href="{{ route('admin.role.store') }}">Role management</a>
                  <a href="{{ route('admin.permission.store') }}">Permssion management</a>
                  <a href="{{ route('admin.permission-group.store') }}">Permssion Group</a>
                <br>
                <h2>
                  <span>
                    Catalog
                  </span>
                </h2>
                  <a target="_top" href="{{ route('admin.product.store') }}">Product management</a>
                  <a href="{{ route('admin.category.store') }}">Category management</a>
                </div>
        </div>
        @yield('content')
      <div class="col-md-12">
        <div class="footer">FOOTER</div>
      </div>
 </div>
