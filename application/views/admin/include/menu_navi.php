<!-- 
Website ini dibuat dan dikembangkan oleh awbimasakti
Nama Template : OnlineShop Non-Courir
Pencipta      : AWBimasakti and Yusuf1bimasakti
Author        : PT. Bimasakti Indera Gemilang
Creator       : https://ilmuparanormal.com 
-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('administrator') ?>" class="brand-link">
        <img src="<?= base_url('assets/') ?>admin/dist/img/ilmuparanormal.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMINISTRATOR</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu Pos Berita -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'post' ? 'menu-open' : '' ?> <?php echo $this->uri->segment(2) == 'berita' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'post' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/berita/all" class="nav-link <?php echo $this->uri->segment(3) == 'berita' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Semua Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/berita/tambah" class="nav-link <?php echo $this->uri->segment(3) == 'tambah' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/post/kategori" class="nav-link <?php echo $this->uri->segment(3) == 'kategori' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/post/tags" class="nav-link <?php echo $this->uri->segment(3) == 'tags' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Produk -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>administrator/produk" class="nav-link <?php echo $this->uri->segment(2) == 'produk' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <!-- Menu Pengguna -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'pengguna' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengguna/administrator" class="nav-link <?php echo $this->uri->segment(3) == 'administrator' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengguna/pelanggan" class="nav-link <?php echo $this->uri->segment(3) == 'pelanggan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Pengaturan -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'pengaturan' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'pengaturan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengaturan/identitas" class="nav-link <?php echo $this->uri->segment(3) == 'identitas' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Identitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengaturan/smtp" class="nav-link <?php echo $this->uri->segment(3) == 'smtp' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Email</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengaturan/cs" class="nav-link <?php echo $this->uri->segment(3) == 'cs' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengaturan/midtrans" class="nav-link <?php echo $this->uri->segment(3) == 'midtrans' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Midtrans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>administrator/pengaturan/akun" class="nav-link <?php echo $this->uri->segment(3) == 'akun' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile Akun</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>login/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>