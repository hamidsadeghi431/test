<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="{{asset('./admin/assets/img/avatars/main.jpg')}}" alt class="rounded-circle">
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online mt-1">
                            <img src="{{asset('./admin/assets/img/avatars/main.jpg')}}" alt class="rounded-circle">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">جان اسنو</span>
                        <small>مدیر</small>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="pages-profile-user.html">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">پروفایل من</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-account-settings-account.html">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">تنظیمات</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-account-settings-billing.html">
                          <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                            <span class="flex-grow-1 align-middle">صورتحساب</span>
                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                          </span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="pages-help-center-landing.html">
                <i class="bx bx-support me-2"></i>
                <span class="align-middle">راهنمایی</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-faq.html">
                <i class="bx bx-help-circle me-2"></i>
                <span class="align-middle">سوالات متداول</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="pages-pricing.html">
                <i class="bx bx-dollar me-2"></i>
                <span class="align-middle">قیمت گذاری</span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();closest('form').submit();">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">خروج</span>
                </a>
            </form>
        </li>
    </ul>
</li>
