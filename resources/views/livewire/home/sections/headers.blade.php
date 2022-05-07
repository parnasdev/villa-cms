<div>
    @if(str_starts_with($route , 'info') || str_starts_with($route , 'list'))
        <x-parnas.layouts.home-section.headerTwo />
    @else
        <x-parnas.layouts.home-section.header-desktop />
    @endif
    <x-parnas.layouts.home-section.header-mobile />

</div>
