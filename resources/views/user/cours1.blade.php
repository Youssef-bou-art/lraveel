<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="//unpkg.com/alpinejs" defer></script>

  <title>Digi_Learn - Cours1</title>
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
      width: 100px;
      text-align:center;
      height: 32px;
      font-size: 16px;
      padding:3px;
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
      margin-top: 40px;
      font-size: 26px;
      color: #2C3E50;
    }

    /* Barre de recherche */
     #searchInput {
      padding: 10px;
            width: 60%;
            max-width: 400px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 20px 0;
            display: block;
            position: relative;
            left: 35%;
       /* تحريك الـ input قليلاً لليسار */
    }

@if(Auth::check() && Auth::user()->email === config('admin.email'))
       #searchInput {
       padding: 10px;
      width: 60%;
      max-width: 400px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin: 20px 0;
      display: block;
      position: relative;
      left: 25%;
      }
    @endif

    .box {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      margin: 30px 20px;
    }

    .document-item {
      background-color: #FDF6E3;
      width: 250px;
      height: 200px;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #2C3E50;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s, transform 0.3s;
    }

    .document-item:hover {
      background-color: #FFEBC1;
      transform: scale(1.03);
    }

    .document-item h2 {
      font-size: 18px;
      margin: 10px 0;
    }

    .document-item p {
      font-size: 14px;
      margin: 0;
    }

    .view-btn, .download-btn {
      background-color: #3498db;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      font-size: 14px;
      text-decoration: none;
      margin-top: 10px;
      transition: background-color 0.3s;
    }

    .view-btn:hover, .download-btn:hover {
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
        gap: 20px;
      }

      .document-item {
        width: 90%;
        height: auto;
        padding: 20px;
      }

      .footer-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }
    }

    .add-course-btn {
      background-color: black;
      color: #F39C12;
      position: absolute;
      top: 175px;
      left: 800px;
      border: 2px solid #F39C12;
      padding: 10px 16px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .add-course-btn:hover {
      background-color: #F39C12;
      color: black;
    }

    /* Modal Styles */
    .modal {
      display: none; /* By default, hide the modal */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      width: 50%;
    }

    .modal-content h2 {
      margin-top: 0;
    }

    .modal-content input, .modal-content textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .modal-content button {
      background-color: #F39C12;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .modal-content button:hover {
      background-color: #e08904;
    }
     .circle-img-container {
    margin-left:130px;
  }

  .circle-img-container img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover; 
    margin-left: 5px;
     border: 2px solid #ccc; 
  }
    .user-menu {
    position: relative;
    display: inline-block;
  }

  .user-menu:hover .dropdown-content {
    display: block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    right: 0px;
    top:25px;
    background-color: #333;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 1000;
    border-radius: 8px;
  }

  .dropdown-content a {
    color: white;
    padding: 10px 15px;
    display: block;
    text-decoration: none;
  }

  .dropdown-content a:hover {
    background-color: #444;
    border-radius: 8px;
  }

/* تصميم النافذة (Modal) */
.modal {
    display: none; /* مخفي فالأول */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5); /* خلفية شفافة */
    transition: all 0.3s ease-in-out;
  }

  .modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    width: 60%;
    max-width: 600px;
    position: relative;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    font-weight: bold;
    color: #aaa;
    cursor: pointer;
  }
/* عند مرور الماوس على الأيقونة "Close" */
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* تنسيق النموذج داخل النافذة */
form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

/* تنسيق الحقول داخل النموذج */
label {
  font-size: 16px;
}

input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
  outline: none;
}

input:focus {
  border-color: #ff7f00; /* لون البرتقالي عند التركيز */
}

/* زر التحديث */
button {
  background-color: #ff7f00; /* اللون البرتقالي */
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #e66d00; /* لون برتقالي أغمق عند المرور */
}

/* عند فتح النافذة (modal) */
.modal.show {
  display: block;
}
  </style>
</head>
<body>
  <div class="navbar">
    <div class="deji">Digi_Learn</div>
    <div class="lienboton" style="display: flex; align-items: center; gap: 15px;">
@if(Auth::check() && Auth::user()->email === config('admin.email'))
     <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
  @endif

  <a href="{{route('home')}}">Accueil</a>

  @if (Route::has('login'))
    @auth
      <a class="login" href="{{ route('logout') }}">Déconnecter</a>
    @else
      <a onclick="showLoginModal()" class="login">Connecter</a>
    @endauth
  @endif

  @if(Auth::check())
