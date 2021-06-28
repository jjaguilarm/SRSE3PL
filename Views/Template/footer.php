    <footer class="mt-auto bg-dark text-muted">
      <div class="text-center p-4">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="#">ARSET.com</a>
      </div>
    </footer>
    <script> const base_url = "<?= baseUrl(); ?>"; </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php if (!empty($data['pageFunctions'])) : ?>
      <script src="<?= media() . $data['pageFunctions']; ?>"></script>
    <?php endif; ?>
  </body>
</html>
