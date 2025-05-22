<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Digi_Learn - Ajouter un Cours</title>
  <style>
    /* إخفاء النافذة المنبثقة في البداية */
    #popupForm {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      z-index: 1000;
      width: 80%;
      max-width: 500px;
    }

    /* الظل الخلفي عند فتح النموذج */
    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    /* تنسيق نموذج إضافة الدورة */
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 20px;
      cursor: pointer;
    }

    button {
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #2980b9;
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

  <!-- رابط إضافة الدورة -->
  @auth
    @if(Auth::user()->email == 'sdcb@gmail.com')
        <a href="#" class="add-course-btn" onclick="openPopup()">Ajouter Course</a>
    @endif
  @endauth

  <!-- نافذة منبثقة -->
  <div id="overlay"></div>
  <div id="popupForm">
    <span class="close" onclick="closePopup()">&times;</span>
    <h1>Ajouter un Cours</h1>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label for="name">Nom du cours</label>
      <input type="text" name="name" id="name" placeholder="Ex: Développement Web" required>
      
      <label for="pdf">Fichier PDF</label>
      <input type="file" name="pdf" id="pdf" accept="application/pdf" required>
      
      <button type="submit">📄 Ajouter le cours</button>
    </form>
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

  <script>
    // فتح النموذج المنبثق
    function openPopup() {
      document.getElementById("popupForm").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    // إغلاق النموذج المنبثق
    function closePopup() {
      document.getElementById("popupForm").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }
  </script>

</body>
</html>
