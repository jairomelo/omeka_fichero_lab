from bs4 import BeautifulSoup
import urllib.request
# importa el archivo lista.py, que contiene los números de los elementos ("items") dentro del repositorio
import lista_txt

# guarda en la función "url_base" la dirección "estática" de cada elemento
url_base = "http://localhost/fichero/items/show/{}"

repeticion = lista_txt.mi_cadena # retorna una lista (no array).

rango = len(repeticion) -1

# crea el archivo "texto_elementos.txt" donde se escribirá la información.
f = open("texto_elementos.html", "w+") # cambie el nombre cada vez que haga una modificación, de otra manera el archivo de sobreescribe sin advertencia.

# loop para llamar cada página del repositorio y recolectar solo la información de los div que contengan la clase 'element-text'
for i in range(rango):
        salsa = urllib.request.urlopen(url_base.format(repeticion[i])).read()
        sopa = BeautifulSoup(salsa, "lxml")
        for div in sopa.find_all('div', class_='element-text'):
                try:
                        f.write(div.prettify())
                except:
                        pass
