<!-- Login/Register Buttons (Desktop Only) -->
<div class="xs:hidden md:grid md:col-span-1 justify-end items-center">
    <div class="grid grid-flow-col gap-4 justify-end xs:w-fit">
        <x-buttons.link-button-gradiant-blue class="md:w-24"  content="Login" href="{{ route('login') }}" :rounded_lg="true" :text_white="true"/>
        <x-buttons.link-button-gradiant-orange class="md:w-24" content="Register" href="{{ route('register') }}" :rounded_lg="true" :text_white="true"/>
    </div>
</div>
