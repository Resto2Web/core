<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-{{ $mode == 'general' ? '' : 'outline-' }}primary w-100"
                        wire:click.prevent="setMode('general')">Général
                </button>
            </div>
            <div class="col-6">
                <button class="btn btn-{{ $mode == 'pages' ? '' : 'outline-' }}primary w-100"
                        wire:click.prevent="setMode('pages')">Pages
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @switch($mode)
            @case('general')
            <h2>Général</h2>
            <livewire:admin.theme.editor.general wire:key="generalEditorComponent"/>



            @break

            @case('pages')
            <select name="page" id="page" class="form-select" wire:model="page">
                <option value="home">Page d'accueil</option>
                <option value="menu">Menu</option>
                <option value="contact">Contact</option>
            </select>
            @if ($page)
                @switch($page)
                    @case('home')
                    <livewire:admin.theme.editor.pages.home wire:key="homeEditorComponent"/>
                    @break
                    @case('menu')
                    <livewire:admin.theme.editor.pages.menu wire:key="menuEditorComponent"/>
                    @break
                    @case('contact')
                    <livewire:admin.theme.editor.pages.contact wire:key="contactEditorComponent"/>
                    @break

                    @default

                @endswitch
            @endif
            @break

            @default

        @endswitch
    </div>
</div>
