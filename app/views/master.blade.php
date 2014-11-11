<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
        
        <title>Zap messenger</title>
        
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        
        <link rel="stylesheet" href="css/style.css">
        @yield('href')
        
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-41480445-1', 'purecss.io');
        ga('send', 'pageview');
        </script>
        
    </head>
    <body>
         
        
        <div id="layout">
            <!-- Menu toggle -->
            <a href="#menu" id="menuLink" class="menu-link">
                <!-- Hamburger icon -->
                <span></span>
            </a>
            
            <div id="menu">
                <div class="pure-menu pure-menu-open">
                    <a class="pure-menu-heading">User menu</a>
                    
                    <ul>
                        <li><a href="/">Home</a></li>

                 
                        @if(Auth::check())
                        <li><a href="creategroup">+ Group </a></li>
                        <li><a href="message">Message</a></li>
                        <li><a href="logout">Log out</a></li> 
                        @else
                        <li><a href="signup">Sign up </a></li>
                        <li><a href="login">Log in</a></li> 
                        @endif
                    </ul>
                </div>
            </div>
            
            <div id="main">
                <div class="header">
                    @yield('header')
                    
                </div>
                
                <div class="content">
                    @yield('content')
                    
                    @if(Session::get('flash_message'))
                     <div class='flash-message'>{{ Session::get('flash_message') }}</div>
                     @endif
                </div>
            </div>
        </div>
        
        <script src="js/ui.js"></script>
        
    </body>
</html>
