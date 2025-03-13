FROM ubuntu:22.04

ENV TZ=Asia/Shanghai \
    DEBIAN_FRONTEND=noninteractive
RUN sed -i "s/http:\/\/archive.ubuntu.com/http:\/\/mirrors.aliyun.com/g" /etc/apt/sources.list && sed -i "s/http:\/\/security.ubuntu.com/http:\/\/mirrors.aliyun.com/g" /etc/apt/sources.list && \
apt update && apt install -y software-properties-common && add-apt-repository ppa:ondrej/php -y && apt install -y php5.6 php5.6-cli
RUN apt install -y php5.6-dev
ADD ./xdebug-2.5.5 /tmp/xdebug
RUN cd /tmp/xdebug \
    && phpize \
    && ./configure --enable-xdebug \
    && make -j$(nproc) \
    && make install \
    && cd /
ADD ./xcache /tmp/xcache
RUN cd /tmp/xcache \
    && phpize \
    && ./configure --enable-xcache --enable-xcache-disassembler \
    && make -j$(nproc) \
    && make install \
    && cd /
COPY xcache.ini /tmp/
COPY challenge.php /var/www/html/
COPY info.php /var/www/html/
RUN cat /tmp/xcache.ini >> /etc/php/5.6/apache2/php.ini && touch /var/www/html/b3debcdfb73572a549ac64da1c830d72 && chmod 777 /var/www/html/b3debcdfb73572a549ac64da1c830d72
# RUN echo 'extension = xcache.so' > /etc/php/5.6/mods-available/xcache.ini
RUN echo 'extension = xcache.so' > /etc/php/5.6/apache2/conf.d/20-xcache.ini
RUN echo 'zend_extension=/usr/lib/php/20131226/xdebug.so' > /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo '[Xdebug]' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo 'xdebug.auto_trace=On' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo 'xdebug.collect_params=1' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo 'xdebug.collect_return=1' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo 'xdebug.collect_assignments=1' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN echo 'xdebug.collect_vars=1' >> /etc/php/5.6/apache2/conf.d/99-xdebug.ini
RUN ln -sf /proc/self/fd/1 /var/log/apache2/access.log && \
    ln -sf /proc/self/fd/1 /var/log/apache2/error.log
CMD apachectl -D FOREGROUND -X