from bs4 import BeautifulSoup
import urllib.request
import lista

url_base = "http://localhost/fichero/items/show/{}"
repeticion = lista.mi_lista

for i in range(0,681):
	sauce = urllib.request.urlopen(url_base.format(repeticion[i])).read()
	soup = BeautifulSoup(sauce, "lxml")
	for div in soup.find_all('div', class_='element-text'):
		try:
			print(div.text)
		except:
			pass
