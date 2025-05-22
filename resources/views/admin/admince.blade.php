<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Digi_Learn</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #FAFAFA;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .navbar {
      background-color: #2C3E50;
      color: white;
      padding: 15px 20px;
      border-radius: 0 0 10px 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .navbar .deji {
      font-family: 'Brush Script MT', cursive;
      font-size: 28px;
      color: #F39C12;
    }

    .lienboton {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .lienboton a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      font-size: 16px;
      transition: color 0.3s;
    }

    .lienboton a:hover {
      color: #F39C12;
    }

    .login {
      width: 90px;
      height: 32px;
      font-size: 16px;
      background-color: #F39C12;
      color: white;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login:hover {
      background-color: #e08904;
    }

    h1 {
      text-align: center;
      margin-top: 60px;
      font-size: 26px;
      color: #2C3E50;
    }

    .box {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      margin: 70px auto;
    }

    .card-link {
      background-color: #F9F9F9;
      width: 300px;
      height: 250px;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      text-decoration: none;
      color: #2C3E50;
      transition: transform 0.3s, background-color 0.3s;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .card-link:hover {
      background-color: #FFFAE1;
      transform: translateY(-5px);
    }

    .card-link h2 {
      font-size: 28px;
      color: #3498db;
      margin-bottom: 10px;
      font-weight: 700;
    }

    .card-link p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
    }

    .card-link .manage-btn {
      background-color: #3498db;
      color: white;
      padding: 10px 18px;
      border-radius: 5px;
      font-size: 15px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .card-link .manage-btn:hover {
      background-color: #2980b9;
    }

    footer {
      background-color: #1A252F;
      color: white;
      padding: 10px 5%;
      font-size: 13px;
      margin-top: auto;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .contact-info h3 {
      margin-bottom: 5px;
      font-size: 16px;
    }

    .contact-info p {
      margin: 2px 0;
      font-size: 12px;
    }

    .contact-info a {
      color: #F39C12;
      text-decoration: none;
      font-size: 12px;
    }

    .contact-info a:hover {
      text-decoration: underline;
    }

    .copyright {
      width: 100%;
      text-align: center;
      font-size: 11px;
      color: #aaa;
      margin-top: 10px;
    }

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .lienboton {
        flex-direction: column;
        align-items: flex-start;
        margin-top: 10px;
      }

      .box {
        flex-direction: column;
        align-items: center;
        margin: 40px 20px;
      }

      .card-link {
        width: 90%;
        height: auto;
        padding: 20px;
      }

      .card-link h2 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="deji">Digi_Learn</div>
    <div class="lienboton">
      <a href="#">Home</a>
      <button class="login">Login</button>
    </div>
  </div>

  <h1>Que souhaitez-vous consulter ?</h1>

  <div class="box">
    <a href="#" class="card-link">
      <h2>Cours</h2>
      <p>Voir les cours</p>
      <span class="manage-btn">Accéder</span>
    </a>
    <a href="#" class="card-link">
      <h2>EFMs</h2>
      <p>Voir les EFMs</p>
      <span class="manage-btn">Accéder</span>
    </a>
  </div>

  <footer>
    <div class="footer-content">
      <div class="contact-info">
        <h3>Contact</h3>
        <p><strong>Email:</strong> <a href="mailto:Digi_learn@gmail.com">Digi_learn@gmail.com</a></p>
        <p><strong>Phone:</strong> <a href="tel:+212777398942">+212 7773-98942</a></p>
      </div>
      <div class="copyright">
        <p>&copy; 2025 Digi_Learn. Tous droits réservés.</p>
      </div>
    </div>
  </footer>
</body>
</html>
