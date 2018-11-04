from bs4 import BeautifulSoup
import urllib.request
import re

## pegar aquí el enlace de la búsqueda
busca = "http://localhost/fichero/items/browse?search=confesi%C3%B3n&advanced%5B0%5D%5Bjoiner%5D=and&advanced%5B0%5D%5Belement_id%5D=&advanced%5B0%5D%5Btype%5D=&advanced%5B0%5D%5Bterms%5D=&range=&collection=&type=&tags=&featured=&exhibit=&geolocation-address=&geolocation-latitude=&geolocation-longitude=&geolocation-radius=10&submit_search=Buscar+por+items"

## al cambiar el nombre del archivo asegúrese de hacerlo también en "lista_txt.py"
f = open("mi_lista.txt", "w+")

## Beautiful Soup
salsa = urllib.request.urlopen(busca).read()
sopa = BeautifulSoup(salsa, "lxml")

## loop para recuperar los números de id de los elementos de la búsqueda
for links in sopa.find_all('a', class_='permalink'):
		numeros = links.get('href')
		numerologia = re.findall(r'\d+', numeros)
		cadenas = str(numerologia)
		encadenado = ''.join(cadenas).replace('[\'','').replace('\']',',')
		f.write(encadenado)
