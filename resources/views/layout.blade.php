@include('subviews.head')

@include('subviews.navbar')

<body>
    
    <div class="container">
        
        <!-- secção cabecalho -->
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
            <p class="lead">@yield('cabecalho-descrit')</p>
        </div>
        
        <!-- Secação conteudo -->
        @yield('conteudo')

    </div>
</body>