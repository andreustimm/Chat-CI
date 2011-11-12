<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FrameWork CodeIgniter PHP - Artigo Imasters</title>
    <link href="<?=base_url()?>css/estilo.css" type="text/css" rel="stylesheet">
    <script src="<?=base_url()?>js/jquery-1.7.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            if ($('#mensagens')) {

                setInterval(function() {
                    buscar();
                    users();
                }, 5000);

                $('#texto_msg').keypress(function(event) {
                    if (event.which == 13) {
                        enviar();
                    }
                });

            }

        });

        function buscar() {

            $.ajax({
                   url: "<?=base_url()?>index.php/chat/get_log/",
                   type: "POST",
                  cache: false,
                success: function(data) {
                    $('#mensagens').html(data);
                }
            });

        }

        function users() {

            $.ajax({
                    url: "<?=base_url()?>index.php/chat/get_user/",
                   type: "POST",
                  cache: false,
                success: function(data) {
                    $('#users').html(data);
                }
            });

        }

        function enviar() {

            if ($('#texto_msg').val()) {
		    $.ajax({
			    url: "<?=base_url()?>index.php/chat/enviar/",
			   type: "POST",
			   data: {texto_msg : $('#texto_msg').val()},
			  cache: false,
			success: function(data) {
			    $('#texto_msg').val('');
			    $('#texto_msg').focus();
                            buscar();
			}
		    });
            }

        }

	function logoff() {
            alert('teste 2');
	}

    </script>
</head>
<body>
    <div id="site">
        <div id="topo">{topo}</div>
        <div class="clear"></div>
        <div id="menu">{menu}</div>
        <div id="conteudo">{conteudo}</div>
        <div class="clear"></div>
        <div id="rodape">{rodape}</div>
    </div>
</body>
</html>
