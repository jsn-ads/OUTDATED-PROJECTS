</section>

    <div class="modal">
        <div class="modal-inner">
            <a rel="modal:close">&times;</a>
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- ...existing code... -->
    <script>
    // garante sempre uma barra no final do BASE
    window.BASE = <?= json_encode(rtrim(isset($base) ? $base : '', '/').'/') ?>;
    </script>

    <script src="assets/js/script.js"></script>
    <!-- ...existing code... -->
    
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/vanillaModal.js"></script>
</body>
</html>