<div class="user-menu" style="display: flex; align-items: center; gap: 5px;">
  <a style="display: flex; align-items: center; color: white; gap: 5px; cursor: pointer;">
    <img
      style="width: 27px; height: 27px; border-radius: 50%; object-fit: cover; background-color: rgb(139, 239, 141);"
      src="data:image/jpeg;base64,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"
      alt="User Avatar"
    >
    {{ Auth::user()->name }}
  </a>

  <!-- Dropdown Menu -->
  <div class="dropdown-content">
<a href="javascript:void(0);" onclick="openModal('profileModal')">Profil</a>
    <a href="javascript:void(0);" onclick="openModal('updateprofileModal')">Changer mot de passe</a>
    <a href="javascript:void(0);" onclick="openModal('deletacc')">Supprimer compte</a>
  </div>
</div>
 @endif
</div>
  </div>

  <h1>Consulter ou Télécharger les Cours</h1>

  <!-- Barre de recherche -->
  <input type="text" id="searchInput" placeholder="Rechercher un cours..." onkeyup="filterCourses()"/>

  <!-- Bouton Ajouter un Cours -->
  @auth
@if(Auth::check() && Auth::user()->email === config('admin.email'))
         <a href="javascript:void(0);" class="add-course-btn" onclick="openCourseModal()">Ajouter Course</a>
    @endif
  @endauth
  

  <!-- Modal -->
  <div id="courseModal" class="modal">
    <div class="modal-content">
      <h2>Ajouter un Nouveau Cours</h2>
      <form id="addCourseForm" action="{{ route('course1.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
      <input type="text" name="name" placeholder="Nom du Cours" required />
  <input type="file" name="pdf" accept="application/pdf" required/>
  <button type="submit">Ajouter</button>
      </form>
    </div>
  </div>

  <div class="box" id="courseContainer">
    <!-- Exemple cours 1 -->
    @foreach ($courses as $course)
  <div class="document-item">
 <div class="circle-img-container">
  @auth
@if(Auth::check() && Auth::user()->email === config('admin.email'))
         <img style="background-color:red;" 
            src="https://i.postimg.cc/XqchhKhY/213-2133316-recycle-bin-outline-vector-recycle-bin-icon-white-png-removebg-preview.png"
            onclick="confirmDelete('{{ route('course1.destroy', $course->id) }}')" alt="">

         <img style="background-color:rgb(139, 239, 141);" 
    src="https://i.postimg.cc/jdqtTChF/images-removebg-preview-2.png"
    onclick="confirmEdit('{{ route('course1.update', $course->id) }}', '{{ $course->id }}', '{{ addslashes($course->name) }}', '{{ asset('storage/' . $course->pdf) }}')"
    alt="edit">
    @endif
@endauth
</div>
     <h2>Cours {{ $loop->iteration }}</h2>
    <p>{{ $course->name }}</p>
   <a href="{{ asset('storage/' . $course->pdf) }}" class="view-btn" target="_blank">Voir</a>
<a href="{{ route('course1.download', $course->id) }}" class="view-btn" >Télécharger</a>
 </div>
@endforeach
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


  <!-- Modal de suppression -->
<div id="deleteModal" class="modal">
  <div class="modal-content">
    <h2>Êtes-vous sûr de vouloir supprimer ce cours ?</h2>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Oui</button>
      
    </form>
  </div>
</div>

<!-- Modal de modification -->
<div id="editModal" class="modal">
  <div class="modal-content" id="editModalContent">
    <!-- أول مرة كيبان تأكيد -->
    <h2>Voulez-vous modifier ce cours ?</h2>
    <button onclick="showEditForm()">Oui</button>
  </div>
</div>

 <div id="deletacc" class="modal">
  <div class="modal-content">
  <section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

  </div>
</div>

<!-- Modal لعرض الملف الشخصي -->
<div id="profileModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('profileModal')">&times;</span>
    <h2>Change mes informations</h2>
    <form method="POST" action="{{ route('profile.update') }}">
      @csrf
      @method('PUT')
      
      <label for="name">Nom</label>
      <input type="text" name="name" value="{{ Auth::user()->name }}" required>
  @auth
