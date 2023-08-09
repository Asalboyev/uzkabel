<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="/admin/assets/img/logo.png" class="header-logo" /> <span class="logo-name">Otika</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown">
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.categories.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Categories</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.posts.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Posts</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.products.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Product</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.abouts.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Abouts</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.advantags.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Advantags</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.logos.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Logos</span></a>
      </li>
      <li class="dropdown ">
        <a href="{{ route('admin.words.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Words</span></a>
      </li>
    </ul>
  </aside>
</div>