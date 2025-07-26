:::: ESPAÑOL ::::

Loguin en php con las siguientes caracteristicas:

Controla el número de intentos fallidos con contraseña al quinto intento por seguridad se bloquea. Si antes de llegar al quinto intento introduce la contraseña correcta, el contador de intentos se reseta y se pone a 0
Las contraseñasa estan generadas mediaste 'password_hash'
Es responsive, una vez que introduce la contraseña te lleva a otra pantalla (un index) donde te da la bienvenida con el nombre de usuario que se ha logado y aparece arriba un menu con un logout


Existe la pantalla 'Crearsuario.php' en donde automaticamente se generan los usuarios mediante 'password_hash'

Es solo la primera versión de este login obviamente no es la definitiva pues se podrian crear usuarios sin estar logados y entrar en el sistema. 

El usuario por defecto es admin y la contraseña 1234556

para que funcione previamente hay que generar la contraseña con password_hash (archivo test.php) y la variable que noes de es la cohtraseña hasheada que habria que colocarla mediante phpmyadmin
