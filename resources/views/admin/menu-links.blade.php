
<li class="nav-item" >
    <a href="#" class="nav-link d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#submenuMenu">
        <span>
        <i class="sidebar-icon fas fa-utensils"></i>
        <span class="sidebar-text">
            Mon menu
        </span>
        </span>
        <span class="link-arrow">
        <i class="right fas fa-angle-left"></i>
        </span>
    </a>
    <div class="multi-level collapse" id="submenuMenu">
        <ul class="nav flex-column" >
            <li class="nav-item">
                <a href="{{ route('admin.meals.index') }}" class="nav-link">
                    <span class="sidebar-text">Plats</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.meal-categories.index') }}" class="nav-link">
                    <span class="sidebar-text"> Catégories de plat</span>
                </a>
            </li>

        </ul>
    </div>
</li>

<li class="nav-item" >
    <a href="#" class="nav-link d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#submenuOrders">
        <span>
        <i class="sidebar-icon fas fa-utensils"></i>
        <span class="sidebar-text">
            Mes commandes
        </span>
        </span>
        <span class="link-arrow">
        <i class="right fas fa-angle-left"></i>
        </span>
    </a>
    <div class="multi-level collapse" id="submenuOrders">
        <ul class="nav flex-column" >
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <span class="sidebar-text">Commandes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders.create') }}" class="nav-link">
                    <span class="sidebar-text">Ajouter une commande</span>
                </a>
            </li>
        </ul>
    </div>
</li>
