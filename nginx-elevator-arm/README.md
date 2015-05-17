Create the image:

    $ docker build .

Run command is defined in dockerfile/nginx

    $ docker run -d -p $EXTERNAL_PORT:$INTERNAL_PORT $IMAGE_HASH

Example:

    $ docker run -d -p 3000:80 c8f0266c2a

This starts the nginx server on port 3000 in background (-d).

If successful, it will return a new hash ($HASH) which is a reference to the running image. This can be used with `docker kill $HASH`
