<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="_token" content="{{ csrf_token() }}" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic&#038;display=swap&#038;ver=1664182504">

    <!-- Swiper slider -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css"> --}}

    <!-- Tailwind for develop-->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen " x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);">

   {{-- @include('layout/frontend/components/loading-screen')--}}

    @include('shared/sidebar')
    @include('shared/mobile-main-menu')

    @include('shared/nav')

    @yield('content')

    @include('shared/footer')

    @stack('scripts')

    <!-- TOOLTIP & POPOVER  -->
    @include('popper::assets')
    <!-- Wire Elements Modal  -->
    @livewire('livewire-ui-modal')
    <!-- Swiper slider -->
    {{-- <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script> --}}
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- Main  -->
    @livewireScripts

    <!-- Main menu  -->
    <script>
        const setup = () => {
            return {
                loading: true,
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },
            }
        }
    </script>
    <!-- Toast notifications  -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        window.addEventListener('swal:delete', function(e) {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.text,
                type: e.detail.type,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tak, usuń to!',
                cancelButtonText: 'Anuluj',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', e.detail.ids);
                    Toast.fire({
                        icon: 'success',
                        title: 'Usunięto!'
                    })
                }
            });
        });
        window.addEventListener('toast', function(e) {
            Toast.fire({
                icon: e.detail.icon,
                title: e.detail.title,
            })
        });
    </script>

    <!-- Newsletter -->
    <script>
        $(function(){

            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }

            $(document).on("click", "#subscribe-btn", (e) => {
                e.preventDefault();
                let _this = $(e.target);

                let email = _this.parents("form").find("input[name='subscribe-email']").val();
                if( ! isEmail( email ) )
                {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Podany adres email jest nieprawidłowy'
                        });
                }
                else
                {
                    // send this email to subscribe

                    // 1- send an ajax and store this email
                    let formData = new FormData();
                    let _token = $("meta[name='_token']").attr("content");
                    formData.append('_token', _token);
                    formData.append('email', email);

                    $.ajax({
                        url: "{{ route('newsletter_store') }}",
                        type: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        data:formData,
                        success: (respond) => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Świetnie! Zostałeś zapisany do listy subskrybentów'
                                });
                        },
                        statusCode: {
                            500: () => {
                                Toast.fire({
                                    icon: 'warning',
                                    title: 'Podany adres email jest nieprawidłowy'
                                    });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
