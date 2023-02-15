<?php

class IkvaInfiniteScrollAnimationHelper
{

    function ikva_infinite_scroll_animation_helper_getCode(string $style)
    {

        switch ($style) {
            case "solid-square":
                return $this->ikva_infinite_scroll_animation_solidSquare();
                break;
            case "chasing-dots":
                return $this->ikva_infinite_scroll_animation_chasingDots();
                break;
            case "circle-bounce":
                return $this->ikva_infinite_scroll_animation_circleBounce();
                break;
            case "jumping-waves":
                return $this->ikva_infinite_scroll_animation_jumpingWaves();
                break;
            case "ripple-effect":
                return $this->ikva_infinite_scroll_animation_rippleEffect();
                break;
            case "bouncing-bubbles":
                return $this->ikva_infinite_scroll_animation_bouncingBubbles();
                break;
            case "magic-cubes":
                return $this->ikva_infinite_scroll_animation_magicCubes();
                break;
            case "ikva_infinite_scroll_animation_buffering":
                return $this->ikva_infinite_scroll_animation_buffering();
                break;
            case "folding-cubes":
                return $this->ikva_infinite_scroll_animation_foldingCubes();
                break;
            case "filling-circle":
                return $this->ikva_infinite_scroll_animation_fillingCircle();
                break;
            default:
                return $this->ikva_infinite_scroll_animation_solidSquare();
        }

    }


    function ikva_infinite_scroll_animation_solidSquare()
    {
        return array(
            "name" => "Solid Square",
            "html" => "<div class=\"solid-square\"></div>",
            "css" => ".solid-square{width:40px;height:40px;background-color:[user-selected-color];margin:10px auto;-webkit-animation:sk-rotateplane 1.2s infinite ease-in-out;animation:sk-rotateplane 1.2s infinite ease-in-out}@-webkit-keyframes sk-rotateplane{0%{-webkit-transform:perspective(120px)}50%{-webkit-transform:perspective(120px) rotateY(180deg)}100%{-webkit-transform:perspective(120px) rotateY(180deg) rotateX(180deg)}}@keyframes sk-rotateplane{0%{transform:perspective(120px) rotateX(0) rotateY(0);-webkit-transform:perspective(120px) rotateX(0) rotateY(0)}50%{transform:perspective(120px) rotateX(-180.1deg) rotateY(0);-webkit-transform:perspective(120px) rotateX(-180.1deg) rotateY(0)}100%{transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg);-webkit-transform:perspective(120px) rotateX(-180deg) rotateY(-179.9deg)}}"
        );
    }

    function ikva_infinite_scroll_animation_chasingDots()
    {
        return array(
            "name" => "Chasing Dots",
            "html" => "<div class=\"chasing-dots\"><div class=\"chasing-dots-single-dot\"></div><div class=\"chasing-dots-single-dot\"></div><div class=\"chasing-dots-single-dot\"></div><div class=\"chasing-dots-single-dot\"></div><div class=\"chasing-dots-single-dot\"></div><div class=\"chasing-dots-single-dot\"></div></div>",
            "css" => ".chasing-dots{margin:10px auto;width:50px;height:50px;position:relative;animation:sk-chase 2.5s infinite linear both}.chasing-dots-single-dot{width:100%;height:100%;position:absolute;left:0;top:0;animation:chasing-dots-single-dot 2s infinite ease-in-out both}.chasing-dots-single-dot:before{content:'';display:block;width:25%;height:25%;background-color:[user-selected-color];border-radius:100%;animation:chasing-dots-single-dot-before 2s infinite ease-in-out both}.chasing-dots-single-dot:nth-child(1){animation-delay:-1.1s}.chasing-dots-single-dot:nth-child(2){animation-delay:-1s}.chasing-dots-single-dot:nth-child(3){animation-delay:-.9s}.chasing-dots-single-dot:nth-child(4){animation-delay:-.8s}.chasing-dots-single-dot:nth-child(5){animation-delay:-.7s}.chasing-dots-single-dot:nth-child(6){animation-delay:-.6s}.chasing-dots-single-dot:nth-child(1):before{animation-delay:-1.1s}.chasing-dots-single-dot:nth-child(2):before{animation-delay:-1s}.chasing-dots-single-dot:nth-child(3):before{animation-delay:-.9s}.chasing-dots-single-dot:nth-child(4):before{animation-delay:-.8s}.chasing-dots-single-dot:nth-child(5):before{animation-delay:-.7s}.chasing-dots-single-dot:nth-child(6):before{animation-delay:-.6s}@keyframes sk-chase{100%{transform:rotate(360deg)}}@keyframes chasing-dots-single-dot{100%,80%{transform:rotate(360deg)}}@keyframes chasing-dots-single-dot-before{50%{transform:scale(.4)}0%,100%{transform:scale(1)}}"
        );
    }

