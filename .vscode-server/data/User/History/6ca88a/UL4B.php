<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Team</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body {
  font-family: "Poppins", sans-serif;
}

.team-section {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: radial-gradient(
    rgb(87, 108, 117) 0%,
    rgb(37, 50, 55) 100.2%
  );
}

.team-section h1 {
  text-align: center;
  margin: 40px 0;
  font-size: 48px;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
}

.team-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  max-width: 80%;
  margin: 0 auto;
}

.team-card {
  width: 400px;
  height: 500px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  margin: 20px;
  text-align: center;
  transition: all 0.3s;
  overflow: hidden;
}

.team-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.19), 0 16px 16px rgba(0,0,0,0.23);
}

.team-card img {
  width: 100%;
  height: 250px;
  object-fit: cover;
}

.team-card h3 {
  font-size: 24px;
  font-weight: bold;
  margin: 20px 0 0 0;
  color: #333;
}

.team-card p {
  font-size: 18px;
  margin: 10px 20px;
  text-align: justify;
  color: #666;
}

.team-card p.role {
  font-weight: bold;
  margin-top: 10px;
  color: #999;
}
</style>
</head>
<body>
  <section class="team-section">
    <h1>Meet Our Team</h1>
    <div class="team-container">
      <div class="team-card">
        <img src="https://via.placeholder.com/400x250.png?text=Masif+Muhammad+Virk">
        <h3>Masif Muhammad Virk</h3>
        <p class="role">Team Leader</p>
        <p>Masif is an experienced programmer with over 5 years of experience in software development and marketing. He leads our team with his expertise and knowledge