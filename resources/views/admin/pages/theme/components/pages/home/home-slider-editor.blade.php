<div>
    <h3>Carousel</h3>
    <div class="list-group">
        @foreach ($homeSlides as $slide)
            <div class="list-group-item border d-flex justify-content-between" wire:key="{{ $slide->id }}">
                <div>
                    {{ $slide->title }} <br>
                    <small>{{ $slide->subtitle }}</small>
                </div>
                <div>
                    <a href="#" wire:click.prevent="edit({{$slide->id}})"><i class="fa fa-edit"></i></a>
                    <a href="#" wire:click.prevent="delete({{$slide->id}})"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        @endforeach
        <a href="#" class="list-group-item border" wire:click="create" wire:key="AddSlide">
            <i class="fa fa-plus"></i> Ajouter une slide au carousel
        </a>
    </div>

    <div class="modal" @if ($showSlideModal) style="display:block" @endif>
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                            @if ($homeSlideId && !$showImageForm)
                            <div class="text-end position-relative">
                                <img src="{{ $homeSlide->image_url }}" class="rounded" alt="">
                                <button wire:click.prevent="$set('showImageForm',true)" style="bottom: 0;right: 0" class="btn shadow m-3 position-absolute btn-primary btn-sm"><i class="fa fa-edit"></i> Changer l'image</button>
                            </div>
                            @endif
                            @if ($showImageForm)
                                @if ($image)
                                    Apercu:
                                    <img src="{{ $image->temporaryUrl() }}">
                                @endif
                                @if ($unsplashId)
                                    <livewire:admin.unsplash-image-preview :unsplash-id="$unsplashId" :wire:key="$unsplashId"/>
                                @endif
                                @if (!($image || $unsplashId))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" wire:model="image">
                                        </div>
                                        <div class="col-md-12">
                                            <livewire:admin.unsplash-image-search/>
                                        </div>
                                    </div>
                                @endif
                                @if ($homeSlideId)
                                    <button wire:click.prevent="$set('showImageForm',false)" class="btn btn-danger btn-sm">Annuler</button>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $homeSlideId ? 'Enregistrer les modifications' : 'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
