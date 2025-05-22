<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Login Page - 2 Containers</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Montserrat, sans-serif;
        }

        body {
            background-image: url('{{ asset('assets/img/background-login.png') }}');
            /* background-image: url('{{ asset('assets/img/bg.png') }}'); */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
            height: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            gap: 220px;

        }

        /* CONTAINER KIRI */
        .login-container1 {
            width: 600px;
            height: 600px;
            background: #fff;
            border-radius: 50px;
            padding: 40px 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .tab-buttons {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-bottom: -10px;
        }

        .tab-button {
            background: #ffffff;
            color: #315287;
            border: none;
            padding: 15px 20px 15px 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s, color 0.3s;
            /* Added color transition */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab-button.active {
            background: #315287;
            color: white;
        }

        .tab-content {
            display: none;
            width: 99%;
            height: 400px;
            /* Fixed height for uniformity */
            text-align: left;
            padding: 25px;
            border-radius: 10px;
            /* Allow scrolling if content overflows */
            font-size: 12px;
        }

        .tab-content.active {
            display: block;
        }

        #profile {
            background: #315287;
        }

        #vision {
            background: #315287;
        }

        #mission {
            background: #315287;
        }

        #goals {
            background: #315287;
        }

        #objectives {
            background: #315287;
        }

        .tab-content img {
            width: 100%;
            height: auto;
            max-height: 150px;
            /* Adjust height as needed */
            object-fit: cover;
            margin-top: 10px;
            border-radius: 15px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        h3 {
            color: #fff;
            margin-bottom: 10px;
        }

        p {
            color: #fff;
            line-height: 1.6;
        }


        /* CONTAINER KANAN */
        .login-container2 {
            width: 550px;
            height: 600px;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .login-header {
            margin-bottom: 20px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 2px;
        }

        .login-desc {
            font-size: 14px;
            font-style: italic;
            font-weight: 500;
            color: #315287;
            margin-bottom: 10px;
        }

        .login-container2 h2 {
            margin-bottom: 20px;
            color: #315287;
        }

        .login-container2 form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 15px;
        }

        .login-container2 input {
            width: 100%;
            padding: 17px;
            margin-bottom: 20px;
            border-radius: 50px;
            border: 2px solid #315287;
            font-size: 14px;
            font-weight: 500;
        }

        .login-container2 button {
            width: 100%;
            padding: 17px;
            background: #315287;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container2 button:hover {
            background: #243c65;
        }

        /* Placeholder styling */
        .login-container2 input::placeholder {
            color: #315287;
            /* Warna placeholder */
            font-style: italic;
            /* Gaya huruf */
            font-size: 13px;
            /* Ukuran font */
            opacity: 70%;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            /* Keeps vertical alignment */
            align-self: flex-start;
            font-size: 13px;
            font-weight: 500;
            color: #315287;
            margin-bottom: 10px;
            gap: 10px;
            font-style: italic;
            line-height: 1;
            /* Ensures text doesn't add extra height */
        }

        .checkbox-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #315287;
            margin: 0;
            /* Removes any default margins that might offset alignment */
            vertical-align: middle;
            /* Fallback for older browsers */
            flex-shrink: 0;
            /* Prevents checkbox from shrinking and misaligning */
        }

        /* LOGO JTI */
        .top-logo {
            position: absolute;
            top: 40px;
            left: 50px;
            background: white;
            border-radius: 50%;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top-logo img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <div class="top-logo">
        <img src="assets/img/jti.png" alt="Logo" />
    </div>

    <div class="login-container1">

        <div class="tab-buttons">
            <button class="tab-button active" onclick="openTab('profile')">Profile</button>
            <button class="tab-button" onclick="openTab('vision')">Vision</button>
            <button class="tab-button" onclick="openTab('mission')">Mission</button>
            <button class="tab-button" onclick="openTab('goals')">Goals</button>
            <button class="tab-button" onclick="openTab('objectives')">Objectives</button>
        </div>

        <div id="profile" class="tab-content active">
            <img src="assets/img/profile.png" alt="Long Image" />
            <p>Politeknik Negeri Malang (Polinema) awalnya merupakan bagian dari FNGT Universitas Brawijaya berdasarkan
                SK
                Presiden No. 59/1982 dan menjadi institusi mandiri melalui SK Mendikbud No. 0313/O/1991. Fokus pada
                pendidikan
                terapan, Polinema meraih akreditasi A pada 2018 dan akreditasi internasional ASIC pada 2020.</p>
            <p> Program Studi D4 Sistem Informasi Bisnis (SIB) didirikan tahun 2010 di bawah Jurusan Teknik Elektro,
                lalu
                bergabung ke Jurusan Teknologi Informasi pada 2015, serta memperoleh akreditasi B dari BAN-PT pada 2018.
            </p>
        </div>

        <div id="vision" class="tab-content">
            <img src="assets/img/vision.png" alt="Long Image" />
            <p>Becoming an excellent study program in the field of business information systems both at the national and
                international levels.</p>
        </div>

        <div id="mission" class="tab-content">
            <img src="assets/img/mission.png" alt="Long Image" />
            <p>1. Delivering innovative vocational education using technology to produce competent Business Information
                Systems graduates ready to compete nationally and globally.
                <br>2. Conducting applied research focused on products and services in Business Information Systems.
                <br>3. Engaging in community service through the use of Business Information Systems technology to
                improve
                welfare.
                <br>4. Establishing strategic partnerships domestically and internationally in the field of Business
                Information
                Systems.
            </p>
        </div>

        <div id="goals" class="tab-content">
            <img src="assets/img/goals.png" alt="Long Image" />
            <p>1. Producing competent Business Information Systems graduates for work or entrepreneurship at national
                and
                global levels.
                <br>2. Producing applied research that supports industry, generates IPR/patents, and enhances societal
                welfare.
                <br>3. Conducting community service through Business Information Systems technology with real welfare
                impact.
                <br>4. Implementing education management based on good governance principles in Business Information
                Systems.
                <br>5. Building strategic cooperation, both domestic and international, to boost competitiveness in
                Business
                Information Systems.
            </p>
        </div>

        <div id="objectives" class="tab-content">
            <img src="assets/img/objective.png" alt="Long Image" />
            <p>1. Increased access to relevance, quantity, and quality of D4 - SIB Study Program Education.
                <br>2. Increasing the relevance and quality of learning activities in the D4 - SIB Study Program.
                <br>3. Increasing the quality of the results of D4 - SIB student activities and the initiation of career
                coaching to equip graduates.
                <br>4. Increasing the relevance, quantity, quality, and usefulness of research results of all
                academicians.
                <br>5. Increasing the relevance, quantity, quality, and usefulness of community service results for the
                welfare
                of society.
            </p>
        </div>
    </div>

    <div class="login-container2">
        <div class="login-header">
            <img src="assets/icon/user.png" alt="Login Icon" class="login-icon" />
            <p class="login-desc">Please input registered username and password</p>
        </div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>
<script>
    function openTab(tabName) {
        // Hide all tab contents
        const tabContents = document.getElementsByClassName("tab-content");
        for (let i = 0; i < tabContents.length; i++) {
            tabContents[i].classList.remove("active");
        }

        // Remove active class from all buttons
        const tabButtons = document.getElementsByClassName("tab-button");
        for (let i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove("active");
        }

        // Show the selected tab content and set the button as active
        document.getElementById(tabName).classList.add("active");
        event.currentTarget.classList.add("active");
    }
</script>
