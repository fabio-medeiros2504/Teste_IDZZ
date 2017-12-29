            </div>
        </div>   

        <script src="<?= base_url("assets/js/jquery.maskedinput.min.js")?>"></script>
        <script src="<?= base_url("assets/js/jquery.maskMoney.js")?>"></script>
        <script src="<?= base_url("assets/js/jquery.validate.min.js")?>"></script>        
        <script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
        <script src="<?= base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js")?>"></script>
        <script src="<?= base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")?>"></script>
        <script src="<?= base_url("assets/js/plugins/peity/jquery.peity.min.js")?>"></script>
        <script src="<?= base_url("assets/js/inspinia.js")?>"></script>
        <script src="<?= base_url("assets/js/docs.min.js")?>"></script>            
        <script src="<?= base_url("assets/js/example.js")?>"></script>
        <script>
            $(function () {
                Example.init({
                    "selector": ".bb-alert"
                });
            });
        </script>
        <script type="text/javascript">   
            $(document).ready(function () {
                $("#data_nascimento").mask("99/99/9999");
                $("#cpf").mask("999.999.999-99");
                $("#telefone").mask("(99) 99999-9999");
                $("#cep").mask("99999-999");
            });
        </script>
        <script src="<?= base_url("assets/js/funcoes.js")?>"></script>   
    </body>
</html>
