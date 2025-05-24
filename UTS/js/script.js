document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    const contentSections = document.querySelectorAll('.content-section');

    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Hapus kelas active dari semua link dan section
            navLinks.forEach(nav => nav.classList.remove('active'));
            contentSections.forEach(section => section.classList.remove('active-section'));

            // Tambah kelas active ke link yang diklik
            this.classList.add('active');

            // Tampilkan section yang sesuai
            const targetId = this.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.add('active-section');
            }
        });
    });

    // Inisialisasi: Tampilkan section 'beranda' secara default
    const defaultSection = document.getElementById('beranda');
    if (defaultSection) {
        defaultSection.classList.add('active-section');
        // Juga pastikan link Beranda aktif secara default
        document.querySelector('.sidebar .nav-link[data-target="beranda"]').classList.add('active');
    }
});