@if(Auth::check() && Auth::user()->email === config('admin.email'))
 
      @else
       <label for="email">Email</label>
      <input type="email" name="email" value="{{ Auth::user()->email }}" required>
    @endif
  @endauth
      
      
      <button type="submit">Enregistrer</button>
    </form>
  </div>
</div>
<div id="updateprofileModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('updateprofileModal')">&times;</span>
    <h2>Change le mot de passe</h2>
    @if (session('status'))
    <div>{{ session('status') }}</div>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('profile.update.password')}}">
    @csrf
    @method('PUT')

    <label for="current_password">Mot de passe actuel</label>
    <input type="password" name="current_password" required>

    <label for="password">Nouveau mot de passe</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Confirmer le mot de passe</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Enregistrer</button>
</form>

  </div>
</div>
@if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // فتح مودال تغيير كلمة السر فقط
    document.getElementById('updateprofileModal').style.display = 'block';
  });
</script>
@endif
@if ($errors->any() || session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // فتح المودال تلقائيًا إذا كان خطأ أو رسالة
            document.getElementById('updateprofileModal').style.display = 'block';
        });
    </script>
@endif
 <script>
  // فتح المودال
  function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
  }

  // إغلاق المودال
  function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
  }

  // إغلاق عند الضغط خارج المحتوى
  window.addEventListener('click', function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });
</script>



 <script>
  // فتح مودال الحذف
  function confirmDelete(actionUrl) {
    const form = document.getElementById("deleteForm");
    form.action = actionUrl;
    document.getElementById("deleteModal").style.display = 'flex';
  }

  // فتح مودال التعديل
  function confirmEdit(editUrl) {
    const link = document.getElementById("editLink");
    link.href = editUrl;
    document.getElementById("editModal").style.display = 'flex';
  }
  function confirmEdit(updateUrl, courseId, courseName, coursePdfPath) {
  const editModal = document.getElementById("editModal");
  editModal.style.display = 'flex';

  // حفظ البيانات داخل الـ modal
  editModal.setAttribute('data-url', updateUrl);
  editModal.setAttribute('data-id', courseId);
  editModal.setAttribute('data-name', courseName);
  editModal.setAttribute('data-pdf', coursePdfPath);
}

function showEditForm() {
  const modal = document.getElementById("editModal");
  const updateUrl = modal.getAttribute('data-url');
  const courseId = modal.getAttribute('data-id');
  const courseName = modal.getAttribute('data-name');
  const coursePdfPath = modal.getAttribute('data-pdf');

  const modalContent = document.getElementById("editModalContent");
  modalContent.innerHTML = `
    <h2>Modifier le Cours</h2>
<form action="${updateUrl}" method="POST" enctype="multipart/form-data">
    @csrf
     @method('PUT') 
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="${courseId}">
      <label for="name">Nom du Cours:</label>
      <input type="text" name="name" value="${courseName}" required />
      
      <label for="pdf">PDF actuel:</label>
      <a href="${coursePdfPath}" target="_blank">Voir le PDF actuel</a><br>
      </br>
      <label for="pdf">Nouveau PDF:</label>
      <input type="file" name="pdf" accept="application/pdf" />
      
      <button type="submit">Enregistrer</button>
    </form>
  `;
}

  // فتح مودال إضافة
  function openCourseModal() {
    document.getElementById('courseModal').style.display = 'flex';
  }

  // إغلاق جميع المودالات
  function closeAllModals() {
    document.getElementById("deleteModal").style.display = 'none';
    document.getElementById("editModal").style.display = 'none';
    document.getElementById('courseModal').style.display = 'none';
  }

  // إغلاق عند الضغط خارج المودال
  window.onclick = function(event) {
    const deleteModal = document.getElementById("deleteModal");
    const editModal = document.getElementById("editModal");
    const courseModal = document.getElementById("courseModal");

    if (event.target === deleteModal || event.target === editModal || event.target === courseModal) {
      closeAllModals();
    }
  }

  // بحث
  function filterCourses() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const items = document.querySelectorAll(".document-item");

    items.forEach(item => {
      const text = item.textContent.toLowerCase();
      item.style.display = text.includes(input) ? "flex" : "none";
    });
  }
</script>
</body>
</html>
