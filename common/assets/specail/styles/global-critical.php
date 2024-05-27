
@font-face {
    font-family:"OpenSans-Regular";
    src: url(fonts/opensans/OpenSans-Regular.woff2);
    font-display: swap;
}
@font-face {
    font-family:"OpenSans-Bold";
    src: url(fonts/opensans/OpenSans-Bold.woff2);
    font-display:swap;
}
@font-face {
    font-family:"OpenSans-Semibold";
    src: url(fonts/opensans/OpenSans-Semibold.woff2);
    font-display: swap;
}
@font-face {
    font-family: "Lato-Bold";
    src: url(fonts/lato/Lato-Bold.woff2);
    font-display: swap;
}
@font-face {
    font-family: "Lato-Regular";
    src: url(fonts/lato/Lato-Regular.woff2);
    font-display: swap;
}
@font-face {
    font-family: "Lato-Black";
    src: url(fonts/lato/Lato-Black.woff2);
    font-display: swap;
}
@font-face {
    font-family: "Arial-regular";
    src: url(fonts/arial/Arial-regular.woff2);
    font-display: swap;
}
@font-face {
    font-family: "Arial-bold";
    src: url(fonts/arial/Arial-bold.woff2);
    font-display: swap;
}
@font-face {
    font-family:"Tahoma-regular";
    src: url(fonts/tahoma/Tahoma-regular.woff2);
    font-display: swap;
}
@font-face {
    font-family:"Tahoma-Bold";
    src: url(fonts/tahoma/Tahoma-bold.woff2);
    font-display:swap;
}
@font-face {
    font-family:"DroidSans";
    src: url(fonts/droid/DroidSans.woff2);
    font-display: swap;
}
@font-face {
    font-family:"DroidSans-Bold";
    src: url(fonts/droid/DroidSans-Bold.woff2);
    font-display:swap;
}
@font-face {
    font-family:"MYRIADPRO-regular";
    src: url(fonts/myriad/MYRIADPRO-regular.woff2);
    font-display: swap;
}
@font-face {
    font-family:"MYRIADPRO-COND";
    src: url(fonts/myriad/MYRIADPRO-COND.woff2);
    font-display: swap;
}
@font-face {
    font-family:"MYRIADPRO-Semibold";
    src: url(fonts/myriad/MYRIADPRO-Semibold.woff2);
    font-display:swap;
}
@font-face {
    font-family:"MYRIADPRO-Bold";
    src: url(fonts/myriad/MYRIADPRO-Bold.woff2);
    font-display: swap;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    text-rendering: optimizeSpeed;
    scroll-behavior: smooth;
}
h1,h2,h3,h4,h5,h6{
    font-family:"OpenSans-Bold";
    line-height:1.2em;
    padding-bottom:10px;
}
a, span{
    text-decoration:none;
    font-family:"OpenSans-Semibold";
    line-height:1.5em;
}
p, li, button{
    font-family:"OpenSans-Regular";
    border:none;
}
.row{
    display:flex;
    width:90%;
    max-width:1140px;
    margin:0px auto;
    flex-wrap: wrap;
    justify-content:center;
}
.col-m-12{
    width:100%;
}
.col-m-10{
    width:83.333%;
}
.col-m-9{
    width:75%;
}
.col-m-8{
    width:66.666%;
}
.col-m-7{
    width:58.333%;
}
.col-m-6{
    width:50%;
}
.col-m-5{
    width:41.666%;
}
.col-m-4{
    width:33.333%;
}
.col-m-3{
    width:25%;
}
.col-m-2{
    width:16.66%;
}
.col-m-12{
    width:100%;
}

@media all and (min-width:767px){
    .col-t-10{
        width:83.333%;
    }
    .col-t-9{
        width:75%;
    }
    .col-t-8{
        width:66.666%;
    }
    .col-t-7{
        width:58.333%;
    }
    .col-t-6{
        width:50%;
    }
    .col-t-5{
        width:41.666%;
    }
    .col-t-4{
        width:33.333%;
    }
    .col-t-3{
        width:25%;
    }
    .col-t-2{
        width:16.66%;
    }
}
@media all and (min-width:1101px){
    .col-d-10{
        width:83.333%;
    }
    .col-d-9{
        width:75%;
    }
    .col-d-8{
        width:66.666%;
    }
    .col-d-7{
        width:58.333%;
    }
    .col-d-6{
        width:50%;
    }
    .col-d-5{
        width:41.666%;
    }
    .col-d-4{
        width:33.333%;
    }
    .col-d-3{
        width:25%;
    }
    .col-d-2{
        width:16.66%;
    }
}