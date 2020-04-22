<script type="text/javascript" src="{{ asset('pnotify/PNotify.js') }}"></script>
<link href="{{ asset('pnotify/PNotify.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ asset('pnotify/PNotifyBootstrap4.js') }}"></script>
<link href="{{ asset('pnotify/PNotifyBootstrap4.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    PNotify.defaults.styling = 'bootstrap4';
    PNotify.defaults.icons = 'fontawesome5';

    PNotify.defaults.delay -= 1000;

    if (typeof window.stackTopCenter === 'undefined') {
        window.stackTopCenter = {
            'dir1': 'down',
            'firstpos1': 25
        };
    }

    var notice = PNotify.alert({
        text: '{!! $message !!}',
        type: '{{ $type }}',
        textTrusted: true,
        modules: {
            Buttons: {
                closer: false,
                sticker: false
            }
        },
        width: "600px",
        stack: window.stackTopCenter
    });

    notice.on('click', function () {
        notice.close();
    });

</script>
