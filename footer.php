
<?php
// footer.php - ACTUALIZADO CON MÁS SPONSORS

$current_year = date('Y');

$patrocinadores = [
    ['nombre' => 'Sport World', 'logo_path' => 'img/SW.png', 'url' => '#'],
    ['nombre' => 'Anita Trail', 'logo_path' => 'img/anita.png', 'url' => '#'],
    ['nombre' => 'WAFLELANDIA', 'logo_path' => 'img/cafe.png', 'url' => '#'],
    ['nombre' => 'Madereria Espeche', 'logo_path' => 'img/damian.png', 'url' => '#'],
    ['nombre' => 'Club Union Nonogasta', 'logo_path' => 'img/union.png', 'url' => '#'],
    ['nombre' => 'TEC control', 'logo_path' => 'img/LOGOtec.png', 'url' => 'https://www.instagram.com/tec._2025?¡gsh=cXNyZDZvM2tjaHlx'],
    ['nombre' => 'Lomoteka Sabor', 'logo_path' => 'img/LOGOlomotk.jpg', 'url' => '#'],
    ['nombre' => 'LA CLETA', 'logo_path' => 'img/LOGO lacleta.jpg', 'url' => '#'],
    ['nombre' => 'Recicladora ', 'logo_path' => 'img/LOGOreci.jpg', 'url' => '#'],
    ['nombre' => 'La Roca Gym', 'logo_path' => 'img/LOGOgym.png', 'url' => '#'],
    // --- NUEVOS SPONSORS AGREGADOS ---
    ['nombre' => 'Rapi Pago', 'logo_path' => 'img/LOGOrapi.jpg', 'url' => '#'],
    ['nombre' => 'Powerade', 'logo_path' => 'img/logo_powerade.png', 'url' => '#'],
    ['nombre' => 'Oakley', 'logo_path' => 'img/logo_oakley.png', 'url' => '#'],
    ['nombre' => 'Fitbit', 'logo_path' => 'img/logo_fitbit.png', 'url' => '#'],
    ['nombre' => 'Michelob Ultra', 'logo_path' => 'img/logo_michelob.png', 'url' => '#'],
];
?>

<footer class="spartan-footer">
    <div class="footer-sponsors">
        <h4>Patrocinadores Oficiales</h4>
        <div class="sponsors-grid">
            <?php foreach ($patrocinadores as $sponsor): ?>
                <a href="<?php echo $sponsor['url']; ?>" target="_blank" title="<?php echo $sponsor['nombre']; ?>">
                    <img src="<?php echo $sponsor['logo_path']; ?>" alt="Logo de <?php echo $sponsor['nombre']; ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer-copyright-bar">
        <p>&copy; <?php echo $current_year; ?> Spartan Race. Todos los derechos reservados.</p>
        <p>Desarrollado para el cronometraje oficial.</p>
    </div>
</footer>

</body>
</html>