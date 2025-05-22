<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="//unpkg.com/alpinejs" defer></script>

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
      width: 100px;
      text-align:center;
      height: 32px;
      padding:3px;
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

  <h1>Que souhaitez-vous consulter ?</h1>

  <div class="box">
    <a href="{{ route('course1.index') }}"  class="card-link">
      <h2>Cours</h2>
      <p>Voir les cours</p>
      <span class="manage-btn">Accéder</span>
    </a>
    <a href="{{ route('efm1.index') }}"  class="card-link">
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

<form method="POST" action="{{ route('profile.update.password') }}">
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

</body>
</html>
