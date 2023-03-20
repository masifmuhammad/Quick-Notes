<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylecolumn.css" />
    <title>Responsive Sidebar</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container" id="sidebar">
      <ul class="link-items">
        <li class="link-item top">
          <a href="#" class="link">
            <img src="https://www.35mmc.com/wp-content/uploads/2021/10/00-logo.png" alt="" />
            <span class="text">
              <h4>Quick-Notes</h4>
            </span>
          </a>
        </li>
        <li class="link-item active">
          <a href="main.php" class="link">
            <ion-icon name="home-outline"></ion-icon>
            <span class="text">Notes</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="cube-outline"></ion-icon>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="layers-outline"></ion-icon>
            <span class="text">Projects</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="checkbox-outline"></ion-icon>
            <span class="text">Tasks</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="cog-outline"></ion-icon>
            <span class="text">Settings</span>
          </a>
        </li>
        <li class="link-item dark-mode">
          <a href="#" class="link" id="darkModeToggle">
            <ion-icon name="moon-outline"></ion-icon>
            <span class="text">Dark Mode</span>
          </a>
        </li>
      </ul>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="scriptcolumn2.js"></script>
  </body>
</html>