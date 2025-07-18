<!-- Login/Register Buttons (Desktop Only) -->
<div class="xs:hidden md:grid md:col-span-1 justify-end items-center">
    <div class="grid grid-flow-col gap-4 justify-end xs:w-fit">
        <x-buttons.link-button-gradiant-blue  class="md:w-24" link="{{ route('login') }}" content="Login" :rounded_lg="true" :text_white="true"/>
        <x-buttons.link-button-gradiant-orange class="md:w-24"  content="Register" link="{{ route('register') }}" :rounded_lg="true" :text_white="true"/>
    </div>
</div>
