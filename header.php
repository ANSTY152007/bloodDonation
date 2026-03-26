<?php ob_start(); ?>
<!-- Injecting Tailwind CSS + Google Fonts for modern styling -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { sans: ['Outfit', 'sans-serif'] },
                colors: {
                    blood: { 500: '#E11D48', 600: '#BE123C', 900: '#4C0519' },
                    dark: { 800: '#1F2937', 900: '#111827' }
                }
            }
        }
    }
</script>

<nav class="fixed w-full z-50 top-0 transition-all duration-300 backdrop-blur-md bg-dark-900/80 border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blood-500 to-blood-900 flex items-center justify-center shadow-lg shadow-blood-500/30">
                    <i class="fa-solid fa-droplet text-white text-lg"></i>
                </div>
                <a href="index.php" class="text-2xl font-bold text-white tracking-wide">e<span class="text-blood-500">Donate</span></a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex flex-1 justify-center space-x-8">
                <a href="index.php" class="text-gray-300 hover:text-white transition-colors duration-200 font-medium">Home</a>
                <a href="donorlog.php" class="text-gray-300 hover:text-white transition-colors duration-200 font-medium">Donor</a>
                <a href="userlog.php" class="text-gray-300 hover:text-white transition-colors duration-200 font-medium">Recipient</a>
                <a href="adminlog.php" class="text-gray-300 hover:text-blood-500 transition-colors duration-200 font-medium">Admin</a>
            </div>

            <!-- Action Buttons -->
            <div class="hidden md:flex items-center gap-4">
                <a href="showrequest.php" class="text-gray-300 hover:text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 border border-transparent hover:border-gray-700 bg-gray-800/50 hover:bg-gray-800">
                    <i class="fa-solid fa-magnifying-glass mr-2 text-sm text-blood-500"></i>Search Needs
                </a>
                
                <?php
                    if(session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if(isset($_SESSION['email'])) {
                        echo '
                        <a href="logout.php" class="bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 text-white px-5 py-2.5 rounded-lg shadow-lg shadow-red-500/30 transition-all transform hover:-translate-y-0.5 font-medium flex items-center gap-2">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>';
                    }
                    ob_end_flush();
                ?>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-300 hover:text-white focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden bg-dark-900 border-t border-gray-800" id="mobile-menu">
        <div class="px-4 pt-2 pb-5 space-y-1">
            <a href="index.php" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-800">Home</a>
            <a href="donorlog.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800">Donor</a>
            <a href="userlog.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800">Recipient</a>
            <a href="adminlog.php" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800">Admin</a>
            <a href="showrequest.php" class="block px-3 py-2 rounded-md text-base font-medium text-blood-500 bg-blood-500/10 mt-4">Search Needs</a>
            <?php
                if(isset($_SESSION['email'])) {
                    echo '<a href="logout.php" class="block px-3 py-2 rounded-md text-base font-medium text-red-500 hover:bg-gray-800 mt-2">Logout</a>';
                }
            ?>
        </div>
    </div>
</nav>
<!-- Add padding body to account for fixed navbar -->
<style> body { padding-top: 5rem; background-color: #0f172a; color: white; } </style>