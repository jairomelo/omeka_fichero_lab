from bs4 import BeautifulSoup
import urllib.request

## recuperar sólo los enlaces de una colección
url = "http://localhost/fichero/items/browse?collection=2"

f = open("links.txt", "w+")

salsa = urllib.request.urlopen(url).read()
sopa = BeautifulSoup(salsa, "lxml")

for links in sopa.find_all('a', class_='permalink'):
	f.write(links.get('href'))
