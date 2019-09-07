# CakePHP Docker Compose Template

## Requirements

- Only tested on macOs 10.14+.
- Requires php, composer etc. installed via brew
- Requires Docker for Mac, Visual Studio Code for Mac

## Warning

Running bin/create again will wipe your project. Use an external git repo to make it save.

1. Clone Repo
2. From this repos root run `$ bin/create` to create the initial cakephp project
3. From this repos root run `$ bin/up` to boot the box
4. From this repos root run `$ bin/down` to shutdown the box
5. From this repos root Run `$ bin/cli` then inside the docker cli `$ bin/cake` to operate with the cake console inside the docker box
6. ...
