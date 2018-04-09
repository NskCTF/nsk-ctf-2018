FROM python:3

WORKDIR /usr/src/app
RUN apt-get update
RUN apt-get install -y sqlite
COPY ./ ./

EXPOSE 14901
CMD ["python", "./main.py"]
