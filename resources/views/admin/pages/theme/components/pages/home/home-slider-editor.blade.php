<div>
    <h3>Carousel</h3>
    <ul class="list-group">
        @foreach ($homeSlides as $item)
            <li class="list-group-item" wire:key="{{ $item->id }}"> {{ $item->title }} {{ $item->subtitle }}
                <a href="#" wire:click.prevent="edit({{$item->id}})"><i class="fa fa-edit"></i></a>
                <a href="#" wire:click.prevent="delete({{$item->id}})"><i class="fa fa-trash"></i></a>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary" wire:click="create">Ajouter une image au carousel</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" @if ($showSlideModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $homeSlideId ? "Editer l'image" : "Ajouter une image"}}</h5>
                        <button wire:click="close" type="button" class="btn-close" data-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            {!! Form::label('title', 'Titre', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'wire:model' => "homeSlide.title"]) !!}
                            @error('homeSlide.title')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {!! Form::label('subtitle', 'Sous titre', ['class' => 'control-label']) !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'wire:model' => "homeSlide.subtitle"]) !!}
                            @error('homeSlide.subtitle')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
                            @if ($homeSlideId && $homeSlide->getFirstMediaUrl('image'))
                                <img src="{{ $homeSlide->getFirstMediaUrl('image') }}" alt="">
                            @else
                                @if ($image)
                                    Apercu:
                                    <img src="{{ $image->temporaryUrl() }}">
                                @endif
                                <input type="file" wire:model="image">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $homeSlideId ? 'Save Changes' : 'Save' }}</button>
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
