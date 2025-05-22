<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Akreditasi D4 Sistem Informasi Bisnis</title>
</head>

<style>
  body {
    background-image: url('{{ asset('assets/img/background-landing.png') }}');
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
  }

  /* LOGO JTI */
  .top-logo {
    position: absolute;
    top: 5px;
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

  /* KONTENER */
  .text-container {
    position: absolute;
    width: 600px;
    height: 300px;
    background: transparent;
    padding: 40px 70px;
    display: flex;
    flex-direction: column;
    text-align: left;
    left: 110px;
  }

  .login-button {
    width: 27%;
    padding: 17px;
    background: #315287;
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
  }

  h1 {
    margin-bottom: 5px;
    color: #315287;
    font-weight: 600;
    font-size: 50px;
  }

  p {
    color: #315287;
    font-weight: 400;
    font-size: 20px;
    line-height: 1px;
    margin-bottom: 5px;
  }

  /* Foto Kanan */
  .image-container {
    position: relative;
    width: 867px;
    /* Adjust based on your design */
    height: 809.52px;
    /* Adjust based on your design */
    overflow: hidden;
    left: 375px;
    /* Align with your text-container */
    bottom: 40px;
  }

  .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: opacity 1s linear;
    /* Smooth transition */
  }

  .hover-image:first-child {
    opacity: 1;
  }

  .hover-image:last-child {
    opacity: 0;
  }

  .image-container:hover .hover-image:first-child {
    opacity: 0;
  }

  .image-container:hover .hover-image:last-child {
    opacity: 1;
    display: block;
  }
</style>

<body>
  <div class="top-logo">
    <img src="assets/img/jti.png" alt="Logo" />
  </div>

  <div class="text-container">
    <h1>
      Sistem Akreditasi<br>
      D4 Sistem Informasi<br>
      Bisnis
    </h1>
    <p>Welcome!</p>
    <p>
    <div>
      <a href="{{ route('login') }}" class="login-button" style="text-decoration: none;">
        <button type="button" class="login-button">Login to System</button>
      </a>
    </div>
    {{-- Gambar --}}
  </div>
  <div class="image-container">
    <img src="assets/img/dark1.png" alt="System Accreditation" class="hover-image">
    <img src="assets/img/light1.png" alt="System Accreditation" class="hover-image">
  </div>

</body>

</html>