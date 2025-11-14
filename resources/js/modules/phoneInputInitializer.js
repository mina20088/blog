
export default function phoneInputInitializer(){
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.querySelector("#phone");

        if (phoneInput) {
            // Store instance globally for form validation
            window.itiInstance = window.intlTelInput(phoneInput, {
                loadUtils: () => import("intl-tel-input/utils"),
                initialCountry: "eg", // Egypt by default
                separateDialCode: false,
                hiddenInput: (telInputName) => ({
                    phone: "phone_number",
                    country: "country_code"
                })
            });
        }
    });
}


