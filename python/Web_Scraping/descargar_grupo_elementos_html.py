import re, sys, time, codecs
import urllib.request
from bs4 import BeautifulSoup
import pypandoc

busca = input('pegar la búsqueda: ')
archivo = input('nombre del archivo de resultados: ')
archivo_html = "{}.html".format(archivo)
host = "http://localhost"

salsa = urllib.request.urlopen(busca).read()
sopa = BeautifulSoup(salsa, 'html.parser')

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

print("creando archivo docx con los resultados")

documento = pypandoc.convert_file(archivo_html, "docx", outputfile="{}.docx".format(archivo))
sys.exit()