    function ikva_infinite_scroll_animation_circleBounce()
    {
        return array(
            "name" => "Circle Bounce",
            "html" => "<div class=\"circle-bounce\"> <div class=\"double-bounce1\"></div><div class=\"double-bounce2\"></div></div>",
            "css" => ".circle-bounce{width:60px;height:60px;position:relative;margin:10px auto}.double-bounce1,.double-bounce2{width:100%;height:100%;border-radius:50%;background-color:[user-selected-color];opacity:.6;position:absolute;top:0;left:0;-webkit-animation:sk-bounce 2s infinite ease-in-out;animation:sk-bounce 2s infinite ease-in-out}.double-bounce2{-webkit-animation-delay:-1s;animation-delay:-1s}@-webkit-keyframes sk-bounce{0%,100%{-webkit-transform:scale(0)}50%{-webkit-transform:scale(1)}}@keyframes sk-bounce{0%,100%{transform:scale(0);-webkit-transform:scale(0)}50%{transform:scale(1);-webkit-transform:scale(1)}}"
        );
    }

    function ikva_infinite_scroll_animation_jumpingWaves()
    {
        return array(
            "name" => "Jumping Waves",
            "html" => "<div class=\"spinner-2\"> <div class=\"rect1\"></div><div class=\"rect2\"></div><div class=\"rect3\"></div><div class=\"rect4\"></div><div class=\"rect5\"></div></div>",
            "css" => ".spinner-2{margin:10px auto;width:100px;height:60px;text-align:center;font-size:10px}.spinner-2>div{margin-left:5px;background-color:[user-selected-color];height:100%;width:10px;display:inline-block;-webkit-animation:sk-stretchdelay 1.2s infinite ease-in-out;animation:sk-stretchdelay 1.2s infinite ease-in-out}.spinner-2 .rect2{-webkit-animation-delay:-1.1s;animation-delay:-1.1s}.spinner-2 .rect3{-webkit-animation-delay:-1s;animation-delay:-1s}.spinner-2 .rect4{-webkit-animation-delay:-.9s;animation-delay:-.9s}.spinner-2 .rect5{-webkit-animation-delay:-.8s;animation-delay:-.8s}@-webkit-keyframes sk-stretchdelay{0%,100%,40%{-webkit-transform:scaleY(.4)}20%{-webkit-transform:scaleY(1)}}@keyframes sk-stretchdelay{0%,100%,40%{transform:scaleY(.4);-webkit-transform:scaleY(.4)}20%{transform:scaleY(1);-webkit-transform:scaleY(1)}}"
        );
    }


    function ikva_infinite_scroll_animation_rippleEffect()
    {
        return array(
            "name" => "Ripple Effect",
            "html" => "<div class=\"ripple-effect\"></div>",
            "css" => ".ripple-effect{width:60px;height:60px;margin:10px auto;background-color:[user-selected-color];border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}"
        );
    }


    function ikva_infinite_scroll_animation_bouncingBubbles()
    {
        return array(
            "name" => "Bouncing Bubbles",
            "html" => "<div class=\"spinner-1\"> <div class=\"bounce1\"></div><div class=\"bounce2\"></div><div class=\"bounce3\"></div></div>",
            "css" => ".spinner-1{margin:10px auto 0;width:100px;text-align:center}.spinner-1>div{margin-left:10px;width:18px;height:18px;background-color:[user-selected-color];border-radius:100%;display:inline-block;-webkit-animation:sk-bouncedelay 1.4s infinite ease-in-out both;animation:sk-bouncedelay 1.4s infinite ease-in-out both}.spinner-1 .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner-1 .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes sk-bouncedelay{0%,100%,80%{-webkit-transform:scale(0)}40%{-webkit-transform:scale(1)}}@keyframes sk-bouncedelay{0%,100%,80%{-webkit-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);transform:scale(1)}}"
        );
    }

