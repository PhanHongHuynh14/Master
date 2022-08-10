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
                  <a target="_top" href="{{ route('admin.user.store') }}">{{ __('message.usermanagement')}}</a>
                  <a href="{{ route('admin.role.store') }}">{{ __('message.rolemanagement')}}</a>
                  <a href="{{ route('admin.permission.store') }}">{{ __('message.permissionmanagement')}}</a>
                  <a href="{{ route('admin.permission-group.store') }}">{{ __('message.permissiongroup')}}</a>
                <br>
                <h2>
                  <span>
                    {{ __('message.catalog')}}
                  </span>
                </h2>
                  <a target="_top" href="{{ route('admin.product.store') }}">{{ __('message.productmanagement')}}</a>
                  <a href="{{ route('admin.category.store') }}">{{ __('message.categorymanagement')}}</a>
                <h2 style="padding-top: 16px">
                    <span>
                        {{ __('message.language')}}
                    </span>
                </h2>
                <a href="{!! route('locale.setting', ['en']) !!}">EN</a>
                <a href="{!! route('locale.setting', ['vi']) !!}">VN</a>
            </div>

        </div>
        @yield('content')
      <div class="col-md-12">
        <div class="footer">FOOTER</div>
      </div>
 </div>
