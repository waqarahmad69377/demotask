<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        Task <b class="font-black">Demo</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li class="active">
          <a href="{{route('dashboard')}}">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Menu</p>
      <ul class="menu-list">
        <li>
          <a href="{{route('page.index')}}">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Pages</span>
          </a>
        </li>
        <li>
          <a href="{{route('customer.index')}}">
            <span class="icon"><i class="mdi mdi-face-agent"></i></span>
            <span class="menu-item-label">Customers</span>
          </a>
        </li>
        <li>
            <a href="{{route('writer.index')}}">
              <span class="icon"><i class="mdi mdi-fountain-pen-tip"></i></span>
              <span class="menu-item-label">Writers</span>
            </a>
          </li>
        <li>
          <a href="{{route('faq.index')}}">
            <span class="icon"><i class="mdi mdi-help"></i></span>
            <span class="menu-item-label">FAQ's</span>
          </a>
        </li>
        {{-- <li>
            <a href="{{route('profile')}}">
              <span class="icon"><i class="mdi mdi-account-circle"></i></span>
              <span class="menu-item-label">Profile</span>
            </a>
          </li> --}}
        {{-- <li>
          <a class="dropdown">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Submenus</span>
            <span class="icon"><i class="mdi mdi-plus"></i></span>
          </a>
          <ul>
            <li>
              <a href="#void">
                <span>Sub-item One</span>
              </a>
            </li>
            <li>
              <a href="#void">
                <span>Sub-item Two</span>
              </a>
            </li>
          </ul>
        </li> --}}
      </ul>
    </div>
  </aside>