## You must have docker and docker-compose installed to run this project.

## Installation process

- open terminal from the current directory
- rename covid.env file to .env file (this file resides in  /src/vaccination-system/)
- adjust variables if needed
- run `cd docker`
- run `docker-compose up --build`


## Optimization
  - we can optimize our search feature by indexing our registrations table by nid
    since we are searching by nid.
  - we can set smaller size for varchar fields if we know the length of the max length of nid

## Note
   The way we implemented mail service similar way we can implement sms notification
   - first we need to select a sms notification provider.
   - second we need to setup sd.
   - then we need to implement notification class for our business logic.