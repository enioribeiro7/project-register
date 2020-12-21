<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <style type="text/css">
        .loading {
            z-index: 999999;
            top: 0;
            left: 0;
            width: 100vw;
            /* height: 100vh; */
        }

        .loading:after,
        .loading:before {
            content: "";
            display: block;
            position: absolute;
            left: -110%;
            top: 50%;
        }

        .loading:before {
            height: 50px;
            width: 50px;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 0 8px #999;
            transform: rotate(45deg);
            margin-top: -25px;
            margin-left: -25px;
        }

        .loading:after {
            background-color: #fff;
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: 36px;
            background-image: url(data:image/gif;base64,R0lGODlhXgBeAJEAAACDxP///4fF5M7n9SH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4M0NEOUE2RjdGRUIxMUU1ODczMEQ0RTI2MzdDRUNBOSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo4M0NEOUE3MDdGRUIxMUU1ODczMEQ0RTI2MzdDRUNBOSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjgzQ0Q5QTZEN0ZFQjExRTU4NzMwRDRFMjYzN0NFQ0E5IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjgzQ0Q5QTZFN0ZFQjExRTU4NzMwRDRFMjYzN0NFQ0E5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEBAQAAAAsAAAAAF4AXgAAAv+Mj6nL7Q+jnNQIAIQYtfsPDRimaRyIppQ4ZuWmxrLCtq8253Ft34IO9PB6vqAxMiQWj0xa6+ny4ZrU5FP6ojKtV2xJG+S2LN7LCbyDQhHe0RkNEo8U0ucbXpFjGDf1HY+k9uRQIgjwB9igBwBxYXiYGPK4FzEJGcmwSGGJGKlZwYmJ8NkRKkrqYZqI+qEKxwriqgWLIrtlCWQbhhukm0M745s2SSWMApw72RnHC2ac14z2LIHcNP1QXazMTCwacO3U7f29vRI9Dh6QnXi9HvnsjikcL6pL7y17j15ucD5eKc6RoX+pHv0gN5BgwYFyFMZiaOigww4C18iROFFCxTXRCAVhzEjIoAE9H0HS4bcRSkmTFiZ9THmFZQKYNhbQHLFy4k0SDXZmkOkz54GgJok2cpnRaASl/5guRdoUagWniahOsIoG61WpeLRS8GoE7FeuVMROJXvELEW0QNR6cPuWbQ64Y0WWlYuCbl68ce1m5Vs3YlXAT/0C0suGcBPEARjr0Ou4reKhk/8aDnmZoNjIi/lyvpu5ZeikaD9bFkx5NEujpg+7bD3YEmqZD3zOpl1bdkzcGnXz5L1VtlDgfCwNJ178NvLgUJYtx7b7ufQDBQAAIfkEBAQAAAAsNgALAAoACgAAAhWUHxnHyr0ekgdQAazMIFaefGDIcQUAIfkEBAQAAAAsOgAPAAsACwAAAhqUH5nHGtwWRG8iewAWAFTYeZ8Ril9pPihQAAAh+QQEBAAAACw/ABQACwALAAACGJQfmcca3BZEbyKLJ6h68wOEChOKo1CGBQAh+QQEBAAAACxEABkADgAOAAACH5QfqXm92tyLElJkr8lacP1RQHgAI2meX6pmbAu9QAEAIfkEBAQAAAAsAAAAAAEAAQAAAgJMAQAh+QQEBAAAACxMACEACwALAAACGpQfmcca3BZEbyJ7ABYAVNh5nxGKX2k+KFAAACH5BAQEAAAALFEAJgAMAAkAAAIRlB+px5rcFkRvUtvwGUGbihUAIfkEBAQAAAAsLwABAAoADQAAAhwEFKlhNssaeEq6amfKlzsPGoInIFmJRCKKoWUBACH5BAQEAAAALDMACAAOAA0AAAIghD+hG+fJmkNxPmavypp3b0AgICyeUJoWmqoH27qwUAAAIfkEBAQAAAAsOgAQAAwACwAAAhqEDxMbiLrci/Ko+jBqWlApeN8RimNpUqhQAAAh+QQEBAAAACxAABUACgAKAAACFYQ/occZ3B5Es05hhZBMbw54nyQKBQAh+QQEBAAAACxEABkACQAJAAACFIQ/EcfJ/Y6IQMxnr8zLZKtUn1AAACH5BAQEAAAALEcAHAAWABgAAAJFhD+hy30nmmQPiDvnuzw7w4XeAobiaKYRqp5e62Zwx85jMGM1fOfrm+sFd6oEMXXD8YQtpgqAKpksr03IYJQIKpYtKFAAACH5BAQEAAAALFEAMAAMAAkAAAIXjI6pK8NpXgvgjUCruhj4xHWeFopjiRUAIfkEBAQAAAAsTAAzAAoACwAAAhiMhSmnGQ2jTGCCCsfFaYTNeR8oiONmBgUAIfkEBAQAAAAsRwA4AAoACgAAAhaMhSmnGQ2jTGCCCsfFaYTNeR8oiEEBACH5BAQEAAAALEMAPQAKAAkAAAIUTISJp+3vABRAulFtGiFr3nkCGBQAIfkEBAQAAAAsRwAdABYAEgAAAiuEDxPL3YiUmwFG6uzFS2/sfVR4SCCZcBVqjqyKplzcTjT8zqi6hgK/A4YKACH5BAQEAAAALAAAAAABAAEAAAICTAEAIfkEBAQAAAAsOgBBAA8ADgAAAieMH6KraAwdjGfSZNnLa2AueKDifVkZAByaqhPbup0Ty7AB5HlIGwUAIfkEBAQAAAAsNABKAAwADAAAAhqMI6l56+ZenLSuYUcAVG/ueB+YiCNonkAaFAAh+QQEBAAAACwvAFAACgALAAACF4yFKacZDaOcCsgBbBsha8R1HmiIXmgUACH5BAQEAAAALC8AVgAFAAcAAAIIlI+pKwEyQigAIfkEBAQAAAAsLwBcAAEAAQAAAgJUAQAh+QQEBAAAACxbAC8AAgACAAACAwQEBQAh+QQEBAAAACxUAC8ACQAGAAACDoR/gii63daADohA1Q0FACH5BAQEAAAALE4AMAAMAAwAAAIdjCOgC5e8zIMKUTavxhsIe31IpohjZp5PqgpsUAAAIfkEBAQAAAAsRQA2AA4ADwAAAiaMHwLLaMoagnHNGg/F4PG8cUKICcHHmCeqJl+bkHC8zTRk36NzFAAh+QQEBAAAACw5AD8AEQARAAACMYyPAsvoypozMK4ZqgVT77dZSRgJh7eZFMmoGbu4qOUGMFDbbJ7NfO/5ASvCoaIYKAAAIfkEBAQAAAAsJgBLABkAEgAAAkhUjqkh4O/MmqJCKCeq/L5McZ0HgImIksCwoG6JCezmouzHzbV9RPYumgVKQKCQUdwdkUmeYtAMaqDR5bNpXVCVGu2u23WCAwUAIfkEBAQAAAAsIQBMAAoACwAAAhqELRN7IK/CeVQhWh3evPYXDN8icktoniVVAAAh+QQEBAAAACwcAEcACwALAAACG4QtExsHAtU6sEpUbct88O99VRCKS8kx6Kh+BQAh+QQEBAAAACwXAEIACwALAAACHIQ/oXEmklR7Lx5Kk8MZcD58WBCKglJ+SzquXwEAIfkEBAQAAAAsEwA9AAoACwAAAheEPaFxIJLUeS8aSpPDmfsPYkGogMtXAAAh+QQEBAAAACwLADUADQAOAAACIoQ9oRsHIhJrBkK5qr3sbYt9nySOQWmim6JCS8uoEzqdYgEAIfkEBAQAAAAsBgAwAAoACwAAAheEPaFxIJLUeS8aSpPDmfsPYkGogMtXAAAh+QQEBAAAACwBACkACgANAAACGkwGIJmXAll4MCpVK828+zx8YhV+gWiYaVcAACH5BAQEAAAALAEAJQANAAkAAAIZjB+giyayVHsvIkqZwxlsngUgOIyYaD5GAQAh+QQEBAAAACwIACEANgA1AAAC0IwDqZvnD6OUQjA2s9a13raFYtB114hmZbmkbrSywEs7cVnn5C3oOe/7xYJCHLG2OhZ7SmSlKRxAnQLp1FWyXkcr7XYT834nN/EYwjOfD7zqGtZWn9sV+Zdef9vw9i3erWfw13c1GCjId7hDRzhlePgYGKk3+Va5dvkTkvliIcKJYjEjMpCIpIBSykgjCjKiGoeFkQKbFnriUlv2+UGjGwb2Mfry26UiPExsioacrLz60CrsU5y1J83ApFPdYbXyoU3Nd5PdxE2nEH503gYQXgAAIfkEBAQAAAAsDAAbAC0AQgAAAtmMD6mb5w9jFIIxifOj1DYNShxnheY2ksrJBmn6teH7yic92jcu6Dvt+6WCQg6x2DuahsqlselMQmfSKahqzWq33K524MUIwGEIhVw+cNDpETucendf8i2tnsXhp7x9kzc2B+hHBHjGZRhoZ0gYlNjo84jIODlY2Xepl3m3Scc1QLkFaikayoKFMYp5A3CiqjkTE/LKqVEhO2s6sSBD67nL26trcBssTErs4eMbl6y8zFhcEsQ84rFCVN1x3XqkzY2qU30dDv3iUU59zpCeDbPQ7m2tAHmkEl4AACH5BAQEAAAALBIAGAAdAEUAAAKjjAWpC+YPj0BMxeumrg1fDTIeBobJSJYgmqoC25ZwrM30a39rrk98+0sFScOi8YhMKpfMpvMJjUqn1NyAKbgqJ1qkpmsEgYel8U9lzrnSM1eW7Gaj3Nwz/a2+4236fVsvd4PG0xd4MQDIg3hnGLFI1wjxGKeYaGVpM7lWycgJ6Ul5SQeAk+mmUDqjSWEBWhG0yDE0wNERxLoQ9qqbe4SbRJtQAAAh+QQEBAAAACwVABIAGABGAAACl4wPqZvnLgRjr8Y4W4UX03103QKG4giUxnmqK3u5LyzPbR3QeH7vvd/ZcSLCYZFzhCSXzKbzCY1Kp9Sq9YrNarfc5MAp+DIj4uSlXOyggefjaS1jwVWwOQgWxuHz8b19iPdn4iczsMenYkjoohhYuAcg8MiiIMl4wmCZiJI5mZGgWTLwWRlHCmp6WiNBqtfqmiHE+uEzUQAAIfkEBAQAAAAsFQAMABIARQAAAoSMjybAnC9iAw/F26q6mFYOeglIQiQ4nlyqRmz7qvE5l/Vqyp++2xqt2eCCARRRKDgeLsplsqmASqfUqvWKzWq33K73Cw6LNQOqoCyNoJuX9ZHjDvrknSd90bDvJgz9iJ+nATjhZzBICHEY+KcIUIin+NjomNgoaVmp+NH4o9k5SAQ5UQAAIfkEBAQAAAAsCAAGACUAPwAAAqyMj6l7Av+YnE04SLOyHOvPhdGXhSZAUuaaSivbbm8Yy7NVJzeXIzveM/wEQeGvGBgilUVm0NmD5qQ1aszawqa0JC7o2AQ/xVHy1FxFX9VZdvuGNM7ichh9Tq/z8noiX/9XARSYNEhoMUAomKgYwhho8sh34jfZ8VB5ZwGBackJkdn0yRnaM/pZWnVKGnexCpB69dq5NAvbahublYs7q7vFW+vb+/rbFSw6nFEAACH5BAQEAAAALAEAAQAuADcAAAKXjI+pyzsimpzzwUiztlf7eXXfmIQiSZon6qkrS7kv3Mgzrdg3fugQX/MBGT7MsCQ8InXKpa2JKEJ7yal0Grhaq1Btl9v0hsFKcZl8NKfRQ3WbDXTH4Tx5nY6z5/E0fZ8P4xcIyCJYSIjCIYNlgHi4yGgAMElJacRYmQlwOaWZydk04FkJWjZqGSlwOlmatrqZ+traJqtUAAAh+QQEBAAAACwBACcACwAIAAACFIwzonsDsJRxDzJarQg5r+6B4hgUACH5BAQEAAAALAYAIQALAAwAAAIbjD2iejEAljgPRuasZVVD0XniSJZaUBrkMTYFACH5BAQEAAAALAwAHAALAAwAAAIdjDOiewOwlHEPMlqtwNn2LnziGIyAQaLfUXZsUAAAIfkEBAQAAAAsEQAYAAoACgAAAhaMB6J64CsCck9NWrEWuvtPBZ/hGUEBACH5BAQEAAAALBUAFAAKAAoAAAIWjAeieuArAnJPTVqxFrr7TwWf4RlBAQAh+QQEBAAAACwZABEACQAJAAACEkwGonrgK5B7atpqp8i8+9AZBQAh+QQEBAAAACwcAA4ACAAJAAACEEwmmQegMlpTUqZqsd4chwIAIfkEBAQAAAAsHwANAAcACAAAAg0chAibsqzecfLUi1coACH5BAQEAAAALCAADAAHAAcAAAIMHIQIm7Ks3nHy1PsKACH5BAQEAAAALCEAAQAUABAAAAI4jI8xwiAJFZsCgBHNotPiyHEWGIpQWSZoCCCr2BovZcVzV2+vXNf70fOlEkFLKFN0TDKGJIN5KAAAIfkEBAQAAAAsMAABAAkADQAAAhvUghnCp9weFHKmCRHOm4EOfFgoQiSweKd2hgUAIfkEBAQAAAAsMwAIAAkACQAAAhGUH3mri34AFEC6aiMOenOMFQA7);
            background-repeat: no-repeat;
            background-position: center;
            width: 36px;
            height: 36px;
            margin-top: -18px;
            margin-left: -18px;
        }

    </style> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Programa de Cadastro</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" integrity="sha256-l4jVb17uOpLwdXQPDpkVIxW9LrCRFUjaZHb6Fqww/0o=" crossorigin="anonymous" />
    <link rel rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset("/assets/dist/css/AdminLTE-full.css") }}">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};


    </script>
</head>
<body>
    


    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #f87561;">
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
                    <a class="navbar-brand" style="color: white;" href="{{ url('/') }}">
                        Programa de Cadastro
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                {{-- <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->role->id == 1)
                                        <li><a href="{{ route('admin') }}"  style="color: black;">Administrar Usuários</a></li>
                                    @endif
                                </ul> --}}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    @yield('pageScripts')
    
    <script src='https://code.jquery.com/jquery-3.0.0.js'></script>
    <script src='https://code.jquery.com/jquery-migrate-3.0.0.js'></script>
    <!-- Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.4.0/jquery.quicksearch.js" integrity="sha256-t0DYCfKh8xV4vTTpOO82ifkbmmoLHF9PCvUWJsuRp70=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>   
</body>
</html>
