@if (auth()->user()->email_verified_at)
    <x-layout.layout>
        <livewire:ads.announcements :ads="$ads"/>
    </x-layout.layout>
@else
    <x-layout.secondary>
        <x-layout.confirm-mail-message/>
    </x-layout.secondary>
@endif
