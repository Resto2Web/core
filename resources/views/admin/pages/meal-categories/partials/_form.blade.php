<div class="mb-3">
    <label for="name">Nom de la catégorie</label>
    <input type="text" class="form-control" name="name" id="name" required value="{{ old('name',$meal_category->name ?? '') }}">
</div>

