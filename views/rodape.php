    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar fixed-bottom navbar-light bg-light">
              <a class="navbar-brand" href="http://www.pasta42.com.br">Desenvolvido por Pasta 42</a>
              Versão 1.0220 - <?php echo date('Y'); ?>
            </nav>
          </div>
        </div>
      </div>
    </footer>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>
    <script defer src="../fontawesome/js/all.js"></script> <!--load all styles -->
    <script src="../js/jquery.mask.min.js" ></script>
    <script>
      $(document).ready(function(){
        $('.cep').mask('00000-000');
        $('.phone').mask('(00) 0000-00009');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money3').mask("00000.00", {reverse: true});
      });
    </script>
  </body>
</html>