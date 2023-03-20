<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A professional contact form for your website">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        background: radial-gradient(rgb(97, 53, 158) 0%, rgb(29, 7, 59) 100.2%);
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
        background-color: #f5f5f5;
        padding: 2rem;
    }

    h2 {
        margin-bottom: 1rem;
        position: relative;
        color: #555;
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
        background-color: #673AB7;
    }

    .field {
        width: 100%;
        border: 2px solid rgba(0, 0, 0, 0);
        outline: none;
        background-color: rgba(245, 245, 245, 0.8);
        padding: 0.5rem 1rem;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        transition: .3s;
        border-radius: 4px;
    }

    .field:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    textarea {
        min-height: 150px;
    }

    /* Integration of the custom send button */
    .send {
        display: inline-block;
        position: relative;
        width: 100%;
        height: 50px;
        overflow: hidden;
        cursor: pointer;
    }

    .rotate {
        display: inline-block;
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #673AB7;
        border-radius: 4px;
        transition: .4s ease-in-out;
    }

    .move {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .part {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #fff;
    }

    .left {
       
        left: 0;
}
.right {
        right: 0;
    }

    input[type="checkbox"]:checked ~ .send .rotate {
        transform: rotate(45deg);
    }

    .field:focus {
        border: 2px solid #673AB7;
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
