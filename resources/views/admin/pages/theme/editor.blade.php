@extends('resto2web-admin::layout.editor-layout')

@section('content')
    @include('resto2web-admin::pages.theme._partials.editor-header')
    <div class="row container-fluid bg-light h-100 m-0" style="min-height: 100vh;height: 100%;">
        <div class="col-md-3 h-100" style="min-height: 100vh">
            <livewire:admin.theme.editor-sidebar/>
        </div>
        <div class="col-md-9 bg-light h-100" style="min-height: 100vh">
            <div class="m-4 d-flex justify-content-center h-100">
                <iframe src="https://resto.test" id="iframe-preview" style="min-height: 80vh"
                        class="iframe-preview shadow h-100"></iframe>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(".iframeSwitcher").on('click', function (e) {
            e.preventDefault();
            $('.iframeSwitcherIcon').addClass('text-muted');
            $(".iframe-preview").removeClass("iframe-preview-mobile");
            $(".iframe-preview").removeClass("iframe-preview-desktop");
            $(".iframe-preview").removeClass("iframe-preview-tablet");
            $(".iframe-preview").addClass("iframe-preview-" + $(this).data('device'));
            $(this).find('.iframeSwitcherIcon').removeClass('text-muted')
        });

        Livewire.on('redirectPreviewTo', url => {
            document.getElementById('iframe-preview').src = url;
        })

        Livewire.on('refreshPreview', () => {
            document.getElementById('iframe-preview').src = document.getElementById('iframe-preview').src
        })
        // document.addEventListener('livewire:load', function () {
        //
        //     let slideModal = document.getElementById('slideModal');
        //     Livewire.on('slideModalDisplay', (show) => {
        //         if (show) {
        //             slideModal.show()
        //         } else {
        //             slideModal.hide()
        //         }
        //     })
        // });
    </script>
@endpush
