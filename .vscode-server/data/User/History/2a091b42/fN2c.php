<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A professional contact form for your website">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }
        body {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(rgb(87, 108, 117) 0%, rgb(37, 50, 55) 100.2%);
        }

        .contact-box {
            max-width: 850px;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            box-shadow: 0px 0px 19px 5px rgba(0, 0, 0, 0.19);
            overflow: hidden;
            border-radius: 
            8px;
}
.left {
        background: url("contact.jpg") center center / cover;
    }

    .right {
        background-color: #fff;
        padding: 2rem;
    }

    h2 {
        margin-bottom: 1rem;
        position: relative;
    }

    h2:after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        height: 4px;
        width: 50px;
        border-radius: 2px;
        background-color: rgb(255, 0, 0);
    }

    .field {
        width: 100%;
        border: 2px solid rgba(0, 0, 0, 0);
        outline: none;
        background-color: rgba(230, 230, 230, 0.6);
        padding: 0.5rem 1rem;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        transition: .3s;
    }

    .field:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    textarea {
        min-height: 150px;
    }

    /* Send Button CSS from Code 1 */
    input[type=checkbox] {
        display: none;
    }

    .send {
        --hue: 30deg;
        position: relative;
        width: 100%;
        height: 50px;
        perspective: 66rem;
transform-style: preserve-3d;
cursor: pointer;
overflow: hidden;
margin-bottom: 1.5rem;
}
.send *, .send *::before, .send *::after {
        transition: all 1s;
    }

    .send .rotate {
        width: 100%;
        height: 100%;
        position: relative;
        transform-style: preserve-3d;
    }

    .send .rotate .move {
        transform-style: preserve-3d;
        width: 100%;
        height: 100%;
        position: relative;
    }

    .send .rotate .move .part {
        position: absolute;
        transform-style: preserve-3d;
        width: 100%;
        height: 100%;
    }

    .send .rotate .move .part::before, .send .rotate .move .part::after {
        content: "SEND";
        width: 100%;
        height: 50%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgb(1, 1, 55);
        font-size: 1.2rem;
        font-weight: bold;
        color: #fff;
    }

    .send .rotate .move .part.left::before {
        transform-origin: 50% 25%;
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 1px, 0 calc(50% + 1px));
clip-path: polygon(0 0, 100% 0, 100% 1px, 0 calc(50% + 1px));
}
.send .rotate .move .part.left::after {
        -webkit-clip-path: polygon(0 50%, 100% 0, 100% 1px, 1px 100%, 0 100%);
        clip-path: polygon(0 50%, 100% 0, 100% 1px, 1px 100%, 0 100%);
    }

    .send .rotate .move .part.right::before {
        -webkit-clip-path: polygon(0 100%, 100% 0, 100% 1px, calc(50% + 1px) 100%, 50% 100%);
        clip-path: polygon(0 100%, 100% 0, 100% 1px, calc(50% + 1px) 100%, 50% 100%);
    }

    .send .rotate .move .part.right::after {
        transform-origin: 75% 50%;
        -webkit-clip-path: polygon(100% 0, 50% 100%, 100% 100%);
        clip-path: polygon(100% 0, 50% 100%, 100% 100%);
    }

    #send:checked ~ .send .rotate {
        transform: rotate3d(1, -0.2, 0.2, 65deg);
    }

    #send:checked ~.send .rotate .move {
-webkit-animation: fly 3s cubic-bezier(0.72, -0.23, 0.35, 1.03) 1s both;
animation: fly 3s cubic-bezier(0.72, -0.23, 0.35, 1.03) 1s both;
}
#send:checked ~ .send .rotate .part.left {
        transform: rotate3d(-1, 1, 0, 60deg);
    }

    #send:checked ~ .send .rotate .part.left::before {
        transform: rotate3d(-1, 0.5, 0, -60deg);
    }

    #send:checked ~ .send .rotate .part.left::after {
        background-color: rgb(2, 2, 65);
    }

    #send:checked ~ .send .rotate .part.right {
        transform: rotate3d(-1, 1, 0, -60deg);
    }

    #send:checked ~ .send .rotate .part.right::before {
        background-color: rgb(10, 10, 72);
    }

    #send:checked ~ .send .rotate .part.right::after {
        transform: rotate3d(-0.25, 0.5, 0, 100deg);
    }

    @-webkit-keyframes fly {
        0% {
            transform: translate3D(0, 0, 0rem);
        }
        50% {
            transform: translate3D(400rem, -400rem, 0rem);
        }
        50.00001% {
            transform: translate3D(-100rem, 100rem, 0rem);
}
100% {
transform: translate3D(0rem, 0rem, 0rem);
}
}
@keyframes fly {
        0% {
            transform: translate3D(0, 0, 0rem);
        }
        50% {
            transform: translate3D(400rem, -400rem, 0rem);
        }
        50.00001% {
            transform: translate3D(-100rem, 100rem, 0rem);
        }
        100% {
            transform: translate3D(0rem, 0rem, 0rem);
        }
    }
</style>
</head>
<body>
    <div class="contact-box">
        <div class="left"></div>
        <div class="right">
            <h2>Contact Us</h2>
            <form>
                <input type="text" class="field" placeholder="Your Name" required>
                <input type="email" class="field" placeholder="Your Email" required>
                <input type="tel" class="field" placeholder="Phone" required>
                <textarea placeholder="Message" class="field" required></textarea>
                <input type="checkbox" name="send" id="send" />
                <label for="send" class="send">
                    <div class="rotate">
                        <div class="move">
                            <div class="part left"></div>
                            <div class="part right"></div>
                        </div>
                    </div>
                </label>
            </form>
        </div>
    </div>
</body>