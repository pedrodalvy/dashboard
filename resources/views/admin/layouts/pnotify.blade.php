<script type="text/javascript">

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
        width: screenWidth,
        stack: window.stackTopCenter
    });

    notice.on('click', function () {
        notice.close();
    });

</script>
