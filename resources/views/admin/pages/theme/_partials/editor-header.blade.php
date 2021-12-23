<div class="bg-dark py-2 navbar-dark">
    <div class="container-fluid h-100">
        <div class="row justify-content-between h-100">
            <div class="col align-items-center d-flex">
                <a class="" href="{{ route('admin.index') }}">Retour à l'admin</a>
                {{--                    <a class="navbar-brand" href="/">Editeur de site web</a>--}}
            </div>
            <div class="col">
                <ul class="nav justify-content-end" role="tablist">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" data-toggle="modal" href="#toolsModal" role="tab"--}}
{{--                           aria-selected="true">--}}
{{--                            <i class="fa fa-fw fa-cogs"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" id="helperToggle" data-toggle="tab" href="#" role="tab"--}}
{{--                           aria-selected="true">--}}
{{--                            <i class="fa fa-fw fa-wand-magic"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item nav-link text-light">--}}
{{--                        |--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link iframeSwitcher" id="desktopToggle" href="#" data-device="desktop">
                            <i class="iframeSwitcherIcon iframeSwitcherIconDesktop fa fa-fw fa-desktop "></i>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link iframeSwitcher" id="tabletToggle" href="#" data-device="tablet">
                            <i class="iframeSwitcherIcon iframeSwitcherIconTablet fa fa-fw fa-tablet text-muted"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link iframeSwitcher" id="mobileToggle" href="#" data-device="mobile">
                            <i class="iframeSwitcherIcon iframeSwitcherIconMobile fa fa-fw fa-mobile text-muted"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
