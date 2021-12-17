<footer class="text-center bg-light">
    <p class="p-3">
        © 2021 Copyright • <a href="https://github.com/stella-oliveira/" target="_blank">Stella Oliveira</a>
    </p>            
</footer>

<script type="text/javascript">

    /* MÁSCARA PARA CPF E CNPJ */
    $(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});

        var $seuCampoCnpj = $("#cnpj");
        $seuCampoCnpj.mask('00.000.000/0000-00', {reverse: true});
    });

    /* MÁSCARA PARA TELEFONE*/
    $(document).ready(function(){
        var $seuCampoTelefone = $("#telefone");
        $seuCampoTelefone.mask('(00) 0000-0000');
    });

    /* MÁSCARA PARA CELULAR */
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('celular').onkeyup = function(){
            mascara( this, mtel );
        }
    }

</script>

</body>
</html>