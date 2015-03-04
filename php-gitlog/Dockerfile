#
# Apache+PHP Dockerfile
#

# Pull base image.
FROM dockerfile/ubuntu

# Install Apache and PHP.
RUN \
  apt-get update && \
  apt-get install -y php5 apache2 && \
  rm -rf /var/lib/apt/lists/*

RUN rm -rf /var/www/html/*

# Add files to image.
ADD httpd.conf /etc/apache2/httpd.conf
ADD html/* /var/www/html/

# Define working directory.
WORKDIR /etc/apache2

# Define default command.
CMD ["apache2", "-d /etc/apache2", "-f httpd.conf", "-e info", "-DFOREGROUND"]

# Expose ports.
EXPOSE 80
EXPOSE 443
