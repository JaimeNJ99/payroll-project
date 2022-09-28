<header class="header" >
    <div class="logo">
        <a href="/" >Inicio</a>
    </div>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <nav class="navigation" >    
        <ul class="list" >
            <li>
                <div class="profile">
                    <!-- Para el avatar se utiliza una API que devuelve imagenes aleatorias. -->
                    <img class="avatar" src="https://i.pravatar.cc/50" alt="profile">
                    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>
                </div>
            </li>
            <li>
                <a id="logout" href="../php/cerrarSesion.php">Cerrar Sesión </a>
            </li>
        </ul>
    </nav>
</header>