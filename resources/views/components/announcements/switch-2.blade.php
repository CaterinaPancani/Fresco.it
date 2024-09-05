<div class="">
    @switch($action)
        @case(1)
            <x-announcements.preview :title="$title" :description="$description" :category="$category" :images="$images" :price="$price"/>
        @break
        @case(2)
            <x-announcements.edit-form :title="$title" :category="$category" :picture="$picture" :price="$price"/>
        @break
        @case(3)
        <x-announcements.show :ad="$ad" :alpha="$alpha"/>
        @break
        @case(4)
        <x-announcements.admin-requestShow :user="$user"/>
        @break
        @case(5)
        <x-announcements.admin-applyShow :user="$user" :apply="$apply"/>
        @break
        @default

        <div class="text-center">
            <img class="Switch-2-img" src="{{asset('images/logo.png')}}" alt="img">
        </div>
        @break
    @endswitch
</div>
