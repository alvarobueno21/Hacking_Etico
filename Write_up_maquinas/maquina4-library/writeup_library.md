Lo primero que haremos será lanzar dos nmap, uno de ellos normal para ver los puertos abiertos y otro para ver las vulnerabilidades y cve posibles para poder entrar a la maquina.
sudo nmap -Pn -A -p- -T5 10.10.122.230 
sudo nmap -A -T4 -p- --script vuln 10.10.122.230

Ahora hacemos fuzzing con el siguiente comando: gobuster dir -u http://10.10.122.230/ -w /usr/share/wordlists/dirb/big.txt 

![Write_up_maquinas/maquina4-library/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/968ccc30b37ff17247d84e96c2360b6e6f9552b1/Write_up_maquinas/maquina4-library/img/img01.png)

Y encontramos varios directorios interesantes como robots.txt si nos metemos nos dan alguna informacion como el user agent que es rockyou y disallow /

Si nos vamos a la pagina principal vemos que meliodas es un usuario que sube posts y podemos intentar hacer fuerza bruta con rockyou e hydra a ver que nos saca, intentamos entrar por ssh y podemos entrar:

hydra -l meliodas -P /usr/share/wordlists/rockyou.txt ssh://10.10.122.230 -t4

Y ya tenemos acceso, entramos y vemos un fichero que se llama user.txt y esa es la primera flag.

Hemos encontrado un script pero no puede ser ejecutado por el usuario meliodas, para poder ejecutarlo hay que cambiar las librerias de python con el siguiente comando:

