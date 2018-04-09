FROM ubuntu:16.04
RUN apt-get update && apt-get install -y libboost-all-dev
RUN mkdir -p /coffeemaker/data
COPY ./server /coffeemaker/
RUN chmod +x /coffeemaker/server
EXPOSE 1234
CMD ./coffeemaker/server
