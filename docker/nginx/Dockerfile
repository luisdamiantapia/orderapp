FROM nginx:1.19

ARG UID

#RUN adduser -u ${UID} --disabled-password --gecos "" appuser

RUN adduser appuser
RUN usermod -aG sudo appuser

COPY default.conf /etc/nginx/conf.d
