Lo primero que haremos será abrir la máquina y ver si podemos acceder a ella, en este caso si podemos, por lo tanto ejecutamos ipconfig en el cmd y veremos su ip.


Luego lo que haremos será ejecutar un nmap en kali linux con esa ip, con el comando sudo nmap -A -T4 -p- 192.168.92.133:

Aqui podemos ver el hostname y también veremos las vulnerabilidades con el comando:  sudo nmap -A -T4 -p- --script vuln 192.168.92.133

![Write_up_maquinas/maquina2-ice/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/55c44640845854829ab9a7f19e3541279fffa494/Write_up_maquinas/maquina2-ice/img/img01.png)

Ahora nos vamos a esta pagina web: https://www.cvedetails.com/cve/CVE-2004-1561/  donde podremos ver el cve y el impact score que tiene la vulnerabilidad icecast.

