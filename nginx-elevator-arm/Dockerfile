FROM mkaczanowski/archlinux-nginx

RUN mkdir -p /srv/http
ADD index.html /srv/http/index.html

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

EXPOSE 80
EXPOSE 443

CMD /usr/sbin/nginx -c /etc/nginx/nginx.conf
