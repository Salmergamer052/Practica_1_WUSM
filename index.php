<!DOCTYPE HTML>
<html lang="es">
<head>
    <title>WILMAN URIEL SALMERON MARTINEZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="Contenedor">
            <div class="row align-items-center h-100">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col align-items-center">
                    <p>Wilman Uriel Salmeron Martinez</p>
                    <form name="frm_login" id="frm_login" action="core/process.php">
                        <table>
                            <thead>
                                <tr>
                                    <th class="parrafo_centrado">Inicio de sesión</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="txt_usuario">USUARIO:</label>
                                                <input type="text" class="form-control" name="txt_usuario" maxlength="15" aria-describedby="txt_user_help" required />
                                                <small id="txt_user_help" class="form-text text-muted">El usuario es obligatorio</small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="txt_password">CONTRASEÑA:</label>
                                                <input type="password" class="form-control" name="txt_password" id="txt_password" maxlength="15" aria-describedby="txt_password_help" required />
                                                <small id="txt_password_help" class="form-text text-muted">Contraseña obligatoria</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="center">
                                     <button type="button" class="btn btn-primary" name="btn_entrar" id="btn_entrar">Iniciar Sesion</button>
                                      <div class="mensaje"></div>
                                    </td>
                                 </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
			function enviar_datos(u,p){
				$.post($("#frm_login").attr("action"),{
						txt_usuario: u,
						txt_password: p
					}).done(function(datos){
						//console.log(datos.data.url);
						window.location.replace(datos.data.url+"?token="+datos.data.token)
					}).fail(function(xhr, status, error){
						$(".mensaje").html(xhr.responseJSON.mensaje);
					});
			}
			$(document).ready(function(){
				$("#btn_entrar").click(function(){
					enviar_datos($("#txt_usuario").val(),$("#txt_password").val());
				});
				$("#txt_usuario").keypress(function(event){
					if(event.which == 13){
						enviar_datos($("#txt_usuario").val(),$("#txt_password").val());
					}
				});
				$("#txt_password").keypress(function(event){
					if(event.which == 13){
						enviar_datos($("#txt_usuario").val(),$("#txt_password").val());
					}
				});
			});
		</script>
</body>
</html>
