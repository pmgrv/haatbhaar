FROM httpd:2.4
COPY ./public-html/ /usr/local/apache2/htdocs/
docker build -t my-apache2 .
docker run -dit -p 8080:80 --name my-running-app my-apache2