    function ikva_infinite_scroll_animation_magicCubes()
    {
        return array(
            "name" => "Magic Cubes",
            "html" => "<div class=\"sk-cube-grid\"> <div class=\"sk-cube sk-cube1\"></div><div class=\"sk-cube sk-cube2\"></div><div class=\"sk-cube sk-cube3\"></div><div class=\"sk-cube sk-cube4\"></div><div class=\"sk-cube sk-cube5\"></div><div class=\"sk-cube sk-cube6\"></div><div class=\"sk-cube sk-cube7\"></div><div class=\"sk-cube sk-cube8\"></div><div class=\"sk-cube sk-cube9\"></div></div>",
            "css" => ".sk-cube-grid{width:50px;height:50px;margin:10px auto}.sk-cube-grid .sk-cube{width:33%;height:33%;background-color:[user-selected-color];float:left;-webkit-animation:sk-cubeGridScaleDelay 1.3s infinite ease-in-out;animation:sk-cubeGridScaleDelay 1.3s infinite ease-in-out}.sk-cube-grid .sk-cube1{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube2{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube3{-webkit-animation-delay:.4s;animation-delay:.4s}.sk-cube-grid .sk-cube4{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube5{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube6{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube7{-webkit-animation-delay:0s;animation-delay:0s}.sk-cube-grid .sk-cube8{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube9{-webkit-animation-delay:.2s;animation-delay:.2s}@-webkit-keyframes sk-cubeGridScaleDelay{0%,100%,70%{-webkit-transform:scale3D(1,1,1);transform:scale3D(1,1,1)}35%{-webkit-transform:scale3D(0,0,1);transform:scale3D(0,0,1)}}@keyframes sk-cubeGridScaleDelay{0%,100%,70%{-webkit-transform:scale3D(1,1,1);transform:scale3D(1,1,1)}35%{-webkit-transform:scale3D(0,0,1);transform:scale3D(0,0,1)}}"
        );
    }


    function ikva_infinite_scroll_animation_buffering()
    {
        return array(
            "name" => "Buffering",
            "html" => "<div class=\"sk-fading-circle\"><div class=\"sk-circle1 sk-circle\"></div><div class=\"sk-circle2 sk-circle\"></div><div class=\"sk-circle3 sk-circle\"></div><div class=\"sk-circle4 sk-circle\"></div><div class=\"sk-circle5 sk-circle\"></div><div class=\"sk-circle6 sk-circle\"></div><div class=\"sk-circle7 sk-circle\"></div><div class=\"sk-circle8 sk-circle\"></div><div class=\"sk-circle9 sk-circle\"></div><div class=\"sk-circle10 sk-circle\"></div><div class=\"sk-circle11 sk-circle\"></div><div class=\"sk-circle12 sk-circle\"></div></div>",
            "css" => ".sk-fading-circle{margin:10px auto;width:50px;height:50px;position:relative}.sk-fading-circle .sk-circle{width:100%;height:100%;position:absolute;left:0;top:0}.sk-fading-circle .sk-circle:before{content:'';display:block;margin:0 auto;width:15%;height:15%;background-color:[user-selected-color];border-radius:100%;-webkit-animation:sk-circleFadeDelay 1.2s infinite ease-in-out both;animation:sk-circleFadeDelay 1.2s infinite ease-in-out both}.sk-fading-circle .sk-circle2{-webkit-transform:rotate(30deg);-ms-transform:rotate(30deg);transform:rotate(30deg)}.sk-fading-circle .sk-circle3{-webkit-transform:rotate(60deg);-ms-transform:rotate(60deg);transform:rotate(60deg)}.sk-fading-circle .sk-circle4{-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}.sk-fading-circle .sk-circle5{-webkit-transform:rotate(120deg);-ms-transform:rotate(120deg);transform:rotate(120deg)}.sk-fading-circle .sk-circle6{-webkit-transform:rotate(150deg);-ms-transform:rotate(150deg);transform:rotate(150deg)}.sk-fading-circle .sk-circle7{-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg)}.sk-fading-circle .sk-circle8{-webkit-transform:rotate(210deg);-ms-transform:rotate(210deg);transform:rotate(210deg)}.sk-fading-circle .sk-circle9{-webkit-transform:rotate(240deg);-ms-transform:rotate(240deg);transform:rotate(240deg)}.sk-fading-circle .sk-circle10{-webkit-transform:rotate(270deg);-ms-transform:rotate(270deg);transform:rotate(270deg)}.sk-fading-circle .sk-circle11{-webkit-transform:rotate(300deg);-ms-transform:rotate(300deg);transform:rotate(300deg)}.sk-fading-circle .sk-circle12{-webkit-transform:rotate(330deg);-ms-transform:rotate(330deg);transform:rotate(330deg)}.sk-fading-circle .sk-circle2:before{-webkit-animation-delay:-1.1s;animation-delay:-1.1s}.sk-fading-circle .sk-circle3:before{-webkit-animation-delay:-1s;animation-delay:-1s}.sk-fading-circle .sk-circle4:before{-webkit-animation-delay:-.9s;animation-delay:-.9s}.sk-fading-circle .sk-circle5:before{-webkit-animation-delay:-.8s;animation-delay:-.8s}.sk-fading-circle .sk-circle6:before{-webkit-animation-delay:-.7s;animation-delay:-.7s}.sk-fading-circle .sk-circle7:before{-webkit-animation-delay:-.6s;animation-delay:-.6s}.sk-fading-circle .sk-circle8:before{-webkit-animation-delay:-.5s;animation-delay:-.5s}.sk-fading-circle .sk-circle9:before{-webkit-animation-delay:-.4s;animation-delay:-.4s}.sk-fading-circle .sk-circle10:before{-webkit-animation-delay:-.3s;animation-delay:-.3s}.sk-fading-circle .sk-circle11:before{-webkit-animation-delay:-.2s;animation-delay:-.2s}.sk-fading-circle .sk-circle12:before{-webkit-animation-delay:-.1s;animation-delay:-.1s}@-webkit-keyframes sk-circleFadeDelay{0%,100%,39%{opacity:0}40%{opacity:1}}@keyframes sk-circleFadeDelay{0%,100%,39%{opacity:0}40%{opacity:1}}"
        );
    }

