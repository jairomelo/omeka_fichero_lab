from bs4 import BeautifulSoup
import urllib.request
# importa el archivo lista.py, que contiene los números de los elementos ("items") dentro del repositorio
import lista_txt

# guarda en la función "url_base" la dirección "estática" de cada elemento
url_base = "http://localhost/fichero/items/show/{}"

# si esta función no devuelve una cadena no funciona. Puede reemplazarse por una cadena de números separados por comas "x,y,z,a,b..."
repeticion = lista_txt.mi_cadena

# crea el archivo "texto_elementos.txt" donde se escribirá la información. Puede modificar el nombre del archivo por cualquier otro.
# modifique el nombre cada vez que haga una modificación, de otra manera el archivo de sobreescribe sin advertencia.
f = open("texto_elementos.txt", "w+")

# loop para llamar cada página del repositorio y recolectar solo la información de los div que contengan la clase 'element-text'
# modifique los parámetros de la función range() para que se ajusten a la cantidad de elementos que contenga el repositorio (total -1) 
for i in range(0,3):
	salsa = urllib.request.urlopen(url_base.format(repeticion[i])).read()
	sopa = BeautifulSoup(salsa, "lxml")
	for div in sopa.find_all('div', class_='element-text'):
		try:
			f.write(div.text)
		# En caso de error, el programa seguirá corriendo y recuperará los elementos que pueda escrcibir. (No estoy muy seguro que funcione, así que, recibo sugerencias :p)
		except:
			pass
