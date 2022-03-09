<header class="mobile-header">
    <menu class="menu">
        <a class="icon-menu-mobile" x-data="{menuMobile:false}">
            <svg @click="menuMobile=!menuMobile" fill="none" height="24" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6C4 5.44772 4.44772 5 5 5H19C19.5523 5 20 5.44772 20 6C20 6.55228 19.5523 7 19 7H5C4.44772 7 4 6.55228 4 6Z"
                      fill="currentColor"/>
                <path d="M4 18C4 17.4477 4.44772 17 5 17H19C19.5523 17 20 17.4477 20 18C20 18.5523 19.5523 19 19 19H5C4.44772 19 4 18.5523 4 18Z"
                      fill="currentColor"/>
                <path d="M11 11C10.4477 11 10 11.4477 10 12C10 12.5523 10.4477 13 11 13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H11Z"
                      fill="currentColor"/>
            </svg>
            <div x-show="menuMobile=true" class="menuMobile-fixed">

            </div>
        </a>
        <div class="details-header">
            <div class="language">
                <a class="text-language" href="">FA</a>
                <i class="icon-down-open"></i>
            </div>
            <a class="btn-register" href="">
                <i class="icon-circle text-white"></i>
                ثبت نام / ورود
            </a>
            <a class="basket-shop-parent" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24.404" height="24.471"
                     viewBox="0 0 24.404 24.471">
                    <g id="basket" transform="translate(0.966 1)">
                        <path id="Path_856" data-name="Path 856" d="M7,6c0,6.81,10.214,6.81,10.214,0"
                              transform="translate(-0.871 -0.893)" fill="none" stroke="#3e3e3e"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <path id="Path_857" data-name="Path 857"
                              d="M1.691,11.3q-.109.543-.227,1.124c-.976,5.461-.336,7.978,1.176,9.274A7.228,7.228,0,0,0,6.2,23.113a37.365,37.365,0,0,0,6.034.358,37.365,37.365,0,0,0,6.034-.358A7.228,7.228,0,0,0,21.83,21.7c1.512-1.3,2.152-3.813,1.176-9.274q-.118-.581-.227-1.124c-.385-1.917-.7-3.485-1.059-4.8a9.262,9.262,0,0,0-1.495-3.39C19.068,1.672,17.084,1,12.236,1S5.4,1.672,4.245,3.117a9.263,9.263,0,0,0-1.495,3.39C2.392,7.818,2.077,9.386,1.691,11.3Z"
                              transform="translate(-1 -1)" fill="none" stroke="#3e3e3e"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                <span class="badge">2</span>
            </a>
        </div>
    </menu>
    <a class="logo">
        <img src="img/logo-phibrows-academy-safaei.png" width="250" alt="">
    </a>
</header>
