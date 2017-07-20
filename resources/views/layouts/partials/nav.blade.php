<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Business Classifieds') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><router-link to='/' exact><i class="fa fa-home"></i> Home</router-link></li>
                <li><router-link to='/categories'><i class="fa fa-th"></i> Categories</router-link></li>
                <li><router-link to='/list-your-business'><i class="fa fa-pencil"></i> List Your Business</router-link></li>
                <li><router-link to='/login'><i class="fa fa-pencil"></i> Login</router-link></li>
            </ul>
            <user-login-nav></user-login-nav>
        </div>
    </div>
</nav>