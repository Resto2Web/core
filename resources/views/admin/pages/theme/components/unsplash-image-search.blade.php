<div>
{{--        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--            Unsplash <i class="fa fa-unsplash"></i>--}}
{{--        </button>--}}
        <input type="text" class="form-control" wire:model.debounce.500ms="unsplashSearch">
        @if ($unsplashResults->count())
            <div class="row">
                @foreach ($unsplashResults as $unsplashResult)
                    <div class="col-md-3" wire:key="{{ $unsplashResult->id }}">
                        <a href="#" wire:click.prevent="selectUnsplashImage('{{ $unsplashResult->id }}')">
                            <img src="{{ $unsplashResult->urls->small }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
</div>
