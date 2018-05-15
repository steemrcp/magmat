<!DOCTYPE doctype html>
<!--[if lt IE 7 ]><html itemscope itemtype="https://schema.org/" id="ie6" class="ie" lang="en-US"><![endif]-->
<!--[if IE 7 ]>   <html itemscope itemtype="https://schema.org/" id="ie7" class="ie" lang="en-US"><![endif]-->
<!--[if IE 8 ]>   <html itemscope itemtype="https://schema.org/" id="ie8" class="ie" lang="en-US"><![endif]-->
<!--[if IE 9 ]>   <html itemscope itemtype="https://schema.org/" id="ie9" class="ie" lang="en-US"><![endif]-->
<!--[if gt IE 9]><!-->
<html itemscope="" itemtype="https://schema.org/" lang="en-US">
    <!--<![endif]-->
    <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <title>
            Magmat | A first financial and assest management tool for companies
        </title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
        <meta content="yes" name="apple-mobile-web-app-capable"/>
        <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style"/>
        <meta content="Scotch Scotch scotch" name="application-name"/>
        <meta content="#2A2A2A" name="msapplication-TileColor"/>
        <!-- CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="/css/main.css" rel="stylesheet"/>
        <script src="/js/app.js">
        </script>
    </head>
    <body class="pages-account admin-signup">
        <header class="wrapper" style="margin-top: 40px;">
            @include('layout._header')
        </header>

    @yield('content')
        @include('layout.footer-basic')
        <script src="/js/app.js">
        </script>
        <script type="text/javascript">

            $(function() {
                $('.responsive-tabs').responsiveTabs();
            });

        </script>
    </body>
</html>
