from bs4 import BeautifulSoup
import urllib.request
import re, os

busca = input('pegar la búsqueda: ')
archivo = input('nombre del archivo de resultados: ')

host = "http://localhost"

salsa = urllib.request.urlopen(busca).read()
sopa = BeautifulSoup(salsa, "lxml")

rutas = []

for links in sopa.find_all('a', class_='permalink'):
		obtener = "{}{}".format(host, links["href"])
		rutas.append(obtener)

f = open("{}.html".format(archivo), "w+")

for i in range(len(rutas)):
	cadenas = str(rutas)
	encadenado = ''.join(cadenas).replace('[\'','').replace('\']',',').replace('\'','')
	mi_cadena = encadenado.split(",")
	url_descarga = mi_cadena[i]
	salsa = urllib.request.urlopen(url_descarga).read()
	sopa = BeautifulSoup(salsa, 'html.parser')
	for div in sopa.find_all('div', class_='element-text'):
			f.write(div.prettify())
doc.close()