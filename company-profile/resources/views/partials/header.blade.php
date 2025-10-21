<header class="header">
  <div class="container">
    <div class="header-content">
      <!-- Logo -->
      <div class="header-logo">
        <img src="{{ asset('images/logo_simbool.png') }}" alt="Logo" class="logo">
      </div>

      <!-- Tombol menu mobile -->
      <div class="menu-toggle" id="menuToggle">&#9776;</div>

      <!-- Menu -->
      <nav class="nav-menu" id="navMenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#">Produk</a></li>
          <li><a href="#">Marketplace</a></li>
          <li><a href="#">Kontak</a></li>
          <li><a href="#">Profile</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<style>
.header {
  background-color: #111;
  color: white;
  width: 100%;
  position: sticky;
  top: 0;
  z-index: 999;
  border-bottom: 1px solid #fff;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 10px 20px;
}

.header-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
}

.header-logo .logo {
  max-height: 60px;
}

.nav-menu {
  flex: 1;
  text-align: center;
  transition: all 0.3s ease;
}

.nav-menu ul {
  list-style: none;
  display: flex;
  justify-content: center;
  gap: 60px;
  margin: 0;
  padding: 0;
}

.nav-menu ul li a {
  color: #ccc;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s ease;
}

.nav-menu ul li a:hover,
.nav-menu ul li a.active {
  color: #fff;
}

.menu-toggle {
  display: none;
  font-size: 28px;
  cursor: pointer;
  color: white;
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
  .nav-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #111;
    width: 100%;
    border-top: 1px solid #333;
    animation: slideDown 0.3s ease;
  }

  .nav-menu.active {
    display: block;
  }

  .nav-menu ul {
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 15px 0;
  }

  .menu-toggle {
    display: block;
  }

  .header-logo .logo {
    max-height: 50px;
  }

  @keyframes slideDown {
    from {opacity: 0; transform: translateY(-10px);}
    to {opacity: 1; transform: translateY(0);}
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.getElementById('menuToggle');
  const nav = document.getElementById('navMenu');

  toggle.addEventListener('click', function () {
    nav.classList.toggle('active');
  });
});
</script>