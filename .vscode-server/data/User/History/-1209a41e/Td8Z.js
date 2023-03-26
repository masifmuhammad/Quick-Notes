<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body,
    button {
      font-family: "Poppins", sans-serif;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f2f2f2;
    }

    h1 {
      margin-bottom: 2rem;
      font-size: 2rem;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    label {
      margin-bottom: 1rem;
    }

    input[type="tel"] {
      padding: 0.5rem;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
      margin-bottom: 2rem;
      font-size: 1rem;
    }

    button[type="submit"] {
      padding: 0.5rem 1rem;
      background-color: #1179e7;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }

    button[type="submit"]:hover {
      background-color: #0d63ac;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Reset Password</h1>
    <form id="reset-form">
      <label for="phone">Enter your phone number:</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
      <button type="submit">Send OTP</button>
    </form>
  </div>
  <script>
    // Define the API endpoint and message parameters
    const url = 'https://platform.clickatell.com/v1/message';
    const apiKey = 'XhyyYtGkTDK--7vQExzdkw==';

    // Get the form and input elements
    const form = document.getElementById('reset-form');
    const phoneInput = form.querySelector('#phone');

    // Handle form submission
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      // Get the phone number and generate the OTP (for demo purposes)
      const phone = phoneInput.value;
      const otp = Math.floor(Math.random() * 10000);

      // Send the SMS message
      const xhr = new XMLHttpRequest();
      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('Authorization', `Bearer ${apiKey}`);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 202) {
              // Message sent successfully
              console.log('Message sent');
  
              // Ask the user to enter the OTP and reset their password
              const resetCode = prompt('Enter the code received via SMS:');
              if (resetCode === otp.toString()) {
                // OTP matched, reset the password (replace with your own password reset logic)
                alert('Password reset successful!');
              } else {
                // OTP did not match
                alert('Incorrect code, please try again.');
              }
            } else {
              // Error sending message
              console.error('Error sending message:', xhr.responseText);
              alert('Error sending message, please try again later.');
            }
          }
        };
  
        const message = `Your password reset code is: ${otp}`;
        xhr.send(JSON.stringify({
          messages: [{ to: phone, content: message }],
        }));
      });
    </script>
  </body>
  </html>
  