    function ikva_infinite_scroll_animation_foldingCubes()
    {
        return array(
            "name" => "Folding Cubes",
            "html" => "<div class=\"sk-folding-cube\"> <div class=\"sk-cube1 sk-cube\"></div><div class=\"sk-cube2 sk-cube\"></div><div class=\"sk-cube4 sk-cube\"></div><div class=\"sk-cube3 sk-cube\"></div></div>",
            "css" => ".sk-folding-cube{margin:20px auto;width:40px;height:40px;position:relative;-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}.sk-folding-cube .sk-cube{float:left;width:50%;height:50%;position:relative;-webkit-transform:scale(1.1);-ms-transform:scale(1.1);transform:scale(1.1)}.sk-folding-cube .sk-cube:before{content:'';position:absolute;top:0;left:0;width:100%;height:100%;background-color:[user-selected-color];-webkit-animation:sk-foldCubeAngle 2.4s infinite linear both;animation:sk-foldCubeAngle 2.4s infinite linear both;-webkit-transform-origin:100% 100%;-ms-transform-origin:100% 100%;transform-origin:100% 100%}.sk-folding-cube .sk-cube2{-webkit-transform:scale(1.1) rotateZ(90deg);transform:scale(1.1) rotateZ(90deg)}.sk-folding-cube .sk-cube3{-webkit-transform:scale(1.1) rotateZ(180deg);transform:scale(1.1) rotateZ(180deg)}.sk-folding-cube .sk-cube4{-webkit-transform:scale(1.1) rotateZ(270deg);transform:scale(1.1) rotateZ(270deg)}.sk-folding-cube .sk-cube2:before{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-folding-cube .sk-cube3:before{-webkit-animation-delay:.6s;animation-delay:.6s}.sk-folding-cube .sk-cube4:before{-webkit-animation-delay:.9s;animation-delay:.9s}@-webkit-keyframes sk-foldCubeAngle{0%,10%{-webkit-transform:perspective(140px) rotateX(-180deg);transform:perspective(140px) rotateX(-180deg);opacity:0}25%,75%{-webkit-transform:perspective(140px) rotateX(0);transform:perspective(140px) rotateX(0);opacity:1}100%,90%{-webkit-transform:perspective(140px) rotateY(180deg);transform:perspective(140px) rotateY(180deg);opacity:0}}@keyframes sk-foldCubeAngle{0%,10%{-webkit-transform:perspective(140px) rotateX(-180deg);transform:perspective(140px) rotateX(-180deg);opacity:0}25%,75%{-webkit-transform:perspective(140px) rotateX(0);transform:perspective(140px) rotateX(0);opacity:1}100%,90%{-webkit-transform:perspective(140px) rotateY(180deg);transform:perspective(140px) rotateY(180deg);opacity:0}}"
        );
    }


    function ikva_infinite_scroll_animation_fillingCircle()
    {
        return array(
            "name" => "Filling Circle",
            "html" => "<div class=\"filling-circle\"></div>",
            "css" => ".filling-circle{border:6px solid #f3f3f3;border-radius:50%;border-top:6px solid [user-selected-color];width:50px;height:50px;-webkit-animation:spin 1s linear infinite;animation:spin .5s linear infinite;margin:0 auto}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}"
        );
    }


}
