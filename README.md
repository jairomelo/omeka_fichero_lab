# omeka_fichero_lab
Algo de código experimental para interactuar con [Omeka Classic](https://omeka.org/classic/) :) Un sistema de presentación Web de documentos usado ampliamente en las humanidades.
Eres libre de descargar, editar y mejorar el código. Si tienes alguna sugerencia ¡bienvenida!

## Versiones

[12/02/2019](https://github.com/jairomelo/omeka_fichero_lab/tree/ea6ce6617099153874bf8735352a15c0cdf34d68)
* Simplificado el exportador HTML.
* Se convierten a docx todos los resultados.

[05/12/2018](https://github.com/jairomelo/omeka_fichero_lab/tree/912c934cd9e1a096e1ed0f189d2502f8ed8ffd45)
* Modificado el exportador txt a exportador HTML con la opción de convertir el resultado a Word (\*.docx).
* Agregada advertencia para módulos que necesitan ser instalados
* Ajustada la codificación para crear el archivo HTML en utf-8.

[04/11/2018](https://github.com/jairomelo/omeka_fichero_lab/tree/958d7fd3b6e3aca858dc47a545db5776d41bc708)
* Eliminado el requisito de ingresar el rango de elementos en `exportador_txt_elements.py`.

[03/10/2018](https://github.com/jairomelo/omeka_fichero_lab/tree/82a801778483ec332afebcaf6d130242a58a10b8)
* Actualización del programa `relations_dates.php` para ajustar el estilo de la tabla y mostrar cuáles datos se están imprimiendo.
* Añadí el archivo `config_demo.php`, que sirve como ejemplo para conectar los archivos a la base de datos mediante la función `include('config.php');`
* Eliminé el archivo `year-text.php` porque no funcionaba y no pretendo revisarlo en el futuro cercano.
* Creé un pequeño programa en Python3 con [Beautiful Soup](https://www.crummy.com/software/BeautifulSoup/bs4/doc/) para recopilar la información textual del fichero sin necesidad de modificar el código Omeka o crear un Plugin.
* Dividí los programas en dos categorías (PHP y Python) para hacer más sencilla su consulta.

[12/07/2018](https://github.com/jairomelo/omeka_fichero_lab/tree/96a7339702bab1c40ba4ad46b2d975df190a0d82)
* Este repositorio fue "recreado" después de haber filtrado, por ignorancia, información de mi conexión a MySQL (usuario, contraseña, etc.)
* Incluye 6 pequeños programas para recuperar información disponible en Omeka Classic
	* `georeffquery.php` y `georreff_tables.php` recuperan la información ingresada mediante el plugin [Geolocation](https://omeka.org/classic/plugins/Geolocation)
	* `name_index.php` y `name_index_all.php` recuperan la información ingresada en el [elemento "Nombres"](http://cibercliografia.org/experimentos/2016/08/16/listado-de-nombres-con-mysql-y-php/).
	* `relations_dates.php` presenta en una tabla la información ingresada medidante el plugin [Item Relations](https://omeka.org/classic/plugins/ItemRelations)
	* `year-text.php`(en prueba) presenta la información del año de todos los elementos y su texto.
