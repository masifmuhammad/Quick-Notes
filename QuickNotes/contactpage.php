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
        border-radius: 8px;
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

    .btn-submit {
        width: 100%;
        padding: 0.5rem 1rem;
        background-color: rgb(255, 0, 0);
        color: #fff;
        font-size: 1.4rem;
        border: none;
        outline: none;
        cursor: pointer;
        transition: .3s;
        border-radius: 4px;
    }

    .btn-submit:hover {
        background-color: rgba(255, 0, 0, 0.59);
    }

    .field:focus {
        border: 2px solid rgb(255, 0, 0);
        background-color: #fff;
    }

    @media screen and (max-width: 880px) {
        .contact-box {
            grid-template-columns: 1fr;
        }

        .left {
            height: 200px;
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
                <button type="submit" class="btn-submit">SEND</button>
            </form>
        </div>
    </div>
</body>
</html>