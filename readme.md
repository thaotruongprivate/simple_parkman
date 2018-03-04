# Simple Parkman API

This is a very simple version of Parkman the app.
Users are able to fetch a list of garages, with optional filters: garage's name, garage owner's name and garage's location.

## Creator's note
- no auth is needed
- there are currently test cases for 2 filters (location filter's test is missing because Sqlite couldn't handle some function available in MySLQ)
- all enquiries can be directed to truong.t.n.thao@gmail.com 

## Installation
- download the repository to your PC
- run migration and seed
- serve the app on some IP address

## Use cases
- to fetch all garages, make a GET request to /api/garages
- to filter by name, make a GET request to /api/garages?name=<garage's name>
- to filter by owner's name, make a GET request to /api/garages?owner=<owner's name>
- to filter by location, make a GET request to /api/garages?location=<latitude longitude>, in case the location filter is used, the response will have a new element called "distance" which tells the distances of the garages from the given distance, the result will also be sorted by distance in an ascending order.

### Example response:
```json
{
   "result":true,
   "garages":[
      {
         "distance":"~0 km",
         "garage_id":"187831",
         "name":"Kauppis",
         "hourly_price":3,
         "currency":"€",
         "contact_email":"testemail@testautopark.fi",
         "point":"60.17167429490068 24.921585662024363",
         "country":"Finland",
         "owner_id":"2",
         "garage_owner":"AutoPark"
      },
      {
         "distance":"~1.2 km",
         "garage_id":"171284",
         "name":"Tampere Rautatientori",
         "hourly_price":2,
         "currency":"€",
         "contact_email":"testemail@testautopark.fi",
         "point":"60.168607847624095 24.932371066131623",
         "country":"Finland",
         "owner_id":"2",
         "garage_owner":"AutoPark"
      },
      {
         "distance":"~1.7 km",
         "garage_id":"156450",
         "name":"Fitnesstukku",
         "hourly_price":3,
         "currency":"€",
         "contact_email":"testemail@testautopark.fi",
         "point":"60.165219358852795 24.93537425994873",
         "country":"Finland",
         "owner_id":"2",
         "garage_owner":"AutoPark"
      },
      {
         "distance":"~2 km",
         "garage_id":"105510",
         "name":"Unknown",
         "hourly_price":3,
         "currency":"€",
         "contact_email":"testemail@testautopark.fi",
         "point":"60.16444996645511 24.938178168200714",
         "country":"Finland",
         "owner_id":"2",
         "garage_owner":"AutoPark"
      },
      {
         "distance":"~2.2 km",
         "garage_id":"111907",
         "name":"Punavuori Garage",
         "hourly_price":1.5,
         "currency":"€",
         "contact_email":"testemail@testautopark.fi",
         "point":"60.162562 24.939453",
         "country":"Finland",
         "owner_id":"2",
         "garage_owner":"AutoPark"
      }
   ]
}
```
