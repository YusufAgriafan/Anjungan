// resources/js/pusher.js

document.addEventListener('DOMContentLoaded', (event) => {
    Pusher.logToConsole = true;

    var pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        encrypted: true
    });

    var channel = pusher.subscribe('anjungan_rsi_aminah');
    channel.bind('App\\Events\\YourEventName', function(data) {
        alert(JSON.stringify(data));
    });
});
