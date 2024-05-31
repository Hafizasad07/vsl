<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900);
</style>
<style type="text/css">
    .databot-tracking-overlay {
        z-index: 10001;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .5);
        cursor: pointer
    }

    .databot-tracking-loader {
        font-family: inherit;
        position: fixed !important;
        z-index: 10002;
        background: #fbfbfb;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        float: left;
        font-size: 16px;
        left: 50%;
        margin: 0 auto;
        padding: 24px 32px;
        position: relative;
        text-align: center;
        top: 50%;
        -webkit-transform: translateY(-50%) translateX(-50%);
        transform: translateY(-50%) translateX(-50%);
        width: 320px
    }

    .databot-tracking-loader h1 {
        color: #111;
        font-size: 24px;
        font-weight: 400;
        margin: 8px 0 24px;
        text-align: center
    }

    .databot-tracking-loader p {
        color: #303030;
        font-weight: 300;
        line-height: 24px;
        margin: 8px 0 24px;
        text-align: center
    }

    @keyframes lds-gear {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        50% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        to {
            -webkit-transform: rotate(1turn);
            transform: rotate(1turn)
        }
    }

    @-webkit-keyframes lds-gear {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        50% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        to {
            -webkit-transform: rotate(1turn);
            transform: rotate(1turn)
        }
    }

    .databot-tracking-loader .lds-gear>div {
        -webkit-transform-origin: 100px 100px;
        transform-origin: 100px 100px;
        -webkit-animation: lds-gear 1s infinite linear;
        animation: lds-gear 1s infinite linear;
        position: relative
    }

    .databot-tracking-loader .lds-gear>div div {
        position: absolute;
        width: 26px;
        height: 192px;
        background: #2ecc71;
        left: 100px;
        top: 100px;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    .databot-tracking-loader .lds-gear>div div:first-child {
        width: 152px;
        height: 152px;
        border-radius: 50%
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(3) {
        -webkit-transform: translate(-50%, -50%) rotate(30deg);
        transform: translate(-50%, -50%) rotate(30deg)
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(4) {
        -webkit-transform: translate(-50%, -50%) rotate(60deg);
        transform: translate(-50%, -50%) rotate(60deg)
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(5) {
        -webkit-transform: translate(-50%, -50%) rotate(90deg);
        transform: translate(-50%, -50%) rotate(90deg)
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(6) {
        -webkit-transform: translate(-50%, -50%) rotate(120deg);
        transform: translate(-50%, -50%) rotate(120deg)
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(7) {
        -webkit-transform: translate(-50%, -50%) rotate(150deg);
        transform: translate(-50%, -50%) rotate(150deg)
    }

    .databot-tracking-loader .lds-gear>div div:nth-child(8) {
        width: 80px;
        height: 80px;
        background: #fff;
        border-radius: 50%
    }

    .databot-tracking-loader .lds-gear {
        width: 59px !important;
        height: 59px !important;
        -webkit-transform: translate(-29.5px, -29.5px) scale(.295) translate(29.5px, 29.5px);
        transform: translate(-29.5px, -29.5px) scale(.295) translate(29.5px, 29.5px)
    }
</style>
<style type="text/css">
    #dbmodal .modal[aria-hidden=true] {
        display: none
    }

    #dbmodal .modal {
        font-family: -apple-system, BlinkMacSystemFont, avenir next, avenir, helvetica neue, helvetica, ubuntu, roboto, noto, segoe ui, arial, sans-serif
    }

    #dbmodal .modal__overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999 !important
    }

    #dbmodal .modal__container {
        background-color: #fff;
        padding: 30px;
        max-width: 500px;
        max-height: 100vh;
        border-radius: 4px;
        overflow-y: auto;
        box-sizing: border-box
    }

    #dbmodal .modal__header {
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    #dbmodal .modal__title {
        margin-top: 0;
        margin-bottom: 0;
        font-weight: 600;
        font-size: 1.25rem;
        line-height: 1.25;
        color: #00449e;
        box-sizing: border-box
    }

    #dbmodal .modal__close {
        background: transparent;
        border: 0
    }

    #dbmodal .modal__header .modal__close:before {
        content: "\2715"
    }

    #dbmodal .modal__content {
        margin-top: .5rem;
        margin-bottom: .8rem;
        line-height: 1.5;
        color: rgba(0, 0, 0, .8)
    }

    #dbmodal .modal__btn {
        font-size: .875rem;
        padding: .5rem 1rem;
        background-color: #e6e6e6;
        color: rgba(0, 0, 0, .8);
        border-radius: .25rem;
        border-style: none;
        border-width: 0;
        cursor: pointer;
        -webkit-appearance: button;
        text-transform: none;
        overflow: visible;
        line-height: 1.15;
        margin: 0;
        will-change: transform;
        -moz-osx-font-smoothing: grayscale;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        transition: -webkit-transform .25s ease-out;
        transition: transform .25s ease-out;
        transition: transform .25s ease-out, -webkit-transform .25s ease-out
    }

    #dbmodal .modal__btn:focus,
    #dbmodal .modal__btn:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05)
    }

    #dbmodal .modal__btn-primary {
        background-color: #00449e;
        color: #fff
    }

    #dbmodal .modal__footer {
        text-align: center;
        margin-top: .3rem
    }

    #dbmodal a {
        color: #1e90ff
    }
</style>
<style type="text/css">
    #dbmodal .modal__btn {
        min-width: 300px;
        margin-top: 20px
    }

    #dbmodal input[type=text],
    select {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc
    }

    #dbmodal .hide {
        display: none
    }

    #dbmodal .show {
        display: block
    }

    #dbmodal .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -16px
    }

    #dbmodal .col {
        -ms-flex: 1;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center
    }

    #dbmodal .col-25 {
        -ms-flex: 25%;
        flex: 25%
    }

    #dbmodal .col-50 {
        -ms-flex: 50%;
        flex: 50%
    }

    #dbmodal .col-75 {
        -ms-flex: 75%;
        flex: 75%
    }

    #dbmodal .col-100 {
        -ms-flex: 100%;
        flex: 100%
    }

    #dbmodal .col,
    .col-25,
    .col-50,
    .col-75,
    .col-100 {
        padding: 0 16px
    }
</style>
<style type="text/css">
    #dbmodal .modal__btn {
        min-width: 300px;
        margin-top: 20px
    }

    #dbmodal input[type=text],
    select {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc
    }

    #dbmodal .hide {
        display: none
    }

    #dbmodal .show {
        display: block
    }

    #dbmodal .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -16px
    }

    #dbmodal .col {
        -ms-flex: 1;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center
    }

    #dbmodal .col-25 {
        -ms-flex: 25%;
        flex: 25%
    }

    #dbmodal .col-50 {
        -ms-flex: 50%;
        flex: 50%
    }

    #dbmodal .col-75 {
        -ms-flex: 75%;
        flex: 75%
    }

    #dbmodal .col-100 {
        -ms-flex: 100%;
        flex: 100%
    }

    #dbmodal .col,
    .col-25,
    .col-50,
    .col-75,
    .col-100 {
        padding: 0 16px
    }
</style>
<div id="databot-tracking-loader" class="databot-tracking-loader" style="display:none">
    <p>Your request is being processed. Please wait..</p>
    <div class="lds-css" style="padding-left:40%">
        <div class="lds-gear" style="">
            <div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>