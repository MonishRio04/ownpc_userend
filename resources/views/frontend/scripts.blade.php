<script>
    function setCookie(name, value, hours = 24) {
        const date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000)); // hours to ms
        const expires = "expires=" + date.toUTCString();
        document.cookie = `${name}=${value}; ${expires}; path=/`;
    }

    function getCookie(name) {
        const decodedCookies = decodeURIComponent(document.cookie);
        const cookies = decodedCookies.split(';');
        name = name + "=";
        for (let cookie of cookies) {
            cookie = cookie.trim();
            if (cookie.indexOf(name) === 0) {
                return cookie.substring(name.length);
            }
        }
        return null;
    }
    // setCookie('referral_code', "{{ Request::get('ref') }}");
</script>
<?php
if (Request::get('ref') && Request::get('ref') != 'undefined') {
    if(\App\Models\Affiliate::where('referral_code', Request::get('ref'))->where('status',1)->exists()) {
        cache()->put('referral_code', Request::get('ref'), now()->addHours(24));
    } else {
        cache()->put('referral_code',null);
    }
}
?>
