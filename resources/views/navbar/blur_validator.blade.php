<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f4f4f4;
        }

        /* Navbar */
        .custom-navbar {
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 10px;
        }

        .container {
            max-width: 95%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 30px;
            margin-right: 5px;
        }

        .navbar-brand span {
            color: #fff;
            font-weight: 500;
            font-size: 16px;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .button-logout {
            background: #993a36;
            color: white;
            padding: 10px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .button-logout:hover {
            background: #7a2e2a;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background: white;
            min-width: 180px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 0;
            top: 35px;
            z-index: 999;
        }

        .dropdown-menu li {
            list-style: none;
            padding: 0;
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .dropdown-menu li a:hover {
            background-color: #f0f0f0;
        }

        #contact {
            scroll-margin-top: 80px;
            /* offset untuk scroll supaya tidak tertutup navbar */
        }
    </style>
</head>

<body>
    <nav class="custom-navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/img/logo-polinema.png') }}" alt="Logo" />
                <span>Akreditasi D4 Sistem Informasi Bisnis</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('dashboard_validator') }}" class="nav-link">Beranda</a></li>

                <li class="nav-item">
                    <a href="https://www.polinema.ac.id/" class="nav-link" target="_blank" rel="noopener noreferrer">
                        Website Polinema
                    </a>
                </li>

                <!-- Kriteria Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link"
                        onclick="toggleDropdown(event, 'dropdownKriteriaValidator')">Kriteria ▾</a>
                    <ul class="dropdown-menu" id="dropdownKriteriaValidator">
                        @foreach ($criterias as $criteria)
                            <li>
                                <a href="{{ route('validation.by.criteria', $criteria->id) }}">
                                    {{ $criteria->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>



                    <!-- Denah Gedung Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" onclick="toggleDropdown(event, 'dropdownDenah')">Denah Gedung
                        ▾</a>
                    <ul class="dropdown-menu" id="dropdownDenah">
                        <li>
                            <a href="https://my.matterport.com/show/?m=xufa7UrDLJe" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 5</a>
                        </li>
                        <li>
                            <a href="https://my.matterport.com/show/?m=Fj8fbnjLjQq" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 6</a>
                        </li>
                        <li>
                            <a href="https://my.matterport.com/show/?m=fAgiViGeZaB" target="_blank"
                                rel="noopener noreferrer">Gedung
                                Lantai 7</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                        @csrf
                        <button type="submit" class="button-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function toggleDropdown(event, menuId) {
            event.preventDefault();

            // Hide all dropdown menus first
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach((dd) => {
                if (dd.id !== menuId) {
                    dd.style.display = 'none';
                }
            });

            // Toggle clicked menu
            const menu = document.getElementById(menuId);
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            const dropdownContainers = document.querySelectorAll('.dropdown');

            let clickedInsideDropdown = false;

            dropdownContainers.forEach((container) => {
                if (container.contains(event.target)) {
                    clickedInsideDropdown = true;
                }
            });

            if (!clickedInsideDropdown) {
                dropdowns.forEach((dd) => {
                    dd.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>
