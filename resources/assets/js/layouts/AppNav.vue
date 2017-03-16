<template>
    <nav class="navbar navbar-inverse navbar-static-top">
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
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.png" style="height: 32px;">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <router-link tag="li" :to="{ name: 'dashboard' }">
                        <a><i class="fa fa-fw fa-btn fa-dashboard"></i> Dashboard</a>
                    </router-link>&nbsp;
                </ul>

                <div class="col-sm-3 col-md-3">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Dominik Geimer <span class="caret"></span>
                        </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <router-link :to="{ name: 'settings-security' }">
                                        <i class="fa fa-fw fa-btn fa-cogs"></i> Settings
                                    </router-link>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="/logout"><i class="fa fa-fw fa-btn fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
    // When your page loads
    $(function(){
        // When the toggle areas in your navbar are clicked, toggle them
        $("#search-button, #search-icon").click(function(e){
            e.preventDefault();
            $("#search-button, #search-form").toggle();
        });
    })
</script>
