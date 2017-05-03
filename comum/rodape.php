<?php
/**
 * Created by PhpStorm.
 * User: kfsantos
 * Date: 15/03/2017
 * Time: 09:23
 */?>
</div>
<script src="./js/jquery.min.js"></script>
    <script type="text/javascript">
    $('#form_image').ajaxForm({ //Responsavel por enviar a imagem para o servidor e retornar a string em base64 nela
    url: "./albumdefotos/albuns/",
    type: 'POST',
    success: function (file){
        $("#form_image img").attr("src", file);
    }
});

$("#image_event").change(function(){ //Chama o sumit do form toda vez que a imagem é selecionada
    $('#form_image').submit();
});
    	</script>
</div >
<footer>
	<h4 align="center">
		Rodapé
	</h4>
</footer>
</body >
</html >