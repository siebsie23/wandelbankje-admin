# Wandelbankje Admin
Wandelbankje Admin is the management-side of the wandelbankje-app.
It provides a dashboard for administrators to manage everything that is going on, and also provides a dashboard for users to manage account data, reviews and more.

## How does it get it's benches?
The application is connected to a database that already contains the 'benches' table. Benches are fetched from OpenStreetMap daily and are stored in this table. 

The code for fetching benches and storing them is available in my [wandelbankje-server](https://github.com/siebsie23/wandelbankje-server) repository.


## API
Wandelbankje Admin also provides the API for the Wandelbankje-app. The API is publicly available but this may change in the future.

### API Documentation
(WIP)

