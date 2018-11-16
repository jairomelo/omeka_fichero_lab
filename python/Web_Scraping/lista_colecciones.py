from bs4 import BeautifulSoup
import urllib.request
import re

## recuperar sólo los enlaces de una colección
url = "http://localhost/fichero/items/browse?collection=5"

## al cambiar el nombre del archivo asegúrese de hacerlo también en "lista_txt.py"
f = open("mi_lista.txt", "w+")

## Beautiful Soup
salsa = urllib.request.urlopen(url).read()
sopa = BeautifulSoup(salsa, "lxml")

## loop para recuperar los números de id de los elementos de la colección
for links in sopa.find_all('a', class_='permalink'):
		numeros = links.get('href')
		numerologia = re.findall(r'\d+', numeros)
		cadenas = str(numerologia)
		encadenado = ''.join(cadenas).replace('[\'','').replace('\']',',')
		f.write(encadenado)