<header class="desktop-header">
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 parent-header-villa m-auto-x">
                    <ul class="menu-parent" x-data="{activeHeader:'item-one'}">
                        <li :class="{'active-header':activeHeader==='item-one'}" @click="activeHeader='item-one'"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="22"
                                     height="22">
                                    <path
                                        d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/>
                                </svg>
                                صفحه اصلی</a></li>
                        <li :class="{'active-header':activeHeader==='item-two'}" @click="activeHeader='item-two'"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                     viewBox="0 0 24 24" width="22" height="22">
                                    <path
                                        d="M12,.007A10,10,0,0,0,4.937,17.085L12,23.993l7.071-6.916A10,10,0,0,0,12,.007Zm5.665,15.648L12,21.2,6.343,15.663a8,8,0,1,1,11.322-.008ZM16.018,7.423l-2.5-1.91a2.507,2.507,0,0,0-3.035,0l-2.5,1.91A2.513,2.513,0,0,0,7,9.409V14H17V9.409A2.515,2.515,0,0,0,16.018,7.423ZM15,12H13V10H11v2H9V9.409a.5.5,0,0,1,.2-.4L11.7,7.1a.5.5,0,0,1,.608,0l2.5,1.91a.5.5,0,0,1,.2.4Z"/>
                                </svg>

                                ویلا</a></li>
                        <li :class="{'active-header':activeHeader==='item-three'}" @click="activeHeader='item-three'"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="22"
                                     height="22">
                                    <path
                                        d="M21,12.424V11A9,9,0,0,0,3,11v1.424A5,5,0,0,0,5,22a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2V11a7,7,0,0,1,14,0v1a2,2,0,0,0-2,2v6H14a1,1,0,0,0,0,2h5a5,5,0,0,0,2-9.576ZM5,20H5a3,3,0,0,1,0-6Zm14,0V14a3,3,0,0,1,0,6Z"/>
                                </svg>

                                تماس با ما

                            </a></li>
                        <li :class="{'active-header':activeHeader==='item-four'}" @click="activeHeader='item-four'"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="22"
                                     height="22">
                                    <path
                                        d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm0,22A10,10,0,1,1,22,12,10.011,10.011,0,0,1,12,22Z"/>
                                    <path d="M12,10H11a1,1,0,0,0,0,2h1v6a1,1,0,0,0,2,0V12A2,2,0,0,0,12,10Z"/>
                                    <circle cx="12" cy="6.5" r="1.5"/>
                                </svg>
                                درباره ما</a></li>
                        <li :class="{'active-header':activeHeader==='item-five'}" @click="activeHeader='item-five'"><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                                    <g id="_01_align_center" data-name="01 align center">
                                        <path
                                            d="M5,19H9.414L23.057,5.357a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0L5,14.586Zm2-3.586L20.057,2.357a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586L8.586,17H7Z"/>
                                        <path
                                            d="M23.621,7.622,22,9.243V16H16v6H2V3A1,1,0,0,1,3,2H14.758L16.379.379A5.013,5.013,0,0,1,16.84,0H3A3,3,0,0,0,0,3V24H18.414L24,18.414V7.161A5.15,5.15,0,0,1,23.621,7.622ZM18,21.586V18h3.586Z"/>
                                    </g>
                                </svg>

                                وبلاگ
                            </a></li>
                    </ul>
                    <a class="logo"><img src="/images/hamnavaz-logo.png" width="160" alt=""></a>
                    <div class="box-left-header">
                        <div class="information-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="30"
                                 height="30">
                                <path
                                    d="M21,12.424V11A9,9,0,0,0,3,11v1.424A5,5,0,0,0,5,22a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2V11a7,7,0,0,1,14,0v1a2,2,0,0,0-2,2v6H14a1,1,0,0,0,0,2h5a5,5,0,0,0,2-9.576ZM5,20H5a3,3,0,0,1,0-6Zm14,0V14a3,3,0,0,1,0,6Z"/>
                            </svg>
                            <div class="text">
                                <strong>پشتیبانی</strong>
                                <a href="tel:'+'02184278">
                                    <span>021-84278</span>
                                </a>
                            </div>
                        </div>
                        <button class="btn-auth">ورود/ثبت نام</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
