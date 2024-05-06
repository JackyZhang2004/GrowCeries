document.addEventListener("DOMContentLoaded", function() {
    const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenu.classList.add('hidden'); // untuk hidden di awal

  
    mobileMenuButton.addEventListener('click', function() {
      const expanded = this.getAttribute('aria-expanded') === 'true' || false;
      this.setAttribute('aria-expanded', !expanded);
      mobileMenu.classList.toggle('hidden');
    });
  });


  
  document.addEventListener("DOMContentLoaded", function() {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');
    
    // Sembunyikan dropdown pada awalnya dengan animasi
    userMenu.classList.add('hidden', 'transition', 'ease-out', 'duration-100', 'transform', 'opacity-0', 'scale-95');
  
    userMenuButton.addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
  
        if (!expanded) {
            userMenu.classList.remove('hidden');
            setTimeout(() => {
                userMenu.classList.remove('opacity-0', 'scale-95');
                userMenu.classList.add('opacity-100', 'scale-100');
            }, 10); // Memastikan kelas 'hidden' dihapus sebelum animasi dimulai
        } else {
            userMenu.classList.remove('opacity-100', 'scale-100');
            userMenu.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                userMenu.classList.add('hidden');
            }, 100); // Menunggu animasi selesai sebelum menyembunyikan menu
        }
    });

    // Tambahkan event listener untuk menutup dropdown ketika klik di luar menu
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = userMenu.contains(event.target);
        const isClickOnMenuButton = userMenuButton.contains(event.target);
        
        if (!isClickInsideMenu && !isClickOnMenuButton) {
            const expanded = userMenuButton.getAttribute('aria-expanded') === 'true' || false;
            userMenuButton.setAttribute('aria-expanded', 'false');

            if (expanded) {
                userMenu.classList.remove('opacity-100', 'scale-100');
                userMenu.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    userMenu.classList.add('hidden');
                }, 100); // Menunggu animasi selesai sebelum menyembunyikan menu
            }
        }
    });
});


  
  
  
  