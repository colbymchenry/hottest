<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: 'sandbox', // Or 'production
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
            label: 'checkout',
            tagline: 'true'
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/paypal/create-checkout/{{ $model->getUser()->id }}/{{ ProductType::$VIP }}', {
                _token: token
            })
                .then(function(res) {
                    // 3. Return res.id from the response
                    return res.id;
                });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/paypal/execute-checkout', {
                paymentID: data.paymentID,
                payerID:   data.payerID,
                _token: token
            })
                .then(function(res) {
                    // 3. Show the buyer a confirmation message.
                    console.log('WE MADE IT HERE');
                });
        },
        onError: function (err) {
            window.location.replace('/home');
        }
    }, '#paypal-checkout-button');

    var hasVIPContent = '{{ sizeof($model->getVIPPhotos()) > 0 }}' == '1';

    });

</script>