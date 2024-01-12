<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://micropadmanusantara-solutions.web.app" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="	fab fa-asymmetrik"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-white">MPN</div>
    </a>

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
    <x-my-nav-link :active="request()->routeIs('admin.cek_personils.index')" :name="'Personil'" :href="route('admin.cek_personils.index')">
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
        <i class="fab fa-researchgate"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.surat_penyampaians.index')" :name="'Surat Penyampaian'" :href="route('admin.surat_penyampaians.index')">
        <i class="	fas fa-flag"></i>
    </x-my-nav-link>
    <x-my-nav-link :active="request()->routeIs('admin.agenda.index')" :name="'Agenda Rapat'" :href="route('admin.agenda.index')">
        <i class="fas fa-calendar-alt"></i>
    </x-my-nav-link>
    <!-- ... (lanjutkan dengan link lainnya) ... -->

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>