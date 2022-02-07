<div>
    <div class="mb-3">
        <label for="headings_font" class="form-label">Police de titre</label>
        <select name="headings_font" id="headings_font" class="form-select" wire:model="headings_font">
            <option value="font1">Font 1</option>
            <option value="font2">Font 2</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="body_font" class="form-label">Police de corps de texte</label>
        <select name="body_font" id="body_font" class="form-select" wire:model="body_font">
            <option value="font1">Font 1</option>
            <option value="font2">Font 2</option>
        </select>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="mb-3">
                <label for="primary_color" class="form-label">Couleur principale</label>
                <input type="color" name="primary_color"  id="primary_color" wire:model.debounce="primary_color" class="form-control form-control-color">
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3">
                <label for="secondary_color" class="form-label">Couleur secondaire</label>
                <input type="color" name="secondary_color"  id="secondary_color" wire:model.debounce="secondary_color" class="form-control form-control-color">
            </div>
        </div>
    </div>
</div>
