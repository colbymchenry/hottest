<script src='https://www.paypalobjects.com/js/external/connect/api.js'></script>
<script>
    paypal.use(['login'], function (login) {
        login.render({
            "appid": "AUuAYNyNVzETws2ZZeuOJ3i5bnjxlX9sYcg2nVovKTLWjjFdhcNgMOMCgkDrV3DZfb17yjwlHpz55t6C",
            "scopes": "openid profile email",
            "containerid": "cwppButton",
            "locale": "en-us",
            "returnurl": "http://localhost:8000/cwpp/model", // will need to use /cwpp/user for user page connecting their paypal (they don't need to but I made a return url for it just in case)
            "authend": "sandbox",
            "buttonType": "CWP",
        });
    });

    $(document).ready(function() {

        $("input[id^=" + 'vip-' + "]").on('click', function(e) {
            if($(this).is('[readonly]')) {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You must connect your PayPal account first!',
                });
            }
        })

    });

</script>

