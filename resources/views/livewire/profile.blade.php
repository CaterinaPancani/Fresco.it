<div class="text-center">
    <x-layout.banner-message/>
    <div class="container">
        <div class="row">
            <div class="p-5 col-lg-4 col-md-4 text-start col-sm-12">
                <x-profile.switch1 :action="$action" :user="$user"/>
            </div>
            <div class="p-5 col-lg-8 col-md-8 col-sm-12">
                <x-profile.switch2 :choice="$choice" :ads="$ads" :star="$star" :users="$users"/>
            </div>
        </div>
    </div>
</div>
