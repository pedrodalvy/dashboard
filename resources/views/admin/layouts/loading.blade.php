<div class="loading">
    <div class="spinner">
        <div></div>
    </div>
</div>

<style>
    @keyframes spinner {
        0% {
            transform: rotate(0deg)
        }

        50% {
            transform: rotate(180deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .loading {
        position: fixed;
        width: 100vw;
        height: 100vh;
        display: none;
        overflow: hidden;
        background: none;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 100;
    }

    .spinner div {
        margin: auto;
        margin-top: calc(50vh - 30px);
        animation: spinner 0.7s linear infinite;
        width: 60px;
        height: 60px;
        top: 60.3px;
        left: 60.3px;
        border-radius: 50%;
        box-shadow: 0 1.809px 0 0 #fff;
        transform-origin: 30.199999999999996px 31.104499999999994px;
    }

    .spinner {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .spinner div {
        box-sizing: content-box;
    }

</style>

<script>
    $('.load').click(function() {
        $('.loading').show();
    });
</script>