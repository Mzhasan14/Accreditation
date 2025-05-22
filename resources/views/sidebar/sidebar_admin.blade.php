<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-right: 1px solid #dee2e6;
            position: fixed;
            top: 60px;
            left: 0;
            height: calc(100vh - 60px);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .menu {
            flex-grow: 1;
        }
        .sidebar .menu-item {
            padding: 10px 0;
            cursor: pointer;
        }
        .menu-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar .menu-item h5 {
            color: #315287;
            margin: 0;
            font-size: 18px;
            font-weight: 500;
        }
        .sidebar .dropdown-icon {
            scale: 65%;
        }
        .sidebar .version {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #315287;
        }
        .sidebar .version p {
            margin: 0;
            font-size: 12px;
            color: #666;
            font-weight: 400;
        }
        .top-logo {
            display: flex;
            justify-content: left;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 15px;
        }
        .logo-img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .add-button {
            display: none;
            width: 100%;
            padding: 5px 10px;
            background: none;
            border: 1px solid #315287;
            border-radius: 4px;
            text-align: left;
            cursor: pointer;
            margin-top: 5px;
            color: #315287;
        }
        .add-button.show {
            display: block;
        }
        .add-button:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="top-logo">
            <img src="assets/img/jti.png" alt="Logo" class="logo-img" />
        </div>
        <div class="menu">
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>I Penetapan</h5>
                    <img src="/assets/icon/arrdown.png" alt="Dropdown" class="dropdown-icon" />
                </div>
                <button class="add-button">+ Tambah Data Baru</button>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>II Pelaksanaan</h5>
                    <img src="/assets/icon/arrdown.png" alt="Dropdown" class="dropdown-icon" />
                </div>
                <button class="add-button">+ Tambah Data Baru</button>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>III Evaluasi</h5>
                    <img src="/assets/icon/arrdown.png" alt="Dropdown" class="dropdown-icon" />
                </div>
                <button class="add-button">+ Tambah Data Baru</button>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>IV Pengendalian</h5>
                    <img src="/assets/icon/arrdown.png" alt="Dropdown" class="dropdown-icon" />
                </div>
                <button class="add-button">+ Tambah Data Baru</button>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>V Peningkatan</h5>
                    <img src="/assets/icon/arrdown.png" alt="Dropdown" class="dropdown-icon" />
                </div>
                <button class="add-button">+ Tambah Data Baru</button>
            </div>
            <div class="menu-item">
                <div class="menu-item-header">
                    <h5>Comments</h5>
                </div>
            </div>
        </div>
        <div class="version">
            <p>v.1.0.0.0.1</p>
        </div>
    </div>
    <script>
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                const button = this.querySelector('.add-button');
                const icon = this.querySelector('.dropdown-icon');
                
                // Toggle button visibility
                if (button.classList.contains('show')) {
                    button.classList.remove('show');
                    icon.src = '/assets/icon/arrdown.png';
                } else {
                    button.classList.add('show');
                    icon.src = '/assets/icon/arrup.png';
                }
            });
        });
    </script>
</body>
</html>