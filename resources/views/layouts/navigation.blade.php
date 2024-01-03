<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Micro Padma Nusantara</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <x-my-nav-link :active="request()->routeIs('dashboard')" :name="'Dashboard'" :href="route('dashboard')">
        <i class="fas fa-fw fa-tachometer-alt"></i>
    </x-my-nav-link>
   

    <!-- Divider -->
    <hr class="sidebar-divider"> 
    <x-my-nav-link :active="request()->routeIs('admin.pokjas.index')" :name="'Pokja'" :href="route('admin.pokjas.index')">
        <i class="fas fa-people-arrows"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.kode_pokjas.index')" :name="'Kode Pokja'" :href="route('admin.kode_pokjas.index')">
        <i class="fab fa-adn"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.data_tenders.index')" :name="'Data Tender'" :href="route('admin.data_tenders.index')">
        <i class="fas fa-project-diagram"></i>
    </x-my-nav-link>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <x-my-nav-link :active="request()->routeIs('admin.cek_personils.index')" :name="'Cek Personil'" :href="route('admin.cek_personils.index')">
        <i class="fas fa-users"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.cek_data_tenders.index')" :name="'Cek Data Tender'" :href="route('admin.cek_data_tenders.index')">
        <i class="fas fa-file-alt"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.cek_peralatans.index')" :name="'Cek Peralatan'" :href="route('admin.cek_peralatans.index')">
        <i class="fas fa-tools"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.data_surat_keputusans.index')" :name="'Surat Keputusan'" :href="route('admin.data_surat_keputusans.index')">
        <i class="fas fa-mail-bulk"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.spt_penelitis.index')" :name="'SPT Peneliti'" :href="route('admin.spt_penelitis.index')">
        <i class="fas fa-file-alt"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.agenda.index')" :name="'Agenda Rapat'" :href="route('admin.agenda.index')">
        <i class="fas fa-calendar-alt"></i>
    </x-my-nav-link>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>