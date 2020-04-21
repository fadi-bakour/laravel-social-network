<div class="container font-weight-bold border border-primary  rounded">
    <div class="row ">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav flex-column pl-2">
                    <li class="pt-2">
                        <a href="{{ route ('home') }} ">
                            Home
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/profile/{{ auth()->user()->username }}">
                            profile
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/notifications">
                            Notifications
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/search">
                            Explore
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/following">
                            following
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="{{ route('followers') }}">
                            followers
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/news">
                            News
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/aboutmalaysia">
                            About Malaysia
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/contactus">
                            Contact us
                        </a>
                    </li>
                    @can('root')
                        <li class="pt-2">
                            <a href="/manager">
                                Edit Roles
                            </a>
                        </li>
                    @endcan
                    <li class="pt-2">
                        <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
             
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

{{-- <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li> --}}


