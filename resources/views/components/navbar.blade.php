<nav id="nav">
    <form  method="POST" id="logout_form" action="{{url('/logout')}}"  style="display: none">
        @csrf

    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="index.html">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('web.cat')}}<span class="caret"></span></a>
            <ul class="dropdown-menu">

                @foreach ($cats as $cat)
                <li><a href="{{url("categories/show/{$cat->id}")}}">{{($cat->name())}}</a></li>

                @endforeach



              <li><a href="#">Design</a></li>
              <li><a href="#">Management</a></li>
            </ul>
        </li>
        <li><a href="{{url('contact')}}">{{__('web.contact')}}</a></li>
        @guest
        <li><a href="{{url('login')}}">{{__('web.signin')}}</a></li>
        <li><a href="{{url('register')}}">{{__('web.signup')}}</a></li>
        @endguest
         @auth
        @if (Auth::user()->role->name=='student')
        <li><a href="{{url('profile')}}">{{__('web.profile')}}</a></li>
        @endif

         <li><a id="logout-link" href="#">{{__('web.signout')}}</a></li>
         @endauth



        @if (App::getLocale()=="ar")
        <li><a href="{{url('lang/set/en')}}">En</a></li>
        @else

        <li><a href="{{url('lang/set/ar')}}">ar</a></li>
        @endif
    </ul>
</nav>
<!-- /Navigation -->
