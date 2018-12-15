import re, sys, time, codecs
import urllib.request

#Módulos que necesitan ser instalados
try:
	from bs4 import BeautifulSoup
except ImportError:
	print("antes de usar el programa instale BeautifulSoup `pip install beautifulsoup4`")
	time.sleep(5)
	sys.exit()

try:
	import pypandoc
except ImportError:
	print("antes de usar el programa instale pypandoc `pip install pypandoc`")
	time.sleep(5)
	sys.exit()

busca = input('pegar la búsqueda: ')
archivo = input('nombre del archivo de resultados: ')
archivo_html = "{}.html".format(archivo)
host = "http://localhost"

salsa = urllib.request.urlopen(busca).read()
sopa = BeautifulSoup(salsa, "lxml")

rutas = []
for links in sopa.find_all('a', class_='permalink'):
		obtener = "{}{}".format(host, links["href"])
		rutas.append(obtener)

f = codecs.open(archivo_html, "w+", "utf-8")

print("creando archivo html con los resultados")

for i in range(len(rutas)):
	cadenas = str(rutas)
	encadenado = ''.join(cadenas).replace('[\'','').replace('\']',',').replace('\'','')
	mi_cadena = encadenado.split(",")
	url_descarga = mi_cadena[i]
	salsa = urllib.request.urlopen(url_descarga).read()
	sopa = BeautifulSoup(salsa, 'html.parser')
	for div in sopa.find_all('div', class_='element-text'):
			f.write(div.prettify())
f.close()

time.sleep(2)

convertir_docx = input('¿Desea convertir el archivo HTML a Word? S/N: ')

if convertir_docx in "S" or "s":
	archivo_docx = "{}.docx".format(archivo)
	documento = pypandoc.convert_file(archivo_html, "docx", outputfile=archivo_docx)
	assert documento == ""
elif convertir_docx in "N" or "n":
	sys.exit()
else:
	sys.exit()