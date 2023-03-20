<!-- Begin Left Column -->
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
    <div class="container">
      <ul class="link-items">
        <li class="link-item top">
          <a href="#" class="link">
            <img src="https://www.35mmc.com/wp-content/uploads/2021/10/00-logo.png" alt="" />
            <span style="--i: 9">
              <h4>Quick-Notes</h4>
            </span>
          </a>
        </li>
        <li class="link-item active">
          <a href="#" class="link">
            <ion-icon name="home-outline"></ion-icon>
            <span style="--i: 1">Notes</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="cube-outline"></ion-icon>
            <span style="--i: 2">dashboard</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link"
            ><ion-icon name="layers-outline"></ion-icon>
            <span style="--i: 3">projects</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="checkbox-outline"></ion-icon
            ><span style="--i: 5">tasks</span>
          </a>
        
        <li class="link-item">
          <a href="#" class="link">
            <ion-icon name="cog-outline"></ion-icon>
            <span style="--i: 6">settings</span>
          </a>
        </li>

        <li class="link-item dark-mode">
          <a href="#" class="link">
            <ion-icon name="moon-outline"></ion-icon>
            <span style="--i: 8">dark mode</span>
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
    <script src="scriptcolumn.js"></script>
  </body>
</html>
<!-- End Left Column -->