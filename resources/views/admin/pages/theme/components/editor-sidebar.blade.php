<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-{{ $mode == 'general' ? '' : 'outline-' }}primary btn-block" wire:click.prevent="setMode('general')">Général</button>
            </div>
            <div class="col-6">
                <button class="btn btn-{{ $mode == 'pages' ? '' : 'outline-' }}primary btn-block" wire:click.prevent="setMode('pages')">Pages</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @switch($mode)
            @case('general')
            <h2>Général</h2>

            @break

            @case('pages')
            <select name="page" id="page" class="form-control" wire:model="page">
                <option value="home">Page d'accueil</option>
                <option value="menu">Menu</option>
                <option value="contact">Contact</option>
            </select>
            @if ($page)
                <livewire:is :component="'admin.theme.editor.pages.'.$page" wire:key="{{ $page }}" />
            @endif
            @break

            @default

        @endswitch
    </div>
</div>
