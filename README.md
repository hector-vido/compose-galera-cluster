# MySQL - Galera Cluster - Swarm

This example is intended to show the most basic steps do create a database cluster.

MySQL and Galera was choosen for it's simplicity.

We had:

- An application - PHP
- An load balancer - HAProxy
- Three MySQL nodes - MariaDB/Galera Cluster

## First Step - Main Master

The **compose file** have most of it commented and should be until the first master starts. In Galera Cluster the first machine - and only the first one - should start with the `--wsrep-new-cluster`

  docker-compose up

The **balancer** will fail, just ignore it. You can use the option `-d` to detach the process, but is nice see the logs.

## Second Step - Other Masters

After the command above looks stable, edit the compose file removing all comments and the execute in another terminal - if you don't used `-d`:

  docker-compose up -d

Use this `-d` here to dettach the process, the logs of the first container we bring up is enough.

## Testing

To test this little cluster you can go to your browser and open 127.0.0.1:8080, every time you refresh the page, one of the three database hostnames should appear.

From terminal you can do:

  curl localhost:8080
